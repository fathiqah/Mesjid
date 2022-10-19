<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasPemasukanController;
use App\Http\Controllers\KasPemasukanSementaraController;
use App\Http\Controllers\KasPengeluaranController;
use App\Http\Controllers\KasPengeluaranSementaraController;
use App\Http\Controllers\KasRekapController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SosialPemasukanController;
use App\Http\Controllers\SosialPengeluaranController;
use App\Http\Controllers\SosialRekapController;
use App\Models\KasPemasukanSementara;
use App\Models\LandingPage;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', LogoutController::class)->name('logout');
Route::get('/', [LandingPageController::class,'index'])->name('landing-page');
Route::get('/detail/{kegiatan}', [LandingPageController::class,'detail'])->name('landing-page-detail');
Route::post('/kas/sementara/pemasukan', [KasPemasukanSementaraController::class, 'store'])->name('kas.pemasukan.sementara');

Route::get('/laporan-keuangan',[LandingPageController::class, 'laporanKas']);
Route::get('/laporan-keuangan-kas',[LandingPageController::class, 'laporanSosial']);

Route::middleware(['checkRole:bendahara,admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // pemasukan
    Route::get('/kas/pemasukan', [KasPemasukanController::class, 'index'])->name('kas.pemasukan');
    Route::post('/kas/pemasukan', [KasPemasukanController::class, 'store'])->name('kas.pemasukan');
    Route::get('/kas/rekap', [KasRekapController::class, 'index'])->name('kas.rekap');
    Route::post('/kas/rekap', [KasRekapController::class, 'filter'])->name('kas.rekap');

    // pemasukan sementara
    Route::get('/kas/sementara/pemasukan', [KasPemasukanSementaraController::class, 'index'])->name('kas.pemasukan.sementara');
    Route::post('/kas/sementara/pemasukan-aksi', [KasPemasukanSementaraController::class, 'terima'])->name('kas.pemasukan.sementara.aksi');

    // pengeluaran
    Route::get('/kas/pengeluaran', [KasPengeluaranController::class, 'index'])->name('kas.pengeluaran');
    Route::post('/kas/pengeluaran', [KasPengeluaranController::class, 'store'])->name('kas.pengeluaran');

    // pengeluaran sementara
    Route::get('/kas/sementara/pengeluaran', [KasPengeluaranSementaraController::class, 'index'])->name('kas.pengeluaran.sementara');
    Route::post('/kas/sementara/pengeluaran', [KasPengeluaranSementaraController::class, 'store'])->name('kas.pengeluaran.sementara');
    Route::post('/kas/sementara/pengeluaran-aksi', [KasPengeluaranSementaraController::class, 'terima'])->name('kas.pengeluaran.sementara.aksi');


    // ================SOSIAL===========//
    // pemasukan
    Route::get('/sosial/pemasukan', [SosialPemasukanController::class, 'index'])->name('sosial.pemasukan');
    Route::post('/sosial/pemasukan', [SosialPemasukanController::class, 'store'])->name('sosial.pemasukan');
    Route::get('/sosial/rekap', [SosialRekapController::class, 'index'])->name('sosial.rekap');
    Route::post('/sosial/rekap', [SosialRekapController::class, 'filter'])->name('sosial.rekap');


    // pengeluaran
    Route::get('/sosial/pengeluaran', [SosialPengeluaranController::class, 'index'])->name('sosial.pengeluaran');
    Route::post('/sosial/pengeluaran', [SosialPengeluaranController::class, 'store'])->name('sosial.pengeluaran');

    // =============KEGIATAN============= //
    Route::get('/kegiatan',[KegiatanController::class,'index'])->name('kegiatan');
    Route::delete('/kegiatan',[KegiatanController::class,'delete'])->name('kegiatan.hapus');
    Route::get('/kegiatan/create',[KegiatanController::class,'create'])->name('kegiatan.create');
    Route::post('/kegiatan/create',[KegiatanController::class,'store'])->name('kegiatan.create');
});
