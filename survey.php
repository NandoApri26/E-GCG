<?php
if (isset($_POST['save'])) {
    $id_survey = $_POST['id_survey'];
    for ($i = 0; $i < count($id_survey); $i++) {
        $id = $_POST['id_survey'][$i];
        $nip_admin = $_POST['nip_admin'];
        $opsi = $koneksi->query("SELECT * FROM survey WHERE id_survey='$id'");
        $opsi =$opsi->fetch_assoc();
     
        if (!empty($_POST['opsi' . $i])) {
            if ($opsi['jawaban']==$_POST['opsi'.$i]) {
                $nilai=10;
            }elseif($opsi['jawaban']==' '){
                $nilai=0;
            }
            else{
                $nilai=0;
            }
        }else{
            $nilai=0;
        }
        $koneksi->query("INSERT INTO hasil_survey (nip_admin, id_survey, nilai) VALUES ('$nip_admin', '$id', '$nilai')");
    }
    echo "<script>alert('Data Tersimpan');</script>";
    echo "<script>location='index.php?halaman=survey';</script>";
}
?>
<div class="row text-center mb-3 mt-5">
    <H4>FORMULIR SURVEY KINERJA PEGAWAI</H4>
</div>
<div class="row">
    <div class="col-1">
        <div class="my-1">
            <label for="">Tanggal</label>
        </div>
        <div class="my-1">
            <label for="">NP</label>
        </div>
        <div class="my-1">
            <label for="">NAMA</label>
        </div>
        <div class="my-1">
            <label for="">JABATAN</label>
        </div>
        <div class="my-1">
            <label for="">SATKER</label>
        </div>
        <div class="my-1">
            <label for="">EMAIL</label>
        </div>
    </div>
    <div class="col-3">
        <div class="my-1">
            <label for="">: <?= date('d-M-Y') ?> </label>
        </div>
        <div class="my-1">
            <label for="">: <?= $data['nip_admin'] ?> </label>
        </div>
        <div class="my-1">
            <label for="">: <?= $data['nama_admin'] ?></label>
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
    </div>
</div>

<div class="row">
    <div class="col ">
    <div class="row text-center mb-3 mt-5">
        <h3>Survey Sistem Manajemen Anti Penyuapan (SMAP)</h3>
    </div>
        <form action="index.php?halaman=survey" method="post">
            <?php
            $ambil = $koneksi->query("SELECT * FROM survey"); ?>
            <?php
            $k = 1;
            $r = 0;
            foreach ($ambil as $survey) : ?>
                <input type="hidden" value="<?= $survey['id_survey'] ?>" name="id_survey[]">
                <input type="hidden" value="<?= $_SESSION['login']['nip_admin']; ?>" name="nip_admin">
                <div class="mt-3">
                    <h6><?= $k++ . ". " . $survey['survey'] ?></h6>
                </div>
                <div class="">
                    <div class="form-check">
                        <input class="form-check-input align-middle " type="radio" value="A" name="opsi<?= $r ?>" id="opsi1">
                        <p> A. <?= $survey['opsi_a'] ?> </p>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input align-middle " type="radio" value="B" name="opsi<?= $r ?>" id="opsi1">
                        <p> B. <?= $survey['opsi_b'] ?> </p>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input align-middle " type="radio" value="C" name="opsi<?= $r ?>" id="opsi1">
                        <p> C. <?= $survey['opsi_c'] ?> </p>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input align-middle " type="radio" value="D" name="opsi<?= $r ?>" id="opsi1">
                        <p> D. <?= $survey['opsi_d'] ?> </p>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input align-middle " type="radio" value="E" name="opsi<?= $r ?>" id="opsi1">
                        <p> E. <?= $survey['opsi_e'] ?> </p>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="opsi" value="lainnya"=>
                        <textarea class="form-control" name="lainnya" id="opsi" rows="1"></textarea>
                    </div>
                </div>
            <?php $r++;
            endforeach ?>
            <div class="row">
                <div class="col my-4">
                    <button name="save" type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </form>
    </div>
</div>