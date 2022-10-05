@extends('layout.dashboard')

@section('content')
    <div class="page-content">
        <div class="main-wrapper">

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                                <h5 class="card-title">Title Page</h5>
                                <form method="POST" action="/admin/home/{{ $home->id }}">
                                @method('put')
                                @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="oppor_title" class="form-label">Title Page</label>
                                                <textarea type="text" name="oppor_title" class="form-control  @error('oppor_title') is-invalid @enderror editable"
                                                    id="oppor_title" rows="5">{!! $home->oppor_title !!}</textarea>
                                                @error('oppor_title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="oppor_color" class="form-label">Background Color</label>
                                                <input type="color" value="{{ $home->oppor_color }}" name="oppor_color" class="form-control form-control-color @error('oppor_color') is-invalid @enderror"
                                                    id="oppor_color" >
                                                @error('oppor_color')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                                    {{-- <a onclick="whatupdate()" class="btn btn-primary">Edit</a> --}}
                                    </form>
                            </div>
                        </div>
                                    <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Opportunity Images</h5>
                            {{-- <a href="{{ route('opportunity_image.create') }}" class="btn btn-primary mb-3">Create</a> --}}
                            <table id="logo-table" class="display"
                                style="table-layout:fixed;
                            width:100%;">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Opportunity Image</th>
                                        <th>option</th>
                                    </tr>
                                </thead>
                                <tbody id="images">
                                    {{-- @dd($op) --}}
                                    @foreach ($op as $p)
                                        <tr>
                                            <td>
                                                {{ $p->index }}
                                            </td>
                                            @if ($p->photo != null)
                                                <td>
                                                    <img onclick="image()" src="{{ asset('storage/' . $p->photo) }}"
                                                        style="height: 100px; width:200px; object-fit:cover">
                                                    {{-- <img onclick="image()" src="{{ asset('storage/' . $pep->mainImage) }}"
                                                    style="height: 100px; width:200px; object-fit:cover"
                                                    class="img-show" alt="{{ $pep->mainImage }}"> --}}
                                                </td>
                                            @else
                                                <td>
                                                    <img onclick="image()" src="{{ asset('/images/no_image.jpg') }}"
                                                        style="height: 100px; width:200px; object-fit:cover"
                                                        class="img-show" alt="{{ $p->photo }}">
                                                </td>
                                            @endif


                                            <td style="">
                                                <div class="dropdown dropright">
                                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                                                        <li><a class="dropdown-item text-dark"
                                                                href="{{ route('opportunity_image.edit', ['opportunity_image' => $p->id]) }}">Edit</a>
                                                        </li>
                                                        @if ($p->photo != null)
                                                            <li>
                                                                <form id="form-delete{{ $p->id }}"
                                                                    action="/admin/opportunity_image/image/{{ $p->id }}"
                                                                    method="post" style="display: none">
                                                                    @csrf
                                                                </form>
                                                                <a class="dropdown-item text-dark"
                                                                    onclick="what({{ $p->id }})">
                                                                    Delete Image
                                                                </a>
                                                            </li>
                                                        @endif

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Index</th>
                                        <th>Opportunity Image</th>
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
