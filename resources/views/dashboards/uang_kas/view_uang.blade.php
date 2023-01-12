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
            <form action="{" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="bayar" class="form-label">Minggu Ke-1</label>
                    <input type="number" min="1" name="bayar"
                        class="form-control @error('bayar') is-invalid @enderror" id="bayar"
                        value="{{ old('bayar') }}" >
                    @error('bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
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
                        <h4 class="mb-3">Rp. {{ $pembayaran->byr_perminggu }} / minggu</h4>
                        {{-- <a href="" class="btn btn-primary mb-3 mt-2">Create</a> --}}
                        <table id="logo-table" class="display"
                            style="table-layout:fixed;
                            width:100%;">
                            <thead>
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
                            </thead>
                            <tbody id="images">
                                @foreach ($siswa as $item)
                                    <tr>
                                        <td>{{ $item->siswa->absen }}</td>
                                        <td>{{ $item->siswa->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                0
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                0
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                0
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                0
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                0
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
        });

        var table = $('#logo-table').DataTable({});
    </script>
@endsection
