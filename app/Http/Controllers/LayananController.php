<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PaketLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    //
    public function IndexWedding () {
        $dataPaket = PaketLayanan::all();
               // Ambil data include beserta item-itemnya
        $dataInclude = DB::table('tb_include')
            ->select('tb_include.*')
            ->get()
            ->map(function ($include) {
                $include->items = DB::table('tb_item_include')
                    ->where('include_id', $include->id)
                    ->pluck('nama_item')
                    ->toArray();
                return $include;
            });
        
        return view('weddingorganizer', compact('dataPaket', 'dataInclude'));
    }
    public function IndexSewaBarang () {
        $dataBarang = Barang::all();
        
        return view('sewabarang', compact('dataBarang'));
    }
}
