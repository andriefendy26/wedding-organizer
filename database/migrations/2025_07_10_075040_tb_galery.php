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
        Schema::create('tb_galery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portofolio_id');
            $table->string('foto');
            $table->string('nama')->nullable();
            $table->string('deskripsi')->nullable();
            $table->timestamps();
            
            $table->foreign('portofolio_id')->references('id')->on('tb_portofolio')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
         Schema::dropIfExists('tb_team');
    }
};
