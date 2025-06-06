@extends('layout.nav')

@section('content')
    <section x-data="homePageHandler()">
        <div class="p-9 sm:ml-64">
            <div class="rounded-lg">
                <div class="mb-9 grid grid-cols-1">
                    <h1 class="text-biru-tertiary text-6xl font-bold">Selamat Datang, <span x-text="user.name"></span>!
                    </h1>
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
                                <p x-text="statistics.total_children">130</p>
                                <p>Anak</p>
                            </div>
                            <div
                                class="bg-biru-tertiary text-hijau-success flex space-x-2 rounded-lg px-6 py-2 text-2xl font-medium">
                                <svg class="h-9 w-9" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M12 6v13m0-13 4 4m-4-4-4 4" />
                                </svg>
                                <p x-text="statistics.total_children">50</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-biru-secondary col-span-2 flex flex-col items-center justify-center rounded-2xl border p-9">
                        <h2 class="text-3xl font-bold">Gizi Anak di <span x-text="data.posyandu?.name"></span>
                        </h2>


                        <div class="w-full max-w-sm rounded-lg p-4 md:p-6">

                            <div class="flex w-full items-start justify-between">
                                <div class="flex-col items-center">
                                    <!-- Pie Chart -->
                                    <div class="py-6" id="chart"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        function homePageHandler() {
            return {
                user: Alpine.store('user').data,
                data: {},
                children: [],
                statistics: [], // jumlah anak yang terdaftar
                growth: 0,
                goodNutrition: 0,
                badNutrition: 0,
                chart: null,
                isLoading: false,
                errors: {},
                async init() {
                    // this.user = Alpine.store('user').data;
                    try {
                        const response = await axios.get(
                            `/nutritrack/nutrition-record/by-posyandu/${this.user.unit_posyandu}`);
                        this.data = response.data;
                        Alpine.store('user').posyandu = this.data.posyandu;
                        Alpine.store('user').setPosyandu(this.data.posyandu);
                        this.children = this.data.data.data;
                        this.growth = this.children.reduce((growth, child) => {
                            const createdAt = new Date(child.created_at);
                            const now = new Date();
                            return growth + (
                                createdAt.getFullYear() === now.getFullYear() &&
                                createdAt.getMonth() === now.getMonth() ? 1 : 0
                            );
                        }, 0);
                        this.statistics = response.data.statistics;
                        this.countStatNutrition();
                        this.renderChart([this.badNutrition, this.goodNutrition]);
                        this.isLoading = false;
                    } catch (error) {
                        console.error('Error fetching data:', error);
                        this.isLoading = false;
                    }
                },
                countStatNutrition() {
                    for (let child of this.children) {
                        if (child.nutrition_status == 'Normal') {
                            this.goodNutrition++;
                        } else {
                            this.badNutrition++;
                        }
                    }
                },
                renderChart(seriesData) {
                    if (this.chart) {
                        this.chart.updateSeries(seriesData);
                        return;
                    }
                    var options = {
                        series: seriesData,
                        colors: ['#023047', '#FFB703'],
                        chart: {
                            width: 380,
                            type: 'pie',
                        },
                        labels: ['Gizi Buruk', 'Gizi Baik'],
                        dataLabels: {
                            enabled: true,
                            style: {
                                fontFamily: 'Inter, sans-serif',
                            }
                        },
                        legend: {
                            position: 'right',
                            fontFamily: 'Inter, sans-serif',
                            fontSize: '24px',
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    };
                    this.chart = new ApexCharts(document.querySelector("#chart"), options);
                    this.chart.render();
                }
            }
        }
    </script>
@endsection
