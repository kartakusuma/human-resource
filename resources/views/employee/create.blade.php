@extends('layout.main')
@section('content')
    <div class="container mt-3">
        <h4>Tambah Karyawan</h4>
        <form class="mt-5" method="POST" action="{{route('employees.store')}}">
            @csrf
            <div class="mb-3">
              <label for="employeeName" class="form-label">Nama</label>
              <input type="text" name="name" class="form-control" id="employeeName">
            </div>
            <div class="mb-3">
              <label for="employeeDepartment" class="form-label">Departemen</label>
              <select name="department_id" class="form-control" id="employeeDepartment">
                @foreach ($departments as $department)
                    <option value="{{$department['id']}}">{{$department['name']}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="employeeAge" class="form-label">Umur</label>
              <input type="number" name="age" class="form-control" id="employeeAge">
            </div>
            <div class="mb-3">
              <label for="employeeSex" class="form-label">Jenis kelamin</label>
              <select name="sex" class="form-control" id="employeeSex">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="mb-3">
                <label for="employeePhone" class="form-label">Telepon</label>
                <input type="tel" name="phone" class="form-control" id="employeePhone">
            </div>
            <div class="mb-3">
                <label for="employeeEmail" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="employeeEmail">
            </div>
            <div class="mb-3">
              <label for="employeePicture" class="form-label">Foto</label>
              <input type="file" name="picture" class="form-control" id="employeePicture">
            </div>
            <div class="mb-3">
                <label for="employeeAddress" class="form-label">Alamat</label>
                <textarea name="address" class="form-control" id="employeeAddress"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection