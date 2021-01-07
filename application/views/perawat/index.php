<h2>DATA PERAWAT</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus"></i> Tambah Data</button>

<div id="tabelPerawat" class="mb-3 mt-2"></div>

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Tambah Data Perawat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add">
                    <div class="form-group">
                        <label for="nama_perawat">Nama Perawat</label>
                        <input type="text" class="form-control" id="nama_perawat" name="nama_perawat" aria-describedby="nama_perawat">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="4" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End Modal Add -->

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit Data Perawat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit">
                    <div class="form-group">
                        <label for="nama_perawat">Nama Perawat</label>
                        <input name="id_perawat" id="id_perawat" class="form-control" type="hidden">
                        <input type="text" class="form-control" id="nama_perawat" name="nama_perawat" aria-describedby="nama_perawat">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="4" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End Modal Add -->

<script>
    let form_add;
    let form_edit;
    let modal_add;
    let modal_edit;
    $(function() {
        form_add = $('#form-add');
        form_edit = $('#form-edit');
        modal_add = $('#modalAdd');
        modal_edit = $('#modalEdit');
        tabel_perawat();

        form_add.on('submit', function(e) {
            e.preventDefault();
            let data_post = $(this).serialize();
            $.ajax({
                url: '<?= base_url('perawat/save') ?>',
                data: data_post,
                cache: false,
                type: 'post',
                dataType: 'JSON',
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.pesan + '. ', 'Berhasil', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_perawat();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Gagal', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_perawat();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.error(errorThrown + '. ' + textStatus + ' ' + jqXHR.status + '. ', 'Informasi', {
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut",
                        "closeButton": true,
                        timeOut: 2000
                    });
                }
            });
        });


        form_edit.on('submit', function(e) {
            e.preventDefault();
            let data_post = $(this).serialize();
            $.ajax({
                url: '<?= base_url('perawat/edit') ?>',
                data: data_post,
                cache: false,
                type: 'post',
                dataType: 'JSON',
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.pesan + '. ', 'Berhasil', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_perawat();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Gagal', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_perawat();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.error(errorThrown + '. ' + textStatus + ' ' + jqXHR.status + '. ', 'Informasi', {
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut",
                        "closeButton": true,
                        timeOut: 2000
                    });
                }
            });
        });


    });

    function tabel_perawat() {
        $.ajax({
            url: '<?= base_url('perawat/get_perawat') ?>',
            type: 'GET',
            cache: false,
            success: function(response) {
                $('#modalAdd').modal('hide');
                $('#modalEdit').modal('hide');
                $('#tabelPerawat').html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error(errorThrown + '. ' + textStatus + ' ' + jqXHR.status + '. ', 'Informasi', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    "closeButton": true,
                    timeOut: 2000
                });
            }

        });
    }

    function edit(id_perawat) {
        $.ajax({
            url: '<?= base_url('perawat/get_perawat_by_id/') ?>' + id_perawat,
            dataType: 'JSON',
            cache: false,
            type: 'GET',
            success: function(response) {
                if (response.status) {
                    form_edit.find("[name='id_perawat']").val(response.data_perawat.id_perawat);
                    form_edit.find("[name='nama_perawat']").val(response.data_perawat.nama_perawat);
                    form_edit.find("[name='jk']").val(response.data_perawat.jk);
                    form_edit.find("[name='alamat']").val(response.data_perawat.alamat);

                    modal_edit.modal('show');
                } else {
                    toastr.warning(response.pesan + '. ', 'Gagal', {
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut",
                        "closeButton": true,
                        timeOut: 2000
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error(errorThrown + '. ' + textStatus + ' ' + jqXHR.status + '. ', 'Informasi', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    "closeButton": true,
                    timeOut: 2000
                });
            }
        });
    }

    function hapus(id_perawat) {
        let konfirmasi = confirm('Apakah anda yakin data akan dihapus?');
        if (konfirmasi) {
            $.ajax({
                url: '<?= base_url('perawat/delete/'); ?>' + id_perawat,
                dataType: 'JSON',
                type: 'GET',
                cache: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.pesan + '. ', 'Berhasil', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_perawat();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Gagal', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_perawat();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.warning(errorThrown + '. ' + textStatus + ' ' + jqXHR.status + '. ', 'Informasi', {
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut",
                        "closeButton": true,
                        timeOut: 2000
                    });
                }
            });
        } else {
            toastr.warning('Hapus data tidak jadi.', 'Informasi', {
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                "closeButton": true,
                timeOut: 2000
            });
        }
    }
</script>