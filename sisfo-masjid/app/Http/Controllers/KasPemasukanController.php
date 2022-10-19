<?php

namespace App\Http\Controllers;

use App\Models\KasPemasukan;
use Illuminate\Http\Request;

class KasPemasukanController extends Controller
{
    public function index ()
    {
        $data['pemasukan'] = KasPemasukan::orderBy('tanggal','desc')->get();
        $data['total_pemasukan'] = KasPemasukan::sum('jumlah');
        return view('kas.pemasukan.index',$data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'uraian' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        KasPemasukan::create($validated);
        return back();
    }
}
