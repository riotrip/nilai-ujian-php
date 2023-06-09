<?php
session_start();
$con = mysqli_connect('localhost','root','','ratarata');

// Nilai rata-rata
if(isset($_POST['inputnilai'])){
    $mtk = $_POST['mtk'];
    $ipa = $_POST['ipa'];
    $ind = $_POST['ind'];
    $eng = $_POST['eng'];
    $nama = $_POST['nama'];   
    
    $n_mapel = array($mtk, $ipa, $ind, $eng);  
    $jml_mapel = count($n_mapel);  
    $total = array_sum($n_mapel);
    $rata = $total / $jml_mapel;
    
    $addnilai = mysqli_query($con, "INSERT INTO nilai (id_siswa, mtk, ipa, ind, eng, total, rata) VALUES ('$nama', '$mtk', '$ipa', '$ind', '$eng', '$total', '$rata')");
    if ($addnilai) {
        echo "<script type='text/javascript'>alert('Nilai berhasil diinput!');</script>";
        echo "<script> window.location.href='listnilai.php';</script>";
    }
}

//Tambah siswa
if(isset($_POST['inputsiswa'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $nis = $_POST['nis'];

    $addsiswa = mysqli_query($con, "INSERT INTO siswa (nama, alamat, tgl_lahir, nis) VALUES ('$nama', '$alamat', '$tgl_lahir', '$nis')");
    if ($addsiswa) {
        echo "<script type='text/javascript'>alert('Siswa berhasil diinput!');</script>";
        echo "<script> window.location.href='listsiswa.php';</script>";
    }
}
