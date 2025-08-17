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
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_surat', ['keterangan', 'pengantar']);
            $table->string('nomor_surat')->unique();
            $table->string('nama_pemohon');
            $table->string('nik', 16);
            $table->text('alamat');
            $table->text('keperluan');
            $table->date('tanggal_surat');
            $table->string('lampiran')->nullable();
            $table->enum('status', ['diajukan', 'disetujui', 'ditolak'])->default('diajukan');
            $table->foreignId('template_id')->nullable()->constrained('surat_templates')->onDelete('set null');
            $table->string('public_link')->unique();
            $table->string('qr_code_path')->nullable();
            $table->string('pdf_path')->nullable();
            $table->text('catatan_admin')->nullable();
            $table->foreignId('disetujui_oleh')->nullable()->constrained('users')->onDelete('set null');
            $table->date('tanggal_disetujui')->nullable();
            $table->foreignId('ditolak_oleh')->nullable()->constrained('users')->onDelete('set null');
            $table->date('tanggal_ditolak')->nullable();
            $table->text('alasan_penolakan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
