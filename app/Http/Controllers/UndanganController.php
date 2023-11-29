<?php

namespace App\Http\Controllers;

use App\TblAcarasModel;
use App\TblBukuTamusModel;
use App\TblCeritasModel;
use App\TblMempelaisModel;
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
        $idnyapesanan = $domainnya->id;
        //
        // $idnyaacara = $acaranya->id;
        $acaranya = TblAcarasModel::where('id_pesanan', $idnyapesanan)->get();
        // 
        // $idnyaacara = optional($acaranya)->id;
        #

        $ceritanya = TblCeritasModel::where('id_pesanan', $idnyapesanan)->first();

        $mempelainya = TblMempelaisModel::where('id_pesanan', $idnyapesanan)->first();

        if ($tamu == null) {


            $tamunya = TblBukuTamusModel::create([

                'id_pesanan' => $domainnya->id,
                'nama_tamu' => 'tamu undangan',
                'alamat_tamu' => 'Tempat'
            ]);
        } else {
            $tamunya = TblBukuTamusModel::where('nama_tamu', $tamu)->where('id_pesanan', $idnyapesanan)->first();
        }

        if ($domainnya && $tamunya) {
            if (TblPesanansModel::where('status_pembayaran', 'lunas')->where('domain', $domain)->first()) {

                return view('undangan.themes.tes' . $domainnya->id_produk, [
                    'tamunya' => $tamunya,
                    'ceritanya' => $ceritanya,
                    'acaranya' => $acaranya,
                    'mempelainya' => $mempelainya
                ]);
                // return ($idnyapesanan . '</br>' . $domainnya . '</br>' . $tamunya);
            }

            return ('Konfirmasi bayar dulu');
        }

        abort(404, 'User Not found');
    }
}
