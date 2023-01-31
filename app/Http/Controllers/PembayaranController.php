<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bulan;
use App\Models\Pembayaran;
use App\Models\BayarMinggu;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.uang_kas.index_uang',[
            'page' => 'Uang Kas',
            'pembayaran' => Pembayaran::where('kelas_id', auth()->user()->kelas_id)->get(),
            'bulan' => Bulan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nama" => "required",
            "bulan_id" => "required",
            "tahun" => "required",
            "byr_perminggu" => "required",
            "deskripsi" => "min:0",
            "kelas_id" => "required",
        ]);
        $validated['total'] = 0;
        $bayar = Pembayaran::create($validated);
        $siswa = User::where('kelas_id', $bayar["kelas_id"])->get();
        foreach ($siswa as $value) {
            BayarMinggu::create(["pembayaran_id" => $bayar["id"], "kelas_id" => $bayar["kelas_id"], "user_id" => $value->id]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = BayarMinggu::where('pembayaran_id', $id)->get();
        $pembayaran = Pembayaran::find($id);
        return view('dashboards.uang_kas.view_uang', [
            'page' => 'Uang Kas',
            'pembayaran' => $pembayaran,
            'siswa'=> $siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembayaran::destroy($id);
        return back();
    }

    public function bayarminggu(Request $request)
    {
        dd($request);
    }
}
