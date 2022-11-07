@extends('layouts.dashboard')

@section('content')
    {{-- MODAL TAMBAH --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="pengeluaran" class="form-label">Jumlah Pengeluaran</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" min="1" name="pengeluaran" class="form-control"
                                    aria-label="Amount (to the nearest dollar)" @error('pengeluaran') is-invalid @enderror"
                                    id="pengeluaran" value="{{ old('pengeluaran') }}">
                                {{-- <span class="input-group-text">.00</span> --}}
                                @error('bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" id="keterangan" class="form-label is-invalid">Keterangan</label>
                            <textarea type="text" name="keterangan" class="form-control text-white @error('keterangan') is-invalid @enderror"
                                id="keterangan" rows="5">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
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
    {{-- MODAL TAMBAH --}}

    {{-- MODAL EDIT --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="pengeluaran" class="form-label">Jumlah Pengeluaran</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" min="1" name="pengeluaran" class="form-control" value="50000"
                                    aria-label="Amount (to the nearest dollar)" @error('pengeluaran') is-invalid @enderror"
                                    id="pengeluaran" value="{{ old('pengeluaran') }}">
                                {{-- <span class="input-group-text">.00</span> --}}
                                @error('bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" id="keterangan" class="form-label is-invalid">Keterangan</label>
                            <textarea type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan" rows="5">Dekorasi Kelas</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
                        <h5 class="card-title">Pengeluaran Kelas 12 RPL 1</h5>
                        <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Tambah Pengeluaran</a> {{-- Berupa modal --}}
                        <table id="logo-table" class="display"
                            style="table-layout:fixed;
                            width:100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Pengeluaran</th>
                                    <th>Jumlah Pengeluaran</th>
                                    <th>option</th>
                                </tr>
                            </thead>
                            <tbody id="images">
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        Elang Pandi
                                    </td>
                                    <td>Dekorasi Kelas</td>
                                    <td>
                                        {{ date('D - M / Y') }}
                                    </td>
                                    <td>
                                        Rp. 50,000
                                    </td>
                                    <td style="">
                                        <div class="dropdown dropright">
                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item text-dark" style="cursor: pointer" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal2">Edit</a> {{-- Berupa Modal --}}
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
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Pengeluaran</th>
                                    <th>Jumlah Pengeluaran</th>
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
