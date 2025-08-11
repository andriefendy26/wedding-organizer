<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Team;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function GetTeam()
    {
        // Ambil semua data team dari database
        $teams = Team::all();
        
        // Format foto untuk setiap anggota tim
        foreach ($teams as $team) {
            // Pastikan foto menggunakan asset path yang benar
            if ($team->foto) {
                $team->foto_url = asset('storage/' . $team->foto);
            } else {
                // Default foto jika tidak ada
                $team->foto_url = asset('storage/team/default.jpg');
            }
            
            // Format telepon untuk tampilan yang lebih baik
            if ($team->telepon) {
                $team->formatted_phone = $this->formatPhone($team->telepon);
            }
        }
        
        // Pisahkan tim berdasarkan kategori (opsional)
        $coreTeam = $teams->where('jabatan', 'in', [
            'Lead Wedding Planner', 
            'Creative Director', 
            'Event Coordinator',
            'Wedding Planner',
            'Director'
        ])->take(3);
        
        $supportTeam = $teams->whereNotIn('jabatan', [
            'Lead Wedding Planner', 
            'Creative Director', 
            'Event Coordinator',
            'Wedding Planner',
            'Director'
        ]);
        
        // Statistik tim 
        $teamStats = [
            'experience_years' => '15',
            'successful_events' => '500',
            'team_members' => $teams->count(),
            'client_satisfaction' => '100'
        ];
        
        return view('timkami', compact('teams', 'coreTeam', 'supportTeam', 'teamStats'));
    }
    
    /**
     * Format nomor telepon untuk tampilan yang lebih baik
     */
    
    private function formatPhone($phone)
    {
        // Hapus karakter non-digit
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // Format nomor telepon Indonesia
        if (strlen($phone) >= 10) {
            if (substr($phone, 0, 1) == '0') {
                // Format: 0812-3456-7890
                return substr($phone, 0, 4) . '-' . substr($phone, 4, 4) . '-' . substr($phone, 8);
            } elseif (substr($phone, 0, 2) == '62') {
                // Format: +62 812-3456-7890
                return '+62 ' . substr($phone, 2, 3) . '-' . substr($phone, 5, 4) . '-' . substr($phone, 9);
            }
        }
        
        return $phone;
    }
    
    /**
     * Method untuk mendapatkan single team member (opsional)
     */
    public function getTeamMember($id)
    {
        $teamMember = Team::findOrFail($id);
        
        if ($teamMember->foto) {
            $teamMember->foto_url = asset('storage/' . $teamMember->foto);
        }
        
        if ($teamMember->telepon) {
            $teamMember->formatted_phone = $this->formatPhone($teamMember->telepon);
        }
        
        return response()->json($teamMember);
    }
}