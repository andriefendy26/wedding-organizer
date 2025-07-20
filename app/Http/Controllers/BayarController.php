<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BayarController extends Controller
{
    //
    public function show($public_id)
    {
        $transaksi = Transaksi::with('barangTransaksi.barang','layanan','customer','paketLayanan')
            ->where('public_id', $public_id)
            ->firstOrFail();

        return view('bayar.show', compact('transaksi'));
    }

    public function update(Request $request, $public_id)
    {
        $request->validate([
            'bukti_bayar' => 'required|image|max:2048',
        ]);

        $transaksi = Transaksi::where('public_id', $public_id)->firstOrFail();

        // simpan file bukti bayar
        $path = $request->file('bukti_bayar')->store('public/bukti_bayar');
        $transaksi->bukti_bayar = str_replace('public/', '', $path);
        $transaksi->save();

        return redirect()->back()->with('success', 'Bukti bayar berhasil diupload, menunggu verifikasi admin.');
    }
}
