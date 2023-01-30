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
                    <form action="{{ route('pengeluaran.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pengeluaran" class="form-label">Jumlah Pengeluaran</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" min="1000" name="pengeluaran"
                                            class="form-control @error('pengeluaran') is-invalid @enderror"
                                            aria-label="Amount (to the nearest dollar)" id="pengeluaran"
                                            value="{{ old('pengeluaran') }}">
                                        {{-- <span class="input-group-text">.00</span> --}}
                                        @error('pengeluaran')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Pengeluaran</label>
                                    <div class="input-group mb-3">
                                        <input type="date" name="tanggal"
                                            class="form-control
                                            @error('tanggal') is-invalid @enderror"
                                            id="tanggal" value="{{ old('tanggal') }}">
                                        {{-- <span class="input-group-text">.00</span> --}}
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" id="keterangan" class="form-label is-invalid">Keterangan</label>
                            <textarea type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan" rows="5"></textarea>
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
                    <form id="update" method="POST">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pengeluaran" class="form-label">Jumlah Pengeluaran</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" min="1000" name="pengeluaran" class="form-control"
                                            aria-label="Amount (to the nearest dollar)"
                                            @error('pengeluaran') is-invalid @enderror" id="edit_pengeluaran"
                                            >
                                        @error('pengeluaran')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Pengeluaran</label>
                                    <div class="input-group mb-3">
                                        <input type="date" name="tanggal" class="form-control"
                                            @error('tanggal') is-invalid @enderror" id="edit_tanggal"
                                            >
                                        {{-- <span class="input-group-text">.00</span> --}}
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" id="keterangan" class="form-label is-invalid">Keterangan</label>
                            <textarea type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                id="edit_keterangan" rows="5"></textarea>
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
                        <h5 class="card-title">Pengeluaran Kelas {{ auth()->user()->kelas->nama_kelas }}</h5>
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
                                @foreach ($pengeluaran as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $item->nama }}
                                        </td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            {{ date('d F Y', strtotime($item->tanggal)) }}
                                        </td>
                                        <td>
                                            Rp. {{ $item->pengeluaran }}
                                        </td>
                                        <td style="">
                                            <div class="dropdown dropright">
                                                <button class="btn btn-secondary" type="button" id="dropdownMenuButton"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item text-dark" style="cursor: pointer"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal2" onclick="sendData({{ $item }})">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form id="form-delete{{ $item->id }}"
                                                            action="{{ route('pengeluaran.destroy', ["pengeluaran" => $item->id]) }}"
                                                            method="post" style="display: none">
                                                            @method("delete")
                                                            @csrf
                                                        </form>
                                                        <a class="dropdown-item text-dark" style="cursor: pointer"
                                                             onclick="what({{ $item->id }})" >
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
    <script>
        var table = $('#logo-table').DataTable({});

        function sendData(data) {
            // console.log(Object.values(data));
            data = Object.values(data);
            $("#update").attr("action", "/pengeluaran/" + data[0]);
            $("#edit_pengeluaran").attr("value", data[4]);
            $("#edit_tanggal").attr("value", data[5]);
            $("#edit_keterangan").val(data[3]);
        }
    </script>
@endsection
