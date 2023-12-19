<?php

namespace App\Http\Controllers;

use App\TblMempelaisModel;
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
    public function newOrder(Request $request)
    {
        $idProduk = $request->input('idProduk');
        $domain = $request->input('domain');
        $idAdmin = $request->input('idAdmin');
        $idUser = $request->input('idUser');

        $namaPria = $request->input('namaPria');
        $namaWanita = $request->input('namaWanita');
        $namaLengkapPria = $request->input('namaLengkapPria');
        $namaLengkapWanita = $request->input('namaLengkapWanita');
        $namaAyahWanita = $request->input('namaAyahWanita');
        $namaIbuWanita = $request->input('namaIbuWanita');
        $namaAyahPria = $request->input('namaAyahPria');
        $namaIbuPria = $request->input('namaIbuPria');


        $pesanan = new TblPesanansModel();
        $pesanan->id_admin = $idAdmin;
        $pesanan->id_produk = $idProduk;
        $pesanan->id_user = $idUser;
        $pesanan->domain = $domain;

        $pesanan->save();


        $mempelai = new TblMempelaisModel();
        $mempelai->id_pesanan = $pesanan->id;
        $mempelai->nama_pria = $namaLengkapPria;
        $mempelai->nama_wanita = $namaLengkapWanita;
        $mempelai->nama_panggilan_pria = $namaPria;
        $mempelai->nama_panggilan_wanita = $namaWanita;
        $mempelai->nama_ayah_wanita = $namaAyahWanita;
        $mempelai->nama_ibu_wanita = $namaIbuWanita;
        $mempelai->nama_ayah_pria = $namaAyahPria;
        $mempelai->nama_ibu_pria = $namaIbuPria;
        // // ... sisipkan nilai-nilai lainnya ...
        $mempelai->save();
        return response()->json(['message' => "Pesanan Sukses Dibuat"], 200);
    }
}
