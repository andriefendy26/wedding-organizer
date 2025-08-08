<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Alter enum untuk menambah status 'error'
        DB::statement("ALTER TABLE letters MODIFY COLUMN status ENUM('draft', 'processed', 'completed', 'error') NOT NULL DEFAULT 'draft'");
        
        // Tambah kolom error_message jika belum ada
        if (!Schema::hasColumn('letters', 'error_message')) {
            Schema::table('letters', function (Blueprint $table) {
                $table->text('error_message')->nullable()->after('status');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan ke enum sebelumnya
        DB::statement("ALTER TABLE letters MODIFY COLUMN status ENUM('draft', 'processed', 'completed') NOT NULL DEFAULT 'draft'");
        
        // Hapus kolom error_message
        if (Schema::hasColumn('letters', 'error_message')) {
            Schema::table('letters', function (Blueprint $table) {
                $table->dropColumn('error_message');
            });
        }
    }
};