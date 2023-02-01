<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'Pengeluaran';
        $pengeluaran = Pengeluaran::where("kelas_id", auth()->user()->kelas_id)->get();
        return view('dashboards.pengeluaran', compact('page','pengeluaran'));
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
        $message = [
            'required' => ':attribute mohon diisi terlebih dahulu',
        ];
        $validated = $request->validate([
            "keterangan" => "required|max:300",
            "pengeluaran" => "required|numeric",
            "tanggal" => "required"
        ],$message);
        $user = auth()->user();
        $validated["nama"] = $user->name;
        $validated["kelas_id"] = $user->kelas_id;
        Pengeluaran::create($validated);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $message = [
            'required' => ':attribute mohon diisi terlebih dahulu',
        ];
        $validated = $request->validate([
            "keterangan" => "required|max:300",
            "pengeluaran" => "required|numeric",
            "tanggal" => "required"
        ],$message);
        Pengeluaran::find($pengeluaran->id)->update($validated);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        Pengeluaran::destroy($pengeluaran->id);
        return back();
    }
}
