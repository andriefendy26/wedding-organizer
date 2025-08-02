<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class KonsultasiController extends Controller
{
    /**
     * Store a newly created consultation request in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'event_date' => 'required|date|after:today',
            'budget' => 'nullable|string',
            'services' => 'required|array|min:1',
            'services.*' => 'string',
            'message' => 'required|string|min:10'
        ], [
            'name.required' => 'Nama lengkap wajib diisi',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'phone.required' => 'Nomor WhatsApp wajib diisi',
            'phone.max' => 'Nomor WhatsApp tidak boleh lebih dari 20 karakter',
            'email.email' => 'Format email tidak valid',
            'event_date.required' => 'Tanggal acara wajib diisi',
            'event_date.date' => 'Format tanggal tidak valid',
            'event_date.after' => 'Tanggal acara harus setelah hari ini',
            'services.required' => 'Pilih minimal satu jenis layanan',
            'services.min' => 'Pilih minimal satu jenis layanan',
            'message.required' => 'Pesan dan detail acara wajib diisi',
            'message.min' => 'Pesan minimal 10 karakter'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Format pesan dengan detail lengkap
            $servicesText = implode(', ', $request->services);
            $budgetText = $request->budget ? "Budget: {$request->budget} Juta" : "Budget: Tidak disebutkan";
            
            $fullMessage = "DETAIL KONSULTASI PERNIKAHAN\n\n";
            $fullMessage .= "Tanggal Acara: " . Carbon::parse($request->event_date)->format('d F Y') . "\n";
            $fullMessage .= "{$budgetText}\n";
            $fullMessage .= "Layanan yang Dibutuhkan: {$servicesText}\n\n";
            $fullMessage .= "Pesan dari Klien:\n{$request->message}";

            // Simpan ke database
            $konsultasi = Konsultasi::create([
                'nama' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->phone,
                'deskripsi' => $fullMessage,
                'tanggal' => $request->event_date
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Konsultasi berhasil dikirim! Tim kami akan menghubungi Anda segera.',
                'data' => [
                    'id' => $konsultasi->id,
                    'nama' => $konsultasi->nama,
                    'tanggal_acara' => Carbon::parse($konsultasi->tanggal)->format('d F Y')
                ]
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi atau hubungi kami langsung via WhatsApp.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display a listing of consultations (for admin).
     */
    public function index()
    {
        try {
            $konsultasi = Konsultasi::orderBy('created_at', 'desc')->paginate(10);
            
            return response()->json([
                'success' => true,
                'data' => $konsultasi
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data konsultasi',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified consultation.
     */
    public function show($id)
    {
        try {
            $konsultasi = Konsultasi::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => $konsultasi
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data konsultasi tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Remove the specified consultation from storage.
     */
    public function destroy($id)
    {
        try {
            $konsultasi = Konsultasi::findOrFail($id);
            $konsultasi->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Data konsultasi berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data konsultasi',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get consultation statistics (for admin dashboard).
     */
    public function statistics()
    {
        try {
            $totalKonsultasi = Konsultasi::count();
            $konsultasiBulanIni = Konsultasi::whereMonth('created_at', Carbon::now()->month)
                                          ->whereYear('created_at', Carbon::now()->year)
                                          ->count();
            $konsultasiHariIni = Konsultasi::whereDate('created_at', Carbon::today())->count();
            
            // Konsultasi berdasarkan bulan (12 bulan terakhir)
            $konsultasiPerBulan = [];
            for ($i = 11; $i >= 0; $i--) {
                $bulan = Carbon::now()->subMonths($i);
                $konsultasiPerBulan[] = [
                    'bulan' => $bulan->format('M Y'),
                    'jumlah' => Konsultasi::whereMonth('created_at', $bulan->month)
                                        ->whereYear('created_at', $bulan->year)
                                        ->count()
                ];
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'total_konsultasi' => $totalKonsultasi,
                    'konsultasi_bulan_ini' => $konsultasiBulanIni,
                    'konsultasi_hari_ini' => $konsultasiHariIni,
                    'konsultasi_per_bulan' => $konsultasiPerBulan
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil statistik konsultasi',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}