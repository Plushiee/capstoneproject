<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo-only.png') }}">
    <title>ManToe</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landingpage/assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('landingpage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('landingpage/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('landingpage/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('landingpage/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />


    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('landingpage/assets/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between content-header">
            <h1 class="logo">
                <a href="index.html"><img src="{{ asset('landingpage/assets/img/logo-only.png') }}" /></a>
            </h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#fitur">Fitur</a></li>
                    <li><a class="nav-link scrollto" href="#harga">Harga Undangan</a></li>
                    <li><a class="nav-link scrollto" href="#tema">Tema Undangan</a></li>
                    <li>
                        @if (auth('users')->check())
                            <button class="navbar-btn btn btn-primary">
                                <a
                                    href="{{ redirect()->route('userDashboard')->with('user', 'welcome')->getTargetUrl() }}"><i
                                        class="bi bi-columns-gap"></i> Dashboard</a>

                            </button>
                            <button class="navbar-btn btn btn-danger">
                                <a href="{{ route('userLogout') }}"><i class="bi bi-box-arrow-left"></i> Logout</a>

                            </button>
                        @else
                            <button class="navbar-btn btn btn-primary btn-login"><a href="{{ route('login') }}"><i
                                        class="bi bi-person-fill"></i>
                                    Login</a></button>
                        @endif



                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
            <h1>Selamat Datang Di ManToe</h1>
            <h2>Kami menyediakan berbagai tamplate Undangan Digital yang menarik yang bisa segera Anda gunakan.</h2>
            <a href="#tema" class="btn-get-started scrollto">Pesan Sekarang</a>

        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container content-why">
                <h1 class="text-center mt-5 mb-5">Mengapa Memilih Undangan digital di ManToe?</h1>
                <div class="row">
                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up">
                        <div class="box">
                            <span>01</span>
                            <h4>Mudah, Cepat & Murah</h4>
                            <p>Tidak perlu menunggu lama untuk membuat undangan, dan Anda juga sudah bisa membuat
                                undangan online dengan harga termurah.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="150">
                        <div class="box">
                            <span>02</span>
                            <h4>Mudah Menentukan Domain</h4>
                            <p>Mudah membuat URL unik untuk website undangan Anda, dengan menggunakan kata-kata sesuai
                                dengan keinginan Anda.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="box">
                            <span>03</span>
                            <h4>Sebarkan Undangan Anda</h4>
                            <p>Jangkau tamu undangan Anda dengan membagikan dimana dan kapan saja dengan mudahnya di
                                social media.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Why Us Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" id="fitur">
                <div class="section-title">
                    <span>Fitur</span>
                    <h2>Fitur</h2>
                    <p>
                        Nikmati beragam fitur canggih untuk pengalaman terbaik <br />
                        Mulai dari kelola acara hingga personalisasi undangan, semua dalam genggaman Anda
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-collection"></i></div>
                            <h4><a href="">Tema Yang Menarik & Ekslusif</a></h4>
                            <p>Anda dapat menyeseuaikan tema pernikahan Anda dengan pilihan tema yang unik dan exlusif
                                yang kami sediakan.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                        data-aos-delay="150">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-hearts"></i></div>
                            <h4><a href="">Story</a></h4>
                            <p>Anda bisa menceritakan bagaimana cerita kalian bisa bertemu hingga melanjutkan ke jenjang
                                pernikahan.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-calendar-date"></i></div>
                            <h4><a href="">Waktu Akad dan Resepsi</a></h4>
                            <p>Anda dapat memberikan Informasi yang pastinya penting dalam pesta pernikahan, yaitu waktu
                                dan lokasi resepsi.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up"
                        data-aos-delay="450">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-postcard-heart"></i></div>
                            <h4><a href="">Informasi Kedua Pasangan</a></h4>
                            <p>Anda dapat menginformasikan tentang diri Anda dan pasangan yang Anda cintai disertai
                                dengan foto kalian berdua.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up"
                        data-aos-delay="600">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-card-image"></i></div>
                            <h4><a href="">Gallery Pra Wedding</a></h4>
                            <p>Dengan fitur gallery, pra wedding kalian bisa diupload foto-foto kenangan kalian dan
                                ditampilkan di website undangan kalian.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up"
                        data-aos-delay="750">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-journal-check"></i></div>
                            <h4><a href="">Buku Tamu</a></h4>
                            <p>Di fitur ini bisa Anda gunakan sebagai pengganti buku untuk mencatat kehadiran tamu serta
                                foto selfi tamu yang hadir.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section -->

        <!-- ======= Cta Section ======= -->
        <!-- <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in"> -->
        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container" id="harga">
                <div class="section-title">
                    <h2 style="color: white; margin-top: -10px">Harga Undangan</h2>
                    <p>Dapatkan undangan berkualitas dengan harga terjangkau sesuai kebutuhan Anda. <br /></p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 col-md-6" data-aos="zoom-in" data-aos-delay="150">
                        <div class="box">
                            <h3>Dengan Foto</h3>
                            <h4 class="na">Rp. 249.000</h4>
                            <h3>Rp. 120.000</h3>
                            <hr />
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Free Input 10 Foto</li>
                                <li><i class="bi bi-check-circle"></i> Cover Undangan</li>
                                <li><i class="bi bi-check-circle"></i> Bebas Input Nama Tamu</li>
                                <li><i class="bi bi-check-circle"></i> Amplop Digital</li>
                                <li><i class="bi bi-check-circle"></i> Love Story</li>
                                <li><i class="bi bi-check-circle"></i> Musik Auto Play</li>
                                <li><i class="bi bi-check-circle"></i> Hitung Mundur Acara</li>
                                <li><i class="bi bi-check-circle"></i> Navigasi Lokasi</li>
                                <li><i class="bi bi-check-circle"></i> Quotes Pernikahan</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#tema" class="btn-buy">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6" data-aos="zoom-in" data-aos-delay="150">
                        <div class="box">
                            <h3>Tanpa Foto</h3>
                            <h4 class="na">Rp. 249.000</h4>
                            <h3>Rp. 120.000</h3>
                            <hr />
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Tanpa Foto/Animasi</li>
                                <li><i class="bi bi-check-circle"></i> Cover Undangan</li>
                                <li><i class="bi bi-check-circle"></i> Bebas Input Nama Tamu</li>
                                <li><i class="bi bi-check-circle"></i> Amplop Digital</li>
                                <li><i class="bi bi-check-circle"></i> Love Story</li>
                                <li><i class="bi bi-check-circle"></i> Musik Auto Play</li>
                                <li><i class="bi bi-check-circle"></i> Hitung Mundur Acara</li>
                                <li><i class="bi bi-check-circle"></i> Navigasi Lokasi</li>
                                <li><i class="bi bi-check-circle"></i> Quotes Pernikahan</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#tema" class="btn-buy">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Pricing Section -->
        <!-- </div>
      </section> -->
        <!-- End Cta Section -->

        <!-- ======= Tema Section ======= -->
        <section id="tema" class="team">
            <div class="container" id="tema">
                <div class="section-title">
                    <span>Tema Undangan</span>
                    <h2>Tema Undangan</h2>
                    <p>
                        Temukan keindahan dalam berbagai pilihan tema undangan yang memikat <br />
                        Sesuaikan acara Anda dengan gaya unik dan menarik.
                    </p>
                </div>
                {{ $produk }}
                <div class="row justify-content-center">
                    @foreach ($produk as $produks)
                        <div class="col-12 col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in">
                            <div class="member">
                                <img src="{{ asset('landingpage/assets/img/5.jpg') }}" alt="" />
                                <h4>{{ $produks->nama_produk }}</h4>
                                <span class="harga-awal">IDR 100.000 - 150.000</span>
                                <span class="harga-sekarang">@currency($produks->biaya_dasar)</span>
                                <div class="link">
                                    @if (auth('users')->check())
                                        @if (DB::table('tbl_pesanans')->where('id_user', auth('users')->user()->id)->count())
                                            <div class="link-item pesan">

                                                <a href="#"
                                                    onClick="alert('Anda Sudah Mempunyai pesanan, silahkan masuk ke dashboard!')"
                                                    class="card-link"><i class="bi bi-cart-fill pesan"></i>Pesan</a>
                                            </div>
                                        @else
                                            <div class="link-item pesan">
                                                <a href="" class="card-link" data-bs-toggle="modal"
                                                    data-bs-target="#modalOrder" data-produk-id="{{ $produks->id }}"
                                                    data-produk-nama="{{ $produks->nama_produk }}"
                                                    data-produk-biaya="{{ $produks->biaya_dasar }}"><i
                                                        class="bi bi-cart-fill pesan"></i>Pesan</a>
                                            </div>
                                        @endif
                                    @else
                                        <div class="link-item pesan">
                                            <a href="{{ route('register') }}"
                                                onClick="alert('Silahkan Registrasi dan login terlebih dahulu untuk melanjutkan order')"
                                                class="card-link"><i class="bi bi-cart-fill pesan"></i>Pesan</a>
                                        </div>
                                    @endif
                                    <div class="link-item preview">
                                        <a href="domaintes{{ $produks->id }}" target="_blank"
                                            class="card-link">Preview<i
                                                class="bi bi-arrow-up-right-square-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="col-12 col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in">
                        <div class="member">
                            <img src="{{ asset('landingpage/assets/img/5.jpg') }}" alt="" />
                            <h4>Tema 1</h4>
                            <span class="harga-awal">IDR 100.000 - 150.000</span>
                            <span class="harga-sekarang">IDR 90.000 - 120.000</span>
                            <div class="link">
                                <div class="link-item pesan">
                                    <a href="#" class="card-link"><i
                                            class="bi bi-cart-fill pesan"></i>Pesan</a>
                                </div>
                                <div class="link-item preview">
                                    <a href="#" class="card-link">Preview<i
                                            class="bi bi-arrow-up-right-square-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-md-6 mt-4 d-flex align-items-stretch" data-aos="zoom-in">
                        <div class="member">
                            <img src="{{ asset('landingpage/assets/img/5.jpg') }}" alt="" />
                            <h4>Tema 1</h4>
                            <span class="harga-awal">IDR 100.000 - 150.000</span>
                            <span class="harga-sekarang">IDR 90.000 - 120.000</span>
                            <div class="link">
                                <div class="link-item pesan">
                                    <a href="#" class="card-link"><i
                                            class="bi bi-cart-fill pesan"></i>Pesan</a>
                                </div>
                                <div class="link-item preview">
                                    <a href="#" class="card-link">Preview<i
                                            class="bi bi-arrow-up-right-square-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-md-6 mt-4 d-flex align-items-stretch" data-aos="zoom-in">
                        <div class="member">
                            <img src="{{ asset('landingpage/assets/img/5.jpg') }}" alt="" />
                            <h4>Tema 1</h4>
                            <span class="harga-awal">IDR 100.000 - 150.000</span>
                            <span class="harga-sekarang">IDR 90.000 - 120.000</span>
                            <div class="link">
                                <div class="link-item pesan">
                                    <a href="#" class="card-link"><i
                                            class="bi bi-cart-fill pesan"></i>Pesan</a>
                                </div>
                                <div class="link-item preview">
                                    <a href="#" class="card-link">Preview<i
                                            class="bi bi-arrow-up-right-square-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-md-6 mt-4 d-flex align-items-stretch" data-aos="zoom-in">
                        <div class="member">
                            <img src="{{ asset('landingpage/assets/img/5.jpg') }}" alt="" />
                            <h4>Tema 1</h4>
                            <span class="harga-awal">IDR 100.000 - 150.000</span>
                            <span class="harga-sekarang">IDR 90.000 - 120.000</span>
                            <div class="link">
                                <div class="link-item pesan">
                                    <a href="#" class="card-link"><i
                                            class="bi bi-cart-fill pesan"></i>Pesan</a>
                                </div>
                                <div class="link-item preview">
                                    <a href="#" class="card-link">Preview<i
                                            class="bi bi-arrow-up-right-square-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-md-6 mt-4 d-flex align-items-stretch" data-aos="zoom-in">
                        <div class="member">
                            <img src="{{ asset('landingpage/assets/img/5.jpg') }}" alt="" />
                            <h4>Tema 1</h4>
                            <span class="harga-awal">IDR 100.000 - 150.000</span>
                            <span class="harga-sekarang">IDR 90.000 - 120.000</span>
                            <div class="link">
                                <div class="link-item pesan">
                                    <a href="#" class="card-link"><i
                                            class="bi bi-cart-fill pesan"></i>Pesan</a>
                                </div>
                                <div class="link-item preview">
                                    <a href="#" class="card-link">Preview<i
                                            class="bi bi-arrow-up-right-square-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-md-6 mt-4 d-flex align-items-stretch" data-aos="zoom-in">
                        <div class="member">
                            <img src="{{ asset('landingpage/assets/img/5.jpg') }}" alt="" />
                            <h4>Tema 1</h4>
                            <span class="harga-awal">IDR 100.000 - 150.000</span>
                            <span class="harga-sekarang">IDR 90.000 - 120.000</span>
                            <div class="link">
                                <div class="link-item pesan">
                                    <a href="#" class="card-link"><i
                                            class="bi bi-cart-fill pesan"></i>Pesan</a>
                                </div>
                                <div class="link-item preview">
                                    <a href="#" class="card-link">Preview<i
                                            class="bi bi-arrow-up-right-square-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6 mt-4 d-flex align-items-stretch" data-aos="zoom-in">
                        <div class="member">
                            <img src="{{ asset('landingpage/assets/img/5.jpg') }}" alt="" />
                            <h4>Tema 1</h4>
                            <span class="harga-awal">IDR 100.000 - 150.000</span>
                            <span class="harga-sekarang">IDR 90.000 - 120.000</span>
                            <div class="link">
                                <div class="link-item pesan">
                                    <a href="#" class="card-link"><i
                                            class="bi bi-cart-fill pesan"></i>Pesan</a>
                                </div>
                                <div class="link-item preview">
                                    <a href="#" class="card-link">Preview<i
                                            class="bi bi-arrow-up-right-square-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <!-- End Tema Section -->

        <!-- ======= FAQ daftar Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
                        data-aos="fade-right">
                        <img src="{{ asset('landingpage/assets/img/1.jpg') }}"
                            style="width: 100%; object-fit: cover; object-position: 50% 50%" class="mb-4" />
                    </div>

                    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
                        data-aos="fade-left">
                        <h3>Bagaimana Cara Mendaftar?</h3>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon"><i class="bx bx-atom"></i></div>
                            <h4 class="title"><a href="">Pilih Tema</a></h4>
                            <p class="description">Anda bebas memilih tema yang sesuai dengan tema pernikahan Anda.</p>
                        </div>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-atom"></i></div>
                            <h4 class="title"><a href="">Daftar</a></h4>
                            <p class="description">Mendaftar dengan Email, Isi data Pernikahan Anda, dan log in ke
                                halaman dashboard untuk mengedit dan pembayaran.</p>
                        </div>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="bx bx-atom"></i></div>
                            <h4 class="title"><a href="">Aktivasi Undangan Anda</a></h4>
                            <p class="description">Pilih menu tagihan / invoice, lakukan aktivasi paket untuk
                                mengaktifkan fitur undangan Anda.</p>
                        </div>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="bx bx-atom"></i></div>
                            <h4 class="title"><a href="">Undangan Aktif</a></h4>
                            <p class="description">Kamu sudah bisa mengubah dan melengkapi undangan pernikahanmu
                                kemudian kamu dapat menyebarkan undangan pernikahanmu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients data" class="clients">
            <div class="container" data-aos="zoom-in">
                <div class="row d-flex justify-content-center align-items-center content-data">
                    <div class="col-lg-2 col-md-4 col-6 data-item">
                        <h1 class="jumlah">0</h1>
                        <p>Pelanggan</p>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 data-item">
                        <h1 class="jumlah">0</h1>
                        <p>Undangan Dibuat</p>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 data-item">
                        <h1 class="jumlah">{{ $produk->count() }}</h1>
                        <p>Desain Undangan</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Clients Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>ManToe.id</h4>
                        <p>ManToe.id adalah layanan undangan pernikahan online. Yaitu undangan yang dikemas dalam bentuk
                            web yang praktis dan mudah untuk digunakan maupun dibagikan.</p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Akses Link</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Beranda</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#fitur">Fitur</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#pricing">Harga</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Tema Undangan</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Daftar</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Informasi</h4>
                        <ul>
                            <li><i class="bi bi-telephone-fill icon-footer"></i>Phone: <br /><a
                                    href="#">+6281XXXXXXXX</a></li>
                            <li><i class="bi bi-envelope icon-footer"></i>Email: <a
                                    href="#">mantoe@gmail.com</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Sosial Media</h4>
                        <ul>
                            <li><i class="bi bi-whatsapp icon-footer"></i><a
                                    href="https://www.whatsapp.com/">WhatsApp</a></li>
                            <li><i class="bi bi-instagram icon-footer"></i><a
                                    href="https://www.instagram.com/">Instagram </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>ManToe.id</span></strong> All Rights Reserved
            </div>
            <div class="credits"></div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>




    <!-- Modal -->
    {{-- <div class="modal fade" id="modalOrder" tabindex="-1" aria-labelledby="modalOrderLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalOrderLabel">Order Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your wizard content goes here -->
                    <!-- You can access the data attributes using jQuery -->
                    <input type="hidden" id="produkId" value="">
                    <input type="hidden" id="produkNama" value="">
                    <input type="hidden" id="produkBiaya" value="">
                    <!-- Step 1 -->
                    <div id="step1" class="step">
                        <h5>Step 1: Product Information</h5>
                        <p>Product ID: <span id="showProdukId"></span></p>
                        <p>Product Name: <span id="showProdukNama"></span></p>
                        <p>Product Biaya: <span id="showProdukBiaya"></span></p>
                    </div>
                    <!-- Step 2 -->
                    <div id="step2" class="step">
                        <h5>Step 2: Additional Details</h5>
                        <!-- Add input fields for additional details -->
                        <div class="form-group">
                            <label for="additionalInfo">Additional Information:</label>
                            <input type="text" class="form-control" id="additionalInfo">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                    <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                    <button type="button" class="btn btn-success" onclick="submitOrder()">Submit Order</button>
                </div>
            </div>
        </div>
    </div> --}}




    <div class="modal fade" id="modalOrder" tabindex="-1" role="dialog" aria-labelledby="modalOrderLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalOrderLabel">New Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="smartwizard">
                        <ul class="nav nav-progress">
                            <li class="nav-item">
                                <a class="nav-link" href="#step-1">
                                    <div class="num">1</div>
                                    Detail Pesanan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#step-2">
                                    <span class="num">2</span>
                                    Data Mempelai
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#step-3">
                                    <span class="num">3</span>
                                    Shipping Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#step-4">
                                    <span class="num">4</span>
                                    Confirm Order
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                <form id="form-1" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
                                    <div class="col">
                                        <label for="produkNama" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" id="produkNama" value=""
                                            required disabled>
                                        <input type="hidden" id="produkId">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide first name.
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="validationCustom02" class="form-label">Harga Dasar</label>
                                        <input type="text" class="form-control" id="produkHarga" value=""
                                            required disabled>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide last name.
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="validationCustom03" class="form-label">URL Undangan</label>
                                        <div class="input-group mb-2" id="validationCustom03">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">{{ url('/') }}/</div>
                                            </div>
                                            <input type="text" class="form-control" id="domain"
                                                placeholder="url" required>
                                            <input type="hidden" class="form-control" id="domaincek">
                                            <div class="valid-feedback" id="domainAvailabilityStatus">
                                                nahh gituuuu!
                                            </div>
                                            <div class="invalid-feedback">
                                                Form Wajib Diisi
                                            </div>
                                            {{-- <div id="domainAvailabilityStatus"></div> --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                Step content
                            </div>
                            <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                Step content
                            </div>
                            <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                {{-- 
                                <form id="form-4" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
                                    <div class="col">
                                        <div class="mb-3 text-muted">Please confirm your order details</div>

                                        <div id="order-details"></div>

                                        <h4 class="mt-3">Payment</h4>
                                        <hr class="my-2">

                                        <div class="row gy-3">
                                            <div class="col-md-3">
                                                <label for="cc-name" class="form-label">Name on card</label>
                                                <input type="text" class="form-control" id="cc-name"
                                                    value="My Name" placeholder="" required="">
                                                <small class="text-muted">Full name as displayed on card</small>
                                                <div class="invalid-feedback">
                                                    Name on card is required
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="cc-number" class="form-label">Credit card number</label>
                                                <input type="text" class="form-control" id="cc-number"
                                                    value="54545454545454" placeholder="" required="">
                                                <div class="invalid-feedback">
                                                    Credit card number is required
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="cc-expiration" class="form-label">Expiration</label>
                                                <input type="text" class="form-control" id="cc-expiration"
                                                    value="1/28" placeholder="" required="">
                                                <div class="invalid-feedback">
                                                    Expiration date required
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="cc-cvv" class="form-label">CVV</label>
                                                <input type="text" class="form-control" id="cc-cvv"
                                                    value="123" placeholder="" required="">
                                                <div class="invalid-feedback">
                                                    Security code required
                                                </div>
                                            </div>

                                            <div class="col">
                                                <input type="checkbox" class="form-check-input" id="save-info"
                                                    required>
                                                <label class="form-check-label" for="save-info">I agree to the terms
                                                    and conditions</label>
                                            </div>

                                            <small class="text-muted">This is an example page, do not enter any real
                                                data, even tho we don't submit this information!</small>

                                        </div>
                                    </div>
                                </form> --}}

                                step4

                            </div>
                        </div>


                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Vendor JS Files -->
    <script src="{{ asset('landingpage/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('landingpage/assets/vendor/php-email-form/validate.js') }}"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript">
    </script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landingpage/assets/js/main.js') }}"></script>
    @if (session('alert'))
        <script>
            alert("{{ session('alert') }}");
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#domain').on('input', function() {
                var domainInput = $(this).val();


                $('#domainAvailabilityStatus').html('');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('checkDomain') }}", // Replace with your Laravel route
                    data: {
                        domain: domainInput
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#domaincek').val(response.available);
                        console.log($('.was-validate.form-control'));
                        if (response.available && domainInput != '') {
                            $('#domain').addClass('is-valid').removeClass('is-invalid');
                            $('#domaincek').prop('checked', false);

                            $('#domainAvailabilityStatus').text(
                                'Domain is available!');

                        } else {
                            $('#domain').addClass('is-invalid').removeClass('is-valid');
                            $('#domaincek').prop('checked', true);
                            $('.invalid-feedback').text('Domain is not available!');
                        }
                    }
                });
            });
        });

        function onCancel() {
            // Reset wizard
            $('#smartwizard').smartWizard("reset");

            // Reset form
            $("#form-1").reset();
            $("#form-2").reset();
            $("#form-3").reset();
            $("#form-4").reset();
        }

        function onConfirm() {

        }


        // Step show event
        $(function() {
            $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled').prop('disabled', false);
                $("#next-btn").removeClass('disabled').prop('disabled', false);
                if (stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled').prop('disabled', true);
                } else if (stepPosition === 'last') {
                    $("#next-btn").addClass('disabled').prop('disabled', true);
                } else {
                    $("#prev-btn").removeClass('disabled').prop('disabled', false);
                    $("#next-btn").removeClass('disabled').prop('disabled', false);
                }

                // Get step info from Smart Wizard
                let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
                $("#sw-current-step").text(stepInfo.currentStep + 1);
                $("#sw-total-step").text(stepInfo.totalSteps);

                if (stepPosition == 'last') {
                    // showConfirm();
                    $("#btnFinish").prop('disabled', false);
                } else {
                    $("#btnFinish").prop('disabled', true);
                }

                // Focus first name
                if (stepIndex == 1) {
                    setTimeout(() => {
                        $('#first-name').focus();
                    }, 0);
                }
            });


            // Leave step event is used for validating the forms
            $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIdx, nextStepIdx,
                stepDirection) {
                // Validate only on forward movement  
                if (stepDirection == 'forward') {
                    var form = document.getElementById('form-' + (currentStepIdx + 1));
                    var domcek = $('#domaincek').prop('checked');
                    if (form) {
                        if (!form.checkValidity() || domcek) {
                            console.log(domcek, !form.checkValidity());
                            form.classList.add('was-validated');
                            $('#smartwizard').smartWizard("setState", [currentStepIdx], 'error');
                            $("#smartwizard").smartWizard('fixHeight');
                            return false;
                        }
                        $('#smartwizard').smartWizard("unsetState", [currentStepIdx], 'error');

                    }
                }
                console.log(currentStepIdx, nextStepIdx, domcek)
                // console.log(domcek, !form.checkValidity());
            });
            // SmartWizard initialize
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'dots', // basic, arrows, square, round, dots
                justified: true,
                toolbar: {
                    showNextButton: true, // show/hide a Next button
                    showPreviousButton: true, // show/hide a Previous button
                    position: 'bottom', // none/ top/ both bottom
                    extraHtml: `<button class="btn btn-success" id="btnFinish" disabled onclick="onConfirm()">Complete Order</button>
                              <button class="btn btn-danger" id="btnCancel" onclick="onCancel()">Cancel</button>`
                },
                transition: {
                    animation: 'fade'
                },
                anchor: {
                    enableNavigation: true, // Enable/Disable anchor navigation 
                    enableNavigationAlways: false, // Activates all anchors clickable always
                    enableDoneState: true, // Add done state on visited steps
                    markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
                    enableDoneStateNavigation: true // Enable/Disable the done state navigation
                },
            });

        });


        $('#modalOrder').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var produkId = button.data('produk-id'); // Extract info from data-* attributes
            var produkNama = button.data('produk-nama');
            var produkHarga = button.data('produk-biaya');


            // Update the modal content
            $('#produkId').val(produkId);
            $('#produkNama').val(produkNama);
            $('#produkHarga').val(produkHarga);
            $('#showProdukId').text(produkId);
            $('#showProdukNama').text(produkNama);
            $('#showProdukHarga').text(produkHarga);
        });
    </script>
</body>

</html>
