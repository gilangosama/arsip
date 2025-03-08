<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        // Proses penyimpanan data
        // Bisa ke database atau kirim email

        return redirect()->back()->with('success', 'Terima kasih! Pesan Anda telah terkirim.');
    }
} 