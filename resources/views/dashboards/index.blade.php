@extends('layouts.dashboard')

@section('content')
    {{-- SISWA PAGE --}}
    @can('siswa')
        <div class="page-content">
            <div class="main-wrapper">
                @if ($message = Session::get('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card stat-widget">
                            <div class="card-body">
                                <h5 class="card-title"><i data-feather="dollar-sign"></i> Pengeluaran</h5>
                                <p>Jumlah Pengeluaran</p>
                                <br>
                                <h2>RP. {{ number_format($pengeluaran) }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card stat-widget">
                            <div class="card-body">
                                <h5 class="card-title"><i data-feather="dollar-sign"></i> Uang Kas</h5>
                                <p>Jumlah Uang Kas</p>
                                <br>
                                <h2 class="{{ $uangkas < 0 ? 'text-danger' : '' }}">RP.{{ number_format($uangkas) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('change.password') }}" method="POST" id="admin-pass">
                                    @csrf
                                    <h4>{{ auth()->user()->name }}</h4>
                                    <h6>NISN : {{ auth()->user()->nisn }}</h6>
                                    <div class="divider"></div>
                                    <div class="mb-3">
                                        <label for="old_pass" class="form-label">Password Lama</label>
                                        <input class="form-control @error('old_pass') is-invalid @enderror" name="old_pass"
                                            type="password" id="old_pass">
                                        @error('old_pass')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="admin" class="form-label">Password Baru</label>
                                        <input class="form-control @error('password') is-invalid @enderror" name="password"
                                            type="password" id="admin">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endcan
        {{-- SISWA PAGE --}}

        {{-- BENDAHARA PAGE --}}
        @can('bendahara')
            <div class="page-content">
                <div class="main-wrapper">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card stat-widget">
                                <div class="card-body">
                                    <h5 class="card-title"><i data-feather="users"></i> Siswa
                                        {{ auth()->user()->kelas->nama_kelas }}</h5>
                                    <p>Jumlah Siswa</p>
                                    <h2>{{ $siswa_kelas }} ORANG</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card stat-widget">
                                <div class="card-body">
                                    <h5 class="card-title"><i data-feather="dollar-sign"></i> Pengeluaran</h5>
                                    <p>Jumlah Pengeluaran</p>
                                    <br>
                                    <h2>RP. {{ number_format($pengeluaran) }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card stat-widget">
                                <div class="card-body">
                                    <h5 class="card-title"><i data-feather="dollar-sign"></i> Uang Kas</h5>
                                    <p>Jumlah Uang Kas</p>
                                    <br>
                                    <h2 class="{{ $uangkas < 0 ? 'text-danger' : '' }}">RP.{{ number_format($uangkas) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('change.password') }}" method="POST" id="admin-pass">
                                        @csrf
                                        <h4>{{ auth()->user()->name }}</h4>
                                        <h6>NISN : {{ auth()->user()->nisn }}</h6>
                                        <div class="divider"></div>
                                        <div class="mb-3">
                                            <label for="old_pass" class="form-label">Password Lama</label>
                                            <input class="form-control @error('old_pass') is-invalid @enderror" name="old_pass"
                                                type="password" id="old_pass">
                                            @error('old_pass')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="admin" class="form-label">Password Baru</label>
                                            <input class="form-control @error('password') is-invalid @enderror" name="password"
                                                type="password" id="admin">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            {{-- BENDHARA PAGE --}}


            {{-- ADMIN PAGE --}}
            @can('admin')
                <div class="page-content">
                    <div class="main-wrapper">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card stat-widget">
                                    <div class="card-body">
                                        <h5 class="card-title"><i data-feather="book"></i> Kelas</h5>
                                        <p>Jumlah Kelas</p>
                                        <br>
                                        <h2>{{ $jumlah_kelas }} KELAS</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card stat-widget">
                                    <div class="card-body">
                                        <h5 class="card-title"><i data-feather="users"></i> Siswa</h5>
                                        <p>Jumlah Siswa</p>
                                        <br>
                                        <h2>{{ $jumlah_siswa }} ORANG</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        $greetings = ['Thank you for keeping everything running behind the scenes!', 'Without you, I don’t know where we’d be. Thank you so much!', 'There are no words sufficient enough to express how grateful I am to have you on our team. I hope ‘Thank you from the bottom of my heart’ covers it.', 'Just when you’ve given it all you got, you give a little more. Thank you so much for all you do!', 'If they had you working in the White House, our country would see an unprecedented age of efficiency. Thank you for choosing to work here.', 'I appreciate you. We’re lucky to have you on our team.', 'Employee of the month? Try employee of the decade! You da bomb!'];
                                        shuffle($greetings);
                                        ?>
                                        <h4>Welcome Back {{ auth()->user()->name }}</h4>
                                        <h6>{{ $greetings[0] }}</h6>
                                        <form action="{{ route('change.password') }}" method="POST" id="admin-pass">
                                            @csrf
                                            <div class="divider"></div>
                                            <div class="mb-3">
                                                <label for="old_pass" class="form-label">Password Lama</label>
                                                <input class="form-control @error('old_pass') is-invalid @enderror"
                                                    name="old_pass" type="password" id="old_pass">
                                                @error('old_pass')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="admin" class="form-label">Password Baru</label>
                                                <input class="form-control @error('password') is-invalid @enderror"
                                                    name="password" type="password" id="admin">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
                {{-- ADMIN PAGE --}}
            @endsection
