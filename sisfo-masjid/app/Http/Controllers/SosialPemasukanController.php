<?php

namespace App\Http\Controllers;

use App\Models\SosialPemasukan;
use Illuminate\Http\Request;

class SosialPemasukanController extends Controller
{
    public function index ()
    {
        $data['pemasukan'] = SosialPemasukan::orderBy('tanggal','desc')->get();
        $data['total_pemasukan'] = SosialPemasukan::sum('jumlah');
        return view('sosial.pemasukan.index',$data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'uraian' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        SosialPemasukan::create($validated);
        return back();
    }
}
