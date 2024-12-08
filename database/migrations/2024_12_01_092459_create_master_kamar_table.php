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
        Schema::create('master_kamar', function (Blueprint $table) {
            $table->id('id_kamar')->primary();
            $table->string('nama_kamar');
            $table->string('deskripsi_kamar');
            $table->integer('harga_kamar');
            $table->string('fasilitas');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_kamar');
    }
};
