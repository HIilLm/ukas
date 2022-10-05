@extends('layout.dashboard')

@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Product</h5>
                            <form action="{{ route('opportunity_reason.update', ['opportunity_reason' => $opreason->id]) }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="reason" class="form-label is-invalid">Reason</label>
                                    <input type="text" name="reason"
                                        class="form-control @error('reason') is-invalid @enderror"
                                        id="reason" aria-describedby="reason"
                                        value="{{ $opreason->reason }}">
                                    @error('product_title')
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
