<?php
if (isset($_POST['save'])) {
    $id_coc = $_POST['id_coc'];
    for ($i = "tidak_setuju"; $i < count($id_coc); $i++) {
        $id = $_POST['id_coc'][$i];
        $nip_admin = $_POST['nip_admin'];
        $setuju = $koneksi->query("SELECT * FROM coc WHERE id_coc='$id'");
        $setuju = $setuju->fetch_assoc();

        if (!empty($_POST['setuju' . $i])) {
            if ($setuju['setuju'] == $_POST['setuju' . $i]) {
                $nilai = 'setuju';
            } elseif ($setuju['setuju'] == ' ') {
                $nilai = 'Tidak setuju';
            } else {
                $nilai = 'Tidak setuju';
            }
        } else {
            $nilai = 'Tidak setuju';
        }
        $koneksi->query("INSERT INTO hasil_coc (nip_admin, id_coc, nilai) VALUES ('$nip_admin', '$id', '$nilai')");
    }
    echo "<script>alert('Data Tersimpan');</script>";
    echo "<script>location='index.php?halaman=coc';</script>";
}
?>

<!-- <div class="row text-center mb-3 mt-5">
    <H4><b> LEMBAR PERSETUJUAN </H4></b>
</div> -->

<div class="row text-center mb-3 mt-5 ">

    <h5 class="<?= $atasan_user ?>"><b>
            <p>LEMBAR PERNYATAAN KEPATUHAN<br>
                CODE OF CONDUCT PT BUKIT ASAM Tbk</h5>
    </p><br></b>
</div>
<div class="row <?= $atasan_user ?>">
    <div class="col-1 ">
        <div class="my-1">
            <label for="">Nama</label>
        </div>
        <div class="my-1">
            <label for="">NP</label>
        </div>
        <div class="my-1">
            <label for="">Jabatan</label>
        </div>
        <div class="my-1">
            <label for="">SatKer</label>
        </div>
        <div class="my-1">
            <label for="">E-mail</label>
        </div>
        <div class="my-1">
            <label for="">Tanggal</label>
        </div>
    </div>

    <div class="col-4">
        <div class="my-1">
            <label for="">: <?= $data['nama_admin'] ?></label>
        </div>
        <div class="my-1">
            <label for="">: <?= $data['nip_admin'] ?> </label>
        </div>
        <div class="my-1">
            <label for="">: <?= $data['jabatan_admin'] ?></label>
        </div>
        <div class="my-1">
            <label for="">: <?= $data['satker'] ?></label>
        </div>
        <div class="my-1">
            <label for="">: <?= $data['email_admin'] ?></label>
        </div>
        <div class="my-1">
            <label for="">: <?= date('d-M-Y') ?> </label>
        </div>
    </div>

</div>
</div>

<div class="row">
    <div class="col ">
        <div class="row text-center">

            <!-- Atasan User -->
            <h5 class="<?= $user ?>"><b>
                    <p>LEMBAR PERNYATAAN PIHAK YANG BERTANGGUNG JAWAB <br>
                        ATAS IMPLEMENTASI CODE OF CONDUCT <br>
                        PT BUKIT ASAM Tbk</h5>
            </p><br></b>
        </div>
        <form action="index.php?halaman=coc" method="post">
            <?php
            $ambil = $koneksi->query("SELECT * FROM coc"); ?>
            <?php
            $k = " ";
            $r = 0;
            foreach ($ambil as $coc) : ?>
                <input type="hidden" value="<?= $coc['id_coc'] ?>" name="id_coc[]">
                <input type="hidden" value="<?= $_SESSION['login']['nip_admin']; ?>" name="nip_admin">
                <div class="mt-3 ">
                    <h6 class="<?= $user ?>"><?= $k++ . " " . $coc['pernyataan_auser'] ?></h6>
                    <h6 class="<?= $atasan_user ?>"><?= $k++ . " " . $coc['pernyataan_user'] ?></h6>
                </div>
            <?php $r++;
            endforeach ?>
            <!-- Atasan User -->
            
            <div class="row <?= $user ?>" >
                <div class="col-1">
                    <div class="my-1">
                        <label for="">Nama</label>
                    </div>
                    <div class="my-1">
                        <label for="">NP</label>
                    </div>
                    <div class="my-1">
                        <label for="">Jabatan</label>
                    </div>
                    <div class="my-1">
                        <label for="">SatKer</label>
                    </div>
                    <div class="my-1">
                        <label for="">E-mail</label>
                    </div>
                    <div class="my-1">
                        <label for="">Tanggal</label>
                    </div>
                </div>

                <div class="col-4">
                    <div class="my-1">
                        <label for="">: <?= $data['nama_admin'] ?></label>
                    </div>
                    <div class="my-1">
                        <label for="">: <?= $data['nip_admin'] ?> </label>
                    </div>
                    <div class="my-1">
                        <label for="">: <?= $data['jabatan_admin'] ?></label>
                    </div>
                    <div class="my-1">
                        <label for="">: <?= $data['satker'] ?></label>
                    </div>
                    <div class="my-1">
                        <label for="">: <?= $data['email_admin'] ?></label>
                    </div>
                    <div class="my-1">
                        <label for="">: <?= date('d-M-Y') ?> </label>
                    </div>
                </div>
            </div><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="menyetujui">
                <label class="form-check-label" for="flexCheckChecked">
                    I agree to the above statement.
                </label>
            </div>
            <div class="">
                <div class="row">
                    <div class="col my-4">
                        <button name="save" type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
        </form>


    </div>
</div>