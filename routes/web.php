<?php

use Illuminate\Support\Facades\Route;

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
    return view('dashboards.index',[
        'page' => 'Dashboard'
    ]);
});

Route::get('/admin/kelas',function()
{
    return view('dashboards.kelas.index_kelas',[
        'page' => 'Kelas'
    ]);
});

Route::get('/bendahara',function()
{
    return view('dashboards.indexb',[
        'page' => 'Dashboard'
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
