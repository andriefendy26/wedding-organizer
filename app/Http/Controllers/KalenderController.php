<?php

namespace App\Http\Controllers;

use App\Models\KalenderKetersediaan;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index()
    {
        // halaman blade untuk fullcalendar
        return view('kalender');
    }

    public function events(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        $query = KalenderKetersediaan::query();
        
        if ($start && $end) {
            $query->where(function($q) use ($start, $end) {
                $q->whereBetween('start_date', [$start, $end])
                  ->orWhereBetween('end_date', [$start, $end])
                  ->orWhere(function($subQ) use ($start, $end) {
                      // Include events that span across the requested date range
                      $subQ->where('start_date', '<=', $start)
                           ->where('end_date', '>=', $end);
                  });
            });
        }

        $events = $query->get()->map(function ($item) {
            // Tentukan warna berdasarkan status
            $color = match($item->status) {
                'tersedia' => '#38a169',      // hijau untuk tersedia
                'tidak_tersedia' => '#e53e3e', // merah untuk tidak tersedia
                'maintenance' => '#f56500',    // orange untuk maintenance
                default => '#718096'           // abu-abu untuk status lainnya
            };

            return [
                'title' => ucfirst($item->status) . ($item->catatan ? ' - ' . $item->catatan : ''),
                'start' => $item->start_date->format('Y-m-d'),
                'end' => $item->end_date->format('Y-m-d'),
                'color' => $color,
                'extendedProps' => [
                    'status' => $item->status,
                    'catatan' => $item->catatan,
                    'id' => $item->id
                ]
            ];
        });

        return response()->json($events);
    }
}