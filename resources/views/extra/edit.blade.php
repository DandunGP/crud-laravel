@extends('layouts.main')

@section('container')
<form action="/extra/{{ $ex->slug }}" method="POST">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" value="{{ $ex->nama_extra_format }}" name="nama" placeholder="Nama">
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-3">Edit</button>
</form>
@endsection