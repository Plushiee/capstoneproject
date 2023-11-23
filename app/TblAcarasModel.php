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
        'foto_pria',
        'foto_wanita',
        'tanggal_akad',
        'tanggal_syukuran',
        'tanggal_resepsi',
        'jam_akad',
        'jam_syukuran',
        'jam_resepsi',
        'alamat_akad',
        'alamat_syukuran',
        'alamat_resepsi',
        'lat_akad',
        'long_akad',
        'lat_syukuran',
        'long_syukuran',
        'lat_resepsi',
        'long_resepsi',
        'QR',
    ];

}
