<?php

namespace App\Http\Controllers;

use App\Models\KasPengeluaran;
use Illuminate\Http\Request;

class KasPengeluaranController extends Controller
{
    public function index()
    {
        $data['pengeluaran'] = KasPengeluaran::orderBy('tanggal','desc')->get();
        $data['total_pengeluaran'] = KasPengeluaran::sum('jumlah');

        return view('kas.pengeluaran.index',$data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'uraian' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        KasPengeluaran::create($validated);
        return back();
    }
}
