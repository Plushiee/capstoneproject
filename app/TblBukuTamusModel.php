<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblBukuTamusModel extends Model
{
    protected $table = "tbl_buku_tamus";

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'id_pesanan',
        'nama_tamu',
        'alamat_tamu',
        'tanggal',
        'kehadiran',
        'salam',
    ];
}
