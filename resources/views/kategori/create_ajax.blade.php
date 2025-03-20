<form action="{{ url('/kategori/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form-create-ajax" action="{{ url('/kategori/store_ajax') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Kode Kategori</label>
                        <input type="text" name="kategori_kode" id="kategori_kode" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="kategori_nama" id="kategori_nama" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
<script>
    $(document).ready(function() {
        $("#form-tambah").validate({
            rules: {
                kategori_kode: { required: true, minlength: 3, maxlength: 20 },
                kategori_nama: { required: true, minlength: 3, maxlength: 100 },
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response.status) {
                            $('#tryModal').modal('hide');
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
