<div class="table-responsive">
    <table width="100%" class="table table-sm" id="myTable">
        <thead>
            <tr>

                <th>No</th>
                <th>Nama Perawat</th>
                <th>Ruangan</th>
                <th>Tanggal</th>
                <th width="20%" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jadwal as $value) {
                $no = 1;
                $originalDate = $value->date;
                $newDate = date("d-m-Y", strtotime($originalDate)); ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>

                    <td>
                        <?= $value->nama_perawat ?>
                    </td>
                    <td>
                        <?= $value->nama_ruangan ?> No. <?= $value->nomor_ruangan ?>
                    </td>
                    <td>
                        <?= $newDate ?>
                    </td>
                    <td class="text-center">
                        <a onclick="edit(<?= $value->id_jadwal; ?>)" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <a onclick="hapus(<?= $value->id_jadwal; ?>)" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>