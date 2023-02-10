<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class HomepageController extends Controller
{
    public function dashboard()
    {
        // GENERAL
        $page = "Dashboard";
        // GENERAL

        // BENDAHARA
        $uangkas = Pembayaran::where('kelas_id' , auth()->user()->kelas_id)->get()->sum('total') - Pengeluaran::where('kelas_id', auth()->user()->kelas_id)->get()->sum('pengeluaran');
        $siswa_kelas = User::where('kelas_id', auth()->user()->kelas_id)->get()->count();
        $pengeluaran = Pengeluaran::where('kelas_id', auth()->user()->kelas_id)->get()->sum('pengeluaran');
        // BENDAHARA

        // ADMIN
        $jumlah_kelas = Kelas::all()->count();
        $jumlah_siswa = User::where("role_id" , "2")->orWhere("role_id" , "3")->count();
        // ADMIN

        return view('dashboards.index',compact('uangkas','siswa_kelas','page','jumlah_kelas', "jumlah_siswa","pengeluaran"));
    }

    public function ChangePass(Request $request)
    {
        $request->validate([
            "old_pass" => "required|min:4",
            "password" => "required|min:4"
        ]);

        if(Hash::check($request->old_pass , auth()->user()->password)){
            User::find(auth()->user()->id)->update(["password" => bcrypt($request->password)]);
            return back();
        }

        throw ValidationException::withMessages([
            "old_pass" => "Password lama tidak cocok"
        ]);
    }
}
