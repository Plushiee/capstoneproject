<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
</head>

<body>
    <div style="max-width: 600px; margin: 0 auto;">
        <div style="background-color: #f5f5f5; padding: 30px; border-radius: 5px; text-align: center;">
            <img src="https://drive.google.com/uc?export=view&id=19_gMpV9GBBAQtSCDXf4C6n37oB20dLnN" alt="ManToe.id"
                width="200">
            <h2 style="color: #333; margin-bottom: 15px;">Reset Password</h2>
            <p style="color: #777; margin-bottom: 30px;">Anda menerima email ini karena kami menerima permintaan
                pengaturan ulang kata sandi untuk akun Anda.</p>
            <div
                style="background-color: #ff6b6b; padding: 20px; color: #fff; text-decoration: none; border-radius: 5px; margin-bottom: 30px;">
                <a href="{{ route('reset', $token) }}" style="color: #fff; text-decoration: none;">Reset Password</a>
            </div>
            <p style="color: #777; margin-bottom: 15px;">Tautan tersebut akan expired dalam 60 menit. Jika Anda tidak
                meminta pengaturan ulang kata sandi, Anda dapat mengabaikan email ini dan kata sandi Anda tetap aman.
            </p>
            <p style="color: #777; margin-bottom: 15px;">Terima kasih,</p>
            <p style="color: #777;">ManToe.id</p>
        </div>
    </div>
</body>

</html>
