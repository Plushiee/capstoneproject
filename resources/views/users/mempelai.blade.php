@extends('users.master')

@section('title', 'Data Mempelai')
@section('addCSS')
    <link rel="stylesheet" href="{{ asset('assets/css/croppie.min.css') }}">

    <style>
        .file-upload {
            width: 100%;
            padding: 10px 0px;
            position: absolute;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        /*//upload area*/
        .upload-area-bg {
            display: block;
            width: 100%;
            padding: 16px;
            margin: 16px 0;
            background: #f9f9fc;
            border-radius: 6px;
        }

        .upload-area {
            display: block;
            padding: 60px 0;
            background: #fff;
            border: 2px dashed #c2cdda;
            border-radius: 14px;
            text-align: center;
        }

        .upload-area-inner {
            box-sizing: border-box;
        }

        .upload-area-caption {
            font-size: 18px;
            font-weight: bold;
            color: #5B5B7B;
            white-space: normal;
        }

        .upload-area-icon-main {
            font-size: 40px;
            color: #005CAA;
        }

        .upload-area-button {
            background-image: linear-gradient(to top left, #005CAA, #005CAA);
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
            text-transform: none;

        }

        .upload-area-button:hover {
            background: #005CAA;
        }

        .preview-uploads {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-top: 5px;
        }

        .preview-uploads-img {
            height: 50px;
            width: 50px;
        }

        .preview-uploads-name {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            padding-left: 16px;
            padding-right: 16px;
            color: #74809d;
            overflow: hidden;
        }

        .preview-upload-name p {
            line-height: revert;
            font-size: 12px;
        }

        .preview-uploads-delete {
            height: 30px;
            width: auto;
        }
    </style>

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
        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Mempelai Pria</h6>
                    </div>
                    <div class="card-body">
                        <!-- CONTENT DISINI -->
                        <div class="upload-area-bg" style="text-align: center;">
                            <div class="col">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                                        <div class="upload-area p-4">
                                            <img src="
                                            {{ $dir['fotopria'] }}"
                                                id="profile-pic-mempelaipria"
                                                style='border-radius: 5px;height: 200px;width: 200px;'>
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                        <div class="btn btn-fw primary">
                                            <label class="mb-0 pb-0" for="mempelaipria" style="cursor: pointer;">
                                                <input type="file" class="file-upload" id="mempelaipria"
                                                    name="profile_picture" accept="image/*" style="display: none;">
                                                Upload Foto
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col mt-2">
                            <label>Nama Lengkap</label>
                            <input id="nama_lengkap_pria" type="text" class="form-control"
                                placeholder="Contoh : Jack Dawson S.Kom" value="{{ $mempelai->nama_pria }}" disabled
                                required data-idmempelai='{{ $mempelai->id }}'>
                        </div>

                        <div class="col mt-2">
                            <label>Nama Panggilan</label>
                            <input id="nama_panggilan_pria" type="text" class="form-control" placeholder="Contoh : Jack"
                                value="{{ $mempelai->nama_panggilan_pria }}" disabled required>
                        </div>

                        <div class="col mt-2">
                            <label>Nama Ayah</label>
                            <input id="nama_ayah_pria" type="text" class="form-control" placeholder="Nama Ayah"
                                value="{{ $mempelai->nama_ayah_pria }}" disabled required>
                        </div>

                        <div class="col mt-2">
                            <label>Nama Ibu</label>
                            <input id="nama_ibu_pria" type="text" class="form-control" placeholder="Nama Ibu"
                                value="{{ $mempelai->nama_ibu_pria }}" disabled required>
                        </div>
                        <div class="col my-3">
                            <button class="btn btn-fw primary d-none " id='savebtnpria'
                                onclick="saveEdit('pria')">Simpan</button>
                            <button class="btn btn-fw warning " id='editbtnpria' onclick="enableEdit('pria')">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Mempelai Wanita</h6>
                    </div>
                    <div class="card-body">
                        <!-- CONTENT DISINI -->
                        <div class="upload-area-bg" style="text-align: center;">
                            <div class="col">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                                        <div class="upload-area p-4">
                                            <img src="{{ $dir['fotowanita'] }}" id="profile-pic-mempelaiwanita"
                                                style='border-radius: 5px;height: 200px;width: 200px;'>
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                        <div class="btn btn-fw primary">
                                            <label class="mb-0 pb-0" for="mempelaiwanita" style="cursor: pointer;">
                                                <input type="file" class="file-upload" id="mempelaiwanita"
                                                    name="profile_picture" accept="image/*" style="display: none;">
                                                Upload Foto
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col mt-2">
                            <label>Nama Lengkap</label>
                            <input id="nama_lengkap_wanita" type="text" class="form-control"
                                placeholder="Contoh : Fatimah Az Zahra" value="{{ $mempelai->nama_wanita }}" disabled
                                required>
                        </div>

                        <div class="col mt-2">
                            <label>Nama Panggilan</label>
                            <input id="nama_panggilan_wanita" type="text" class="form-control"
                                placeholder="Contoh : Fatimah" value="{{ $mempelai->nama_panggilan_wanita }}" disabled
                                required>
                        </div>

                        <div class="col mt-2">
                            <label>Nama Ayah</label>
                            <input id="nama_ayah_wanita" type="text" class="form-control" placeholder="Nama Ayah"
                                value="{{ $mempelai->nama_ayah_wanita }}" disabled required>
                        </div>

                        <div class="col mt-2">
                            <label>Nama Ibu</label>
                            <input id="nama_ibu_wanita" type="text" class="form-control" placeholder="Nama Ibu"
                                value="{{ $mempelai->nama_ibu_wanita }}" disabled required>
                        </div>

                        <div class="col my-3 ">
                            <button class="btn btn-fw primary d-none " id='savebtnwanita'
                                onclick="saveEdit('wanita')">Simpan</button>
                            <button class="btn btn-fw warning" id='editbtnwanita'
                                onclick="enableEdit('wanita')">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Foto Sampul</h6>
                    </div>
                    <div class="card-body">
                        <!-- CONTENT DISINI -->
                        <div class="upload-area-bg" style="text-align: center;">
                            <div class="col">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                                        <div class="upload-area p-4">
                                            <img src="{{ $dir['fotosampul'] }}" id="profile-pic-sampul"
                                                style='border-radius: 5px;height: 200px;width: 200px;'>
                                        </div>

                                    </div>
                                    <div
                                        class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                        <div class="btn btn-fw primary">
                                            <label class="mb-0 pb-0" for="sampul" style="cursor: pointer;">
                                                <input type="file" class="file-upload" id="sampul"
                                                    name="profile_picture" accept="image/*" style="display: none;">
                                                Upload Foto
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!--Row-->
        <!-- modal upload croppie -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Foto Mempelai</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div id="resizer"></div>
                        <hr>
                        <button class="btn btn-block btn-dark" id="upload">
                            Upload</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalWanita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menyimpan perubahan ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" id="simpanWanita">Ya</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalPria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menyimpan perubahan ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" id="simpanPria">Ya</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('addJS')
    <script src="{{ asset('assets/js/croppie.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function enableEdit(data) {

            $(`#nama_lengkap_${data}, #nama_panggilan_${data}, #nama_ayah_${data}, #nama_ibu_${data}`).prop(
                'disabled', false);
            $(`#savebtn${data}`).removeClass('d-none');
            $(`#editbtn${data}`).addClass('d-none');
        };

        function saveEdit(mempelai) {
            idMempelai = $('#nama_lengkap_pria').data('idmempelai');
            editNamaLengkapPria = $(`#nama_lengkap_${mempelai}`).val();
            editNamaLengkapWanita = $(`#nama_lengkap_${mempelai}`).val();
            editNamaPanggilanPria = $(`#nama_panggilan_${mempelai}`).val();
            editNamaPanggilanWanita = $(`#nama_panggilan_${mempelai}`).val();
            editNamaAyahPria = $(`#nama_ayah_${mempelai}`).val();
            editNamaAyahWanita = $(`#nama_ayah_${mempelai}`).val();
            editNamaIbuPria = $(`#nama_ibu_${mempelai}`).val();
            editNamaIbuWanita = $(`#nama_ibu_${mempelai}`).val();
            console.log(
                `1${idMempelai} 2${editNamaLengkapPria} 3${editNamaLengkapWanita} 4${editNamaPanggilanPria} 5${editNamaPanggilanWanita} 6${editNamaAyahPria} 7${editNamaAyahWanita} 8${editNamaIbuPria} 9${editNamaIbuWanita}`
            )

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('updateMempelai') }}",
                data: {
                    idMempelai: $('#nama_lengkap_pria').data('idmempelai'),
                    editNamaLengkapPria: $(`#nama_lengkap_${mempelai}`).val(),
                    editNamaLengkapWanita: $(`#nama_lengkap_${mempelai}`).val(),
                    editNamaPanggilanPria: $(`#nama_panggilan_${mempelai}`).val(),
                    editNamaPanggilanWanita: $(`#nama_panggilan_${mempelai}`).val(),
                    editNamaAyahPria: $(`#nama_ayah_${mempelai}`).val(),
                    editNamaAyahWanita: $(`#nama_ayah_${mempelai}`).val(),
                    editNamaIbuPria: $(`#nama_ibu_${mempelai}`).val(),
                    editNamaIbuWanita: $(`#nama_ibu_${mempelai}`).val(),
                },
                success: function(response) {
                    if (response.success) {

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Data Mempelai ' + mempelai + ' Berhasil Diupdate',
                            text: response.message,
                            timer: 3000,
                            showConfirmButton: false
                        });

                        $(`#nama_lengkap_${mempelai}, #nama_panggilan_${mempelai},#nama_ayah_${mempelai}, #nama_ibu_${mempelai}`)
                            .prop(
                                'disabled', true);
                        $(`#savebtn${mempelai}`).addClass('d-none');
                        $(`#editbtn${mempelai}`).removeClass('d-none');

                    } else {
                        // Handle errors if needed

                        alert('Failed to save changes. ' + response.message);
                        $(`#nama_lengkap_${mempelai}, #nama_panggilan_${mempelai},#nama_ayah_${mempelai}, #nama_ibu_${mempelai}`)
                            .prop(
                                'disabled', true);

                    }
                },
                error: function(xhr, status, error) {

                    console.log(data);
                }
            });
        };

        $(document).ready(function() {
            /** croppie shareurcodes.com **/
            var croppie = null;
            var el = document.getElementById('resizer');

            $.base64ImageToBlob = function(str) {

                var pos = str.indexOf(';base64,');
                var type = str.substring(5, pos);
                var b64 = str.substr(pos + 8);

                /* decode base64 */
                var imageContent = atob(b64);

                /* create an ArrayBuffer and a view (as unsigned 8-bit) */
                var buffer = new ArrayBuffer(imageContent.length);
                var view = new Uint8Array(buffer);

                /* fill the view, using the decoded base64 */
                for (var n = 0; n < imageContent.length; n++) {
                    view[n] = imageContent.charCodeAt(n);
                }

                /* convert ArrayBuffer to Blob */
                var blob = new Blob([buffer], {
                    type: type
                });

                return blob;
            }

            $.getImage = function(input, croppie) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        croppie.bind({
                            url: e.target.result,
                        });
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            var fotonyasiapa = '';
            $(".file-upload").on("change", function(event) {
                $("#myModal").modal();
                fotonyasiapa = $(this).attr("id");
                console.log("foto_" + fotonyasiapa);
                /* Initailize croppie instance and assign it to global variable */
                croppie = new Croppie(el, {
                    viewport: {
                        width: 300,
                        height: 300,
                        type: 'square'
                    },
                    boundary: {
                        width: 350,
                        height: 350
                    },

                    enableOrientation: true
                });
                $.getImage(event.target, croppie);
            });

            $("#upload").on("click", function() {
                croppie.result('base64').then(function(base64) {
                    $("#myModal").modal("hide");
                    $("#profile-pic").attr("src",
                        "{{ asset('asset/file-upload/image/loading.gif') }}");

                    var url = "{{ route('uploadFotoMempelai') }}";
                    var formData = new FormData();
                    formData.append("foto_" + fotonyasiapa, $.base64ImageToBlob(base64));
                    formData.append("direktori", '{{ $direktori }}');
                    console.log(formData);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            // console.log(response.pesan);
                            Swal.fire({
                                icon: 'success',
                                toast: true,
                                title: 'OK',
                                text: response.pesan,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                            });
                            if (response.pesan ==
                                "foto mempelai wanita berhasil disimpan") {
                                $("#profile-pic-mempelaiwanita").attr("src", base64);
                            } else if (response.pesan ==
                                "foto mempelai pria berhasil disimpan") {
                                $("#profile-pic-mempelaipria").attr("src", base64);
                            } else if (response.pesan ==
                                "foto sampul berhasil disimpan") {
                                $("#profile-pic-sampul").attr("src", base64);
                            } else {
                                $("#profile-pic").attr("src",
                                    "{{ asset('asset/file-upload/image/camera.jpg') }}"
                                );
                                console.log(data['profile_picture']);
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            $("#profile-pic").attr("src",
                                "{{ asset('asset/file-upload/image/camera.jpg') }}"
                            );
                        }
                    });
                });
            });

            /* To Rotate Image Left or Right */
            $(".rotate").on("click", function() {
                croppie.rotate(parseInt($(this).data('deg')));
            });

            $('#myModal').on('hidden.bs.modal', function(e) {
                setTimeout(function() {
                    croppie.destroy();
                }, 100);
            });

        });
    </script>
@endsection
