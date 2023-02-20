<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengeluaranController;
use App\Models\Pengeluaran;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
Route::get('/login',[AuthController::class, "login"])->middleware('guest')->name("login");
Route::post('/login',[AuthController::class, "authenticate"])->middleware('guest')->name("authenticate");
});

Route::middleware(['auth'])->group(function () {
    Route::post('/changepass', [HomepageController::class, 'ChangePass'])->name("change.password");
    Route::get('/', [HomepageController::class, 'dashboard'])->name("dashboard.index");
    Route::post('/',[AuthController::class, "logout"])->name("logout");
});

Route::middleware(['bendsiswa'])->group(function () {
// ROUTE PENGELUARAN
Route::resource('/pengeluaran', PengeluaranController::class);

//route pembayaran
Route::resource('/uangkas', PembayaranController::class);
Route::post('/ukas/bayar', [PembayaranController::class, 'bayarminggu'])->name("uangkas.minggu");
});

Route::middleware(['bendahara'])->group(function () {
    //route laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/show/{id}', [LaporanController::class, 'show'])->name("laporan.show");
    Route::get('/laporan/pengeluaran/{time1}/{time2}/{kelas}', [LaporanController::class, 'show_pengeluaran'])->name("laporan.showp");
    Route::get('/exportpemasukan/{id}', [LaporanController::class, "pemasukan_export"])->name('pemasukan.export');
    Route::get('/exportpengeluaran/{time1}/{time2}/{kelas}', [LaporanController::class, "pengeluaran_export"])->name('pengeluaran.export');
});


Route::middleware(['bendamin'])->group(function () {
   //route kelas
   Route::resource('/kelas', KelasController::class);
   Route::post('kelas/createsiswa', [KelasController::class, "tambah_siswa"])->name("siswa.create");
   Route::put('kelas/perbaruis/{id}', [KelasController::class, "perbarui_siswa"])->name("siswa.update");
   Route::put('/kelas/perbarui/{id}', [KelasController::class, "perbarui"]);
   Route::post('/kelas/bendahara', [KelasController::class, "bendahara"]);
   Route::delete('/kelas/siswa/{id}', [KelasController::class, "hapus_siswa"])->name("siswa.delete");
   Route::get('/exportkelas/{id}', [KelasController::class, "SiswaExport"])->name('kelas.export');
});
