<?php
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

	date_default_timezone_set("Asia/Bangkok");
	$cM = date("m");
	$cY = date("Y");
	$cDate = date("Y-m-d");
							
	
// if(($idp<>'')&&($lvl<>'')){

  require('../../functions.php'); 

 
 if(isset($_POST['view'])){
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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Asset Category & Type</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 5.3.3 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-5.3.3-dist/css/bootstrap.min.css">

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

  <!-- Favicons -->
  <link href="../../assets/img/micthlogo.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!-- DataTable CSS  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
.dataTables_wrapper .dataTables_paginate .paginate_button {
  border: 1px solid #ccc;
  background-color: #f2f2f2;
}

.pagination>li>a{
  background: transparent;
}

.form-inline .form-control {
  display: inline-block;
  width: auto;
  vertical-align: middle;
}

.title-label {
  font-weight: 400;
}

.placeholder-label {
  font-size: 1.0rem;
  line-height: 1.0;
  height: 34px;
}

.modal-title{
  font-family: "Poppins", sans-serif;
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
          <a class="nav-link collapsed" href="../forms/dafaset.php">
            <i class="bi bi-pencil-square" style="font-size: 1em"></i>
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
          <a class="active" href="../../hometetapan.php">
            <i class="bi bi-gear-fill" style="font-size: 1em; background-color: transparent"></i>
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
    <h1>Category & Type</strong></h1>
    <nav>
      <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
        <li class="breadcrumb-item"><a href="../../../main_user.php">Home Page</a></li>
        <li class="breadcrumb-item"><a href="../../hometetapan.php">Settings</a></li>
        <li class="breadcrumb-item active">Category & Type</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-20">
        <div class="row">
          <!-- Recent Sales -->
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card top-selling">
          <div class="sb">
            <div class="card-body" style="padding: 0px 20px 0px 20px">
              <h5 class="card-title"><strong>NEW CATEGORY & TYPE</strong><br/>

              <div class="col-lg-11 col-xs-6" style="padding-left: 0px">
                <!-- small box for category -->
                <div class="small-box" style="margin-top: 20px; border-radius: 20px 20px;
                  background-color: #83B582; color: #fff">
                  <div class="inner">
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 32px;">Category</h3>
                  </div>
                  <div class="icon">
                    <i class="bi bi-archive-fill" style="font-size: 0.75em"></i>
                  </div>
                  <a href="#modalCategory" data-bs-toggle="modal" data-bs-target="#modalCategory" class="small-box-footer" style="background-color: transparent; padding: 10px">Register New Category <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-11 col-xs-6" style="padding-left: 0px">
              <!-- small box for asset type -->
                <div class="small-box" style="margin-top: 20px; border-radius: 20px 20px;
                  background-color: #5B8B83; color: #fff">
                  <div class="inner">
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 32px;">Sub-Category </h3>
                  </div>
                  <div class="icon">
                    <i class="bi bi-tools" style="font-size: 0.75em"></i>
                  </div>
                  <a href="#modalType" data-bs-toggle="modal" data-bs-target="#modalType" class="small-box-footer" style="background-color: transparent; padding: 10px">Register New Sub <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-11 col-xs-6" style="padding-left: 0px">
              <!-- small box for asset type -->
                <div class="small-box" style="margin-top: 20px; border-radius: 20px 20px;
                  background-color: #B5A382; color: #fff">
                  <div class="inner">
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 32px;">Model</h3>
                  </div>
                  <div class="icon">
                    <i class="bi bi-tools" style="font-size: 0.75em"></i>
                  </div>
                  <a href="#sub" data-bs-toggle="modal" data-bs-target="#sub" class="small-box-footer" style="background-color: transparent; padding: 10px">Register New Model<i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              
              <!-- modal for register new category -->
              <div class="modal fade" id="modalCategory" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Insert New Category</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form role="form" action="" method="post">
                      <div class="modal-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="InputNamaKategori" class="title-label">Category Name: </label>
                                <input type="text" class="form-control placeholder-label" id="InputNamaKategori" name="InputNamaKategori" placeholder="CATEGORY NAME" required>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="InputKodKategori" class="title-label">Category Code: </label>
                                <input type="text" class="form-control placeholder-label" id="InputKodKategori" name="InputKodKategori" placeholder="CODE" required>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit1" id="submit1" class="btn btn-primary">Register</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- End modal-->

              <!-- modal for register new asset type -->
              <div class="modal fade" id="sub" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Insert New Model</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form role="form" action="" method="post">
                      <div class="modal-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="Kategori" class="title-label"> Sub Category: </label>
                                  <select class="form-select placeholder-label" id="Sub_subcategory" name="Sub_subcategory" placeholder="CATEGORY NAME" required>
                                    <?php
                                      $sqlL = "SELECT * FROM jenis_aset ORDER BY id ASC";
                                      $result = mysqli_query($conn2,$sqlL);
                                      $countL = mysqli_num_rows($result);
                                      if($countL > 0)
                                      {
                                      
                                      $off = 0;
                                      $i = 1 + $off;
                                      while($rowL = mysqli_fetch_array($result)) {
                                      echo '<option value='.$rowL['type_aset'].'>'.$rowL['type_aset'].'</option>';				 
                                      $i++;
                                      }
                                      }
                                    ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputPassword1" class="title-label">Model: </label>
                                <input type="text" class="form-control placeholder-label" id="jenis_aset" name="Model" placeholder="Model" required>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit3" id="submit3" class="btn btn-primary">Register</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- End modal-->
              <div class="modal fade" id="modalType" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Insert New Sub-Category </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form role="form" action="" method="post">
                      <div class="modal-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="Kategori" class="title-label">Category:</label>
                                  <select class="form-select placeholder-label" id="kategori" name="kategori" placeholder="CATEGORY NAME" required>
                                    <?php
                                      $sqlL = "SELECT * FROM kategoritps ORDER BY id_kategori ASC";
                                      $result = mysqli_query($conn2,$sqlL);
                                      $countL = mysqli_num_rows($result);
                                      if($countL > 0)
                                      {
                                      
                                      $off = 0;
                                      $i = 1 + $off;
                                      while($rowL = mysqli_fetch_array($result)) {
                                      echo '<option value='.$rowL['id_kategori'].'>'.$rowL['nama_kategori'].'</option>';				 
                                      $i++;
                                      }
                                      }
                                    ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputPassword1" class="title-label">Asset Name:</label>
                                <input type="text" class="form-control placeholder-label" id="jenis_aset" name="jenis_aset" placeholder="ASSET NAME" required>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit2" id="submit2" class="btn btn-primary">Register</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- End modal-->

            </div>
          </div>
        </div>
      </div>

      <!-- Notification dan insert ke dalam category table -->
      <?php
        //Keluarkan notification untuk mesej berjaya
        function paparMesejBerjayaAsetA($idasetFF)
        {

          echo '<script type="text/javascript">alert("Category successfully added!");
        window.location="tetapanAset.php";</script>';
        }

        //Keluarkan notification untuk mesej GAGAL
        function paparMesejGagalA()
        {

          echo "<script type='text/javascript'>\n";
          echo "alert('Oops! Error occurred, failed to add new category!');\n";
          echo "history.go(-1);\n";
          echo "</script>";
          exit();
        }

        //Keluarkan notification untuk mesej GAGAL
        function paparMesejGagal1A()
        {

          echo "<script type='text/javascript'>\n";
          echo "alert('Sorry, your application failed to proceed.');\n";
          echo "history.go(-1);\n";
          echo "</script>";
          exit();
        }

        if (isset($_POST['submit1'])) {
        $InputNamaKategori = isset($_POST['InputNamaKategori']) ? mysqli_real_escape_string($conn2, $_POST['InputNamaKategori']) : '';
        $InputKodKategori = isset($_POST['InputKodKategori']) ? mysqli_real_escape_string($conn2, $_POST['InputKodKategori']) : '';

        try {
        $sqlA = "SELECT * FROM kategoritps WHERE nama_kategori = '$InputNamaKategori'";
        $resultA = mysqli_query($conn2, $sqlA);

        if (!$resultA) {
            die("Error: " . mysqli_error($conn2));
        }

        if (mysqli_num_rows($resultA) > 0) {
            echo "<script type='text/javascript'>\n";
            echo "alert('Category name or code already exists. Please register with a different category name or code!');\n";
            echo "</script>";
        } else {
            try {
                $sql1 = "INSERT INTO kategoritps (nama_kategori, kod) VALUES ('$InputNamaKategori', '$InputKodKategori')";
                $query1 = mysqli_query($conn2, $sql1);

                if (!$query1) {
                    die("Error: " . mysqli_error($conn2));
                }

                $sql11 = "SELECT * FROM kategoritps WHERE nama_kategori = '$InputNamaKategori' AND kod = '$InputKodKategori'";
                $result2 = mysqli_query($conn2, $sql11);

                if (!$result2) {
                    die("Error: " . mysqli_error($conn2));
                }

                if (mysqli_num_rows($result2) > 0) {
                    paparMesejBerjayaAsetA("Category successfully added!");
                } else {
                    paparMesejGagal1A();
                }
            } catch (Exception $e) {
                echo 'Caught exception check condition applied: ', $e->getMessage(), "\n";
            }
          }
        } catch (Exception $e) {
        echo 'Caught exception insert: ', $e->getMessage(), "\n";
        }
      } else {
      // mesej gagal dipaparkan /
        function died($error)
        {
          paparMesejGagalA();
        }
      }
      ?>
      

      <?php
      function paparMesejBerjayaAsetB($idasetFF){
        
        echo '<script type="text/javascript">alert("Asset successfully added!");
              window.location="tetapanAset.php";</script>';
      }

      function paparMesejGagal1B(){
        
          echo "<script type='text/javascript'>\n";
              echo "alert('Sorry, your application failed to proceed.');\n";
                echo "history.go(-1);\n";
                  echo "</script>";	
                exit();		               
      }


      if (isset($_POST['submit2'])) {
        $inputKategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
        $inputJenis = isset($_POST['jenis_aset']) ? $_POST['jenis_aset'] : '';
    
        try {
            // Sanitize inputs to prevent SQL injection
            $inputKategori = mysqli_real_escape_string($conn2, $inputKategori);
            $inputJenis = mysqli_real_escape_string($conn2, $inputJenis);
            
            $inputJenisUpper = strtoupper($inputJenis);
    
            // Check if the asset already exists
            $sqlCheck = "SELECT * FROM jenis_aset WHERE UPPER(type_aset) LIKE '%$inputJenisUpper%'";
            $result1B = $conn2->query($sqlCheck);
    
            if ($result1B->num_rows > 0) {
                echo "<script type='text/javascript'>
                        alert('Asset already exists! Please insert another new asset name.');
                        history.go(-1);
                      </script>";
                exit();
            } else {
              $inputKategori = str_pad($inputKategori, 2, '0', STR_PAD_LEFT);

$sqlMaxID = "SELECT * 
             FROM jenis_aset 
             WHERE id_kategori = '$inputKategori' 
             ORDER BY idsubcategory DESC 
             LIMIT 1";
$resultBO = $conn2->query($sqlMaxID);
$fetchedBO = $resultBO->fetch_assoc();

// Periksa jika $fetchedBO['idsubcategory'] kosong, jika ya, mulai dari 1
$idsubcategory_no = isset($fetchedBO['idsubcategory']) ? str_pad($fetchedBO['idsubcategory'] + 1, 2, '0', STR_PAD_LEFT) : '01';

$inputJenis = str_pad($inputJenis, 2, '0', STR_PAD_LEFT);

// Insert the new asset
$sqlInsert = "INSERT INTO jenis_aset (id_kategori, type_aset, idsubcategory) 
              VALUES ('$inputKategori', '$inputJenis', '$idsubcategory_no')";

                
                if ($conn2->query($sqlInsert) === TRUE) {
                    echo "<script>alert('Asset successfully added!');</script>";
                } else {
                    echo "<script>alert('Failed to add asset!');</script>";
                }
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    
    
    if (isset($_POST['submit3'])) {		
      $Sub_subcategory = $_POST['Sub_subcategory'] ?? ''; 
      $Model = $_POST['Model'] ?? ''; 
  
      // Query to fetch the latest record from sub_sub_category
      $sqlSubCategory = "SELECT * 
                         FROM sub_sub_category 
                         WHERE idsubcategory = '$Sub_subcategory' 
                         ORDER BY id_sub_sub_category DESC 
                         LIMIT 1";
  
      $resultCategory = mysqli_query($conn2, $sqlSubCategory);
      $ro3 = mysqli_fetch_assoc($resultCategory);
  
      // Check if $ro3['id_sub_sub_category'] is empty, if so set to 1, otherwise increment
      if (empty($ro3['id_sub_sub_category'])) {
          $Sub_subcategory23 = '01';
      } else {
          $Sub_subcategory23 = str_pad($ro3['id_sub_sub_category'] + 1, 2, '0', STR_PAD_LEFT);
      }
  
      try {
          // Insert a new sub_sub_category record
          $sql1B = "INSERT INTO sub_sub_category (id_sub_sub_category, idsubcategory, jenis_sub_sub_category) 
                    VALUES ('$Sub_subcategory23', '$Sub_subcategory', '$Model')";
                    
          $query1B = mysqli_query($conn2, $sql1B);
  
          if (!$query1B) {
              throw new Exception("Database Error: " . mysqli_error($conn2));
          }
  
          // Verify if the insert was successful
          $sql11B = "SELECT * FROM sub_sub_category WHERE jenis_sub_sub_category = '$Model'";
          $result3B = mysqli_query($conn2, $sql11B);
  
          if (mysqli_num_rows($result3B) > 0) {
              paparMesejBerjayaAsetB("Asset successfully added!");
          } else {
              paparMesejGagal1B();
          }
      } catch (Exception $e) {
          echo 'Caught exception: ', $e->getMessage(), "\n";
      }
  }
  
  

       
      
      ?>
    

      <!-- table for category record -->
      <div class="col-lg-9">
        <div class="card top-selling">
          <div class="sb">
            <div class="card-body">
              <h5 class="card-title"><strong>CATEGORY RECORD</strong><br/>

              <!-- View register category record field form -->
              <div class="row">

              <?php
                $sqlAP = "SELECT * FROM kategoritps ORDER BY id_kategori ASC";
                $result2 = mysqli_query($conn2, $sqlAP);
              ?>
              <div class="box-header with-border">
                <div class="col-md-12">
                  <div class="box-body" style="margin-top: 10px">
                    <form action="../../tcpdf/laporanPDF/LaporanSenaraiKategori.php" name="form2" method="post" target="_blank">
                      <?php
                      $sqlAP = "SELECT * FROM kategoritps ORDER BY nama_kategori ASC";
                      $resultAP = mysqli_query($conn2, $sqlAP);
                      if ($resultAP !== false && mysqli_num_rows($resultAP) > 0) {
                      ?>
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Bil: activate to sort column ascending" style="width: 150px;text-align:center">No.
                                <i class="fa fa-sort-amount-desc"></i>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center">Category Name
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center">Category Code
                                <i class="fa fa-sort-amount-desc"></i>
                              </th>
                              <th style="width:300px; text-align:center">Update</th>
                              <th style="width:300px; text-align:center">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $off = 0;
                            $i = 1 + $off;
                            while ($rowAP = mysqli_fetch_array($resultAP)) {
                              echo '
                                <tr>
                                  <td data-title="Bil" style="text-align:center">' . $i . '</td>													
                                  <td data-title="Nama Jenis Kategori" style="text-transform:uppercase">' . $rowAP['nama_kategori'] . '</td>
                                  <td data-title="Kod Kategori" style="text-transform:uppercase; text-align:center;">' . $rowAP['kod'] . '</td>
                                  <td data-title="Kemaskini" style="text-align:center"><a href="updatetetapan.php?id_kategori=' . $rowAP['id_kategori'] . '"><i class="fa fa-pencil"></i></a></td> 
                                  <td style="text-align:center"><a href="delete.php?id_kategori=' . $rowAP['id_kategori'] . '" title="Padam" class="fa fa-trash" Onclick="return ConfirmDelete()"></a></td>
                                </tr>';
                              $i++;
                            }
                            ?>
                          </tbody>
                        </table>
                      <?php
                      } else {
                        echo '<span>No Record of Registered Assets.</span>';
                      }
                      ?>
                      <td width="25%"><input class="btn btn-success btn-lg" type="submit" value="Print" style="font-size: 15px"></td>
                    </form>
                  </div>
                </div>
              </div>
              <!--SCRIPT COMMAND FOR POP-UP CONFIRMATION DELETE BOX-->
              <script>
                function ConfirmDelete() {
                  return confirm("Are you sure you want to delete this data?");
                }
              </script>
              </div>

            </div>
          </div>
        </div>

    

        <!-- table for asset type record -->
        <div class="card top-selling">
          <div class="sb">
            <div class="card-body">
              <h5 class="card-title"><strong>SUB-CATEGORY
              RECORD</strong><br/>

              <!-- View register asset type record field form -->
              <div class="row">

              <?php
                $sqlAP = "SELECT * FROM jenis_aset
                ORDER BY type_aset ASC";					
              ?>
              <div class="box-header with-border">
                <div class="col-md-12">
                  <!-- /.box-header -->
                  <div class="box-body" style="margin-top: 10px">
                    <form action="../../tcpdf/laporanPDF/LaporanSenaraiJenis.php" name="form2" method="post" target="_blank">
                      <?php
                      //$sqlAP = mysql_query("SELECT * FROM jenis_aset ORDER BY id ASC");
                      $sqlAB = "SELECT * FROM jenis_aset 
                      INNER JOIN kategoritps 
                      ";
                      $resultAB = mysqli_query($conn2, $sqlAB);
                      if ($resultAB !== false && mysqli_num_rows($resultAB) > 0) {
                      ?>
                        <table id="example2" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Bil: activate to sort column ascending" style="width: 150px;text-align:center">No.
                                <i class="fa fa-sort-amount-desc"></i>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center">Category
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center">Type
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th style="width:200px;text-align:center">Update</th>
                              <th style="width:200px;text-align:center">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $off = 0;
                              $i = 1 + $off;
                              while($rowAB = mysqli_fetch_array($resultAB)) {
                              echo '
                                <tr>
                                  <td data-title="Bil" style="text-align:center">'.$i.'</td>
                                  <td data-title="Kategori Aset" >'.$rowAB['nama_kategori'].'</td>
                                  <td data-title="Jenis Aset" style="text-transform:uppercase">'.$rowAB['type_aset'].'</td>
                                  <td data-title="Kemaskini" style="text-align:center"><a href="updatejenisaset.php?id=' . $rowAB['id'] . '"><i class="fa fa-pencil"></i></a></td> 
                                  <td style="text-align:center"><a href="deletejenisaset.php?id='.$rowAB['id'].'" title="Padam" class="fa fa-trash" Onclick="return ConfirmDelete()"></a>
                                </tr>';
                              $i++;
                              }
                              ?>
                          </tbody>
                        </table>
                      <?php
                        }else{
                          echo '<span>No record found for the requested asset number.</span>';
                        }
                      ?>
                      <td width="25%"><input class="btn btn-success btn-lg" type="submit" value="Print" style="font-size: 15px"></td>
                    </form>
                  </div>
                </div>
              </div>
              <script>
                function ConfirmDelete() {
                  return confirm("Are you sure you want to delete this asset type?");
                }
              </script>
              </div>

            </div>
          </div>
        </div>
        
      </div>

    </div>
  </section>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- jQuery 3 -->
  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 5.3.3 -->
  <script src="../../bower_components/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
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
  <!-- page script -->
  <script>
    $(function() {
      $('#example1').DataTable({
        'responsive': true,
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      });
    });

    $(function() {
      $('#example2').DataTable({
        'responsive': true,
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      });
    });

  function myFunction() {
    window.print();
  }
  </script>

  <!-- DataTable JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>
<?php
// }else{
// header('Location: index.php'); 
// }
?>