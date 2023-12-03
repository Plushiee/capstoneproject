<?php

namespace App\Http\Controllers;

use App\TblAcarasModel;
use App\TblBukuTamusModel;
use App\TblCeritasModel;
use App\TblMempelaisModel;
use App\TblPengunjungModel;
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

    private function counterPengunjung($id_pesanan, $namapengunjung, $ipAddress)
    {
        $visitor = TblPengunjungModel::where('id_pesanan', $id_pesanan)
            ->where('nama_pengunjung', $namapengunjung)
            ->where('alamat_ip', $ipAddress)
            ->first();

        if ($visitor) {
            $visitor->increment('jumlah_kunjungan');
        } else {
            TblPengunjungModel::create([
                'id_pesanan' => $id_pesanan,
                'nama_pengunjung' => $namapengunjung,
                'alamat_ip' => $ipAddress,
            ]);
        }
    }


    public function tamu($domain, $tamu = null)
    {
        $domainnya = TblPesanansModel::where('domain', $domain)->first();
        $idnyapesanan = optional($domainnya)->id;
        //
        // $idnyaacara = $acaranya->id;
        $acaranya = TblAcarasModel::where('id_pesanan', $idnyapesanan)->get();
        // 
        // $idnyaacara = optional($acaranya)->id;
        #

        $ceritanya = TblCeritasModel::where('id_pesanan', $idnyapesanan)->get();

        $mempelainya = TblMempelaisModel::where('id_pesanan', $idnyapesanan)->first();

        if ($tamu == null) {


            $tamunya = TblBukuTamusModel::create([

                'id_pesanan' => $idnyapesanan,
                'nama_tamu' => 'tamu undangan',
                'alamat_tamu' => 'Tempat'
            ]);
        } else {
            $tamunya = TblBukuTamusModel::where('nama_tamu', $tamu)->where('id_pesanan', $idnyapesanan)->first();
        }

        $ipAddress = request()->ip();

        if ($domainnya && $tamunya) {
            if (TblPesanansModel::where('status_pembayaran', 'lunas')->where('domain', $domain)->first()) {
                $ipAddress = request()->ip();
                $this->counterPengunjung($idnyapesanan, $tamunya->nama_tamu, $ipAddress);

                return view('undangan.themes.tes' . $domainnya->id_produk, [
                    'idpesananya' => $idnyapesanan,
                    'tamunya' => $tamunya,
                    'ceritanya' => $ceritanya,
                    'acaranya' => $acaranya,
                    'mempelainya' => $mempelainya
                ]);
                // return ($idnyapesanan . '</br>' . $tamunya . '</br>' . $ipAddress);
            }

            return ('Konfirmasi bayar dulu');
        }

        abort(404, 'User Not found');
    }
    public function updateKehadiran(Request $request)
    {
        $newAttendance = $request->input('new_attendance');
        $id = $request->input('id');

        // Update the attendance in the database
        TblBukuTamusModel::where('id', $id)->update(['kehadiran' => $newAttendance]);

        return response()->json(['success' => true, 'message' => 'Attendance updated successfully']);
    }
}
