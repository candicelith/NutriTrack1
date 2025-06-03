@extends('layout.nav')

@section('content')
    <section x-data="editProfileHandler()">
        <div class="p-9 sm:ml-64">
            <div class="rounded-lg">
                <div class="mb-9">
                    <h1 class="text-biru-tertiary text-5xl font-bold">Profile</h1>
                </div>

                <div class="bg-biru-secondary space-y-9 rounded-2xl border p-6">
                    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-9">
                        @csrf

                        <div class="flex flex-col items-center justify-center space-y-4">
                            <img src="{{ asset('asset/profile-picture.png') }}" alt="Foto Profil" class="h-32 w-32">
                            <button type="button"
                                class="bg-biru-tertiary hover:bg-biru-tertiary-hover rounded-lg border px-8 py-1 text-xl font-semibold text-white">
                                Ubah Foto
                            </button>
                        </div>

                        <div>
                            <label for="full_name" class="text-base font-medium">Nama Lengkap</label>
                            <input type="text" id="full_name" name="full_name"
                                class="mt-2 w-full rounded-lg p-3 text-base" placeholder="Masukkan nama lengkap"
                                :value="user.name" readonly>
                        </div>

                        <div>
                            <label for="unit_posyandu" class="text-base font-medium">Unit Posyandu</label>
                            <select id="unit_posyandu" name="unit_posyandu" class="mt-2 w-full rounded-lg p-3 text-base">
                                {{-- <option value="">Pilih Unit Posyandu</option> --}}
                                <option :value="posyandu.name" x-text="posyandu.name" selected>Posyandu</option>
                            </select>
                        </div>

                        {{-- <div class="flex justify-end space-x-4">
                            <a href="{{ route('home') }}"
                                class="text-biru-tertiary rounded-xl border bg-white px-8 py-2 text-lg font-semibold hover:bg-gray-100">
                                Batal
                            </a>
                            <button
                                class="bg-biru-tertiary hover:bg-biru-tertiary-hover rounded-xl px-8 py-2 text-lg font-semibold text-white">
                                Simpan
                            </button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function editProfileHandler() {
            return {
                user: Alpine.store('user').data,
                posyandu: Alpine.store('user').posyandu,
                isLoading: false,
                errors: {},
                // async init() {
                //     // Initialize form with user data
                //     document.getElementById('full_name').value = this.user.name;
                //     document.getElementById('unit_posyandu').value = this.user.unit_posyandu;
                // },
                async submit() {
                    this.isLoading = true;
                    this.errors = {};
                    try {
                        const response = await axios.post('/profile/update', {
                            full_name: document.getElementById('full_name').value,
                            unit_posyandu: document.getElementById('unit_posyandu').value,
                        });
                        // Handle success response
                        console.log(response.data);
                        this.isLoading = false;
                    } catch (error) {
                        this.isLoading = false;
                        if (error.response && error.response.data) {
                            this.errors = error.response.data.errors || {};
                        } else {
                            this.errors.general = 'Terjadi kesalahan, silakan coba lagi.';
                        }
                    }
                }
            };
        }
    </script>
@endsection
