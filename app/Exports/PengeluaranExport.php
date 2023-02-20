<?php

namespace App\Exports;
use App\Models\Pengeluaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PengeluaranExport implements FromView ,ShouldAutoSize
{

    protected $time1,$time2,$kelas;

    function __construct($time1,$time2,$kelas) {
            $this->time1 = $time1;
            $this->time2 = $time2;
            $this->kelas = $kelas;

    }

    public function view(): View
    {
        return view('dashboards.laporan.pengeluaranexport', [
            "pengeluaran" => Pengeluaran::whereBetween('tanggal', [$this->time1, $this->time2])->where('kelas_id', $this->kelas)->get(),
            "time1" => $this->time1,
            "time2" => $this->time2,
            "kelas" => $this->kelas
        ]);
    }
}
