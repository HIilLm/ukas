<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function dashboard()
    {
        $uangkas = Pembayaran::where('kelas_id' , auth()->user()->kelas_id)->get()->sum('total');
        $siswa_kelas = User::where('kelas_id', auth()->user()->kelas_id)->get()->count();
        $page = "Dashboard";
        return view('dashboards.index',compact('uangkas','siswa_kelas','page'));
    }
}
