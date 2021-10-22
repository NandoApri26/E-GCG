<h2>Code Of Conduct</h2>
<div class="col">
    <div class="row">
        <div class="col my-2 d-flex flex-row-reverse">
            <a href="index.php?halaman=tambah_coc" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pernyataan Atasan User</th>
                        <th>Pernyataan User</th>
                        <th class="col-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ambil = $koneksi->query("SELECT * FROM coc"); ?>
                    <?php $no = 1;
                    foreach ($ambil as $pecah) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <?php echo $pecah['pernyataan_auser'] ?>
                            </td>
                            <td>
                                <?php echo $pecah['pernyataan_user'] ?>
                            </td>
                            <td>
                                <a href="index.php?halaman=ubah_file_coc&id=<?php echo $pecah['id_coc']; ?>" class="btn btn-warning">Ubah</a>
                                <a href="index.php?halaman=hapus_file_coc&id=<?php echo $pecah['id_coc']; ?>" class="btn-danger btn">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<a href="index.php?halaman=coc" class="btn btn-primary">Back to coc</a>
<?php
if (isset($_POST['save'])) {
    $koneksi->query("INSERT INTO coc (pernyataan_auser, pernyataan_user)
			VALUES('$_POST[coc]', '$_POST[coc]')");
    echo "<script>alert('Data Tersimpan');</script>";
    echo "<script>location='index.php?halaman=tambah_file_coc';</script>";
}
?>