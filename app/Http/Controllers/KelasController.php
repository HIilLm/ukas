<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

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
        return back();
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
        return back();
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
        Kelas::destroy($id);
        return back();
    }

    public function tambah_siswa(Request $request)
    {
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
        return back();
    }

    public function perbarui_siswa(Request $request,$id)
    {
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
                "nisn" => "digits_between:6,12|numeric|required",
                "absen" => "required|numeric"
            ], $message);
        } else {
            $validated = $request->validate([
                "name" => "required",
                "email" => "required",
                "nisn" => "digits_between:6,12|numeric|unique:users|required",
                "absen" => "required|numeric"
            ], $message);
            // $validated["password"] = bcrypt($request->nisn);
        }

        if ($request->email == User::find($id)->email) {
            $validated = $request->validate([
                "name" => "required",
                "email" => "required",
                "nisn" => "digits_between:6,12|numeric|required",
                "absen" => "required|numeric"
            ], $message);
        } else {
            $validated = $request->validate([
                "name" => "required",
                "email" => "required|unique:users", 
                "nisn" => "digits_between:6,12|numeric|required",
                "absen" => "required|numeric"
            ], $message);
            // $validated["password"] = bcrypt($request->nisn);
           }


        User::find($id)->update($validated);
        return back();
    }

    public function hapus_siswa($id)
    {
        User::destroy($id);
        return back();
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

    public function SiswaExport($kelas)
    {
        $nama_file = Kelas::find($kelas)->nama_kelas;
        $nama_file = strtolower(preg_replace('/\s+/', '_', $nama_file));
        return Excel::download(new UserExport($kelas), $nama_file . time().'.xlsx');
    }
}
