<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <form action="/student" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama', 'post') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Lengkap">
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control @error('alamat', 'post') is-invalid @enderror" id="alamat" name="alamat" placeholder="alamat">
            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas" class="form-control @error('kelas', 'post') is-invalid @enderror">
                <?php
                foreach ($class as $cls) {
                ?>
                    <option value="<?= $cls->id ?>"><?= $cls->nama_kelas ?></option>
                <?php } ?>
            </select>
            @error('kelas')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="extra">Ektrakurikuler</label>
            <select name="extra" id="extra" class="form-control @error('extra', 'post') is-invalid @enderror">
                <?php
                foreach ($extra as $ex) {
                ?>
                    <option value="<?= $ex->id ?>"><?= $ex->nama_extra ?></option>
                <?php } ?>
            </select>
            @error('extra')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>