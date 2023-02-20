@extends('layouts.error')
@section('title' , '403 - Forbidden')
@section('error')
<div class="error-container">
    <div class="error-info">
        <h1>403</h1>
        <p>Sorry your acces is denied.<br>go to <a
                href="/">dashboard</a>.</p>
    </div>
    <div class="error-image"></div>
</div>
@endsection
