<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use App\Models\Subscribers;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Cek apakah email sudah ada
        // EmailList::
        $existing = EmailList::where('email', $request->email)->first();

        if ($existing) {
            // return response()->json([
            //     'status' => 'error',
            //     'message' => 'Email sudah terdaftar.',
            // ], 409); // Conflict

            return redirect()->route('home')
                ->with('error', 'Email sudah terdaftar.');
        }

        EmailList::create([
            'name' => $request->email,
            'email' => $request->email,
        ]);

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Berhasil subscribe!',
        // ]);

        return redirect()->route('home')
                ->with('success', 'Berhasil subscribe.');
    }
}
