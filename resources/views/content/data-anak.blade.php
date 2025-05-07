@extends('layout.nav')

@section('content')
    <section>
        <div class="p-9 sm:ml-64">
            <div class="rounded-lg">
                <div class="mb-9 grid grid-cols-1">
                    <h1 class="text-biru-tertiary text-5xl font-bold">Data Anak Posyandu Moyudan</h1>
                </div>
                <div class="bg-biru-secondary mb-9 flex flex-col space-y-9 rounded-2xl border p-4">
                    <div class="flex items-start justify-start">
                        <a href=""
                            class="bg-biru-tertiary items-start rounded-xl px-10 py-3 text-2xl font-semibold text-white">Tambah
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
                                <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                    <td>1</td>
                                    <td>Denis</td>
                                    <td>20/12/2009</td>
                                    <td>12</td>
                                    <td>L</td>
                                    <td>12</td>
                                </tr>
                                <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                    <td>1</td>
                                    <td>Denis</td>
                                    <td>20/12/2009</td>
                                    <td>12</td>
                                    <td>L</td>
                                    <td>12</td>
                                </tr>
                                <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                    <td>1</td>
                                    <td>Denis</td>
                                    <td>20/12/2009</td>
                                    <td>12</td>
                                    <td>L</td>
                                    <td>12</td>
                                </tr>
                                <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                    <td>1</td>
                                    <td>Denis</td>
                                    <td>20/12/2009</td>
                                    <td>12</td>
                                    <td>L</td>
                                    <td>12</td>
                                </tr>
                                <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                    <td>1</td>
                                    <td>Denis</td>
                                    <td>20/12/2009</td>
                                    <td>12</td>
                                    <td>L</td>
                                    <td>12</td>
                                </tr>
                                <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                    <td>1</td>
                                    <td>Denis</td>
                                    <td>20/12/2009</td>
                                    <td>12</td>
                                    <td>L</td>
                                    <td>12</td>
                                </tr>
                                <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                    <td>1</td>
                                    <td>Denis</td>
                                    <td>20/12/2009</td>
                                    <td>12</td>
                                    <td>L</td>
                                    <td>12</td>
                                </tr>
                                <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                    <td>1</td>
                                    <td>Denis</td>
                                    <td>20/12/2009</td>
                                    <td>12</td>
                                    <td>L</td>
                                    <td>12</td>
                                </tr>
                                <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                    <td>1</td>
                                    <td>Denis</td>
                                    <td>20/12/2009</td>
                                    <td>12</td>
                                    <td>L</td>
                                    <td>12</td>
                                </tr>
                                <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                    <td>1</td>
                                    <td>Denis</td>
                                    <td>20/12/2009</td>
                                    <td>12</td>
                                    <td>L</td>
                                    <td>12</td>
                                </tr>
                                <tr class="bg-white p-2 text-base font-normal text-gray-900">
                                    <td>1</td>
                                    <td>Denis</td>
                                    <td>20/12/2009</td>
                                    <td>12</td>
                                    <td>L</td>
                                    <td>12</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false,
            });
        }
    </script>
@endsection
