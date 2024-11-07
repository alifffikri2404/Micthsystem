<?php
session_start();
include "db_conn.php";

$fname = $_SESSION['user_name'];
$uid = $_SESSION['id'];
$First_Name = $_SESSION['First_Name'];
$Job_Title = $_SESSION['Job_Title'];

include ('../db_conn.php');
if (isset($_POST['btn-submit'])){

  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $username = $_POST['username'];
  $email_address = $_POST['email'];
  $phone_number = $_POST['phonenum'];
  $employee_ID = $_POST['empID'];

  $department = $_POST['department'];
  $sqlDept = "SELECT * FROM empdept
  WHERE name = '$department'";
  $resultA = mysqli_query($conn, $sqlDept);
  if ($resultA && mysqli_num_rows($resultA) > 0) {
    $rowA = mysqli_fetch_assoc($resultA);
    $department_id = $rowA['dept_id'];
	} else {
		$department_id = '';
	}

  $job_title = $_POST['jobtitle'];
  $sqlJobT = "SELECT * FROM empjobtitle
  WHERE job_title = '$job_title'";
  $resultB = mysqli_query($conn, $sqlJobT);
  if ($resultB && mysqli_num_rows($resultB) > 0) {
    $rowB = mysqli_fetch_assoc($resultB);
    $jobtitle_id = $rowB['job_id'];
	} else {
		$jobtitle_id = '';
	}

  $manager = $_POST['manager'];
  $sqlMan = "SELECT * FROM empmanager
  WHERE name = '$manager'";
  $resultC = mysqli_query($conn, $sqlMan);
  if ($resultC && mysqli_num_rows($resultC) > 0) {
    $rowC = mysqli_fetch_assoc($resultC);
    $manager_id = $rowC['manager_id'];
	} else {
		$manager_id = '';
	}

  $employment_type = $_POST['emptype'];
  $start_employ = $_POST['startemp'];

  $access_isurat = isset($_POST['access_isurat']) ? 1 : 0;
  $access_aset = isset($_POST['access_asset']) ? 1 : 0;
  $access_imobile = isset($_POST['access_imobile']) ? 1 : 0;
  $access_eoutstation = isset($_POST['access_eoutstation']) ? 1 : 0;

  $admin_surat = isset($_POST['admin_surat']) ? 1 : 0;
  $admin_asset = isset($_POST['admin_asset']) ? 1 : 0;
  $admin_booking = isset($_POST['admin_booking']) ? 1 : 0;
  $admin_outstation = isset($_POST['admin_outstation']) ? 1 : 0;

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $pass = validate($_POST['password']);
  $re_pass = validate($_POST['repass']);

  if (empty($email_address) || empty($employee_ID) || empty($pass) || empty($re_pass)) {
    header("Location: register.php?error=All fields are required&$employee_ID");
    exit();
  } else if ($pass !== $re_pass) {
      header("Location: register.php?error=The confirmation password does not match&$employee_ID");
      exit();
  } else {

  // Hashing the password
  $pass = md5($pass);

  // Check if username or employee number already exists
  $sql_check = "SELECT * FROM empmaininfo WHERE user_name='$username' OR Internal_Id='$employee_ID'";
  $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
      header("Location: register.php?error=Username or Employee Number already exists&$employee_ID");
      exit();
    }
    
    $sqlAV = "INSERT INTO empmaininfo(Internal_Id, First_Name, Last_Name, Email, Joining_Date,
      Mobile_phone, Job_Title, Employment_Type, Manager, Department,
      Active_Inactive, user_password, user_name, func_admin,
      access_isurat, access_aset, access_imobile, access_eoutstation,
      admin_surat, admin_asset, admin_booking, admin_outstation) 
      VALUES('$employee_ID','$first_name', '$last_name', '$email_address', '$start_employ',
      '$phone_number','$jobtitle_id', '$employment_type','$manager_id', '$department_id', 
      'Active', '$pass', '$username','0', '$access_isurat', '$access_aset',
        '$access_imobile', '$access_eoutstation', '$admin_surat',
        '$admin_asset', '$admin_booking', '$admin_outstation'
      )";

    $result_insert = mysqli_query($conn, $sqlAV);

    if ($result_insert) {
      echo "<script>alert('Your account has been created successfully.'); window.location='../SSO/accessSSO.php';</script>";
      exit();
    } else {
      header("Location: register.php?error=Unknown error occurred&$employeeID");
      exit();
    }
  }
}

