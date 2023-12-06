<!DOCTYPE html>
<html lang="id" class="no-js">

<head>
    <title>{{ $mempelainya->nama_panggilan_pria }} & {{ $mempelainya->nama_panggilan_wanita }}</title>
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
            <div id="clock" class="sw-timer" style="min-width: 25%"></div>
            <div id="sw-bookblock" class="sw-bookblock">
                <section class="sw-item">
                    <div class="sw-content">
                        <div class="sw-content-inner sw-content-flex">
                            <div class="col-md-12">
                                <div class="sw-invitation-home text-center  wow bounceInUp">



                                    <h3>{{ $mempelainya->nama_panggilan_pria }} &
                                        {{ $mempelainya->nama_panggilan_wanita }}</h3>
                                    <p class="mb-auto"><span id="tanggal-wedding"></span><input id="tgl_wedding"
                                            type="hidden"
                                            value="{{ $acaranya->where('countdown', 1)->first()->waktu_acara }}"></p>
                                    <figure><img class="img-responsive" style="padding-top: 25px"
                                            src="{{ $dir['fotosampul'] }}">
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
                                    src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/img/sw-element-top.png') }}">
                                <p class="sw-opening"> السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ<br />
                                    <br />
                                    Dengan memohon Rahmat dan Ridho Allah SWT, Kami akan menyelenggarakan resepsi
                                    pernikahan Putra-Putri kami :
                                </p>
                                <figure>
                                    <img src="{{ $dir['fotopria'] }}">
                                </figure>
                                <h2>{{ $mempelainya->nama_pria }}</h2>
                                <p class="sw-binti">Putra Bapak {{ $mempelainya->nama_ayah_pria }} dan Ibu
                                    {{ $mempelainya->nama_ibu_pria }}
                                </p>
                                <p class="sw-or">dengan</p>
                                <figure>
                                    <img src="{{ $dir['fotowanita'] }}">
                                </figure>
                                <h2>{{ $mempelainya->nama_wanita }}</h2>
                                <p class="sw-binti"> Putri Bapak{{ $mempelainya->nama_ayah_wanita }} dan Ibu
                                    {{ $mempelainya->nama_ibu_wanita }}</p>
                                <img class="sw-el-bottom"
                                    src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/img/sw-element-bottom.png') }}">
                            </div>

                        </div>
                    </div>
                </section>
                <section class="sw-item">
                    <div class="sw-content">
                        <div class="sw-content-inner ">
                            <div class="sw-block">
                                <h3>Acara</h3>

                                @foreach ($acaranya as $acara)
                                    <div class="sw-akad-resepsi">
                                        <h2>{{ $acara->nama_acara }}</h2>
                                        <p><span id="{{ 'tanggal_acara' . $acara->id }}">
                                                {{ \Carbon\Carbon::parse($acara->waktu_acara)->format('d F Y') }}</span>
                                            <br>
                                            Jam:
                                            {{ \Carbon\Carbon::parse($acara->waktu_acara)->format('H:i') }} WIB <br>
                                            {{ $acara->tempat_acara }}<br>{{ $acara->alamat_acara }}
                                        </p>
                                        @if ($acara->google_map != null)
                                            <a href="#" onclick="mapsmodal('{{ $acara->google_map }}')"
                                                data-toggle="modal" data-target="#sw-maps" title="Lokasi">Buka
                                                di google map</a>
                                        @endif


                                    </div>
                                @endforeach

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

                                        @foreach ($ceritanya as $cerita)
                                            @if ($loop->index % 2 == 0)
                                                <div class="timeline">
                                                    <div class="timeline-icon"></div>
                                                    <div class="timeline-content">
                                                        <span
                                                            class="date">{{ \Carbon\Carbon::parse($cerita->tanggal_cerita)->format('d F Y') }}</span>
                                                        <h4 class="title">{{ $cerita->judul_cerita }}</h4>
                                                        <p class="description">{{ $cerita->isi_cerita }}</p>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="timeline">
                                                    <div class="timeline-icon"></div>
                                                    <div class="timeline-content right">
                                                        <span
                                                            class="date">{{ \Carbon\Carbon::parse($cerita->tanggal_cerita)->format('d F Y') }}</span>
                                                        <h4 class="title">{{ $cerita->judul_cerita }}</h4>
                                                        <p class="description">{{ $cerita->isi_cerita }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
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
                                    @foreach ($album as $album)
                                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                            <div class="sw-gallery">
                                                <a href="{{ asset($imagepath . basename($album)) }}"
                                                    class="swipebox"><img
                                                        src="{{ asset($imagepath . basename($album)) }}"
                                                        class="img-responsive" />
                                                    <div class="sw-gallery-overlay">
                                                        <i class="fa fa-search-plus"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach

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
                                <h2>RSVP</h2>
                                <div class="sw-form">
                                    <form id="guestbook" action="javascript:void();" novalidate="true">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="nama" class="">
                                                    <p>Nama</p>
                                                </label>
                                                <input type="text" name="nama" id="nama"
                                                    class="form-control" value="{{ $tamunya->nama_tamu }}"
                                                    placeholder="Nama" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="kehadiran" class="">
                                                    <p>Kehadiran</p>
                                                </label>
                                                <select id="kehadiran" data-id="{{ $tamunya->id }}"
                                                    class="form-control">

                                                    <option value="belum konfirmasi"
                                                        {{ $tamunya->kehadiran === 'belum konfirmasi' ? 'selected' : '' }}>
                                                        belum konfirmasi</option>
                                                    <option value="hadir"
                                                        {{ $tamunya->kehadiran === 'hadir' ? 'selected' : '' }}>Hadir
                                                    </option>
                                                    <option value="tidak hadir"
                                                        {{ $tamunya->kehadiran === 'tidak_hadir' ? 'selected' : '' }}>
                                                        Tidak Hadir</option>
                                                    <!-- Add more options as needed -->



                                                    <!-- Add more options as needed -->
                                                </select>
                                                {{-- <select id="kehadiran" name="kehadiran" class="form-control">

                                                    <option value="belum konfirmasi">Belum Konfirmasi</option>
                                                    <option value="hadir">Hadir</option>
                                                    <option value="tidak hadir" selected>Tidak Hadir</option>
                                                </select> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="komentar" class="">
                                                    <p>Ucapan</p>
                                                </label>
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
                        <div class="modalmaps">
                            {{-- <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31673.71275825069!2d109.9343848761109!3d-7.101167651839949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7013497f504245%3A0x2ab97b5012ad2a6b!2sAlun%20Alun%20Kota%20Bawang!5e0!3m2!1sid!2sid!4v1701507384746!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                            {{-- <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4024135.763309077!2d108.8688439734123!3d-9.94892291858544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1701507089467!5m2!1sid!2sid"
                                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe> --}}
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

    <script src="{{ asset('assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquery.classyqr.js') }}"></script>
    <script>
        function mapsmodal(url) {
            var iframe = `<iframe src=${url} width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>`;
            $('.modalmaps').html(iframe);
        }


        $(document).ready(function() {

            $('#kehadiran').change(function() {
                var selectedAttendance = $(this).val();
                var id = $(this).data('id');

                // Make an Ajax request to update the attendance
                $.ajax({
                    type: 'PATCH',
                    url: "{{ route('updateKehadiran') }}",
                    data: {
                        new_attendance: selectedAttendance,
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        // Handle success if needed
                    },
                    error: function(error) {
                        console.error('Error:', error);
                        // Handle error if needed
                    }
                });
            });


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
        $('#clock').countdown("{{ $acaranya->where('countdown', 1)->first()->waktu_acara }}", function(event) {
            $(this).html(event.strftime('%DH:%HJ:%MM:%S:D'));
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
