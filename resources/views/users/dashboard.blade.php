@extends('users.master')

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
    {{ $banyakPengunjungPerHari }}
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
                        <h4 class="m-0 text-lg _300"><a href>
                                {{ DB::table('tbl_buku_tamus')->where(
                                        'id_pesanan',
                                        DB::table('tbl_pesanans')->where('id_user', Auth::user()->id)->value('id'),
                                    )->count() }}
                                <span class="text-sm">Tamu</span>
                            </a></h4>
                        <small class="text-muted">Diundang</small>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded  accent">
                            <i class="material-icons">&#xe151;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a
                                href>{{ DB::table('tbl_buku_tamus')->where(
                                        'id_pesanan',
                                        DB::table('tbl_pesanans')->where('id_user', Auth::user()->id)->value('id'),
                                    )->where('kehadiran', 'hadir')->count() }}
                                <span class="text-sm">Tamu</span>
                            </a></h4>
                        <small class="text-muted">Akan Hadir</small>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded  accent">
                            <i class="material-icons">&#xe151;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a href>
                                {{ DB::table('tbl_buku_tamus')->where(
                                        'id_pesanan',
                                        DB::table('tbl_pesanans')->where('id_user', Auth::user()->id)->value('id'),
                                    )->where('kehadiran', 'tidak hadir')->count() }}
                                <span class="text-sm">Tamu</span>
                            </a></h4>
                        <small class="text-muted">Tidak Hadir</small>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded  accent">
                            <i class="material-icons">&#xe151;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a
                                href>{{ DB::table('tbl_buku_tamus')->where(
                                        'id_pesanan',
                                        DB::table('tbl_pesanans')->where('id_user', Auth::user()->id)->value('id'),
                                    )->where('kehadiran', 'belum konfirmasi')->count() }}
                                <span class="text-sm">Tamu</span>
                            </a></h4>
                        <small class="text-muted">Belum Konfirmasi</small>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded primary">
                            <i class="material-icons">&#xe54f;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a href>40 <span class="text-sm">Tamu</span></a></h4>
                        <small class="text-muted">Memberikan Ucapan</small>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded warn">
                            <i class="material-icons">&#xe8d3;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a href>600 <span class="text-sm">Tamu</span></a></h4>
                        <small class="text-muted">Memberikan Hadiah </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body my-3 text-center">
                        <h5 class="card-title">Tamu Pengunjung Undangan</h5>
                        <canvas id="pieChartUndangan" style="max-height: 300px"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 pt-2 pt-md-0">
                <div class="card">
                    <div class="card-body my-3 mx-3 text-center">
                        <h5 class="card-title">Grafik Tamu Pengunjung Undangan Harian</h5>
                        <canvas id="grafikWaktuKunjungan" style="max-height: 300px"></canvas>
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

        {{-- <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var visitorsData = @json($visitorsData);

        var dates = Object.keys(visitorsData);
        var counts = Object.values(visitorsData);

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Number of Visitors',
                    data: counts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        console.log(visitorsData);
    </script> --}}

        <script>
            $(document).ready(function() {
                var ctxPieChart = document.getElementById('pieChartUndangan').getContext('2d');
                var ctxLineChart = document.getElementById('grafikWaktuKunjungan').getContext('2d');
                var labelsLineChart = @json($banyakPengunjungPerHari->pluck('tanggal'));
                var dataLineChart = @json($banyakPengunjungPerHari->pluck('total_kunjungan'));

                var banyakPengunjung = @json($banyakPengunjung);
                var jumlahBukuTamus =
                    {{ DB::table('tbl_buku_tamus')->where('id_pesanan',DB::table('tbl_pesanans')->where('id_user', Auth::user()->id)->value('id'))->count() }};

                // PieChart
                var data = {
                    labels: ['Tamu Sudah Melihat', 'Tamu Belum Melihat'],
                    datasets: [{
                        data: [banyakPengunjung[0].total_kunjungan, jumlahBukuTamus - banyakPengunjung[0]
                            .total_kunjungan
                        ],
                        backgroundColor: ['#FF6384', '#36A2EB'],
                        hoverBackgroundColor: ['#FF6384', '#36A2EB']
                    }]
                };

                var options = {
                    type: 'pie',
                    data: data,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        piechartOutlabels: {
                            backgroundColor: null,
                            text: '64%',
                            color: 'black',
                            stretch: 45,
                            font: {
                                resizable: true,
                                minSize: 12,
                                maxSize: 18
                            }
                        }
                    }
                };

                var pieChartUndangan = new Chart(ctxPieChart, options);

                // LineChart
                var myLineChart = new Chart(ctxLineChart, {
                    type: 'line',
                    data: {
                        labels: labelsLineChart,
                        datasets: [{
                            label: 'Jumlah Tamu Pengunjung Harian ',
                            data: dataLineChart,
                            borderColor: 'rgb(75, 192, 192)',
                            borderWidth: 2,
                            fill: false,
                        }],
                    },
                    options: {
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
            });
        </script>


        @if (session('user'))
            <script>
                $(document).ready(function() {
                    // Alert
                    var toastMixin = Swal.mixin({
                        toast: true,
                        icon: 'success',
                        title: 'General Title',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    toastMixin.fire({
                        animation: true,
                        title: 'Selamat datang, {{ Auth::user()->nama }}'
                    });
                });
            </script>
        @endif
    @endsection
