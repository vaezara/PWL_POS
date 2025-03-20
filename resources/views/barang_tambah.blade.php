 <!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Barang</title>
</head>
<body>
    <h1>Form Tambah Data Barang</h1>

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('barang.store') }}">
        {{ csrf_field() }}

        <label>Kode Barang</label>
        <input type="text" name="barang_kode" placeholder="Masukkan Kode Barang" required>
        <br>
 
        <label>Nama Barang</label>
        <input type="text" name="barang_nama" placeholder="Masukkan Nama Barang" required>
        <br>

        <label>Kategori</label>
        <select name="kategori_id" required>
            <option value="">- Pilih Kategori -</option>
            @foreach ($kategori as $k)
                <option value="{{ $k->kategori_id }}">{{ $k->kategori_nama }}</option>
            @endforeach
        </select>
        <br>

        <label>Harga Beli</label>
        <input type="number" name="harga_beli" placeholder="Masukkan Harga Beli" required>
        <br>

        <label>Harga Jual</label>
        <input type="number" name="harga_jual" placeholder="Masukkan Harga Jual" required>
        <br>

        <input type="submit" class="btn btn-success" value="Simpan">
    </form>
</body>
</html>
