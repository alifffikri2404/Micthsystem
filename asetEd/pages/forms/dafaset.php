<?php
// require('../../config.php');
require('../../configAsetTPS.php');
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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';

?>

<?php

date_default_timezone_set("Asia/Bangkok");
$cM = date("m");
$cY = date("Y");
$cDate = date("Y-m-d");

// if(($idp<>'')&&($lvl<>'')){

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

if (empty($_SESSION['First_Name'])) {
  header("Location: ../../iout.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MICTH | IntSys</title> -->

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Asset Register</title>
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

  <!-- Searchable Select Box -->
  <!-- Select2 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Select2 JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

</head>
<style>
.sb {
  box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
  height: 100%;
  width: 100%;
  background-color: white;
  border: 1px solid white;
  overflow: auto;
  white-space: nowrap;
}

.title-label {
  font-weight: 400;
}

.placeholder-label {
  font-size: 1.4rem;
  line-height: 1.0;
  height: 34px;
}
</style>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- Logo -->
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
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo "Me"; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['First_Name']; ?></h6>
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

    <li class="nav-item">
      <a class="nav-link collapsed" href="../../../main_user.php">
        <i class="bi bi-house-door-fill"></i>
        <span>Home</span>
      </a>
    </li>

    <?php if ($_SESSION['access_imobile'] == "1") { ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#booking-system-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-calendar-check-fill"></i>
        <span>Booking System</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="booking-system-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="../../../BookingSystem/user.php">
            <i class="bi bi-house-door-fill" style="font-size: 1em"></i>
            <span>Dashboard</span>
          </a>
        </li> -->
      
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#book-vehicle-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
            <i class="bi bi-car-front-fill" style="font-size: 1em"></i></i><span>Vehicle</span>
            <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
          </a>
          <ul id="book-vehicle-nav" class="nav-content collapse" data-bs-parent="#booking-system-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../BookingSystem/user_booking_vehicle.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Book Vehicle</span>
              </a>
            </li>
            <?php if ($_SESSION['admin_booking'] == "1") { ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../BookingSystem/list_vehicle.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>List of Vehicle</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../BookingSystem/add_vehicle.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Add Vehicle</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../BookingSystem/usage_record_monthly.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>All Usage Record</span>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../BookingSystem/user_record.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Staff Usage Record</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#book-room-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
            <i class="bi bi-door-closed-fill" style="font-size: 1em"></i></i><span>Room</span>
            <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
          </a>
          <ul id="book-room-nav" class="nav-content collapse" data-bs-parent="#booking-system-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../BookingSystem/user_booking_Room.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Book Room</span>
              </a>
            </li>
            <?php if ($_SESSION['admin_booking'] == "1") { ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../BookingSystem/list_room.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>List of Room</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../BookingSystem/add_room.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Add Room</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../BookingSystem/room_record_monthly.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>All Usage Record</span>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../BookingSystem/user_record_Room.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Staff Usage Record</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    <?php } ?>


    <?php if ($_SESSION['access_isurat'] == "1") { ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#letter-system-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-envelope-fill"></i>
        <span>Letter System</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="letter-system-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li class="nav-item">
          <a class="nav-link collapsed" href="../../../SuratLatest/SuratDaftarSuratKeluar.php">
            <i class="bi bi-pencil-square" style="font-size: 1em"></i>
            <span>Register Outgoing Letter</span>
          </a>
        </li>
        <?php if ($_SESSION['admin_surat'] == "1"){ ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../../../SuratLatest/SuratDaftarSuratMasuk.php">
            <i class="bi bi-pencil-square" style="font-size: 1em"></i>
            <span>Register Incoming Letter</span>
          </a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#record-letter-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
            <i class="bi bi-file-earmark-text" style="font-size: 1em"></i></i><span>Letter Record</span>
            <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
          </a>
          <ul id="record-letter-nav" class="nav-content collapse" data-bs-parent="#letter-system-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../SuratLatest/SuratRekodSuratKeluar.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Outgoing Letter</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../SuratLatest/SuratRekodSuratMasuk.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Incoming Letter</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>

    <?php } ?>

    <?php if ($_SESSION['access_eoutstation'] == "1") { ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#out-system-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-door-open-fill"></i>
        <span>Outstation System</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="out-system-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="../../../eoustation3.0/dash2.php">
            <i class="bi bi-house-door-fill" style="font-size: 1em"></i>
            <span>Dashboard</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="../../../eoustation3.0/dashStaff.php">
            <i class="bi bi-calendar-fill" style="font-size: 1em"></i>
            <span>My Report</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../../../eoustation3.0/FormStaff.php">
            <i class="bi bi-pencil-fill" style="font-size: 1em"></i>
            <span>Check-Out</span>
          </a>
        </li>
        <?php if ($_SESSION['admin_outstation'] == "1") { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#hr-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
            <i class="bi bi-people" style="font-size: 1em"></i></i><span>Human Resources</span>
            <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
          </a>
          <ul id="hr-nav" class="nav-content collapse" data-bs-parent="#out-system-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../eoustation3.0/myreport.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>View Report</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../eoustation3.0/data.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Generate Report</span>
              </a>
            </li>
            <?php
            include('../../../eoustation3.0/db_conn.php');
            $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00'";
            $result = mysqli_query($conn, $sql);
            $totalRows = mysqli_num_rows($result);
            ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../eoustation3.0/SNC.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i>
                <p style="margin-bottom: 0px">Pending Staff Check-In<span class="float-right badge bg-danger">
                    <?php echo $totalRows ?? 'No data'; ?>
                  </span></p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </li>

    <?php } ?>
    <?php if ($_SESSION['access_aset'] == "1") { ?>
    <li class="nav-item">
      <a class="nav-link" data-bs-target="#asset-system-nav" data-bs-toggle="collapse" href="#" href="">
        <i class="bi bi-briefcase-fill"></i>
        <span>Asset System</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="asset-system-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li class="nav-item">
          <a class="nav-link collapsed" href="../tables/staffregaset.php">
            <i class="bi bi-archive-fill" style="font-size: 1em"></i>
            <span>Registered Asset</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../forms/staffreqaset.php">
            <i class="bi bi-clipboard2-check-fill" style="font-size: 1em"></i>
            <span>Request New Asset</span>
          </a>
        </li>
        <?php if ($_SESSION['admin_asset'] == "1") { ?>
        <li class="nav-item">
          <a class="active" href="../forms/dafaset.php">
            <i class="bi bi-pencil-square" style="font-size: 1em; background-color: transparent"></i>
            <span>Register New Asset</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../tables/laporanas.php">
            <i class="bi bi-file-earmark-text-fill" style="font-size: 1em"></i>
            <span>Asset & Inventory</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../tables/laporlupus.php">
            <i class="bi bi-file-earmark-x-fill" style="font-size: 1em"></i>
            <span>Disposal Report</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../tables/staffrequest.php">
            <i class="bi bi-check-circle-fill" style="font-size: 1em"></i>
            <span>Staff Request</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../forms/uploadcsv.php">
            <i class="bi bi-file-excel-fill" style="font-size: 1em"></i>
            <span>Import Excel</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../../hometetapan.php">
            <i class="bi bi-gear-fill" style="font-size: 1em"></i>
            <span>Asset Settings</span>
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>

    <?php } ?>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#settings-system-nav" data-bs-toggle="collapse" href="#" href="">
        <i class="bi bi-gear-fill"></i>
        <span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="settings-system-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li class="nav-item">
          <a class="nav-link collapsed" href="../../../setting.php">
            <i class="bi bi-person-fill" style="font-size: 1em"></i>
            <span>Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../../../feedback.php">
            <i class="bi bi-chat-right-text-fill" style="font-size: 1em"></i>
            <span>Feedback</span>
          </a>
        </li>
        <?php if ($_SESSION['func_admin'] == "1") { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../../../feedback_report.php">
            <i class="bi bi-chat-right-dots-fill" style="font-size: 1em"></i>
            <span>Feedback Report</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#access-user-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
            <i class="bi bi-person-badge-fill" style="font-size: 1em"></i></i><span>Access User</span>
            <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
          </a>
          <ul id="access-user-nav" class="nav-content collapse" data-bs-parent="#settings-system-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../eoustation3.0/register.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Register New User</span>
              </a>
            </li>  
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../SSO/accessSSO.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Access View</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../../../SSO/userSSO.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Staff List</span>
              </a>
            </li>

          </ul>
        </li>
        <?php } ?>
      </ul>
    </li>

    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Register Asset Record</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
          <li class="breadcrumb-item"><a href="../../../main_user.php">Home Page</a></li>
          <li class="breadcrumb-item active">Asset Register</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Asset Selection Form -->
        <div class="col-12">
          <div class="card top-selling">
            <div class="card-body">
              <h5 class="card-title"><strong>SELECT ASSET NUMBER</strong>

              <?php


              require('../../configAsetTPS.php');

              $selected_category = $_POST['id_kategori'] ?? '';
              $selected_sub_category = $_POST['Sub_Category'] ?? '';
              $newAssetNumber = '';

              $sqlCategory = "SELECT * FROM kategoritps";
              $resultCategory = mysqli_query($conn2, $sqlCategory);

              if (isset($_POST['submit1'])) {
                $id_kategori = mysqli_real_escape_string($conn2, $_POST['id_kategori'] ?? '');
                $sub_category = mysqli_real_escape_string($conn2, $_POST['Sub_Category'] ?? '');
                $model_id = mysqli_real_escape_string($conn2, $_POST['Subsub_Category'] ?? '');
                $registration_date = mysqli_real_escape_string($conn2, $_POST['RegistrationDate'] ?? '');
                $warranty = mysqli_real_escape_string($conn2, $_POST['warranty'] ?? '');
                $harga_beli = mysqli_real_escape_string($conn2, $_POST['harga_beli'] ?? '');
                $harga_beli = number_format((float)$harga_beli, 2, '.', ',');
                $harga_beli = 'RM ' . $harga_beli;
                                $no_siri = mysqli_real_escape_string($conn2, $_POST['no_siri'] ?? '');
                $nama_pembekal = mysqli_real_escape_string($conn2, $_POST['nama_pembekal'] ?? '');
                $color = mysqli_real_escape_string($conn2, $_POST['color'] ?? '');

                if ($conn2) {



                  $sqlSubCategory = "SELECT * FROM jenis_aset WHERE type_aset = '$sub_category'";
                  $resultCategory = mysqli_query($conn2, $sqlSubCategory);
                  $row = mysqli_fetch_assoc(result: $resultCategory);
                  $id_sub_category = $row['idsubcategory'] ?? '';
                  $id_kategori2 = $row['id_kategori'] ?? '';
                  $jenisaset = $row['type_aset'] ?? '';
                  
                  $sqlCategoryDetails = "SELECT * FROM kategoritps WHERE id_kategori = '$id_kategori'";
                  $resultCategoryDetails = mysqli_query($conn2, $sqlCategoryDetails);
                  $row = mysqli_fetch_assoc($resultCategoryDetails);
                  $nama_kategori = $row['nama_kategori'] ?? '';

                  $sqlModelDetails = "SELECT * FROM sub_sub_category WHERE idsubcategory = '$jenisaset' AND id_sub_sub_category = '$model_id'";
                  $resultModelDetails = mysqli_query($conn2, $sqlModelDetails);
                  $row = mysqli_fetch_assoc($resultModelDetails);
                  $jenis_sub_sub_category = $row['jenis_sub_sub_category'] ?? '';






$sqlBO = "SELECT LPAD(Running_No, 3, '0') as Running_No FROM asset_management_vba 
          WHERE Category_ID = '$id_kategori' AND Sub_Category_ID = '$id_sub_category' 
          AND Model_ID = '$model_id' ORDER BY Running_No DESC LIMIT 1";
$resultBO = mysqli_query($conn2, $sqlBO);
$fetchedBO = mysqli_fetch_assoc($resultBO);

$id_kategori = str_pad($id_kategori, 2, '0', STR_PAD_LEFT);
$id_sub_category = str_pad($id_sub_category, 2, '0', STR_PAD_LEFT);
$model_id = str_pad($model_id, 2, '0', STR_PAD_LEFT);
$running_no = str_pad(($fetchedBO['Running_No'] ?? 0) + 1, 3, '0', STR_PAD_LEFT);

$newAssetNumber = "MICTH/Asset/$id_kategori/$id_sub_category/$model_id/$running_no";

                  

                  $sqlInsert = "
          INSERT INTO asset_management_vba (
              Category, Category_ID, Sub_Category, Sub_Category_ID, 
              Model, Model_ID, Running_No, `Full_ID (Concatenated ID)`, 
              Barcode, SERIAL_NO, DATE_OF_PURCHASE, SUPPLIER, 
              status, lokasi, warna, pemilik_aset, 
              tarikh_daftar, tarikh_serahan, warranty, 
              nama_kakitangan, id_pembekal, harga
          ) VALUES (
              '$nama_kategori', '$id_kategori', '$sub_category', '$id_sub_category',
              '$jenis_sub_sub_category', '$model_id', '$running_no', '$newAssetNumber',
              '$newAssetNumber', '$no_siri', '$registration_date', '$nama_pembekal',
              'Pending', '', '$color', '', '', '', '$warranty', '', '', '$harga_beli'
          )";




                  $sqlP = "SELECT * FROM tbl_pembekal where id_pembekal = $nama_pembekal";
                  require('../../configAsetTPS.php');

                  $result2 = mysqli_query($conn2, $sqlP);


                  while ($rowP = mysqli_fetch_array($result2)) {
                    $nama_pembekal2 = $rowP['nama_pembekal'];
                  }




                  if (mysqli_query($conn2, $sqlInsert)) {
                    echo "
              <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              <script>
                  Swal.fire({
                      icon: 'success',
                      title: 'Success!',
                      text: 'Asset registered successfully.',
                      confirmButtonText: 'OK'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.href = 'dafaset.php';
                      }
                  });
              </script>";

                    try {
                      $mail = new PHPMailer(true);

                      $mail->isSMTP();
                      $mail->Host = 'smtp.gmail.com';
                      $mail->SMTPAuth = true;
                      $mail->Username = 'abdallah.wedud@micth.com';
                      $mail->Password = 'ztjhqhsrlcdcfyiq';
                      $mail->SMTPSecure = 'ssl';
                      $mail->Port = 465;

                      $mail->setFrom('wedud123zz@gmail.com');
                      $mail->addAddress('wedud123zz@gmail.com');
                      $mail->isHTML(true);

                      $mail->Subject = 'Approval Request for New Asset regestered';
                      $mail->Body = 'Dear Encik farid and Encik Hod,<br><br>
                Please be informed that a request for a new asset has been submitted and is awaiting your approval. Below are the details of the request:<br><br>
                
               Category: ' . $nama_kategori . '<br>
                Sub category: ' . $sub_category . '<br>
                                No.Asset: ' . $newAssetNumber . '<br>

                Model: ' . $jenis_sub_sub_category . '<br>
                Harga: RM' .  $harga_beli . '<br>
                No.Siri: ' . $no_siri . '<br>

                Supplier: ' . $nama_pembekal2 . '<br><br>
                Please review the details and provide your approval at your earliest convenience.
                <br><br>
                To approve or reject this request, please follow the link below:
                https://i.micth.com/Micthsystem/
                <br><br>
                MICTH SYSTEM
                <br><br>
                Please note: This email is sent as a notification only. Please do not reply to this email.';
                      $mail->send();
                    } catch (Exception $e) {
                      $msg .= "<div class='alert alert-danger'>Error: {$mail->ErrorInfo}</div>";
                    }
                  } else {
                    echo "
              <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              <script>
                  Swal.fire({
                      icon: 'error',
                      title: 'Error!',
                      text: 'Error: " . mysqli_error($conn2) . "',
                  });
              </script>";
                  }
                } else {
                  die("Connection failed: " . mysqli_connect_error());
                }
              }

              ?>



              <form role="form" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <div class="row" style="margin-top: 10px">
                  <!-- Asset Category Dropdown -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="asset_category" class="title-label">Asset Category:</label>
                      <select class="form-control placeholder-label" id="id_kategori" name="id_kategori" onchange="this.form.submit()">
                        <option value="">-- Select Asset Category --</option>
                        <?php
                        if ($resultCategory && mysqli_num_rows($resultCategory) > 0) {
                          while ($row = mysqli_fetch_assoc($resultCategory)) {
                            $selected = ($selected_category == $row['id_kategori']) ? 'selected' : '';
                            echo "<option value='{$row['id_kategori']}' $selected>{$row['nama_kategori']}</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <!-- Sub-Category Dropdown -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="Sub_Category" class="title-label">Sub Category:</label>
                      <select class="form-select placeholder-label" id="Sub_Category" name="Sub_Category" onchange="this.form.submit()">
                        <option value="">-- Select Sub Category --</option>
                        <?php
                        if (!empty($selected_category)) {
                          $sqlSubCategory = "SELECT * FROM jenis_aset WHERE id_kategori = ?";
                          $stmt = $conn2->prepare($sqlSubCategory);
                          $stmt->bind_param("i", $selected_category);
                          $stmt->execute();
                          $resultSubCategory = $stmt->get_result();

                          while ($row1 = $resultSubCategory->fetch_assoc()) {
                            $selected_sub = ($selected_sub_category == $row1['type_aset']) ? 'selected' : '';
                            echo "<option value='{$row1['type_aset']}' $selected_sub>{$row1['type_aset']}</option>";
                          }
                          $stmt->close();
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <!-- Model Dropdown -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="Sub_subCategory" class="title-label">Model:</label>
                      <select class="form-select placeholder-label" id="Sub_subCategory" name="Subsub_Category">
                        <option value="">-- Select Model --</option>
                        <?php
                        if (!empty($selected_sub_category)) {
                          $sqlModel = "SELECT * FROM sub_sub_category WHERE idsubcategory = ?";
                          $stmt = $conn2->prepare($sqlModel);
                          $stmt->bind_param("s", $selected_sub_category);
                          $stmt->execute();
                          $resultModel = $stmt->get_result();

                          while ($row3 = $resultModel->fetch_assoc()) {
                            echo "<option value='{$row3['id_sub_sub_category']}'>{$row3['jenis_sub_sub_category']}</option>";
                          }
                          $stmt->close();
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="no_siri" class="title-label">Colour:</label>
                      <input type="text" class="form-control placeholder-label" id="color" name="color" required>
                    </div>
                  </div>
                </div>

                <!-- Additional Fields -->
                <div class="row" style="margin-top: 10px">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="RegistrationDate" class="title-label">Registration Date:</label>
                      <input type="date" class="form-control placeholder-label" id="RegistrationDate" name="RegistrationDate" required>
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="no_siri" class="title-label">Serial Number:</label>
                      <input type="text" class="form-control placeholder-label" id="no_siri" name="no_siri" required>
                    </div>
                  </div>



                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="warranty" class="title-label">Warranty Period:</label>
                      <input type="text" class="form-control placeholder-label" id="warranty" name="warranty" required>
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="harga_beli" class="title-label">Purchase Price:</label>
                      <input type="number" class="form-control placeholder-label" id="harga_beli" name="harga_beli" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="jenis" class="title-label">Supplier Name:</label>
                      <select type="text" class="form-select placeholder-label" id="nama_pembekal" name="nama_pembekal" placeholder="SUPPLIER NAME" onchange="updatePembekal()">
                        <option value="">-- Select Supplier Name --</option>
                        <?php
                        $sqlP = "SELECT * FROM tbl_pembekal ORDER BY nama_pembekal ASC";
                        require('../../configAsetTPS.php');

                        $result2 = mysqli_query($conn2, $sqlP);
                        $countP = mysqli_num_rows($result2);

                        if ($countP > 0) {
                          $off = 0;
                          $i = 1 + $off;

                          while ($rowP = mysqli_fetch_array($result2)) {
                            echo ' 
                              <option value="' . $rowP['id_pembekal'] . '" data-alamat="' . $rowP['alamat_pembekal'] . '" data-email="' . $rowP['emel_pembekal'] . '" data-notel="' . $rowP['notel_pembekal'] . '" ' . $rowP['id_pembekal'] . '>' . $rowP['nama_pembekal'] . '</option>
                            ';
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
                      <label for="jenis" class="title-label">Supplier Address:</label>
                      <input type="text" class="form-control placeholder-label" id="alamat_pembekal" name="alamat_pembekal"
                        placeholder="SUPPLIER ADDRESS" readonly>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="jenis" class="title-label">Supplier Email:</label>
                      <input type="text" class="form-control placeholder-label" id="email_pembekal" name="email_pembekal"
                        placeholder="SUPPLIER EMAIL" readonly>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="jenis" class="title-label">Supplier Phone No.:</label>
                      <input type="text" class="form-control placeholder-label" id="notel_pembekal" name="notel_pembekal"
                        placeholder="SUPPLIER PHONE NO." readonly>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px">
                    <div class="col-md-5">
                      <button type="submit" name="submit1" class="btn btn-primary btn-lg" style="font-size: 15px">Register Asset</button>
                    </div>
                  </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End Main -->


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
        dateFormat: 'd/m/yy',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        autoclose: true
      });
    });

    $(function() {
      $("#tarikh_serahan").datepicker({
        dateFormat: 'd/m/yy',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        autoclose: true
      });
    });

    $(document).ready(function() {
      $('#jenis').select2();
    });
  </script>

</body>

</html>
<?php
// }else{
// header('Location: index.php'); 
// }
?>