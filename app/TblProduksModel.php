<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblProduksModel extends Model
{
    protected $table = "tbl_produks";

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'nama_produk',
        'jenis_produk',
        'nama_file',
        'biaya_dasar',
        'benefit',
    ];
}
