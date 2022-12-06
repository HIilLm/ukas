<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
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
        $bendahara = User::where(["kelas_id" => $id, "role_id" => 2])->count();
        return view("dashboards.kelas.view_kelas", [
            "siswa" => Kelas::findOrFail($id)->user->load('Kelas'),
            "kelas" => Kelas::find($id),
            "kelas_id" => $id,
            "page" => "Kelas",
            "bendahara" => $bendahara
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
            "email" => "required|unique:users",
            "kelas_id" => "required",
            "nisn" => "digits_between:6,12|numeric|unique:users|required",
            "absen" => "required|numeric"
        ],$message);
        $validated["password"] = bcrypt($request->nisn);
        $validated["role_id"] = 3;

        User::create($validated);
        // foreach (User::where("kelas_id", $siswa->kelas_id) as $sis) {
        //     if ($sis->absen >= $siswa->absen) {
        //         User::find($sis->id)->update(["absen" => $sis->absen + 1]);
        //     }
        // }
        return redirect()->back();
    }

    public function perbarui_siswa(Request $request,$id)
    {
        // dd($request);
        $message = [
            'required' => ':attribute mohon diisi terlebih dahulu',
            'email' => ':attribute mohon massukan format email yang benar, contoh = email@email.email',
            'name.min' => ':attribute mohon masukkan minimal 5 karakter',
            'unique' => ':attribute sudah ada,mohon masukkan yang lain',
            'digits_between' => ':attribute minimal panjang 6,maximal panjang 12',
        ];
        if ($request->nisn == User::find($id)->nisn) {
            $validated = $request->validate([
                "name" => "required",
                "email" => "required",
                "absen" => "required|numeric"
            ], $message);
        } else {
            $validated = $request->validate([
                "name" => "required",
                "email" => "required",
                "nisn" => "digits_between:6,12|numeric|unique:users|required",
                "absen" => "required|numeric"
            ], $message);
            $validated["password"] = bcrypt($request->nisn);
        }

        User::find($id)->update($validated);
        // $siswa = User::find($id);
        // // dd($siswa);
        // foreach (User::where("kelas_id", $siswa->kelas_id)->get() as $sis) {
        //     // dd($sis);
        //     if ($sis->absen >= $siswa->absen) {
        //         User::find($sis->id)->update(["absen" => $sis->absen + 1]);
        //     }
        // }
        // dd(User::where("kelas_id", $siswa->kelas_id)->get());
        return redirect()->back();
    }

    public function hapus_siswa($id)
    {
        $siswa = User::find($id);
        // foreach (User::where("kelas_id", $siswa->kelas_id) as $sis) {
        //     if ($sis->absen > $siswa->absen) {
        //         User::find($sis->id)->update(["absen" => $sis->absen - 1]);
        //     }
        // }
        $siswa->delete();
        return redirect()->back();
    }

    public function bendahara(Request $request)
    {
        if ($request->bendahara == true) {
            User::find($request->id)->update(["role_id" => 2]);
        }else {
            User::find($request->id)->update(["role_id" => 3]);
        }
        $bendahara = User::where(["kelas_id" => $request->kelas, "role_id" => 2])->get();
        $total[0] = $bendahara->count();
        if ($bendahara->count() == 2) {
            foreach ($bendahara as $key => $value) {
                array_push($total,$value->id);
            }

        }
        return response()->json($total);
    }
}
