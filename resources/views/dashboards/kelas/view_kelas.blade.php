@extends('layouts.dashboard')

@section('content')
    {{-- MODAL TAMBAH --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="kelas_id" value="{{ $kelas_id }}">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="absen" class="form-label">No Absen</label>
                                    <div class="input-group mb-3">
                                        <input type="number" min="1" name="absen" class="form-control"
                                            @error('absen') is-invalid @enderror" id="absen"
                                            value="{{ old('absen') }}">
                                        @error('absen')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Siswa</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="name" class="form-control"
                                            @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}"
                                            required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nisn" class="form-label">NISN Siswa</label>
                                    <div class="input-group mb-3">
                                        <input type="number" min="1" name="nisn" class="form-control"
                                            @error('nisn') is-invalid @enderror" id="nisn" value="{{ old('nisn') }}">
                                        @error('nisn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Siswa</label>
                                    <div class="input-group mb-3">
                                        <input type="text" min="1" name="email" class="form-control"
                                            @error('email') is-invalid @enderror" id="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-none">
                            <label for="kelas_id" class="form-label">kelas_id</label>
                            <div class="input-group mb-3">
                                <input type="number" min="1" name="kelas_id" class="form-control"
                                    @error('kelas_id') is-invalid @enderror" id="kelas_id" value="{{ $kelas_id }}">
                                @error('kelas_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL TAMBAH --}}

    {{-- MODAL EDIT --}}
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  id="update" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="edit_absen" class="form-label">No Absen</label>
                                    <div class="input-group mb-3">
                                        <input type="number" min="1" name="absen" class="form-control"
                                            @error('absen') is-invalid @enderror" id="edit_absen" value="{{ old('absen') }}">
                                        @error('absen')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Nama Siswa</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="name" class="form-control"
                                            @error('name') is-invalid @enderror" id="edit_name" value="{{ old('name') }}"
                                            required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="edit_nisn" class="form-label">NISN Siswa</label>
                                    <div class="input-group mb-3">
                                        <input type="number" min="1" name="nisn" class="form-control"
                                            @error('nisn') is-invalid @enderror" id="edit_nisn" value="{{ old('nisn') }}">
                                        @error('nisn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="edit_email" class="form-label">Email Siswa</label>
                                    <div class="input-group mb-3">
                                        <input type="text" min="1" name="email" class="form-control"
                                            @error('email') is-invalid @enderror" id="edit_email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
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
    {{-- MODAL EDIT --}}

    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Kelas {{ $kelas->nama_kelas }}</h5>
                        <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Tambah Siswa</a> {{-- Berupa modal --}}
                        <table id="logo-table" class="display"
                            style="table-layout:fixed;
                            width:100%;">
                            <thead>
                                <tr>
                                    <th>No Absen</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Bendahara</th> {{-- Admin Akses --}}
                                    <th>option</th>
                                </tr>
                            </thead>
                            <tbody id="images">
                                @foreach ($siswa as $item)
                                    <tr>
                                        <td>
                                            {{ $item->absen }}
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>{{ $item->nisn }}</td>

                                        {{-- ADMIN ACCESS --}}
                                        <td>
                                            <div class="form-check form-switch">
                                                <label class="form-check-label"
                                                for="flexSwitchCheckDefault">Bendahara</label>
                                                <input class="form-check-input" type="checkbox"
                                                id="flexSwitchCheckDefault">
                                            </div>
                                        </td>
                                        {{-- ADMIN ACCESS --}}

                                        {{-- BENDAHARA ACCESS --}}
                                        {{-- <td>
                                            --
                                        </td> --}}
                                        {{-- BENDAHARA ACCESS --}}

                                        <td style="">
                                            <div class="dropdown dropright">
                                                <button class="btn btn-secondary" type="button" id="dropdownMenuButton"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item text-dark" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal1" style="cursor: pointer">Edit</a> {{-- Berupa Modal --}}
                                                    </li>
                                                    <li>
                                                        <form id="form-delete{{ $item->id }}"
                                                            action="{{ route("siswa.delete", ["id" => $item->id]) }}"
                                                            method="post" style="display: none">
                                                            @method("delete")
                                                            @csrf
                                                        </form>
                                                        <a class="dropdown-item text-dark" style="cursor: pointer" onclick="what({{ $item->id }})">
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No Absen</th>
                                    <th>Nama</th>
                                    <th>Nisn</th>
                                    <th>Bendahara</th> {{-- Admin Akses --}}
                                    <th>option</th>
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
    <script>
        var table = $('#logo-table').DataTable();
        function sendData(data){
            $("#update").attr("action", "/kelas/perbarui/" + data[0]);
            $("#edit_absen").attr("value", data[1]);
            $("#edit_name").attr("value", data[1]);
            $("#edit_").attr("value", data[1]);
        }
    </script>
@endsection
