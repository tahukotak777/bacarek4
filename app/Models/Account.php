<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'username',
        'password',
        'jenis_kelamin',
        'role'
    ];
    public $timestamps = false;

    protected $primaryKey = "ID_account" ;
}
