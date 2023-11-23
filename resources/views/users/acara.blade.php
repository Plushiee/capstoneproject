@extends('users.master')

@section('title', 'Acara')

@section('contents')
    <div class="padding">


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        </div>
        <div class="row mb-3">

            <div class="col-xl-6 col-lg-6 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Akad Nikah</h6>
                    </div>
                    <div class="card-body">
                        <!-- CONTENT DISINI -->
                        <div class="col mt-2">
                            <label>Tanggal </label>
                            <input type="text" class="form-control" id="datepicker" placeholder="Tanggal"
                                readonly="readonly" style="cursor:pointer; background-color: #FFFFFF"
                                value="Jumat, 17 Januari 2020" required>
                            <input type="hidden" id="tanggal_akad" value="">
                        </div>

                        <div class="col mt-2">
                            <label>Waktu / Jam</label>
                            <input id="waktu_akad" type="time" class="form-control" placeholder="Contoh : 10.00 Pagi"
                                value=" " required>
                        </div>

                        <div class="col mt-2">
                            <label>Tempat / Lokasi</label>
                            <input id="lokasi_akad" type="text" class="form-control"
                                placeholder="Contoh : Kediaman Mempelai Wanita " value="" required>
                        </div>

                        <div class="col mt-2">
                            <label>Alamat</label>
                            <textarea id="alamat_akad" type="text" class="form-control" placeholder="Contoh : JL. Ahmad Yani No.1"></textarea>
                        </div>

                        <div class="col mt-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAkad">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Resepsi Nikah</h6>
                    </div>
                    <div class="card-body">
                        <!-- CONTENT DISINI -->
                        <div class="col mt-2">
                            <label>Tanggal </label>
                            <input type="text" class="form-control" id="datepicker2" placeholder="Tanggal"
                                readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" value=""
                                required>
                            <input type="hidden" id="tanggal_resepsi" value="">
                        </div>

                        <div class="col mt-2">
                            <label>Waktu / Jam</label>
                            <input id="waktu_resepsi" type="time" class="form-control" placeholder="Contoh : 10.00 Pagi"
                                value="" required>
                        </div>

                        <div class="col mt-2">
                            <label>Tempat / Lokasi</label>
                            <input id="lokasi_resepsi" type="text" class="form-control"
                                placeholder="Contoh : Kediaman Mempelai Wanita " value="" required>
                        </div>

                        <div class="col mt-2">
                            <label>Alamat</label>
                            <textarea id="alamat_resepsi" type="text" class="form-control" placeholder="Contoh : JL. Ahmad Yani No.1"></textarea>
                        </div>

                        <div class="col mt-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalResepsi">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Maps</h6>
                    </div>
                    <div class="card-body">
                        <label>Google Maps Link</label>
                        <textarea id="maps" type="text" class="form-control" placeholder="Contoh : Kediaman Mempelai Wanita" required></textarea>
                        <div class="mt-1">
                            <label class="form-check-label ">
                                <a href="" target="_blank"><i class="fa fa-question-circle"></i>&nbsp Cara
                                    Menambahkan Maps</a>
                            </label>
                        </div>
                        <div class="col mt-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalMaps">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--Row-->
    </div>
@endsection
