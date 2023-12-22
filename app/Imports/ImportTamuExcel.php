<?php

namespace App\Imports;

use App\TblBukuTamusModel;
use App\TblPesanansModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportTamuExcel implements ToCollection,   WithHeadingRow
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
                'nama_tamu' => $row['nama'],
                'alamat_tamu' => $row['alamat'],
                'no_wa' => $row['no_wa'],
            ]);
        }
    }
}
