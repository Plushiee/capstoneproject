@extends('admins.master')

@section('title', 'Dashboard')

@section('contents')
    <div class="p-a white lt box-shadow">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0 _300">@yield('title')</h4>
                {{-- <small class="text-muted">Bootstrap <strong>4</strong> Web App Kit with AngularJS</small> --}}
            </div>

        </div>
    </div>

    <div class="padding">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded  accent">
                            <i class="material-icons">&#xe151;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a href="{{ route('userListTamu') }}">
                                {{ $banyakPesanan }}
                                <span class="text-sm"> Kali</span>
                            </a></h4>
                        <small class="text-muted">Pesanan per {{ now()->locale('id')->monthName }}
                            {{ now()->year }}</small>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded  warn">
                            <i class="material-icons">&#xe8b5;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a href=""> {{ $banyakKonfirmasi }}
                                <span class="text-sm">Pesanan</span>
                            </a></h4>
                        <small class="text-muted">Menunggu Konfirmasi</small>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded  success">
                            <i class="material-icons">&#xe877;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a href=""> {{ $banyakPelanggan }}
                                <span class="text-sm">Pelanggan</span>
                            </a></h4>
                        <small class="text-muted">Selama Tahun {{ now()->format('Y') }}</small>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded danger">
                            <i class="material-icons">&#xe5c9;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a href="">
                                {{ $banyakPengunjung[0]->total_kunjungan }}
                                <span class="text-sm">Pengunjung Undangan</span>
                            </a></h4>
                        <small class="text-muted">Selama Tahun {{ now()->format('Y') }}</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 pt-4">
                <div class="card">
                    <div class="card-body my-3 mx-3 text-center">
                        <h5 class="card-title">Grafik Tamu Pengunjung Undangan Yang Telah Dibuat</h5>
                        <canvas id="grafikWaktuKunjungan" style="max-height: 300px"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 pt-4 ">
                <div class="card activities">
                    <div class="card-body my-3 mx-3 text-center">
                        <h5 class="card-title">Grafik Pendaftaran Akun</h5>
                        <canvas id="grafikDaftarAkun" style="max-height: 300px"></canvas>
                    </div>
                    <div class="body container" style="max-height: 300px; overflow-y: scroll">
                        <div class="streamline b-l b-accent">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endsection

    @section('addJS')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Chart JS Script Start-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Chart JS Script End-->
        <script>
            var ctxLineChart = document.getElementById('grafikWaktuKunjungan').getContext('2d');
            var ctxLineChart2 = document.getElementById('grafikDaftarAkun').getContext('2d');
            var labelsLineChart = @json($banyakPengunjungPerHari->pluck('tanggal'));
            var dataLineChart = @json($banyakPengunjungPerHari->pluck('total_kunjungan'));
            var labelsLineChart2 = @json($banyakAkunBaruPerHari->pluck('tanggal'));
            var dataLineChart2 = @json($banyakAkunBaruPerHari->pluck('total_akun'));

            // LineChart
            var myLineChart = new Chart(ctxLineChart, {
                type: 'line',
                data: {
                    labels: labelsLineChart,
                    datasets: [{
                        label: 'Jumlah Tamu Pengunjung Undangan ',
                        data: dataLineChart,
                        borderColor: 'rgb(75, 192, 192)',
                        borderWidth: 2,
                        fill: false,
                    }],
                },
                options: {
                    animations: {
                        tension: {
                            duration: 1000,
                            easing: 'linear',
                            from: 1,
                            to: 0,
                            loop: true
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: false,
                            ticks: {
                                stepSize: 1,
                                precision: 0
                            }
                        }
                    }
                },
            });

            var myLineChart = new Chart(ctxLineChart2, {
                type: 'line',
                data: {
                    labels: labelsLineChart2,
                    datasets: [{
                        label: 'Jumlah Akun Dibuat ',
                        data: dataLineChart2,
                        borderColor: 'rgb(75, 192, 192)',
                        borderWidth: 2,
                        fill: false,
                    }],
                },
                options: {
                    animations: {
                        tension: {
                            duration: 1000,
                            easing: 'linear',
                            from: 1,
                            to: 0,
                            loop: true
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: false,
                            ticks: {
                                stepSize: 1,
                                precision: 0
                            }
                        }
                    }
                },
            });
        </script>
    @endsection
