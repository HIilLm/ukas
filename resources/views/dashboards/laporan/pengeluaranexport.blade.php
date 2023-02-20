<table>
    <thead>
        <tr>
            <th colspan="7">
                <b><h4>Laporan Pengeluaran Kas Kelas {{ auth()->user()->kelas->nama_kelas }}</h4></b>
            </th>
        </tr>
        <tr>
            <th colspan="10">
                <b><h4>Dari: {{ date('d-M-Y', strtotime($time1)) }} Sampai:
                    {{ date('d-M-Y', strtotime($time2)) }}</h4></b>
            </th>
        </tr>
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
                <td>{{ $p->tanggal }}</td>
                <td>Rp. {{ number_format($p->pengeluaran) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
