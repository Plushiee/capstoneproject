<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblPesanansModel extends Model
{
    protected $table = "tbl_pesanans";

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'id_admin',
        'id_user',
        'id_produk',
        'domain',
        'biaya',
        'status_pembayaran',
        'file_musik',
    ];
}
