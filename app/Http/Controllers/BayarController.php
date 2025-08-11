<?php

namespace App\Http\Controllers;

use App\Facades\InvoiceSettings;
use App\Models\InvoiceSetting;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BayarController extends Controller
{
    public function show($public_id)
    {
        // Ambil semua data company dari InvoiceSettings
        $company_name = InvoiceSetting::get('company_name', 'PT. NAMA PERUSAHAAN');
        $company_logo = InvoiceSetting::get('company_logo', null);
        $company_city = InvoiceSetting::get('company_city', 'Jakarta Selatan 12345');
        $company_phone = InvoiceSetting::get('company_phone', '(021) 1234-5678');
        $company_email = InvoiceSetting::get('company_email', 'info@perusahaan.com');
        $company_address = InvoiceSetting::get('company_address', 'Jl. Contoh Alamat No. 123');
        $companyBankName = InvoiceSetting::get('bank_name', 'Bank Mandiri');
        $invoice_prefix = InvoiceSetting::get('invoice_prefix', 'INV');
        $bank_account = InvoiceSetting::get('bank_account', '1234-5678-9012-3456');
        $bank_holder = InvoiceSetting::get('bank_holder', null);
        $company_website = InvoiceSetting::get('company_website', 'https://3rasaproduction.com/');

        // Ambil data transaksi
        $transaksi = Transaksi::with('barangTransaksi.barang','layanan','customer','paketLayanan')
            ->where('public_id', $public_id)
            ->firstOrFail();

        // Return view dengan semua data yang diperlukan
        return view('bayar.show', compact(
            'transaksi',
            'company_name',
            'company_logo', 
            'company_city',
            'company_phone',
            'company_email',
            'company_address',
            'companyBankName',
            'invoice_prefix',
            'bank_account',
            'bank_holder',
            'company_website'
        ));
    }

    public function update(Request $request, $public_id)
    {
        $request->validate([
            'bukti_bayar' => 'required|image|max:2048',
        ]);

        $transaksi = Transaksi::where('public_id', $public_id)->firstOrFail();

        // Simpan file bukti bayar
        $path = $request->file('bukti_bayar')->store('public/bukti_bayar');
        $transaksi->bukti_bayar = str_replace('public/', '', $path);
        $transaksi->save();

        return redirect()->back()->with('success', 'Bukti bayar berhasil diupload, menunggu verifikasi admin.');
    }
}