<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->unique();
            $table->string('penandatangan');
            $table->text('perihal');
            $table->string('original_file_path');
            $table->string('signed_file_path')->nullable();
            $table->string('qr_code_path')->nullable();
            $table->string('public_link')->nullable();
            $table->enum('status', ['draft', 'processed', 'completed'])->default('draft');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('letters');
    }
};