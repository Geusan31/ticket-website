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
        Schema::create('transportasis', function (Blueprint $table) {
            $table->id("id_transportasi");
            $table->string("kode");
            $table->string("jumlah_kursi");
            $table->string("keterangan");
            $table->foreignId("id_type_transportasi")->references("id_type_transportasi")->on("type_transportasi");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportasis');
    }
};
