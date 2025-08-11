<?php

// 1. Migration untuk tabel settings
// database/migrations/xxxx_create_invoice_settings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('invoice_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type')->default('text'); // text, image, textarea
            $table->timestamps();
        });
        
        // Insert default values
        DB::table('invoice_settings')->insert([
            ['key' => 'company_name', 'value' => 'PT. NAMA PERUSAHAAN', 'type' => 'text'],
            ['key' => 'company_address', 'value' => 'Jl. Contoh Alamat No. 123', 'type' => 'textarea'],
            ['key' => 'company_city', 'value' => 'Jakarta Selatan 12345', 'type' => 'text'],
            ['key' => 'company_phone', 'value' => '(021) 1234-5678', 'type' => 'text'],
            ['key' => 'company_email', 'value' => 'info@perusahaan.com', 'type' => 'text'],
            ['key' => 'company_logo', 'value' => null, 'type' => 'image'],
            ['key' => 'bank_name', 'value' => 'Bank Mandiri', 'type' => 'text'],
            ['key' => 'bank_account', 'value' => '1234-5678-9012-3456', 'type' => 'text'],
            ['key' => 'bank_holder', 'value' => 'PT. Nama Perusahaan', 'type' => 'text'],
            ['key' => 'invoice_prefix', 'value' => 'INV', 'type' => 'text'],
            ['key' => 'tax_rate', 'value' => '11', 'type' => 'number'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('invoice_settings');
    }
};
