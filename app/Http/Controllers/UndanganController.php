<?php

namespace App\Http\Controllers;

use App\TblBukuTamusModel;
use App\TblPesanansModel;
use Illuminate\Http\Request;

class UndanganController extends Controller
{

    public function index($domain)
    {
        $domainnya = TblPesanansModel::where('domain', $domain)->first();

        if ($domainnya) {
            if (TblPesanansModel::where('status_pembayaran', 'lunas')->where('domain', $domain)->first()) {
                return view('undangan.themes.tes' . $domainnya->id_produk, ['tes' => 'dsadad']);
                // return ('sukses');
            }
            return ('Belum Dibayar gais');
        }
        abort(404, 'User Not  found');
        // return ($domainnya);
    }
    // public function tamu($domain, $tamu)
    // {
    //     $domainnya = TblPesanansModel::where('domain', $domain)->first();

    //     if ($tamu == null) {
    //         $tamunya = TblBukuTamusModel::add('nama_tamu', 'tamu undangan');
    //     } else {
    //         $tamunya = TblBukuTamusModel::where('nama_tamu', $tamu)->first();
    //     }


    //     if ($domainnya && $tamunya) {
    //         if (TblPesanansModel::where('status_pembayaran', 'lunas')->where('domain', $domain)->first()) {

    //             return view('undangan.themes.tes' . $domainnya->id_produk, ['tamunya' => $tamunya]);
    //             // return ('sukses');
    //         }
    //         return ('Belum Dibayar gais');
    //     }
    //     abort(404, 'User Not  found');
    //     // return ($domainnya);
    // }
    public function tamu($domain, $tamu = null)
    {
        $domainnya = TblPesanansModel::where('domain', $domain)->first();

        if ($tamu == null) {
            // Jika $tamu tidak diisi, gunakan nilai default 'tamu undangan'
            $tamunya = TblBukuTamusModel::create(['nama_tamu' => 'tamu undangan']);
        } else {
            $tamunya = TblBukuTamusModel::where('nama_tamu', $tamu)->first();
        }

        if ($domainnya && $tamunya) {
            if (TblPesanansModel::where('status_pembayaran', 'lunas')->where('domain', $domain)->first()) {
                return view('undangan.themes.tes' . $domainnya->id_produk, ['tamunya' => $tamunya]);
            }

            return 'Belum Dibayar gais';
        }

        abort(404, 'User Not found');
    }
}
