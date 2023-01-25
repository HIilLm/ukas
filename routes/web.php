<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UangController;
use App\Http\Controllers\PembayaranController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware(['guest'])->group(function () {
Route::get('/login',[AuthController::class, "login"])->middleware('guest')->name("login");
Route::post('/login',[AuthController::class, "authenticate"])->middleware('guest')->name("authenticate");
});

// Route::get('/admin/kelas',function()
// {
//     return view('dashboards.kelas.index_kelas',[
//         'page' => 'Kelas'
//     ]);
// });

// Route::get('/bendahara/kelas',function()
// {
//     return view('dashboards.kelas.indexb_kelas',[
//         'page' => 'Kelas Bendahara'
//     ]);
// });

Route::get('/pengeluaran',function()
{
    return view('dashboards.pengeluaran',[
        'page' => 'Pengeluaran'
    ]);
});

Route::get('/bendahara',function()
{
    return view('dashboards.indexb',[
        'page' => 'Dashboard'
    ]);
});

Route::get('/detail/kelas',function()
{
    return view('dashboards.kelas.view_kelas',[
        'page' => 'Kelas'
    ]);
});

Route::get('/detail/bulan',function()
{
    return view('dashboards.uang_kas.view_uang',[
        'page' => 'Uang Kas'
    ]);
});

Route::get('/admin',function()
{
    return view('dashboards.indexa',[
        'page' => 'Dashboard'
    ]);
});

Route::resource('/uangkas', UangController::class);

Route::get('/laporan',function()
{
    return view('dashboards.laporan',[
        'page' => 'Laporan'
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomepageController::class, 'dashboard'])->name("dashboard.index");
    Route::post('/',[AuthController::class, "logout"])->name("logout");

    //route kelas
    Route::resource('/kelas', KelasController::class);
    Route::post('kelas/createsiswa', [KelasController::class, "tambah_siswa"])->name("siswa.create");
    Route::put('kelas/perbaruis/{id}', [KelasController::class, "perbarui_siswa"])->name("siswa.update");
    Route::put('/kelas/perbarui/{id}', [KelasController::class, "perbarui"]);
    Route::post('/kelas/bendahara', [KelasController::class, "bendahara"]);
    Route::delete('/kelas/siswa/{id}', [KelasController::class, "hapus_siswa"])->name("siswa.delete");

    //route pembayaran
    Route::resource('/uangkas', PembayaranController::class);
});
