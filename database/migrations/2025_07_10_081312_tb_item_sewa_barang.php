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
         Schema::create('tb_item_sewa_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sewa_barang_id');
            $table->unsignedBigInteger('barang_id');
            $table->string('quantity');
            $table->timestamps();

            
            $table->foreign('sewa_barang_id')->references('id')->on('tb_sewa_barang');
            $table->foreign('barang_id')->references('id')->on('tb_barang');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tb_item_sewa_barang');
    }
};
