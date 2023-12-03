<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblPengunjungModel extends Model
{
    //
    protected $table = 'tbl_pengunjungs';

    protected $fillable = [
        'id_pesanan', 'nama_pengunjung', 'jumlah_kunjungan', 'alamat_ip'
    ];
}
