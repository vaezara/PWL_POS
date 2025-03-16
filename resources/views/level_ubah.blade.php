<!DOCTYPE html>
<html>
    <head>
        <title>Data Level</title>
    </head>
    <body>
        <h1>Form Ubah Data Level</h1>
        <a href="/level">Kembali</a>
        <br><br>
    
        @if ($data)
        <form method="post" action="{{ url('/level/ubah_simpan/' . $data->level_id) }}">
            @csrf
            @method('PUT')
            <label>Kode Level</label>
            <input type="text" name="level_kode" value="{{ $data->level_kode }}" required>
            <br>
            <label>Nama Level</label>
            <input type="text" name="level_nama" value="{{ $data->level_nama }}" required>
            <br><br>
            <input type="submit" value="Ubah">
        </form>
    @else
        <p>Data level tidak ditemukan.</p>
    @endif
    </body>
</html>
