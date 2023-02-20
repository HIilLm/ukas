<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\BayarMinggu;
use App\Models\Pengeluaran;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengeluaranExport;
use App\Exports\PemasukanExport;


class LaporanController extends Controller
{
    public function index()
    {
        $page = "Laporan";
        $pemasukan = Pembayaran::all();
        return view('dashboards.laporan.laporan', compact('pemasukan','page'));
    }

    public function show($id)
    {
        $pemasukan_show = BayarMinggu::where('pembayaran_id', $id)->get();
        $pmskn_title = Pembayaran::find($id);
        return view('dashboards.laporan.show',compact('pemasukan_show','pmskn_title'));
    }

    public function show_pengeluaran($time1,$time2,$kelas)
    {
        $pengeluaran = Pengeluaran::whereBetween('tanggal', [$time1, $time2])->where('kelas_id', $kelas)->get();
        return view('dashboards.laporan.showpengeluaran', compact('pengeluaran','time1','time2','kelas'));
    }

    public function pemasukan_export($pemasukan)
    {
        $nama_file = Pembayaran::find($pemasukan)->nama;
        $nama_file = strtolower(preg_replace('/\s+/', '_', $nama_file));
        return Excel::download(new PemasukanExport($pemasukan), $nama_file . time() .'.xlsx');
    }

    public function pengeluaran_export($time1,$time2,$kelas)
    {
        return Excel::download(new PengeluaranExport($time1,$time2,$kelas), "laporan_pengeluaran" . time().'.xlsx');
    }
}
