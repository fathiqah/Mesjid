<?php

namespace App\Http\Controllers;

use App\Models\KasPemasukan;
use App\Models\KasPemasukanSementara;
use App\Models\SosialPemasukan;
use Illuminate\Http\Request;

class KasPemasukanSementaraController extends Controller
{
    public function index()
    {
        $data['pemasukan'] = KasPemasukanSementara::orderBy('tanggal', 'desc')->get();
        return view('kas.pemasukan-sementara.index', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'uraian' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'tujuan' => 'required'
        ]);

        $validated['uraian'] .= " dari " . $request->nama;

        if ($request->hasFile('bukti_bayar')) {
            $name = time() . '.' . $request->file('bukti_bayar')->extension();
            $request->file('bukti_bayar')->move(public_path() . '/img/', $name);
            $validated['bukti_bayar'] = $name;
        }

        KasPemasukanSementara::create($validated);
        return back();
    }

    public function terima(Request $request)
    {
        if ($request->status == 'terima') {
            $validated = $request->validate([
                'uraian' => 'required',
                'jumlah' => 'required',
                'tanggal' => 'required',
                'bukti_bayar' => 'required'
            ]);

            if ($request->tujuan == 'masjid') {
                KasPemasukan::create($validated);
            } elseif ($request->tujuan == 'sosial') {
                SosialPemasukan::create($validated);
            }
        }

        KasPemasukanSementara::where('id', $request->id)->delete();
        return back();
    }
}
