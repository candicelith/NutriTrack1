@extends('layout.nav')

@section('content')
    <section x-data="dataGiziHandler()">
        <div class="p-9 sm:ml-64">
            <div class="rounded-lg">
                <div class="mb-9 grid grid-cols-1">
                    <h1 class="text-biru-tertiary text-5xl font-bold">Data Gizi Anak <span x-text="posyandu.name"></span></h1>
                </div>
                <div class="bg-biru-secondary mb-9 flex flex-col space-y-9 rounded-2xl border p-4">

                    <div class="flex items-start justify-start">
                        <a href="{{ route('data-gizi-create') }}"
                            class="bg-biru-tertiary hover:bg-biru-tertiary-hover items-start rounded-xl px-14 py-3 text-2xl font-semibold text-white">Tambah
                            Data</a>
                    </div>

                    <div class="flex items-center justify-center">
                        <table id="search-table" class="w-full text-left text-sm">
                            <thead>
                                <tr>
                                    <th class="bg-biru-tertiary px-2 text-base font-semibold text-white">No</th>
                                    <th class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">Nama</th>
                                    <th class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">
                                        Usia<br>(Tahun)</th>
                                    <th class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">Jenis
                                        Kelamin<br>(L/P)</th>
                                    <th class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">Tinggi
                                        Badan<br>(cm)</th>
                                    <th class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">Berat
                                        Badan<br>(kg)</th>
                                    <th class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">Indeks
                                        Masa<br>Tubuh</th>
                                    <th class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">Status Gizi
                                    </th>
                                    <th class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-if="isLoading">
                                    <tr>
                                        <td colspan="9" class="text-center">Loading...</td>
                                    </tr>
                                </template>
                                <template x-if="!isLoading && nutritions.length === 0">
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data gizi.</td>
                                    </tr>
                                </template>
                                <template x-for="(nutrition, index) in nutritions" :key="nutrition.id">
                                    <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                        <td class="text-center" x-text="index + 1"></td>
                                        <td x-text="nutrition.child.name"></td>
                                        <td x-text="calculateAge(nutrition.child.birth_date)"></td>
                                        <td x-text="nutrition.child.gender"></td>
                                        <td x-text="nutrition.height_cm"></td>
                                        <td x-text="nutrition.weight_kg"></td>
                                        <td x-text="nutrition.bmi"></td>
                                        <td x-text="nutrition.nutrition_status"></td>
                                        <td class="flex space-x-2 py-5">
                                            <a :href="`/data-gizi-update/${nutrition.child.id}`"
                                                class="bg-biru-tertiary hover:bg-biru-tertiary-hover cursor-pointer rounded-lg p-2">
                                                <!-- Edit Icon SVG -->
                                                <svg class="h-6 w-6 text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5-168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <button @click="deleteGizi(nutrition.id)"
                                                class="bg-biru-tertiary hover:bg-biru-tertiary-hover cursor-pointer rounded-lg p-2">
                                                <!-- Delete Icon SVG -->
                                                <svg class="h-6 w-6 text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        function dataGiziHandler() {
            return {
                nutritions: [],
                posyandu: Alpine.store('user').data.unit_posyandu,
                isLoading: false,
                error: null,
                async init() {
                    this.isLoading = true;
                    await this.fetchDataGizi();
                    this.isLoading = false;
                },
                async fetchDataGizi() {
                    try {
                        const response = await axios.get(
                            `/nutritrack/nutrition-record/by-posyandu/${this.posyandu}`);
                        this.nutritions = response.data.data.data;
                    } catch (error) {
                        this.error = error.message;
                        this.data = [];
                    }
                },
                async deleteGizi(id) {
                    try {
                        const response = await axios.delete(`/nutritrack/nutrition-record/delete/${id}`);
                        window.location.reload();
                    } catch (error) {
                        console.error('Error deleting nutrition data:', error);
                        alert('Gagal menghapus data gizi. Silakan coba lagi.');
                    }

                },
                calculateAge(birthDate) {
                    const birth = new Date(birthDate);
                    const today = new Date();
                    let age = today.getFullYear() - birth.getFullYear();
                    const m = today.getMonth() - birth.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) {
                        age--;
                    }
                    return age;
                }
            }
        }
    </script>
@endsection
