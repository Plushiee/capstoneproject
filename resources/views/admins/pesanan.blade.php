@extends('admins.master')

@section('title', 'Daftar Pesanan')

@section('addCSS')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection

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
            <div class="col-12 pt-1">
                <div class="card p-5">
                    <h5 class="card-title">Filter Waktu</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="startDate">Tanggal Awal Transaksi</label>
                            <input type="date" id="startDate" class="form-control" name="startDate">
                        </div>
                        <div class="col-md-6 pt-2 pt-md-0">
                            <label for="endDate">Tanggal Akhir Transaksi</label>
                            <input type="date" id="endDate" class="form-control" name="endDate" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <a id="unduhLaporanLink" href="#" class="btn btn-success mt-3">
                                <i class="bi bi-file-earmark-arrow-down"></i>
                                &nbsp;Unduh Laporan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pt-3">
                <div class="card p-5">
                    <div class="table-responsive">
                        <table id="transaksi" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>Nama Pemesan</th>
                                    <th>Jenis Produk</th>
                                    <th>Domain Web</th>
                                    <th>Biaya</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanans as $index => $pesanan)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $pesanan->id }}</td>
                                        <td>{{ $pesanan->nama }}</td>
                                        <td>{{ $pesanan->nama_produk }}</td>
                                        <td> <a href="{{ route('domainUndangan', ['domain' => $pesanan->domain]) }}">
                                                {{ $pesanan->domain }}</a></td>
                                        <td>{{ $pesanan->biaya }}</td>
                                        <td>{{ $pesanan->created_at }}</td>
                                        <td>
                                            @if ($pesanan->status_pembayaran != 'lunas')
                                                @if ($pesanan->status_pesanan === 'perlu konfirmasi')
                                                    <button class="btn btn-raised btn-warning confirmOrderBtn"
                                                        data-toggle="modal" data-target="#confirmOrder" data-order-id="{{ $pesanan->id }}">Konfirmasi
                                                        Pembayaran</button>
                                                @else
                                                    <span class="label danger">Belum Konfirmasi</span>
                                                @endif
                                            @else
                                                <span class="label success">{{ strtoupper($pesanan->status_pembayaran) }}
                                                </span>
                                                @if ($pesanan->status_pesanan != null)
                                                    <span class="label primary"> {{ $pesanan->status_pesanan }}</span>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirmOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset($dirbukti . $mempelai->where('id_pesanan', $pesanan->id)->first()->id . $pesanan->id . '_' . \Carbon\Carbon::parse($mempelai->where('id_pesanan', $pesanan->id)->first()->created_at)->format('YmdHis') . '/bukti_transfer.jpg') }}"
                            alt="Image" class="img-fluid">
                        <form action="{{ route('adminPesananLunas') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="orderIdInput" value="">
                            <input type="hidden" name="admin"
                                value="{{ auth()->user()->id . ' - ' . auth()->user()->nama }}">
                            <div class="col mt-2">
                                <label>Pesan</label>
                                <textarea id="isiPesan" type="text" class="form-control" placeholder="Masukan Pesan" rows="3" disabled>{{ $pesanan->pesan }}</textarea>
                            </div>

                            <div class="modal-footer">

                                <button type="submit" class="btn btn-success">Lunas</button>
                            </div>
                        </form>
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
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

        <!-- Download Laporan -->
        <script>
            $(document).ready(function() {
                $('.confirmOrderBtn').on('click', function() {
                    var orderId = $(this).data('order-id');
                    $('#orderIdInput').val(orderId);
                });

                function download(startDate, endDate) {
                    var downloadUrl = '';
                    if (startDate == '') {
                        downloadUrl = '/admin/pesanan/laporan/';
                    } else {
                        if (endDate == '') {
                            downloadUrl = `/admin/pesanan/laporan/${startDate}`;
                        } else {
                            downloadUrl = `/admin/pesanan/laporan/${startDate}/${endDate}`;
                        }
                    }
                    window.open(downloadUrl, '_blank');
                }

                function onUnduhLaporanClick() {

                    var startDate = $('#startDate').val();
                    var endDate = $('#endDate').val();

                    download(startDate, endDate);
                }

                $('#unduhLaporanLink').on('click', function(e) {
                    e.preventDefault();
                    onUnduhLaporanClick();
                });
            });
        </script>

        <!-- Data Table -->
        <script>
            $(document).ready(function() {
                function initializeDataTable(table, startDateId, endDateId, applyFilterBtnId, resetFilterBtnId,
                    dateColumnTarget) {
                    if (!$.fn.DataTable.isDataTable(table)) {
                        $(table).DataTable({
                            columnDefs: [{
                                targets: [dateColumnTarget],
                                type: 'date',
                                render: function(data, type, full, meta) {
                                    return moment(data).format('YYYY-MM-DD');
                                }
                            }]
                        });
                    }

                    $.fn.dataTable.ext.search.push(
                        function(settings, data, dataIndex) {
                            var startDate = $('#' + startDateId).val();
                            var endDate = $('#' + endDateId).val();
                            var columnDate = data[dateColumnTarget];

                            if (!startDate && !endDate) {
                                return true;
                            }

                            var currentDate = moment(columnDate, 'YYYY-MM-DD');
                            var startFilter = startDate ? moment(startDate, 'YYYY-MM-DD') : null;
                            var endFilter = endDate ? moment(endDate, 'YYYY-MM-DD') : null;

                            if (startFilter && endFilter) {
                                return currentDate.isBetween(startFilter, endFilter, null, '[]');
                            } else if (startFilter) {
                                return currentDate.isSameOrAfter(startFilter);
                            } else if (endFilter) {
                                return currentDate.isSameOrBefore(endFilter);
                            }

                            return true;
                        }
                    );

                    $('#' + applyFilterBtnId).on('click', function(e) {
                        e.preventDefault();
                        table.DataTable().draw();
                    });

                    $('#' + resetFilterBtnId).on('click', function(e) {
                        e.preventDefault();
                        $('#' + startDateId).val('');
                        $('#' + endDateId).val('');
                        table.DataTable().draw();
                    });

                    $('#' + startDateId + ', #' + endDateId).on('change', function() {
                        table.DataTable().draw();
                    });
                }

                var table = $('#transaksi');
                initializeDataTable(table, 'startDate', 'endDate', 'applyFilter', 'resetFilter', 6);

                const startDateInput = document.getElementById("startDate");
                const endDateInput = document.getElementById("endDate");

                startDateInput.addEventListener("input", function() {
                    endDateInput.min = this.value;
                    if (this.value == '') {
                        endDateInput.value = '';
                        endDateInput.disabled = true;
                    } else {
                        endDateInput.disabled = false;
                    }
                    console.log(this.value);
                });

                endDateInput.addEventListener("input", function() {
                    startDateInput.max = this.value;
                });
            });
        </script>

        @if (session('lunas'))
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
                        title: '{{ session('lunas') }}'
                    });
                });
            </script>
        @endif
    @endsection
