@extends('layouts.error')
@section('title' ,'404 - Not Found')
@section('error')
<div class="error-container">
    <div class="error-info">
        <h1>404</h1>
        <p>It seems that the page you are looking for no longer exists.<br>go to <a
                href="/">dashboard</a>.</p>
    </div>
    <div class="error-image"></div>
</div>
@endsection
