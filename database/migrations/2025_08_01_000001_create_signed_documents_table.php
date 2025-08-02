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
        Schema::create('signed_documents', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('perihal');
            $table->string('penandatangan');
            $table->timestamp('tanggal_ttd');
            $table->string('file_path');
            $table->string('verification_code')->unique();
            $table->string('hash');
            $table->json('signature_position')->nullable();
            $table->text('qr_data')->nullable();
            $table->string('file_size')->nullable();
            $table->string('original_filename')->nullable();
            $table->timestamps();
            
            $table->index('verification_code');
            $table->index('no_surat');
            $table->index('tanggal_ttd');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signed_documents');
    }
};