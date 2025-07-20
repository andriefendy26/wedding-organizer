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
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('layanan_id');
            $table->unsignedBigInteger('paket_layanan_id')->nullable();
            $table->date('tanggal_sewa');
            $table->date('tanggal_kemdbali');
            $table->string('bukti_bayar')->nullable();
            $table->string('total_biaya');
            $table->string('status');
            $table->timestamps();
            
            // $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('layanan_id')->references('id')->on('tb_layanan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('paket_layanan_id')->references('id')->on('tb_paket_layanan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */ 
    public function down(): void
    {
        //
        Schema::dropIfExists('tb_transaksi');
    }
};
