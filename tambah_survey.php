<div class="row">
    <h4>Tambah Survey</h4>
</div>
<div class="row">
    <div class="col">
        <form action="index.php?halaman=tambah_survey" method="post">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label text-center">Survey</label>
                <textarea class="form-control" name="survey" id="exampleFormControlTextarea1" rows="1"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea2" class="form-label text-center">Opsi A</label>
                <textarea class="form-control" name="opsi_a" id="exampleFormControlTextarea2" rows="1"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea2" class="form-label text-center">Opsi B</label>
                <textarea class="form-control" name="opsi_b" id="exampleFormControlTextarea2" rows="1"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea2" class="form-label text-center">Opsi C</label>
                <textarea class="form-control" name="opsi_c" id="exampleFormControlTextarea2" rows="1"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea2" class="form-label text-center">Opsi D</label>
                <textarea class="form-control" name="opsi_d" id="exampleFormControlTextarea2" rows="1"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea2" class="form-label text-center">Opsi E</label>
                <textarea class="form-control" name="opsi_e" id="exampleFormControlTextarea2" rows="1"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea2" class="form-label text-center">Lainnya</label>
                <textarea class="form-control" name="lainnya" id="exampleFormControlTextarea2" rows="1"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea2" class="form-label text-center">Jawaban</label>
                <select class="form-select" name="jawaban" aria-label="Default select example">
                    <option selected>Pilih Jawaban Yang Benar</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>
            <div>
                <button type="submit" name="save" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
</div>
<?php
if (isset($_POST['save'])) {
    $koneksi->query("INSERT INTO survey
			(survey, jawaban, opsi_a, opsi_b, opsi_c, opsi_d, opsi_e, lainnya) VALUES('$_POST[survey]', '$_POST[jawaban]', '$_POST[opsi_a]', '$_POST[opsi_b]', '$_POST[opsi_c]', '$_POST[opsi_d]', '$_POST[opsi_e]', '$_POST[lainnya]')");
    echo "<script>alert('Data Tersimpan');</script>";
    echo "<script>location='index.php?halaman=tambah_file_survey';</script>";
}
?>