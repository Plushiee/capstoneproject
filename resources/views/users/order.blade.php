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
                                                    <td>{{ $pesanan->domain }}</td>
                                                    <td>@currency($pesanan->biaya_dasar)</td>

                                                    <td class="text-right">@currency($pesanan->biaya_dasar)</td>
                                                </tr>

                                                @if ($pesanan->id_admin !== null)
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        <td></td>

                                                        <td class="text-right">Voucher Admin: -@currency(20000)</td>

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
                                        <button class="btn btn-raised btn-warning">Konfirmasi
                                            Pembayaran</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    




@endsection
@section('addJS')
    <script></script>
@endsection
