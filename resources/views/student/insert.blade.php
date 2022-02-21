@extends('layouts.main')

@section('container')
    <form action="/student" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Lengkap">
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="alamat">
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
                    <option value="<?= $cls->id ?>"><?= $cls->nama_kelas_format ?></option>
                <?php } ?>
            </select>
            @error('kelas')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="extra">Ektrakurikuler</label>
            <select name="extra" id="extra" class="form-control @error('extra') is-invalid @enderror">
                <?php
                foreach ($extra as $ex) {
                ?>
                    <option value="<?= $ex->id ?>"><?= $ex->nama_extra_format ?></option>
                <?php } ?>
            </select>
            @error('extra')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <img class="img-preview img-fluid mb-4">
            <input type="file" class="form-control-file" id="foto" name="foto" onchange="previewImage()" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
    </form>
@extends('layouts.preview')
@endsection