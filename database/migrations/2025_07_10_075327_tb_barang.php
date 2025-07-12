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
        //
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('layanan_id');
            $table->string('foto');
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('harga');
            $table->string('stock');
            $table->string('status');
            $table->timestamps();
            
            $table->foreign('layanan_id')->references('id')->on('tb_layanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
         Schema::dropIfExists('tb_barang');
    }
};
