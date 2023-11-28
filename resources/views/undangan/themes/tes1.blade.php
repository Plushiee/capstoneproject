<!DOCTYPE html>
<html lang="id" class="no-js">

<head>
    <title>Andra & Amel</title>
    <!-- REQUIRED META AREA	 -->
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <link rel="icon" href="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/kita.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/jellyblack.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/css/swipebox.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquery.countdown.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
</head>

<body>
    <div id="over-lay-welcome" onclick="openFullscreen()">
        <div class="row" style="margin:0 auto;">
            <div class="col-md-6 col-sm-12 col-md-offset-3">
                {{-- <img class="img-responsive" src="https://cepetnikah.my.id/assets/base/img/prokes.png"> --}}
                <p>Selamat datang di undangan pernikahan Kami.
                    <br>Gunakan browser Chrome atau Safari agar website tampil sempurna. Gunakan tombol arah di bawah
                    utuk membuka halaman selanjutnya.
                </p>
                <br>
                <p><strong>KETUK UNTUK MELANJUTKAN</a></strong></p>
            </div>
        </div>
    </div>

    <audio id="my_audio" loop
        src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/musik.mp3"></audio>
    <section>
        <div class="sw-custom-wrapper row" id="sw_fullscreen">
            <div id="clock" class="sw-timer"></div>
            <div id="sw-bookblock" class="sw-bookblock">
                <section class="sw-item">
                    <div class="sw-content">
                        <div class="sw-content-inner sw-content-flex">
                            <div class="col-md-12">
                                <div class="sw-invitation-home text-center  wow bounceInUp">
                                    <h3>{{ $mempelainya->nama_panggilan_pria }} &
                                        {{ $mempelainya->nama_panggilan_wanita }}</h3>
                                    <p><span id="tanggal-wedding"></span><input id="tgl_wedding" type="hidden"
                                            value="2022/12/15"></p>
                                    <figure><img class="img-responsive"
                                            src="https://cepetnikah.my.id/assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/img/sw-wedding-invitation.png">
                                    </figure>
                                    <p>Kepada Yang Terhormat</p>
                                    <h3>{{ $tamunya->nama_tamu }}</h3>
                                    <p>Di {{ $tamunya->alamat_tamu }}</p>
                                </div>
                            </div>
                        </div>
                </section>
                <section class="sw-item">
                    <div class="sw-content">
                        <div class="sw-content-inner sw-content-flex">

                            <div class="sw-ceremony"><img class="sw-el-top"
                                    src="https://cepetnikah.my.id/assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/img/sw-element-top.png">
                                <p class="sw-opening"> السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ<br />
                                    <br />
                                    Dengan memohon Rahmat dan Ridho Allah SWT, Kami akan menyelenggarakan resepsi
                                    pernikahan Putra-Putri kami :
                                </p>
                                <figure>
                                    <img
                                        src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/groom.png">
                                </figure>
                                <h2>{{ $mempelainya->nama_pria }}</h2>
                                <p class="sw-binti">Putra Bapak {{ $mempelainya->nama_ayah_pria }} dan Ibu
                                    {{ $mempelainya->nama_ibu_pria }}
                                </p>
                                <p class="sw-or">dengan</p>
                                <figure>
                                    <img
                                        src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/bride.png">
                                </figure>
                                <h2>{{ $mempelainya->nama_wanita }}</h2>
                                <p class="sw-binti"> Putri Bapak{{ $mempelainya->nama_ayah_wanita }} dan Ibu
                                    {{ $mempelainya->nama_ibu_wanita }}</p>
                                <img class="sw-el-bottom"
                                    src="https://cepetnikah.my.id/assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/img/sw-element-bottom.png">
                            </div>

                        </div>
                    </div>
                </section>
                <section class="sw-item">
                    <div class="sw-content">
                        <div class="sw-content-inner ">
                            <div class="sw-block">
                                <h3>Acara</h3>

                                <div class="sw-akad-resepsi">
                                    <h2>Akad Nikah</h2>
                                    <p><span id="tanggal-acara2"></span><input id="tgl_acara2" type="hidden"
                                            value="2022/12/14">
                                        <br> Jam 09:00 - 10:00 <br> Kediaman Mempelai Wanita<br>Jl. Medan Merdeka
                                        Utara No.3 RT.02/RW.03. Gambir, Jakarta Pusat.
                                    </p>
                                </div>
                                <div class="sw-akad-resepsi">
                                    <h2>Resepsi</h2>
                                    <p><span id="tanggal-acara3"></span><input id="tgl_acara3" type="hidden"
                                            value="2022/12/15">
                                        <br> Jam 10:00 - 22:00 <br> Kediaman Mempelai Wanita<br>Jl. Medan Merdeka
                                        Utara No.3 RT.02/RW.03. Gambir, Jakarta Pusat.
                                    </p>
                                    <a href="#" data-toggle="modal" data-target="#sw-maps" title="Lokasi">Buka
                                        di google map</a>
                                </div>
                                <div class="sw-akad-resepsi">
                                    <h2>Unduh Mantu</h2>
                                    <p><span id="tanggal-acara4"></span><input id="tgl_acara4" type="hidden"
                                            value="2022/12/31">
                                        <br> Jam 10:00 - 22:00 <br> Kediaman Mempelai Pria<br>Dukun RT 002 RW 002
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <section class="sw-item">
                    <div class="sw-content">
                        <div class="sw-content-inner">
                            <div class="sw-block">
                                <h2>Kisah Cinta</h2>
                                <div class="col-md-12">
                                    <div class="main-timeline">

                                        <div class="timeline">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-content right">
                                                <span class="date">14 Januari 2021</span>
                                                <h4 class="title">Pertama bertemu</h4>
                                                <p class="description">
                                                    Waktu Pertama Kali
                                                    Kulihat Dirimu Hadir
                                                    Rasa hati ini inginkan dirimu </p>
                                            </div>
                                        </div>



                                        <div class="timeline">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-content">
                                                <span class="date">15 Maret 2021</span>
                                                <h4 class="title">Jatuh Cinta</h4>
                                                <p class="description">
                                                    Hati tenang mendengar
                                                    suara indah menyapa
                                                    Geloranya hati ini
                                                    Tak ku sangka.. </p>
                                            </div>
                                        </div>


                                        <div class="timeline">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-content right">
                                                <span class="date">1 Mei 2021</span>
                                                <h4 class="title">Ta'aruf</h4>
                                                <p class="description">
                                                    Rasa ini.. tak tertahan..
                                                    Hati ini..slalu untukmu.. </p>
                                            </div>
                                        </div>



                                        <div class="timeline">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-content">
                                                <span class="date">16 Mei 2021</span>
                                                <h4 class="title">Khitbah</h4>
                                                <p class="description">
                                                    Terimalah lagu ini dari orang biasa
                                                    Tapi cintaku padamu luar biasa
                                                    Aku tak punya bunga
                                                    Aku tak punya harta
                                                    Yang ku punya hanyalah
                                                    Hati yang setia.. Tulus.. Padamu.. :) </p>
                                            </div>
                                        </div>


                                        <div class="timeline">
                                            <div class="timeline-icon"></div>
                                            <div class="timeline-content right">
                                                <span class="date">19 Desember</span>
                                                <h4 class="title">Pertemuan Antar Keluarga Besar</h4>
                                                <p class="description">
                                                    Membicarakan Tanggal dan Waktu Pernikahan </p>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="sw-item">
                    <div class="sw-content">
                        <div class="sw-content-inner">
                            <div class="sw-block">
                                <h2>Galeri Prewedding</h2>
                                <div class="sw-content-gallery">
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                        <div class="sw-gallery">
                                            <a href="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album1.png"
                                                class="swipebox"><img
                                                    src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album1.png"
                                                    class="img-responsive" />
                                                <div class="sw-gallery-overlay">
                                                    <i class="fa fa-search-plus"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                        <div class="sw-gallery">
                                            <a href="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album2.png"
                                                class="swipebox"><img
                                                    src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album2.png"
                                                    class="img-responsive" />
                                                <div class="sw-gallery-overlay">
                                                    <i class="fa fa-search-plus"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                        <div class="sw-gallery">
                                            <a href="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album3.png"
                                                class="swipebox"><img
                                                    src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album3.png"
                                                    class="img-responsive" />
                                                <div class="sw-gallery-overlay">
                                                    <i class="fa fa-search-plus"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                        <div class="sw-gallery">
                                            <a href="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album4.png"
                                                class="swipebox"><img
                                                    src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album4.png"
                                                    class="img-responsive" />
                                                <div class="sw-gallery-overlay">
                                                    <i class="fa fa-search-plus"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                        <div class="sw-gallery">
                                            <a href="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album5.png"
                                                class="swipebox"><img
                                                    src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album5.png"
                                                    class="img-responsive" />
                                                <div class="sw-gallery-overlay">
                                                    <i class="fa fa-search-plus"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                        <div class="sw-gallery">
                                            <a href="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album6.png"
                                                class="swipebox"><img
                                                    src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album6.png"
                                                    class="img-responsive" />
                                                <div class="sw-gallery-overlay">
                                                    <i class="fa fa-search-plus"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                        <div class="sw-gallery">
                                            <a href="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album7.png"
                                                class="swipebox"><img
                                                    src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album7.png"
                                                    class="img-responsive" />
                                                <div class="sw-gallery-overlay">
                                                    <i class="fa fa-search-plus"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                        <div class="sw-gallery">
                                            <a href="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album8.png"
                                                class="swipebox"><img
                                                    src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album8.png"
                                                    class="img-responsive" />
                                                <div class="sw-gallery-overlay">
                                                    <i class="fa fa-search-plus"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                        <div class="sw-gallery">
                                            <a href="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album9.png"
                                                class="swipebox"><img
                                                    src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album9.png"
                                                    class="img-responsive" />
                                                <div class="sw-gallery-overlay">
                                                    <i class="fa fa-search-plus"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                        <div class="sw-gallery">
                                            <a href="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album10.png"
                                                class="swipebox"><img
                                                    src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/album10.png"
                                                    class="img-responsive" />
                                                <div class="sw-gallery-overlay">
                                                    <i class="fa fa-search-plus"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="youtube">
                                            <a rel="youtube" href="https://www.youtube.com/watch?v=PjHqsdT8pJQ"
                                                class="swipebox-video">
                                                <img src="https://img.youtube.com/vi/PjHqsdT8pJQ/maxresdefault.jpg"
                                                    class="img img-responsive">
                                                <div class="youtube-overlay">
                                                    <i class="fa fa-play-circle"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="sw-item">
                    <div class="sw-content">
                        <div class="sw-content-inner">
                            <div class="sw-block">
                                <h2>Beri Ucapan</h2>
                                <div class="sw-form">
                                    <form id="guestbook" action="javascript:void();" novalidate="true">
                                        <div class="col-md-5 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="nama" id="nama"
                                                    class="form-control" value="{{ $tamunya->nama_tamu }}"
                                                    placeholder="Nama" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <textarea name="komentar" id="komentar" class="form-control" rows="5" placeholder="Pesan" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <button type="submit" id="submitKomen" class="btn-loading"
                                                    data-toggle="modal" data-target="#myModal"
                                                    data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Harap Tunggu"><i
                                                        class="fa fa-paper-plane-o"></i> Kirim Ucapan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="komen-netizen">

                                <div class="layout-komen">
                                    <div class="komen">
                                        <div class="col-12 komen-nama">
                                            Aninda Safira </div>
                                        <div class="col-12 komen-isi">
                                            Alhamdulilah, selamat atas pernikahan kalian. Semoga pernikahan kalian
                                            dilimpahi oleh cinta, kebaikan dan kebahagiaan. Jazakallahu khairan
                                            khatira.. </div>
                                    </div>
                                    <div class="komen">
                                        <div class="col-12 komen-nama">
                                            Raisa Andriana </div>
                                        <div class="col-12 komen-isi">
                                            Selamat menikah sahabatku, ‘Barakallahu lakum wa baraka alaikum’ </div>
                                    </div>
                                    <div class="komen">
                                        <div class="col-12 komen-nama">
                                            Anisa Rahma </div>
                                        <div class="col-12 komen-isi">
                                            Alhamdulillah.. Selamat ya. Semoga Allah Swt selalu melimpahkan rahmatNya
                                            untuk pernikahan kalian. </div>
                                    </div>
                                    <div class="komen">
                                        <div class="col-12 komen-nama">
                                            Maudy Ayunda </div>
                                        <div class="col-12 komen-isi">
                                            MasyaAllah.. Selamat buat kalian berdua. Barakallah </div>
                                    </div>
                                    <div class="komen">
                                        <div class="col-12 komen-nama">
                                            Citra Kirana </div>
                                        <div class="col-12 komen-isi">
                                            Baarakallahu laka wa baaraka ‘alaika wa jama’a bainakumaa fii khaiir.

                                            Semoga Allah memberikan keberkahan untukmu dan atasmu, serta semoga Dia
                                            mengumpulkan di antara kalian berdua dalam kebaikan. </div>
                                    </div>
                                    <div class="komen">
                                        <div class="col-12 komen-nama">
                                            Nissya Sabyan </div>
                                        <div class="col-12 komen-isi">
                                            Semoga pernikahan kalian langgeng dan selalu dinaungi petunjuk Allah dalam
                                            setiap langkah.. Aamiin </div>
                                    </div>
                                    <div class="komen">
                                        <div class="col-12 komen-nama">
                                            Tes </div>
                                        <div class="col-12 komen-isi">
                                            tesss </div>
                                    </div>

                                </div>

                                <a href="#" id="loadMore" class="btn btn-primary btn-block"
                                    role="button">Lebih Banyak.</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <nav>
                <a id="sw-nav-prev" href="#" class="sw-custom-icon sw-custom-icon-arrow-left">Previous</a>
                <a id="sw-nav-next" href="#" class="sw-custom-icon sw-custom-icon-arrow-right">Next</a>
                <a href="#" class="sw-custom-icon sw-custom-icon-share" data-toggle="modal"
                    data-target="#sw-share" title="Bagikan">Share</a>
                <a href="#" class="sw-custom-icon sw-custom-icon-qrcode" data-toggle="modal"
                    data-target="#sw-qrcode" title="QrCode">QrCode</a>
                <a href="#" class="sw-custom-icon sw-custom-icon-gift" data-toggle="modal"
                    data-target="#sw-hadiah" title="Hadiah">Hadiah</a>
                <a href="#" onclick="openFullscreen();" id="fullscreen"
                    class="sw-custom-icon sw-custom-icon-full" title="Fullscreen" data-toggle="tooltip"
                    data-placement="top">Fullscreen</a>
                <a href="#" onclick="closeFullscreen();" id="normalscreen" style="display:none;"
                    class="sw-custom-icon sw-custom-icon-normal" title="Normal Screen" data-toggle="tooltip"
                    data-placement="top">Normal Screen</a>
            </nav>
        </div>
    </section>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Warning</h4>
                </div>
                <div class="modal-body">
                    <p>Terimakasih sudah mengirim pesan / Doa untuk mempelai</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sw-share" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-sm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Bagikan Undangan</h4>
                </div>
                <div class="modal-body">
                    <div class="social-share text-center">
                        <ul>
                            <li>
                                <a class="facebook"
                                    href="http://www.facebook.com/sharer/sharer.php?u=https://undangan.cepetnikah.my.id//demo"
                                    target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="twitter"
                                    href="http://twitter.com/share?url=https://undangan.cepetnikah.my.id//demo"
                                    target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="wa"
                                    href="https://api.whatsapp.com/send?text=https://undangan.cepetnikah.my.id//demo"
                                    target="_blank">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                        <p>Klik Sosial media diatas untuk membagikan Undangan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sw-qrcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-sm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">QrCode Tamu</h4>
                </div>
                <div class="modal-body">
                    <div class="social-share text-center">
                        <span id="qrcode"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sw-maps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Lokasi</h4>
                </div>
                <div class="modal-body">
                    <div class="social-share text-center">
                        <div class="maps">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.705836876672!2d106.82198811476884!3d-6.170129095532956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d6aa94d477%3A0xebf3b9d252c86a26!2sMerdeka%20Palace!5e0!3m2!1sen!2sid!4v1595773648767!5m2!1sen!2sid"
                                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sw-hadiah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Hadiah untuk Mempelai</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img src=https://cepetnikah.my.id/assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/img/love.png
                            alt="donation" style="max-width: 60px;">
                        <h5 class="font-bold text-center">Kirim Hadiah<br><small>Untuk Andra & Amel </small></h5>
                    </div>

                    <div class="row">
                        <div class="col-12" style="text-align:center">
                            <b>OVO </b><br>
                            <span onClick='copyText(this)'>0812345678910 <img
                                    src=https://cepetnikah.my.id/assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/img/copy.png
                                    style="height:13px;margin-top:-5px;cursor:pointer"></span><br>
                            a/n Demo <br>

                        </div>
                        <div style="display:flex;align-items:center;justify-content:center;">
                            <img src="https://cepetnikah.my.id/assets/users/mIjh78y8ge13b89d99c1a29132e57d2ca/rekening/qrcode3.png"
                                alt="Qris" class="img-responsive">
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquerypp.custom.js') }}"></script>
    <script src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquery.bookblock.min.js') }}"></script>
    <script src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquery.swipebox.min.js') }}"></script>
    <script src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/js/sw-main.js') }}"></script>
    <script src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/js/moment-with-locales.js') }}"></script>
    <script>
        var base_url = 'https://cepetnikah.my.id';
    </script>
    <script src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquery.classyqr.js') }}"></script>
    <script>
        $(document).ready(function() {
            var kode = "Tidak Ada Qrcode";
            $('#qrcode').ClassyQR({
                create: true,
                type: 'text',
                text: kode
            });

        });
    </script>
    <script type="text/javascript">
        function copyText(element) {
            var range, selection, worked;

            if (document.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(element);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(element);
                selection.removeAllRanges();
                selection.addRange(range);
            }

            try {
                document.execCommand('copy');
                alert('Number copied');
            } catch (err) {
                alert('Unable to copy number');
            }
        }
        var elem = document.documentElement;

        function openFullscreen() {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
                document.getElementById('fullscreen').style.display = 'none';
                document.getElementById('normalscreen').style.display = '';
            } else if (elem.webkitRequestFullscreen) {
                /* Safari */
                elem.webkitRequestFullscreen();
                document.getElementById('fullscreen').style.display = 'none';
                document.getElementById('normalscreen').style.display = '';
            } else if (elem.msRequestFullscreen) {
                /* IE11 */
                elem.msRequestFullscreen();
                document.getElementById('fullscreen').style.display = 'none';
                document.getElementById('normalscreen').style.display = '';
            }
        }

        function closeFullscreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
                document.getElementById('fullscreen').style.display = '';
                document.getElementById('normalscreen').style.display = 'none';
            } else if (document.webkitExitFullscreen) {
                /* Safari */
                document.webkitExitFullscreen();
                document.getElementById('fullscreen').style.display = '';
                document.getElementById('normalscreen').style.display = 'none';
            } else if (document.msExitFullscreen) {
                /* IE11 */
                document.msExitFullscreen();
                document.getElementById('fullscreen').style.display = '';
                document.getElementById('normalscreen').style.display = 'none';
            }
        }
        $('#clock').countdown('2023/12/1 10:00', function(event) {
            $(this).html(event.strftime('%D:%H:%M:%S'));
        });
        $(document).ready(function() {
            $("#over-lay-welcome").click(function() {
                $("#over-lay-welcome").fadeOut(650);
                // $("#my_audio").get(0).play(); //play musik;
            });
        });
        Page.init();
        var i = 3;
        //set indonesian format
        for (let a = 1; a <= i + 1; a++) {
            moment.locale('id');
            var tgl = $('#tgl_acara' + a + '').val();
            $('#tanggal-acara' + a + '').html(moment(tgl).format('dddd, Do MMMM YYYY'));
            moment.locale('id');
            var tgl_wedding = $('#tgl_wedding').val();
            $('#tanggal-wedding').html(moment(tgl_wedding).format('dddd, Do MMMM YYYY'));
        }
        $(".komen").slice(0, 4).show();
        $("#loadMore").on('click', function(e) {
            e.preventDefault();
            $(".komen:hidden").slice(0, 4).slideDown();
            if ($(".komen:hidden").length == 0) {
                $("#loadMore").fadeOut('slow');
            }
            $('html,body').animate({
                scrollTop: $(this).offset().top
            }, 1500);
        });
        /*=================
         ADD KOMENTAR
        ======================= */
        $('#submitKomen').on('click', function(event) {
            var nama = $('#nama').val();
            var komentar = $('#komentar').val();

            $.ajax({
                url: base_url + '/add_komentar',
                method: "POST",
                data: {
                    nama: nama,
                    komentar: komentar
                },
                async: true,
                dataType: 'html',
                success: function(hasil) {
                    var json = JSON.parse(hasil);
                    var status = json.status;
                    var nama = json.nama;
                    var komentar = json.komentar;
                    console.log(json);

                    if (status == 'sukses') {

                        $('.layout-komen').append(
                            "<div class='komen' style='display:block'><div class='col-12 komen-nama'>" +
                            nama + "</div><div class='col-12 komen-isi'>" + komentar +
                            "</div></div>");

                        $(".komen:hidden").slice(0, 100).slideDown();
                        $("html, body").animate({
                            scrollTop: $(document).height()
                        }, 1000);
                        $("#loadMore").fadeOut('slow');

                    }

                }
            });

        });
    </script>
</body>

</html>
