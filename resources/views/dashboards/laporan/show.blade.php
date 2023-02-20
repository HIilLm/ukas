@if ($pemasukan_show->isEmpty())
    <h6 class="text-center"><B></B> </h6>
    {{-- <a class="link" href="{{ route('project.create') }}">Ayo buat</a> --}}
@else
<a href="{{ route('pemasukan.export', $pmskn_title->id) }}" class="btn btn-success mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Export</a>
<h5 class="text-center">Laporan Pemasukan Kas Kelas {{ auth()->user()->kelas->nama_kelas }}</h5>
<h5 class="text-center">Pada Bulan: {{ $pmskn_title->bulan->bulan }}, Tahun: {{ $pmskn_title->tahun }}, Nama Pembayaran: {{ $pmskn_title->nama }}, Pembayaran Perminggu: Rp. {{ number_format($pmskn_title->byr_perminggu) }}</h5>
<table class="table table-hover mt-4">
    <thead>
  <tr>
    <th scope="col">NO</th>
    <th scope="col">NAMA</th>
    <th scope="col">MINGGU KE 1</th>
    <th scope="col">MINGGU KE 2</th>
    <th scope="col">MINGGU KE 3</th>
    <th scope="col">MINGGU KE 4</th>
    <th scope="col">MINGGU KE 5</th>
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

<span class="btn btn-secondary" style="cursor: auto">
    Total Pemasukkan: Rp. {{ number_format($pmskn_title->total) }}
  </span>
@endif
