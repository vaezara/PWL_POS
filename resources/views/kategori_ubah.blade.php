<!DOCTYPE html>
<html>
    <head>
        <title>Data Kategori</title>
    </head>
    <body>
        <h1>Form Ubah Data Kategori</h1>
        <a href="/kategori">Kembali</a>
        <br><br>
    
        @if ($data)
        <form method="post" action="{{ url('/kategori/ubah_simpan/' . $data->kategori_id) }}">
            @csrf
            @method('PUT')
            <label>Kode Kategori</label>
            <input type="text" name="kategori_kode" value="{{ $data->kategori_kode }}" required>
            <br>
            <label>Nama Kategori</label>
            <input type="text" name="kategori_nama" value="{{ $data->kategori_nama }}" required>
            <br><br>
            <input type="submit" value="Ubah">
        </form>
    @else
        <p>Data kategori tidak ditemukan.</p>
    @endif
    </body>
</html>
