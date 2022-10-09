@extends('layouts.dashboard')

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Bulan Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="bulan" class="form-label">Bulan</label>
                                    <select name="bulan" class="form-control @error('bulan') is-invalid @enderror"
                                        id="bulan" aria-label="Default select example">
                                        <option selected value="">Pilih Bulan</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                    @error('bulan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="number" min="{{ date('Y') -2 }}"name="tahun"
                                        class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                                        value="{{ old('tahun') }}">
                                    @error('tahun')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="bayar" class="form-label">Pembayaran Perminggu</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" min="1" name="bayar" class="form-control"
                                    aria-label="Amount (to the nearest dollar)" @error('bayar') is-invalid @enderror"
                                    id="bayar" value="{{ old('bayar') }}">
                                {{-- <span class="input-group-text">.00</span> --}}
                                @error('bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col-10">
                    <h2>Uang Kas Kelas 12 RPL 1</h2>
                    <h4 class="mb-3">Pilih Bulan Pembayaran</h4>
                </div>
                <div class="col-2">
                    <a href="" class="btn btn-dark btn-lg" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Tambah Bulan</a> {{-- Hanya Admin/Bendahara,Berupa Modal --}}
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
                            <a href="/detail/bulan" {{-- /detail/februari --}} class="btn btn-primary btn-sm"><i
                                    data-feather="eye"></i></a>
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
