@extends('users.master')

@section('title', 'Cerita')
@section('addCSS')

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



        <div class="btn-group d-flex  justify-content-end my-3">
            <button id="addCerita" data-toggle="modal" data-target="#modalTambah" class="md-btn md-raised primary">Tambah
                Cerita</button>
        </div>

        <div class="row ">
            @foreach ($cerita as $cerita)
                <div class="col-6 my-3">
                    <div class="card">
                        <div class="card-header ">
                            <div class="p-1">Data Cerita #{{ $loop->index + 1 }}
                                <button class=" d-none md-btn md-raised p-0 px-2 ml-2 text-primary" title="Simpan Data"
                                    onclick="saveEdit({{ $loop->index + 1 }})" id="saveBtn{{ $loop->index + 1 }}">
                                    <i class="material-icons text-primary w-s mr-1">save</i>simpan
                                </button>
                            </div>
                            <div class="box-tool">
                                <ul class="nav">
                                    {{-- <li class="nav-item">
                                        <button class="md-btn md-raised b-info text-info"
                                            onclick="saveEdit({{ $loop->index + 1 }})"
                                            id="saveBtn{{ $loop->index + 1 }}">Simpan</button>
                                    </li> --}}

                                    <li class="nav-item inline dropdown">
                                        <a class="nav-link" data-toggle="dropdown">
                                            <i class="material-icons md-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-scale pull-right">
                                            <a class="dropdown-item" onclick="enableEdit({{ $loop->index + 1 }})">Edit</a>
                                            <a class="dropdown-item"
                                                onclick="hapusCerita({{ $cerita->id }},'{{ $cerita->judul_cerita }}')">Hapus</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-header">
                            <div class="row align-item-center">
                                <div class="col">
                                    <label>Tanggal</label>
                                    <input id="editFormTanggal{{ $loop->index + 1 }}" name="tanggal_cerita" type="date"
                                        class="form-control formtanggal" placeholder="Contoh : 20 Februari 2020"
                                        value="{{ $cerita->tanggal_cerita }}" required disabled>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col">
                                    <label>Judul</label>
                                    <input id="editFormJudul{{ $loop->index + 1 }}" data-idcerita="{{ $cerita->id }}"
                                        name="judul_cerita" type="text" class="form-control"
                                        placeholder="Contoh : Ta'aruf" value="{{ $cerita->judul_cerita }}" required
                                        disabled>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col">
                                    <label>Isi Cerita</label>
                                    <textarea id="editFormIsi{{ $loop->index + 1 }}" name="isi_cerita" type="text" class="form-control"
                                        placeholder="Maximal 500 Karakter" maxlength="500" rows="4" required disabled>{{ $cerita->isi_cerita }} </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>



    {{-- Modal Tambah Data --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Cerita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col mt-2">
                        <label>Tanggal</label>
                        <input id="id_pesanan" type="hidden" class="form-control"
                            value="{{ DB::table('tbl_pesanans')->where('id_user', Auth::user()->id)->first()->id }}">
                        <input id="tanggal_cerita" type="date" class="form-control" required>
                    </div>
                    <div class="col mt-2">
                        <label>Judul Cerita</label>
                        <input id="judul_cerita" type="text" class="form-control" placeholder="Contoh : Pertama Kenalan"
                            style='text-transform:capitalize' required>
                    </div>

                    <div class="col mt-2">
                        <label>Isi Cerita</label>
                        <textarea id="isi_cerita" type="text" class="form-control" placeholder="Maximal 500 Karakter" maxlength="500"
                            rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="simpanCerita">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addJS')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function enableEdit(index) {

            $(`#editFormJudul${index}, #editFormIsi${index}, #editFormTanggal${index}`).prop('disabled', false);
            $(`#saveBtn${index}`).removeClass('d-none');
        }

        function saveEdit(index) {
            var idCerita = $('#editFormJudul' + index).data('idcerita');
            var tanggalBaru = $('#editFormTanggal' + index).val();
            var judulBaru = $('#editFormJudul' + index).val();
            var isiBaru = $('#editFormIsi' + index).val();
            console.log(`${idCerita} ${tanggalBaru} ${judulBaru} ${isiBaru}`);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('updateCerita') }}",
                data: {
                    judul_cerita: judulBaru,
                    isi_cerita: isiBaru,
                    tanggal_cerita: tanggalBaru,
                    id: idCerita
                    // _token: '{{ csrf_token() }}'
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
                        $(`#editFormJudul${index}, #editFormIsi${index}, #editFormTanggal${index}`).prop(
                            'disabled', true);
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
                    console.error(xhr.responseText);
                }
            });
        }


        function hapusCerita(idCerita, judul_cerita) {
            // console.log(idCerita)
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },

            });
            swalWithBootstrapButtons.fire({
                title: "Apakah Anda Yakin?",

                text: `${judul_cerita} Akan Dihapus Dari Data Cerita.`,
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
                        url: "{{ route('hapusCerita') }}", // Add a comma here
                        data: {
                            id: idCerita
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
        $(document).ready(function() {
            $('#simpanCerita').on('click', function() {
                var judul_cerita = $('#judul_cerita').val();
                var isi_cerita = $('#isi_cerita').val();
                var tanggal_cerita = $('#tanggal_cerita').val();
                var id_pesanan = $('#id_pesanan').val();
                console.log(judul_cerita + isi_cerita + tanggal_cerita + id_pesanan);
                if (!judul_cerita || !isi_cerita || !tanggal_cerita) {
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
                    judul_cerita: judul_cerita,
                    isi_cerita: isi_cerita,
                    tanggal_cerita: tanggal_cerita,
                    id_pesanan: id_pesanan
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Send Ajax request
                $.ajax({
                    type: 'POST',
                    url: "{{ route('tambahCerita') }}",
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


                            location.reload();

                        });
                    },
                    error: function(error) {
                        // Handle the error response here
                        console.error(error);
                    }
                });
            });



        });
        //Awal Update Cerita
    </script>
@endsection
