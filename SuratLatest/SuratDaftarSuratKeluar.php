<?php
include('functions.php');

//-----------------------ACCESS INCOMING LETTER-------------------------------------
$admin_surat = isset($_SESSION['admin_surat']) ? $_SESSION['admin_surat'] : null;

//-----------------------------------------------------------------------------------

if (isset($_POST['view'])) {
  $user_id = $_GET['emp_number'];

  echo "ok boleh view";
}

/*if (isset($_POST['approved']))
    {
        $appUpdateQuery = "UPDATE bookings SET status= 'APPROVED' WHERE id='".$_POST['row_id']."'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);

    }
        
    if (isset($_POST['rejected']))
    {
$s="CANCEL BY STAFF";

        $rejUpdateQuery = "INSERT INTO cancel (id, date, user_id, user_name, purpose, destination, driver_name, vehicle_id, model_plat)
      SELECT id, date, user_id, user_name, purpose, destination, driver_name, vehicle_id, model_plat FROM bookings WHERE id='".$_POST['row_id']."'";
        $rejUpdateResult = mysqli_query($db,$rejUpdateQuery);

              $rejUpdateQuery1 = "DELETE FROM bookings WHERE id='".$_POST['row_id']."'";
        $rejUpdateResult1 = mysqli_query($db,$rejUpdateQuery1);


    }
        if (isset($_POST['return']))
    {

        $appUpdateQuery = "UPDATE bookings SET status= 'RETURN VEHICLE' WHERE id='".$_POST['row_id']."'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);
                $appUpdateQuery1 = "UPDATE management SET status= 'RETURN VEHICLE' WHERE id='".$_POST['row_id']."'";
        $appUpdateResult1 = mysqli_query($db, $appUpdateQuery1);
    }*/

