<?php

use App\Models\Kategori;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $kategori = Kategori::all();
    $this->comment($kategori[1]);
});
