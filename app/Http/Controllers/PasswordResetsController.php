<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\TblUsersModel;
use Mail;
use Hash;
use Illuminate\Support\Str;

class PasswordResetsController extends Controller
{
    public function submitForgetPasswordForm(Request $request)
    {
        $user = TblUsersModel::where('email', $request->email)->exists();

        if (!$user) {
            return back()->with('errorMessage', 'Email tidak dapat ditemukan!');
        } else {
            $token = Str::random(64);

            DB::table('tbl_password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::send('emails.forgot-password', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });

            return back()->with('message', 'Kita sudah mengirimkan Link untuk mereset password email Anda!');
        }
    }

    public function showResetPasswordForm($token)
    {
        return view('reset', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $updatePassword = DB::table('tbl_password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = TblUsersModel::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('tbl_password_resets')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('successChange', 'Password Sudah Diganti!');
    }
}
