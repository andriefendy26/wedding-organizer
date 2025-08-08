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
        Schema::table('tb_portofolio', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('team_id')->before('layanan_id')->nullable();
            $table->foreign('team_id')->references('id')->on('tb_team')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_portofolio', function (Blueprint $table) {
            //
            $table->dropForeign(['portofolio_id']);
            $table->dropColumn('portofolio_id');
        });
    }
};
