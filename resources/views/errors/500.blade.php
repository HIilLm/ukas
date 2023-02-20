@extends('layouts.error')
@section('title', '500 - Something Went Wrong')
@section('error')
<div class="error-container">
    <div class="error-info">
        <h1>500</h1>
        <p>Ooopss... Something went wrong at our end.<br>Don't worry, it's not you - it's us. <br>Sorry about that. <a href="/">back home?</a></p>
    </div>
    <div class="error-image"></div>
</div>
@endsection
