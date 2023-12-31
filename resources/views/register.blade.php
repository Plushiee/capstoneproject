<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManToe.id | Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/iofrm-theme2.css">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo-only.png') }}">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="{{ asset('assets/images/logo-only.png') }}">
</head>

<body>
    <div class="form-body">
        <a href="index">
            <img class="logo-size" src="{{ asset('assets/images/logo-cp.png') }}" width="100px" alt="logoManToe.png">
        </a>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">

                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Get more things done with ManToe.id</h3>
                        <p>Access to the most powerfull tool in the entire digital wedding design in Indonesia.</p>
                        <div class="page-links">
                            <a href="login">Login</a><a href="register" class="active">Register</a>
                        </div>
                        <form action="{{ route('registerSave') }}" method="POST">
                            @csrf
                            <input class="form-control mb-3" type="text" name="nama" placeholder="Nama Lengkap"
                                required>
                            <input class="form-control mb-3" type="email" name="email" placeholder="Alamat E-mail"
                                required>
                            <input class="form-control mb-3" type="text" name="noTelp" placeholder="Nomot Telepon"
                                required>
                            <div class="input-group px-0 mb-3">
                                <input type="password" class="form-control" id="passwordRegister"
                                    name="passwordRegister" placeholder="Kata Sandi" minlength="8"
                                    autocomplete="new-password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text pass" id="pass">
                                        <i class="bi bi-eye-fill" id="showPass"></i>
                                        <i class="bi bi-eye-slash-fill" id="hidePass"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="input-group px-0">
                                <input type="password" class="form-control" id="passwordConformation"
                                    name="passwordConformation" placeholder="Ulangi Kata Sandi"minlength="8"
                                    autocomplete="new-conf-password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text conf" id="conf">
                                        <i class="bi bi-eye-fill" id="showPassConf"></i>
                                        <i class="bi bi-eye-slash-fill" id="hidePassConf"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="mb-3 mt-2 text-center d-none" id="sama"
                                style="color: white; font-weight: bold">
                                Password Tidak Sama!</p>
                            <div class="form-button mt-3">
                                <button id="submitRegister" type="submit" class="ibtn submitRegister">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/register.js"></script>
</body>

</html>
