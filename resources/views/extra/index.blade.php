@extends('layouts.main')

@section('container')
    <a href="/extra/add"><button class="btn-success rounded px-5 mb-3">Tambah Data</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Extracurricular</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($extra as $ex)
                <tr>
                    <td> {{ $ex->id }}</td>
                    <td> {{ $ex->nama_extra_format }}</td>
                    <td><a href="/extra/edit/{{ $ex->slug }}"><button class="btn btn-primary w-25">Edit</button></a> 
                        <form action="/extra/{{ $ex->slug }}" method="post">
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