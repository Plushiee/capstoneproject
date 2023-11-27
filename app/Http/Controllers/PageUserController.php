<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageUserController extends Controller
{
    // User Dashboard 
    public function userDashboard()
    {
        return view('users.dashboard');
    }

    public function userMempelai()
    {
        return view('users.mempelai');
    }

    public function userCerita()
    {
        $jml_cerita = 0;
        return view('users.cerita', ['jml_cerita' => $jml_cerita]);
    }

    public function userOrder()
    {
        return view('users.order');
    }

    public function userListTamu()
    {
        return view('users.listtamu');
    }
    public function userGaleri()
    {
        return view('users.galeri');
    }
    public function userUcapan()
    {
        return view('users.ucapan');
    }
}
