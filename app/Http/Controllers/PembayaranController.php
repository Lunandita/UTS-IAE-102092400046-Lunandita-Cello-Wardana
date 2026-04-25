<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function store(Request $request)
    {
        Pembayaran::create([
            'nama_pelanggan' => $request->name,
            'jumlah' => $request->jumlah,
            'metode' => $request->metode,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil disimpan!');
    }
}