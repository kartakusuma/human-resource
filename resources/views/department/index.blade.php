@extends('layout.main')
@section('content')
    <div class="container mt-3">
        <h4>Departemen</h4>
        <a href="{{ route('departments.create') }}" class="btn btn-success btn-sm mt-5">Tambah</a>
        <table class="table mt-2">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Kota</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($departments as $department)
                <tr>
                    <td>{{$no}}</td>
                    <td><a href="{{ route('departments.show', $department["id"]) }}" class="text-decoration-none text-dark">{{$department["name"]}}</a></td>
                    <td>{{$department["city"]}}</td>
                    <td colspan="3">
                        <div class="btn-group" role="group">
                            <a href="{{ route('departments.edit', $department["id"]) }}" class="btn btn-warning btn-sm mx-2">Edit</a>
                            <form action="{{ route('departments.destroy', $department["id"]) }}" method="POST" class="form-inline">
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