@extends('layouts.dashboard')

@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col-10">
                    <h2>Uang Kas</h2>
                    <h4 class="mb-3">Pilih Bulan Pembayaran</h4>
                </div>
                <div class="col-2">
                    <a href="" class="btn btn-dark btn-lg">Tambah Bulan</a>
                    {{-- <a href="" class="btn btn-primary mb-3">Create</a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Oktober</h5>
                            <h6 class="card-subtitle mb-2 text-muted">2022</h6>
                            <p class="card-text">Rp. 5,000 / minggu
                                <br>
                                Total Uang Kas Bulan Ini:
                                <p class="btn btn-warning">
                                    Rp. 45,000
                                </p>
                                <br>
                                <a type="button" class="btn btn-primary btn-sm"><i data-feather="eye"></i></a>
                                    <span><a type="button" class="btn btn-danger btn-sm"><i data-feather="trash-2"></i></a></span>
                            </p>
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
