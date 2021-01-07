<h2>DATA JADWAL</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus"></i> Tambah Data</button>

<div id="tabelJadwal" class="mb-3 mt-2"></div>

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Tambah Data Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add">
                    <div class="form-group">
                        <label for="id_perawat">Perawat</label>
                        <select name="id_perawat" id="id_perawat" class="form-control">
                            <option value="">Pilih Perawat</option>
                            <?php foreach ($perawat as $value) { ?>
                                <option value="<?= $value->id_perawat; ?>"><?= $value->nama_perawat; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_ruangan">Ruangan</label>
                        <select name="id_ruangan" id="id_ruangan" class="form-control">
                            <option value="">Pilih Ruangan</option>
                            <?php foreach ($ruangan as $value) { ?>
                                <option value="<?= $value->id_ruangan; ?>"><?= $value->nama_ruangan; ?> No. <?= $value->nomor_ruangan; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <label for="">Tanggal</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" id="datepicker" class="form-control" placeholder="Hari/Bulan/Tahun" aria-label="date" aria-describedby="date" name="date">
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
                    <input name="id_jadwal" id="id_jadwal" class="form-control" type="hidden">
                    <div class="form-group">
                        <label for="id_perawat">Perawat</label>
                        <select name="id_perawat" id="id_perawat" class="form-control">
                            <option value="">Pilih Perawat</option>
                            <?php foreach ($perawat as $value) { ?>
                                <option value="<?= $value->id_perawat; ?>"><?= $value->nama_perawat; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_ruangan">Ruangan</label>
                        <select name="id_ruangan" id="id_ruangan" class="form-control">
                            <option value="">Pilih Ruangan</option>
                            <?php foreach ($ruangan as $value) { ?>
                                <option value="<?= $value->id_ruangan; ?>"><?= $value->nama_ruangan; ?> No. <?= $value->nomor_ruangan; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <label for="">Tanggal</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" id="datepicker" class="form-control" placeholder="Hari/Bulan/Tahun" aria-label="date" aria-describedby="date" name="date">
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
        $("#datepicker").datepicker({
            format: 'dd-mm-yyyy',
            value: new Date(),
        }).on('changeDate', function(e) {
            $("#datepicker").datepicker('hide');
        })

        form_add = $('#form-add');
        form_edit = $('#form-edit');
        modal_add = $('#modalAdd');
        modal_edit = $('#modalEdit');
        tabel_jadwal();

        form_add.on('submit', function(e) {
            e.preventDefault();
            let data_post = $(this).serialize();
            $.ajax({
                url: '<?= base_url('jadwal/save') ?>',
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
                        tabel_jadwal();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Gagal', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_jadwal();
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
                url: '<?= base_url('jadwal/edit') ?>',
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
                        tabel_jadwal();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Gagal', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_jadwal();
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

    function tabel_jadwal() {
        $.ajax({
            url: '<?= base_url('jadwal/get_jadwal') ?>',
            type: 'GET',
            cache: false,
            success: function(response) {
                $('#modalAdd').modal('hide');
                $('#modalEdit').modal('hide');
                $('#tabelJadwal').html(response);
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

    function edit(id_jadwal) {
        $.ajax({
            url: '<?= base_url('jadwal/get_jadwal_by_id/') ?>' + id_jadwal,
            dataType: 'JSON',
            cache: false,
            type: 'GET',
            success: function(response) {
                if (response.status) {
                    form_edit.find("[name='id_jadwal']").val(response.data_jadwal.id_jadwal);
                    form_edit.find("[name='id_perawat']").val(response.data_jadwal.id_perawat);
                    form_edit.find("[name='id_ruangan']").val(response.data_jadwal.id_ruangan);
                    form_edit.find("[name='date']").datepicker({
                        format: 'dd-mm-yyyy'
                    }).val(response.respon_date);

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

    function hapus(id_jadwal) {
        let konfirmasi = confirm('Apakah anda yakin data akan dihapus?');
        if (konfirmasi) {
            $.ajax({
                url: '<?= base_url('jadwal/delete/'); ?>' + id_jadwal,
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
                        tabel_jadwal();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Gagal', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_jadwal();
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