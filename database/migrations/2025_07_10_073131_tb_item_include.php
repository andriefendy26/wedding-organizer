<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('tb_item_include', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('include_id');
            $table->string('nama_item');
            $table->timestamps();

            $table->foreign('include_id')->references('id')->on('tb_include');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tb_item_include');
    }
};
