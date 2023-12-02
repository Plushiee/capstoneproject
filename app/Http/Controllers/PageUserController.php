<?php

namespace App\Http\Controllers;

use App\Imports\ImportTamuExcel;
use App\TblBukuTamusModel;
use App\TblCeritasModel;
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
        $cerita = TblCeritasModel::where('id_pesanan', TblPesanansModel::where('id_user', Auth::user()->id)->value('id'))->get();
        // dd($cerita);
        return view('users.cerita', ['cerita' => $cerita]);
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

        return response()->json(['message' => 'Data berhasil disimpan']);
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

        // Logic to delete the story with the given ID
        // You can use Eloquent or any other method to delete the record from the database

        // For example:
        TblCeritasModel::destroy($ceritaId);

        // Respond with a success message (you can customize the response as needed)
        return response()->json(['message' => 'Cerita deleted successfully']);
        // TblCeritasModel::destroy($id);

        // return redirect()->back()->with('success', 'Cerita deleted successfully.');
    }
}
