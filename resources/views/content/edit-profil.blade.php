@extends('layout.nav')

@section('content')
    <section>
        <div class="p-9 sm:ml-64">
            <div class="rounded-lg">
                <div class="mb-9">
                    <h1 class="text-biru-tertiary text-5xl font-bold">Edit Profil</h1>
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
                                class="mt-2 w-full rounded-lg p-3 text-base" placeholder="Masukkan nama lengkap">
                        </div>

                        <div>
                            <label for="unit_posyandu" class="text-base font-medium">Unit Posyandu</label>
                            <select id="unit_posyandu" name="unit_posyandu" class="mt-2 w-full rounded-lg p-3 text-base">
                                <option value="">Pilih Unit Posyandu</option>
                                <option value="Moyudan">Moyudan</option>
                                <option value="Minggir">Minggir</option>
                            </select>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button
                                class="text-biru-tertiary rounded-xl border bg-white px-8 py-2 text-lg font-semibold hover:bg-gray-100">
                                Batal
                            </button>
                            <button
                                class="bg-biru-tertiary hover:bg-biru-tertiary-hover rounded-xl px-8 py-2 text-lg font-semibold text-white">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
