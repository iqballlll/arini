<h2>DATA PASIEN</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus"></i> Tambah Data</button>

<div id="tabelPasien" class="mb-3 mt-2"></div>

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Tambah Data Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add">
                    <div class="form-group">
                        <label for="nama_pasien">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" aria-describedby="nama_pasien">
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" aria-describedby="tempat_lahir">
                    </div>
                    <label for="">Tanggal Lahir</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" id="datepicker" class="form-control" placeholder="Hari/Bulan/Tahun" aria-label="tgl_lahir" aria-describedby="tgl_lahir" name="tgl_lahir">
                    </div>

                    <div class="form-group">
                        <label for="Jenis Kelamin">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Umur">Umur</label>
                        <input type="text" class="form-control" id="umur" name="umur" aria-describedby="nama_perawat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Penyakit</label>
                        <input type="text" class="form-control" id="penyakit" name="penyakit" aria-describedby="penyakit">
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
                <h5 class="modal-title" id="modalEditLabel">Edit Data Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_pasien" name="id_pasien" aria-describedby="id_pasien">

                        <label for="nama_pasien">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" aria-describedby="nama_pasien">
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" aria-describedby="tempat_lahir">
                    </div>
                    <label for="">Tanggal Lahir</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" id="datepicker" class="form-control" placeholder="Hari/Bulan/Tahun" aria-label="tgl_lahir" aria-describedby="tgl_lahir" name="tgl_lahir">
                    </div>

                    <div class="form-group">
                        <label for="Jenis Kelamin">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Umur">Umur</label>
                        <input type="text" class="form-control" id="umur" name="umur" aria-describedby="umur">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Penyakit</label>
                        <input type="text" class="form-control" id="penyakit" name="penyakit" aria-describedby="penyakit">
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
    let modal_add;
    let form_edit;
    let modal_edit;

    $(function() {
        $("#datepicker").datepicker({
            format: 'dd-mm-yyyy',
            value: new Date(),
        }).on('changeDate', function(e) {
            $("#datepicker").datepicker('hide');
        })

        form_add = $('#form-add');
        modal_add = $('#modalAdd');
        form_edit = $('#form-edit');
        modal_edit = $('#modalEdit');

        tabel_pasien();

        form_add.on('submit', function(e) {
            e.preventDefault();
            let data_post = $(this).serialize();
            $.ajax({
                url: '<?= base_url('pasien/save'); ?>',
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                data: data_post,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.pesan + '. ', 'Berhasil', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_pasien();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Gagal', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_pasien();
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
        })

        form_edit.on('submit', function(e) {
            e.preventDefault();
            let data_post = $(this).serialize();
            $.ajax({
                url: '<?= base_url('pasien/edit') ?>',
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
                        tabel_pasien();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Gagal', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_pasien();
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

    function tabel_pasien() {
        $.ajax({
            url: '<?= base_url('pasien/get_data'); ?>',
            cache: false,
            type: 'GET',
            success: function(response) {
                $('#modalAdd').modal('hide');
                $('#modalEdit').modal('hide');
                $('#tabelPasien').html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error(errorThrown + '. ' + textStatus + ' ' + jqXHR.status + '. ', 'Informasi', {
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    "closeButton": true,
                    timeOut: 2000
                });
            }
        })
    }

    function edit(id_pasien) {
        $.ajax({
            url: '<?= base_url('pasien/get_pasien_by_id/') ?>' + id_pasien,
            dataType: 'JSON',
            cache: false,
            type: 'GET',
            success: function(response) {
                if (response.status) {
                    form_edit.find("[name='id_pasien']").val(response.data_pasien.id_pasien);
                    form_edit.find("[name='nama_pasien']").val(response.data_pasien.nama_pasien);
                    form_edit.find("[name='tempat_lahir']").val(response.data_pasien.tempat_lahir);
                    form_edit.find("[name='tgl_lahir']").datepicker({
                        format: 'dd-mm-yyyy'
                    }).val(response.respon_tgl);
                    form_edit.find("[name='jk']").val(response.data_pasien.jk);
                    form_edit.find("[name='umur']").val(response.data_pasien.umur);
                    form_edit.find("[name='penyakit']").val(response.data_pasien.penyakit);

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


    function hapus(id_pasien) {
        let konfirmasi = confirm('Apakah anda yakin akan menghapus data ?');
        if (konfirmasi) {
            $.ajax({
                url: '<?= base_url('pasien/delete/'); ?>' + id_pasien,
                type: 'GET',
                cache: false,
                dataType: 'JSON',
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.pesan + '. ', 'Berhasil', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_pasien();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Gagal', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "closeButton": true,
                            timeOut: 2000
                        });
                        tabel_pasien();
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