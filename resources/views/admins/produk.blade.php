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
            <div class="col-12 pt-3">
                <div class="card p-5">
                    <div class="table-responsive">
                        {{-- <form action="{{ route('produkForm') }}" method="POST">
                            @csrf
                            <input type="hidden" name="jenis" value="baru">
                            <button type="submit" class="btn btn-success mb-3"><i class="bi bi-plus-square"></i>
                                &nbsp;Produk Baru</button>
                        </form> --}}
                        <table id="produk" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Asli</th>
                                    <th>Harga Awal</th>
                                    <th>status</th>
                                    <th>aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $produk)
                                    <tr>
                                        <td></td>
                                        <td>{{ $produk->id }}</td>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>@currency($produk->harga_asli)</td>
                                        <td>@currency($produk->biaya_dasar)</td>
                                        <td>{!! $produk->aktif == 1
                                            ? '<span class="label success"> enable</span>'
                                            : '<span class="label danger"> disable</span>' !!}</td>
                                        <td>
                                            <form action="{{ route('produkForm') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="idProduk" value="{{ $produk->id }}">
                                                {{-- <input type="hidden" name="jenis" value="Update"> --}}
                                                {{-- <button type="submit" class="btn btn-warning">Edit Akun</button> --}}
                                                <button type="submit" class="btn btn-warning"><i
                                                        class="bi bi-pencil-square"></i>
                                                    &nbsp;Edit</button>
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


        <!-- Data Table -->
        <script>
            $(document).ready(function() {
                $('#produk').dataTable();

            });
        </script>
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

    @endsection
