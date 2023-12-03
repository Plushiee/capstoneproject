<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblAcarasModel extends Model
{
    protected $table = "tbl_acaras";

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'id_pesanan',
        'nama_acara',
        'waktu_acara',
        'tempat_acara',
        'alamat_acara',
        'countdown',
        'google_map',
    ];
}
