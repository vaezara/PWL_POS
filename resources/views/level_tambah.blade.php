<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Level</title>
</head>
<body>
    <h1>Form Tambah Data Level</h1>

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('level.tambah_simpan') }}">
        {{ csrf_field() }}

        <label>Kode Level</label>
        <input type="text" name="level_kode" placeholder="Masukkan Kode Level" required>
        <br>

        <label>Nama Level</label>
        <input type="text" name="level_nama" placeholder="Masukkan Nama Level" required>
        <br><br>

        <input type="submit" class="btn btn-success" value="Simpan">
    </form>
</body>
</html>
