@extends('layouts.dashboard')

@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Laporan Kas Kelas 12 RPL 1</h2>
                        <div class="container">
                            <div class="row">

                                <div class="col-5 border-end">
                                    <h4>Pemasukan</h4>
                                    <label for="jenis_kelamin" class="form-label">
                                        <h6>Pilih Bulan Pembayaran</h6>
                                    </label>
                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected>Pilih Laporan Bulan Pembayaran</option>
                                        <option value="1">FEBRUARI | 2022 | Rp. 5,000</option>
                                        <option value="2">BULAN | TAHUN | NOMINAL</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <button class="btn btn-primary mt-3">Laporan Pemasukan</button>
                                </div>

                                <div class="col">
                                    <h4 class="ms-1">Pengeluaran</h4>
                                    <div class="row">
                                        <div class="col">
                                            <label for="date" class="form-label">
                                                <h6>Dari Tanggal</h6>
                                            </label>
                                            <input type="date" name="date"
                                                class="form-control @error('date') is-invalid @enderror" id="date"
                                                value="{{ old('date') }}">
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="date" class="form-label">
                                                <h6>Sampai Tanggal</h6>
                                            </label>
                                            <input type="date" name="date"
                                                class="form-control @error('date') is-invalid @enderror" id="date"
                                                value="{{ old('date') }}">
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mt-3 ms-1">Laporan Pengeluaran</button>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <a href="" class="btn btn-danger mb-5"><i data-feather="file-text"></i> Export</a>
                        <h4 class="text-center">Laporan Pemasukan Kas Kelas 12 RPL 1</h4>
                        <h4 class="text-center">Laporan Pada Bulan: Februari, Tahun: 2022, Pembayaran Perminggu: Rp. 5,000</h4>
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
                          <tr>
                            <th scope="row">27</th>
                            <td>Elang Pandi</td>
                            <td>Rp. 5,000</td>
                            <td>Rp. 5,000</td>
                            <td>Rp. 5,000</td>
                            <td>Rp. 5,000</td>
                            <td>Rp. 5,000</td>
                          </tr>
                        </tbody>

                        </table>

                        <span class="btn btn-secondary" style="cursor: auto">
                            Total Pemasukkan: Rp. 25,000
                          </span>
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
