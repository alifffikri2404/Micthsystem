<?php
require('../../configAsetTPS.php');
// require('../../config.php');
// session_start();
// $idp = $_SESSION['idP'];
// $lvl = $_SESSION['lvl'];

// $firstname1 = $_SESSION['1stname'];
// $lastname = $_SESSION['lastname'];
// $empnumber = $_SESSION['empnumber'];
// $department = $_SESSION['department'];
// $namerole = $_SESSION['namerole'];


// //Check role
// if($lvl == "1")
// {
// 	$firstname = "Admin";
// }
// if($lvl <> "1")
// {
// 	$firstname = $firstname1;
// }

require('../../functions.php'); 
include "../../db_conn.php";

 if(isset($_POST['view'])){
  $user_id = $_GET['Internal_Id'];
  $empnumber = $_SESSION['emp_number'];
  $username1 = $_SESSION['user_name'];
  $firstname1 = $_SESSION['First_Name'];
  $lastname = $_SESSION['Last_Name'];
  $department = $_SESSION['Department'];
 } 

//------------------------------------------------------------------------ UPDATE ASET----------------------------------------------------------------------------------------------// 
if (isset($_POST['btn-update'])) {
  // variables for input data
  $aset_id = $_GET['id'];
  $tarikh_daftar = $_POST['tarikh_daftar'];
  $tarikh_serahan = $_POST['tarikh_serahan'];
  $kategori_aset = $_POST['kategori'];
  $jenis_aset = $_POST['jenis'];
  $no_siri = $_POST['no_siri'];
  $nama_aset = $_POST['nama_aset'];
  $tahun_beli = $_POST['tahun_beli'];
  $harga_beli = $_POST['harga_beli'];
  $warna = $_POST['warna'];

  $lokasi_jabatan = $_POST['lokasi_jabatan'];
  $sqlOP = "SELECT * FROM empdept
	WHERE name = '$lokasi_jabatan'";
  include "../../db_conn.php";

	$resultOP = mysqli_query($conn, $sqlOP);

  if ($resultOP && mysqli_num_rows($resultOP) > 0) {
        $rowOP = mysqli_fetch_assoc($resultOP);
        $lokasi_jabatan2 = $rowOP['dept_id'];
	}

  $nama_kakitangan = $_POST['nama_kakitangan'];
  $model = $_POST['model'];
  $warranty = $_POST['warranty'];
  $no_aset = $_POST['InputNoSiriAwal'];
  $nama_pembekal = $_POST['nama_pembekal'];

    //------------------------------------------------ QUERY BARU (FIX INNER JOIN DAN QUERY) ----------------------------------------------------//
  $sql1_query = "UPDATE tbl_daftar_aset 
    INNER JOIN tbl_pembekal ON tbl_daftar_aset.id_pembekal = tbl_pembekal.id_pembekal
    INNER JOIN kategoritps ON tbl_daftar_aset.kategori_aset = kategoritps.id_kategori
    SET tbl_daftar_aset.no_siri = '$no_siri',
      tbl_daftar_aset.no_aset = '$no_aset',
      tbl_daftar_aset.kategori_aset = '$kategori_aset', 
      tbl_daftar_aset.id_pembekal = '$nama_pembekal',
      tbl_daftar_aset.tarikh_daftar = '$tarikh_daftar',
      tbl_daftar_aset.tarikh_serahan = '$tarikh_serahan',
      tbl_daftar_aset.jenis_aset = '$jenis_aset',
      tbl_daftar_aset.nama_aset = '$nama_aset', tbl_daftar_aset.tahun_beli = '$tahun_beli',
      tbl_daftar_aset.harga_beli = '$harga_beli', tbl_daftar_aset.warna = '$warna',
      tbl_daftar_aset.lokasi_jabatan = '$lokasi_jabatan2', 
      tbl_daftar_aset.nama_kakitangan = '$nama_kakitangan', tbl_daftar_aset.warranty = '$warranty', 
      tbl_daftar_aset.model = '$model'
  WHERE tbl_daftar_aset.id= '$aset_id'";
require('../../configAsetTPS.php');

  $result2 = mysqli_query($conn2, $sql1_query);

  $tarikh_daftar = mysqli_real_escape_string($conn2, $tarikh_daftar);
  $tarikh_serahan = mysqli_real_escape_string($conn2, $tarikh_serahan);
  $nama_aset = mysqli_real_escape_string($conn2, $nama_aset);
  $lokasi_jabatan = mysqli_real_escape_string($conn2, $lokasi_jabatan);
  $no_aset = mysqli_real_escape_string($conn2, $no_aset);

  $sql11 = "INSERT INTO log_aset (tarikh_daftar, tarikh_serahan, nama_aset, lokasi_jabatan, no_aset, nama_kakitangan, aset_id) 
    VALUES ('$tarikh_daftar', '$tarikh_serahan', '$nama_aset', '$lokasi_jabatan2', '$no_aset', '$nama_kakitangan', $aset_id)";
  $result11 = mysqli_query($conn2, $sql11);

  if ($result2 && $result11) {
?>
  <script type="text/javascript">
    alert('Asset data successfully updated!');
    window.location.href = '../tables/laporanas.php';
  </script>
<?php
  } else {
?>
  <script type="text/javascript">
    alert('Failed to update asset data!');
  </script>
<?php
  }
}

