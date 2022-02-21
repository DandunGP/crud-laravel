@extends('layouts.main')

@section('container')
    <a href="/classroom/add"><button class="btn-success rounded px-5 mb-3">Tambah Data</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($class as $cls)
                <tr>
                    <td> {{ $cls->id }}</td>
                    <td> {{ $cls->nama_kelas_format }}</td>
                    <td><a href="/classroom/edit/{{ $cls->slug }}"><button class="btn btn-primary w-25">Edit</button></a> 
                        <form action="/classroom/{{ $cls->slug }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger w-25 mt-1" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection