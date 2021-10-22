<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "egcg");

if (!isset($_SESSION['login'])) {
    echo "<script>alert('Anda harus login')</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

$data = $_SESSION['login'];
$login = $_SESSION['login']['akses'];
if ($login == 'user' or $login === 'atasan user') {
    $pengguna = 'visually-hidden';
}
if ($login == 'user') {
    $user = 'visually-hidden';
}
if ($login == 'atasan user') {
    $atasan_user = 'visually-hidden';
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>E-GCG Bukit Asam</title>
</head>


<style>
    body {
        font-family: sans-serif;
        font-size: 14px;
        text-align: justify;
    }

    .bd {
        padding: 0;
        text-align: center;
        width: 85px;
        height: 33px;
        font-size: 10px;
        border: solid;
        border-color: black;
        font-weight: bold;
    }

    .bd:hover {
        background-color: #F3C40D;
    }

    .bs {
        padding: 0;
        text-align: center;
        width: 107px;
        height: 33px;
        font-size: 10px;
        border: solid;
        border-color: black;
        font-weight: bold;
    }

    .bs:hover {
        background-color: #F3C40D;
    }
</style>

<body ">
    <div class=" container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="">
                    <img class="img mb-1 d-block" src="img/ptba.jpg" width="300" alt="ptba.jpg">
                </div>
            </div>
            <div class="col-10 d-flex flex-row-reverse">
                <nav class="navbar navbar-expand-lg navbar-light mt-5">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item m-1 rounded-pill bd">
                                    <a class="nav-link text-dark" href="index.php">BERANDA</a>
                                </li>
                                <li class="nav-item ">
                                    <div class="dropdown  text-dark">
                                        <button class="btn m-1 rounded-pill bd dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            SOSIALISASI
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="index.php?halaman=sosialisasi">Sosialisasi</a></li>
                                            <li><a class="dropdown-item <?= $pengguna ?>" href="index.php?halaman=tambah_file_sosialisasi">Edit Sosialisasi</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- <li class="nav-item m-1 rounded-pill bs">
                                    <a class="nav-link text-dark" href="index.php?halaman=informasi_gcg">INFORMASI GCG</a>
                                </li> -->
                                <li class="nav-item">
                                    <div class="dropdown text-dark">
                                        <button class="btn m-1 rounded-pill bd dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            INFORMASI GCG
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="index.php?halaman=peraturan">Peraturan</a></li>
                                            <li><a class="dropdown-item" href="index.php?halaman=pedoman">Pedoman</a></li>
                                            <li><a class="dropdown-item" href="index.php?halaman=kebijakan">Kebijakan</a></li>
                                            <li><a class="dropdown-item" href="index.php?halaman=prosedur">Prosedur</a></li>
                                            <li><a class="dropdown-item" href="index.php?halaman=assessment">Assessment</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item  ">
                                    <div class="dropdown  text-dark">
                                        <button class="btn m-1 rounded-pill bd dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            PENCAPAIAN
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="index.php?halaman=pencapaian">Pencapaian</a></li>
                                            <li class="<?= $pengguna ?>"><a class="dropdown-item" href="index.php?halaman=tambah_file_pencapaian">Edit Pencapaian</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item <?= $auser ?>">
                                    <div class="dropdown  text-dark">
                                        <button class="btn m-1 rounded-pill bd dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            SURVEY
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="index.php?halaman=survey">Survey</a></li>
                                            <li class="<?= $pengguna ?>"><a class="dropdown-item" href="index.php?halaman=tambah_file_survey">Edit Survey</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item ">
                                    <div class="dropdown  text-dark">
                                        <button class="btn m-1 rounded-pill bd dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            COC
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="index.php?halaman=coc">COC</a></li>
                                            <li class="<?= $pengguna ?>"><a class="dropdown-item" href="index.php?halaman=tambah_file_coc">File COC</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item m-1 rounded-pill bd">
                                    <a class="nav-link text-dark" href="index.php?halaman=qna">Q&A</a>
                                </li>
                                <li class="nav-item m-1 rounded-pill bd">
                                    <a class="nav-link text-dark" href="index.php?halaman=logout" aria-disabled="true">LOG OUT</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == "sosialisasi") {
                        include 'sosialisasi.php';
                    } elseif ($_GET['halaman'] == "informasi_gcg") {
                        include 'informasi_gcg.php';
                    } elseif ($_GET['halaman'] == "peraturan") {
                        include 'peraturan.php';
                    } elseif ($_GET['halaman'] == "pencapaian") {
                        include 'pencapaian.php';
                    } elseif ($_GET['halaman'] == "survey") {
                        include 'survey.php';
                    } elseif ($_GET['halaman'] == "assessment") {
                        include 'assessment.php';
                    } elseif ($_GET['halaman'] == "coc") {
                        include 'coc.php';
                    } elseif ($_GET['halaman'] == "qna") {
                        include 'qna.php';
                    } elseif ($_GET['halaman'] == "tambah_file_sosialisasi") {
                        include 'tambah_file_sosialisasi.php';
                    } elseif ($_GET['halaman'] == "tambah_file_informasi_gcg") {
                        include 'tambah_file_informasi_gcg.php';
                    } elseif ($_GET['halaman'] == "tambah_file_survey") {
                        include 'tambah_file_survey.php';
                    } elseif ($_GET['halaman'] == "tambah_file_coc") {
                        include 'tambah_file_coc.php';
                    } elseif ($_GET['halaman'] == "tambah_survey") {
                        include 'tambah_survey.php';
                    } elseif ($_GET['halaman'] == "tambah_coc") {
                        include 'tambah_coc.php';
                    } elseif ($_GET['halaman'] == "tambah_file_pencapaian") {
                        include 'tambah_file_pencapaian.php';
                    } elseif ($_GET['halaman'] == "hapus_file_sosialisasi") {
                        include 'hapus_file_sosialisasi.php';
                    } elseif ($_GET['halaman'] == "hapus_file_pencapaian") {
                        include 'hapus_file_pencapaian.php';
                    } elseif ($_GET['halaman'] == "hapus_file_informasi_gcg") {
                        include 'hapus_file_informasi_gcg.php';
                    } elseif ($_GET['halaman'] == "hapus_file_survey") {
                        include 'hapus_file_survey.php';
                    } elseif ($_GET['halaman'] == "hapus_file_coc") {
                        include 'hapus_file_coc.php';
                    } elseif ($_GET['halaman'] == "ubah_file_sosialisasi") {
                        include 'ubah_file_sosialisasi.php';
                    } elseif ($_GET['halaman'] == "ubah_file_pencapaian") {
                        include 'ubah_file_pencapaian.php';
                    } elseif ($_GET['halaman'] == "ubah_file_informasi_gcg") {
                        include 'ubah_file_informasi_gcg.php';
                    } elseif ($_GET['halaman'] == "ubah_file_survey") {
                        include 'ubah_file_survey.php';
                    } elseif ($_GET['halaman'] == "ubah_file_coc") {
                        include 'ubah_file_coc.php';
                    } elseif ($_GET['halaman'] == "detail_sosialisasi") {
                        include 'detail_sosialisasi.php';
                    } elseif ($_GET['halaman'] == "detail_pencapaian") {
                        include 'detail_pencapaian.php';
                    } elseif ($_GET['halaman'] == "logout") {
                        include 'logout.php';
                    }
                } else {
                    include 'beranda.php';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <div class="row">
        <div style="height: 15px; background-color:#F3C40D ;">
        </div>
        <div style="height: 5px; background-color:#FF0202 ;">
        </div>
    </div>
    <div class="row text-white py-4" style="background-color: #162488;">
        <div class="col">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3" style="border-width:5px; border-color:white;">
                        <h4>PT Bukit Asam Tbk</h4>
                        <h6>Head Office</h6>
                        <h6>Jl. parigi no. 1 Tanjung Enim 31716</h6>
                        <h6>Sumatera Selatan</h6>
                    </div>
                    <div class="col-lg-3 navbar-nav">
                        <ul>
                            <ol class="nav-item p-0"><a class="nav-link text-white" href="">BERANDA</a></ol>
                            <ol class="nav-item p-0"><a class="nav-link text-white" href="">SOSIALISASI</a></ol>
                            <ol class="nav-item p-0"><a class="nav-link text-white" href="">INFORMASI GCG</a></ol>
                            <ol class="nav-item p-0"><a class="nav-link text-white" href="">PENCAPAIAN</a></ol>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <ul>
                            <ol class="nav-item p-0"><a class="nav-link text-white" href="">SURVEY</a></ol>
                            <ol class="nav-item p-0"><a class="nav-link text-white" href="">ASSESSMENT</a></ol>
                            <ol class="nav-item p-0"><a class="nav-link text-white" href="">COC</a></ol>
                            <ol class="nav-item p-0"><a class="nav-link text-white" href="">Q&A</a></ol>
                        </ul>
                    </div>
                    <div class="col-lg-4 d-flex flex-row-reverse">
                        <h6 class="">
                            <a class="mx-2 text-white" href="">Jamkes</a><span>|</span>
                            <a class="mx-2 text-white" href="">Karir</a><span>|</span>
                            <a class="mx-2 text-white" href="">Hubungi Kami</a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>