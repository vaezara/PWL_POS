<!DOCTYPE html>
<html>
    <head>
        <title>Data Barang</title>
    </head>
    <body>
        <h1>Form Ubah Data Barang</h1>
        <a href="/barang">Kembali</a>
        <br><br>
    
        @if ($data)
        <form method="post" action="{{ url('/barang/ubah_simpan/' . $data->barang_id) }}">
            @csrf
            @method('PUT')
            <label>Kode Barang</label>
            <input type="text" name="barang_kode" value="{{ $data->barang_kode }}" required>
            <br>
            <label>Nama Barang</label>
            <input type="text" name="barang_nama" value="{{ $data->barang_nama }}" required>
            <br>
            <label>Kategori</label>
            <select name="kategori_id" required>
                <option value="">- Pilih Kategori -</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->ka