if (empty($_SESSION['First_Name'])) {
  header("Location: iout.php");
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

  <title>Register Outgoing Letter</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- <meta http-equiv="refresh" content="15"> -->

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Favicons -->
  <link href="../micthlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

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
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- Logo -->
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
            <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
              Me</span>
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
              <a class="dropdown-item d-flex align-items-center" href="iout.php">
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
      <a class="nav-link" data-bs-target="#letter-system-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-envelope-fill"></i>
        <span>Letter System</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="letter-system-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li class="nav-item">
          <a class="active" href="../SuratLatest/SuratDaftarSuratKeluar.php">
            <i class="bi bi-pencil-square" style="font-size: 1em; background-color: transparent"></i>
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
      <a class="nav-link collapsed" data-bs-target="#settings-system-nav" data-bs-toggle="collapse" href="#" href="">
        <i class="bi bi-gear-fill"></i>
        <span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="settings-system-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
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
          <a class="nav-link collapsed" data-bs-target="#access-user-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
            <i class="bi bi-person-badge-fill" style="font-size: 1em"></i></i><span>Access User</span>
            <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
          </a>
          <ul id="access-user-nav" class="nav-content collapse" data-bs-parent="#settings-system-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="../eoustation3.0/register.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
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

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Register New Outgoing Letter</strong></h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
          <li class="breadcrumb-item"><a href="../main_user.php">Home Page</a></li>
          <li class="breadcrumb-item active">Register Outgoing Letter</li>
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
        <div class="col-12">
          <div class="card top-selling">
            <div class="sb">
              <div class="card-body">
                <h5 class="card-title"><strong>OUTGOING LETTER INFORMATION</strong><br />
                  <!-- List and select category from field form -->
                  <?php

                  $user_id = $_SESSION['emp_number'];

                  $query = "
    SELECT empmaininfo.*, empdept.nickname
    FROM empmaininfo
    JOIN empdept ON empmaininfo.Department = empdept.dept_id
    WHERE empmaininfo.Internal_Id = ?
";
                  include('db_conn.php');

                  $stmt = $db_login->prepare($query);
                  $stmt->bind_param("i", $user_id); // Bind the user ID parameter
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $user_info = $result->fetch_assoc();
                  ?>
                  <div class="row" style="margin-top: 10px">
                    <div class="col-md-12">
                      <!-- General form elements -->
                      <!-- /.box-header -->
                      <!-- Form start -->
                      <form role="form" action="" method="post">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputEmail1" style="font-weight: 400">Registration Date:</label>
                            <div class="input-group">
                              <?php
                              date_default_timezone_set('Asia/Kuala_Lumpur');
                              $formatted_date = date("Y-m-d");
                              ?>
                              <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="tarikh_daftar" name="tarikh_daftar" value="<?php echo $formatted_date; ?>" readonly>

                              <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputEmail1" style="font-weight: 400">Applicant:</label>
                            <div class="input-group">
                              <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="InputNamaPemohon" name="InputNamaPemohon" value="<?php echo strtoupper($_SESSION['First_Name']); ?>" readonly><br>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputEmail1" style="font-weight: 400">Reference No:</label>
                            <div class="input-group">
                              <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="InputNoRujukanSuratAwal" name="InputNoRujukanSuratAwal" value="MICTH/<?php echo strtoupper($user_info['nickname']); ?>/" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputEmail1" style="font-weight: 400">Sub Unit:</label>
                            <div class="input-group">
                              <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="InputNoRujukanSuratTgh" name="InputNoRujukanSuratTgh" placeholder="Type subunit" oninput="checkInput()"><br>
                            </div>
                            <div class="input-group">
                              <input type="hidden" style="font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="InputNoRujukanSuratAkhir" name="InputNoRujukanSuratAkhir" value="" readonly><br>
                            </div>
                          </div>
                        </div>

                        <script>
                          function checkInput() {
                            const middleInput = document.getElementById('InputNoRujukanSuratTgh').value.trim();
                            const endInput = document.getElementById('InputNoRujukanSuratAkhir');

                            if (middleInput && middleInput !== "0") {
                              endInput.value = `/${new Date().toLocaleString('default', { month: 'short' }).toUpperCase()}${new Date().getFullYear()}`;
                              // to declare Sep jadi SEPT
                              /*if (month === 'Sep') {
                                      month = 'Sept';
                                      }
                              */   
                            } else {
                              endInput.value = `${new Date().toLocaleString('default', { month: 'short' }).toUpperCase()}${new Date().getFullYear()}`;
                             /*if (month === 'Sep') {
                                      month = 'Sept';
                                      }
                              */     
                            }
                          }

                          checkInput();
                        </script>


                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputEmail1" style="font-weight: 400">Recipient / Department / Agency:<span style="color: red; ">  *</span></label>
                            <div class="input-group">
                              <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="InputNamaPenerima" name="InputNamaPenerima" placeholder="Recipient Name" required><br>
                            </div>
                          </div>
                        </div>
                        <!-----------------------------------------------------------------------AKSESS ADMIN SURAT-------------------------------------------------------------------------------------------->
                        <?php
                        if ($admin_surat == 1):
                          $department_id = isset($_SESSION['Department']) ? $_SESSION['Department'] : '';

                          // Fetch the department name based on the department ID from the session
                          $department_name = '';
                          if (!empty($department_id)) {
                            $sqlDept = "SELECT name FROM empdept WHERE dept_id = '$department_id'";
                            $resultDept = mysqli_query($db_login, $sqlDept);
                            if ($resultDept && mysqli_num_rows($resultDept) > 0) {
                              $rowDept = mysqli_fetch_array($resultDept);
                              $department_name = $rowDept['name'];
                            }
                          }

                          // Define allowed departments
                          $allowed_departments = [
                            'Chief Executive Officer' => 1, // Replace 1 with the actual ID for CEO
                            $department_name => $department_id
                          ];
                        ?>
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="exampleInputEmail1" style="font-weight: 400">Issuing Department :<span style="color: red; ">  *</span></label>
                              <select style="font-size: 1.4rem; line-height: 1.0; height: 34px; -webkit-appearance: menulist-button;
                       -moz-appearance: menulist-button; appearance: menulist-button;" class="form-control" id="department_pilihan" name="department_pilihan">
                                <option value="" disabled selected>-- Department --</option>
                                <?php
                                foreach ($allowed_departments as $dept_name => $dept_id) {
                                  if (!empty($dept_name)) {
                                    echo '<option value="' . htmlspecialchars($dept_id) . '">' . htmlspecialchars($dept_name) . '</option>';
                                  }
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                        <?php endif; ?>
                        <!-----------------------------------------------------------------------END AKSESS ADMIN SURAT-------------------------------------------------------------------------------------------->

                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputEmail1" style="font-weight: 400">Subject / Title:<span style="color: red; ">  *</span></label>
                            <div class="input-group" style="flex-grow: 1;">
                              <textarea class="form-control" style="font-size: 1.4rem; line-height: 1.8" rows="3" cols="50" id="InputTajukSurat" name="InputTajukSurat" required></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight: 450">Delivery Method:<span style="color: red; ">  *</span></label>
                            <div class="radio">
                              <i style="font-size: 1.6rem; line-height: 1.0">
                                <input type="checkbox" name="optionsRadios1[]" id="optionsRadios1" value="Email">
                                Email
                              </i>
                            </div>
                            <div class="radio">
                              <i style="font-size: 1.6rem; line-height: 1.0">
                                <input type="checkbox" name="optionsRadios1[]" id="optionsRadios2" value="By Hand">
                                By Hand
                              </i>
                            </div>
                            <div class="radio">
                              <i style="font-size: 1.6rem; line-height: 1.0">
                                <input type="checkbox" name="optionsRadios1[]" id="optionsRadios3" value="Fax">
                                Fax
                              </i>
                            </div>
                            <div class="radio">
                              <i style="font-size: 1.6rem; line-height: 1.0">
                                <input type="checkbox" name="optionsRadios1[]" id="optionsRadios4" value="Pos / Courier">
                                Pos / Courier
                              </i>
                            </div>
                          </div>
                        </div>
                        <br>
                        <!-- /.box-body -->

                        <!-- /.box -->
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg" style="font-size: 15px">Submit</button>
                      <button type="submit" name="reset" id="reset" class="btn btn-danger btn-lg" style="font-size: 15px">Reset</button>
                    </div>
                  </div>
                  </form>
                  <br>
              </div>
            </div>
          </div>


        </div>
      </div>
      <!-----------------------------------------------------------------------INSERT REKOD--------------------------------------------------------------------------------------------->
      <?php

      // Keluarkan notification untuk mesej berjaya
      function paparMesejBerjayaAset($idnorujsuratFF, $InputDateCvt, $InputNamaPemohon, $InputNamaPenerima, $InputTajukSurat, $text, $department)
      {
        // Create the data preview string
        $dataPreview = '';
        $dataPreview .= 'Date: ' . $InputDateCvt . '\\n';
        $dataPreview .= 'Letter Ref No.: ' . $idnorujsuratFF . '\\n';
        $dataPreview .= 'Recipient: ' . $InputNamaPenerima . '\\n';
        $dataPreview .= 'Title: ' . $InputTajukSurat . '\\n';

        echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
        echo '<script type="text/javascript">
  swal({
      title: "Done!",
      text: "Data has been successfully inserted.\\n\\n' . $dataPreview . '",
      icon: "success",
      button: "Okay",
    }).then(function() {
      window.location = "SuratRekodSuratKeluar.php";
    });
  </script>';
      }

      // Keluarkan notification untuk mesej GAGAL
      function paparMesejGagal()
      {
        echo '<script type="text/javascript">
  Swal.fire({
      title: "Error!",
      text: "Oops! An error occurred, failed to add new record!",
      icon: "error",
      confirmButtonText: "OK"
  }).then((result) => {
      if (result.isConfirmed) {
          history.go(-1);
      }
  });
  </script>';
        exit();
      }

      function paparMesejGagal1()
      {
        echo '<script type="text/javascript">
  Swal.fire({
      title: "Error!",
      text: "Oops! An error occurred, failed to add new supplier!",
      icon: "error",
      confirmButtonText: "OK"
  }).then((result) => {
      if (result.isConfirmed) {
          history.go(-1);
      }
  });
  </script>';
        exit();
      }

      if (isset($_POST['submit'])) {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $InputDate = isset($_POST['tarikh_daftar']) ? $_POST['tarikh_daftar'] : '';
        $InputNoRujukanSuratAwal = isset($_POST['InputNoRujukanSuratAwal']) ? $_POST['InputNoRujukanSuratAwal'] : '';
        $InputNoRujukanSuratTgh = isset($_POST['InputNoRujukanSuratTgh']) ? $_POST['InputNoRujukanSuratTgh'] : '';
        $InputNoRujukanSuratAkhir = isset($_POST['InputNoRujukanSuratAkhir']) ? $_POST['InputNoRujukanSuratAkhir'] : '';
        $InputNamaPemohon = isset($_POST['InputNamaPemohon']) ? mysqli_real_escape_string($db, $_POST['InputNamaPemohon']) : '';
        $InputNamaPenerima = isset($_POST['InputNamaPenerima']) ? mysqli_real_escape_string($db, $_POST['InputNamaPenerima']) : '';
        $InputTajukSurat = isset($_POST['InputTajukSurat']) ? mysqli_real_escape_string($db, $_POST['InputTajukSurat']) : '';
        $text = implode(',', $_POST['optionsRadios1']);
        
        $InputDateCvt = date("Y-m-d", strtotime($InputDate));
    
        if (isset($admin_surat) && $admin_surat == 1) {
            $department = isset($_POST['department_pilihan']) ? $_POST['department_pilihan'] : '';
        } else {
            $department = isset($_SESSION['Department']) ? $_SESSION['Department'] : '';
        }
    
        try {
            $currentYear = date('Y'); // Get current year
            $sqlAP = "SELECT id, no_ruj_surat FROM tbl_surat_out_all ORDER BY id DESC LIMIT 1";
            $resultAP = mysqli_query($db, $sqlAP);
    
            if (mysqli_num_rows($resultAP) > 0) {
                $row = mysqli_fetch_array($resultAP);
                $lastNoRujukanSurat = $row['no_ruj_surat'];
    
                // Debugging: Check the last no_ruj_surat
                echo "Last no_ruj_surat: " . $lastNoRujukanSurat . "<br>";
    
                // Adjust regex to match the format MICTH/DTM/DECYYYY (number)
                preg_match('/\w+\/\w+\/\w+(\d{4})\s\((\d+)\)$/', $lastNoRujukanSurat, $matches);
    
                if (isset($matches[1]) && $matches[1] == $currentYear) {
                    // If the year is the same as the current year, increment the last number
                    $lastNumber = (int)$matches[2] + 1;
                } else {
                    // If the year is different, reset the last number to 1
                    $lastNumber = 1;
                }
    
                // Debugging: Check the lastNumber
                echo "Last number to be used: " . $lastNumber . "<br>";
    
                // Generate the new no_ruj_surat
                $idnorujsuratF = $InputNoRujukanSuratAwal . $InputNoRujukanSuratTgh . $InputNoRujukanSuratAkhir . " (" . $lastNumber . ")";
            } else {
                // If no records exist, start with the first record for the current year
                $idnorujsuratF = $InputNoRujukanSuratAwal . $InputNoRujukanSuratTgh . $InputNoRujukanSuratAkhir . " (1)";
            }
    
            // Insert the new record
            $sql1 = "INSERT INTO tbl_surat_out_all (tarikh_surat, no_ruj_surat, nama_pemohon, nama_penerima, tajuk_surat, kaedah_penghantaran, department_pemohon) 
                     VALUES ('$InputDateCvt', '$idnorujsuratF', '$InputNamaPemohon', '$InputNamaPenerima', '$InputTajukSurat', '$text', '$department')";
            mysqli_query($db, $sql1);
    
            // Check if the insert was successful
            $sql11 = "SELECT * FROM tbl_surat_out_all WHERE no_ruj_surat = '$idnorujsuratF' AND tarikh_surat = '$InputDateCvt'";
            $result11 = mysqli_query($db, $sql11);
    
            if (mysqli_num_rows($result11) > 0) {
                paparMesejBerjayaAset($idnorujsuratF, $InputDateCvt, $InputNamaPemohon, $InputNamaPenerima, $InputTajukSurat, $text, $department);
            } else {
                paparMesejGagal1();
            }
        } catch (Exception $e) {
            echo 'Caught exception insert: ', $e->getMessage(), "\n";
        }
    } else {
        function died($error)
        {
            paparMesejGagal();
        }
    }
      ?>
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


  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="bower_components/raphael/raphael.min.js"></script>
  <script src="bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="bower_components/moment/min/moment.min.js"></script>
  <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



  <script>
    document.querySelector('form').addEventListener('submit', function(event) {
      var checkboxes = document.querySelectorAll('input[name="optionsRadios1[]"]');
      var checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);

      if (!checkedOne) {
        event.preventDefault();
        swal({
          title: "Required",
          text: "Please select at least one Delivery Method.",
          icon: "warning",
          button: "Okay",
        });
      }
    });
  </script>



</body>

</html>