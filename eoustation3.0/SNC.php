<?php
session_start();
include "db_conn.php";

$fname = $_SESSION['user_name'];

$uid = $_SESSION['id'];
$First_Name = $_SESSION['First_Name'];
$Job_Title = $_SESSION['Job_Title'];

if (isset($_POST["update"])) {
  $_SESSION['updateid'] = $_POST['update'];

  header("Location: checkin.php");
  exit();
}

if (isset($_POST["delete"])) {
  $delete = $_POST['delete'];
  $sql = "DELETE FROM `outstation` WHERE id='$delete'";
  $result = mysqli_query($conn, $sql);

  if ($conn->query($sql)) {
  } else {
    echo "<script>alert('Delete failed. $conn -> $error')</script>";
  }
}
if (empty($_SESSION['First_Name'])) {
  header("Location: logout.php");
  exit(4);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pending Check-In [Admin]</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../micthlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>






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
      <a class="nav-link" data-bs-target="#out-system-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-door-open-fill"></i>
        <span>Outstation System</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="out-system-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="../eoustation3.0/dash2.php">
            <i class="bi bi-house-door-fill" style="font-size: 1em"></i>
            <span>Dashboard</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="" href="../eoustation3.0/dashStaff.php">
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
					<a class="nav-link" data-bs-target="#book-room-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
						<i class="bi bi-people" style="font-size: 1em"></i></i><span>Human Resources</span>
						<i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
					</a>
					<ul id="book-room-nav" class="nav-content collapse show" data-bs-parent="#booking-system-nav">
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
							<a class="active" href="../eoustation3.0/SNC.php" style="padding-left: 60px">
								<i class="bi bi-caret-right-fill" style="background-color: transparent"></i>
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
          <a class="nav-link collapsed" href="">
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
  </aside>
  <!-- End Sidebar-->

  <!-- Content Wrapper -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pending Staff Check-In <strong>

        </strong></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../main_user.php">Home Page</a></li>
          <li class="breadcrumb-item active">Pending Check-In</li>
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
              <div class="row">
    <div class="col-md-4">
        <form method="get" action="">
            <br>
            <input type="date" name="dateOut" value="<?= isset($_GET['dateOut']) ? htmlspecialchars($_GET['dateOut']) : '' ?>" class="form-control" placeholder="YYYY-MM-DD">
            <br>
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="SNC.php" class="btn btn-danger">Reset</a>
        </form>
    </div>
</div>

<div class="table-responsive">
<table id="datatable2" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Bil.</th>
                <th>Name</th>
                <th>Purpose</th>
                <th>Location</th>
                <th>Date-Out</th>
                <th>Time-Out</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
                $uname = $row["name"];
                $status = $row["status"];
                $purpose = $row["purpose"];
                $location = $row["location"];
                $dateOut = $row["dateOut"];
                $timeOut = $row["timeOut"];

                if (isset($_GET['dateOut']) && $_GET['dateOut'] != $dateOut) {
                    continue; 
                }

                $index++;
            ?>
                <tr>
                    <td><?php echo $index; ?></td>
                    <td><?php echo $uname; ?></td>
                    <td><?php echo $purpose; ?></td>
                    <td><?php echo $location; ?></td>
                    <td><?php echo $dateOut; ?></td>
                    <td><?php echo $timeOut; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="employee_id" value="<?php echo $id; ?>">
                            <button type="submit" class="btn btn-warning" name="notify">Notify</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
                  <?php
                  if (isset($_POST["notify"])) {
                    $employee_id = $_POST["employee_id"];
                    $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00' and id = $employee_id";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                      try {
                        $token = "eQZ5@#XrFmQvui36qkmG"; // bergantung
                        $curl = curl_init();

                        while ($row = mysqli_fetch_assoc($result)) {
                          $name3 = $row['name'];
                          $dateOut2 = $row['dateOut'];
                          $dateIn = $row['dateIn'];
                          $location2 = $row['location'];
                          $timeOut2 = $row["timeOut"];

                          $sql2 = "SELECT * FROM empmaininfo WHERE user_name = ? or First_Name = ? ";
                          include('../db_conn.php');

                          $stmt = mysqli_prepare($conn, $sql2);
                          mysqli_stmt_bind_param($stmt, "ss", $name3, $name3);
                          mysqli_stmt_execute($stmt);
                          $result3 = mysqli_stmt_get_result($stmt);
                          $row2 = mysqli_fetch_assoc($result3);
                          $tifon = $row2['Mobile_phone'];
                          $First_Name = $row2['First_Name'];
                          $target = "$tifon";
                          $message = "Hi $First_Name,

Please be reminded that you have a pending check-in following your recent outstation trip. Kindly complete the check-in process as soon as possible.
                                                                  
Trip Details:
- Destination: $location2
- Trip Date: $dateOut2 at $timeOut2
- Pending Check-In Status: Incomplete
                                                                  
To complete your check-in, please click the link below:
https://i.micth.com/Micthsystem/eoustation3.0/qrform.php                                                                  
Thank you!
Please do not reply to this message; this is a notification only.";;

                          curl_setopt_array(
                            $curl,
                            array(
                              CURLOPT_URL => 'https://api.fonnte.com/send',
                              CURLOPT_RETURNTRANSFER => true,
                              CURLOPT_ENCODING => '',
                              CURLOPT_MAXREDIRS => 10,
                              CURLOPT_TIMEOUT => 0,
                              CURLOPT_FOLLOWLOCATION => true,
                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                              CURLOPT_CUSTOMREQUEST => 'POST',
                              CURLOPT_POSTFIELDS => http_build_query(
                                array(
                                  'target' => $target,
                                  'message' => $message,
                                  'countryCode' => '60',
                                )
                              ),
                              CURLOPT_HTTPHEADER => array(
                                "Authorization: $token"
                              ),
                            )
                          );

                          $response = curl_exec($curl);
                          $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

                          if ($httpcode !== 200) {
                            throw new Exception("Failed to send notification: HTTP status code $httpcode");
                          }
                        }
                        curl_close($curl);

                        $msg = "<div class='alert alert-success'>Notification Sent Successfully</div>";
                      } catch (Exception $e) {
                        $msg = "<div class='alert alert-danger'>Error: {$e->getMessage()}</div>";
                      }
                    } else {
                      // Handle the case where the query fails
                      echo "Error: " . mysqli_error($conn);
                    }
                  }
                  ?>

                </div>

              </div>


              <br>
              <!--Start utk table approval lia 30/10/2023 -->

              <!--End utk table approval lia -->

            </div>

          </div>
        </div>



      </div>
      </div><!-- End News & Updates -->

      </div><!-- End Right side columns -->

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
  $(function() {
    $("#datatable2").DataTable({
      'responsive': true,
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': false
    });
    $("#datatable").DataTable({
      'responsive': true,
      'paging': true,
      'lengthChange': true,
      'searching': true,
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



</body>

</html>