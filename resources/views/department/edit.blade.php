@extends('layout.main')
@section('content')
    <div class="container mt-3">
        <h4>Edit Departemen</h4>
        <form class="mt-5" method="POST" action="{{route('departments.update', $department["id"])}}">
            @csrf
            @method("PUT")
            <div class="mb-3">
              <label for="departmentName" class="form-label">Nama Departemen</label>
              <input type="text" name="name" class="form-control" id="departmentName" value="{{$department["name"]}}">
            </div>
            <div class="mb-3">
                <label for="departmentCity" class="form-label">Kota Departemen</label>
                <input type="text" name="city" class="form-control" id="departmentCity" value="{{$department["city"]}}">
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection