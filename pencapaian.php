<div class="row">
    <div class="col-8">
        <!-- Ambil data Sosialisasi -->
        <?php
        $data = $koneksi->query("SELECT * FROM pencapaian");
        ?>
        <?php foreach ($data as $pencapaian) :
        ?>
            <style>
                .st{
                    text-align: left;
                }
            
            
            
            </style>
            <div class="card" style="width: 18rem;">
                <img src="foto_pencapaian/<?= $pencapaian['image']?>" class="card-img-top" alt="foto_pencapaian<?= $pencapaian['image']?>">
                <small class="container"><?= date('d-M-Y'); ?></small>
                <div class="card-body st">
                    <h class="card-title"><a href="index.php?halaman=detail_pencapaian" class="text-primary"><?= $pencapaian['judul']?></a></h>
                    </div>
            </div>
            
            <div class="row">
                <div class="container">
                    <hr>
                </div>
            </div>
        <?php endforeach ?>
        <!-- Ambil data pencapaian -->
        <!-- Awal Pagination -->
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
            <!-- Akhir Pagination -->
    </div>
    




    <div class="col-4" width="50">
        <div class="row <?= $pengguna ?>">

            <form action="index.php?halaman=pencapaian" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="pencapaian" class="form-label">Judul Pencapaian</label>
                    <input type="text" class="form-control" name="judul" id="pencapaian" placeholder="Masukkan Judul">
                </div>
                <div class="mb-3">
                    <label for="image_pencapaian" class="form-label">Pilih Gambar Pencapaian</label>
                    <input class="form-control" name="image" type="file" id="image_pencapaian">
                </div>
                <!-- <div class="mb-3">
                    <label for="sub_deskripsi" class="form-label">Sub Deskripsi</label>
                    <input class="form-control" name="sub_deskripsi" id="sub_deskripsi" placeholder="Tambah sub deskripsi">
                </div> -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Tambah deskripsi"></textarea>
                </div>
                <div>
                    <button type="submit" name="save" class="btn btn-primary">Tambah File</button>
                </div>
            </form>
            <?php
            // $tipefile = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            //     if($_FILES['image']['size'] > 100000){
            //         echo "File terlalu besar";
            //     }elseif ($tipefile !="jpg, png, gif, jpeg"){
            //         echo "Hanya bisa upload jenis file JPG, PNG, GIF atau JPEG";
            //     }else {
            //         move_uploaded_file($_FILES['image']['temp_name'],"foto_pencapaian/".$_FILES['image']['name']);
            //     }
            ?>
        </div>
    </div>
</div>
<?php
if (isset($_POST['save'])) {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'png', 'jpeg');
    $images = $_FILES['image']['name'];
    $x = explode('.', $images);
    $ekstensti = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $lokasi = $_FILES['image']['tmp_name'];

    if (in_array($ekstensti, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 5000000) {
            move_uploaded_file($lokasi, "foto_pencapaian/" . $images);
            $koneksi->query("INSERT INTO pencapaian
			(judul, image, deskripsi)
			VALUES('$_POST[judul]', '$images', '$_POST[deskripsi]')");
            if ($save) {
                echo "<script>alert('File berhasil diupload');
                document.location='index.php?halaman=pencapaian'</script>";
            } else {
                echo "<script>alert('File berhasil diupload');
                document.location='index.php?halaman=pencapaian'</script>";
            }
        } else {
            echo "<script>alert('Ukuran File Terlalu besar, Max 10Mb');
                document.location='index.php?halaman=pencapaian'</script>";
        }
    } else {
        echo "<script>alert('Ekstensi yang di upload tidak diperbolehkan');
                document.location='index.php?halaman=pencapaian'</script>";
    }






    // echo "<script>alert('Data Tersimpan');</script>";
    // echo "<script>location='index.php?halaman=tambah_file_pencapaian';</script>";
}
?>