if (isset($_POST["update"])) {
    $_SESSION['updateid'] = $_POST['update'];
    header("Location: checkin.php");
    exit();
}

if (isset($_POST["delete"])) {
    $delete = $_POST['delete'];
    $sql = "DELETE FROM `outstation` WHERE id='$delete'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Delete success.')</script>";
    } else {
        echo "<script>alert('Delete failed.')</script>";
    }
}

if (empty($_SESSION['First_Name'])) {
    header("Location: logout.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register Staff</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Date Picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">

    <!-- Favicons -->
    <link href="../micthlogo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
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

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="../main_user.php" class="logo d-flex align-items-center">
                <img src="../logomicth.png" alt="">
                <span class="d-none d-lg-block">MICTH System
                </span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            Me
                        </span>
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
                            <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="../main_user.php">
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
          <a class="nav-link collapsed" href="BookingSystem/user.php">
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
              <a class="nav-link collapsed" href="../BookingSystem/user_booking_vehicle.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Book Vehicle</span>
              </a>
            </li>
            <?php if ($_SESSION['admin_booking'] == "1") { ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/list_vehicle.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>List of Vehicle</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/add_vehicle.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Add Vehicle</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/usage_record_monthly.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>All Usage Record</span>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/user_record.php" style="padding-left: 60px">
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
              <a class="nav-link collapsed" href="../BookingSystem/user_booking_Room.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Book Room</span>
              </a>
            </li>
            <?php if ($_SESSION['admin_booking'] == "1") { ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/list_room.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>List of Room</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/add_room.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Add Room</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/room_record_monthly.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>All Usage Record</span>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/user_record_Room.php" style="padding-left: 60px">
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
          <a class="nav-link collapsed" href="../SuratLatest/SuratDaftarSuratKeluar.php">
            <i class="bi bi-pencil-square" style="font-size: 1em"></i>
            <span>Register Outgoing Letter</span>
          </a>
        </li>
        <?php if ($_SESSION['admin_surat'] == "1"){ ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../SuratLatest/SuratDaftarSuratMasuk.php">
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
              <a class="nav-link collapsed" href="../SuratLatest/SuratRekodSuratKeluar.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Outgoing Letter</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../SuratLatest/SuratRekodSuratMasuk.php" style="padding-left: 60px">
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
          <a class="nav-link collapsed" href="eoustation3.0/dash2.php">
            <i class="bi bi-house-door-fill" style="font-size: 1em"></i>
            <span>Dashboard</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="../eoustation3.0/dashStaff.php">
            <i class="bi bi-calendar-fill" style="font-size: 1em"></i>
            <span>My Report</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../eoustation3.0/FormStaff.php">
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
              <a class="nav-link collapsed" href="../eoustation3.0/myreport.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>View Report</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../eoustation3.0/data.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Generate Report</span>
              </a>
            </li>
            <?php
            include('../eoustation3.0/db_conn.php');
            $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00'";
            $result = mysqli_query($conn, $sql);
            $totalRows = mysqli_num_rows($result);
            ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../eoustation3.0/SNC.php" style="padding-left: 60px">
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
      <a class="nav-link collapsed" data-bs-target="#asset-system-nav" data-bs-toggle="collapse" href="#" href="">
        <i class="bi bi-briefcase-fill"></i>
        <span>Asset System</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="asset-system-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li class="nav-item">
          <a class="nav-link collapsed" href="../asetEd/pages/tables/staffregaset.php">
            <i class="bi bi-archive-fill" style="font-size: 1em"></i>
            <span>Registered Asset</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../asetEd/pages/forms/staffreqaset.php">
            <i class="bi bi-clipboard2-check-fill" style="font-size: 1em"></i>
            <span>Request New Asset</span>
          </a>
        </li>
        <?php if ($_SESSION['admin_asset'] == "1") { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../asetEd/pages/forms/dafaset.php">
            <i class="bi bi-pencil-square" style="font-size: 1em"></i>
            <span>Register New Asset</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../asetEd/pages/tables/laporanas.php">
            <i class="bi bi-file-earmark-text-fill" style="font-size: 1em"></i>
            <span>Asset & Inventory</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../asetEd/pages/tables/laporlupus.php">
            <i class="bi bi-file-earmark-x-fill" style="font-size: 1em"></i>
            <span>Disposal Report</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../asetEd/pages/tables/staffrequest.php">
            <i class="bi bi-check-circle-fill" style="font-size: 1em"></i>
            <span>Staff Request</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../asetEd/pages/forms/uploadcsv.php">
            <i class="bi bi-file-excel-fill" style="font-size: 1em"></i>
            <span>Import Excel</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../asetEd/hometetapan.php">
            <i class="bi bi-gear-fill" style="font-size: 1em"></i>
            <span>Asset Settings</span>
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>

    <?php } ?>

    <li class="nav-item">
      <a class="nav-link" data-bs-target="#settings-system-nav" data-bs-toggle="collapse" href="#" href="">
        <i class="bi bi-gear-fill"></i>
        <span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="settings-system-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li class="nav-item">
          <a class="nav-link collapsed" href="../setting.php">
            <i class="bi bi-person-fill" style="font-size: 1em"></i>
            <span>Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../feedback.php">
            <i class="bi bi-chat-right-text-fill" style="font-size: 1em"></i>
            <span>Feedback</span>
          </a>
        </li>
        <?php if ($_SESSION['func_admin'] == "1") { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../feedback_report.php">
            <i class="bi bi-chat-right-dots-fill" style="font-size: 1em"></i>
            <span>Feedback Report</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-target="#access-user-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
            <i class="bi bi-person-badge-fill" style="font-size: 1em"></i></i><span>Access User</span>
            <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
          </a>
          <ul id="access-user-nav" class="nav-content collapse show" data-bs-parent="#settings-system-nav">
            <li class="nav-item">
              <a class="active" href="../eoustation3.0/register.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill" style="background-color: transparent"></i></i>
                <span>Register New User</span>
              </a>
            </li>  
            <li class="nav-item">
              <a class="nav-link collapsed" href="../SSO/accessSSO.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Access View</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../SSO/userSSO.php" style="padding-left: 60px">
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

    <!-- Content Wrapper -->

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Register New Staff</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-20">
          <div class="row">
            <!-- Recent Sales -->
          </div>
        </div>
        <div class="col-12 mt-10">
          <div class="card top-selling">
            <div class="sb">
              <div class="card-body">
                <form role="form" action="" method="post">
                <h5 class="card-title"><strong>STAFF INFORMATION</strong><br/>
                <!-- Update staff info field form -->
                
                  <div class="row"  style="margin-top: 10px">
                    <div class="col-md-12">
                      <div class="box-body" style="margin-left: 10px">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">First Name:</label>
                                <input type="text" class="form-control placeholder-label" id="firstname" name="firstname" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Last Name:</label>
                                <input type="text" class="form-control placeholder-label" id="lastname" name="lastname" required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Username:</label>
                                <input type="text" class="form-control placeholder-label" id="username" name="username" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Email Address:</label>
                                <input type="text" class="form-control placeholder-label" id="email" name="email" required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Mobile Phone:</label>
                                <input type="text" class="form-control placeholder-label" id="phonenum" name="phonenum" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Employee ID:</label>
                                <input type="text" class="form-control placeholder-label" id="empID" name="empID" required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Password:</label>
                                <input type="password" class="form-control placeholder-label" id="password" name="password" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Re-Password:</label>
                                <input type="password" class="form-control placeholder-label" id="repass" name="repass" required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Department:</label>
                              <select type="text" class="form-select placeholder-label" id="department" onchange="updateManager()"
                                name="department" placeholder="Department" required>
                                <option value='-'>Choose Staff Department</option>
                                <?php
                                  include("../db_conn.php");
                                  $sql = "SELECT * FROM empdept ORDER BY dept_id ASC";
                                  
                                  $result = mysqli_query($conn, $sql);
                                  $count = mysqli_num_rows($result);
                                  if ($count > 0) {
                                    $off = 0;
                                    $i = 1 + $off;
                                    while ($row = mysqli_fetch_array($result)) {

                                      echo '<option value="' . $row['name'] . '" data-deptid="' . $row['dept_id'] . '">' . $row['name'] . '</option>';
                                      $i++;
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                          </div>

                          <script>
                            function updateManager() {
                                var selectedDepartment = $("#department").find(":selected");
                                var deptID = selectedDepartment.data("deptid");
                                
                                var managerTextBox = $("#manager");

                                // Update the manager's text box based on the selected department
                                switch (deptID) {
                                    case 1:
                                        managerTextBox.val("Datuk Seri Utama Ab Rauf Bin Yusoh");
                                        break;
                                    case 2:
                                        managerTextBox.val("Dr Nazdiana Binti Ab.Wahab");
                                        break;
                                    case 3:
                                        managerTextBox.val("Mohamad Hod Bin Rabu");
                                        break;
                                    case 4:
                                        managerTextBox.val("Ahmad Safwan Bin Yusof");
                                        break;
                                    case 5:
                                        managerTextBox.val("Muhammad Farid Bin Ariffin");
                                        break;
                                    case 6:
                                        managerTextBox.val("Zulliana Binti Muhammad");
                                        break;
                                    case 7:
                                        managerTextBox.val("Nur Amalina Binti Abd Rahman");
                                        break;
                                    case 8:
                                        managerTextBox.val("Norwajunizam Bin Abd Wahab");
                                        break;
                                    case 9:
                                        managerTextBox.val("Dr Nazdiana Binti Ab.Wahab");
                                        break;

                                    default:
                                        managerTextBox.val("");
                                }
                            }
                            
                          </script>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Manager:</label>
                              <input type="text" class="form-control placeholder-label" id="manager" name="manager" readonly>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Position:</label>
                                <select type="text" class="form-select placeholder-label" id="jobtitle" name="jobtitle" placeholder="Position" required>
                                  <option value='-'>Choose Staff Position</option>
                                  <?php
                                    include("../db_conn.php");
                                    $sql = "SELECT * FROM empjobtitle ORDER BY job_id ASC";
                                    
                                    $result = mysqli_query($conn, $sql);
                                    $count = mysqli_num_rows($result);
                                    if ($count > 0) {
                                      $off = 0;
                                      $i = 1 + $off;
                                      while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $row['job_title'] . '">' . $row['job_title'] . '</option>';
                                        $i++;
                                      }
                                    }
                                  ?>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Employment Type:</label>
                              <select class="form-select placeholder-label" id="emptype" name="emptype" required>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Start Employment Date:</label>
                              <div class="input-group">
                                <input type="text" class="form-control placeholder-label" id="startemp" name="startemp"
                                  value="<?php echo date("j/n/Y"); ?>" readonly>
                                  <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-5">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-8">
                            <label for="" class="title-label">Staff Access:</label><br>
                              <input type="checkbox" id="access_imobile" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="access_imobile">
                                <label for="access_imobile" class="title-label" style="margin-left: 5px;">Booking System</label>  
                              <input type="checkbox" id="access_isurat" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="access_isurat">
                                <label for="access_isurat" class="title-label" style="margin-left: 5px;">Letter System</label>
                              <input type="checkbox" id="access_eoutstation" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="access_eoutstation">
                                <label for="access_eoutstation" class="title-label" style="margin-left: 5px;">Outstation System</label>
                              <input type="checkbox" id="access_asset" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="access_asset">
                                <label for="access_asset" class="title-label" style="margin-left: 5px;">Asset System</label>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-8">
                            <label for="" class="title-label">Admin Access:</label><br>
                              <input type="checkbox" id="admin_booking" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="admin_booking">
                                <label for="admin_booking" class="title-label" style="margin-left: 5px;">Booking System</label>
                              <input type="checkbox" id="admin_surat" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="admin_surat">
                                <label for="admin_surat" class="title-label" style="margin-left: 5px;">Letter System</label>
                              <input type="checkbox" id="admin_outstation" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="admin_outstation">
                                <label for="admin_outstation" class="title-label" style="margin-left: 5px;">Outstation System</label>
                              <input type="checkbox" id="admin_asset" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="admin_asset">
                                <label for="admin_asset" class="title-label" style="margin-left: 5px;">Asset System</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </h5>
                <!-- /.box-body -->
                <div class="col-md-2">
                  <div class="form-group">
                    <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-success btn-lg" style="font-size: 15px">Submit</button>
                  </div>
                </div>
                </form>
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


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- daterangepicker -->
    <script src="../../bower_components/moment/min/moment.min.js"></script>
    <script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>

    <!-- data table for file exports -->
    <!-- <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script> -->

    <script>
      $(function() {
        $("#startemp").datepicker({
          dateFormat: 'd/m/yy',
          showButtonPanel: true,
          changeMonth: true,
          changeYear: true,
          autoclose: true
        });
      });
    </script>


</body>

</html>