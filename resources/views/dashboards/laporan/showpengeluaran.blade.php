@if ($pengeluaran->isEmpty())
    <div class="text-center">
        <h5>Tidak ada data</h5>
    </div>
@else
    <a href="/exportpengeluaran/{{ $time1 }}/{{$time2}}/{{$kelas}}" class="btn btn-success mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Export</a>
    <h4 class="text-center">Laporan Pengeluaran Kas Kelas {{ auth()->user()->kelas->nama_kelas }}</h4>
    <h4 class="text-center">Dari: {{ date('d-M-Y', strtotime($time1))}} Sampai: {{ date('d-M-Y', strtotime($time2)) }}</h4>
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">NAMA</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">TOTAL PENGELUARAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengeluaran as $p)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td>{{ date('d-M-Y', strtotime($p->tanggal)) }}</td>
                    <td>Rp. {{ number_format($p->pengeluaran) }}</td>
                </tr>
            @endforeach

        </tbody>

    </table>

    <span class="btn btn-secondary" style="cursor: auto">
        Total Pengeluaran: Rp. {{ number_format($pengeluaran->sum(function($item){return $item->pengeluaran;})) }}
    </span>
@endif
