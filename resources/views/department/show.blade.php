@extends('layout.main')
@section('content')
    <div class="container mt-3">
        <h4>Detail Departemen</h4>
        <div class="mb-3 mt-5">
            <p class="fs-6">
                <strong>Nama Departemen</strong>
                <br>
                {{$department["name"]}}
            </p>
        </div>
        <div class="mb-3">
            <p class="fs-6">
                <strong>Kota Departemen</strong>
                <br>
                {{$department["city"]}}
            </p>
        </div>
    </div>
@endsection