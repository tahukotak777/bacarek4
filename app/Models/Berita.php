<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        "title",
        "photo",
        "desc",
        "tanggal",
        "ID_kategori",
        "ID_account",
    ];
    
    public $timestamps = false;
    protected $primaryKey = "ID_berita" ;
}
