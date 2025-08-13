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
        Schema::table('tb_testimoni', function (Blueprint $table) {
            //
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            // $table->unsignedBigInteger('team_id')->before('layanan_id')->nullable();
            // $table->foreign('team_id')->references('id')->on('tb_team')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('tb_testimoni', function (Blueprint $table) {
            //
            // $table->dropForeign(['portofolio_id']);
            $table->dropColumn('email');
            $table->dropColumn('no_telp');
            $table->dropColumn('status');
        });
    }
};
