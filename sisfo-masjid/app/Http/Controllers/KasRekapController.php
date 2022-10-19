<?php

namespace App\Http\Controllers;

use App\Models\KasPemasukan;
use App\Models\KasPengeluaran;
use Illuminate\Http\Request;

class KasRekapController extends Controller
{
    public function index()
    {
        $data['total_pemasukan'] = KasPemasukan::sum('jumlah');
        $data['total_pengeluaran'] = KasPengeluaran::sum('jumlah');
        $pemasukan = KasPemasukan::select('tanggal','jumlah as pemasukan','uraian')->get();
        $pengeluaran = KasPengeluaran::select('tanggal','jumlah as pengeluaran','uraian')->get();

        $data['rekap'] = $pemasukan->concat($pengeluaran)->sortBy('tanggal')->all();
        // return $data['rekap'];
        return view('kas.rekap',$data);
    }

    public function filter(Request $request)
    {
        $data['tanggal_awal'] = $request->tanggal_awal;
        $data['tanggal_akhir'] = $request->tanggal_akhir;
        $data['total_pemasukan'] = KasPemasukan::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->sum('jumlah');
        $data['total_pengeluaran'] = KasPengeluaran::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->sum('jumlah');
        $pemasukan = KasPemasukan::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->select('tanggal','jumlah as pemasukan','uraian')->get();
        $pengeluaran = KasPengeluaran::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->select('tanggal','jumlah as pengeluaran','uraian')->get();

        $data['rekap'] = $pemasukan->concat($pengeluaran)->sortBy('tanggal')->all();
        return view('kas.rekap',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
