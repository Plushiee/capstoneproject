@extends('admins.master')

@if ($tipe === 'baru')
    @section('title', 'Tambah Produk')
@else
    @section('title', 'Edit Produk')
@endif

@section('addCSS')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
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
                    <form action="{{ route('produkSimpan') }}" method="post">
                        @csrf
                        @if ($tipe === 'baru')
                            <input type="hidden" name="submit" value="baru" required />
                            <div class="form-group">
                                <label for="nama">Nama Produk</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Contoh: Tema Undangan Adat Jawa" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="harga_asli">Harga Asli</label>
                                <input type="number" class="form-control" id="harga_asli" name="harga_asli"
                                    placeholder="100000" required>
                            </div>
                            <div class="form-group">
                                <label for="biaya_dasar">Biaya Dasar</label>
                                <input type="number" class="form-control" id="biaya_dasar" name="biaya_dasar"
                                    placeholder="100000" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="aktif" value="0">
                                <input type="checkbox" name='aktif' id='status_produk' data-on="Enable" data-off="Disable"
                                    data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="xs"
                                    value='1'>

                            </div>



                            <button type="submit" class="btn btn-primary submit" required>Tambah</button>
                        @else
                            <input type="hidden" name="idProduk" id="idProduk" value="{{ $produk[0]->id }}" required />
                            <div class="form-group">
                                <label for="nama">Nama Produk</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Contoh: Tema Undangan Adat Jawa" value="{{ $produk[0]->nama_produk }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="harga_asli">Harga Asli</label>
                                <input type="number" class="form-control" id="harga_asli" name="harga_asli"
                                    placeholder="100000" value="{{ $produk[0]->harga_asli }}" required>
                            </div>
                            <div class="form-group">
                                <label for="biaya_dasar">Biaya Dasar</label>
                                <input type="number" class="form-control" id="biaya_dasar" name="biaya_dasar"
                                    placeholder="100000" value="{{ $produk[0]->biaya_dasar }}" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="aktif" value="0">
                                <input {{ $produk[0]->aktif === 1 ? 'checked' : '' }} type="checkbox" name='aktif'
                                    id='status_produk' data-on="Enable" data-off="Disable" data-toggle="toggle"
                                    data-onstyle="success" data-offstyle="danger" data-size="xs" value='1'>


                            </div>

                            <button type="submit" class="btn btn-primary submit" required>Update</button>
                            {{-- <div id="btnHapus" class="btn btn-danger"><i class="bi bi-trash3"></i>
                                &nbsp;Hapus
                            </div> --}}
                        @endif
                    </form>

                </div>
            </div>
        </div>
    @endsection

    @section('addJS')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Chart JS Script Start-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

        <!-- Chart JS Script End-->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#btnHapus').on('click', function() {

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('produkHapus') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            idProduk: $('#idProduk').val()
                        },
                        success: function(response) {
                            console.log(response.message)

                        }

                    });
                })


            });
        </script>

    @endsection
