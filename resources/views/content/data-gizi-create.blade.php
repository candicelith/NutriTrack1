@extends('layout.nav')

@section('content')
    <section x-data="createNutritionDataHandler()">
        <div class="p-9 sm:ml-64">
            <div class="rounded-lg">
                <div class="mb-9 grid grid-cols-1">
                    <h1 class="text-biru-tertiary text-5xl font-bold">Tambah Data Gizi</h1>
                </div>
                <div class="bg-biru-secondary flex flex-col space-y-9 rounded-2xl border p-4">
                    <div class="grid grid-cols-2 items-center justify-center gap-9">
                        <div class="col-span-2">
                            <label class="text-base font-medium" for="full_name">Nama Lengkap</label>
                            <select class="mt-2 w-full rounded-lg" name="full_name" id="full_name">
                                <option value="">Nama Lengkap</option>
                                <template x-for="child in children" :key="child.id">
                                    <option :value="child.id" x-text="child.name"></option>
                                </template>
                                {{-- <option value="">Denis</option> --}}
                                {{-- <option value="">Titin Dugem</option> --}}
                            </select>
                            <p x-show="errors.child_id" class="text-red-500 text-sm w-full px-3 mt-3"
                                x-text="errors.child_id"></p>
                        </div>
                        <div class="col-span-1">
                            <label class="text-base font-medium" for="height">Tinggi badan</label>
                            <input class="mt-2 w-full rounded-lg p-2" type="text" name="height" id="height">
                            <p x-show="errors.height_cm" class="text-red-500 text-sm w-full px-3 mt-3"
                                x-text="errors.height_cm"></p>
                        </div>
                        <div class="col-span-1">
                            <label class="text-base font-medium" for="weight">Berat badan</label>
                            <input class="mt-2 w-full rounded-lg p-2" type="text" name="weight" id="weight">
                            <p x-show="errors.weight_kg" class="text-red-500 text-sm w-full px-3 mt-3"
                                x-text="errors.weight_kg"></p>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('data-gizi') }}"
                            class="text-biru-tertiary rounded-xl border bg-white px-8 py-2 text-lg font-semibold hover:bg-gray-100">
                            Batal
                        </a>
                        <button @click="saveNutritionData()"
                            class="bg-biru-tertiary hover:bg-biru-tertiary-hover rounded-xl px-8 py-2 text-lg font-semibold text-white">
                            <span x-show="!isLoading">Simpan</span>
                            <img x-show="isLoading" src="{{ asset('asset/loading-white.gif') }}" alt="Loading"
                                class="w-6 h-6 inline" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function createNutritionDataHandler() {
            return {
                children: [],
                isLoading: false,
                errors: {},
                async init() {
                    try {
                        const response = await axios.get(
                            `/monitoring/child-data/get?kecamatan_name=${Alpine.store('user').posyandu.kecamatan.name}`
                        );
                        this.children = response.data.data;
                        // this.children = this.children.filter(child => child.kecamatan == Alpine.store('user').posyandu
                        //     .kecamatan.name);
                        // console.log('Child data loaded:', this.children);
                    } catch (error) {
                        console.error('Error fetching child data:', error);
                        alert('Gagal memuat data anak. Silakan coba lagi.');
                    }
                },
                async saveNutritionData() {
                    const child_id = document.getElementById('full_name').value;
                    const height = document.getElementById('height').value;
                    const weight = document.getElementById('weight').value;
                    const user_id = Alpine.store('user').data.id;

                    try {
                        this.isLoading = true;
                        await axios.post('/nutritrack/nutrition-record/create', {
                            child_id: child_id,
                            user_id: user_id,
                            height_cm: height,
                            weight_kg: weight
                        });
                        window.location.href = '/data-gizi';
                    } catch (error) {
                        this.errors = error.response.data.errors
                        console.error('Error saving nutrition data:', error);
                        alert('Gagal menyimpan data gizi. Silakan coba lagi.');
                    } finally {
                        this.isLoading = false;
                    }
                }

            };

        }
    </script>
@endsection
