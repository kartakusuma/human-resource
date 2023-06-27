@extends('layout.main')
@section('content')
    <div class="container mt-3">
        <h4>Tambah Departemen</h4>
        <form class="mt-5" method="POST" action="{{route('departments.store')}}">
            @csrf
            <div class="mb-3">
              <label for="departmentName" class="form-label">Nama Departemen</label>
              <input type="text" name="name" class="form-control" id="departmentName">
            </div>
            <div class="mb-3">
                <label for="departmentCity" class="form-label">Kota Departemen</label>
                <input type="text" name="city" class="form-control" id="departmentCity">
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection