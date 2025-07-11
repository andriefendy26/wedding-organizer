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
        Schema::create('tb_include', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('paket_layanan_id');
            $table->string('nama_include');
            $table->timestamps();
            // $table->foreign('paket_layanan_id')->references('id')->on('tb_paket_layanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tb_include');
    }
};
