<?php

namespace App\Imports;

use App\TblBukuTamusModel;
use App\TblPesanansModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Auth;

class ImportTamuExcel implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //

        foreach ($collection as $row) {
            TblBukuTamusModel::create([
                'id_pesanan' => TblPesanansModel::where('id_user', Auth::user()->id)->first()->id,
                'nama_tamu' => $row[0],
                'alamat_tamu' => $row[1],
                'no_wa' => $row[2],
            ]);
        }
    }
}
