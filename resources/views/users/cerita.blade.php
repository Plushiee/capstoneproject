@extends('users.master')

@section('title', 'Cerita')
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


        <div class="row mb-3">

            <div class="col-xl-6 col-lg-6 mb-4">

                <div class="card mb-4">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <div class="col d-flex justify-content-between">
                            <h6 class="font-weight-bold text-primary my-auto">Data Cerita</h6>

                            <a id="addCerita" class="btn btn-fw primary" style="color:#fff">Tambah
                                Cerita</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="post" action="">
                            <div id="konten-cerita">

                                <?php 
                            $jml_cerita = 0;
                            for($i=0;$i < $jml_cerita;$i++){ 
                        ?>

                                <div id="cerita<?php echo $i + 1; ?>">
                                    <div class="row align-items-center mt-3">
                                        <div class="col-auto">
                                            <a
                                                style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">#<?php echo $i + 1; ?></a>
                                        </div>
                                        <div class="col">
                                            <a id="<?php echo $i + 1; ?>" class="btn btn-sm btn_remove"
                                                style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;color:#fff">Hapus</a>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col">
                                            <label>Tanggal</label>
                                            <input name="tanggal_cerita[]" type="text" class="form-control"
                                                placeholder="Contoh : 20 Februari 2020" value="" required>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mt-3">
                                        <div class="col">
                                            <label>Judul</label>
                                            <input name="judul_cerita[]" type="text" class="form-control"
                                                placeholder="Contoh : Ta'aruf" value="" required>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mt-3">
                                        <div class="col">
                                            <label>Isi Cerita</label>
                                            <textarea name="isi_cerita[]" type="text" class="form-control" placeholder="Maximal 500 Karakter" maxlength="500"
                                                rows="4" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                            }
                        ?>

                            </div>



                            <div class="col my-3">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>






        </div>
    </div>
@endsection

@section('addJS')

    <script>
        var i = <?php echo $jml_cerita; ?>;

        $(document).on('click', '.btn_remove', function() {

            var button_id = $(this).attr("id");
            $('#cerita' + button_id + '').remove();
            i--;

            if (i == 0) {
                $("..form-control").prop('required', true);
            }

        });

        $('#addCerita').click(function() {
            console.log('tes');

            i++;

            $('#konten-cerita').append('<div id="cerita' + i +
                '"><div class="row align-items-center mt-3"><div class="col-auto"><a style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">#' +
                i + '</a></div><div class="col"><a id="' + i +
                '" class="btn btn-sm btn_remove" style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;">Hapus</a></div></div><div class="row align-items-center"><div class="col"><label>Tanggal</label><input name="tanggal_cerita[]" type="text" class="form-control" placeholder="Contoh : 14 Januari 2020 " required></div></div><div class="row align-items-center mt-3"><div class="col"><label>Judul</label><input name="judul_cerita[]" type="text" class="form-control" placeholder="Contoh : Pertama Bertemu" required></div></div><div class="row align-items-center mt-3"><div class="col"><label>Isi Cerita</label><textarea name="isi_cerita[]" type="text" class="form-control" placeholder="Maximal 500 Karakter" maxlength="500" rows="4" required></textarea></div></div></div>'
            );
            $(".form-control").prop('required', false);
        });
    </script>


@endsection
