<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Supplier</title>
</head>
<body>
    <h1>Form Tambah Data Supplier</h1>

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('supplier.tambah_simpan') }}">
        {{ csrf_field() }}

        <label>Nama Supplier</label>
        <input type="text" name="nama" placeholder="Masukan Nama Supplier" required>
        <br>

        <label>Alamat</label>
        <input type="text" name="alamat" placeholder="Masukan Alamat" required>
        <br>

        <label>Telepon</label>
        <input type="text" name="telp" placeholder="Masukan Nomor Telepon" required>
        <br>

        <label>Email</label>
        <input type="email" name="email" placeholder="Masukan Email" required>
        <br>

        <label>Status</label>
        <select name="status" required>
            <option value="aktif">aktif</option>
            <option value="nonaktif">nonaktif</option>
        </select>
        <br><br>

        <input type="submit" class="btn btn-success" value="Simpan">
    </form>
</body>
</html>
