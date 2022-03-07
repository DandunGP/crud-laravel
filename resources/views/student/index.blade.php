@extends('layouts.main')

@section('container')
    <a href="/student/add"><button class="btn-success rounded px-5 mb-3">Tambah Data</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kelas</th>
                <th scope="col">Ekstrakurikuler</th>
                <th scope="col">Foto</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $std)
                <tr>
                    <td> {{ $std->id }}</td>
                    <td> {{ $std->nama_format }}</td>
                    <td> {{ $std->alamat_format }}</td>
                    <td> {{ $std->classroom->nama_kelas_format }}</td>
                    <td> {{ $std->extracurricular->nama_extra_format }}</td>
                    <td> <img src="{{ asset('/storage/'. $std->image) }}" style="width:100px;height:75px;"><br>
                        <a href="/student/download/{{$std->slug}}"><button class="btn btn-primary w-50 mt-3">Download</button></a></td>
                    <td><a href="/student/edit/{{ $std->slug }}"><button class="btn btn-primary w-50">Edit</button></a> 
                        <form action="/student/{{ $std->slug }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger w-50 mt-1" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection