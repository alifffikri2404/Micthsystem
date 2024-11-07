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

	$asset_num = isset($_POST['assetnum']) ? $_POST['assetnum'] : '';
	$category = isset($_POST['category']) ? $_POST['category'] : '';
	$sub_category = isset($_POST['subcategory']) ? $_POST['subcategory'] : '';
	$model = isset($_POST['model']) ? $_POST['model'] : '';
	$running_num = isset($_POST['runningno']) ? $_POST['runningno'] : '';
	$serial_num = isset($_POST['serialno']) ? $_POST['serialno'] : '';
	$purchase_date = isset($_POST['purchasedate']) ? $_POST['purchasedate'] : '';
	$supplier = isset($_POST['supplier']) ? $_POST['supplier'] : '';

	$tarikh_daftar = isset($_POST['tarikh_daftar']) ? $_POST['tarikh_daftar'] : '';
	$reg_date = date("j/n/Y", strtotime($tarikh_daftar));

	$tarikh_serahan = isset($_POST['tarikh_serahan']) ? $_POST['tarikh_serahan'] : '';
	$hand_date = date("j/n/Y", strtotime($tarikh_serahan));
	
	$staff_name = isset($_POST['staffname']) ? $_POST['staffname'] : '';
	
	$staff_dept = isset($_POST['staffdept']) ? $_POST['staffdept'] : '';
	$sqlDD = "SELECT * FROM empdept WHERE name = '$staff_dept'";
	require('../../../db_conn.php');
	$resultDD = mysqli_query($conn, $sqlDD);
	if ($resultDD && mysqli_num_rows($resultDD) > 0) {
		$rowOP = mysqli_fetch_assoc($resultDD);
		$staff_dept2 = $rowOP['dept_id'];
	} else {
		$staff_dept2 = ''; // Default value if no matching department found
	}

	$location = isset($_POST['location']) ? $_POST['location'] : '';
	$status_aset = 'Active';

	try {
		$sql = "SELECT id FROM tbl_daftar_aset ORDER BY id DESC";
		require('../../configAsetTPS.php');

		$result = mysqli_query($conn2, $sql);

		if ($result && mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$idnosiri = $row['id'];
			$idnosiriF = $idnosiri + 1;
			$idnosiriFF = $asset_num;

			try {
				$sql1 = "INSERT INTO tbl_daftar_aset (tarikh_daftar, tarikh_serahan, kategori_aset, jenis_aset, no_siri, nama_aset, tahun_beli, warna, nama_kakitangan, no_aset, id_pembekal, pemilik_jabatan, lokasi_jabatan, status_aset)
				         VALUES ('$reg_date', '$hand_date', '$category', '$sub_category', '$serial_num', '$model', '$purchase_date', '$running_num', '$staff_name', '$asset_num', '$supplier','$staff_dept2','$location', '$status_aset')";
				require('../../configAsetTPS.php');

				$result2 = mysqli_query($conn2, $sql1);

				$sql11 = "SELECT * FROM tbl_daftar_aset WHERE no_aset = '$asset_num'";
				require('../../configAsetTPS.php');

				$result3 = mysqli_query($conn2, $sql11);
				if (mysqli_num_rows($result3) > 0) {
					paparMesejBerjaya($asset_num);
				} else {
					paparMesejGagal1();
				}
			} catch (Exception $e) {
				echo 'Caught exception check condition applied: ',  $e->getMessage(), "\n";
			}
		} else {
			$idnosiriFst = $asset_num;

			try {
				$sql1 = "INSERT INTO tbl_daftar_aset (tarikh_daftar, tarikh_serahan, kategori_aset, jenis_aset, no_siri, nama_aset, tahun_beli, warna, nama_kakitangan, no_aset, id_pembekal, pemilik_jabatan, lokasi_jabatan, status_aset)
				         VALUES ('$reg_date', '$hand_date', '$category', '$sub_category', '$serial_num', '$model', '$purchase_date', '$running_num', '$staff_name', '$asset_num', '$supplier','$staff_dept2','$location', '$status_aset')";
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
