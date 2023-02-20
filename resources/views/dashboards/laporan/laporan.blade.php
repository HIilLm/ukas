@extends('layouts.dashboard')

@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Laporan Kas Kelas {{ auth()->user()->kelas->nama_kelas }}</h2>
                        <div class="container">
                            <div class="row">

                                <div class="col-5 border-end">
                                    <h4>Pemasukan</h4>
                                    <label for="pemasukan" class="form-label">
                                        <h6>Pilih Bulan Pembayaran</h6>
                                    </label>
                                    <div class="form-floating">
                                        <select class="form-select" aria-label="Floating label select example"
                                            id="pemasukan" onchange="ubahpmskn()">
                                            <option selected value="">Open this select menu</option>
                                            @foreach ($pemasukan as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->bulan->bulan . ' | ' . $item->tahun . ' | ' . $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Search</label>
                                    </div>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <button class="btn btn-primary mt-3" onclick="show()" disabled id="btnpmskn">Laporan
                                        Pemasukan</button>
                                </div>

                                <div class="col">
                                    <h4 class="ms-1">Pengeluaran</h4>
                                    <div class="row">
                                        <div class="col">
                                            <label for="time1" class="form-label">
                                                <h6>Dari Tanggal</h6>
                                            </label>
                                            <input type="date" name="date"
                                                class="form-control @error('date') is-invalid @enderror" id="time1"
                                                onchange="checktime2()">
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="time2" class="form-label">
                                                <h6>Sampai Tanggal</h6>
                                            </label>
                                            <input type="date" name="date"
                                                class="form-control @error('date') is-invalid @enderror" id="time2"
                                                onchange="checktime1()">
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mt-3 ms-1" onclick="showp()" id="btnlp"
                                        disabled>Laporan Pengeluaran</button>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" id="show">
                        <div class="text-center">
                            <h5>Silahkan pilih data</h5>
                        </div>
                    </div>

                </div>
            @endsection
            @section('js')
                <script>
                    function ubahpmskn() {
                        $('#btnpmskn').prop("disabled", false);
                    }

                    function checktime2() {
                        time2 = $('#time2').val();
                        if (time2 != "") {
                            $('#btnlp').prop("disabled", false);
                        }
                    }

                    function checktime1() {
                        time1 = $('#time1').val();
                        if (time1 != "") {
                            $('#btnlp').prop("disabled", false);
                        }
                    }

                    function show() {
                        pemasukan = $('#pemasukan').find(":selected").val();
                        // console.log(pemasukan);
                        $.get('/laporan/show/' + pemasukan, function(data) {
                            $('#show').html(data);
                        })
                    }

                    function showp() {
                        kelas = {{ auth()->user()->kelas_id }};
                        time1 = $('#time1').val();
                        time2 = $('#time2').val();
                        // console.log(time1);
                        $.get('/laporan/pengeluaran/' + time1 + '/' + time2 + '/' + kelas, function(data) {
                            $('#show').html(data);
                        })
                    }
                </script>
            @endsection
