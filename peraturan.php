<div class="row">
    <div class="col-8">
        <!-- Ambil data Sosialisasi -->
        <?php
        $data = $koneksi->query("SELECT * FROM peraturan");
        ?>
        <?php foreach ($data as $peraturan) :
        ?>
            <div class="row mb-3">
                <small><?= date('d-M-Y'); ?></small>
                <h4>Peraturan</h4>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <label for=""><?= $peraturan['judul_file'] ?></label>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="/file_peraturan/<?= $peraturan['file'] ?>" download=""><?= $peraturan['file'] ?> </a>
                    </div>
                    <div>
                        <label for=""><?= $peraturan['judul_file'] ?></label>
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
                            <!-- <th>no</th>
                            <th>file</th>
                            <th>Judul</th> -->
                            <!-- <th>Deskripsi</th> -->
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($data as $peraturan) :?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $peraturan['file']?></td>
                        <td><?= $peraturan['judul_file']?></td>
                        <!-- <td><?= $peraturan['judul_file']?></td> -->
                        <td>
                        <a href="index.php?halaman=peraturan&id=<?php echo $peraturan['id']; ?>" class="btn-danger btn">Hapus</a>
                        </td>
                        
                    </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row <?= $pengguna?>">

            <form action="index.php?halaman=peraturan" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="peraturan" class="form-label">Judul File</label>
                    <input type="text" class="form-control" name="judul_file" id="judul_file" placeholder="Masukkan Judul">
                </div>
                <div class="mb-3">
                    <label for="file_peraturan" class="form-label">Pilih File peraturan</label>
                    <input class="form-control" name="file" type="file" id="file_peraturan">
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
    $ekstensi_diperbolehkan = array('pdf');
    $files = $_FILES['file']['name'];
    $x = explode('.', $files);
    $ekstensti = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $lokasi = $_FILES['file']['tmp_name'];

    if (in_array($ekstensti, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 500000) {
            move_uploaded_file($lokasi, "file_peraturan/" . $files);
            $koneksi->query("INSERT INTO peraturan
			(file, judul_file)
			VALUES('$files', '$_POST[judul_file]')");
            if ($save) {
                echo "<script>alert('File berhasil diupload');
                document.location='index.php?halaman=peraturan'</script>";
            } else {
                echo "<script>alert('File berhasil diupload');
                document.location='index.php?halaman=peraturan'</script>";
            }
        } else {
            echo "<script>alert('Ukuran File Terlalu besar, Max 10Mb');
                document.location='index.php?halaman=peraturan'</script>";
        }
    } else {
        echo "<script>alert('Ekstensi yang di upload tidak diperbolehkan');
                document.location='index.php?halaman=peraturan'</script>";
    }
}

if(!empty($_GET['id'])){

	$ambil = $koneksi->query("SELECT * FROM peraturan WHERE id='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
	$files = $pecah['file'];
	if (file_exists("file_peraturan/$files")) {
		unlink("file_peraturan/$files");
	}

    $koneksi->query("DELETE FROM peraturan WHERE id='$_GET[id]'");
    echo "<script>alert('Data Berhasil DIhapus');</script>";
    echo "<script>location='index.php?halaman=peraturan';</script>";
}

?>

