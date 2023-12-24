@extends('admins.download.master')

@section('title', 'MoneyTrash! - Laporan')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

@endsection

@section('contents')
    <!-- Your Content Here -->
    <h2>Laporan Transaksi</h2>
    @if ($tanggalMulai != null && $tanggalAkhir != null)
        <h5>Periode {{ $tanggalMulai }} sampai {{ $tanggalAkhir }}</h5>
    @elseif ($tanggalMulai != null && $tanggalAkhir == null)
        <h5>Periode {{ $tanggalMulai }} sampai {{ \Carbon\Carbon::today()->toDateString() }}</h5>
    @elseif ($tanggalMulai == null && $tanggalAkhir != null)
        <h5>Periode Awal Transaksi sampai {{ $tanggalAkhir }}</h5>
    @endif
    <div class="row">
        <div class="col-12 col-md-12">
            <table id="transaksiTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pemesan</th>
                        <th>Jenis Produk</th>
                        <th>Domain Web</th>
                        <th>Biaya</th>
                        <th>Tanggal Pesanan</th>
                        <th>Status Pembaytaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanans as $index => $pesanan)
                        <tr>
                            <td>{{ $pesanan->id }}</td>
                            <td>{{ $pesanan->nama }}</td>
                            <td>{{ $pesanan->nama_produk }}</td>
                            <td>{{ $pesanan->domain }}</td>
                            <td>{{ $pesanan->biaya }}</td>
                            <td>{{ $pesanan->created_at }}</td>
                            <td>
                                @if ($pesanan->status_pembayaran != 'lunas')
                                    @if ($pesanan->status_pesanan === 'perlu konfirmasi')
                                        Perlu Konfirmasi
                                    @else
                                        Belum Konfirmasi
                                    @endif
                                @else
                                    {{ $pesanan->status_pembayaran }}
                                @endif
                            </td>
                        </tr>
                        @if (($index + 1) % 15 == 0 && $index + 1 !== count($pesanans))
                            <tr>
                                <td colspan="7">
                                    {{ $index + 1 === count($pesanans) }}
                                    <div style="page-break-before: always;"></div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"
        integrity="sha512-pdCVFUWsxl1A4g0uV6fyJ3nrnTGeWnZN2Tl/56j45UvZ1OMdm9CIbctuIHj+yBIRTUUyv6I9+OivXj4i0LPEYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Automatically provides/replaces `Promise` if missing or broken. -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script>

    <!-- Minified version of `es6-promise-auto` below. -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

    <script>
        $(document).ready(function() {
            function download() {
                var element = document.getElementById('wrapper');
                html2pdf(element, {
                    margin: 0,
                    filename: 'ManToe-Laporan_Transaksi.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 1
                    },
                    html2canvas: {
                        scale: 2,
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'landscape'
                    }
                });
            };
            setTimeout(() => {
                download();
            }, 1500);
        });
    </script>

@endsection
