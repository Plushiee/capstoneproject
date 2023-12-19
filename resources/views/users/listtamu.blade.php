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
                <table class="table table-bordered" ui-jp="footable" data-filter="#filter" data-page-size="10"
                    id="datatamu">
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

                    <tbody id=tbodytamu>

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
                                    <button id="updateKirim" class="md-btn md-raised mx-2" data-toggle="tooltip"
                                        data-placement="top" title="Tandai Terkirim">
                                        <i class="material-icons text-success">done</i>
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
                        <input id="id_pesanan" type="hidden" class="form-control" value="{{ $idpesanan->first() }}">
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
                        <input id="no_wa" type="text" placeholder="Contoh : 628xxxxx" class="form-control" required>
                    </div>
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
                            <a href="{{ asset('assets/file-upload/tamunya.xlsx') }}" target="_blank"
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

    <script src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquery.classyqr.js') }}"></script>

    <script>
        $(document).ready(function() {
            loadData();
        });

        function loadData() {

            $.ajax({
                url: '{{ route('getListTamu') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    populateTable(data);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        function populateTable(data) {
            var tbody = $('#tbodytamu');
            tbody.empty();

            $.each(data.tamuData, function(index, tamunya) {

                var row = `
      <tr>
        <td><input type="checkbox" class="centangTamu" name="idTamu[]" value="${tamunya.idtamu}"></td>
        <td>${index + 1}</td>
        <td>${tamunya.nama_tamu}</td>
        <td>${tamunya.no_wa || ''}</td>
        <td>${tamunya.alamat_tamu}</td>
        <td><a href="{{ url('/${tamunya.domain}/${tamunya.nama_tamu}') }}" target="_BLANK">Buka Undangan</a></td>
        <td>${getStatusLabel(tamunya.status)}</td>
        <td class="w-sm no-wrap">
          <button class="md-btn md-raised w-xxs m-2" data-toggle="modal" data-target="#sw-qrcode" onclick="qrwhatsapp('${tamunya.no_wa}','${tamunya.nama_tamu}', '{{ url('/${tamunya.domain}/${tamunya.nama_tamu}') }}', '${tamunya.nama_panggilan_pria} dan ${tamunya.nama_panggilan_wanita}')">
            <i class="fa fa-lg fa-qrcode" title="tampilkan qr untuk kirim wa"></i>
          </button>
          <button class="md-btn md-raised m-b-sm w-xs primary" onclick="kirimwa('${tamunya.no_wa}','${tamunya.nama_tamu}', '{{ url('/${tamunya.domain}/${tamunya.nama_tamu}') }}', '${tamunya.nama_panggilan_pria} dan ${tamunya.nama_panggilan_wanita}')">
            Kirim
          </button>
        </td>
      </tr>
    `;

                tbody.append(row);
            });
        }


        function getStatusLabel(status) {
            if (status === 'terkirim') {
                return '<span class="label success">terkirim</span>';
            } else if (status === 'belum dikirim') {
                return '<span class="label warning">belum dikirim</span>';
            } else {
                return `<span>${status}</span>`;
            }
        }
    </script>
    <script>
        // QR Link Wa
        function qrwhatsapp(nowa, nama, urlundangan, namamempelai) {
            var isipesan =
                `Assalamu'alaikum Wr. Wb%0ABismillahirahmanirrahim.%0A%0AYth. ${ nama }%0A%0ATanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami : %0A%0A *${namamempelai}* %0A%0ABerikut link undangan kami untuk info lengkap dari acara bisa kunjungi :%0A%0A *${ urlundangan }* %0A%0AMerupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu. %0A%0AMohon maaf perihal undangan hanya di bagikan melalui pesan ini. Terima kasih banyak atas perhatiannya. %0A%0AWassalamu'alaikum Wr. Wb. %0ATerima Kasih.`;
            var whatsappUrl = 'https://wa.me/62' + nowa + '?text=' + isipesan;

            $('#qrcode').ClassyQR({
                create: true,
                type: 'url',
                url: whatsappUrl

            });
        }

        function kirimwa(nowa, nama, urlundangan, namamempelai) {
            var isipesan =
                `Assalamu'alaikum Wr. Wb%0ABismillahirahmanirrahim.%0A%0AYth. ${ nama }%0A%0ATanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami : %0A%0A *${namamempelai}* %0A%0ABerikut link undangan kami untuk info lengkap dari acara bisa kunjungi :%0A%0A *${ urlundangan }* %0A%0AMerupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu. %0A%0AMohon maaf perihal undangan hanya di bagikan melalui pesan ini. Terima kasih banyak atas perhatiannya. %0A%0AWassalamu'alaikum Wr. Wb. %0ATerima Kasih.`;
            var whatsappUrl = 'https://wa.me/62' + nowa + '?text=' + isipesan;
            window.open(whatsappUrl, '_blank');

        }

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
                    // alert('No records selected for deletion.');
                    Swal.fire({
                        icon: 'warning',
                        toast: true,
                        title: 'Perhatian',
                        text: 'Harap Pilih data Yang Mau Dihapus',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
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
                                        timer: 2000,
                                    }).then((result) => {
                                        location.reload();
                                        // $('#daftartamu').Datatable({}).ajax
                                        //     .reload();
                                        // $("#dataTamu").load(populateTable());


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

            $('#updateKirim').click(function() {
                var jml_data = $('input[name="idTamu[]"]:checked').map(function() {
                    return $(this).val();
                }).get();


                if (jml_data.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        toast: true,
                        title: 'Perhatian',
                        text: 'Harap Pilih data Yang Ditandai Terkirim',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    })
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
                    text: `Tandai ${jml_data.length} Data Sebagai Terkirim`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Saya sudah kirim!",
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
                            type: 'POST',
                            url: "{{ route('updateKirim') }}",
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
                            text: "Datanya Tidak Jadi Diubah Gais :)",
                            icon: "error"
                        });
                    }
                });

            })



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
