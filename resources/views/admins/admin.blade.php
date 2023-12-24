@extends('admins.master')

@section('title', 'Daftar User Terdaftar')

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
                            <label for="startDate">Tanggal Awal Pembuatan</label>
                            <input type="date" id="startDate" class="form-control" name="startDate">
                        </div>
                        <div class="col-md-6 pt-2 pt-md-0">
                            <label for="endDate">Tanggal Akhir Pembuatan</label>
                            <input type="date" id="endDate" class="form-control" name="endDate" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pt-3">
                <div class="card p-5">
                    <div class="table-responsive">
                        <form action="{{ route('adminAkunAdminBaru') }}" method="POST">
                            @csrf
                            <input type="hidden" name="jenis" value="baru">
                            <button type="submit" class="btn btn-success mb-3"><i class="bi bi-plus-square"></i> &nbsp;Buat
                                Akun</button>
                        </form>
                        <table id="transaksi" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Tanggal Pembuatan Akun</th>
                                    <th>Super Admin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($akunAdmin as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->no_telp }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            @if ($user->super_admin == false)
                                                Tidak
                                            @else
                                                Ya
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('adminAkunAdminBaru') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="idPengguna" value="{{ $user->id }}">
                                                <button type="submit" class="btn btn-warning">Edit Akun</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        @if (session('success'))
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
                        title: '{{ session('success') }}'
                    });
                });
            </script>
        @endif
        @if (session('successTambahAdmin'))
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
                        title: '{{ session('successTambahAdmin') }}'
                    });
                });
            </script>
        @endif
        @if (session('successEditAdmin'))
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
                        title: '{{ session('successEditAdmin') }}'
                    });
                });
            </script>
        @endif
    @endsection
