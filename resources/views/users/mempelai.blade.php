@extends('users.master')

@section('title', 'Data Mempelai')
@section('addCSS')
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
                                            <img src="{{ asset('assets/images/a0.jpg') }}" id="profile-pic-groom"
                                                style='border-radius: 5px;height: 200px;width: 200px;'>
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                        <div class="btn btn-primary">
                                            <input type="file" class="file-upload" id="groom" name="profile_picture"
                                                accept="image/*"> Upload Foto
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col mt-2">
                            <label>Nama Lengkap</label>
                            <input id="nama_lengkap_pria" type="text" class="form-control"
                                placeholder="Contoh : Jack Dawson S.Kom" value="" required>
                        </div>

                        <div class="col mt-2">
                            <label>Nama Panggilan</label>
                            <input id="nama_panggilan_pria" type="text" class="form-control" placeholder="Contoh : Jack"
                                value="" required>
                        </div>

                        <div class="col mt-2">
                            <label>Nama Ayah</label>
                            <input id="nama_ayah_pria" type="text" class="form-control" placeholder="Nama Ayah"
                                value="" required>
                        </div>

                        <div class="col mt-2">
                            <label>Nama Ibu</label>
                            <input id="nama_ibu_pria" type="text" class="form-control" placeholder="Nama Ibu"
                                value="" required>
                        </div>
                        <div class="col my-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalPria">Simpan</button>
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
                                            <img src="{{ asset('assets/images/a4.jpg') }}" id="profile-pic-bride"
                                                style='border-radius: 5px;height: 200px;width: 200px;'>
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                        <div class="btn btn-primary">
                                            <input type="file" class="file-upload" id="bride" name="profile_picture"
                                                accept="image/*"> Upload Foto
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col mt-2">
                            <label>Nama Lengkap</label>
                            <input id="nama_lengkap_wanita" type="text" class="form-control"
                                placeholder="Contoh : Fatimah Az Zahra" value="" required>
                        </div>

                        <div class="col mt-2">
                            <label>Nama Panggilan</label>
                            <input id="nama_panggilan_wanita" type="text" class="form-control"
                                placeholder="Contoh : Fatimah" value="" required>
                        </div>

                        <div class="col mt-2">
                            <label>Nama Ayah</label>
                            <input id="nama_ayah_wanita" type="text" class="form-control" placeholder="Nama Ayah"
                                value="" required>
                        </div>

                        <div class="col mt-2">
                            <label>Nama Ibu</label>
                            <input id="nama_ibu_wanita" type="text" class="form-control" placeholder="Nama Ibu"
                                value="" required>
                        </div>

                        <div class="col my-3 ">
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#modalWanita">Simpan</button>
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
                                            <img src="" id="profile-pic-sampul"
                                                style='border-radius: 5px;height: 200px;width: 200px;'>
                                        </div>

                                    </div>
                                    <div
                                        class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                        <div class="btn btn-primary">
                                            <input type="file" class="file-upload" id="sampul"
                                                name="profile_picture" accept="image/*"> Upload Foto
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



    </div>
@endsection
@section('addJS')



@endsection
