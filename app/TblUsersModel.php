<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class TblUsersModel extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = "tbl_users";

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_telp',
        'remember_token',
    ];
}
