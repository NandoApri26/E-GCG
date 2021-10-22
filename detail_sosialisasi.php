
<div class="col-8">
        <!-- Ambil data Sosialisasi -->
        <?php
        $data = $koneksi->query("SELECT * FROM sosialisasi");
        ?>
        <?php foreach ($data as $sosialisasi) :
        ?>
            <div class="row">
                <!-- <?= $sosialisasi['image'] ?> -->
                <img src="foto_sosialisasi/<?= $sosialisasi['image'] ?>" width="800" alt="">
            </div>
            
            <div class="row mb-3">
                <small><?= date('d-M-Y'); ?></small>
                <h4><?= $sosialisasi['judul'] ?></h4>
                <p> <?= $sosialisasi['deskripsi'] ?></p>
            </div>
            <div class="row">
                <div class="container">
                    <hr>
                </div>
            </div>
        <?php endforeach ?>
        <!-- Ambil data Sosialisasi -->
    </div>