if (isset($_POST['btn-cancel'])) {
  header("Location: ../tables/laporanas.php");
}

if (empty($_SESSION['First_Name'])) {
  header("Location: ../../iout.php");
  exit();
}
?>

<?php
					  
	date_default_timezone_set("Asia/Bangkok");
	$cM = date("m");
	$cY = date("Y");
	$cDate = date("Y-m-d");
							
	
// if(($idp<>'')&&($lvl<>'')){					  
?>
<!DOCTYPE html>
<html lang = "en">
<head>
  <!-- <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MICTH | IntSys</title> -->

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Update Asset</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- <meta http-equiv="refresh" content="15"> -->

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Favicons -->
  <link href="../../assets/img/micthlogo.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<style>
.sb{
	box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
	height:100%;
	width:100%;
	background-color: white;
	border: 1px solid white;
	overflow:auto;
	white-space: nowrap;
	
}
.card-title span {
        color: black;
    }
</style>
<body>

    <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../../../main_user.php" class="logo d-flex align-items-center">
        <img src="../../../logomicth.png" alt="">
        <span class="d-none d-lg-block">MICTH System
        </span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li>
              <hr class="dropdown-divider">
            </li>
          </ul><!-- End Notification Dropdown Items -->
        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">


          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">
      
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../../assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo "Me";?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['First_Name'];?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../../iout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">



  <!-- Asset System / iAset -->
  <li class="nav-item">
    <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-briefcase-fill"></i><span>Asset System</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>

    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../homeaset.php">
          <i class="bi bi-house-door-fill" style="font-size: 1em"></i><span>Home</span>
        </a>
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../pages/forms/dafaset.php">
          <i class="bi bi-pencil-square" style="font-size: 1em"></i><span>Asset Register</span>
        </a>
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../pages/tables/laporanas.php" class="active">
          <i class="bi bi-file-earmark-text" style="font-size: 1em; background-color: transparent"></i><span>Asset Report</span>
        </a>
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../pages/tables/laporlupus.php">
          <i class="bi bi-file-earmark-x" style="font-size: 1em"></i><span>Disposal Report</span>
        </a>
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../pages/tables/staffrequest.php">
          <i class="bi bi-card-checklist" style="font-size: 1em"></i><span>Staff Request</span>
        </a>
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../hometetapan.php">
          <i class="bi bi-gear-fill" style="font-size: 1em"></i><span>Settings</span>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="../../../main_user.php">
      <i class="bi bi-reply-fill"></i>
      <span>Home Page</span>
    </a>
  </li>

</ul>
</aside><!-- End Sidebar-->
  <main id="main" class="main">

  <div class="pagetitle">
    <h1>Update Details</strong></h1>
    <nav>
      <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
        <li class="breadcrumb-item"><a href="../../homeaset.php">Home Page</a></li>
        <li class="breadcrumb-item"><a href="../../pages/tables/laporanas.php">Asset Report</a></li>
        <li class="breadcrumb-item active">Update Asset</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

<?php
if(isset($_GET['id']))
{
 
$sqlA_query = "SELECT * 
  FROM tbl_daftar_aset 
  INNER JOIN kategoritps 
  ON tbl_daftar_aset.kategori_aset=kategoritps.id_kategori
  WHERE tbl_daftar_aset.id = ".$_GET['id'];
 require('../../configAsetTPS.php');

$result_set = mysqli_query($conn2,$sqlA_query);
$fetched_row = mysqli_fetch_array($result_set);

$kategori_id = $fetched_row['kategori_aset'];
?>

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-20">
        <div class="row">
          <!-- Recent Sales -->
        </div>
      </div>
      <div class="col-12">
        <div class="card top-selling">
          <div class="sb">
            <div class="card-body">
              <form role="form" action="" method="post">
              <h5 class="card-title"><strong>ASSET DETAILS</strong><br/>
              <!-- List all related field form for asset according to the category and ID -->

              <!-- Fill in general asset information -->
                <div class="col-lg-20" style="margin-top: 10px">
                  <div class="col-md-12 mt-10" style="border: 1px solid #899bbd; border-radius: 1px">
                    <h5 class="card-title"><strong>GENERAL ASSET INFORMATION</strong><br/>
                    <div class="row"  style="margin-top: 10px">
                      <div class="col-md-12">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;">Asset Type:</label>
                                  <select style="text-transform:uppercase; font-size: 1.4rem; line-height: 1.0; height: 34px"
                                    class="form-select" id="jenis" name="jenis" placeholder="ASSET TYPE" 
                                    value="<?php echo $jenis_aset = $fetched_row['jenis_aset'];?>">
                                    <option value='-'>PLEASE SELECT ASSET TYPE</option>
                                    <?php
                                      $sqlL = "SELECT * FROM jenis_aset
                                      WHERE id_kategori = $kategori_id
                                      ORDER BY jenis_aset ASC";
                                      $result2 = mysqli_query($conn2, $sqlL);
                                      $countL = mysqli_num_rows($result2);
                                      if ($countL > 0) {
                                        $off = 0;
                                        $i = 1 + $off;
                                        while ($rowP = mysqli_fetch_array($result2)) {
                                          $selected = ($rowP['jenis_aset'] == $jenis_aset) ? 'selected' : '';
                                          echo '<option value="' . $rowP['jenis_aset'] . '" ' . $selected . '>' . $rowP['jenis_aset'] . '</option>';
                                          $i++;
                                        }
                                      }
                                    ?>
                                    </select>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Asset Number:</label>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                    class="form-control" id="InputNoSiriAwal" name="InputNoSiriAwal" placeholder="ASSET NUMBER"
                                    value="<?php echo $fetched_row['no_aset'];?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputEmail1" style="font-weight: 400; 'Nunito', sans-serif;">Registration Date:</label>
                                <div class="input-group">
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                    class="form-control" id="tarikh_daftar" name="tarikh_daftar" 
                                    value="<?php echo $fetched_row['tarikh_daftar'];?>" readonly>
                                  <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Department Owner:</label>
                                  <?php
                                    $current_jab = $fetched_row['pemilik_jabatan'];
                                    if (!empty($current_jab)) {
                                      require('../../../db_conn.php');

                                      $sqlAB2 = "SELECT * FROM empdept WHERE dept_id = $current_jab";
                                      $result19 = mysqli_query($conn, $sqlAB2);
                                      if ($result19) {
                                          $row = mysqli_fetch_assoc($result19);
                                          $lokasi_jabatan2 = $row['name'];
                                      } else {
                                        $lokasi_jabatan2 = "None";
                                      }
                                    } else {
                                      $lokasi_jabatan2 = "None";
                                    }
                                  ?>
                                  <select type="text" style="font-size: 1.4rem; line-height: 1.2; height: 34px"
                                    class="form-select" id="pemilik_jabatan" name="pemilik_jabatan" placeholder="DEPARTMENT"
                                    value="<?php echo $lokasi_jabatan2;?>">
                                    <option value='-'>PLEASE SELECT DEPARTMENT OWNER</option>
                                    <?php
                                      $sqlL = "SELECT * FROM empdept
                                      ORDER BY dept_id ASC";
                                      include "../../db_conn.php";

                                      $result = mysqli_query($conn, $sqlL);
                                      $countL = mysqli_num_rows($result);
                                      if ($countL > 0) {
                                      $off = 0;
                                      $i = 1 + $off;
                                        while ($rowL = mysqli_fetch_array($result)) {
                                          $selected = ($rowL['name'] == $lokasi_jabatan2) ? 'selected' : '';
                                          echo '<option value=' . $rowL['dept_id'] . ' ' . $selected . '>' . $rowL['name'] . '</option>';
                                          $i++;
                                        }
                                      }
                                    ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputEmail1" style="font-weight: 400; 'Nunito', sans-serif;">Handover Date:</label>
                                <div class="input-group">
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                    class="form-control" id="tarikh_serahan" name="tarikh_serahan" 
                                    value="<?php echo $fetched_row['tarikh_serahan'];?>" readonly>
                                  <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- javascript for price format -->
                <script>
                  function formatDisposalValue(input) {
                      
                    let value = input.value.replace(/\D/g, '').replace(/^0+/, '');

                    if (value === '' || value === '.') {
                      input.value = '0.00';
                      return;
                    }
                    
                    value = value.replace(/\D/g, '').replace(/^0+/, '');
                    
                    if (value.length <= 2) {
                      value = value.padStart(3, '0');
                    }

                    let integerPart = value.slice(0, -2);
                    let decimalPart = value.slice(-2);
                    
                    integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    value = integerPart + '.' + decimalPart;
                    input.value = value;

                  }
                </script>
                
                <!--------------------------------- IF ELSE STATEMENT TO DIFFERENTIATE CATEGORY FIELD FORM ---------------------------->
                <!-- Kategori Aset - KOMPUTER (ID = 32) -->
                <?php
                if ($fetched_row['kategori_aset'] == 32) {
                ?>
                <div class="col-lg-20" style="margin-top: 10px">
                  <div class="col-md-12 mt-10" style="margin-top: 20px; border: 1px solid #899bbd; border-radius: 1px">
                    <h5 class="card-title"><strong>ASSET INFORMATION</strong><br/>
                    <div class="row"  style="margin-top: 10px">
                      <div class="col-md-12">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Asset Name:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="nama_aset" name="nama_aset" placeholder="ASSET NAME"
                                  value="<?php echo $fetched_row['nama_aset']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Model:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="model" name="model" placeholder="MODEL"
                                  value="<?php echo $fetched_row['model']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Serial Number:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="no_siri" name="no_siri" placeholder="SERIAL NUMBER"
                                  value="<?php echo $fetched_row['no_siri']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Purchase Price:</label>
                                <div class="input-group">
                                  <span class="input-group-text">RM</span>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                    class="form-control" id="harga_beli" name="harga_beli" placeholder="PRICE"
                                    value="<?php echo $fetched_row['harga_beli']; ?>"
                                    oninput="formatDisposalValue(this)">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Warranty Period:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="warranty" name="warranty" placeholder="WARRANTY"
                                  value="<?php echo $fetched_row['warranty']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Colour:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="warna" name="warna" placeholder="COLOUR"
                                  value="<?php echo $fetched_row['warna']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Year of Purchase:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="tahun_beli" name="tahun_beli" placeholder="YEAR"
                                  value="<?php echo $fetched_row['tahun_beli']; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Kategori Aset - PERABOT (ID = 33) -->
                <?php
                } else if ($fetched_row['kategori_aset'] == 33) {
                ?>
                <div class="col-lg-20" style="margin-top: 10px">
                  <div class="col-md-12 mt-10" style="margin-top: 20px; border: 1px solid #899bbd; border-radius: 1px">
                    <h5 class="card-title"><strong>ASSET INFORMATION</strong><br/>
                    <div class="row"  style="margin-top: 10px">
                      <div class="col-md-12">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Asset Name:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="nama_aset" name="nama_aset" placeholder="ASSET NAME"
                                  value="<?php echo $fetched_row['nama_aset']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Model:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="model" name="model" placeholder="MODEL"
                                  value="<?php echo $fetched_row['model']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Purchase Price:</label>
                                <div class="input-group">
                                  <span class="input-group-text">RM</span>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                    class="form-control" id="harga_beli" name="harga_beli" placeholder="PRICE"
                                    value="<?php echo $fetched_row['harga_beli']; ?>"
                                    oninput="formatDisposalValue(this)">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Colour:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="warna" name="warna" placeholder="COLOUR"
                                  value="<?php echo $fetched_row['warna']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Year of Purchase:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="tahun_beli" name="tahun_beli" placeholder="YEAR"
                                  value="<?php echo $fetched_row['tahun_beli']; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Kategori Aset - KELENGKAPAN PEJABAT (ID = 34) -->
                <?php
                }else if ($fetched_row['kategori_aset'] == 34) {
                ?>
                <div class="col-lg-20" style="margin-top: 10px">
                  <div class="col-md-12 mt-10" style="margin-top: 20px; border: 1px solid #899bbd; border-radius: 1px">
                    <h5 class="card-title"><strong>ASSET INFORMATION</strong><br/>
                    <div class="row"  style="margin-top: 10px">
                      <div class="col-md-12">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Asset Name:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="nama_aset" name="nama_aset" placeholder="ASSET NAME"
                                  value="<?php echo $fetched_row['nama_aset']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Model:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="model" name="model" placeholder="MODEL"
                                  value="<?php echo $fetched_row['model']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Serial Number:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="no_siri" name="no_siri" placeholder="SERIAL NUMBER"
                                  value="<?php echo $fetched_row['no_siri']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Purchase Price:</label>
                                <div class="input-group">
                                  <span class="input-group-text">RM</span>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                    class="form-control" id="harga_beli" name="harga_beli" placeholder="PRICE"
                                    value="<?php echo $fetched_row['harga_beli']; ?>"
                                    oninput="formatDisposalValue(this)">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Colour:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="warna" name="warna" placeholder="COLOUR"
                                  value="<?php echo $fetched_row['warna']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Year of Purchase:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="tahun_beli" name="tahun_beli" placeholder="YEAR"
                                  value="<?php echo $fetched_row['tahun_beli']; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Kategori Aset - PERALATAN (ID = 35) -->
                <?php
                }else if ($fetched_row['kategori_aset'] == 35) {
                ?>
                <div class="col-lg-20" style="margin-top: 10px">
                  <div class="col-md-12 mt-10" style="margin-top: 20px; border: 1px solid #899bbd; border-radius: 1px">
                    <h5 class="card-title"><strong>ASSET INFORMATION</strong><br/>
                    <div class="row"  style="margin-top: 10px">
                      <div class="col-md-12">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Asset Name:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="nama_aset" name="nama_aset" placeholder="ASSET NAME"
                                  value="<?php echo $fetched_row['nama_aset']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Model:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="model" name="model" placeholder="MODEL"
                                  value="<?php echo $fetched_row['model']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Serial Number:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="no_siri" name="no_siri" placeholder="SERIAL NUMBER"
                                  value="<?php echo $fetched_row['no_siri']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Purchase Price:</label>
                                <div class="input-group">
                                  <span class="input-group-text">RM</span>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                    class="form-control" id="harga_beli" name="harga_beli" placeholder="PRICE"
                                    value="<?php echo $fetched_row['harga_beli']; ?>"
                                    oninput="formatDisposalValue(this)">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Warranty Period:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="warranty" name="warranty" placeholder="WARRANTY"
                                  value="<?php echo $fetched_row['warranty']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Colour:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="warna" name="warna" placeholder="COLOUR"
                                  value="<?php echo $fetched_row['warna']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Year of Purchase:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="tahun_beli" name="tahun_beli" placeholder="YEAR"
                                  value="<?php echo $fetched_row['tahun_beli']; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Kategori Aset - KEMUDAHAN (ID = 36) -->
                <?php
                }else if ($fetched_row['kategori_aset'] == 36) {
                ?>
                <div class="col-lg-20" style="margin-top: 10px">
                  <div class="col-md-12 mt-10" style="margin-top: 20px; border: 1px solid #899bbd; border-radius: 1px">
                    <h5 class="card-title"><strong>ASSET INFORMATION</strong><br/>
                    <div class="row"  style="margin-top: 10px">
                      <div class="col-md-12">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Asset Name:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="nama_aset" name="nama_aset" placeholder="ASSET NAME"
                                  value="<?php echo $fetched_row['nama_aset']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Model:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="model" name="model" placeholder="MODEL"
                                  value="<?php echo $fetched_row['model']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Serial Number:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="no_siri" name="no_siri" placeholder="SERIAL NUMBER"
                                  value="<?php echo $fetched_row['no_siri']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Purchase Price:</label>
                                <div class="input-group">
                                  <span class="input-group-text">RM</span>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                    class="form-control" id="harga_beli" name="harga_beli" placeholder="PRICE"
                                    value="<?php echo $fetched_row['harga_beli']; ?>"
                                    oninput="formatDisposalValue(this)">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Warranty Period:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="warranty" name="warranty" placeholder="WARRANTY"
                                  value="<?php echo $fetched_row['warranty']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Colour:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="warna" name="warna" placeholder="COLOUR"
                                  value="<?php echo $fetched_row['warna']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Year of Purchase:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="tahun_beli" name="tahun_beli" placeholder="YEAR"
                                  value="<?php echo $fetched_row['tahun_beli']; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Kategori Aset - KENDERAAN (ID = 37) -->
                <?php
                }else if ($fetched_row['kategori_aset'] == 37) {
                ?>
                <div class="col-lg-20" style="margin-top: 10px">
                  <div class="col-md-12 mt-10" style="margin-top: 20px; border: 1px solid #899bbd; border-radius: 1px">
                    <h5 class="card-title"><strong>ASSET INFORMATION</strong><br/>
                    <div class="row"  style="margin-top: 10px">
                      <div class="col-md-12">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Asset Name:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="nama_aset" name="nama_aset" placeholder="ASSET NAME"
                                  value="<?php echo $fetched_row['nama_aset']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Model:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="model" name="model" placeholder="MODEL"
                                  value="<?php echo $fetched_row['model']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Plate Number:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="no_siri" name="no_siri" placeholder="SERIAL NUMBER"
                                  value="<?php echo $fetched_row['no_siri']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Purchase Price:</label>
                                <div class="input-group">
                                  <span class="input-group-text">RM</span>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                    class="form-control" id="harga_beli" name="harga_beli" placeholder="PRICE"
                                    value="<?php echo $fetched_row['harga_beli']; ?>"
                                    oninput="formatDisposalValue(this)">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Colour:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="warna" name="warna" placeholder="COLOUR"
                                  value="<?php echo $fetched_row['warna']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Year of Purchase:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="tahun_beli" name="tahun_beli" placeholder="YEAR"
                                  value="<?php echo $fetched_row['tahun_beli']; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- If ada pertambahan kategori nanti -->
                <?php
                } else {
                ?>
                <!-- Fill in asset information -->
                <div class="col-lg-20" style="margin-top: 10px">
                  <div class="col-md-12 mt-10" style="margin-top: 20px; border: 1px solid #899bbd; border-radius: 1px">
                    <h5 class="card-title"><strong>ASSET INFORMATION</strong><br/>
                    <div class="row"  style="margin-top: 10px">
                      <div class="col-md-12">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Asset Name:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="nama_aset" name="nama_aset" placeholder="ASSET NAME"
                                  value="<?php echo $fetched_row['nama_aset']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Model:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="model" name="model" placeholder="MODEL"
                                  value="<?php echo $fetched_row['model']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Serial Number:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="no_siri" name="no_siri" placeholder="SERIAL NUMBER"
                                  value="<?php echo $fetched_row['no_siri']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Purchase Price:</label>
                                <div class="input-group">
                                  <span class="input-group-text">RM</span>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                    class="form-control" id="harga_beli" name="harga_beli" placeholder="PRICE"
                                    value="<?php echo $fetched_row['harga_beli']; ?>"
                                    oninput="formatDisposalValue(this)">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Warranty Period:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="warranty" name="warranty" placeholder="WARRANTY"
                                  value="<?php echo $fetched_row['warranty']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Colour:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="warna" name="warna" placeholder="COLOUR"
                                  value="<?php echo $fetched_row['warna']; ?>">
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Year of Purchase:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="tahun_beli" name="tahun_beli" placeholder="YEAR"
                                  value="<?php echo $fetched_row['tahun_beli']; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?>

                <!-- Fill in user information -->
                <div class="col-md-12 mt-10" style="margin-top: 20px; border: 1px solid #899bbd; border-radius: 1px">
                  <h5 class="card-title"><strong>USER INFORMATION</strong><br/>
                  <div class="row"  style="margin-top: 10px">
                    <div class="col-md-12">
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;">Staff Name:</label>
                                <?php
                                  $nama_kakitangan = $fetched_row['nama_kakitangan'];
                                  if (!empty($nama_kakitangan)){
                                    $nama_kakitangan2 = $nama_kakitangan;
                                  }
                                  else{
                                    $nama_kakitangan2 = "None";
                                  }
                                ?>
                                <select type="text" style="font-size: 1.4rem; line-height: 1.2; height: 34px"
                                  class="form-select" id="nama_kakitangan" name="nama_kakitangan" placeholder="STAFF NAME"
                                  value="<?php echo $nama_kakitangan2; ?>" onchange="updateDepartment()">
                                  <option value='-'>PLEASE SELECT STAFF NAME</option>
                                  <?php
                                        // onchange="updateDepartment()"
                                        $sqlAS = "SELECT * FROM empmaininfo
                                        INNER JOIN empdept ON empmaininfo.Department = empdept.dept_id
                                        ORDER BY CAST(Department AS UNSIGNED) ASC";
                                        include "../../db_conn.php";

                                        $resultA = mysqli_query($conn, $sqlAS);
                                        $countL = mysqli_num_rows($resultA);
                                        if ($countL > 0) {
                                          $off = 0;
                                          $i = 1 + $off;
                                            while ($rowL = mysqli_fetch_array($resultA)) {
                                              $fullname = $rowL['First_Name'] . ' ' . $rowL['Last_Name'];
                                              $selected = ($fullname == $nama_kakitangan2) ? 'selected' : '';
                                              
                                              // echo '<option value="' . $rowL['name'] . '">' . $fullname . '</option>';
                                              $staffID = $rowL['Internal_Id'];
                                              // echo '<option value=' . $staffID . '>' . $fullname . '</option>';
                                              echo '<option value="' . $fullname . '" data-department="' . $rowL['name'] . '"data-staffID="' . $staffID . '" ' . $selected . '>' . $fullname . '</option>';
                                              $i++;
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Department Location:</label>
                                <?php
                                  $current_jab = $fetched_row['lokasi_jabatan'];
                                  if (!empty($current_jab)) {
                                    $sqlAB2 = "SELECT * FROM empdept WHERE dept_id = $current_jab";
                                    include "../../db_conn.php";

                                    $result19 = mysqli_query($conn, $sqlAB2);
                                    if ($result19) {
                                        $row = mysqli_fetch_assoc($result19);
                                        $lokasi_jabatan2 = $row['name'];
                                    } else {
                                      $lokasi_jabatan2 = "None";
                                    }
                                  } else {
                                    $lokasi_jabatan2 = "None";
                                  }
                                  ?>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.2; height: 34px"
                                    class="form-control" id="lokasi_jabatan" name="lokasi_jabatan" placeholder="DEPARTMENT LOCATION"
                                    value="<?php echo $lokasi_jabatan2; ?>" readonly>
                                  <script>
                                    function updateDepartment() {
                                        var selectedUser = document.getElementById("nama_kakitangan");
                                        var selectedDepartment = selectedUser.options[selectedUser.selectedIndex].dataset.department;
                                        document.getElementById("lokasi_jabatan").value = selectedDepartment;  
                                    }
                                  </script>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Fill in supplier information -->
                <div class="col-md-12 mt-10" style="margin-top: 20px; margin-bottom: 20px; border: 1px solid #899bbd; border-radius: 1px">
                  <h5 class="card-title"><strong>SUPPLIER INFORMATION</strong><br/>
                  <div class="row"  style="margin-top: 10px">
                    <div class="col-md-12">                       
                      <div class="box-body">
                        <div class="row">
                          <?php
                            $NamaPembekal = $fetched_row['id_pembekal'];
                            if (!empty($NamaPembekal)) {
                              $sql9 = "SELECT * FROM tbl_pembekal WHERE id_pembekal  = $NamaPembekal";
                              require('../../configAsetTPS.php');

                              $result9 = mysqli_query($conn2, $sql9);
                              if ($result9) {
                                  $row = mysqli_fetch_assoc($result9);
                                  $NamaPembekal = $row['nama_pembekal'];
                                  $emel_pembekal = $row['emel_pembekal'];
                                  $alamat_pembekal = $row['alamat_pembekal'];
                                  $notel_pembekal = $row['notel_pembekal'];
                              } else {
                                  $NamaPembekal = "None";
                                  $emel_pembekal = "None";
                                  $alamat_pembekal = "None";
                                  $notel_pembekal = "None";
                              }
                            } else {
                                $NamaPembekal = "None";
                                $emel_pembekal = "None";
                                $alamat_pembekal = "None";
                                $notel_pembekal = "None";
                            }
                          ?>
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;">Supplier Name:</label>
                                <select type="text" style="font-size: 1.4rem; line-height: 1.2; height: 34px"
                                  class="form-select" id="nama_pembekal" name="nama_pembekal"
                                  value="<?php echo $NamaPembekal; ?>" onchange="updatePembekal()">
                                  <option value='-'>PLEASE SELECT SUPPLIER NAME</option>
                                      <?php
                                      $sqlP = "SELECT * FROM tbl_pembekal ORDER BY nama_pembekal ASC";
                                      require('../../configAsetTPS.php');

                                      $result2 = mysqli_query($conn2, $sqlP);
                                      $countP = mysqli_num_rows($result2);

                                      if ($countP > 0) {
                                        $off = 0;
                                        $i = 1 + $off;

                                        while ($rowP = mysqli_fetch_array($result2)) {
                                          $selected = ($rowP['nama_pembekal'] == $NamaPembekal) ? 'selected' : '';
                                          echo '<option value="' . $rowP['id_pembekal'] . '" data-alamat="' . $rowP['alamat_pembekal'] . '" data-email="' . $rowP['emel_pembekal'] . '" data-notel="' . $rowP['notel_pembekal'] . '" ' . $selected . '>' . $rowP['nama_pembekal'] . '</option>';
                                          $i++;
                                        }
                                      }
                                      ?>
                                  </select>
                            </div>
                          </div>
                          <script>
                            function updatePembekal() {
                              var selectedUser = document.getElementById("nama_pembekal");
                              var selectedAlamat = selectedUser.options[selectedUser.selectedIndex].dataset.alamat;
                              document.getElementById("alamat_pembekal").value = selectedAlamat;
                              var selectedEmail = selectedUser.options[selectedUser.selectedIndex].dataset.email;
                              document.getElementById("email_pembekal").value = selectedEmail;
                              var selectedNoTel = selectedUser.options[selectedUser.selectedIndex].dataset.notel;
                              document.getElementById("notel_pembekal").value = selectedNoTel;
                            }
                          </script>
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;">Supplier Address:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.2; height: 34px"
                                  class="form-control" id="alamat_pembekal" name="alamat_pembekal" 
                                  value="<?php echo $emel_pembekal; ?>" readonly>
                                  
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;">Supplier Email:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.2; height: 34px"
                                  class="form-control" id="email_pembekal" name="email_pembekal"
                                  value="<?php echo $alamat_pembekal; ?>" readonly>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;">Supplier Phone No.:</label>
                                <input type="text" style="font-size: 1.4rem; line-height: 1.2; height: 34px"
                                  class="form-control" id="notel_pembekal" name="notel_pembekal"
                                  value="<?php echo $notel_pembekal; ?>" readonly>
                            </div>
                          </div>
                          <!-- hidden kategori field for posting to database -->
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;"> </label>
                                <input type="hidden" style="font-size: 1.4rem; line-height: 1.2; height: 34px"
                                  class="form-control" id="kategori" name="kategori" value="<?php echo $kategori_id ?>" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- button row -->
                <div class="col-md-2">
                  <div class="form-group" style="margin-top: 10px">
                    <button type="submit" name="btn-update" id="btn-update" class="btn btn-success btn-lg" style="font-size: 15px">Update</button>
                    <button type="submit" name="btn-cancel" id="btn-cancel" class="btn btn-danger btn-lg" style="font-size: 15px">Cancel</button>
                  </div></br></br>
                </div>
                
              </h5>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
}
?>

  </main><!-- End #main -->

  
  <footer id="footer" class="footer">
    <div class="copyright">
      Copyright &copy; <script>
        document.write(new Date().getFullYear())
      </script>
      <strong><span>MICTH SYSTEM</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
       <a href="https://www.micth.com//">MELAKA ICT HOLDINGS SDN. BHD.</a>
    </div>
  </footer><!-- End Footer -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>


<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../bower_components/raphael/raphael.min.js"></script>
<script src="../../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI Datepicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

  <script>

    $(function() {
      $("#tarikh_daftar").datepicker({
        dateFormat: 'yy-mm-dd',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        autoclose: true
      });
    });
  
    $(function() {
      $("#tarikh_serahan").datepicker({
        dateFormat: 'yy-mm-dd',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        autoclose: true
      });
    });

    $(document).ready(function() {
      $('#datatable').DataTable({
          searching: true,
          info: true,
          paging: true,
          dom: 'Bfrtip',
          buttons: ['print']
      });
    });

  </script>

</body>
</html>
<?php
// }else{
// header('Location: index.php'); 
// }
?>