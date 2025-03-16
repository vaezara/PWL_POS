<!DOCTYPE html>
<html>
    <head>
        <title>Data Level</title>
    </head>
    <body>
        <h1>Data Level</h1>
        <a href="{{ route('level.tambah') }}">+ Tambah Level</a>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <td>ID Level</td>
                <td>Kode Level</td>
                <td>Nama Level</td>
                <td>Aksi</td>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->level_id }}</td>
                <td>{{ $d->level_kode }}</td>
                <td>{{ $d->level_nama }}</td>
                <td>
                    <a href="{{ url('/level/ubah/' . $d->level_id) }}">Ubah</a> |
                    <a href="{{ url('/level/hapus/' . $d->level_id) }}">Hapus</a>
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
