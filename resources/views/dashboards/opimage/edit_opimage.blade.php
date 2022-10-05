@extends('layout.dashboard')

@section('content')
    <div class="page-content">
        <div class="main-wrapper">

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Opportunity Image</h5>
                            <form action="{{ route('opportunity_image.update', ['opportunity_image' => $opimage->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        mage->photo != null)
                                                <div class="d-grid gap-2 mx-auto">
                                                    <a id="image" class="btn btn-danger mt-2" href="#"
                                                        onclick="delImg({{ $opimage->id }})">Hapus</a>
                                                </div>
                                                @endif --}}
                                            </div>

                                            @error('photo')
                                                <div class="invalid-feedback">
                                              <div class="mb-3">
                                            <label for="filePhoto" class="form-label">Opportunity Image
                                            </label>
                                            <input class="form-control @error('photo') is-invalid @enderror" name="photo"
                                                type="file" id="filePhoto" accept="image/*" value="{{ old('photo') }}">
                                                <div class="col-md-3">
                                            <img id="output" class="mt-3" style="max-height: 200px; max-width: 300px;"
                                                src="{{ asset('storage/' . $opimage->photo) }}">
                                            {{-- @if ($opi      {{ $message }}
                                                </div>
                                            @enderror


                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="no" class="form-label">Index</label>
                                            <input type="text" name="no"
                                                class="form-control @error('no') is-invalid @enderror"
                                                value="{{ $opimage->index }}" id="no" disabled>
                                            @error('no')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script>
            $(function() {
                $("#filePhoto").change(function(event) {
                    var x = URL.createObjectURL(event.target.files[0]);
                    $("#output").attr("src", x);
                    console.log(event);
                });
            });

            $(function() {
                $("#photo").change(function(event) {
                    var x = URL.createObjectURL(event.target.files[0]);
                    $("#out").attr("src", x);
                    console.log(event);
                });
            });
        </script>
    @endsection

    @section('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        <script>
            function hilzam() {
                if ($('#featured').prop('checked') == true) {
                    $('.layout').show();
                } else {
                    $('.layout').hide();
                }
            };
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

            function delImg(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "{{ url('') }}/admin/opportunity_image/image/" + id,
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            }
                        });
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            }
        </script>
    @endsection
