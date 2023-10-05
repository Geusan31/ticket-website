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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->integer('kode_pemesanan');
            $table->date('tanggal_pemesanan');
            $table->foreignId('id_pelanggan')->references('id_penumpang')->on('penumpangs');
            $table->integer('kode_kursi');
            $table->integer('id_rute');
            $table->integer('tujuan');
            $table->date('tanggal_berangkat');
            $table->date('jam_cekin');
            $table->date('jam_berangkat');
            $table->integer('total_bayar');
            $table->foreignId('id_petugas')->references('id_petugas')->on('petugas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
