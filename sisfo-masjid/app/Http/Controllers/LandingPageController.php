<?php

namespace App\Http\Controllers;

use App\Models\KasPemasukan;
use App\Models\KasPengeluaran;
use App\Models\Kegiatan;
use App\Models\SosialPemasukan;
use App\Models\SosialPengeluaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LandingPageController extends Controller
{
    public function index()
    {
        $pemasukan_kas = KasPemasukan::sum('jumlah');
        $pengeluaran_kas = KasPengeluaran::sum('jumlah');
        $data['saldo_kas_masjid'] = $pemasukan_kas-$pengeluaran_kas;

        $pemasukan_sosial = SosialPemasukan::sum('jumlah');
        $pengeluaran_sosial = SosialPengeluaran::sum('jumlah');
        $data['saldo_kas_sosial'] = $pemasukan_sosial-$pengeluaran_sosial;
        
        $data['kegiatan'] = Kegiatan::get();
        return view('landing_page.index', $data);
    }

    public function detail(Kegiatan $kegiatan)
    {
        $data['kegiatan'] = $kegiatan;

        // return $kegiatan;
        return view('landing_page.detail', $data);
    }

    public function laporanKas()
    {
        $data['total_pemasukan'] = KasPemasukan::sum('jumlah');
        $data['total_pengeluaran'] = KasPengeluaran::sum('jumlah');
        $pemasukan = KasPemasukan::select('tanggal','jumlah as pemasukan','uraian')->get();
        $pengeluaran = KasPengeluaran::select('tanggal','jumlah as pengeluaran','uraian')->get();

        $data['rekap'] = $pemasukan->concat($pengeluaran)->sortBy('tanggal')->all();
        $pdf = Pdf::loadView('laporan.rekap-kas',$data);
        return $pdf->stream('invoice.pdf');
    }

    public function laporanSosial()
    {
        $data['total_pemasukan'] = SosialPemasukan::sum('jumlah');
        $data['total_pengeluaran'] = SosialPengeluaran::sum('jumlah');
        $pemasukan = SosialPemasukan::select('tanggal','jumlah as pemasukan','uraian')->get();
        $pengeluaran = SosialPengeluaran::select('tanggal','jumlah as pengeluaran','uraian')->get();

        $data['rekap'] = $pemasukan->concat($pengeluaran)->sortBy('tanggal')->all();
        $pdf = Pdf::loadView('laporan.rekap-sosial',$data);
        return $pdf->stream('invoice.pdf');
    }
}
