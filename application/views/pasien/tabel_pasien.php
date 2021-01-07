<div class="table-responsive">
    <table width="100%" class="table table-sm" id="myTable">
        <thead>
            <tr>

                <th>No</th>
                <th>Nama Pasien</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Penyakit</th>
                <th width="20%" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pasien as $value) {
                $no = 1;
                $originalDate = $value->tgl_lahir;
                $newDate = date("d-m-Y", strtotime($originalDate));
            ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $value->nama_pasien ?></td>
                    <td><?= $value->tempat_lahir ?></td>
                    <td><?= $newDate ?></td>
                    <td><?= $value->jk ?></td>
                    <td><?= $value->umur ?></td>
                    <td><?= $value->penyakit ?></td>
                    <td class="text-center">
                        <a onclick="edit(<?= $value->id_pasien; ?>)" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <a onclick="hapus(<?= $value->id_pasien; ?>)" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>