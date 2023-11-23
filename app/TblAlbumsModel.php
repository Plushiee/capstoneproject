<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblAlbumsModel extends Model
{
    protected $table = "tbl_albums";

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'id_pesanan',
        'fungsi_file',
        'nama_file',
    ];
}
