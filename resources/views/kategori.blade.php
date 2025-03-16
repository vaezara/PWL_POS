<!DOCTYPE html>
<html>
    <head>
        <title>Data Kategori</title>
    </head>
    <body>
        <h1>Data Kategori</h1>
        <a href="{{ route('kategori.tambah') }}">+ Tambah Kategori</a>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <td>ID</td>
                <td>Kode Kategori</td>
                <td>Nama Kategori</td>
                <td>Aksi</td>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->kategori_id}}</td>
                <td>{{ $d->kategori_kode}}</td>
                <td>{{ $d->kategori_nama}}</td>
                <td><a href="{{ url('/kategori/ubah/' . $d->kategori_id) }}">Ubah</a> |
                    <a href="{{ url('/kategori/hapus/' . $d->kategori_id) }}">Hapus</a>
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
