<?php
include ('functions.php');

//$mysqli = new mysqli('localhost', 'root', '', 'idrive');

include ('../db_conn.php');

if (isset($_GET['Internal_Id'])) {
  $sql_query = "SELECT `Internal_Id`, CONCAT(`First_Name`, ' ', `Last_Name`) AS `Full_Name`, `First_Name`, `Last_Name`,
    `Email`, `Mobile_phone`, `Job_Title`, `Employment_Type`, `Manager`, `Department`, `Joining_Date`, `Employment_End_Date`,
    `user_name`, `Active_Inactive`, `access_isurat`, `access_aset`, `access_imobile`, `access_eoutstation`, `access_tower`,
    `admin_surat`, `admin_asset`, `admin_booking`, `admin_outstation`
    FROM empmaininfo WHERE Internal_Id=" . $_GET['Internal_Id'];

  $result_set = mysqli_query($conn, $sql_query);
  $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
}
if (isset($_POST['btn-update'])) {
  
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $username = $_POST['username'];
  $email_address = $_POST['email'];
  
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
  
  // update access
  $access_isurat = isset($_POST['access_isurat']) ? 1 : 0;
  $access_aset = isset($_POST['access_asset']) ? 1 : 0;
  $access_imobile = isset($_POST['access_imobile']) ? 1 : 0;
  $access_eoutstation = isset($_POST['access_eoutstation']) ? 1 : 0;
  $access_tower = isset($_POST['access_tower']) ? 1 : 0;

  $admin_surat = isset($_POST['admin_surat']) ? 1 : 0;
  $admin_asset = isset($_POST['admin_asset']) ? 1 : 0;
  $admin_booking = isset($_POST['admin_booking']) ? 1 : 0;
  $admin_outstation = isset($_POST['admin_outstation']) ? 1 : 0;

  // sql query for update data into database
  $sql_query = "UPDATE empmaininfo 
    SET access_isurat='$access_isurat', access_aset='$access_aset',
        access_imobile='$access_imobile', access_eoutstation='$access_eoutstation',
        access_tower='$access_tower', admin_surat='$admin_surat',
        admin_asset='$admin_asset', admin_booking='$admin_booking',
        admin_outstation='$admin_outstation',
        First_Name='$first_name', Last_Name='$last_name', Email='$email_address',
        Job_Title='$jobtitle_id', Employment_Type='$employment_type', Manager='$manager_id',
        Department='$department_id', Joining_Date='$start_employ', user_name='$username'
        WHERE Internal_Id=" . $_GET['Internal_Id'];

  if (mysqli_query($conn, $sql_query)) {
    ?>
    <script type="text/javascript">
      alert('Staff updated successfully!');
      window.location.href = 'accessSSO.php';
    </script>
    <?php
  } else {
    ?>
    <script type="text/javascript">
      alert('Oops! Unable to update. Please inform system admin.');
    </script>
    <?php
  }
  // sql query execution function
}
if (isset($_POST['btn-cancel'])) {
  header("Location: accessSSO.php");
}

if (empty($_SESSION['First_Name'])) {
  header("Location: iout.php");
  exit();
}

?>
<!doctype html>
<html lang="en">
<style>
  @media only screen and (max-width: 760px),
  (min-device-width: 802px) and (max-device-width: 1020px) {

    /* Force table to not be like tables anymore */
    table,
    thead,
    tbody,
    th,
    td,
    tr {
      display: block;

    }

    .empty {
      display: none;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    th {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    tr {
      border: 1px solid #ccc;
    }

    td {
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
    }



    /*
Label the data
*/
    td:nth-of-type(1):before {
      content: "Sunday";
    }

    td:nth-of-type(2):before {
      content: "Monday";
    }

    td:nth-of-type(3):before {
      content: "Tuesday";
    }

    td:nth-of-type(4):before {
      content: "Wednesday";
    }

    td:nth-of-type(5):before {
      content: "Thursday";
    }

    td:nth-of-type(6):before {
      content: "Friday";
    }

    td:nth-of-type(7):before {
      content: "Saturday";
    }


  }

  /* Smartphones (portrait and landscape) ----------- */

  @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
    body {
      padding: 0;
      margin: 0;
    }
  }

  /* iPads (portrait and landscape) ----------- */

  @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
    body {
      width: 495px;
    }
  }

  @media (min-width:641px) {
    table {
      table-layout: fixed;
    }

    td {
      width: 33%;
    }
  }

  .row {
    margin-top: 20px;
  }

  .today {
    background: yellow;
  }


