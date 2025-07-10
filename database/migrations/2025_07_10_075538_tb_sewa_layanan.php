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
        Schema::create('tb_sewa_layanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('layanan_id');
            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali');
            $table->string('total_biaya');
            $table->string('status');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('layanan_id')->references('id')->on('tb_layanan');
        });
    }

    /**
     * Reverse the migrations.
     */ 
    public function down(): void
    {
        //
        Schema::dropIfExists('tb_sewa_layanan');
    }
};
