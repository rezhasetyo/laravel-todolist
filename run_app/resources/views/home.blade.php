@extends('template/master')

@section('content')
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
    }
</style>

<img src="{{ asset('Asset/home.jpg') }}" class="center">
@endsection