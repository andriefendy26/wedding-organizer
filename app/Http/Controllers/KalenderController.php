<?php

namespace App\Http\Controllers;

use App\Models\KalenderKetersediaan;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    //
    public function index()
    {
        // halaman blade untuk fullcalendar
        return view('kalender.index');
    }

    public function events(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        $query = \App\Models\Transaksi::with('customer');
        if ($start && $end) {
            $query->where(function($q) use ($start, $end) {
                $q->whereBetween('tanggal_sewa', [$start, $end])
                  ->orWhereBetween('tanggal_kembali', [$start, $end]);
            });
        }

        $events = $query->get()->map(function ($item) {
            $nama = $item->customer ? $item->customer->nama : 'Tanpa Customer';
            $layanan = $item->layanan ? $item->layanan->nama : '-';
            return [
                'title' => $nama . ' | ' . $layanan,
                'start' => $item->tanggal_sewa,
                'end' => $item->tanggal_kembali,
                'color' => $item->status ? '#38a169' : '#e53e3e',
            ];
        });

        return response()->json($events);
    }
}
