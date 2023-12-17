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
    public function checkDomain(Request $request)
    {
        try {

            $request->validate([
                'domain' => 'required|string',
            ]);
            $domain = $request->input('domain');
            $domainExists = TblPesanansModel::where('domain', $domain)->exists();
            return response()->json(['available' => !$domainExists]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
