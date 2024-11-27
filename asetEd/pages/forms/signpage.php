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

  <title>Update Asset Register</title>
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
      <h1>Asset Ownership Register</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
          <li class="breadcrumb-item"><a href="../../../main_user.php">Home Page</a></li>
          <li class="breadcrumb-item active">Asset Ownership</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

    
      <div class="row">
        <!-- Asset Selection Form -->
        <div class="col-12">
          <div class="card top-selling">
            <div class="card-body">
              <h5 class="card-title"><strong>ASSET OWNERSHIP REGISTER</strong>

        <?php
        if (isset($_GET['Full_ID'])) {
            $sqlA_query = $conn2->prepare("SELECT * FROM asset_management_vba WHERE `Full_ID (Concatenated ID)` = ?");
            $sqlA_query->bind_param("s", $_GET['Full_ID']);
            $sqlA_query->execute();
            $result_set = $sqlA_query->get_result();
            $fetched_row = $result_set->fetch_array(MYSQLI_ASSOC);

            if (isset($_POST['btn-update'])) {
                $supplier = $_POST['supplier'];
                $serialno = $_POST['serialno'];
                $dopurchase = $_POST['dopurchase'];
                $staffname = $_POST['staffname'];

                require('../../../db_conn.php');

                $sqlAS = "SELECT Internal_Id FROM empmaininfo WHERE CONCAT(First_Name, ' ', Last_Name) = ?";
                $stmtA = $conn->prepare($sqlAS);
                $stmtA->bind_param("s", $staffname);
                $stmtA->execute();
                $resultA = $stmtA->get_result();

                if ($rowL = $resultA->fetch_assoc()) {
                    $staffID = $rowL['Internal_Id'];
                } else {
                    echo "<script>
                        Swal.fire({
                            title: 'Error!',
                            text: 'Staff name not found.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    </script>";
                    exit;
                }

                $sql_query = $conn2->prepare("UPDATE asset_management_vba 
                                SET SERIAL_NO = ?, DATE_OF_PURCHASE = ?, SUPPLIER = ?, nama_kakitangan = ?
                                WHERE `Full_ID (Concatenated ID)` = ?");
                $sql_query->bind_param("sssss", $serialno, $dopurchase, $supplier, $staffID, $_GET['Full_ID']);

                // Execute the update and handle the result
                if ($sql_query->execute()) {
                    echo "<script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'Record has been successfully updated.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '../tables/laporanas.php'; // Redirect to the desired page
                            }
                        });
                    </script>";
                } else {
                    echo "<script>
                        Swal.fire({
                            title: 'Error!',
                            text: 'There was an issue updating the record: " . htmlspecialchars($sql_query->error) . "',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    </script>";
                }
            }

            if (isset($_POST['btn-cancel'])) {
                header("Location: ../tables/laporanas.php"); // Redirect on cancel
                exit();
            }
        }
        ?>



              <form role="form" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" style="min-height: 650px;">
                <div class="row" style="margin-top: 10px">

                  <div class="col-md-5" style="margin-bottom: 10px;">
                    <div class="form-group">
                      <label for="assetnumber" class="title-label">Asset Number:</label>
                      <input type="text" class="form-control placeholder-label" id="assetnumber" name="assetnumber" value="<?php echo htmlspecialchars($fetched_row['Full_ID (Concatenated ID)']); ?>" readonly>
                    </div>
                  </div>

                  <div class="col-md-5" style="margin-bottom: 20px;">
                    <div class="form-group">
                      <label for="category" class="title-label">Category:</label>
                      <input type="text" class="form-control placeholder-label" id="category" name="category" value="<?php echo htmlspecialchars($fetched_row['Category']); ?>"readonly>
                    </div>
                  </div>

                  <div class="col-md-5" style="margin-bottom: 20px;">
                    <div class="form-group">
                      <label for="subcategory" class="title-label">Sub Category:</label>
                      <input type="text" class="form-control placeholder-label" id="subcategory" name="subcategory" value="<?php echo htmlspecialchars($fetched_row['Sub_Category']); ?>"readonly>
                    </div>
                  </div>

                  <div class="col-md-5" style="margin-bottom: 20px;">
                    <div class="form-group">
                      <label for="model" class="title-label">Model:</label>
                      <input type="text" class="form-control placeholder-label" id="model" name="subcategory" value="<?php echo htmlspecialchars($fetched_row['Model']); ?>"readonly>
                    </div>
                  </div>

                  <div class="col-md-5" style="margin-bottom: 20px;">
                    <div class="form-group">
                      <label for="runningno" class="title-label">Running No:</label>
                      <input type="text" class="form-control placeholder-label" id="runningno" name="runningno" value="<?php echo htmlspecialchars($fetched_row['Running_No']); ?>"readonly>
                    </div>
                  </div>

                  <div class="col-md-5" style="margin-bottom: 20px;">
                    <div class="form-group">
                      <label for="serialno" class="title-label">Serial Number:</label>
                      <input type="text" class="form-control placeholder-label" id="serialno" name="serialno" value="<?php echo htmlspecialchars($fetched_row['SERIAL_NO']); ?>">
                    </div>
                  </div>

                  <div class="col-md-5" style="margin-bottom: 20px;">
                    <div class="form-group">
                      <label for="dopurchase" class="title-label">Date of Purchase:</label>
                      <input type="text" class="form-control placeholder-label" id="dopurchase" name="dopurchase" value="<?php echo htmlspecialchars($fetched_row['DATE_OF_PURCHASE']); ?>">
                    </div>
                  </div>

                  <div class="col-md-5" style="margin-bottom: 20px;">
                    <div class="form-group">
                      <label for="tarikh_daftar" class="title-label">Registration Date:</label>
                      <input type="text" class="form-control placeholder-label" id="tarikh_daftar" name="tarikh_daftar" value="<?php echo date("j/n/Y"); ?>"readonly>
                    </div>
                  </div>
                 
                  <div class="col-md-5" style="margin-bottom: 20px;">
                      <div class="form-group">
                          <label for="staffname" class="title-label">Staff Name:</label>
                          <input type="text" class="form-control" id="staffname" name="staffname" style="font-size: 1.4rem; line-height: 1.2; height: 34px"  oninput="filterStaff()">
                          <input type="hidden" id="staffid" name="staffid" />
                          <div id="suggestions" class="suggestions" style="display: none;"></div>
                      </div>
                  </div>

                  <style>
                    /* Style the suggestions box */
                    #suggestions {
                        position: absolute;
                        z-index: 1000; 
                        background-color: #f1f1f1; 
                        color: #007bff; 
                        border: 1px solid #ccc; 
                        width: 100%; 
                        max-height: 200px; 
                        overflow-y: auto;
                        padding: 5px; 
                        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                    }

                    /* Style individual suggestion items */
                    #suggestions div {
                        padding: 8px; 
                        cursor: pointer; 
                        font-size: 1.4rem; 
                    }

                    /* Highlight a suggestion on hover */
                    #suggestions div:hover {
                        background-color: #ddd; 
                    }

                    .form-group {
                      position: relative; 
                    }
                  </style>

                  <script>
                    function filterStaff() {
                        const input = document.getElementById('staffname');
                        const filter = input.value.toLowerCase();
                        const suggestions = document.getElementById('suggestions');
                        suggestions.innerHTML = '';

                        if (filter) {
                            const filteredStaff = staffData.filter(staff =>
                                staff.name.toLowerCase().includes(filter)
                            );

                            if (filteredStaff.length) {
                                suggestions.style.display = 'block';
                                filteredStaff.forEach(staff => {
                                    const div = document.createElement('div');
                                    div.innerText = staff.name;
                                    div.onclick = () => selectStaff(staff);
                                    suggestions.appendChild(div);
                                });
                            } else {
                                suggestions.style.display = 'none';
                            }
                        } else {
                            suggestions.style.display = 'none';
                        }
                    }

                    function selectStaff(staff) {
                        document.getElementById('staffname').value = staff.name;
                        document.getElementById('staffid').value = staff.id; // Set the Internal_Id in the hidden input
                        document.getElementById('suggestions').style.display = 'none';
                    }
                  </script>

                  <?php
                  // PHP code to fetch staff data
                  $sqlAS = "SELECT * FROM empmaininfo
                            INNER JOIN empdept ON empmaininfo.Department = empdept.dept_id
                            ORDER BY CAST(Department AS UNSIGNED) ASC";
                  require('../../../db_conn.php');

                  $resultA = mysqli_query($conn, $sqlAS);
                  $staffNames = [];

                  while ($rowL = mysqli_fetch_array($resultA)) {
                      $fullname = $rowL['First_Name'] . ' ' . $rowL['Last_Name'];
                      $staffID = $rowL['Internal_Id'];
                      $staffNames[] = ['name' => $fullname, 'id' => $staffID];
                  }

                  $staffJson = json_encode($staffNames);
                  ?>

                  <script>
                      // Pass PHP data to JavaScript
                      const staffData = <?php echo $staffJson; ?>;

                      function filterStaff() {
                          const input = document.getElementById('staffname');
                          const filter = input.value.toLowerCase();
                          const suggestions = document.getElementById('suggestions');
                          suggestions.innerHTML = '';

                          if (filter) {
                              const filteredStaff = staffData.filter(staff =>
                                  staff.name.toLowerCase().includes(filter)
                              );

                              if (filteredStaff.length) {
                                  suggestions.style.display = 'block';
                                  filteredStaff.forEach(staff => {
                                      const div = document.createElement('div');
                                      div.textContent = staff.name;
                                      div.className = 'suggestion-item'; // Optional for styling
                                      div.onclick = () => selectStaff(staff);
                                      suggestions.appendChild(div);
                                  });
                              } else {
                                  suggestions.style.display = 'none';
                              }
                          } else {
                              suggestions.style.display = 'none';
                          }
                      }

                      function selectStaff(staff) {
                          document.getElementById('staffname').value = staff.name;
                          document.getElementById('staffid').value = staff.id; // Hidden field
                          document.getElementById('suggestions').style.display = 'none';
                      }
                  </script>

                  <div class="col-md-5" style="margin-bottom: 20px;">
                    <div class="form-group">
                      <label for="supplier" class="title-label">Supplier:</label>
                      <select
                        style="font-size: 1.4rem; line-height: 1.2; height: 34px"
                        class="form-select" id="nama_pembekal"
                        name="supplier" onchange="updatePembekal()">
                          <option value='-'>
                            <?php echo htmlspecialchars($fetched_row['SUPPLIER']); ?>
                          </option>
                          <?php
                           $sqlP = "SELECT * FROM tbl_pembekal ORDER BY nama_pembekal ASC";
                           require('../../configAsetTPS.php');
                           $result2 = mysqli_query($conn2, $sqlP);
                           $countP = mysqli_num_rows($result2);

                          if ($countP > 0) {
                            while ($rowP = mysqli_fetch_array($result2)) {
                              echo '<option value="' . htmlspecialchars($rowP['id_pembekal']) . '" data-alamat="' . htmlspecialchars($rowP['alamat_pembekal']) . '" data-email="' . htmlspecialchars($rowP['emel_pembekal']) . '" data-notel="' . htmlspecialchars($rowP['notel_pembekal']) . '">' . htmlspecialchars($rowP['nama_pembekal']) . '</option>';
                            }
                          }
                          ?>
                      </select>
                    </div>
                  </div>
                
                  <div class="row mt-4">
                    <div class="col-md-5">
                        <button type="submit" name="submit1" class="btn btn-primary btn-lg w-45" style="font-size: 15px;">
                            Register
                        </button>
                        <button type="submit" name="submit1" class="btn btn-danger btn-lg w-45" style="font-size: 15px;">
                            Cancel
                        </button>
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