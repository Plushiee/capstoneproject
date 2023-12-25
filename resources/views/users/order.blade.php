@extends('users.master')

@section('title', 'Orders')



@section('addCSS')
    <style>
        @media print {
            /* @page {
                                                                                                                                                                                                                                                                                                                                                                size: A4 landscape;
                                                                                                                                                                                                                                                                                                                                                            } */

            #aside,
            .p-a.white.lt.box-shadow {
                display: none !important;
            }

            body {
                background-color: rgba(255, 255, 255, 0.8);

            }

            .padding {
                display: block;


            }
        }
    </style>

@endsection
@section('contents')
    <div class="p-a white lt box-shadow">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0 _300">@yield('title')</h4>
            </div>

        </div>
    </div>
    <div class="padding">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card p-3">
                        <div class="header pb-2">
                            <h2>Invoices Detail</h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <img src="{{ asset('assets/images/logo-only.png') }}" width="70" alt="velonic">
                                    <h4 class="float-md-right">Invoice #<strong>{{ $pesanan->id }}</strong></h4>
                                    <hr>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <address>
                                        <strong>{{ $pesanan->nama }}</strong><br>

                                        {{ $pesanan->email }}<br>
                                        <abbr title="Phone">No. telp: </abbr> {{ $pesanan->no_telp }}
                                    </address>
                                </div>
                                <div class="col-md-6 col-sm-6 text-right">
                                    <p><strong>Order Date:
                                        </strong>{{ \Carbon\Carbon::parse($pesanan->pesanan_created_at)->format('d M y') }}
                                    </p>
                                    <p class="mb-0"><strong>Order Status: </strong>
                                        @if ($pesanan->status_pembayaran == 'lunas')
                                            <span class="label success">Lunas</span>
                                        @else
                                            <span class="label warning">Pending</span>
                                        @endif

                                    </p>
                                    @if ($pesanan->status_pembayaran != 'lunas')
                                        <p class="label warn text-right mb-0">Harap lakukan pembayaran
                                            #{{ $pesanan->id }}<br>
                                            sebesar: @currency($pesanan->biaya)
                                            <br>
                                            ke rek BeCeA: 123456 a/n:
                                            kel1
                                            <br>Sebelum:
                                            {{ \Carbon\Carbon::parse($pesanan->pesanan_created_at)->addDays(7)->format('d M y') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="mainTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Produk</th>
                                                    <th>domain</th>
                                                    <th>Harga</th>

                                                    <th class="text-right">Total</th>

                                                </tr>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>{{ $pesanan->nama_produk }}</td>
                                                    <td> <a
                                                            href="{{ route('domainUndangan', ['domain' => $pesanan->domain]) }}">
                                                            {{ $pesanan->domain }}</a></td>
                                                    <td>@currency($pesanan->biaya_dasar)</td>

                                                    <td class="text-right">@currency($pesanan->biaya_dasar)</td>
                                                </tr>

                                                @if ($pesanan->id_admin !== null)
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        <td></td>
                                                        @if ($pesanan->biaya_dasar !== $pesanan->biaya)
                                                            <td class="text-right">Voucher Admin:
                                                                @currency($pesanan->biaya_dasar - $pesanan->biaya)</td>
                                                        @endif
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                    <td></td>

                                                    <td class="text-right">
                                                        <hr><b>Total Bayar:</b> @currency($pesanan->biaya)
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <hr>
                                </div>
                                <div class="col-md-12 text-right hidden-print">
                                    <a href="#" onclick="window.print();" class="btn btn-raised btn-success"><i
                                            class="material-icons">&#xe8ad;</i></a>

                                    @if ($pesanan->status_pembayaran != 'lunas')
                                        @if ($pesanan->status_pesanan !== 'perlu konfirmasi')
                                            <button class="btn btn-raised btn-warning" data-toggle="modal"
                                                data-target="#confirmOrder">Konfirmasi
                                                Pembayaran</button>
                                        @else
                                            <img src="{{ asset('assets/file-upload/image/confirm_order.gif') }}"
                                                alt="Sedah Ditinjau" width="15%">
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Orderan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col mt-2">
                        <label>Pesan</label>
                        <textarea id="isiPesan" type="text" class="form-control" placeholder="Masukan Pesan" rows="3"></textarea>
                    </div>
                    <div class="col mt-2">
                        <label for="fileBukti">Upload Bukti</label>
                        <input type="file" class="form-control-file" id="fileBukti" name="fileBukti">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="simpanBukti">Simpan</button>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('addJS')
    <script>
        $(document).ready(function() {


            $('#simpanBukti').on('click', function() {
                var pesan = $('#isiPesan').val();
                var fileInput = $('#fileBukti')[0].files[0];

                var formData = new FormData();
                formData.append('pesan', pesan);
                formData.append('fileBukti', fileInput);
                formData.append('idPesanan', {{ $pesanan->id }})
                console.log(formData);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('uploadBukti') }}",
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(response) {
                        if (response.success) {

                            Swal.fire({
                                icon: 'success',
                                toast: true,
                                title: 'Berhasil',
                                text: response.message,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                            }).then((result) => {
                                location.reload();
                            });

                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(error) {
                        console.log(error);

                    }
                });
            });
        });
    </script>
@endsection
