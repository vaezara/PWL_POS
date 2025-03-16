<!DOCTYPE html>
<html>
    <head>
        <title>Data Supplier</title>
    </head>
    <body>
        <h1>Form Ubah Data Supplier</h1>
        <a href="/supplier">Kembali</a>
        <br><br>

        @if ($supplier)
        <form method="post" action="{{ url('/supplier/ubah_simpan/' . $supplier->supplier_id) }}">
            @csrf
            @method('PUT')
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $supplier->nama) }}" required>
            <br>
            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', $supplier->alamat) }}" required>
            <br>
            <label>Telepon</label>
            <input type="text" name="telp" value="{{ old('telp', $supplier->telp) }}" required>
            <br>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $supplier->email) }}" required>
            <br>
            <label>Status</label>
            <select name="status" required>
                <option value="aktif" {{ old('status', $supplier->status) === 'aktif' ? 'selected' : '' }}>aktif</option>
                <option value="nonaktif" {{ old('status', $supplier->status) === 'nonaktif' ? 'selected' : '' }}>nonaktif</option>
            </select>            
            <br><br>
            <input type="submit" value="Ubah">
        </form>
        @else
            <p>Data supplier tidak ditemukan.</p>
        @endif
    </body>
</html>
