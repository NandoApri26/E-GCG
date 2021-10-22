<div class="row">
    <h4>Code Of Conduct</h4>
</div>
<div class="row">
    <div class="col">
        <form action="index.php?halaman=tambah_coc" method="post">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label text-center">Pernyataan Atasan User</label>
                <textarea class="form-control" name="coc" id="exampleFormControlTextarea1" rows="1"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label text-center">Pernyataan User</label>
                <textarea class="form-control" name="coc" id="exampleFormControlTextarea1" rows="1"></textarea>
            </div>
            <div>
                <button type="submit" name="save" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
</div>
<?php
if (isset($_POST['save'])) {
    $koneksi->query("INSERT INTO coc
			(pernyataan_auser, pernyataan_user) VALUES('$_POST[coc]', '$_POST[coc]')");
    echo "<script>alert('Data Tersimpan');</script>";
    echo "<script>location='index.php?halaman=tambah_file_coc';</script>";
}
?>