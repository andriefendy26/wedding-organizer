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

        $query = KalenderKetersediaan::query();
        if ($start && $end) {
            $query->whereBetween('tanggal', [$start, $end]);
        }

        $events = $query->get()->map(function ($item) {
            return [
                'title' => $item->status . ' - ' . $item->catatan,
                'start' => $item->tanggal->toDateString(),
                'color' => $item->status === 'Booked' ? '#e53e3e' : '#38a169',
            ];
        });

        return response()->json($events);
    }
}
