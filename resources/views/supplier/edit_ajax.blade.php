@empty($supplier)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('/supplier') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <form action="{{ url('/supplier/' . $supplier->supplier_id . '/update_ajax') }}" method="POST" id="form-edit">
        @csrf
        @method('PUT')

        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input value="{{ $supplier->nama }}" type="text" name="nama" id="nama" class="form-control" required>
                        <small id="error-nama" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Alamat Supplier</label>
                        <input value="{{ $supplier->alamat }}" type="text" name="alamat" id="alamat" class="form-control" required>
                        <small id="error-alamat" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Telepon Supplier</label>
                        <input value="{{ $supplier->telp }}" type="text" name="telp" id="telp" class="form-control" required>
                        <small id="error-telp" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Email Supplier</label>
                        <input value="{{ $supplier->email }}" type="email" name="email" id="email" class="form-control" required>
                        <small id="error-email" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Status Supplier</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="aktif" {{ $supplier->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ $supplier->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                        <small id="error-status" class="error-text form-text text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Script Ajax -->
    <script>
        $(document).ready(function() {
            $("#form-edit").validate({
                rules: {
                    nama: { required: true, minlength: 3, maxlength: 100 },
                    alamat: { required: true, minlength: 3, maxlength: 255 },
                    telp: { required: true, minlength: 5, maxlength: 15 },
                    email: { required: true, email: true, maxlength: 100 },
                    status: { required: true }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.status) {
                                $('#modal-master').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                dataTable.ajax.reload();
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: response.message
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: 'Gagal memperbarui data supplier!'
                            });
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endempty
