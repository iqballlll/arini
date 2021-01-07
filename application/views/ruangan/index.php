<h2>DATA RUANGAN</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
    Tambah Data
</button>


<div id="tabelRuangan" class="mb-3 mt-2"></div>

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Tambah Data Ruangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add">
                <div class="modal-body">
                    <div class="form-group">

                        <div class="col-xs-8">
                            <label for="">Nama Ruangan</label>
                            <input name="nama_ruangan" id="nama_ruangan" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-8">
                            <label for="">Nomor Ruangan</label>
                            <input name="nomor_ruangan" id="nomor_ruangan" class="form-control" type="text" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Tambah Data Ruangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit">
                <div class="modal-body">
                    <div class="form-group">
                        <input name="id_ruangan" id="id_ruangan" class="form-control" type="hidden">
                        <div class="col-xs-8">
                            <label for="">Nama Ruangan</label>
                            <input name="nama_ruangan" id="nama_ruangan" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-8">
                            <label for="">Nomor Ruangan</label>
                            <input name="nomor_ruangan" id="nomor_ruangan" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Edit -->

<script>
    let form_add;
    let form_edit;
    let modal_add;
    let modal_edit;

    $(function() {
        form_add = $('#form-add');
        modal_add = $('#modalAdd');
        form_edit = $('#form-edit');
        modal_edit = $('#modalEdit');
        tabel_ruangan();

        form_add.on('submit', function(e) {
            e.preventDefault();
            let data_post = $(this).serialize();
            $.ajax({
                url: "<?= base_url('ruangan/save'); ?>",
                dataType: 'json',
                cache: false,
                type: 'post',
                data: data_post,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.pesan + '. ', 'Berhasil', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_ruangan();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Gagal', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_ruangan();
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
                url: "<?= base_url('ruangan/edit'); ?>",
                dataType: 'json',
                cache: false,
                type: 'post',
                data: data_post,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.pesan + '. ', 'Berhasil', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_ruangan();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Gagal', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_ruangan();
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

    function tabel_ruangan() {
        $.ajax({
            url: "<?= base_url('ruangan/get_ruangan'); ?>",
            type: 'GET',
            cache: false,
            success: function(response) {
                $('#modalAdd').modal('hide');
                $('#modalEdit').modal('hide');
                $('#tabelRuangan').html(response);
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

    function edit(id_ruangan) {
        $.ajax({
            url: "<?= base_url('ruangan/get_ruangan_by_id/'); ?>" + id_ruangan,
            type: "GET",
            dataType: "JSON",
            cache: false,
            success: function(response) {
                if (response.status) {
                    form_edit.find("[name='id_ruangan']").val(response.data_ruangan.id_ruangan);
                    form_edit.find("[name='nama_ruangan']").val(response.data_ruangan.nama_ruangan);
                    form_edit.find("[name='nomor_ruangan']").val(response.data_ruangan.nomor_ruangan);

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

    function hapus(id_ruangan) {
        let konfirmasi = confirm('Apakah anda yakin akan menghapus data ini ?');
        if (konfirmasi) {
            $.ajax({
                url: "<?= base_url('ruangan/delete/'); ?>" + id_ruangan,
                type: "GET",
                dataType: "JSON",
                cache: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.pesan + '. ', 'Berhasil', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_ruangan();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Gagal', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tampil_tabel_standar();
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
            })
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