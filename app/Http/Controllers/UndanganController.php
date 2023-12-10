<?php

namespace App\Http\Controllers;

use App\TblAcarasModel;
use App\TblBukuTamusModel;
use App\TblCeritasModel;
use App\TblMempelaisModel;
use App\TblPengunjungModel;
use App\TblPesanansModel;
use App\TblSalamsModel;
use App\TblUsersModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class UndanganController extends Controller
{



    private function counterPengunjung($id_pesanan, $namapengunjung, $ipAddress)
    {
        $visitor = TblPengunjungModel::where('id_pesanan', $id_pesanan)
            ->where('nama_pengunjung', $namapengunjung)
            ->where('alamat_ip', $ipAddress)
            ->whereDate('created_at', now()->toDateString())
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
        $salam = TblSalamsModel::select('tbl_salams.id', 'nama_tamu', 'isi_salam', 'kehadiran', 'tbl_salams.created_at as tanggal_post', 'like_by')->join('tbl_buku_tamus', 'tbl_salams.id_tamu', '=', 'tbl_buku_tamus.id')->orderBy('tbl_salams.created_at', 'desc')->get();
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


        $mempelai = $mempelainya;

        // $formattanggal = Carbon::parse($mempelainya->created_at)->format('YmdHis');
        $formattanggal = Carbon::parse(optional($mempelainya)->created_at)->format('YmdHis');

        $basePath = public_path('assets/file-upload/image/dir_' . optional($mempelainya)->id . optional($mempelainya)->id_pesanan . '_' . $formattanggal);
        $imagePath = asset('assets/file-upload/image/dir_' . optional($mempelainya)->id . optional($mempelainya)->id_pesanan . '_' . $formattanggal . '/album\/');
        if (File::isDirectory($basePath)) {
            // The directory exists, proceed with listing files
            $imageFiles = File::files($basePath . '/album\/');
        } else {
            // Handle the case where the directory doesn't exist
            // You might want to log an error, set default values, or take other actions
            $imageFiles = [];
        }



        $dir = [
            'fotopria' => $basePath . '/mempelaipria.jpg',
            'fotowanita' =>  $basePath . '/mempelaiwanita.jpg',
            'fotosampul' => $basePath . '/sampul.jpg',
        ];
        if (!file_exists($dir['fotopria'])) {
            $dir['fotopria'] = asset('assets/file-upload/image/camera.jpg');
        } else {
            $dir['fotopria'] = asset('assets/file-upload/image/dir_' . $mempelai->id . $mempelai->id_pesanan . '_' . $formattanggal . '/mempelaipria.jpg');
        }
        if (!file_exists($dir['fotowanita'])) {
            $dir['fotowanita'] = asset('assets/file-upload/image/camera.jpg');
        } else {
            $dir['fotowanita'] = asset('assets/file-upload/image/dir_' . $mempelai->id . $mempelai->id_pesanan . '_' . $formattanggal . '/mempelaiwanita.jpg');
        }
        if (!file_exists($dir['fotosampul'])) {
            $dir['fotosampul'] = asset('assets/file-upload/image/camera.jpg');
        } else {
            $dir['fotosampul'] = asset('assets/file-upload/image/dir_' . $mempelai->id . $mempelai->id_pesanan . '_' . $formattanggal . '/sampul.jpg');
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
                    'mempelainya' => $mempelainya,
                    'dir' => $dir,
                    'salam' => $salam,
                    'album' => $imageFiles,
                    'imagepath' => $imagePath,

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
    public function saveSalam(Request $request)
    {
        $id = $request->input('id');
        $komenya = $request->input('komentar');

        // Corrected typo in the first() method
        $user = TblBukuTamusModel::where('id', $id)->first()->nama_tamu;


        TblSalamsModel::create([
            'id_tamu' => $id,
            'isi_salam' => $komenya
        ]);

        return response()->json(['success' => true, 'status' => 'sukses', 'nama' => $user, 'komentar' => $komenya, 'dataakhir' =>  TblSalamsModel::select('tbl_salams.id', 'tbl_salams.id_tamu', 'nama_tamu', 'isi_salam', 'kehadiran', 'tbl_salams.created_at as tanggal_post', 'like_by')->join('tbl_buku_tamus', 'tbl_salams.id_tamu', '=', 'tbl_buku_tamus.id')->orderBy('tbl_salams.created_at', 'desc')->first()]);
    }

    public function likeSalam(Request $request)
    {
        $id = $request->input('id');
        $tamuId = $request->input('tamuId');

        $salam = TblSalamsModel::find($id);

        if (!$salam) {
            return response()->json(['error' => 'Salam not found'], 404);
        }

        $likeBy = $salam->like_by ?? [];

        if (in_array($tamuId, $likeBy)) {
            // User has already liked the salam, so unlike
            $likeBy = array_diff($likeBy, [$tamuId]);
            $message = 'Salam batal suka successfully';
        } else {
            // User hasn't liked the salam, so like
            $likeBy[] = $tamuId;
            $message = 'Salam liked successfully';
        }

        $salam->update([
            'like_by' => $likeBy,
        ]);

        $likeCount = count($likeBy);

        return response()->json(['message' => $message, 'likes_count' => $likeCount, 'sd' => $salam->like_by]);
    }
}
