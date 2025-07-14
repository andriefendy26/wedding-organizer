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
        Schema::create('tb_paket_include', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paket_layanan_id')->nullable();
            $table->unsignedBigInteger('include_id')->nullable();
            $table->timestamps();
            
            $table->foreign('paket_layanan_id')->references('id')->on('tb_paket_layanan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('include_id')->references('id')->on('tb_include')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tb_paket_include');
    }
};
