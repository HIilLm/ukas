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
                    <form action="" method="POST">
                        @csrf
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
                                    <label for="nama" class="form-label">Nama Siswa</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="nama" class="form-control"
                                            @error('nama') is-invalid @enderror" id="nama"
                                            value="{{ old('nama') }}" required>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
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
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="absen" class="form-label">No Absen</label>
                                    <div class="input-group mb-3">
                                        <input type="number" min="1" name="absen" class="form-control"
                                            @error('absen') is-invalid @enderror" id="absen"
                                            value="27">
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
                                    <label for="nama" class="form-label">Nama Siswa</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="nama" class="form-control"
                                            @error('nama') is-invalid @enderror" id="nama"
                                            value="Elang Pandi" required>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN Siswa</label>
                            <div class="input-group mb-3">
                                <input type="number" min="1" name="nisn" class="form-control"
                                    @error('nisn') is-invalid @enderror" id="nisn" value="0009123321">
                                @error('nisn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Kelas 12 RPL 1</h5>
                        <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Tambah Siswa</a> {{-- Berupa modal --}}
                        <table id="logo-table" class="display"
                            style="table-layout:fixed;
                            width:100%;">
                            <thead>
                                <tr>
                                    <th>No Absen</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Tuntas</th> {{-- Admin Akses --}}
                                    <th>option</th>
                                </tr>
                            </thead>
                            <tbody id="images">
                                <tr>
                                    <td>
                                        27
                                    </td>
                                    <td>
                                        Elang Pandi
                                    </td>
                                    <td>0009123321</td>
                                    <td> {{-- Bendahara Akses --}}
                                        --
                                    </td>
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
                                                    {{-- <form id="form-delete{{ $p->id }}"
                                                            action="/admin/opportunity_image/image/{{ $p->id }}"
                                                            method="post" style="display: none">
                                                            @csrf
                                                        </form> --}}
                                                    <a class="dropdown-item text-dark" style="cursor: pointer" {{-- onclick="what({{ $p->id }})" --}}>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No Absen</th>
                                    <th>Nama</th>
                                    <th>Nisn</th>
                                    <th>tuntas</th> {{-- Admin Akses --}}
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
