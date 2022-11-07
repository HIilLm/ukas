@extends('layouts.error')
@section('title' , '403 - Forbidden')
@section('error')
<div class="error-container">
    <div class="error-info">
        <h1>403</h1>
        <p>Sorry your acces not denied.<br>go to the <a
                href="/">dashboard</a>.</p>
    </div>
    <div class="error-image"></div>
</div>
@endsection
