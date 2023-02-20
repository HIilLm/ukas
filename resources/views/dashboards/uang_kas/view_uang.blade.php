@extends('layouts.dashboard')

@section('content')

    {{-- MODAL CREATE --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('uangkas.minggu') }}" method="POST">

                        @csrf
                        <div class="mb-3">
                            <label for="bayar" class="label-bayar form-label">Minggu Ke-1</label>
                            <input type="number" min="500" max="" step="500" name="bayar"
                                class="form-control @error('bayar') is-invalid @enderror" id="bayar"
                                value="{{ old('bayar') }}" onkeyup="cek_byr()">
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
    {{-- MODAL CREATE --}}

    <div class="page-content">
        <div class="main-wrapper">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h3>Detail Pembayaran @can('siswa') {{ auth()->user()->name }} @endcan Bulan : {{ $pembayaran->bulan->bulan }} {{ $pembayaran->tahun }}
                            {{-- Bulan --}} </h3>
                        <h4 class="mb-3">Rp. {{ number_format($pembayaran->byr_perminggu) }} / minggu</h4>
                        @can('bendahara')
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
                                    </tr>
                                </thead>
                                <tbody id="images">
                                    @foreach ($siswa as $item)
                                        <tr>
                                            <td>{{ $item->siswa->absen }}</td>
                                            <td class="data-name" data-id="{{ $item->id }}">{{ $item->siswa->name }}</td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-{{ $item->mng_1 == $pembayaran->byr_perminggu ? 'success' : 'primary' }} btn-action"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-minggu="mng-1"
                                                    {{ $item->mng_1 == $pembayaran->byr_perminggu ? 'disabled' : '' }}>
                                                    {{ number_format($item->mng_1) }}
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-{{ $item->mng_2 == $pembayaran->byr_perminggu ? 'success' : 'primary' }} btn-action"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-minggu="mng-2"
                                                    {{ $item->mng_2 == $pembayaran->byr_perminggu ? 'disabled' : '' }}>
                                                    {{ number_format($item->mng_2) }}
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-{{ $item->mng_3 == $pembayaran->byr_perminggu ? 'success' : 'primary' }} btn-action"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-minggu="mng-3"
                                                    {{ $item->mng_3 == $pembayaran->byr_perminggu ? 'disabled' : '' }}>
                                                    {{ number_format($item->mng_3) }}
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-{{ $item->mng_4 == $pembayaran->byr_perminggu ? 'success' : 'primary' }} btn-action"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-minggu="mng-4"
                                                    {{ $item->mng_4 == $pembayaran->byr_perminggu ? 'disabled' : '' }}>
                                                    {{ number_format($item->mng_4) }}
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-{{ $item->mng_5 == $pembayaran->byr_perminggu ? 'success' : 'primary' }} btn-action"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-minggu="mng-5"
                                                    {{ $item->mng_5 == $pembayaran->byr_perminggu ? 'disabled' : '' }}>
                                                    {{ number_format($item->mng_5) }}
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
                                    </tr>
                                </tfoot>
                            </table>
                        @endcan

                        @can('siswa')
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
                            </tr>
                        </thead>
                        <tbody id="images">
                            @foreach ($siswashow as $item)
                                <tr>
                                    <td>{{ $item->siswa->absen }}</td>
                                    <td class="data-name" data-id="{{ $item->id }}">{{ $item->siswa->name }}</td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-{{ $item->mng_1 == $pembayaran->byr_perminggu ? 'success' : 'warning' }} btn-action"disabled>
                                            {{ number_format($item->mng_1) }}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button"
                                        class="btn btn-{{ $item->mng_2 == $pembayaran->byr_perminggu ? 'success' : 'warning' }} btn-action"disabled>
                                        {{ number_format($item->mng_2) }}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button"
                                        class="btn btn-{{ $item->mng_3 == $pembayaran->byr_perminggu ? 'success' : 'warning' }} btn-action"disabled>
                                        {{ number_format($item->mng_3) }}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button"
                                        class="btn btn-{{ $item->mng_4 == $pembayaran->byr_perminggu ? 'success' : 'warning' }} btn-action"disabled>
                                        {{ number_format($item->mng_4) }}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button"
                                        class="btn btn-{{ $item->mng_5 == $pembayaran->byr_perminggu ? 'success' : 'warning' }} btn-action"disabled>
                                        {{ number_format($item->mng_5) }}
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
                            </tr>
                        </tfoot>
                    </table>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var id;
            $('.btn-action').click(function() {
                const minggu = $(this).data('minggu')
                const el = $(`th.${minggu}`)
                let text = $(el).text().split(' ')
                text = `${text[0]} ${text[1]}-${text[2]}`
                const nama = $(this).parent().parent().find('td.data-name').text()
                const id = $(this).parent().parent().find('td.data-name').data('id')

                $('.modal-title').html(`Ubah ${text} : ${nama}`)
                $('.label-bayar').html(text)
                $('#minggu').attr('value', id);

            });

            var table = $('#logo-table').DataTable({});

        })

        function cek_byr() {
            var check = document.getElementById("bayar").value;
            console.log(check)
        }
    </script>
@endsection
