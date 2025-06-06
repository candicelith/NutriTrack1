@extends('layout.nav')

@section('content')
    <section x-data="dataAnakHandler()">
        <div class="p-9 sm:ml-64">
            <div class="rounded-lg">
                <div class="mb-9 grid grid-cols-1">
                    <h1 class="text-biru-tertiary text-5xl font-bold">Data Anak <span x-text="posyandu.name"></span></h1>
                </div>
                <div class="bg-biru-secondary mb-9 flex flex-col space-y-9 rounded-2xl border p-4">

                    <div class="flex items-start justify-start">
                        <a href="{{ route('data-anak-create') }}"
                            class="bg-biru-tertiary hover:bg-biru-tertiary-hover items-start rounded-xl px-14 py-3 text-2xl font-semibold text-white">Tambah
                            Data</a>
                    </div>

                    <div class="flex items-center justify-center">
                        <table id="search-table" class="w-full text-left text-sm">
                            <thead>
                                <tr>
                                    <th scope="col" class="bg-biru-tertiary px-2 text-base font-semibold text-white">
                                        <span class="flex items-center">
                                            No
                                        </span>
                                    </th>
                                    <th scope="col"
                                        class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">
                                        <span class="flex items-center">
                                            Nama
                                        </span>
                                    </th>
                                    <th scope="col"
                                        class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">
                                        <span class="flex items-center">
                                            Tanggal Lahir
                                        </span>
                                    </th>
                                    <th scope="col"
                                        class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">
                                        <span class="flex items-center">
                                            Usia<br>(Tahun)
                                        </span>
                                    </th>
                                    <th scope="col"
                                        class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">
                                        <span class="flex items-center">
                                            Jenis Kelamin<br>(L/P)
                                        </span>
                                    </th>
                                    <th scope="col"
                                        class="bg-biru-tertiary px-2 py-2 text-base font-semibold text-white">
                                        <span class="flex items-center">
                                            Aksi
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-if="isLoading">
                                    <tr>
                                        <td colspan="6" class="text-center">Loading...</td>
                                    </tr>
                                </template>
                                <template x-if="!isLoading && children.length === 0">
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data anak.</td>
                                    </tr>
                                </template>
                                <template x-for="(child, index) in children" :key="child.id">
                                    <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                        <td class="text-center" x-text="index + 1"></td>
                                        <td x-text="child.name"></td>
                                        <td x-text="child.birth_date">20/12/2009</td>
                                        <td x-text="calculateAge(child.birth_date)">12</td>
                                        <td x-text="child.gender">L</td>
                                        <td class="flex space-x-2 py-5">
                                            <a :href="`/data-anak-update/${child.id}`"
                                                class="bg-biru-tertiary hover:bg-biru-tertiary-hover cursor-pointer rounded-lg p-2">
                                                <svg class="h-6 w-6 text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <button @click="deleteChild(child.id)"
                                                class="bg-biru-tertiary hover:bg-biru-tertiary-hover cursor-pointer rounded-lg p-2">
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
        // if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        //     const dataTable = new simpleDatatables.DataTable("#search-table", {
        //         searchable: true,
        //         sortable: false,
        //     });
        // }
    </script>
    <script>
        function dataAnakHandler() {
            return {
                children: [],
                posyandu: Alpine.store('user').posyandu,
                isLoading: false,
                error: null,
                async init() {
                    this.isLoading = true;
                    try {
                        const response = await axios.get(
                            `/monitoring/child-data/get?kecamatan_name=${this.posyandu.kecamatan.name}`);
                        this.children = response.data.data;
                    } catch (error) {
                        this.error = error.message;
                    } finally {
                        this.isLoading = false;
                    }
                },
                async deleteChild(childId) {
                    if (confirm('Apakah Anda yakin ingin menghapus data anak ini?')) {
                        try {
                            await axios.delete(`/monitoring/child-data/delete/${childId}`);
                            window.location.reload();
                            // this.children = this.children.filter(child => child.id !== childId);
                        } catch (error) {
                            alert('Gagal menghapus data anak. Silakan coba lagi.');
                            console.error('Error deleting child:', error);
                        }
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
