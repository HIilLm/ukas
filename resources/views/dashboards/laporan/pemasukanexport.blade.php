<table style="table-layout:auto;">
    <thead>
        <tr>
            <th colspan="7"><b>
                    <h5>Laporan Pemasukan Kas Kelas {{ auth()->user()->kelas->nama_kelas }}</h5>
                </b></th>
        </tr>
        <tr>
            <th colspan="8"><b>
                    <h5>Pada Bulan: {{ $pmskn_title->bulan->bulan }}, Tahun: {{ $pmskn_title->tahun }}, Nama Pembayaran:
                        {{ $pmskn_title->nama }}, Pembayaran Perminggu: Rp.
                        {{ number_format($pmskn_title->byr_perminggu) }}</h5>
                </b> </th>
        </tr>
        <tr>
            <th>#</th>
            <th>NAMA</th>
            <th>MINGGU KE-1</th>
            <th>MINGGU KE-2</th>
            <th>MINGGU KE-3</th>
            <th>MINGGU KE-4</th>
            <th>MINGGU KE-5</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemasukan_show as $item)
            <tr>
                <td scope="row">{{ $item->siswa->absen }}</td>
                <td>{{ $item->siswa->name }}</td>
                <td>Rp. {{ number_format($item->mng_1) }}</td>
                <td>Rp. {{ number_format($item->mng_2) }}</td>
                <td>Rp. {{ number_format($item->mng_3) }}</td>
                <td>Rp. {{ number_format($item->mng_4) }}</td>
                <td>Rp. {{ number_format($item->mng_5) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
