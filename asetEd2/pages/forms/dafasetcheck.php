<?php

error_reporting(0);
require('../../configAsetTPS.php');
// session_start();

// $idp = $_SESSION['idP'];
// $lvl = $_SESSION['lvl'];
// $viewname = $_SESSION['name'];
// $empno = $_SESSION['empno'];
// $department = $_SESSION['department'];
// $namerole = $_SESSION['namerole'];

// //Check role
// if($lvl == "1")
// {
// 	$viewnamef = "Admin";
// }
// if($lvl <> "1")
// {
// 	$viewnamef = $viewname;
// }

require('../../functions.php');
require('../../../db_conn.php');


if (isset($_POST['view'])) {
	$user_id = $_GET['Internal_Id'];
	$empnumber = $_SESSION['emp_number'];
	$username1 = $_SESSION['user_name'];
	$firstname1 = $_SESSION['First_Name'];
	$lastname = $_SESSION['Last_Name'];
	$department = $_SESSION['Department'];
}

//Keluarkan notification untuk mesej berjaya
function paparMesejBerjaya($idnosiriFF)
{

	echo '<script type="text/javascript">alert("Successfully registered new asset!");
				window.location="../tables/laporanas.php";</script>';
}

//Keluarkan notification untuk mesej GAGAL
function paparMesejGagal()
{

	echo "<script type='text/javascript'>\n";
	echo "alert('Sorry, your request failed to be saved.');\n";
	echo "history.go(-1);\n";
	echo "</script>";
	exit();
}

//Keluarkan notification untuk mesej GAGAL
function paparMesejGagal1()
{

	echo "<script type='text/javascript'>\n";
	echo "alert('Sorry, your request failed to be saved.');\n";
	echo "history.go(-1);\n";
	echo "</script>";
	exit();
}


//post setiap id didalam form

//insert into daftar aset	
if (isset($_POST['submit'])) {

	$tarikh_daftar = isset($_POST['tarikh_daftar']) ? $_POST['tarikh_daftar'] : '';
	$kategori_aset = isset($_POST['kategori']) ? $_POST['kategori'] : '';
	$jenis_aset = isset($_POST['jenis']) ? $_POST['jenis'] : '';
	$InputNoSiriAwal = isset($_POST['full_id']) ? $_POST['full_id'] : '';

	$nama_aset = isset($_POST['nama_aset']) ? $_POST['nama_aset'] : '';
	$tahun_beli = isset($_POST['tahun_beli']) ? $_POST['tahun_beli'] : '';
	$harga_beli = isset($_POST['harga_beli']) ? $_POST['harga_beli'] : '';
	$warna = isset($_POST['warna']) ? $_POST['warna'] : '';

	$warranty = isset($_POST['warranty']) ? $_POST['warranty'] : '';
	$nama_kakitangan = isset($_POST['nama_kakitangan']) ? $_POST['nama_kakitangan'] : '';
	$no_siri = isset($_POST['no_siri']) ? $_POST['no_siri'] : '';
	$model = isset($_POST['model']) ? $_POST['model'] : '';
	$pemilik_jabatan = isset($_POST['pemilik_jabatan']) ? $_POST['pemilik_jabatan'] : '';

	$nama_pembekal = isset($_POST['nama_pembekal']) ? $_POST['nama_pembekal'] : '';
	$tarikh_daftar1 = date("Y-m-d", strtotime($tarikh_daftar));
	$tarikh_serahan = isset($_POST['tarikh_serahan']) ? $_POST['tarikh_serahan'] : '';
	$tarikh_serahan1 = date("Y-m-d", strtotime($tarikh_serahan));
	
	$lokasi_jabatan = isset($_POST['lokasi_jabatan']) ? $_POST['lokasi_jabatan'] : '';
	$sqlOP = "SELECT * FROM empdept WHERE name = '$lokasi_jabatan'";
	require('../../../db_conn.php');

	$resultOP = mysqli_query($conn, $sqlOP);

	if ($resultOP && mysqli_num_rows($resultOP) > 0) {
		$rowOP = mysqli_fetch_assoc($resultOP);
		$lokasi_jabatan2 = $rowOP['dept_id'];
	} else {
		$lokasi_jabatan2 = ''; // Default value if no matching department found
	}

	$status_aset = 'Active';

	try {
		$sql = "SELECT id FROM tbl_daftar_aset ORDER BY id DESC";
		require('../../configAsetTPS.php');

		$result = mysqli_query($conn2, $sql);

		if ($result && mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$idnosiri = $row['id'];
			$idnosiriF = $idnosiri + 1;
			$idnosiriFF = $InputNoSiriAwal;

			try {
				$sql1 = "INSERT INTO tbl_daftar_aset (tarikh_serahan, tarikh_daftar, kategori_aset, jenis_aset, no_siri, nama_aset, tahun_beli, harga_beli, warna, warranty, nama_kakitangan, no_aset, model, id_pembekal, pemilik_jabatan, lokasi_jabatan, status_aset)
				         VALUES ('$tarikh_serahan', '$tarikh_daftar1', '$kategori_aset', '$jenis_aset', '$no_siri', '$nama_aset', '$tahun_beli', '$harga_beli', '$warna', '$warranty', '$nama_kakitangan', '$idnosiriFF', '$model','$nama_pembekal','$pemilik_jabatan','$lokasi_jabatan2', '$status_aset')";
				require('../../configAsetTPS.php');

				$result2 = mysqli_query($conn2, $sql1);

				$sql11 = "SELECT * FROM tbl_daftar_aset WHERE no_aset = '$idnosiriFF'";
				require('../../configAsetTPS.php');

				$result3 = mysqli_query($conn2, $sql11);
				if (mysqli_num_rows($result3) > 0) {
					paparMesejBerjaya($idnosiriFF);
				} else {
					paparMesejGagal1();
				}
			} catch (Exception $e) {
				echo 'Caught exception check condition applied: ',  $e->getMessage(), "\n";
			}
		} else {
			$idnosiriFst = $InputNoSiriAwal;

			try {
				$sql1 = "INSERT INTO tbl_daftar_aset (tarikh_serahan, tarikh_daftar, kategori_aset, jenis_aset, no_siri, nama_aset, tahun_beli, harga_beli, warna, warranty, nama_kakitangan, no_aset, model, id_pembekal, pemilik_jabatan, lokasi_jabatan, status_aset)  
				         VALUES ('$tarikh_serahan', '$tarikh_daftar1', '$kategori_aset', '$jenis_aset', '$no_siri', '$nama_aset', '$tahun_beli', '$harga_beli', '$warna', '$warranty', '$nama_kakitangan', '$idnosiriFst', '$model','$nama_pembekal','$pemilik_jabatan','$lokasi_jabatan2', '$status_aset')";

				require('../../configAsetTPS.php');
				$result2 = mysqli_query($conn2, $sql1);

				$sql11 = "SELECT * FROM tbl_daftar_aset WHERE no_aset = '$idnosiriFst'";
				require('../../configAsetTPS.php');

				$result3 = mysqli_query($conn2, $sql11);
				if (mysqli_num_rows($result3) > 0) {
					paparMesejBerjaya($idnosiriFst);
				} else {
					paparMesejGagal1();
				}
			} catch (Exception $e) {
				echo 'Caught exception check condition applied: ',  $e->getMessage(), "\n";
			}
		}
	} catch (Exception $e) {
		echo 'Caught exception insert: ',  $e->getMessage(), "\n";
	}
} else {
	function died($error) {
		paparMesejGagal();
	}
}
