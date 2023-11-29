<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblCeritasModel extends Model
{
    protected $table = "tbl_ceritas";

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'id_pesanan',
        'tanggal_cerita',
        'judul_cerita',
        'isi_cerita',
    ];
}
