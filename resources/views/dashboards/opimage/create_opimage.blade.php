@extends('layout.dashboard')

@section('content')
    <div class="page-content">
        <div class="main-wrapper">

            <div class="row">
                <div class="col">
                    <div class="card">
                            <h5 class="card-title">Create Image </h5>
                            <form action="{{ route('opportunity_image.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="filePhoto" class="form-label">Product Image
                                    </label>
                                    <input class="form-control @error('photo') is-invalid @enderror"
                                        name="photo" type="file" id="filePhoto" accept="image/*"
                                        value="{{ old('photo') }}">
                                    <img id="output" class="mt-3" style="max-height: 200px; max-width: 300px;">
                                    @error('photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
        </script>
    @endsection
