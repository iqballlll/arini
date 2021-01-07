<div class="table-responsive">
    <table width="100%" class="table table-sm" id="myTable">
        <thead>
            <tr>

                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th width="20%" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($perawat as $value) { ?>
                <tr>
                    <td class="text-center">1</td>

                    <td><?= $value->nama_perawat ?></td>
                    <td><?= $value->jk ?></td>
                    <td><?= $value->alamat ?></td>
                    <td class="text-center">
                        <a onclick="edit(<?= $value->id_perawat; ?>)" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <a onclick="hapus(<?= $value->id_perawat; ?>)" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>