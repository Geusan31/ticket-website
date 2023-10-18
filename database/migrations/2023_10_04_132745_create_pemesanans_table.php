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
            $table->integer('kode_pemesanan')->unique();
            $table->date('tanggal_pemesanan');
            $table->foreignId('id_pelanggan')->references('id_penumpang')->on('penumpangs');
            $table->string('kode_kursi');
            $table->foreignId('id_transportasi');
            $table->foreignId('id_rute');
            $table->date('tanggal_berangkat');
            $table->time('jam_cekin');
            $table->time('jam_berangkat');
            $table->integer('total_bayar');
            $table->enum('validate', ['pending', 'success'])->default('pending');
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
