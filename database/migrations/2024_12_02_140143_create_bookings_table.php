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
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id_booking');
            $table->string('kd_pemesanan');
            $table->integer('guest');
            $table->unsignedBigInteger('id_kamar');
            $table->foreign('id_kamar')->references('id_kamar')->on('master_kamar')->onDelete('cascade');
            $table->integer('jumlah');
            $table->date('tanggal_checkin');
            $table->date('tanggal_checkout');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['onProgress', 'cancel', 'done', 'idle']);
            $table->string('metode_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
