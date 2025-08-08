<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    //
    public function index (){
        //  protected $fillable  = [
        //     'layanan_id',
        //     'judul',
        //     'kategori',
        //     'deskripsi',
        //     'url',
        //     'tanggal_event',
        // ];
        $portofolios = Portofolio::with(['galery', 'layanan', 'team'])
                ->orderBy('created_at', 'desc')
                ->get();


        foreach ($portofolios as $portofolio) {
            // Format foto untuk galery portofolio
            foreach ($portofolio->galery as $galery) {
                // Pastikan foto menggunakan asset path yang benar
                if ($galery->foto) {
                    $galery->foto_url = asset('storage/' . $galery->foto);
                } else {
                    // Default foto jika tidak ada
                    $galery->foto_url = asset('storage/portofolio/default.jpg');
                }
            }
            
            // Tambahkan foto pertama sebagai thumbnail portofolio
            if ($portofolio->galery->count() > 0) {
                $portofolio->thumbnail_url = $portofolio->galery->first()->foto_url;
            } else {
                $portofolio->thumbnail_url = asset('storage/portofolio/default.jpg');
            }
            
            // Format foto team jika ada relasi
            if ($portofolio->team && $portofolio->team->foto) {
                $portofolio->team->foto_url = asset('storage/' . $portofolio->team->foto);
            } elseif ($portofolio->team) {
                $portofolio->team->foto_url = asset('storage/team/default.jpg');
            }
        }


        // dd($portofolios);

        return view('portofolio', compact('portofolios'));
    }

    public function show($id)
    {
        // Ambil portofolio berdasarkan ID, sekaligus ambil data galeri yang terkait
        $portofolio = Portofolio::with('galery')->findOrFail($id);

        return view('portofolio.show', compact('portofolio'));
    }

    public function indexGalery (){
        //  protected $fillable = [
        //     'portofolio_id',
        //     'foto',
        //     'nama',
        //     'deskripsi',
        // ];
        $allImage = Galery::all();


        // Format foto untuk setiap anggota tim
        foreach ($allImage as $team) {
            // Pastikan foto menggunakan asset path yang benar
            if ($team->foto) {
                $team->foto_url = asset('storage/' . $team->foto);
            } else {
                // Default foto jika tidak ada
                $team->foto_url = asset('storage/team/default.jpg');
            }
            
        }
        

        // dd($allImage);

        return view('galery', compact('allImage'));
    }
}
