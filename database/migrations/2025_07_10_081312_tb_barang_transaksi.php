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
         Schema::create('tb_barang_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->unsignedBigInteger('transaksi_id')->nullable();
            $table->string('jumlah');
            $table->string('total');
            $table->timestamps();

            
            $table->foreign('barang_id')->references('id')->on('tb_barang')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('transaksi_id')->references('id')->on('tb_transaksi')->onUpdate('cascade')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tb_barang_transaksi');
    }
};
