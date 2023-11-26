<?php

namespace App\Http\Controllers;

use App\TblUsersModel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $email = $request->email;
        $userEmail = TblUsersModel::where("email", $email)->first();
        if (!$userEmail) {
            $newUser = new TblUsersModel;
            $newUser->nama = $request->nama;
            $newUser->email = $request->email;
            $newUser->password = bcrypt($request->passwordRegister);
            $newUser->no_telp= $request->noTelp;
            $newUser->save();
            return redirect()->route('login')->with("success","Pendaftaran Berhasil");
        } else {
            return redirect()->back()->with("error","Email atau Nama sudah terdaftar");
        }
    }
}
