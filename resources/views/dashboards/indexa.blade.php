@extends('layouts.dashboard')

@section('content')
    <div class="page-content">
        <div class="main-wrapper">

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="/admin" method="POST"id="admin-pass">
                                @method("Put")
                                @csrf
                                <h4>ELang Pandi</h4>
                                <h6>NISN : 0009123321</h6>
                                <div class="divider"></div>
                                <input type="hidden"
                                {{-- value="{{ auth()->user()->id }}" --}}
                                name="id">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Password Lama</label>
                                    <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" id="email"
                                    {{-- value="{{ auth()->user()->email }}" --}}
                                    >
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="admin" class="form-label">New Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" id="admin">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <a class="btn btn-primary"
                                {{-- onclick="change({{ auth()->user()->id }})" --}}
                                >Update</a>
                            </form>
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

            table.on('row-reordered', function(e, diff, edit) {
                setTimeout(() => {
                    var obj_id = table.column(1).data().toArray();
                    console.log(obj_id);
                    $.ajax({
                        type: "post",
                        url: "{{ url('') }}/admin/project/position",
                        dataType: "json",
                        data: {
                            id: obj_id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });
                }, 2000);
            });
        </script>
    @endsection
