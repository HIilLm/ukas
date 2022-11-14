<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Stmt\Return_;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboards.kelas.index_kelas", [
            "kelas" => Kelas::all(),
            "page" => "Kelas"
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
            "nama_kelas" => "required"
        ]);
        Kelas::create($validated);
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
        return view("dashboards.kelas.view_kelas", [
            "siswa" => Kelas::findOrFail($id)->user->load('Kelas'),
            "kelas" => Kelas::find($id),
            "kelas_id" => $id,
            "page" => "Kelas"
        ]);
        // dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function perbarui(Request $request,$id)
    {
        $validated = $request->validate([
            "nama_kelas" => "required"
        ]);
        Kelas::find($id)->update($validated);
        return redirect()->back();
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
        Kelas::find($id)->delete();
        return redirect()->back();
    }

    public function tambah_siswa(Request $request)
    {
        // dd($request->nisn);
        $message = [
            'required' => ':attribute mohon diisi terlebih dahulu',
            'email' => ':attribute mohon massukan format email yang benar, contoh = email@email.email',
            'name.min' => ':attribute mohon masukkan minimal 5 karakter',
            'unique' => ':attribute sudah ada,mohon masukkan yang lain',
            'digits_between' => ':attribute minimal panjang 6,maximal panjang 12',
        ];
        $validated = $request->validate([
            "name" => "required",
            "email" => "required",
            "kelas_id" => "required",
            "nisn" => "digits_between:6,12|numeric|unique:users|required",
            "absen" => "required|numeric"
        ]);
        $validated["password"] = bcrypt($request->nisn);
        $validated["role_id"] = 3;
        // $buka = decrypt($validated["password"]);
        // dd($validated["password"]);
        // dd($buka);

        User::create($validated);
        return redirect()->back();

        // dd($id);
    }

    public function perbarui_siswa(Request $request,$id)
    {
        // $message = [
        //     'required' => ':attribute mohon diisi terlebih dahulu',
        //     'email' => ':attribute mohon massukan format email yang benar, contoh = email@email.email',
        //     'name.min' => ':attribute mohon masukkan minimal 5 karakter',
        //     'unique' => ':attribute sudah ada,mohon masukkan yang lain',
        //     'digits_between' => ':attribute minimal panjang 6,maximal panjang 12',
        // ];
        // $validated = $request->validate([
        //     "name" => "required",
        //     "email" => "required",
        //     "kelas_id" => "required",
        //     "nisn" => "digits_between:6,12|numeric|unique:users|required",
        //     "absen" => "required|numeric"
        // ]);
        // $validated["password"] = encrypt($request->nisn);
        // $validated["role_id"] = 3;

        // User::find($id)->update($validated);
        // return redirect()->back();
    }

    public function hapus_siswa($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
}
