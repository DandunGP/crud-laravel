@extends('layouts.main')

@section('container')
    <form action="/student/{{ $std->slug }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $std->nama_format }}" name="nama" placeholder="Nama">
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ $std->alamat_format }}" name="alamat" placeholder="alamat">
            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror">
                <?php
                foreach ($class as $cls) {
                ?>
                    <option value="<?= $cls->id ?>" <?php if($cls->id == $std->classroom_id){echo 'selected';}?>><?= $cls->nama_kelas ?></option>
                <?php } ?>
            </select>
            @error('kelas')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="extra">Kelas</label>
            <select name="extra" id="extra" class="form-control @error('extra', 'post') is-invalid @enderror">
                <?php
                foreach ($extra as $ex) {
                ?>
                    <option value="<?= $ex->id ?>" <?php if($ex->id == $std->extra_id){echo 'selected';}?>><?= $ex->nama_extra ?></option>
                <?php } ?>
            </select>
            @error('extra')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="hidden" name="oldImage" value="{{ $std->image }}">
            @if($std->image)
                <img src="{{ asset('storage/' . $std->image) }}" class="img-preview d-block mb-4" style="width:200px;height:175px;">
            @else
                <img class="img-preview img-fluid mb-4">
            @endif
            <input type="file" class="form-control-file" id="foto" name="foto" onchange="previewImage()">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Edit</button>
    </form>
@extends('layouts.preview')
@endsection