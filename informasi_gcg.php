<div class="row">
    <div class="col-8">
        <!-- Ambil data Sosialisasi -->
        <?php
        $data = $koneksi->query("SELECT * FROM informasi_gcg");
        ?>
        <?php foreach ($data as $informasi_gcg) :
        ?>
            <div class="row mb-3">
                <small><?= date('d-M-Y'); ?></small>
                <h4>GCG CODE OF CONDUCT</h4>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <label for=""><?= $informasi_gcg['judul_file'] ?></label>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="/file_informasi_gcg/<?= $informasi_gcg['file'] ?>" download=""><?= $informasi_gcg['file'] ?> </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <hr>
                </div>
            </div>
        <?php endforeach ?>
        <!-- Ambil data informasi_gcg -->
    </div>
    <div class="col-4" width="50">
        <div class="row <?= $pengguna?>">
            <div class="col">
                <table class="table table-bordered <?= $pengguna?>">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>file</th>
                            <th>Judul File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($data as $informasi_gcg) :?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $informasi_gcg['file']?></td>
                        <td><?= $informasi_gcg['judul_file']?></td>
                        <td>
                        <a href="index.php?halaman=hapus_file_informasi_gcg&id=<?php echo $informasi_gcg['id']; ?>" class="btn-danger btn">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row <?= $pengguna?>">

            <form action="index.php?halaman=informasi_gcg" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="informasi_gcg" class="form-label">Judul </label>
                    <input type="text" class="form-control" name="judul_file" id="informasi_gcg" placeholder="Masukkan Judul">
                </div>
                <div class="mb-3">
                    <label for="file_informasi_gcg" class="form-label">Pilih Fili Informasi GCG</label>
                    <input class="form-control" name="file" type="file" id="file_informasi_gcg">
                </div>
                <!-- <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Tambah deskripsi"></textarea>
                </div> -->
                <div>
                    <button type="submit" name="save" class="btn btn-primary">Tambah File</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['save'])) {
    $files = $_FILES['file']['name'];
    $lokasi = $_FILES['file']['tmp_name'];
    $judul = $_POST['judul_file'];
    move_uploaded_file($lokasi, "file_informasi_gcg/" . $files);
    $koneksi->query("INSERT INTO informasi_gcg
			(file, judul_file)
			VALUES('$files', '$judul')");
    echo "<script>alert('Data Tersimpan');</script>";
    echo "<script>location='index.php?halaman=informasi_gcg';</script>";
}
?>