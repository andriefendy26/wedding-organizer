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
        Schema::create('tb_kalender_ketersediaan', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['available', 'unavailable', 'maintenance', 'holiday'])->default('available');
            $table->text('catatan')->nullable();
            $table->timestamps();
            
            $table->index(['start_date', 'end_date']);
            $table->index('status');
            
            // Pastikan start_date <= end_date
            $table->index('start_date');
            $table->index('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kalender_ketersediaan');
    }
};