<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblKunjungansModel extends Model
{
    protected $table = "tbl_pengunjungs";

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'id_pesanan',
        'nama_pengunjung',
        'jumlah_kunjungan',
        'alamat_ip',
        'created_at',
    ];
}
