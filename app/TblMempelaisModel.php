<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblMempelaisModel extends Model
{
    protected $table = "tbl_mempelais";

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'id_pesanan',
        'nama_ayah_pria',
        'nama_ayah_wanita',
        'nama_ibu_pria',
        'nama_ibu_wanita',
        'nama_panggilan_pria',
        'nama_panggilan_wanita',
        'nama_pria',
        'nama_wanita',
    ];
}
