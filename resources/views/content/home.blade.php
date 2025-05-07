@extends('layout.nav')

@section('content')
    <section>
        <div class="p-9 sm:ml-64">
            <div class="rounded-lg">
                <div class="mb-9 grid grid-cols-1">
                    <h1 class="text-biru-tertiary text-6xl font-bold">Selamat Datang, Sucipto!</h1>
                </div>
                <div class="bg-biru-secondary mb-9 flex h-48 items-center justify-center rounded-2xl border p-9">
                    <p class="text-2xl font-medium"><span class="text-biru-tertiary font-bold">NutriTrack</span> adalah sistem
                        digital yang membantu petugas posyandu dan
                        puskesmas mencatat data gizi anak
                        secara real-time, aman, dan efisien. Data seperti berat badan, tinggi badan, dan status gizi dapat
                        dicatat dengan mudah, serta tersimpan otomatis sebagai riwayat perkembangan anak tanpa perlu rekap
                        manual. Sistem ini terintegrasi langsung dengan Healthmap, sehingga setiap data yang diinput akan
                        disinkronkan secara otomatis.</p>
                </div>
                <div class="mb-4 grid grid-cols-3 gap-4">
                    <div
                        class="bg-biru-secondary flex flex-col items-center justify-center space-y-8 rounded-2xl border p-9">
                        <h2 class="text-3xl font-bold">Data Terdaftar</h2>
                        <div class="space-y-3">
                            <div class="flex space-x-2 text-3xl font-semibold">
                                <p>130</p>
                                <p>Anak</p>
                            </div>
                            <div
                                class="bg-biru-tertiary text-hijau-success flex space-x-2 rounded-lg px-6 py-2 text-2xl font-medium">
                                <svg class="h-9 w-9" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M12 6v13m0-13 4 4m-4-4-4 4" />
                                </svg>
                                <p>50</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-biru-secondary col-span-2 flex flex-col items-center justify-center rounded-2xl border p-9">
                        <h2 class="text-3xl font-bold">Gizi Anak di Posyandu Moyudan</h2>


                        <div class="w-full max-w-sm rounded-lg bg-white p-4 shadow-sm md:p-6 dark:bg-gray-800">

                            <div class="flex w-full items-start justify-between">
                                <div class="flex-col items-center">
                                    <div class="mb-1 flex items-center">
                                        <h5 class="me-1 text-xl font-bold leading-none text-gray-900 dark:text-white">
                                            Website traffic</h5>
                                    </div>

                                    <!-- Pie Chart -->
                                    <div class="py-6" id="pie-chart"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
    <script>
        const getChartOptions = () => {
            return {
                series: [52.8, 26.8],
                colors: ["#fff", "#fff"],
                chart: {
                    height: 420,
                    width: "100%",
                    type: "pie",
                },
                stroke: {
                    colors: ["white"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        labels: {
                            show: true,
                        },
                        size: "100%",
                        dataLabels: {
                            offset: -25
                        }
                    },
                },
                labels: ["Gizi Baik", "Gizi Buruk"],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "%"
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "%"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
            chart.render();
        }
    </script>
@endsection