</style>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Update Staff Info</title>
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
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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

    <div class="search-bar">
      <!--<form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>-->
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Me</span>
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
          <a class="nav-link collapsed" data-bs-target="#request-asset-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
            <i class="bi bi-clipboard2-check-fill" style="font-size: 1em"></i></i><span>Request Asset</span>
            <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
          </a>
          <ul id="request-asset-nav" class="nav-content collapse" data-bs-parent="#asset-system-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="../asetEd/pages/forms/staffreqaset.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>New Asset</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Loan Asset</span>
              </a>
            </li>
          </ul>
        </li>
        <?php if ($_SESSION['admin_asset'] == "1") { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#admin-asset-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
            <i class="bi bi-clipboard2-check-fill" style="font-size: 1em"></i></i><span>Admin</span>
            <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
          </a>
          <ul id="admin-asset-nav" class="nav-content collapse" data-bs-parent="#asset-system-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="../asetEd/pages/forms/dafaset.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Register New Asset</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../asetEd/pages/tables/laporanas.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Asset & Inventory</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../asetEd/pages/tables/laporlupus.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Disposal Report</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../asetEd/pages/tables/staffrequest.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Staff Request</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../asetEd/pages/forms/uploadcsv.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Import Excel</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../asetEd/hometetapan.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Asset Settings</span>
              </a>
            </li>
          </ul>
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
          <a class="nav-link collapsed" href="">
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
              <a class="active" href="../SSO/userSSO.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill" style="background-color: transparent"></i></i>
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
      <h1>Update Staff Info</h1>
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
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Staff Name:</label>
                                <input type="text" class="form-control placeholder-label" id="fullname" name="fullname"
                                  value="<?php echo $fetched_row['Full_Name']; ?>" readonly>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">First Name:</label>
                                <input type="text" class="form-control placeholder-label" id="firstname" name="firstname"
                                  value="<?php echo $fetched_row['First_Name']; ?>" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Last Name:</label>
                                <input type="text" class="form-control placeholder-label" id="lastname" name="lastname"
                                  value="<?php echo $fetched_row['Last_Name']; ?>" required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Username:</label>
                                <input type="text" class="form-control placeholder-label" id="username" name="username"
                                  value="<?php echo $fetched_row['user_name']; ?>" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Email Address:</label>
                                <input type="text" class="form-control placeholder-label" id="email" name="email"
                                  value="<?php echo $fetched_row['Email']; ?>" required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Employee ID:</label>
                                <input type="text" class="form-control placeholder-label" id="staffId" name="staffId"
                                  value="<?php echo $fetched_row['Internal_Id']; ?>" readonly>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Status:</label>
                                <input type="text" class="form-control placeholder-label" id="status" name="status"
                                  value="<?php echo $fetched_row['Active_Inactive']; ?>" readonly>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Manager:</label>
                              <?php
                                $manager = $fetched_row['Manager'];
                              ?>
                              <select type="text" class="form-select placeholder-label" id="manager" name="manager" placeholder="Manager"
                                value="<?php echo $manager; ?>">
                                <option value='-'>Choose Manager</option>
                                <?php
                                  include("db_conn.php");
                                  $sql = "SELECT * FROM empmanager ORDER BY manager_id ASC";
                                  
                                  $result = mysqli_query($db, $sql);
                                  $count = mysqli_num_rows($result);
                                  if ($count > 0) {
                                    $off = 0;
                                    $i = 1 + $off;
                                    while ($row = mysqli_fetch_array($result)) {
                                      $selected = ($row['manager_id'] == $manager) ? 'selected' : '';
                                      echo '<option value="' . $row['name'] . '" ' . $selected . '>' . $row['name'] . '</option>';
                                      $i++;
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Department:</label>
                              <?php
                                $department = $fetched_row['Department'];
                              ?>
                              <select type="text" class="form-select placeholder-label" id="department" name="department" placeholder="Department"
                                value="<?php echo $department; ?>">
                                <option value='-'>Choose Staff Department</option>
                                <?php
                                  include("db_conn.php");
                                  $sql = "SELECT * FROM empdept ORDER BY dept_id ASC";
                                  
                                  $result = mysqli_query($db, $sql);
                                  $count = mysqli_num_rows($result);
                                  if ($count > 0) {
                                    $off = 0;
                                    $i = 1 + $off;
                                    while ($row = mysqli_fetch_array($result)) {
                                      $selected = ($row['dept_id'] == $department) ? 'selected' : '';
                                      echo '<option value="' . $row['name'] . '" ' . $selected . '>' . $row['name'] . '</option>';
                                      $i++;
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">Position:</label>
                                <?php
                                  $job_title = $fetched_row['Job_Title'];
                                ?>
                                <select type="text" class="form-select placeholder-label" id="jobtitle" name="jobtitle" placeholder="Position"
                                  value="<?php echo $job_title; ?>">
                                  <option value='-'>Choose Staff Position</option>
                                  <?php
                                    include("db_conn.php");
                                    $sql = "SELECT * FROM empjobtitle ORDER BY job_id ASC";
                                    
                                    $result = mysqli_query($db, $sql);
                                    $count = mysqli_num_rows($result);
                                    if ($count > 0) {
                                      $off = 0;
                                      $i = 1 + $off;
                                      while ($row = mysqli_fetch_array($result)) {
                                        $selected = ($row['job_id'] == $job_title) ? 'selected' : '';
                                        echo '<option value="' . $row['job_title'] . '" ' . $selected . '>' . $row['job_title'] . '</option>';
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
                              <select class="form-select placeholder-label" id="emptype" name="emptype">
                                <option value="Full Time" <?php if ($fetched_row['Employment_Type'] === 'Full Time') echo 'selected'; ?>>Full Time</option>
                                <option value="Part Time" <?php if ($fetched_row['Employment_Type'] === 'Part Time') echo 'selected'; ?>>Part Time</option>
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
                                  value="<?php echo $fetched_row['Joining_Date']; ?>" readonly>
                                  <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="title-label">End Employment Date:</label>
                              <div class="input-group">
                                <input type="text" class="form-control placeholder-label" id="endemp" name="endemp"
                                  value="<?php echo $fetched_row['Employment_End_Date']; ?>" readonly>
                                  <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                              </div>
                            </div>
                          </div>

                          <?php
                            // Utility function to check if a checkbox should be checked
                            function isChecked($value){
                              return isset($value) && $value == 1 ? 'checked' : '';
                            }
                          ?>

                          <div class="col-md-8">
                            <label for="" class="title-label">Staff Access:</label><br>
                              <input type="checkbox" id="access_imobile" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="access_imobile" <?php echo isChecked($fetched_row['access_imobile']); ?>>
                                <label for="access_imobile" class="title-label" style="margin-left: 5px;">Booking System</label>  
                              <input type="checkbox" id="access_isurat" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="access_isurat" <?php echo isChecked($fetched_row['access_isurat']); ?>>
                                <label for="access_isurat" class="title-label" style="margin-left: 5px;">Letter System</label>
                              <input type="checkbox" id="access_eoutstation" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="access_eoutstation" <?php echo isChecked($fetched_row['access_eoutstation']); ?>>
                                <label for="access_eoutstation" class="title-label" style="margin-left: 5px;">Outstation System</label>
                              <input type="checkbox" id="access_asset" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="access_asset" <?php echo isChecked($fetched_row['access_aset']); ?>>
                                <label for="access_asset" class="title-label" style="margin-left: 5px;">Asset System</label>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-8">
                            <label for="" class="title-label">Admin Access:</label><br>
                              <input type="checkbox" id="admin_booking" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="admin_booking" <?php echo isChecked($fetched_row['admin_booking']); ?>>
                                <label for="admin_booking" class="title-label" style="margin-left: 5px;">Booking System</label>
                              <input type="checkbox" id="admin_surat" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="admin_surat" <?php echo isChecked($fetched_row['admin_surat']); ?>>
                                <label for="admin_surat" class="title-label" style="margin-left: 5px;">Letter System</label>
                              <input type="checkbox" id="admin_outstation" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="admin_outstation" <?php echo isChecked($fetched_row['admin_outstation']); ?>>
                                <label for="admin_outstation" class="title-label" style="margin-left: 5px;">Outstation System</label>
                              <input type="checkbox" id="admin_asset" style="height: 15px; width: 20px; margin-left: 20px;"
                                name="admin_asset" <?php echo isChecked($fetched_row['admin_asset']); ?>>
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
                    <button type="submit" name="btn-update" id="btn-update" class="btn btn-success btn-lg" style="font-size: 15px">Update</button>
                    <button type="submit" name="btn-cancel" id="btn-cancel" class="btn btn-danger btn-lg" style="font-size: 15px">Cancel</button>
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

  <!-- ======= Footer ======= -->
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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

  $(function() {
    $("#endemp").datepicker({
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