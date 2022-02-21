@extends('layouts.main')

@section('container')
    <form action="/extra" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Extracurricular</label>
            <input type="text" class="form-control  @error('nama', 'post') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Extracurricular">
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
    </form>
@endsection