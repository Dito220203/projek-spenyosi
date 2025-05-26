@extends('components.layout')
@section('content')
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}


    {{-- <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">

                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <section class="content">
                                <div class="container-fluid">
                                    <!-- Small boxes (Stat box) -->
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>150</h3>
                                                    <p>Jumlah Seluruh Siswa Kelas VII</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->

                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-success">
                                                <div class="inner">
                                                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                                                    <p>Bounce Rate</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-stats-bars"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3>44</h3>

                                                    <p>User Registrations</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-person-add"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-danger">
                                                <div class="inner">
                                                    <h3>65</h3>

                                                    <p>Unique Visitors</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-pie-graph"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            </section>
        </div>
    @endsection --}}

    @section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- KOTAK STATISTIK ANDA --}}
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner"><h3>{{ $totalSiswa }}</h3><p>Jumlah Seluruh Siswa</p></div>
                            <div class="icon"><i class="ion ion-bag"></i></div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner"><h3>{{ $siswaSudahMengisiKebiasaanUmum }}</h3><p>Siswa Sudah Mengisi Kebiasaan</p></div>
                            <div class="icon"><i class="ion ion-stats-bars"></i></div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner"><h3>{{ $siswaBelumMengisiKebiasaanUmum }}</h3><p>Siswa Belum Mengisi Kebiasaan</p></div>
                            <div class="icon"><i class="ion ion-person-add"></i></div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner"><h3>{{ $totalSiswa }}</h3><p>Total Siswa (Contoh)</p></div>
                            <div class="icon"><i class="ion ion-pie-graph"></i></div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Status Pengisian Kebiasaan Siswa
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-responsive">
                                    <canvas id="kebiasaanChartUmum" height="200"></canvas> {{-- ID chart pertama diubah --}}
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6"> {{-- Anda bisa menyesuaikan lebar kolom ini --}}
                        <div class="card card-info card-outline"> {{-- Menggunakan warna card berbeda --}}
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie"></i> {{-- Icon berbeda --}}
                                    Siswa yang Mengisi Setiap Kebiasaan (Hari Ini)
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-responsive">
                                    <canvas id="kebiasaanDetailChart" height="200"></canvas> {{-- CANVAS BARU UNTUK CHART KEDUA --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div></section>
        </div>
    @endsection
    
    @push('scripts')
    <script>
        // --- SCRIPT UNTUK CHART PERTAMA (UMUM) ---
        const chartLabelsUmum = @json($chartDataUmum['labels']);
        const chartValuesUmum = @json($chartDataUmum['data']);
        const chartColorsUmum = @json($chartDataUmum['backgroundColor']);
    
        var ctxUmum = document.getElementById('kebiasaanChartUmum');
    
        if (ctxUmum) {
            var kebiasaanChartUmum = new Chart(ctxUmum, {
                type: 'doughnut', // Atau 'pie', 'bar'
                data: {
                    labels: chartLabelsUmum,
                    datasets: [{
                        data: chartValuesUmum,
                        backgroundColor: chartColorsUmum,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Distribusi Status Pengisian Kebiasaan Harian Keseluruhan'
                        }
                    }
                }
            });
        } else {
            console.error("Elemen canvas dengan ID 'kebiasaanChartUmum' tidak ditemukan!");
        }
    
    
        // --- SCRIPT UNTUK CHART KEDUA (DETAIL PER KEBIASAAN) ---
        const chartLabelsKebiasaan = @json($chartDataKebiasaan['labels']);
        const chartValuesKebiasaan = @json($chartDataKebiasaan['data']);
        const chartColorsKebiasaan = @json($chartDataKebiasaan['backgroundColor']);
        const chartBorderColorsKebiasaan = @json($chartDataKebiasaan['borderColor']);
        const chartBorderWidthKebiasaan = @json($chartDataKebiasaan['borderWidth']);
    
        var ctxDetail = document.getElementById('kebiasaanDetailChart'); // Ambil canvas baru
    
        if (ctxDetail) {
            var kebiasaanDetailChart = new Chart(ctxDetail, {
                type: 'bar', // Menggunakan Bar Chart untuk perbandingan jumlah per kebiasaan
                data: {
                    labels: chartLabelsKebiasaan,
                    datasets: [{
                        label: 'Jumlah Siswa Mengisi',
                        data: chartValuesKebiasaan,
                        backgroundColor: chartColorsKebiasaan,
                        borderColor: chartBorderColorsKebiasaan,
                        borderWidth: chartBorderWidthKebiasaan
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true, // Tampilkan legend untuk bar chart
                        },
                        title: {
                            display: true,
                            text: 'Jumlah Siswa yang Mengisi Setiap Kebiasaan Hari Ini'
                        }
                    },
                    scales: {
                        y: { // Sumbu Y (jumlah siswa)
                            beginAtZero: true,
                            ticks: {
                                precision: 0 // Pastikan angka bulat
                            }
                        },
                        x: { // Sumbu X (nama kebiasaan)
                            grid: {
                                offset: true // Menempatkan label di tengah batang
                            }
                        }
                    }
                }
            });
        } else {
            console.error("Elemen canvas dengan ID 'kebiasaanDetailChart' tidak ditemukan!");
        }
    </script>
    @endpush
