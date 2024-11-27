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

    <title>Update Asset Details</title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Favicons -->
    <link href="../../assets/img/micthlogo.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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
  .sb {
      box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
      height: 100%;
      width: 100%;
      background-color: white;
      border: 1px solid white;
      overflow: auto;
      white-space: nowrap;

  }

  .card-title span {
      color: black;
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
          <a class="nav-link collapsed" href="../forms/dafaset.php">
            <i class="bi bi-pencil-square" style="font-size: 1em"></i>
            <span>Register New Asset</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="active" href="../tables/laporanas.php">
            <i class="bi bi-file-earmark-text-fill" style="font-size: 1em; background-color: transparent"></i>
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
            <h1>Update Details</strong></h1>
            <nav>
                <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
                    <li class="breadcrumb-item"><a href="../../../main_user.php">Home Page</a></li>
                    <li class="breadcrumb-item"><a href="../../pages/tables/laporanas.php">Asset Report</a></li>
                    <li class="breadcrumb-item active">Update Details</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->



        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-20">
                    <div class="row">
                        <!-- Recent Sales -->
                    </div>
                    <?php
                    require('../../../db_conn.php');


                    $sql = "SELECT * FROM empmaininfo WHERE `First_Name` = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $_SESSION['First_Name']);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row18 = mysqli_fetch_assoc($result);
                    echo $row18['func_admin'];

                    $noasset = $_SESSION['updateid'];
                    require('../../../db_conn.php');


                    $sql = "SELECT * FROM asset_management_vba WHERE `Full_ID (Concatenated ID)` = '$noasset'";
                    $result = mysqli_query($conn2, $sql);
                    $fetched_row = mysqli_fetch_assoc($result);
                    ?>

                    <div class="col-12">
                        <div class="card top-selling">
                            <div class="sb">
                                <div class="card-body">
                                    <h5 class="card-title"><strong>ASSET DETAILS</strong>
                                    <div class="col-lg-20" style="margin-top: 10px">
                                        <div class="col-md-12">
                                            <form role="form" action="" method="post">
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group" style="display: flex; align-items: center;">
                                                                <label for="assetnumber" class="title-label">Asset Number: </label><br>
                                                                <h5 class="card-title">
                                                                    <strong><?php echo htmlspecialchars($fetched_row['Full_ID (Concatenated ID)']); ?></strong>
                                                                </h5>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5"></div>

                                                        <!-- Category Field -->
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="category" class="title-label">Category:</label>
                                                                <input type="text" class="form-control placeholder-label" id="category" name="category"
                                                                    value="<?php echo htmlspecialchars($fetched_row['Category']); ?>"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <!-- Subcategory Field -->
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="subcategory" class="title-label">Sub Category:</label>
                                                                <input type="text" class="form-control placeholder-label" id="subcategory"
                                                                    name="subcategory"
                                                                    value="<?php echo htmlspecialchars($fetched_row['Sub_Category']); ?>"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <!-- Model Field -->
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="model" class="title-label">Model:</label>
                                                                <input type="text" class="form-control placeholder-label" id="model" name="model"
                                                                    value="<?php echo htmlspecialchars($fetched_row['Model']); ?>"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="runningno" class="title-label">Status:</label>
                                                                <input type="text" class="form-control placeholder-label" id="status" name="status"
                                                                    value="<?php echo htmlspecialchars(string: $fetched_row['status']); ?>"
                                                                    readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="serialno" class="title-label">Serial Number:</label>
                                                                <input type="text" class="form-control placeholder-label" id="serialno" name="serialno"
                                                                    value="<?php echo htmlspecialchars($fetched_row['SERIAL_NO']); ?>">
                                                            </div>
                                                        </div>
                                                        <!-- Date of Purchase Field -->
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="dopurchase" class="title-label">Date of Purchase:</label>
                                                                <input type="date" class="form-control placeholder-label" id="dopurchase"
                                                                    name="dopurchase"
                                                                    value="<?php echo htmlspecialchars($fetched_row['DATE_OF_PURCHASE']); ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1" class="title-label">Registration Date:</label>
                                                                <div class="input-group">
                                                                    <input type="date" class="form-control placeholder-label" id="tarikh_daftar"
                                                                        name="tarikh_daftar"
                                                                        value="<?php echo htmlspecialchars($fetched_row['DATE_OF_PURCHASE']); ?>">

                                                                </div>
                                                            </div>
                                                        </div>





                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="price" class="title-label">Color:</label>
                                                                <input class="form-control placeholder-label" name="warna"
                                                                    value="<?php echo htmlspecialchars($fetched_row['warna']); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="price" class="title-label">Warranty:</label>
                                                                <input class="form-control placeholder-label" name="warranty"
                                                                    value="<?php echo htmlspecialchars($fetched_row['warranty']); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="price" class="title-label">Remark:</label>
                                                                <textarea class="form-control placeholder-label"
                                                                    readonly><?php echo htmlspecialchars($fetched_row['remark']); ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="price"class="title-label">Purchase Price:</label>
                                                                <input type="text" id="price" class="form-control placeholder-label" placeholder="Enter Price"
                                                                    name="price" value="<?php echo htmlspecialchars($fetched_row['harga']); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="price" class="title-label">Current price:</label>
                                                                <input type="text" id="total" name="total" class="form-control placeholder-label" placeholder="Enter Price"
                                                                    value="<?php echo !empty($fetched_row['hargaakhir']) ? htmlspecialchars($fetched_row['hargaakhir']) : htmlspecialchars($fetched_row['harga']); ?>"
                                                                    oninput="calculateTotal()" readonly />
                                                            </div>
                                                        </div>

                                                        <?php
                                                        require('../../../db_conn.php');
                                                        if ($row18['func_admin'] == '1' || $row18['func_acc'] == '1') {
                                                            if ($fetched_row['hargaakhir'] == '') { ?>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="percentage" class="title-label">Percentage (%):</label><br>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control placeholder-label" value="<?php echo htmlspecialchars($fetched_row['percent']); ?>" Readonly />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="percentage" class="title-label">Percentage (%):</label><br>
                                                                        <div class="input-group">
                                                                            <input type="number" id="percentage" name="percentage"
                                                                                class="form-control placeholder-label" placeholder="Enter Percentage" oninput="calculateTotal()">
                                                                            <input style="font-size: 14px" class="button--submit" value="Submit" type="submit" name="submit6">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </div>

                                                    <style>
                                                        /* .input-group {
                                                            display: flex;
                                                            align-items: center;
                                                        } */

                                                        /* label {
                                                            font-size: 1.2rem;
                                                            color: #333;
                                                        } */


                                                        .button--submit {
                                                            padding: 8px 16px;
                                                            font-size: 1rem;
                                                            color: #fff;
                                                            background-color: #007bff;
                                                            border: none;
                                                            border-radius: 4px;
                                                            cursor: pointer;
                                                            transition: background-color 0.3s ease;
                                                        }

                                                        .button--submit:hover {
                                                            background-color: #0056b3;
                                                        }
                                                    </style>


                                                    <script>
                                                        function calculateTotal() {
                                                            // Get the price and percentage input values
                                                            var price = parseFloat(document.getElementById("price").value.replace(/[^\d.-]/g, "")) || 0; // Remove RM and commas
                                                            var percentage = parseFloat(document.getElementById("percentage").value) || 0;

                                                            // Calculate discount amount
                                                            var discountAmount = price * (percentage / 100);
                                                            var total = price - discountAmount;

                                                            // Format the total back to currency format (RM, commas, and 2 decimal places)
                                                            var totalFormatted = "RM " + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

                                                            // Set the calculated total into the 'total' input field
                                                            var totalInput = document.getElementById("total");
                                                            if (totalInput.value.trim() === "") {
                                                                totalInput.value = "RM " + price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                                                            } else {
                                                                totalInput.value = totalFormatted;
                                                            }
                                                        }
                                                    </script>


                                                </div>
                                                <?php

                                                if ($fetched_row['status'] != 'Approved') {
                                                    require('../../../db_conn.php');
                                                    if ($row18['func_admin'] == '1' && $row18['admin_asset'] == '1') {
                                                ?>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <button type="submit" name="Approve" class="btn btn-primary btn-lg" style="font-size: 15px">Approve</button>
                                                                <button type="submit" name="btn-cancel" class="btn btn-danger" style="font-size: 15px">Cancel</button>
                                                                <button class="btn btn-danger" style="font-size: 15px" type="button" onclick="showRejectReason()" name="reject">Reject</button>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } elseif ($row18['admin_asset'] == '1') {
                                                    ?>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <button type="submit" name="submitupdate" class="btn btn-primary btn-lg" style="font-size: 15px">Update</button>
                                                                <button type="submit" name="btn-cancel" class="btn btn-danger" style="font-size: 15px">Cancel</button>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>



                                            </form>


                                            <form role="form" action="" method="post">
                                                <div id="rejectReasonContainer" style="display: none; margin-top: 10px;">
                                                    <label for="rejectReason">Please provide a reason for rejection:</label>
                                                    <textarea class="form-control" id="rejectReason" name="rejectReason" rows="3" required></textarea>
                                                    <button type="submit" name="reject4" style="font-size: 15px" class="btn btn-danger mt-3">Submit</button>
                                                </div>
                                            </form>




                                            <script>
                                                function showRejectReason() {
                                                    document.getElementById("rejectReasonContainer").style.display = "block";
                                                }
                                            </script>


                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST['reject4'])) {
                date_default_timezone_set('Asia/Kuala_Lumpur');
                $current_time1 = date("Y-m-d H:i:s");
                $remark = mysqli_real_escape_string($conn2, $_POST["rejectReason"]);

                $fullID = $fetched_row['Full_ID (Concatenated ID)'];
                $Category = $fetched_row['Category'];
                $Sub_Category = $fetched_row['Sub_Category'];
                $Model = $fetched_row['Model'];
                $warna = $fetched_row['warna'];
                $warranty = $fetched_row['warranty'];
                $harga = $fetched_row['harga'];
                $SUPPLIER = $fetched_row['SUPPLIER'];
                $SERIAL_NO = $fetched_row['SERIAL_NO'];


                require('../../configAsetTPS.php');

             

                $appUpdateQuery = "UPDATE asset_management_vba SET status='Rejected', remark='$remark',cu_rejected = '$current_time1' WHERE `Full_ID (Concatenated ID)` = '$fullID';";
                $appUpdateResult = mysqli_query($conn2, $appUpdateQuery);


                $sqlInsert = "..."; // Define your insert query here if needed

                if ($appUpdateResult) {
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'successfully.',
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

                        $mail->setFrom('admin@micth.com');
                        $mail->addAddress('admin@micth.com');
                        $mail->isHTML(true);

                        $mail->Subject = 'Rejected Request for New Asset Registered';
                        $mail->Body = 'Dear Admin,<br><br>
                        Please recheck your details before you submitted:<br><br>
                        Category: ' . $Category . '<br>
                        Sub Category: ' . $Sub_Category . '<br>
                        No. Asset: ' . $fullID . '<br>
                        Model: ' . $Model . '<br>
                        Harga: RM' . $harga . '<br>
                        No. Siri: ' . $SERIAL_NO . '<br>
                        Status: Rejected <br>
                        Reason:' . $remark  . '<br>
                       
                        Please review the details and provide your approval at your earliest convenience.<br><br>
                        To approve or reject this request, please follow the link below:
                        https://i.micth.com/Micthsystem/<br><br>
                        MICTH SYSTEM<br><br>
                        Please note: This email is sent as a notification only. Please do not reply to this email.';

                        $mail->send();
                    } catch (Exception $e) {
                        echo "<div class='alert alert-danger'>Error: {$mail->ErrorInfo}</div>";
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
            }


            if (isset($_POST['submit6'])) {
                date_default_timezone_set('Asia/Kuala_Lumpur');
                $current_time1 = date("Y-m-d H:i:s");
                $total = $conn2->real_escape_string(string: $_POST['total']);
                $percentage = $conn2->real_escape_string(string: $_POST['percentage']);


                $fullID = $fetched_row['Full_ID (Concatenated ID)'];

                $appUpdateQuery = "UPDATE asset_management_vba  SET status = 'Active', hargaakhir = '$total', percent = '$percentage', cu_susutnilai='$current_time1' WHERE `Full_ID (Concatenated ID)` = '$fullID';";

                $appUpdateResult = mysqli_query($conn2, $appUpdateQuery);

                if ($appUpdateResult) {  // Check if the query was successful
                    echo "<script>
                    alert('Record updated successfully');
                    window.location.href = 'detailsviewasset.php';
                  </script>";
                } else {
                    echo "<script>alert('Error updating record: " . mysqli_error($conn2) . "');</script>";
                }
            }




            if (isset($_POST['submitupdate'])) {
                date_default_timezone_set('Asia/Kuala_Lumpur');
                $current_time1 = date("Y-m-d H:i:s");

                // Sanitize input
                $serialNo = $conn2->real_escape_string($_POST['serialno']);
                $dateOfPurchase = $conn2->real_escape_string($_POST['dopurchase']);
                $price = $conn2->real_escape_string($_POST['price']);
                $total = $conn2->real_escape_string($_POST['total']);
                $assetId = $conn2->real_escape_string($fetched_row['Full_ID (Concatenated ID)']);
                $warna = $conn2->real_escape_string($_POST['warna']);
                $warranty = $conn2->real_escape_string($_POST['warranty']);

                // Determine final price based on conditions
                $hargaAkhir = !empty($percentage) ? $total : $price;
                $Category = $fetched_row['Category'];
                $Sub_Category = $fetched_row['Sub_Category'];
                $Model = $fetched_row['Model'];
                $remark = $fetched_row['remark'];

                // Include database config
                require('../../configAsetTPS.php');

              

                // Update asset management table
                $updateQuery = "UPDATE asset_management_vba SET 
                                SERIAL_NO = '$serialNo',
                                warranty = '$warranty',
                                warna = '$warna',
                                DATE_OF_PURCHASE = '$dateOfPurchase',
                                harga = '$price', 
                                status = 'Pending' 
                                WHERE `Full_ID (Concatenated ID)` = '$assetId'";

                if ($conn2->query($updateQuery) === TRUE) {
                    echo "<script>
                            alert('Record updated successfully');
                            window.location.href = '../tables/laporanas.php';
                          </script>";

                    // Send email notification
                    try {
                        $mail = new PHPMailer(true);

                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'abdallah.wedud@micth.com'; // Replace with secure source
                        $mail->Password = 'ztjhqhsrlcdcfyiq'; // Replace with secure source
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port = 465;

                        $mail->setFrom('abdallah.wedud@micth.com');
                        $mail->addAddress('abdallah.wedud@micth.com');
                        $mail->isHTML(true);

                        $mail->Subject = 'Approval Request for New Asset regestered';
                        $mail->Body = 'Dear Encik Farid,<br><br>
                                       Please insert the depreciation value:<br><br>
                                       <strong>Category:</strong> ' . $Category . '<br>
                                       <strong>Sub Category:</strong> ' . $Sub_Category . '<br>
                                       <strong>Asset ID:</strong> ' . $assetId . '<br>
                                       <strong>Model:</strong> ' . $Model . '<br>
                                       <strong>Price:</strong> ' . $price . '<br>
                                       <strong>Serial No:</strong> ' . $serialNo . '<br>
                                       <strong>Status:</strong> Pending<br>
                                       <strong>Remark from HOD:</strong> ' . $remark . '<br><br>
                                       Please review the details and provide your approval at your earliest convenience.<br><br>
                                       To approve or reject this request, please follow the link below:<br>
                                       <a href="https://i.micth.com/Micthsystem/">MICTH System</a><br><br>
                                       <em>This email is sent as a notification only. Please do not reply to this email.</em>';

                        $mail->send();
                    } catch (Exception $e) {
                        echo "<div class='alert alert-danger'>Error: {$mail->ErrorInfo}</div>";
                    }
                } else {
                    echo "<script>alert('Error updating record: " . $conn2->error . "');</script>";
                }

                // Close the connection
                $conn2->close();
            }







            // en farid

            if (isset($_POST['Approve'])) {
                date_default_timezone_set('Asia/Kuala_Lumpur');
                $current_time1 = date("Y-m-d H:i:s");

                $serialNo = $conn2->real_escape_string($_POST['serialno']);
                $dateOfPurchase = $conn2->real_escape_string($_POST['dopurchase']);
                $price = $conn2->real_escape_string($_POST['price']);
                $total = $conn2->real_escape_string($_POST['total']);
                $percentage = $conn2->real_escape_string($_POST['percentage']);
                $assetId = $conn2->real_escape_string($fetched_row['Full_ID (Concatenated ID)']);
                $fullID = $fetched_row['Full_ID (Concatenated ID)'];
                $SUPPLIER = $fetched_row['SUPPLIER'];

                // Set final price
                $hargaAkhir = !empty($percentage) ? $total : $price;

                // Additional asset details
                $Category = $fetched_row['Category'];
                $Sub_Category = $fetched_row['Sub_Category'];
                $Model = $fetched_row['Model'];

                // Require configuration file
                require('../../configAsetTPS.php');


                // Update asset information
                $updateQuery = "UPDATE asset_management_vba SET 
                    SERIAL_NO = '$serialNo', 
                    DATE_OF_PURCHASE = '$dateOfPurchase',
                    cu_approval = '$current_time1', 
                    harga = '$price', 
                    status = 'Approved' 
                    WHERE `Full_ID (Concatenated ID)` = '$assetId'";

                if ($conn2->query($updateQuery) === TRUE) {
                    echo "<script>
                alert('Record updated successfully');
                window.location.href = '../tables/laporanas.php';
              </script>";
                    try {
                        $mail = new PHPMailer(true);

                        // SMTP configuration
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'abdallah.wedud@micth.com';
                        $mail->Password = 'ztjhqhsrlcdcfyiq';
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port = 465;

                        $mail->setFrom('admin@micth.com');
                        $mail->addAddress('admin@micth.com');
                        $mail->isHTML(true);

                        // Email content
                        $mail->Subject = 'Depreciation Value';
                        $mail->Body = 'Dear Account,<br><br>
                           Please insert the depreciation value:<br><br>
                           <strong>Category:</strong> ' . $Category . '<br>
                           <strong>Sub Category:</strong> ' . $Sub_Category . '<br>
                           <strong>Asset ID:</strong> ' . $assetId . '<br>
                           <strong>Model:</strong> ' . $Model . '<br>
                           <strong>Price:</strong> RM' . $price . '<br>
                           <strong>Serial No:</strong> ' . $serialNo . '<br>
                           <strong>Status:</strong> Approved<br>
                           Please review the details and provide your approval at your earliest convenience.<br><br>
                           To approve or reject this request, please follow the link below:<br>
                           <a href="https://i.micth.com/Micthsystem/">MICTH System</a><br><br>
                           <em>This email is sent as a notification only. Please do not reply to this email.</em>';

                        $mail->send();
                    } catch (Exception $e) {
                        echo "<div class='alert alert-danger'>Error: {$mail->ErrorInfo}</div>";
                    }
                } else {
                    echo "<script>alert('Error updating record: " . $conn2->error . "');</script>";
                }

                $conn2->close();
            }


            ?>
            </div>
            </div>
        </section>




    </main><!-- End #main -->


    <footer id="footer" class="footer">
        <div class="copyright">
            Copyright &copy;
            <script>
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

    <!-- page script -->
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                searching: true,
                info: true,
                paging: true,
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
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