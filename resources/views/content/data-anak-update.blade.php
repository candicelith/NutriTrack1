@extends('layout.nav')

@section('content')
    <section x-data="updateChildHandler()">
        <div class="p-9 sm:ml-64">
            <div class="rounded-lg">
                <div class="mb-9 grid grid-cols-1">
                    <h1 class="text-biru-tertiary text-5xl font-bold">Update Data Anak</h1>
                </div>
                <div class="bg-biru-secondary flex flex-col space-y-9 rounded-2xl border p-4">
                    <div class="grid grid-cols-2 items-center justify-center gap-9">
                        <div class="col-span-2">
                            <label class="text-base font-medium" for="full_name">Nama Lengkap</label>
                            <input class="mt-2 w-full rounded-lg p-2" type="text" name="full_name" id="full_name"
                                x-model="name">
                        </div>
                        <div class="col-span-1 w-full">
                            <label class="text-base font-medium" for="gender">Jenis Kelamin</label>
                            <select class="mt-2 w-full rounded-lg p-2" name="gender" id="gender" x-model="gender">
                                <option value="">L/P</option>
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                        <div class="col-span-1 w-full">
                            <label class="text-base font-medium" for="date_of_birth">Tanggal Lahir</label>
                            <input class="mt-2 w-full rounded-lg p-2" type="date" name="date_of_birth" id="date_of_birth"
                                x-model="birth_date">
                        </div>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('data-anak') }}"
                            class="text-biru-tertiary rounded-xl border bg-white px-8 py-2 text-lg font-semibold hover:bg-gray-100">
                            Batal
                        </a>
                        <button @click="updateChild()"
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
        function updateChildHandler() {
            return {
                isLoading: false,
                childId: null,
                name: '',
                gender: '',
                birth_date: '',
                errors: {},
                async init() {
                    console.log('Update Child Handler Initialized');
                    await this.loadChildData();
                },
                async loadChildData() {
                    const pathParts = window.location.pathname.split('/');
                    this.childId = pathParts[pathParts.length - 1]; // Ambil bagian terakhir dari path
                    console.log('Child ID:', this.childId);
                    try {
                        const response = await axios.get(`/monitoring/child-data/show/${this.childId}`);
                        const child = response.data;
                        this.name = child.name;
                        this.gender = child.gender;
                        this.birth_date = child.birth_date;
                    } catch (error) {
                        console.error('Error loading child data:', error);
                        this.errors.load = 'Gagal memuat data anak.';
                    }
                },
                async updateChild() {
                    try {
                        this.isLoading = true;
                        const response = await axios.put(`/monitoring/child-data/update/${this.childId}`, {
                            kecamatan_id: Alpine.store('user').posyandu.kecamatan.id,
                            name: this.name,
                            gender: this.gender,
                            birth_date: this.birth_date,
                        });
                        window.location.href = '/data-anak';
                    } catch (error) {
                        console.error('Error updating child:', error);
                        this.errors = error.response.data.errors;
                    } finally {
                        this.isLoading = false;
                    }
                }
            }
        }
    </script>
@endsection
