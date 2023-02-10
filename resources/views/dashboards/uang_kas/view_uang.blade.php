@extends('layouts.dashboard')

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Minggu Ke-1 : Elang Pandi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route("uangkas.minggu") }}" method="POST">

                @csrf
                <div class="mb-3">
                    <label for="bayar" class="label-bayar form-label">Minggu Ke-1</label>
                    <input type="number" min="1000" name="bayar"
                        class="form-control @error('bayar') is-invalid @enderror" id="bayar"
                        value="{{ old('bayar') }}" >
                    @error('bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="hidden" name="id_pembayaran" value="" id="minggu">
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
</div>

    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h3>Detail Bulan Pembayaran : {{ $pembayaran->bulan->bulan }} {{ $pembayaran->tahun }} {{-- Bulan --}} </h3>
                        <h4 class="mb-3">Rp. {{ number_format($pembayaran->byr_perminggu) }} / minggu</h4>
                        {{-- <a href="" class="btn btn-primary mb-3 mt-2">Create</a> --}}
                        <table id="logo-table" class="display"
                            style="table-layout:fixed;
                            width:100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th class="mng-1">Minggu Ke 1</th>
                                    <th class="mng-2">Minggu Ke 2</th>
                                    <th class="mng-3">Minggu Ke 3</th>
                                    <th class="mng-4">Minggu Ke 4</th>
                                    <th class="mng-5">Minggu Ke 5</th>
                                    {{-- <th>option</th> --}}
                                </tr>
                            </thead>
                            <tbody id="images">
                                @foreach ($siswa as $item)
                                    <tr>
                                        <td>{{ $item->siswa->absen }}</td>
                                        <td class="data-name" data-id="{{ $item->id }}">{{ $item->siswa->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-{{ $item->belum_byr <= $pembayaran->byr_perminggu * 4? 'success': 'primary' }} btn-action" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" data-minggu="mng-1" {{ $item->belum_byr <= $pembayaran->byr_perminggu * 4? 'disabled': ''}}>
                                                {{ $item->mng_1 }}
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-{{ $item->belum_byr <= $pembayaran->byr_perminggu * 3? 'success': 'primary' }} btn-action" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" data-minggu="mng-2" {{ $item->belum_byr <= $pembayaran->byr_perminggu * 3? 'disabled': ''}}>
                                                {{ $item->mng_2 }}
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-{{ $item->belum_byr <= $pembayaran->byr_perminggu * 2? 'success': 'primary' }} btn-action" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" data-minggu="mng-3" {{ $item->belum_byr <= $pembayaran->byr_perminggu * 2? 'disabled': ''}}>
                                                {{ $item->mng_3 }}
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-{{ $item->belum_byr <= $pembayaran->byr_perminggu? 'success': 'primary' }} btn-action" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" data-minggu="mng-4" {{ $item->belum_byr <= $pembayaran->byr_perminggu ? 'disabled': ''}}>
                                                {{ $item->mng_4 }}
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-{{ $item->belum_byr == 0 * 4? 'success': 'primary' }} btn-action" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" data-minggu="mng-5" {{ $item->belum_byr == 0 ? 'disabled': ''}}>
                                                {{ $item->mng_5 }}
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Minggu ke 1</th>
                                    <th>Minggu ke 2</th>
                                    <th>Minggu ke 3</th>
                                    <th>Minggu ke 4</th>
                                    <th>Minggu ke 5</th>
                                    {{-- <th>option</th> --}}
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            var id;
            $('.editable').each(function() {
                id = $(this).attr('id');
                if (id != '') {
                    $('#' + id).summernote({
                        height: 120,
                    });
                }
            })

            $('.btn-action').click(function(){
                const minggu = $(this).data('minggu')
                const el = $(`th.${minggu}`)
                let text = $(el).text().split(' ')
                text = `${text[0]} ${text[1]}-${text[2]}`
                const nama = $(this).parent().parent().find('td.data-name').text()
                const id = $(this).parent().parent().find('td.data-name').data('id')

                $('.modal-title').html(`Ubah ${text} : ${nama}`)
                $('.label-bayar').html(text)
                // $('#bayar').attr('name', minggu);
                $('#minggu').attr('value', id);

        });

        var table = $('#logo-table').DataTable({});

    })
    </script>
@endsection
