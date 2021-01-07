<div class="table-responsive">
    <table width="100%" class="table table-sm" id="myTable">
        <thead>
            <tr>

                <th>No</th>
                <th>Nama Ruangan</th>
                <th>Nomor Ruangan</th>
                <th width="20%" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ruangan as $value) { ?>
                <tr>
                    <td class="text-center">1</td>

                    <td><?= $value->nama_ruangan ?></td>
                    <td><?= $value->nomor_ruangan ?></td>
                    <td class="text-center">
                        <a onclick="edit(<?= $value->id_ruangan; ?>)" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <a onclick="hapus(<?= $value->id_ruangan; ?>)" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>