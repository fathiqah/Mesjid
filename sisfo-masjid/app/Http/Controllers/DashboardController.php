<?php

namespace App\Http\Controllers;

use App\Models\KasPemasukan;
use App\Models\KasPemasukanSementara;
use App\Models\KasPengeluaran;
use App\Models\KasPengeluaranSementara;
use App\Models\SosialPemasukan;
use App\Models\SosialPengeluaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pemasukan_kas = KasPemasukan::sum('jumlah');
        $pengeluaran_kas = KasPengeluaran::sum('jumlah');
        $data['saldo_kas_masjid'] = $pemasukan_kas-$pengeluaran_kas;

        $pemasukan_sosial = SosialPemasukan::sum('jumlah');
        $pengeluaran_sosial = SosialPengeluaran::sum('jumlah');
        $data['saldo_kas_sosial'] = $pemasukan_sosial-$pengeluaran_sosial;

        $data['pemasukan_belum_verifikasi'] = KasPemasukanSementara::count();
        $data['pengeluaran_belum_verifikasi'] = KasPengeluaranSementara::count();
        return view('dashboard.index',$data);
    }
}
