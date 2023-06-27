@extends('layout.main')
@section('content')
    <div class="container mt-3">
        <h4>Detail Karyawan</h4>
        <div class="mb-3 mt-5">
            <p class="fs-6">
                <strong>Nama</strong>
                <br>
                {{$employee["name"]}}
            </p>
        </div>
        <div class="mb-3">
            <p class="fs-6">
                <strong>Foto</strong>
                <br>
                {{$employee["picture"]}}
            </p>
        </div>
        <div class="mb-3">
            <p class="fs-6">
                <strong>Departemen</strong>
                <br>
                @foreach ($departments as $department)
                    @if ($department["id"] == $employee["department_id"])
                        {{$department["name"]}}
                    @endif
                @endforeach
            </p>
        </div>
        <div class="mb-3 mt-5">
            <p class="fs-6">
                <strong>Jenis kelamin</strong>
                <br>
                {{$employee["sex"]}}
            </p>
        </div>
        <div class="mb-3">
            <p class="fs-6">
                <strong>Umur</strong>
                <br>
                {{$employee["age"]}}
            </p>
        </div>
        <div class="mb-3 mt-5">
            <p class="fs-6">
                <strong>Telepon</strong>
                <br>
                {{$employee["phone"]}}
            </p>
        </div>
        <div class="mb-3">
            <p class="fs-6">
                <strong>Email</strong>
                <br>
                {{$employee["email"]}}
            </p>
        </div>
        <div class="mb-3 mt-5">
            <p class="fs-6">
                <strong>Alamat</strong>
                <br>
                {{$employee["address"]}}
            </p>
        </div>
    </div>
@endsection