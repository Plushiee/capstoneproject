<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblSalamsModel extends Model
{
    protected $table = "tbl_salams";

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'id_acara',
        'tangga;_sala,',
        'nama_pengirim',
        'isi_salam',
    ];
}
