<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Kategori</title>
</head>
<body>
    <h1>Form Tambah Data Kategori</h1>

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('kategori.tambah_simpan') }}">
        {{ csrf_field() }}

        <label>Kode Kategori</label>
        <input type="text" name="kategori_kode" placeholder="Masukkan Kode Kategori" required>
        <br>

        <label>Nama Kategori</label>
        <input type="text" name="kategori_nama" placeholder="Masukkan Nama Kategori" required>
        <br><br>

        <input type="submit" class="btn btn-success" value="Simpan">
    </form>
</body>
</html>
