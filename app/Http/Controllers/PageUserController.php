<?php

namespace App\Http\Controllers;

use App\Imports\ImportTamuExcel;
use App\TblAcarasModel;
use App\TblAlbumsModel;
use App\TblBukuTamusModel;
use App\TblCeritasModel;
use App\TblMempelaisModel;
use App\TblPengunjungModel;
use App\TblPesanansModel;
use App\TblProduksModel;
use App\TblSalamsModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class PageUserController extends Controller
{
    // User Dashboard
    public function userDashboard()
    {
        $salam = TblSalamsModel::select('tbl_salams.id', 'nama_tamu', 'isi_salam', 'kehadiran', 'tbl_salams.created_at as tanggal_post', 'like_by')->join('tbl_buku_tamus', 'tbl_salams.id_tamu', '=', 'tbl_buku_tamus.id')->orderBy('tbl_salams.created_at', 'asc')->get();
        $tanggalAkhir = TblPesanansModel::join('tbl_acaras', 'tbl_pesanans.id', '=', 'tbl_acaras.id_pesanan')
            ->select('tbl_pesanans.id', DB::raw('MAX(tbl_acaras.waktu_acara) as tanggal_terakhir'))
            ->where('id_user', Auth::user()->id)
            ->groupBy('tbl_pesanans.id')
            ->get();

        $banyakPengunjung = TblPengunjungModel::join('tbl_pesanans', 'tbl_pesanans.id', '=', 'tbl_pengunjungs.id_pesanan')
            ->select('id_pesanan', DB::raw('COUNT(*) as total_kunjungan'))
            ->where('id_user', Auth::user()->id)
            ->groupBy('id_pesanan')
            ->get();

        $banyakPengunjungPerHari = TblPengunjungModel::join('tbl_pesanans', 'tbl_pesanans.id', '=', 'tbl_pengunjungs.id_pesanan')
            ->select(
                'id_pesanan',
                DB::raw('sum(jumlah_kunjungan) as total_kunjungan'),
                DB::raw('DATE(tbl_pengunjungs.created_at) as tanggal')
            )
            ->where('id_user', Auth::user()->id)
            ->groupBy('id_pesanan', 'tanggal')
            ->get();
        $pengunjungAll = TblPengunjungModel::join('tbl_pesanans', 'tbl_pesanans.id', '=', 'tbl_pengunjungs.id_pesanan')
            ->select('tbl_pengunjungs.updated_at as update', 'tbl_pengunjungs.created_at as create', 'tbl_pengunjungs.nama_pengunjung as nama', 'tbl_pengunjungs.jumlah_kunjungan as jumlah')
            ->where('id_user', Auth::user()->id)
            ->orderBy('create', 'desc')
            ->get();

        $tamunya = TblBukuTamusModel::where('id_pesanan', TblPesanansModel::where('id_user', Auth::user()->id)->value('id'))->get();
        return view('users.dashboard', [
            'tanggalAkhir' => $tanggalAkhir,
            'banyakPengunjung' => $banyakPengunjung,
            'banyakPengunjungPerHari' => $banyakPengunjungPerHari,
            'tamu' => $tamunya,
            'ucapan' => $salam,
            'pengunjung' => $pengunjungAll
        ]);
    }

    public function userOrder()
    {
        // $pesanan = TblProduksModel::join('tbl_pesanans', 'tbl_pesanans.id_produk', '=', 'tbl_produks.id')->join('tbl_users', 'tbl_pesanans.id_user', '=', 'tbl_users.id')->where('id_user', Auth::user()->id)->first();
        $pesanan = TblPesanansModel::join('tbl_users', 'tbl_pesanans.id_user', '=', 'tbl_users.id')
            ->join('tbl_produks', 'tbl_pesanans.id_produk', '=', 'tbl_produks.id')
            ->where('tbl_pesanans.id_user', Auth::user()->id)
            ->select('tbl_pesanans.*', 'tbl_users.*', 'tbl_produks.*', 'tbl_pesanans.created_at as pesanan_created_at')
            ->first();
        return view('users.order', ['pesanan' => $pesanan]);
    }


    public function userMempelai()
    {
        $mempelai = TblMempelaisModel::where('id_pesanan', TblPesanansModel::where('id_user', Auth::user()->id)->value('id'))->first();
        $formattanggal = Carbon::parse($mempelai->created_at)->format('YmdHis');

        $basePath = public_path('assets/file-upload/image/dir_' . $mempelai->id . $mempelai->id_pesanan . '_' . $formattanggal);

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
        return view('users.mempelai', ['mempelai' => $mempelai, 'direktori' => "dir_{$mempelai->id}{$mempelai->id_pesanan}_{$formattanggal}", 'dir' => $dir]);
    }
    public function uploadGaleri(Request $request)
    {

        $mempelai = TblMempelaisModel::where('id_pesanan', TblPesanansModel::where('id_user', Auth::user()->id)->value('id'))->first();
        $formattanggal = Carbon::parse($mempelai->created_at)->format('YmdHis');
        $basePath = public_path('assets/file-upload/image/dir_' . $mempelai->id . $mempelai->id_pesanan . '_' . $formattanggal);

        $filecount = count(glob($basePath . '/album/*'));

        if ($filecount >= 10) {
            return response()->json(['success' => false, 'message' => 'Maximal file album 10 foto']);
        }
        $file = $request->file('file');
        $fileName = $this->generateFileName($file->getClientOriginalExtension());
        $file->move($basePath . '/album', $fileName);

        return response()->json(['success' => true, 'message' => 'Berhasil Dipload']);
    }
    private function generateFileName($extension)
    {
        // Generate a unique name based on the current time
        $namaalbum = 'album' . time();

        // Append the file extension
        return $namaalbum . '.' . $extension;
    }
    public function getGaleri()

    {
        $mempelai = TblMempelaisModel::where('id_pesanan', TblPesanansModel::where('id_user', Auth::user()->id)->value('id'))->first();
        $formattanggal = Carbon::parse($mempelai->created_at)->format('YmdHis');
        $basePath = public_path('assets/file-upload/image/dir_' . $mempelai->id . $mempelai->id_pesanan . '_' . $formattanggal);
        $assetPath = asset('assets/file-upload/image/dir_' . $mempelai->id . $mempelai->id_pesanan . '_' . $formattanggal);

        if (File::isDirectory($basePath . '/album')) {
            // Get the list of files in the 'uploads' directory
            $files = File::files($basePath . '/album');

            // Create an array to store file information
            $fileList = [];

            // Populate the array with file details
            foreach ($files as $file) {
                $fileList[] = [
                    'name' => pathinfo($file, PATHINFO_BASENAME),
                    'size' => File::size($file),
                    'path' => $assetPath . '/album\/' . basename($file),
                ];
            }

            return response()->json($fileList);
        }

        // If the directory doesn't exist, return an empty array
        return response()->json([]);
    }
    public function hapusGaleri(Request $request)
    {
        $file_path = $request->get('file_path');

        $mempelai = TblMempelaisModel::where('id_pesanan', TblPesanansModel::where('id_user', Auth::user()->id)->value('id'))->first();
        $formattanggal = Carbon::parse($mempelai->created_at)->format('YmdHis');
        $basePath = public_path('assets/file-upload/image/dir_' . $mempelai->id . $mempelai->id_pesanan . '_' . $formattanggal . '/album\/' . $file_path);

        if (File::exists($basePath)) {
            File::delete($basePath);
            return response()->json(['success' => true, 'message' => 'file berhasil di hapus']);
        } else {
            return response()->json(['success' => false, 'message' => 'File not found']);
        }
    }

    public function uploadFotoMempelai(Request $request)
    {
        $fotopria = $request->file('foto_mempelaipria');
        $fotowanita = $request->file('foto_mempelaiwanita');
        $fotosampul = $request->file('foto_sampul');
        $direktori = $request->input('direktori');
        $basePath = public_path('assets/file-upload/image/');
        $path = $basePath . $direktori;
        // return ($path);
        if (!file_exists($path)) {

            mkdir($path, 0777, true);
        }
        if ($fotopria != '') {
            $avatar = $fotopria;
            $pathName = $path . 'mempelaipria.jpg';
            if (file_exists($pathName)) {
                unlink($pathName);
            }
            $avatar->move($path, 'mempelaipria.jpg');
            return response()->json(['success' => true, 'pesan' => 'foto mempelai pria berhasil disimpan']);
        } elseif ($fotowanita != '') {
            $avatar = $fotowanita;
            $pathName = $path . 'mempelaiwanita.jpg';
            if (file_exists($pathName)) {
                unlink($pathName);
            }
            $avatar->move($path, 'mempelaiwanita.jpg');

            return response()->json(['success' => true, 'pesan' => 'foto mempelai wanita berhasil disimpan']);
        } else {
            $avatar = $fotosampul;
            $pathName = $path . 'sampul.jpg';
            if (file_exists($pathName)) {
                unlink($pathName);
            }
            $avatar->move($path, 'sampul.jpg');

            return response()->json(['success' => true, 'pesan' => 'foto sampul berhasil disimpan']);
        }
        // $fotopria->move($path, 'mempelaipria.jpg');
        // $fotowanita->move($path, 'mempelaiwanita.jpg');
        // $fotosampul->move($path, 'sampul.jpg');

        // return response()->json(['success' => true, 'path' => $path]);
    }
    public function updateMempelai(Request $request)
    {

        $id = $request->input('idMempelai');
        $namaLengkapPria = $request->input('editNamaLengkapPria');
        $namaLengkapWanita = $request->input('editNamaLengkapWanita');
        $namaPanggilanPria = $request->input('editNamaPanggilanPria');
        $namaPanggilanWanita = $request->input('editNamaPanggilanWanita');
        $namaAyahPria = $request->input('editNamaAyahPria');
        $namaAyahWanita = $request->input('editNamaAyahWanita');
        $namaIbuPria = $request->input('editNamaIbuPria');
        $namaIbuWanita = $request->input('editNamaIbuWanita');



        try {
            $mempelai = TblMempelaisModel::find($id);
            if (!$mempelai) {
                return response()->json(['success' => false, 'message' => 'Mempelai not found.']);
            }
            $mempelai->id = $id;
            $mempelai->nama_pria = $namaLengkapPria;
            $mempelai->nama_wanita = $namaLengkapWanita;
            $mempelai->nama_panggilan_pria = $namaPanggilanPria;
            $mempelai->nama_panggilan_wanita = $namaPanggilanWanita;
            $mempelai->nama_ayah_pria = $namaAyahPria;
            $mempelai->nama_ayah_wanita = $namaAyahWanita;
            $mempelai->nama_ibu_pria = $namaIbuPria;
            $mempelai->nama_ibu_wanita = $namaIbuWanita;
            $mempelai->save();

            return response()->json(['success' => true, 'message' => 'Berhasil Diupdate.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error Updating Acara.']);
        }
    }

    public function userCerita()
    {
        $cerita = TblCeritasModel::where('id_pesanan', TblPesanansModel::where('id_user', Auth::user()->id)->value('id'))->get();
        return view('users.cerita', ['cerita' => $cerita]);
    }

    //
    public function userAcara()
    {
        $acara = TblAcarasModel::where('id_pesanan', TblPesanansModel::where('id_user', Auth::user()->id)->value('id'))->get();

        return view('users.acara', ['acara' => $acara]);
    }
    public function tambahAcara(Request $request)
    {
        $validatedData = $request->validate([
            'id_pesanan' => 'required',
            'saveFormNama' => 'required',
            'saveFormWaktu' => 'required',
            'saveFormTempat' => 'required',
            'saveFormAlamat' => 'required',
            'saveFormMaps' => '',
        ]);
        $acara = new TblAcarasModel();
        $acara->id_pesanan = $validatedData['id_pesanan'];
        $acara->nama_acara = $validatedData['saveFormNama'];
        $acara->waktu_acara = $validatedData['saveFormWaktu'];
        $acara->tempat_acara = $validatedData['saveFormTempat'];
        $acara->alamat_acara = $validatedData['saveFormAlamat'];
        $acara->google_map = $validatedData['saveFormMaps'];
        $acara->save();

        return response()->json(['message' => 'Data Berhasil Ditambah']);
    }
    public function updateAcara(Request $request)
    {
        $id = $request->input('idAcara');
        $nama = $request->input('editFormNamaBaru');
        $waktu = $request->input('editFormWaktuBaru');
        $tempat = $request->input('editFormTempatBaru');
        $alamat = $request->input('editFormAlamatBaru');
        $maps = $request->input('editFormMapsBaru');

        try {
            $acara = TblAcarasModel::find($id);
            if (!$acara) {
                return response()->json(['success' => false, 'message' => 'Acara not found.']);
            }
            $acara->id = $id;
            $acara->nama_acara = $nama;
            $acara->waktu_acara = $waktu;
            $acara->tempat_acara = $tempat;
            $acara->alamat_acara = $alamat;
            $acara->google_map = $maps;
            $acara->save();

            return response()->json(['success' => true, 'message' => 'Berhasil Diupdate.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error Updating Acara.']);
        }
    }
    public function updateCountdown(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return response()->json(['error' => 'Harap Pilih Salah Satu Acara Untuk Countdown']);
        }
        TblAcarasModel::where('id', $id)->update(['countdown' => '1']);
        TblAcarasModel::where('id', '!=', $id)->update(['countdown' => '0']);
        return response()->json(['message' => 'Berhasil Diset Sebagai Countdown']);
    }



    public function userListTamu()
    {
        $pesanan = TblPesanansModel::where('id_user', Auth::user()->id)->pluck('id');
        $tamu = TblPesanansModel::select('tbl_buku_tamus.id as idtamu', 'nama_tamu', 'no_wa', 'alamat_tamu', 'domain', 'status', 'nama_panggilan_pria', 'nama_panggilan_wanita', 'tbl_pesanans.id as idpesanan')->join('tbl_buku_tamus', 'tbl_buku_tamus.id_pesanan', '=', 'tbl_pesanans.id')->join('tbl_mempelais', 'tbl_mempelais.id_pesanan', '=', 'tbl_pesanans.id')->where('tbl_pesanans.id', $pesanan)->get();
        return view('users.listtamu', ['tamu' => $tamu]);
    }
    public function getListTamu()
    {
        $pesanan = TblPesanansModel::where('id_user', Auth::user()->id)->pluck('id');
        $tamu = TblPesanansModel::select('tbl_buku_tamus.id as idtamu', 'nama_tamu', 'no_wa', 'alamat_tamu', 'domain', 'status', 'nama_panggilan_pria', 'nama_panggilan_wanita', 'tbl_pesanans.id as idpesanan')->join('tbl_buku_tamus', 'tbl_buku_tamus.id_pesanan', '=', 'tbl_pesanans.id')->join('tbl_mempelais', 'tbl_mempelais.id_pesanan', '=', 'tbl_pesanans.id')->where('tbl_pesanans.id', $pesanan)->get();
        return response()->json(['tamuData' => $tamu]);
    }
    public function userGaleri()
    {
        $galeri = TblAlbumsModel::where('id_pesanan', TblPesanansModel::where('id_user', Auth::user()->id)->value('id'))->get();

        return view('users.galeri', ['galeri' => $galeri]);
    }


    public function getUcapan()
    {
        $salam = TblSalamsModel::select('tbl_salams.id', 'nama_tamu', 'isi_salam', 'kehadiran', 'tbl_salams.created_at as tanggal_post', 'like_by')->join('tbl_buku_tamus', 'tbl_salams.id_tamu', '=', 'tbl_buku_tamus.id')->orderBy('tbl_salams.created_at', 'asc')->get();
        return response()->json(['salamData' => $salam]);
    }
    public function userUcapan()
    {


        return view('users.ucapan');
    }


    //awal tambah tamu
    public function tambahTamu(Request $request)
    {

        $data = [
            'no_wa' => $request->no_wa,
            'nama_tamu' => $request->nama_tamu,
            'alamat_tamu' => $request->alamat_tamu,
            'id_pesanan' => $request->id_pesanan,
        ];

        TblBukuTamusModel::create($data);
    }
    public function importExcel(Request $request)
    {
        Excel::import(new ImportTamuExcel, $request->file('excel'));
        return redirect()->back()->with('successMessage', 'Data Berhasil Di Import');
    }
    // Akhir Tambah Tamu

    // Awal Hapus Tamu
    public function hapusTamu(Request $request)
    {
        $idtamu = $request->input('id', []);

        if (empty($idtamu)) {
            return response()->json(['success' => false, 'message' => 'Tidak Ada Data Yang Dihapus']);
        }

        TblBukuTamusModel::whereIn('id', $idtamu)->delete();

        return response()->json(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }
    // Akhir Hapus Tamu

    public function tambahCerita(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'judul_cerita' => 'required',
            'isi_cerita' => 'required',
            'tanggal_cerita' => 'required',
            'id_pesanan' => 'required',
        ]);
        $cerita = new TblCeritasModel();
        $cerita->judul_cerita = $validatedData['judul_cerita'];
        $cerita->isi_cerita = $validatedData['isi_cerita'];
        $cerita->tanggal_cerita = $validatedData['tanggal_cerita'];
        $cerita->id_pesanan = $validatedData['id_pesanan'];
        $cerita->save();

        return response()->json(['message' => 'Data berhasil Ditambahkan']);
    }

    public function updateCerita(Request $request)
    {
        $judul_cerita = $request->input('judul_cerita');
        $isi_cerita = $request->input('isi_cerita');
        $tanggal_cerita = $request->input('tanggal_cerita');
        $id = $request->input('id');

        try {
            // Find the Cerita by ID
            $cerita = TblCeritasModel::find($id);

            // Check if the Cerita exists
            if (!$cerita) {
                return response()->json(['success' => false, 'message' => 'Cerita not found.']);
            }

            // Update the Cerita with the new values
            $cerita->judul_cerita = $judul_cerita;
            $cerita->isi_cerita = $isi_cerita;
            $cerita->tanggal_cerita = $tanggal_cerita;
            $cerita->save();

            return response()->json(['success' => true, 'message' => 'Berhasil Diupdate.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error updating Cerita.']);
        }
    }

    public function hapusCerita(Request $request)
    {
        $ceritaId = $request->input('id');
        TblCeritasModel::destroy($ceritaId);
        return response()->json(['message' => 'Cerita deleted successfully']);
    }
    public function hapusAcara(Request $request)
    {
        $acaraId = $request->input('id');
        TblAcarasModel::destroy($acaraId);
        return response()->json(['message' => 'Cerita deleted successfully']);
    }


    public function updateKirim(Request $request)
    {
        $idtamu = $request->input('id', []);
        // return ($idtamu);
        if (empty($idtamu)) {
            return response()->json(['success' => false, 'message' => 'Tidak Ada Data Yang Diganti']);
        }


        TblBukuTamusModel::whereIn('id', $idtamu)->update(['status' => 'terkirim']);
        return response()->json(['success' => true, 'message' => 'Data Berhasil Diupdate']);
    }
}
