<!DOCTYPE html>
<html>
    <head>
        <title>Data Barang</title>
    </head>
    <body>
        <h1>Data Barang</h1>
        <a href="{{ route('barang.tambah') }}">+ Tambah Barang</a>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <td>ID Barang</td>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Kategori</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Stok</td>
                <td>Aksi</td>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->barang_id }}</td>
                <td>{{ $d->barang_kode }}</td>
                <td>{{ $d->barang_nama }}</td>
                <td>{{ $d->kategori->kategori_nama }}</td>
                <td>{{ number_format($d->harga_beli, 0, ',', '.') }}</td>
                <td>{{ number_format($d->harga_jual, 0, ',', '.') }}</td>
                <td>{{ $d->stok }}</td>
                <td>
                    <a href="{{ url('/barang/ubah/' . $d->barang_id) }}">Ubah</a> |
                    <a href="{{ url('/barang/hapus/' . $d->barang_id) }}">Hapus</a>
                </td>
            </tr> 
            @endforeach
        </table>

        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif
    </body>
</html>
