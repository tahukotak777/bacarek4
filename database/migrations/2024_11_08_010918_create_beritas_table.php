<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id("ID_berita")->primary();
            $table->string("title");
            $table->string("photo")->nullable();
            $table->longText("desc");
            $table->string("tanggal");
            $table->integer('like')->default(0);
            $table->integer("ID_kategori");
            $table->integer("ID_account");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
