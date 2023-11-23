<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $email = $request->email;

        // Cek Data Akun
        $isUser = \App\TblUsersModel::where('email', $email)->exists();
        $isAdmin = \App\TblAdminsModel::where('email', $email)->exists();

        if ($isAdmin) {
            return redirect('/admin/dashboard');
        }

        return $next($request);
    }
}
