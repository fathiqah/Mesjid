<?php

namespace App\Http\Controllers;

use App\Models\SosialPengeluaran;
use Illuminate\Http\Request;

class SosialPengeluaranController extends Controller
{
    public function index()
    {
        $data['pengeluaran'] = SosialPengeluaran::orderBy('tanggal','desc')->get();
        $data['total_pengeluaran'] = SosialPengeluaran::sum('jumlah');

        return view('sosial.pengeluaran.index',$data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'uraian' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        SosialPengeluaran::create($validated);
        return back();
    }
}
