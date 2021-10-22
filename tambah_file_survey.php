<h2>Survey</h2>
<div class="col">
    <div class="row">
        <div class="col my-2 d-flex flex-row-reverse">
            <a href="index.php?halaman=tambah_survey" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>survey</th>
                        <th class="col-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ambil = $koneksi->query("SELECT * FROM survey"); ?>
                    <?php $no = 1;
                    foreach ($ambil as $pecah) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <?php echo $pecah['survey'] ?>
                            </td>
                            <td>
                                <a href="index.php?halaman=ubah_file_survey&id=<?php echo $pecah['id_survey']; ?>" class="btn btn-warning">Ubah</a>
                                <a href="index.php?halaman=hapus_file_survey&id=<?php echo $pecah['id_survey']; ?>" class="btn-danger btn">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<a href="index.php?halaman=survey" class="btn btn-primary">Back to survey</a>
<?php
if (isset($_POST['save'])) {
    $koneksi->query("INSERT INTO survey (suervey)
			VALUES('$_POST[survey]')");
    echo "<script>alert('Data Tersimpan');</script>";
    echo "<script>location='index.php?halaman=tambah_file_survey';</script>";
}
?>