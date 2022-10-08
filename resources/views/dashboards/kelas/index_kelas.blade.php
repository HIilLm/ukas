@extends('layouts.dashboard')

@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">KELAS</h5>
                        <a href="" class="btn btn-primary mb-3">Create</a>
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
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        12 RPL 1
                                    </td>
                                    <td style="">
                                        <div class="dropdown dropright">
                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item text-dark">View</a>
                                                <li><a class="dropdown-item text-dark">Edit</a>
                                                </li>
                                                    <li>
                                                        {{-- <form id="form-delete{{ $p->id }}"
                                                            action="/admin/opportunity_image/image/{{ $p->id }}"
                                                            method="post" style="display: none">
                                                            @csrf
                                                        </form> --}}
                                                        <a class="dropdown-item text-dark"
                                                            {{-- onclick="what({{ $p->id }})" --}}
                                                            >
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
