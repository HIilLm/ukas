<?php

namespace App\Exports;

use App\Models\Pembayaran;
use App\Models\BayarMinggu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PemasukanExport implements FromView ,ShouldAutoSize
{

    protected $id;

    function __construct($id) {
            $this->id = $id;
    }

    public function view(): View
    {
        return view('dashboards.laporan.pemasukanexport', [
            'pmskn_title' => Pembayaran::find($this->id),
            'pemasukan_show' => BayarMinggu::where('pembayaran_id', $this->id)->get(),
        ]);
    }
}
