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
        Schema::create('tb_paket_layanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('layanan_id');
            $table->string('nama_paket');
            $table->string('detail_paket');
            $table->string('deskripsi');
            // $table->string('kategori');
            $table->string('harga');
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
        Schema::dropIfExists('tb_paket_layanan');
    }
};
