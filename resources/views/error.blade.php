@extends('layout.main')
@section('content')
    <div class="container mt-3">
        <h4>Error :(</h4>
        <div class="mt-5">
            <p class="fs-6">{{$error}}</p>
            <p class="fs-6">{{$status}}</p>
        </div>
    </div>
@endsection