<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;

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

Route::get('/login', function () {
    return view('dashboards.login');
});

Route::get('/',function()
{
    // return abort(403);
    // return abort(500);
    return view('dashboards.index',[
        'page' => 'Dashboard'
    ]);
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

Route::get('/uangkas',function()
{
    return view('dashboards.uang_kas.index_uang',[
        'page' => 'Uang Kas'
    ]);
});

Route::get('/laporan',function()
{
    return view('dashboards.laporan',[
        'page' => 'Laporan'
    ]);
});

Route::resource('/kelas', KelasController::class);
Route::post('kelas/createsiswa', [KelasController::class, "tambah_siswa"])->name("siswa.create");
Route::post('kelas/perbaruis/{id}', [KelasController::class, "perbarui_siswa"])->name("siswa.update");
Route::put('/kelas/perbarui/{id}', [KelasController::class, "perbarui"]);
