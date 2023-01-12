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
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pembayaran</label>
                            <input type="text" name="nama"
                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="bulan" class="form-label">Bulan</label>
                                    <select name="bulan_id" class="form-control @error('bulan') is-invalid @enderror"
                                        id="bulan_id" aria-label="Default select example">
                                        <option selected value="">Pilih Bulan</option>
                                        @foreach ($bulan as $b)
                                            <option value="{{ $b->id }}">{{ $b->bulan }}</option>
                                        @endforeach
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
                                    <input type="number" min="{{ date('Y') -2 }}"name="tahun"
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
                                <input type="number" min="1" name="byr_perminggu" class="form-control"
                                    aria-label="Amount (to the nearest dollar)" @error('bayar') is-invalid @enderror"
                                    id="bayar" value="{{ old('bayar') }}">
                                @error('bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="5"></textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="hidden" name="kelas_id" value="{{ auth()->user()->kelas_id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
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
                @foreach ($pembayaran as $item)
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->bulan->bulan }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $item->tahun }}</h6>
                                <p class="card-text">Rp. {{ $item->byr_perminggu }} / minggu
                                    <br>
                                    Total Uang Kas Bulan Ini:
                                <p class="btn btn-warning" style="cursor: default">
                                    Rp. {{ $item->total }}
                                </p>
                                <br>
                                <a href="{{ route('uangkas.show',['uangka' => $item->id]) }}" {{-- /detail/februari --}} class="btn btn-primary btn-sm"><i
                                        data-feather="eye"></i></a>
                                <span><a type="button" class="btn btn-danger btn-sm"><i data-feather="trash-2"></i></a></span>
                                </p>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    @endsection
