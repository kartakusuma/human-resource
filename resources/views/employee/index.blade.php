@extends('layout.main')
@section('content')
    <div class="container mt-3">
        <h4>Karyawan</h4>
        <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm mt-5">Tambah</a>
        <table class="table mt-2">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Departemen</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($employees as $employee)
                <tr>
                    <td>{{$no}}</td>
                    <td><a href="{{ route('employees.show', $employee["id"]) }}" class="text-decoration-none text-dark">{{$employee["name"]}}</a></td>
                    <td>
                        @foreach ($departments as $department)
                            @if ($department["id"] == $employee["department_id"])
                                {{$department["name"]}}
                            @endif
                        @endforeach
                    </td>
                    <td>{{$employee["phone"]}}</td>
                    <td>{{$employee["email"]}}</td>
                    <td colspan="3">
                        <div class="btn-group" role="group">
                            <a href="{{ route('employees.edit', $employee["id"]) }}" class="btn btn-warning btn-sm mx-2">Edit</a>
                            <form action="{{ route('employees.destroy', $employee["id"]) }}" method="POST" class="form-inline">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-danger btn-sm mx-2" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
            </tbody>
          </table>
    </div>
@endsection