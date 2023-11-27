<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Undangan Digital Modern</title>

    <!-- cdn bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/css/nav.css') }}">

    <!-- cdn icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:opsz,wght@8..144,500&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@1,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@1,6..12,700&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@1,6..12,700&family=Ubuntu:wght@700&display=swap"
        rel="stylesheet">


    <script src="{{ asset('landingpage/js/index.js') }}"></script>
</head>

<body>
    <!-- navbar -->

    <!-- background -->
    <div class="background">
        <nav class="navbar">
            <div class="brand-title">
                <a href="#">DreamyInvites</a>
            </div>

            <!-- This is for hamberger menu -->
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>

            <div class="navbar-links">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#katalog">Katalog</a></li>
                    <li><a href="#pricelist">Pricelist</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contacts">Contacts</a></li>
                </ul>
            </div>
        </nav>
        <div class="backround">
            <!-- <img src="gambar/elegan.jpg"> -->
            <h1 class="text-center">DreamyInvites</h1>
            <p class="text-center">Ciptakan undangan pernikahan Anda dengan nuansa
                Sederhana Indah Klasik Modern Refined Eksklusif</p>
            <center><button type="button" class="btn justify-content-center ">Konsultasi Sekarang</button></center>
        </div>
    </div>
    <!-- /bacround -->

    <div class="container-utama">
        <!-- tentang -->
        <div class="container tentang">
            <div class=" clearfix" id="about">
                <img src="{{ asset('landingpage/gambar/buket.jpg') }}"
                    class="col-md-6 float-md-end mb-3 ms-md-3 container-sm" alt="...">
                <h2>DreamyInvites</h2>
                <p>
                    Buat dan bagikan undangan pernikahanmu dengan sentuhan magis dari berbagai pilihan desain & tampilan
                    undangan yang kekinian. Mari wujudkan impian pernikahan indahmu bersama kami, di DreamyInvites,
                    tempat di mana setiap detail menjadi bagian dari kisah romantis yang tak terlupakan.
                </p>
            </div>
        </div>
        <!-- /tentang -->

        <!-- tema wedding -->
        <div class="tema" id="katalog">
            <div class="container text-left tema">
                <h1 class="text-center">Pilihan Undangan Website</h1>
                <h2 class="text-center ">Tema Wedding</h2>
                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                    <div class="col">
                        <div class="card tema-item" style="width: 13rem;">
                            <img src="{{ asset('landingpage/gambar/4.jpg') }}" height="180px"
                                class="
		  card-img-top foto-tema" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title ">Tema</h5>
                                <p class="card-text red">IDR 90.000 - 120.000</p>
                                <p class="card-text">IDR 90.000 - 120.000</p>
                                <a href="#" class="card-link"><i class="bi bi-cart-fill"></i>Pesan</a>
                                <a href="#" class="btn btn-sm btn-warning ">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 13rem;">
                            <img src="{{ asset('landingpage/gambar/4.jpg') }}" height="180px"
                                class="card-img-top foto-tema" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title ">Tema</h5>
                                <p class="card-text red">IDR 90.000 - 120.000</p>
                                <p class="card-text">IDR 90.000 - 120.000</p>
                                <a href="#" class="card-link"><i class="bi bi-cart-fill"></i>Pesan</a>
                                <a href="#" class="btn btn-sm btn-warning ">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 13rem;">
                            <img src="{{ asset('landingpage/gambar/4.jpg') }}" height="180px"
                                class="card-img-top foto-tema" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title ">Tema</h5>
                                <p class="card-text red">IDR 90.000 - 120.000</p>
                                <p class="card-text">IDR 90.000 - 120.000</p>
                                <a href="#" class="card-link"><i class="bi bi-cart-fill"></i>Pesan</a>
                                <a href="#" class="btn btn-sm btn-warning ">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 13rem;">
                            <img src="{{ asset('landingpage/gambar/4.jpg') }}" height="180px"
                                class="card-img-top foto-tema" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title ">Tema</h5>
                                <p class="card-text red">IDR 90.000 - 120.000</p>
                                <p class="card-text">IDR 90.000 - 120.000</p>
                                <a href="#" class="card-link"><i class="bi bi-cart-fill"></i>Pesan</a>
                                <a href="#" class="btn btn-sm btn-warning ">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 13rem;">
                            <img src="{{ asset('landingpage/gambar/4.jpg') }}" height="180px"
                                class="card-img-top foto-tema" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title ">Tema</h5>
                                <p class="card-text red">IDR 90.000 - 120.000</p>
                                <p class="card-text">IDR 90.000 - 120.000</p>
                                <a href="#" class="card-link"><i class="bi bi-cart-fill"></i>Pesan</a>
                                <a href="#" class="btn btn-sm btn-warning ">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" st yle="width: 13rem;">
                            <img src="{{ asset('landingpage/gambar/4.jpg') }}" height="180px"
                                class="card-img-top foto-tema" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title ">Tema</h5>
                                <p class="card-text red">IDR 90.000 - 120.000</p>
                                <p class="card-text">IDR 90.000 - 120.000</p>
                                <a href="#" class="card-link"><i class="bi bi-cart-fill"></i>Pesan</a>
                                <a href="#" class="btn btn-sm btn-warning ">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 13rem;">
                            <img src="{{ asset('landingpage/gambar/4.jpg') }}" height="180px"
                                class="card-img-top foto-tema" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title ">Tema</h5>
                                <p class="card-text red">IDR 90.000 - 120.000</p>
                                <p class="card-text">IDR 90.000 - 120.000</p>
                                <a href="#" class="card-link"><i class="bi bi-cart-fill"></i>Pesan</a>
                                <a href="#" class="btn btn-sm btn-warning ">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 13rem;">
                            <img src="{{ asset('landingpage/gambar/4.jpg') }}" height="180px"
                                class="card-img-top foto-tema" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title ">Tema</h5>
                                <p class="card-text red">IDR 90.000 - 120.000</p>
                                <p class="card-text">IDR 90.000 - 120.000</p>
                                <a href="#" class="card-link"><i class="bi bi-cart-fill"></i>Pesan</a>
                                <a href="#" class="btn btn-sm btn-warning ">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card " style="width: 13rem;">
                            <img src="{{ asset('landingpage/gambar/4.jpg') }}" height="180px"
                                class="card-img-top foto-tema" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title ">Tema</h5>
                                <p class="card-text red">IDR 90.000 - 120.000</p>
                                <p class="card-text">IDR 90.000 - 120.000</p>
                                <a href="#" class="card-link"><i class="bi bi-cart-fill"></i>Pesan</a>
                                <a href="#" class="btn btn-sm btn-warning ">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 13rem;">
                            <img src="{{ asset('landingpage/gambar/4.jpg') }}" height="180px "
                                class="card-img-top foto-tema" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title ">Tema</h5>
                                <p class="card-text red">IDR 90.000 - 120.000</p>
                                <p class="card-text">IDR 90.000 - 120.000</p>
                                <a href="#" class="card-link"><i class="bi bi-cart-fill"></i>Pesan</a>
                                <a href="#" class="btn btn-sm btn-warning ">Preview</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /tema wedding -->

        <!-- price -->
        <div class="pricelist" id="pricelist">
            <h1 class="text-center judul">Pricelist</h1>
            <div class="list">
                <div class="container-sm overflow-hidden text-left">
                    <div class="row gx-2">
                        <div class="col-2"></div>
                        <div class="col">
                            <div class="card" style="width: 25rem;">
                                <div class="card-body price">
                                    <h5 class="card-title text-center">Dengan Foto</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary text-center">Rp. 249.000</h6>
                                    <h1 class="text-center">Rp. 120.000</h1>
                                    <p class="card-text "><i class="bi bi-check-circle"></i>Free Input 10 Foto</p>
                                    <p class="card-text "><i class="bi bi-check-circle"></i>Cover Undangan</p>
                                    <p class="card-text "><i class="bi bi-check-circle"></i>Bebas Input Nama Tamu</p>
                                    <p class="card-text "><i class="bi bi-check-circle"></i>Amplop Digital</p>
                                    <p class="card-text "><i class="bi bi-check-circle"></i>Love Story</p>
                                    <p class="card-text "><i class="bi bi-check-circle"></i>Musik Auto Play</p>
                                    <p class="card-text "><i class="bi bi-check-circle"></i>Hitung Mundur Acara</p>
                                    <p class="card-text "><i class="bi bi-check-circle"></i>Navigasi Lokasi</p>
                                    <p class="card-text "><i class="bi bi-check-circle"></i>Quotes Pernikahan</p>

                                    <div class="contaiter d-flex justify-content-center align-items-center">
                                        <a href="#" class="btn btn-sm btn-warning ">Preview</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">

                            <div class="container-sm overflow-hidden text-left">
                                <div class="row gx-2">
                                    <div class="col">
                                        <div class="card" style="width: 25rem;">
                                            <div class="card-body price">
                                                <h5 class="card-title text-center">Tanpa Foto</h5>
                                                <h6 class="card-subtitle mb-2 text-body-secondary text-center">
                                                    Rp.199.000</h6>
                                                <h1 class="text-center">Rp. 90.000</h1>
                                                <p class="card-text "><i class="bi bi-check-circle"></i>Tanpa Foto /
                                                    Animasi</p>
                                                <p class="card-text "><i class="bi bi-check-circle"></i>Cover Undangan
                                                </p>
                                                <p class="card-text "><i class="bi bi-check-circle"></i>Bebas Input
                                                    Nama Tamu</p>
                                                <p class="card-text "><i class="bi bi-check-circle"></i>Amplop Digital
                                                </p>
                                                <p class="card-text "><i class="bi bi-check-circle"></i>Love Story</p>
                                                <p class="card-text "><i class="bi bi-check-circle"></i>Musik Auto
                                                    Play</p>
                                                <p class="card-text "><i class="bi bi-check-circle"></i>Hitung Mundur
                                                    Acara</p>
                                                <p class="card-text "><i class="bi bi-check-circle"></i>Navigasi
                                                    Lokasi</p>
                                                <p class="card-text "><i class="bi bi-check-circle"></i>Quotes
                                                    Pernikahan</p>

                                                <div
                                                    class="contaiter d-flex justify-content-center align-items-center">
                                                    <a href="#" class="btn btn-sm btn-warning ">Preview</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                < <div class="container-sm tambahan">
                    <h6>Tambahan:</h6>
                    <ul>
                        <li>Express @39.000 (Next Day Service)</li>
                        <li>Extra Express @79.000 (Same Day Service)</li>
                        <li>Tambahan Denah Lokasi @15.000 (Khusus Bundling Video/Jpeg)</li>
                        <li>Tambahan Barcode Lokasi @10.000 (Khusus Bundling Video/Jpeg)</li>
                        <li>Undangan Custom (Chat Admin)</li>
                    </ul>
                    <h6>Note:</h6>
                    <ul>
                        <li>Dark mode/ mode gelap pada HP dapat mempengaruhi warna asli pada undangan.</li>
                        <li>Untuk tampilan terbaik silahkan akses melalui browser crome.</li>
                    </ul>
            </div>
        </div>


        <!-- /price -->

        <!-- footer -->
        <footer id="contacts">

            <div class="p-3 footer-item">
                <h6>Jam Operasional:</h6>
                <p>- Senin - Sabtu = 09.00 s/d 21.00 WIB</p>
                <p>- Minggu, Hari Libur = Slow Response</p>

                <hr>
                <p>Copyright undangandigimo.com © 2021</p>
                <h6>Abadikan Moment Spesial - All Rights Reserved</h6>
            </div>
            <div class="footer-itemm">
                <div class="p-3 icon-sosial footer-item">
                    <h6>More Info:</h6>
                    <p>
                        <i class="bi bi-whatsapp"><a href="#"></a></i>
                        <i class="bi bi-instagram"><a href="#"></a></i>
                    </p>
                </div>
            </div>
        </footer>
        <!-- /footer -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
