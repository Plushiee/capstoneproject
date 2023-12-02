@extends('users.master')

@section('title', 'List Tamu')
@section('addCSS')

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
        <div class="box">
            <div class="box-body d-flex  justify-content-between">
                <div class="">


                    Search: <input id="filter" type="text" class="form-control input-sm w-auto inline m-r " />
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-fw primary btn-sm dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true">
                        Tambah Tamu
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start"
                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                        <button class="dropdown-item" data-toggle="modal" data-target="#modalTambah">Input Data
                            Tamu</button>
                        <button class="dropdown-item" data-toggle="modal" data-target="#modalExcel">Import Tamu
                            (Excel)</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" ui-jp="footable" data-filter="#filter" data-page-size="5">
                    <thead class="thead">
                        <tr class="b-b-warn b-b-4x blue-grey-400">
                            <td></td>
                            <td>No.</td>
                            <td>Nama tamu</td>
                            <td>No. WA</td>
                            <td>Alamat</td>
                            <td>Url Undangan</td>
                            <td>Status</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach (DB::table('tbl_buku_tamus')->where(
                'id_pesanan',
                DB::table('tbl_pesanans')->where('id_user', Auth::user()->id)->value('id'),
            )->get() as $tamunya)
                            <tr>
                                <td><input type="checkbox" class="centangTamu" name="idTamu[]" value="{{ $tamunya->id }}">
                                </td>
                                <td> {{ $loop->index + 1 }}</td>
                                <td> {{ $tamunya->nama_tamu }}</td>
                                <td> {{ $tamunya->no_wa }}</td>
                                <td> {{ $tamunya->alamat_tamu }} </td>
                                <td> <a href="{{ route('domainUndangan', ['domain' => DB::table('tbl_pesanans')->where('id_user', Auth::user()->id)->first()->domain,'tamu' => $tamunya->nama_tamu]) }}"
                                        target="_BLANK">Buka Undangan</a>
                                </td>
                                <td>
                                    @if ($tamunya->status == 'terkirim')
                                        <span class="label success">{{ $tamunya->status }}</span>
                                    @elseif($tamunya->status == 'belum dikirim')
                                        <span class="label warning">{{ $tamunya->status }}</span>
                                    @else
                                        <span>{{ $tamunya->status }}</span>
                                    @endif
                                </td>
                                {{-- <td><span class="label success">Terkirim</span></td> --}}
                                <td class="w-sm no-wrap">
                                    <button class="md-btn  md-raised w-xxs m-2" data-toggle="modal" data-target="#sw-qrcode"
                                        onclick="qrwhatsapp('{{ $tamunya->no_wa }}','{{ $tamunya->nama_tamu }}','{{ route('domainUndangan', ['domain' => DB::table('tbl_pesanans')->where('id_user', Auth::user()->id)->first()->domain,'tamu' => $tamunya->nama_tamu]) }}')">
                                        <i class="fa fa-lg fa-qrcode " title="tampilkan qr untuk kirim wa"></i></button>

                                    <a href="https://wa.me/62{{ $tamunya->no_wa }}?text=" target="_blank"> <button
                                            class="md-btn md-raised m-b-sm w-xs primary">Kirim</button></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                            <td colspan="100%"><input type="checkbox" id="centangSemua"> <i
                                    class="p-2 fa fa-long-arrow-left">
                                </i>Pilih Semua
                                <div class="btn-group ml-4">

                                    <button id="deleteSelected" class="md-btn md-raised mx-2"
                                        title="Hapus data yang dipilih">
                                        <i class="material-icons text-danger">delete</i>
                                    </button>
                                    <button id="editSelected" class="md-btn md-raised mx-2" data-toggle="tooltip"
                                        data-placement="top" title="Edit Selected">
                                        <i class="material-icons text-warn">edit</i>
                                    </button>
                                </div>
                            </td>

                        </tr>
                        <tr class="hide-if-no-paging">
                            <td colspan="100%" class="text-center hide-if-no-paging">
                                <ul class="pagination d-flex justify-content-center"></ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal untuk tambah data --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tamu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col mt-2">
                        <label>Nama Tamu Undangan</label>
                        <input id="id_pesanan" type="hidden" class="form-control"
                            value="{{ DB::table('tbl_pesanans')->where('id_user', Auth::user()->id)->first()->id }}">
                        <input id="nama_tamu" type="text" class="form-control" placeholder="Contoh : Agus Sukamto"
                            style='text-transform:capitalize' required>
                    </div>
                    <div class="col mt-2">
                        <label>Alamat Tamu Undangan</label>
                        <input id="alamat_tamu" type="text" class="form-control" placeholder="Contoh : Medan Merdeka"
                            style='text-transform:capitalize' required>
                    </div>

                    <div class="col mt-2">
                        <label>No Whatsapp</label>
                        <input id="no_wa" type="text" placeholder="Contoh : 628xxxxx" class="form-control"
                            required>
                    </div>

                    {{-- <div class="col mt-2">
                        <label>Tanggal </label>
                        <input name="datepicker" type="text" class="form-control" placeholder="Tanggal" id="datepicker"
                            readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" required>
                        <input type="hidden" id="tgl_kirim">
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="simpanTamu">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal untuk import data menggunakan excel --}}
    <div class="modal fade" id="modalExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Tamu (Excel)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="{{ route('importExcel') }}" id="uploadForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">

                            <label>File Excel</label>
                            <input type="file" name="excel" id="file" class="form-control" required
                                accept=".xls, .xlsx" />
                        </div>
                        <label class="form-check-label ">
                            <a href="{{ asset('assets/file-upload/tamu.xlsx') }}" target="_blank"
                                style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;"><i
                                    class="fa fa-question-circle" style="color:#17a2b8;"></i>&nbsp Susunan Data Untuk File
                                Data Tamu (Excel)</a>
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" id="uploadExcel">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Modal Untuk Menampilkan QR --}}

    <div class="modal fade" id="sw-qrcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">QR Code Whatsapp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div id="qrcode"></div>
                    <p>Scan untuk mengirim undangan via whatsapp</p>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('addJS')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquery.classyqr.js') }}"></script>


    <script>
        // QR Link Wa
        function qrwhatsapp(nowa, nama, urlundangan) {
            var isipesan =
                `Assalamu'alaikum Wr. Wb%0ABismillahirahmanirrahim.%0A%0AYth. ${ nama }%0A%0ATanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami : %0A%0A *nama mempelai* %0A%0ABerikut link undangan kami untuk info lengkap dari acara bisa kunjungi :%0A%0A *${ urlundangan }* %0A%0AMerupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu. %0A%0AMohon maaf perihal undangan hanya di bagikan melalui pesan ini. Terima kasih banyak atas perhatiannya. %0A%0AWassalamu'alaikum Wr. Wb. %0ATerima Kasih.`;
            var whatsappUrl = 'https://wa.me/62' + nowa + '?text=' + isipesan;

            $('#qrcode').ClassyQR({
                create: true,
                type: 'text',
                text: whatsappUrl

            });

        }
        function send


        $('#sw-qrcode').on('hidden.bs.modal', function() {
            // Reset the QR code content when the modal is closed
            $('#qrcode').empty();
        });

        $(document).ready(function() {
            // awal select semua data
            $('.centangTamu').change(function() {
                if ($('.centangTamu:checked').length === $('.centangTamu').length) {
                    $('#centangSemua').prop('checked', true);
                } else {
                    $('#centangSemua').prop('checked', false);
                }
            });

            $('#centangSemua').click(function() {
                $('.centangTamu').prop('checked', $(this).prop('checked'));
            });

            // Akhir select semua data



            // Awal Hapus Data 
            $('#deleteSelected').click(function() {
                var jml_data = $('input[name="idTamu[]"]:checked').map(function() {
                    return $(this).val();
                }).get();


                if (jml_data.length === 0) {
                    alert('No records selected for deletion.');
                    return;
                }
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },

                });
                swalWithBootstrapButtons.fire({
                    title: "Apakah Anda Yakin?",
                    text: `Data Tamu Yang Akan Dihapus Sebanyak ${jml_data.length} Data`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus Saja!",
                    cancelButtonText: "Tidak, Ora Sido!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: 'DELETE',
                            url: "{{ route('hapusTamu') }}",
                            data: {
                                id: jml_data
                            },
                            dataType: 'json',
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
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "Dibatalkan",
                            text: "Datanya Tidak Jadi Dihapus Gais :)",
                            icon: "error"
                        });
                    }
                });

            });
            // Akhir Hapus Data



            // Awal Simpan Data Tamu
            $('#simpanTamu').on('click', function() {

                // var tgl_kirim = $('#tgl_kirim').val();
                var no_wa = $('#no_wa').val();
                var nama_tamu = $('#nama_tamu').val();
                var alamat_tamu = $('#alamat_tamu').val();
                var id_pesanan = $('#id_pesanan').val();
                console.log(id_pesanan);

                if (!nama_tamu || !alamat_tamu || !no_wa) {
                    // Display an error message for required fields using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        toast: true,
                        title: 'Error',
                        text: 'Datanya Masih Ada Yang Kosong Tuh Gais',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    return; // Prevent form submission if validation fails
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //proses simpan
                $.ajax({
                    url: "{{ route('tambahTamu') }}",
                    method: "POST",

                    data: {
                        // tgl_kirim: tgl_kirim,
                        no_wa: no_wa,
                        nama_tamu: nama_tamu,
                        alamat_tamu: alamat_tamu,
                        id_pesanan: id_pesanan
                    },

                    success: function(response) {
                        console.log(response);
                        $('#modalTambah').modal('hide');
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
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        });

                        toastMixin.fire({
                            animation: true,
                            title: nama_tamu + " Berhasil Ditambahkan Sebagai Tamu"
                        }).then((result) => {


                            location.reload();

                        });
                    }
                });

            });
            // Akhir Simpan Data Tamu


        });
    </script>

    @if (session('successMessage'))
        <script>
            // Display SweetAlert
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                icon: 'success',
                title: 'OK',
                text: '{{ session('successMessage') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif
@endsection
