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
        $admin = TblAdminsModel::where('email', $email)->first();

        if ($admin) {
            if (password_verify($password, $admin->password)) {
                Auth::guard('admin')->login($admin, $remember);
                return redirect()->route('adminDashboard')->with("admin", "selamat datang ");
            } else {
                return back()->with("errorWrong", "Password atau Email anda salah");
            }
        } elseif ($users) {
            if (password_verify($password, $users->password)) {
                Auth::guard('users')->login($users, $remember);
                return redirect()->route('landingPage')->with("user", "selamat datang ");
            } else {
                return back()->with("errorWrong", "Password atau Email anda salah");
            }
        } else {
            return back()->with("error", "Email tidak terdaftar");
        }
    }

    public function logout()
    {
        $userTypes = ['users', 'admin'];

        foreach ($userTypes as $userType) {
            if (Auth::guard($userType)->check()) {
                Auth::guard($userType)->logout();
                if ($userType == 'users') {
                    return redirect()->route('landingPage')->with('alert', 'Anda telah logout, Ditunggu kedatanganya lagi ya');
                } else {
                    return redirect()->route('landingPage')->with('alert', 'Anda telah logout');
                }
            }
        }
    }
}
