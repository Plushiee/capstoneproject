<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblSalamsModel extends Model
{
    //
    protected $table = "tbl_salams";

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'id_tamu',
        'isi_salam',
        'like_by',

    ];
    protected $casts = [
        'like_by' => 'array',
    ];
}
