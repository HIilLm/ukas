@extends('layouts.dashboard')

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Bulan Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('uangkas.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="bulan" class="form-label">Bulan</label>
                                    <select name="bulan" class="form-control @error('bulan') is-invalid @enderror"
                                        id="bulan" aria-label="Default select example">
                                        <option selected value="">Pilih Bulan</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                    @error('bulan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="number" min="{{ date('Y') }}" max="{{ date('Y') +2 }}" name="tahun"
                                        class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                                        value="{{ old('tahun') }}">
                                    @error('tahun')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="bayar" class="form-label">Pembayaran Perminggu</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" min="1" name="bayar" class="form-control"
                                    aria-label="Amount (to the nearest dollar)" @error('bayar') is-invalid @enderror"
                                    id="bayar" value="{{ old('bayar') }}">
                                {{-- <span class="input-group-text">.00</span> --}}
                                @error('bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Bulan Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="bulan" class="form-label">Bulan</label>
                                    <select name="bulan" class="form-control @error('bulan') is-invalid @enderror"
                                        id="bulan" aria-label="Default select example">
                                        <option selected value="">Pilih Bulan</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                    @error('bulan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="number"  min="{{ date('Y') }}" max="{{ date('Y') +2 }}" "name="tahun"
                                        class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                                        value="{{ old('tahun') }}">
                                    @error('tahun')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="bayar" class="form-label">Pembayaran Perminggu</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" min="1" name="bayar" class="form-control"
                                    aria-label="Amount (to the nearest dollar)" @error('bayar') is-invalid @enderror"
                                    id="bayar" value="{{ old('bayar') }}">
                                {{-- <span class="input-group-text">.00</span> --}}
                                @error('bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col-10">
                    <h2>Uang Kas Kelas 12 RPL 1</h2>
                    <h4 class="mb-3">Pilih Bulan Pembayaran</h4>
                </div>
                <div class="col-2">
                    <a href="" class="btn btn-dark btn-lg" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Tambah Bulan</a> {{-- Hanya Admin/Bendahara,Berupa Modal --}}
                </div>
            </div>


            <div class="row">
                @foreach ($ukas as $item)
                <div class="col-md-5 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->bulan }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $item->tahun }}</h6>
                            <p class="card-text">Rp. {{ $item->bayar }} / minggu
                                <br>
                                Total Uang Kas Bulan Ini:
                            <p class="btn btn-warning" style="cursor: default">
                                Rp. 45,000
                            </p>
                            <br>
                            <a href="/detail/bulan" {{-- /detail/februari --}} class="btn btn-primary btn-sm"><i data-feather="eye"></i></a>
                            <span><a type="button" class="btn btn-danger btn-sm"><i data-feather="trash-2"></i></a></span>
                            <span><a type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#edit"><i data-feather="edit"></i></a></span>
                            </p>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    @endsection
