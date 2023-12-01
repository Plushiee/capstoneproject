<?php

namespace App\Http\Controllers;

use App\Imports\ImportTamuExcel;
use App\TblBukuTamusModel;
use App\TblPesanansModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use SebastianBergmann\Environment\Console;

class PageUserController extends Controller
{
    // User Dashboard 
    public function userDashboard()
    {
        return view('users.dashboard');
    }

    public function userMempelai()
    {
        return view('users.mempelai');
    }

    public function userCerita()
    {

        return view('users.cerita');
    }

    public function userOrder()
    {
        return view('users.order');
    }

    public function userListTamu()
    {
        return view('users.listtamu');
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

    //tambah tamu
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

    public function hapusTamu(Request $request)
    {
        $idtamu = $request->input('id', []);
        // return ($idtamu);
        if (empty($idtamu)) {
            return response()->json(['success' => false, 'message' => 'Tidak Ada Data Yang Dihapus']);
        }

        // Perform bulk deletion
        TblBukuTamusModel::whereIn('id', $idtamu)->delete();

        return response()->json(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }

    public function importExcel(Request $request)
    {
        Excel::import(new ImportTamuExcel, $request->file('excel'));
        return redirect()->back()->with('successMessage', 'Data Berhasil Di Import');
    }
}
