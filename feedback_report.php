<?php
// session_start();
include "db_conn.php";
include('SuratLatest/functions.php');

$admin_surat = isset($_SESSION['admin_surat']) ? $_SESSION['admin_surat'] : null;

$Last_Name = $_SESSION['Last_Name'];
$Email = $_SESSION['Email'];
$Mobile_phone = $_SESSION['Mobile_phone'];
$Job_Title = $_SESSION['Job_Title'];
$Employment_Type = $_SESSION['Employment_Type'];
$Manager = $_SESSION['Manager'];
$Department = $_SESSION['Department'];
$First_Name = $_SESSION['First_Name'];
$fname = $_SESSION['user_name'];

$emp_number = $_SESSION['emp_number'];

if ($fname == 0) {
  header("Location: logout.php");
  exit(); 
}

if (empty($_SESSION['First_Name'])) {
  header("Location: logout.php");
  exit();
}

?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Feedback Report</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="micthlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style>
  /* Define CSS variables */
  :root {
    --light: #f5f5f5;
    --light-blue: #e3f2fd;
    --blue: #1976d2;
    --light-yellow: #fff9c4;
    --yellow: #fbc02d;
    --light-orange: #ffe0b2;
    --orange: #fb8c00;
    --dark: #333;
  }

  /* Your CSS styles */
  .box-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    grid-gap: 24px;
    margin-top: 36px;
  }

  .box-info li {
    padding: 24px;
    background: var(--light);
    border-radius: 20px;
    display: flex;
    align-items: center;
    gap: 24px;
  }

  .box-info li .bx {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    font-size: 36px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .box-info li:nth-child(1) .bx {
    background: var(--light-blue);
    color: var(--blue);
  }

  .box-info li:nth-child(2) .bx {
    background: var(--light-yellow);
    color: var(--yellow);
  }

  .box-info li:nth-child(3) .bx {
    background: var(--light-orange);
    color: var(--orange);
  }

  .box-info li .text h3 {
    font-size: 24px;
    font-weight: 600;
    color: var(--dark);
  }

  .box-info li .text p {
    color: var(--dark);
  }

  .table-data {
    display: flex;
    flex-wrap: wrap;
    grid-gap: 24px;
    margin-top: 24px;
    width: 100%;
    color: var(--dark);
  }

  .table-data>div {
    border-radius: 20px;
    background: var(--light);
    padding: 24px;
    overflow-x: auto;
  }

  .table-data .head {
    display: flex;
    align-items: center;
    grid-gap: 16px;
    margin-bottom: 24px;
  }

  .table-data .head h3 {
    margin-right: auto;
    font-size: 24px;
    font-weight: 600;
  }

  .table-data .head .bx {
    cursor: pointer;
  }

  .table-data .order {
    flex-grow: 1;
    flex-basis: 500px;
  }

  .table-data .order table {
    width: 100%;
    border-collapse: collapse;
  }

  .table-data .order table th {
    padding-bottom: 12px;
    font-size: 13px;
    text-align: left;
    border-bottom: 1px solid var(--grey);
  }

  .table-data .order table td {
    padding: 16px 0;
  }

  .table-data .order table tr td:first-child {
    display: flex;
    align-items: center;
    grid-gap: 12px;
    padding-left: 6px;
  }

  .table-data .order table td img {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
  }

  .table-data .order table tbody tr:hover {
    background: var(--grey);
  }

  .table-data .order table tr td .status {
    font-size: 10px;
    padding: 6px 16px;
    color: var(--light);
    border-radius: 20px;
    font-weight: 700;
  }

  .table-data .order table tr td .status.completed {
    background: var(--blue);
  }

  .table-data .order table tr td .status.process {
    background: var(--yellow);
  }

  x.table-data .order table tr td .status.pending {
    background: var(--orange);
  }


  .table-data .todo {
    flex-grow: 1;
    flex-basis: 300px;
  }

  .table-data .todo .todo-list {
    width: 100%;
  }

  .table-data .todo .todo-list li {
    width: 100%;
    margin-bottom: 16px;
    background: var(--grey);
    border-radius: 10px;
    padding: 14px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .table-data .todo .todo-list li .bx {
    cursor: pointer;
  }

  .table-data .todo .todo-list li.completed {
    border-left: 10px solid var(--blue);
  }

  .table-data .todo .todo-list li.not-completed {
    border-left: 10px solid var(--orange);
  }

  .table-data .todo .todo-list li:last-child {
    margin-bottom: 0;
  }
</style>


<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
            <a href="main_user.php" class="logo d-flex align-items-center">
                <img src="logomicth.png" alt="">
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
				<a class="nav-link collapsed" href="main_user.php">
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
                <a class="nav-link collapsed" href="BookingSystem/user_booking_vehicle.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Book Vehicle</span>
                </a>
              </li>
              <?php if ($_SESSION['admin_booking'] == "1") { ?>
              <li class="nav-item">
                <a class="nav-link collapsed" href="BookingSystem/list_vehicle.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>List of Vehicle</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="BookingSystem/add_vehicle.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Add Vehicle</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="BookingSystem/usage_record_monthly.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>All Usage Record</span>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a class="nav-link collapsed" href="BookingSystem/user_record.php" style="padding-left: 60px">
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
                <a class="nav-link collapsed" href="BookingSystem/user_booking_Room.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Book Room</span>
                </a>
              </li>
              <?php if ($_SESSION['admin_booking'] == "1") { ?>
              <li class="nav-item">
                <a class="nav-link collapsed" href="BookingSystem/list_room.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>List of Room</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="BookingSystem/add_room.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Add Room</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="BookingSystem/room_record_monthly.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>All Usage Record</span>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a class="nav-link collapsed" href="BookingSystem/user_record_Room.php" style="padding-left: 60px">
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
						<a class="nav-link collapsed" href="SuratLatest/SuratDaftarSuratKeluar.php">
							<i class="bi bi-pencil-square" style="font-size: 1em"></i>
							<span>Register Outgoing Letter</span>
						</a>
					</li>
					<?php if ($admin_surat == 1): ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="SuratLatest/SuratDaftarSuratMasuk.php">
              <i class="bi bi-pencil-square" style="font-size: 1em"></i>
              <span>Register Incoming Letter</span>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#record-letter-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
              <i class="bi bi-file-earmark-text" style="font-size: 1em"></i></i><span>Letter Record</span>
              <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
            </a>
            <ul id="record-letter-nav" class="nav-content collapse" data-bs-parent="#letter-system-nav">
              <li class="nav-item">
                <a class="nav-link collapsed" href="SuratLatest/SuratRekodSuratKeluar.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Outgoing Letter</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="SuratLatest/SuratRekodSuratMasuk.php" style="padding-left: 60px">
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
            <a class="nav-link collapsed" href="eoustation3.0/dashStaff.php">
              <i class="bi bi-calendar-fill" style="font-size: 1em"></i>
              <span>My Report</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="eoustation3.0/FormStaff.php">
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
                <a class="nav-link collapsed" href="eoustation3.0/myreport.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>View Report</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="eoustation3.0/data.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Generate Report</span>
                </a>
              </li>
              <?php
              include('eoustation3.0/db_conn.php');
              $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00'";
              $result = mysqli_query($conn, $sql);
              $totalRows = mysqli_num_rows($result);
              ?>
              <li class="nav-item">
                <a class="nav-link collapsed" href="eoustation3.0/SNC.php" style="padding-left: 60px">
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
						<a class="nav-link collapsed" href="asetEd/pages/tables/staffregaset.php">
							<i class="bi bi-archive-fill" style="font-size: 1em"></i>
							<span>Registered Asset</span>
						</a>
					</li>
          <li class="nav-item">
						<a class="nav-link collapsed" href="asetEd/pages/forms/staffreqaset.php">
							<i class="bi bi-clipboard2-check-fill" style="font-size: 1em"></i>
							<span>Request New Asset</span>
						</a>
					</li>
          <?php if ($_SESSION['admin_asset'] == "1") { ?>
          <li class="nav-item">
						<a class="nav-link collapsed" href="asetEd/pages/forms/dafaset.php">
							<i class="bi bi-pencil-square" style="font-size: 1em"></i>
							<span>Register New Asset</span>
						</a>
					</li>
          <li class="nav-item">
						<a class="nav-link collapsed" href="asetEd/pages/tables/laporanas.php">
							<i class="bi bi-file-earmark-text-fill" style="font-size: 1em"></i>
							<span>Asset & Inventory</span>
						</a>
					</li>
          <li class="nav-item">
						<a class="nav-link collapsed" href="asetEd/pages/tables/laporlupus.php">
							<i class="bi bi-file-earmark-x-fill" style="font-size: 1em"></i>
							<span>Disposal Report</span>
						</a>
					</li>
          <li class="nav-item">
						<a class="nav-link collapsed" href="asetEd/pages/tables/staffrequest.php">
							<i class="bi bi-check-circle-fill" style="font-size: 1em"></i>
							<span>Staff Request</span>
						</a>
					</li>
          <li class="nav-item">
						<a class="nav-link collapsed" href="asetEd/pages/forms/uploadcsv.php">
							<i class="bi bi-file-excel-fill" style="font-size: 1em"></i>
							<span>Import Excel</span>
						</a>
					</li>
          <li class="nav-item">
						<a class="nav-link collapsed" href="asetEd/hometetapan.php">
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
						<a class="nav-link collapsed" href="setting.php">
							<i class="bi bi-person-fill" style="font-size: 1em"></i>
							<span>Profile</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link collapsed" href="feedback.php">
							<i class="bi bi-chat-right-text-fill" style="font-size: 1em"></i>
							<span>Feedback</span>
						</a>
					</li>
          <?php if ($_SESSION['func_admin'] == "1") { ?>
          <li class="nav-item">
            <a class="active" href="feedback_report.php">
              <i class="bi bi-chat-right-dots-fill" style="font-size: 1em; background-color: transparent"></i>
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
                <a class="nav-link collapsed" href="eoustation3.0/register.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Register New User</span>
                </a>
              </li>  
              <li class="nav-item">
                <a class="nav-link collapsed" href="SSO/accessSSO.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Access View</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="SSO/userSSO.php" style="padding-left: 60px">
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
  <h1>View Feedback <strong>
 
    </strong></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="main_user.php">Home Page</a></li>
      <li class="breadcrumb-item active">View Feedback</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-20">
      <div class="row">
        <div class="col-12">
          <div class="card recent-sales">
            <div class="card-body">
              <br>
              <form method="post">
                <table class="table" id="DataTable">
                  <thead>
                    <tr>
                      <th rowspan="2">Bil.</th>
                      <th rowspan="2">Name</th>
                      <th rowspan="2">Emp No.</th>
                      <th rowspan="2">comment</th>
                      <th rowspan="2">Date</th>
                      <?php if ($Job_Title == "Manager") { ?>
                      <th rowspan="2">Action</th>
                      <?php  }?>
                    </tr>
                    </centre>
                  </thead>
                  <tbody>
                  <?php
                    if (isset($_POST["delete"])) {
                      $nameToDelete = $_POST['delete'];
                      $sql = "DELETE FROM `feed_back` WHERE id_fb =' $nameToDelete'";
                      $result = mysqli_query($conn, $sql);

                      if ($result) {
                          echo "<script>alert('Delete success.')</script>";
                      } else {
                          echo "<script>alert('Delete failed. " . mysqli_error($conn) . "')</script>";
                      }
                    }

                    $sql = "SELECT * FROM feed_back ";
                    $result = mysqli_query($conn, $sql);
                    $index = 0;

                    if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {
                          $id = $row["id_fb"];
                          $name = $row["full_name"];
                          $emp_num = $row['emp_num'];
                          $comment_fb = $row['comment_fb'];
                          $feedback_date = $row['feedback_date'];
                          $index++;
                  
                          echo "
                          <tr>
                            <td>$index</td>
                            <td>$name</td>
                            <td>$emp_num</td>
                            <td>$comment_fb</td>
                            <td>$feedback_date</td>";
                  
                          if ($Job_Title == 'Manager') {
                            echo "
                            <td>
                              <form method='POST'>
                                <input type='hidden' name='delete' value='$id'>
                                <button class='button btn btn-danger' type='submit' name='submit'
                                  onclick='return checkdelete()'> Delete
                                </button>
                              </form>
                            </td>";
                          }
                          echo "</tr>";
                      }
                    }
                  ?>
                  <script>
                    function checkdelete() {
                      return confirm("Are you sure you want to delete this?");
                    }
                  </script>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
          <br>
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

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
  class="bi bi-arrow-up-short"></i></a>

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
    <!-- data table for file exports -->
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
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
            $('#DataTable').DataTable({
                searching: true,
                info: true,
                paging: false,
                dom: 'Bfrtip',
                buttons: [

                ]
            });
        });
    </script>
</body>

</html>