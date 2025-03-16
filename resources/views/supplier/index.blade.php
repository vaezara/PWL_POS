@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('supplier/create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select class="form-control" id="status" name="status" required>
                                <option value="">- Semua -</option>
                                <option value="aktif">aktif</option>
                                <option value="nonaktif">nonaktif</option>                            
                        </select>
                        <small class="form-text text-muted">Status Supplier</small>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover table-sm" id="table_supplier">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    $(document).ready(function() {
        var dataSupplier = $('#table_supplier').DataTable({
            serverSide: true,
            ajax: {
                "url": "{{ url('supplier/list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    d._token = '{{ csrf_token() }}'; // Tambahkan CSRF token
                    d.status = $('#status').val(); 
                }
            },
            columns: [
                {
                    data: "supplier_id",
                    className: "text-center",
                    orderable: true,
                    searchable: true
                }, {
                    data: "nama",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "alamat",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "telp",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "email",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "status",
                    className: "",
                    orderable: true,
                    searchable: true,
                    render: function(data) {
                        return data;
                    }
                }, {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#status').on('change', function() {
            dataSupplier.ajax.reload();
        });

    });
</script>
@endpush
