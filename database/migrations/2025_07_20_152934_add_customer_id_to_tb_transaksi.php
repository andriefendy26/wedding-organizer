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
        Schema::table('tb_transaksi', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('customer_id')->before('paket_layanan_id');
            $table->foreign('customer_id')->references('id')->on('tb_customers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_transaksi', function (Blueprint $table) {
            //
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
        });
    }
};
