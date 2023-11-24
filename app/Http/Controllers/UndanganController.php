<?php

namespace App\Http\Controllers;

use App\TblBukuTamusModel;
use App\TblPesanansModel;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    //
    public function index($domain)
    {
        $domainnya = TblPesanansModel::where('domain', $domain)->first();

        if ($domainnya) {
            if (TblPesanansModel::where('status_pembayaran', 'lunas')->where('domain', $domain)->first()) {
                return view('undangan.theme.tes' . $domainnya->id_produk);
                // return ('sukses');
            }
            return ('Belum Dibayar gais');
        }
        abort(404, 'User Not  found');
        // return ($domainnya);
    }
    public function tamu($domain, $tamu)
    {
        $domainnya = TblPesanansModel::where('domain', $domain)->first();
        $tamunya = TblBukuTamusModel::where('nama_tamu', $tamu)->first();

        if ($domainnya && $tamunya) {
            if (TblPesanansModel::where('status_pembayaran', 'lunas')->where('domain', $domain)->first()) {

                return ('undangan.theme.tes' . $domainnya->id_produk);
                // return ('sukses');
            }
        }
        abort(404, 'User Not  found');
        // return ($domainnya);
    }
}
