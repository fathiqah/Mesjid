<?php

namespace App\Http\Controllers;

use App\Models\SosialPemasukan;
use App\Models\SosialPengeluaran;
use Illuminate\Http\Request;

class SosialRekapController extends Controller
{
    public function index()
    {
        $data['total_pemasukan'] = SosialPemasukan::sum('jumlah');
        $data['total_pengeluaran'] = SosialPengeluaran::sum('jumlah');
        $pemasukan = SosialPemasukan::select('tanggal','jumlah as pemasukan','uraian')->get();
        $pengeluaran = SosialPengeluaran::select('tanggal','jumlah as pengeluaran','uraian')->get();

        $data['rekap'] = $pemasukan->concat($pengeluaran)->sortBy('tanggal')->all();
        // return $data['rekap'];
        return view('sosial.rekap',$data);
    }

    public function filter(Request $request)
    {
        $data['tanggal_awal'] = $request->tanggal_awal;
        $data['tanggal_akhir'] = $request->tanggal_akhir;
        $data['total_pemasukan'] = SosialPemasukan::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->sum('jumlah');
        $data['total_pengeluaran'] = SosialPengeluaran::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->sum('jumlah');
        $pemasukan = SosialPemasukan::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->select('tanggal','jumlah as pemasukan','uraian')->get();
        $pengeluaran = SosialPengeluaran::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->select('tanggal','jumlah as pengeluaran','uraian')->get();

        $data['rekap'] = $pemasukan->concat($pengeluaran)->sortBy('tanggal')->all();
        return view('sosial.rekap',$data);

    }
}
