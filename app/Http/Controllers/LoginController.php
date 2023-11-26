<?php

namespace App\Http\Controllers;

use App\TblAdminsModel;
use App\TblUsersModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->passwordLogin;
        $remember = $request->has('remember');

        $users = TblUsersModel::where('email', $email)->first();

        if ($users) {
            if (password_verify($password, $users->password)) {

                $isUser = TblUsersModel::where('email', $email)->exists();
                $isAdmin = TblAdminsModel::where('email', $email)->exists();
                $isSuperAdmin = TblAdminsModel::where('email', $email)
                    ->where('super_admin', true)->exists();

                if ($isUser) {
                    Auth::guard('users')->login($users, $remember);
                    return redirect('/users/dashboard')->with("user", "User Ini Adalah User");
                }
                if ($isAdmin) {
                    Auth::guard('admin')->login($users, $remember);
                    return redirect('/pilih-akun')->with("admin", "User Ini Adalah Admin");
                }
                if ($isSuperAdmin) {
                    Auth::guard('admin')->login($users, $remember);
                    return redirect('/pilih-akun')->with("super_admin", "User Ini Adalah Super Admin");
                }
            } else {
                return back()->with("errorWrong", "Password atau Email anda salah");
            }
        } else {
            return back()->with("error", "Email tidak terdaftar");
        }
    }

    public function logout(Request $request)
    {
        $tipeAkun = $request->tipeAkun;
        Auth::guard($tipeAkun)->logout();
        return redirect('/login');
    }


}
