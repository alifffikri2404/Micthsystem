<?php
error_reporting(0);
require('../../configAsetTPS.php');
session_start();

$idp = $_SESSION['idP'];
$lvl = $_SESSION['lvl'];
$viewname = $_SESSION['name'];
$empno = $_SESSION['empno'];
$department = $_SESSION['department'];
$namerole = $_SESSION['namerole'];

// Keluarkan notification untuk mesej berjaya


if (isset($_POST['submit'])) {
    $tarikh_daftar = $_POST['tarikh_daftar'];
    $pemilik_jabatan = $_POST['pemilik_jabatan'];
    $kategori_aset = $_POST['kategori_aset'];
    $jenis_aset = $_POST['jenis_aset'];
    $no_aset = $_POST['no_aset'];
    $no_siri = $_POST['no_siri'];
    $nama_aset = $_POST['nama_aset'];
    $tahun_beli = $_POST['tahun_beli'];
    $harga_beli = $_POST['harga_beli'];
    $warranty = $_POST['warranty'];
    $warna = $_POST['warna'];
    $model = $_POST['model'];
    $nama_kakitangan = $_POST['nama_kakitangan'];
    $lokasi_jabatan = $_POST['lokasi_jabatan'];
    $nama_pembekal = $_POST['nama_pembekal'];
    
    $id = $_GET['id'];

    // Assuming $conn is your database connection
    $sql = "UPDATE `tbl_daftar_aset` SET  
    `tarikh_daftar`='$tarikh_daftar',
    `pemilik_jabatan`='$pemilik_jabatan',
    `kategori_aset`='$kategori_aset',
    `jenis_aset`='$jenis_aset',
    `no_aset`='$no_aset',
    `no_siri`='$no_siri',
    `nama_aset`='$nama_aset',
    `tahun_beli`='$tahun_beli',
    `harga_beli`='$harga_beli',
    `warranty`='$warranty',
    `warna`='$warna',
    `model`='$model',
    `nama_kakitangan`='$nama_kakitangan',
    `lokasi_jabatan`='$lokasi_jabatan',
    `nama_pembekal`='$nama_pembekal'
    WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // The update was successful
        echo "Record updated successfully";
    } else {
        // There was an error in the update
        echo "Error updating record: " . $conn->error;
    }
}



       
?>
