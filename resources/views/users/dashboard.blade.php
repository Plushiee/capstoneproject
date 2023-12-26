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
                                {{ $tamu->count() }}
                                <span class="text-sm">Tamu</span>
                            </a></h4>
                        <small class="text-muted">Diundang</small>
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
                        <h4 class="m-0 text-lg _300"><a
                                href="{{ route('userListTamu') }}">{{ $tamu->where('kehadiran', 'hadir')->count() }}
                                <span class="text-sm">Tamu</span>
                            </a></h4>
                        <small class="text-muted">Akan Hadir</small>
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
                        <h4 class="m-0 text-lg _300"><a href="{{ route('userListTamu') }}">
                                {{ $tamu->where('kehadiran', 'tidak hadir')->count() }}
                                <span class="text-sm">Tamu</span>
                            </a></h4>
                        <small class="text-muted">Tidak Hadir</small>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded warn">
                            <i class="material-icons">&#xe8b5;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a
                                href="{{ route('userListTamu') }}">{{ $tamu->where('kehadiran', 'belum konfirmasi')->count() }}
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
                            <i class="material-icons">&#xe0b9;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a href="{{ route('userUcapan') }}">{{ $ucapan->count() }} <span
                                    class="text-sm">Ucapan</span></a>
                        </h4>
                        <small class="text-muted">Telah ditampilkan </small>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xs-6 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded pink-500">
                            <i class="material-icons">&#xe8f6;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><a href>600 <span class="text-sm">Tamu</span></a></h4>
                        <small class="text-muted">Memberikan Hadiah </small>
                    </div>
                </div>
            </div> -->
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
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body my-3 text-center">
                        <h5 class="card-title">Persentase Kehadiran Tamu</h5>
                        <canvas id="chartkehadiran" style="max-height: 300px"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 pt-4">
                <div class="card">
                    <div class="card-body my-3 mx-3 text-center">
                        <h5 class="card-title">Grafik Tamu Pengunjung Undangan Harian</h5>
                        <canvas id="grafikWaktuKunjungan" style="max-height: 300px"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 pt-4 ">
                <div class="card activities">
                    <div class="card-body my-3 mx-3 text-center">
                        <h5 class="card-title">Pengunjung Terbaru</h5>

                    </div>
                    <div class="body container" style="max-height: 300px; overflow-y: scroll">
                        <div class="streamline b-l b-accent">

                            @foreach ($pengunjung as $pengunjung)
                                <div class="sl-item b-info">
                                    <div class="sl-content">
                                        <div class="text-muted-dk">Diperbarui pada:
                                            {{ \Carbon\Carbon::parse($pengunjung->update)->format('H:i') }}</div>
                                        <p> <strong class="text-info"> {{ $pengunjung->nama }}</strong> mengunjungi
                                            undangan
                                            pada tanggal
                                            {{ \Carbon\Carbon::parse($pengunjung->create)->format('d M Y') }} sebanyak

                                            {{ $pengunjung->jumlah }} kali</p>
                                    </div>
                                </div>
                            @endforeach
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

                function createAttendanceChart(data) {
                    var ctx = document.getElementById('chartkehadiran').getContext('2d');

                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Hadir', 'Tidak Hadir',
                                'belum Konfirmasi'
                            ],
                            datasets: [{
                                data: data,
                                backgroundColor: ['#6cc788', '#f44455', '#fcc100'],
                            }],
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    // position: 'right',
                                    display: false,
                                },
                            },
                        },
                    });
                }
                const attendanceData = ["{{ $tamu->where('kehadiran', 'hadir')->count() }}",
                    "{{ $tamu->where('kehadiran', 'tidak hadir')->count() }}",
                    "{{ $tamu->where('kehadiran', 'belum konfirmasi')->count() }}"
                ];
                createAttendanceChart(attendanceData);

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
