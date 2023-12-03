<?php

namespace App\Http\Controllers;

use App\Imports\ImportTamuExcel;
use App\TblAcarasModel;
use App\TblBukuTamusModel;
use App\TblCeritasModel;
use App\TblKunjungansModel;
use App\TblPengunjungModel;
use App\TblPesanansModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class PageUserController extends Controller
{
    // User Dashboard
    public function userDashboard()
    {
        $tanggalAkhir = TblPesanansModel::join('tbl_acaras', 'tbl_pesanans.id', '=', 'tbl_acaras.id_pesanan')
            ->select('tbl_pesanans.id', DB::raw('MAX(tbl_acaras.waktu_acara) as tanggal_terakhir'))
            ->where('id_user', Auth::user()->id)
            ->groupBy('tbl_pesanans.id')
            ->get();

        $banyakPengunjung = TblKunjungansModel::join('tbl_pesanans','tbl_pesanans.id', '=', 'tbl_pengunjungs.id_pesanan')
            ->select('id_pesanan', DB::raw('COUNT(*) as total_kunjungan'))
            ->where('id_user', Auth::user()->id)
            ->groupBy('id_pesanan')
            ->get();

        $banyakPengunjungPerHari = TblKunjungansModel::join('tbl_pesanans','tbl_pesanans.id', '=', 'tbl_pengunjungs.id_pesanan')
            ->select(
                'id_pesanan',
                DB::raw('COUNT(*) as total_kunjungan'),
                DB::raw('DATE(tbl_pengunjungs.created_at) as tanggal')
                )
            ->where('id_user', Auth::user()->id)
            ->groupBy('id_pesanan', 'tanggal')
            ->get();

        // $startDate = Carbon::now()->subMonth()->startOfMonth();
        // $endDate = Carbon::now()->subMonth()->endOfMonth();

        // Fetch visitors data for the last month
        // $visitorsData = TblPengunjungModel::whereBetween('created_at', [$startDate, $endDate])
        //     ->get()
        //     ->groupBy(function ($date) {
        //         return Carbon::parse($date->created_at)->format('Y-m-d');
        //     })
        //     ->map(function ($item, $date) {
        //         return [
        //             'date' => Carbon::parse($date)->format('F d, Y'),
        //             'count' => $item->count(),
        //         ];
        //     });
        // return view('users.dashboard', compact('visitorsData'));
        return view('users.dashboard', [
            'tanggalAkhir' => $tanggalAkhir,
            'banyakPengunjung' => $banyakPengunjung,
            'banyakPengunjungPerHari' => $banyakPengunjungPerHari,
        ]);
    }

    public function userOrder()
    {
        return view('users.order');
    }
    public function userMempelai()
    {
        return view('users.mempelai');
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
    public function userGaleri()
    {
        return view('users.galeri');
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
