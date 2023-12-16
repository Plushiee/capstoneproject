<?php

namespace App\Http\Controllers;

use App\TblPesanansModel;
use App\TblProduksModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    //
    public function index()
    {
        

        $produk = TblProduksModel::all();
        return view('landingpage', ['produk' => $produk]);
    }
}
