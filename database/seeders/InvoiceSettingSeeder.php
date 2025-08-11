<?php

namespace Database\Seeders;

use App\Models\InvoiceSetting;
use Illuminate\Database\Seeder;

class InvoiceSettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
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
        ];

        foreach ($settings as $setting) {
            InvoiceSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}