<?php

namespace App\Http\Controllers;

use App\Models\KasPengeluaran;
use App\Models\KasPengeluaranSementara;
use App\Models\SosialPengeluaran;
use Illuminate\Http\Request;

class KasPengeluaranSementaraController extends Controller
{
    public function index()
    {
        $data['pengeluaran'] = KasPengeluaranSementara::orderBy('tanggal', 'desc')->get();
        return view('kas.pengeluaran-sementara.index', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'uraian' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'sumber' => 'required'
        ]);

        if ($request->hasFile('bukti')) {
            $name = time() . '.' . $request->file('bukti')->extension();
            $request->file('bukti')->move(public_path() . '/img/', $name);
            $validated['bukti'] = $name;
        }

        KasPengeluaranSementara::create($validated);
        return back();
    }

    public function terima(Request $request)
    {
        if ($request->status == 'terima') {
            $validated = $request->validate([
                'uraian' => 'required',
                'jumlah' => 'required',
                'tanggal' => 'required'
            ]);

            if ($request->sumber == 'masjid') {
                KasPengeluaran::create($validated);
            }elseif($request->sumber == 'sosial') {
                SosialPengeluaran::create($validated);
            }
        }

     

        KasPengeluaranSementara::where('id',$request->id)->delete();
        return back();
    }
}
