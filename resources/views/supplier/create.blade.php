@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>
    <div class="card-tools"></div>
    <div class="card-body">
        <form method="POST" action="{{ url('supplier') }}" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Nama</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Alamat</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                    @error('alamat')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Telepon</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="telp" name="telp" value="{{ old('telp') }}" required>
                    @error('telp')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Email</label>
                <div class="col-11">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Status</label>
                <div class="col-11">
                    <select class="form-control" id="status" name="status" required>
                        <option value="">- Semua -</option>
                        <option value="aktif">aktif</option>
                        <option value="nonaktif">nonaktif</option>
                    </select>
                    <small class="form-text text-muted">Status Supplier</small>                    
                    @error('status')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label"></label>
                <div class="col-11">
                    <form method="POST" action="{{ url('supplier') }}" class="form-horizontal">
                        @csrf
                        <!-- Form Fields -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>                    
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
 
@push('css')
@endpush
@push('js')
@endpush
