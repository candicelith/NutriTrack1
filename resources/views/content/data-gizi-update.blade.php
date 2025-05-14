@extends('layout.nav')

@section('content')
    <section>
        <div class="p-9 sm:ml-64">
            <div class="rounded-lg">
                <div class="mb-9 grid grid-cols-1">
                    <h1 class="text-biru-tertiary text-5xl font-bold">Tambah Data Anak</h1>
                </div>
                <div class="bg-biru-secondary flex flex-col space-y-9 rounded-2xl border p-4">
                    <div class="grid grid-cols-2 items-center justify-center gap-9">
                        <div class="col-span-2">
                            <label class="text-base font-medium" for="full_name">Nama Lengkap</label>
                            <select class="mt-2 w-full rounded-lg" name="full_name" id="full_name">
                                <option value="">Nama Lengkap</option>
                                <option value="">Denis</option>
                                <option value="">Titin Dugem</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label class="text-base font-medium" for="height">Tinggi badan</label>
                            <input class="mt-2 w-full rounded-lg p-2" type="text" name="height" id="height">
                        </div>
                        <div class="col-span-1">
                            <label class="text-base font-medium" for="weight">Berat badan</label>
                            <input class="mt-2 w-full rounded-lg p-2" type="text" name="weight" id="weight">
                        </div>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button
                            class="text-biru-tertiary rounded-xl border bg-white px-10 py-3 text-2xl font-semibold hover:bg-gray-100">
                            Batal
                        </button>
                        <button
                            class="bg-biru-tertiary hover:bg-biru-tertiary-hover rounded-xl border px-10 py-3 text-2xl font-semibold text-white">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
