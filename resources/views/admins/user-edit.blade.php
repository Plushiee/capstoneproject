@extends('admins.master')

@section('title', 'Edit User')

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
            <div class="col-12 pt-2">
                <div class="card p-5">
                    <form action="{{route('adminAkunUserSimpan')}}" method="post">
                        @csrf
                        <input type="hidden" name="idPengguna" value="{{$akunUser[0]->id}}" required />
                        <div class="form-group">
                            <label for="nama">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{{$akunUser[0]->nama}}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{$akunUser[0]->email}}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="nomor">Nomor Telepon</label>
                            <input type="text" class="form-control" id="nomor" name="nomor" placeholder="" value="{{$akunUser[0]->no_telp}}"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary" required>Update</button>
                    </form>
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
                initializeDataTable(table, 'startDate', 'endDate', 'applyFilter', 'resetFilter', 4);
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
