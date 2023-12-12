<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManToe.id | Forget Password</title>
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
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="{{ asset('assets/images/logo-cp.png') }}" alt="logoManToe.png">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">

                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Password Reset</h3>
                        <p>To reset your password, enter the email address you use to sign in to ManToe.id</p>
                        <form action="{{route('forget-post')}}" method="post">
                            @csrf
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address"
                                required>
                            <div class="form-button full-width">
                                <button id="submit" type="submit" class="ibtn btn-forget">Send Reset Link</button>
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
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('message'))
        <script>
            $(document).ready(function() {
                // Alert
                var toastMixin = Swal.mixin({
                    toast: true,
                    icon: 'success',
                    title: 'General Title',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                toastMixin.fire({
                    animation: true,
                    title: 'Kita sudah mengirimkan Link untuk mereset password email Anda!'
                });
            });
        </script>
    @endif
    @if (session('errorMessage'))
    <script>
        $(document).ready(function() {
            // Alert
            var toastMixin = Swal.mixin({
                toast: true,
                icon: 'error',
                title: 'General Title',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            toastMixin.fire({
                animation: true,
                title: 'Email tidak dapat ditemukan!'
            });
        });
    </script>
@endif
</body>

</html>
