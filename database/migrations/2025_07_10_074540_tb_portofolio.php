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
        Schema::create('tb_portofolio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('layanan_id');
            $table->string('judul');
            $table->string('kategori');
            $table->string('deskripsi');
            $table->string('url');
            $table->string('tanggal_event');
            $table->timestamps();

            $table->foreign('layanan_id')->references('id')->on('tb_layanan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
     {
        //
        Schema::dropIfExists('tb_portofolio');
    }
};
