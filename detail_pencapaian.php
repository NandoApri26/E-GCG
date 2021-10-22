
<div class="col-8">
        <!-- Ambil data Sosialisasi -->
        <?php
        $data = $koneksi->query("SELECT * FROM pencapaian");
        ?>
        <?php foreach ($data as $pencapaian) :
        ?>
            <div class="row">
                <!-- <?= $pencapaian['image'] ?> -->
                <img src="foto_pencapaian/<?= $pencapaian['image'] ?>" width="800" alt="">
            </div>
            
            <div class="row mb-3">
                <small><?= date('d-M-Y'); ?></small>
                <h4><?= $pencapaian['judul'] ?></h4>
                <p> <?= $pencapaian['deskripsi'] ?></p>
            </div>
            <div class="row">
                <div class="container">
                    <hr>
                </div>
            </div>
        <?php endforeach ?>
        <!-- Ambil data pencapaian -->
    </div>