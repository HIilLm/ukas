@extends('layouts.dashboard')

@section('content')
    {{-- CREATE MODAL --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kelas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="create_kelas" class="form-label">Nama Kelas</label>
                            <input type="text" required name="nama_kelas" class="form-control"
                                @error('kelas') is-invalid @enderror" id="create_kelas" value="{{ old('kelas') }}">
                            @error('kelas')
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
    {{-- CREATE MODAL --}}

    {{-- EDIT MODAL --}}
    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="update">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="edit_kelas" class="form-label">Nama Kelas</label>
                            <input type="text" required name="nama_kelas" class="form-control"
                                @error('kelas') is-invalid @enderror" id="edit_kelas" value="{{ old('kelas') }}">
                            @error('kelas')
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
    {{-- EDIT MODAL --}}

    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">KELAS</h5>
                        <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModalCenter">Create</a>
                        <table id="logo-table" class="display"
                            style="table-layout:fixed;
                            width:100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>option</th>
                                </tr>
                            </thead>
                            <tbody id="images">
                                @foreach ($kelas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kelas }}</td>
                                        <td style="">
                                            <div class="dropdown dropright">
                                                <button class="btn btn-secondary" type="button" id="dropdownMenuButton"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                                                    <li><a href="{{ route('kelas.show', ['kela' => $item->id]) }}"
                                                            class="dropdown-item text-dark">View</a>
                                                    <li>
                                                        <a class="dropdown-item text-dark" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalCenter1"
                                                            onclick="sendData({{ $item }})"
                                                            style="cursor: pointer">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form id="form-delete{{ $item->id }}"
                                                            action="{{ route('kelas.destroy', ['kela' => $item->id]) }}"
                                                            method="post" style="display: none">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        <a class="dropdown-item text-dark" style="cursor: pointer"
                                                            onclick="what({{ $item->id }})">
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
                                    <th>Kelas</th>
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

        function sendData(data) {
            data = Object.values(data);
            $("#update").attr("action", "/kelas/perbarui/" + data[0]);
            $("#edit_kelas").attr("value", data[1]);
        }
    </script>
@endsection
