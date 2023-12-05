@extends('users.master')

@section('title', 'Acara')

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
        <div class="btn-group d-flex justify-content-end my-3">
            <button id="addacara" data-toggle="modal" data-target="#modalTambah" class="md-btn md-raised primary">Tambah
                acara</button>
        </div>

        <div class="row ">
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="p-1 mx-3">
                            Countdown Acara
                        </div>

                        <div class="btn-group">

                            <button class=" md-btn md-raised p-0 px-2 ml-2 text-primary" title="Simpan Data"
                                onclick="updateCountdown()">
                                <i class="material-icons text-primary w-s mr-1">save</i>simpan
                            </button>
                        </div>

                    </div>
                    <div class="card-header">

                        <label>Pilih Acara Untuk Countdown</label>
                        <select class="form-control" id="acara" name="acara" required>
                            <option value="">--Pilih Nama Acara--</option>
                            @foreach ($acara as $cd_acara)
                                <option id="nama_id{{ $cd_acara->id }}" value="{{ $cd_acara->id }}"
                                    {{ $cd_acara->countdown == 1 ? 'selected' : '' }}>
                                    {{ $cd_acara->nama_acara }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div >
            @foreach ($acara as $acara)
                <div class="col-6 my-3">
                    <div class="card">
                        <div class="card-header ">
                            <div class="p-1">Data acara #{{ $loop->index + 1 }}
                                <button class=" d-none md-btn md-raised p-0 px-2 ml-2 text-primary" title="Simpan Data"
                                    onclick="saveEdit({{ $loop->index + 1 }})" id="saveBtn{{ $loop->index + 1 }}">
                                    <i class="material-icons text-primary w-s mr-1">save</i>simpan
                                </button>
                            </div>
                            <div class="box-tool">
                                <ul class="nav">
                                    <li class="nav-item inline dropdown">
                                        <a class="nav-link" data-toggle="dropdown">
                                            <i class="material-icons md-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-scale pull-right">
                                            <a class="dropdown-item" onclick="enableEdit({{ $loop->index + 1 }})">Edit</a>
                                            <a class="dropdown-item"
                                                onclick="hapusAcara({{ $acara->id }},'{{ $acara->nama_acara }}')">Hapus</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-header">
                            <div class="row align-item-center">
                                <div class="col">
                                    <label>Nama Acara</label>
                                    <input id="editFormNama{{ $loop->index + 1 }}" data-idacara="{{ $acara->id }}"
                                        name="" type="text" class="form-control" placeholder="Contoh : Resepsi"
                                        value="{{ $acara->nama_acara }}" required disabled>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col">
                                    <label>Waktu Acara</label>
                                    <input id="editFormWaktu{{ $loop->index + 1 }}" name="" type="datetime-local"
                                        class="form-control" value="{{ $acara->waktu_acara }}" required disabled>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col">
                                    <label>Tempat Acara</label>
                                    <input id="editFormTempat{{ $loop->index + 1 }}" name="" type="text"
                                        class="form-control" placeholder="Contoh : Kediaman mempelai putri"
                                        value="{{ $acara->tempat_acara }}" required disabled>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col">
                                    <label>Alamat Acara</label>
                                    <input id="editFormAlamat{{ $loop->index + 1 }}" name="" type="text"
                                        class="form-control" placeholder="Contoh : Jl.durian no.10, indonesia"
                                        value="{{ $acara->alamat_acara }}" required disabled>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col">
                                    <label>iframe google maps</label>
                                    <textarea id="editFormMaps{{ $loop->index + 1 }}" name="" type="text" class="form-control"
                                        placeholder="Contoh: <iframe src='https://www.google.com/maps/></iframe>" rows="4" required disabled>{{ $acara->google_map }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Acara</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col mt-2">
                        <input id="id_pesanan" type="hidden" class="form-control"
                            value="{{ DB::table('tbl_pesanans')->where('id_user', Auth::user()->id)->first()->id }}">
                        <label>Nama Acara</label>
                        <input id="nama_acara" type="text" class="form-control" placeholder="Contoh: Resepsi"
                            required>
                    </div>
                    <div class="col mt-1">
                        <label>Waktu Acara</label>
                        <input id="waktu_acara" type="datetime-local" class="form-control" required>

                    </div>
                    <div class="col mt-2">
                        <label>Tempat Acara</label>
                        <input id="tempat_acara" type="text" class="form-control"
                            placeholder="Contoh : Kediaman Mempelai Putri" style='text-transform:capitalize' required>
                    </div>
                    <div class="col mt-2">
                        <label>Alamat Acara</label>
                        <input id="alamat_acara" type="text" class="form-control"
                            placeholder="Contoh : Jl.Jendral Sudirman, Jakarta " style='text-transform:capitalize'
                            required>
                    </div>

                    <div class="col mt-2">
                        <label>Google Maps Acara (opsional)</label>
                        <textarea id="googlemap_acara" type="text" class="form-control"
                            placeholder="Contoh : https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31673.71275825069!2d109.9343848761109!3d-7.101167651839949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7013497f504245%3A0x2ab97b5012ad2a6b!2sAlun%20Alun%20Kota%20Bawang!5e0!3m2!1sid!2sid!4v1701507384746!5m2!1sid!2sid"
                            rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="tambahAcara()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addJS')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function tambahAcara() {
            var id_pesanan = $('#id_pesanan').val();
            var saveFormNama = $('#nama_acara').val();
            var saveFormWaktu = $('#waktu_acara').val();
            var saveFormTempat = $('#tempat_acara').val();
            var saveFormAlamat = $('#alamat_acara').val();
            var saveFormMaps = $('#googlemap_acara').val();
            if (!saveFormNama || !saveFormWaktu || !saveFormTempat || !saveFormAlamat) {
                Swal.fire({
                    icon: 'error',
                    toast: true,
                    title: 'Error',
                    text: 'Datanya Masih Ada Yang Kosong Tuh Gais',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
                // return;
            }
            var data = {
                id_pesanan: id_pesanan,
                saveFormNama: saveFormNama,
                saveFormWaktu: saveFormWaktu,
                saveFormTempat: saveFormTempat,
                saveFormAlamat: saveFormAlamat,
                saveFormMaps: saveFormMaps
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('tambahAcara') }}",
                data: data,
                success: function(response) {
                    $('#modalTambah').modal('hide');
                    // console.log(response, message);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        icon: 'success',
                        title: 'OK',
                        text: response.message,
                        timer: 3000,
                        showConfirmButton: false
                    }).then((result) => {


                        // location.reload();

                    });
                },
                error: function(error) {
                    console.error(error);
                }
            })
        }

        function enableEdit(index) {

            $(`#editFormNama${index}, #editFormWaktu${index}, #editFormTempat${index}, #editFormAlamat${index}, #editFormMaps${index}`)
                .prop('disabled', false);
            $(`#saveBtn${index}`).removeClass('d-none');
        }

        function saveEdit(index) {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('updateAcara') }}",
                data: {
                    idAcara: $('#editFormNama' + index).data('idacara'),
                    editFormNamaBaru: $('#editFormNama' + index).val(),
                    editFormWaktuBaru: $('#editFormWaktu' + index).val(),
                    editFormTempatBaru: $('#editFormTempat' + index).val(),
                    editFormAlamatBaru: $('#editFormAlamat' + index).val(),
                    editFormMapsBaru: $('#editFormMaps' + index).val()
                },
                success: function(response) {
                    if (response.success) {
                        // Optionally, you can add a success message or perform other actions
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Data Cerita #' + index,
                            text: response.message,
                            timer: 3000,
                            showConfirmButton: false
                        });
                        // alert('Data Cerita #' + index + " " + response.message);
                        $(`#editFormNama${index}, #editFormWaktu${index}, #editFormTempat${index}, #editFormAlamat${index}, #editFormMaps${index}`)
                            .prop('disabled', true);
                        $(`#saveBtn${index}`).addClass('d-none');

                    } else {
                        // Handle errors if needed

                        alert('Failed to save changes. ' + response.message);
                        $(`#editFormJudul${index}, #editFormIsi${index}, #editFormTanggal${index}`).prop(
                            'disabled', true);
                        // $(`#saveBtn${index}`).removeClass('d-none');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX errors
                    // console.error(xhr.responseText + data);
                    console.log(data);
                }
            });
        }

        function updateCountdown() {
            var idAcara = $('#acara').val();
            var nama_id = $('#nama_id' + idAcara).html();

            console.log(idAcara, nama_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: 'POST',
                url: "{{ route('updateCountdown') }}",
                data: {
                    id: idAcara
                },
                success: function(response) {
                    // console.log(response.message)
                    if (response.error) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'error',
                            title: 'Peringatan',
                            text: response.error,
                            timer: 3000,
                            showConfirmButton: false
                        });
                    } else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Berhasil',
                            text: `Acara ${nama_id} ${response.message}`,
                            timer: 3000,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(error) {
                    // Handle the error response here
                    console.error(error);
                }
            });
        }

        function hapusAcara(idAcara, nama_acara) {
            // console.log(idCerita)
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },

            });
            swalWithBootstrapButtons.fire({
                title: "Apakah Anda Yakin?",

                text: `${nama_acara} Akan Dihapus Dari Data Acara.`,
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
                        type: 'POST',
                        url: "{{ route('hapusAcara') }}", // Add a comma here
                        data: {
                            id: idAcara
                        },
                        success: function(response) {


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

                        },
                        error: function(error) {
                            console.log(error);
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

        }
    </script>
@endsection
