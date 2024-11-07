<?php
session_start();
include "db_conn.php";
$First_Name = $_SESSION['First_Name'];
$fname = $_SESSION['user_name'];
$Job_Title = $_SESSION['Job_Title'];

$id = $_SESSION['updateid'];
$emp_number = $_SESSION['emp_number'];
$sql = "SELECT * FROM outstation WHERE id ='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row["name"];
$location = $row['location'];
$purpose = $row['purpose'];
$dateOut = $row['dateOut'];
$timeOut = $row['timeOut'];
$dateIn = $row['dateIn'];
$timeIn = $row['timeIn'];
$emp_number = $row['emp_no'];

if (isset($_POST['submit'])) {
  date_default_timezone_set('Asia/Kuala_Lumpur');

  // Get the current date and time in the Malaysia time zone
  $current_date = date("Y-m-d H:i:s");

  $timeIn = $_POST['timeIn'];
  $dateIn = $_POST['dateIn'];

  $sql = "UPDATE `outstation` SET `dateIn`='$dateIn', `timeIn`='$timeIn',`timeCuIn`='$current_date' WHERE `id`='$id'";
  if ($conn->query($sql) === TRUE) {


    echo "<script>
    window.location='dash2.php';</script>";
    exit();
  } else {
    //echo "<script>alert(''Error: ' . $sql . '<br>' . $conn -> error')</script>";\
    echo "<script>alert('Error: ')</script>";
  }

  if (empty($_SESSION['First_Name'])) {
    header("Location: logout.php");
    exit();
  }

  $conn->close();
}
?>
<style>
  .error {
    background: #F2DEDE;
    color: #A94442;
    padding: 10px;
    width: 100%;
    /* Make error and success messages take up 100% of the container */
    border-radius: 5px;
    margin: 20px auto;
  }

  .success {
    background: #D4EDDA;
    color: #40754C;
    padding: 10px;
    width: 100%;
    /* Make error and success messages take up 100% of the container */
    border-radius: 5px;
    margin: 20px auto;
  }

  .booking-form .booking-bg {
    background-image: url('tower.jpg');
  }

  .section {
    position: relative;
    height: 100vh;
  }

  .section .section-center {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
  }

  #booking {
    font-family: 'Alice', serif;
    /* Updated background color */
  }

  .booking-form {
    position: relative;
    max-width: 912px;
    width: 100%;
    margin: auto;
    background: #fff;
    border-radius: 6px;
    -webkit-box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
  }

  .booking-form .booking-bg {
    position: absolute;
    left: 25px;
    top: -25px;
    bottom: -25px;
    width: 400px;
    background-size: cover;
    background-position: center;
    padding: 25px;
    border-radius: 6px;
    -webkit-box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
  }

  .booking-form .booking-bg::before {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    background: rgba(62, 136, 165, 0.33);
    /* Updated background color */
  }

  .booking-form>form {
    margin-left: 425px;
    padding: 30px;
  }

  .booking-form .form-header {
    margin-bottom: 30px;
    margin-top: 60px;
    position: relative;
    z-index: 20;
  }

  .booking-form .form-header h2 {
    font-family: 'Playfair Display', serif;
    margin-top: 0;
    margin-bottom: 15px;
    font-weight: 900;
    color: #fff;
    /* Updated font color */
    font-size: 42px;
    text-transform: capitalize;
  }

  .booking-form .form-header p {
    color: #fff;
    /* Updated font color */
    font-size: 18px;
  }

  .booking-form .form-group {
    position: relative;
    margin-bottom: 20px;
  }

  .booking-form .form-control {
    background-color: #fff;
    height: 45px;
    padding: 0px 15px;
    color: #151515;
    border: 1px solid #e5e5e5;
    font-size: 16px;
    font-weight: 700;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-radius: 40px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
  }

  .booking-form .form-control::-webkit-input-placeholder {
    color: #e5e5e5;
  }

  .booking-form .form-control:-ms-input-placeholder {
    color: #e5e5e5;
  }

  .booking-form .form-control::placeholder {
    color: #e5e5e5;
  }

  .booking-form .form-control:focus {
    background: #f8f8f8;
  }

  .booking-form input[type="date"].form-control:invalid {
    color: #e5e5e5;
  }

  .booking-form select.form-control {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
  }

  .booking-form select.form-control:invalid {
    color: #e5e5e5;
  }

  .booking-form select.form-control option {
    color: #151515;
  }

  .booking-form select.form-control+.select-arrow {
    position: absolute;
    right: 3px;
    bottom: 5px;
    width: 32px;
    line-height: 32px;
    height: 32px;
    text-align: center;
    pointer-events: none;
    color: #e5e5e5;
    font-size: 14px;
  }

  .booking-form select.form-control+.select-arrow:after {
    content: '\279C';
    display: block;
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
  }

  .booking-form .form-label {
    color: #856849;
    text-transform: uppercase;
    line-height: 24px;
    height: 24px;
    font-size: 14px;
    font-weight: 400;
    margin-left: 20px;
  }

  .booking-form .form-btn {
    margin-top: 30px;
  }

  .booking-form .submit-btn {
    display: block;
    width: 100%;
    color: #fff;
    background-color: #3E88A5;
    /* Updated button color */
    font-weight: 700;
    font-size: 18px;
    border: none;
    border-radius: 40px;
    height: 55px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
  }

  .booking-form .submit-btn:hover,
  .booking-form .submit-btn:focus {
    background-color: #93C4D1;
    /* Updated button hover color */
  }

  @media only screen and (max-width: 768px) {
    .booking-form .booking-bg {
      position: relative;
      left: 0;
      right: 0;
      bottom: 0;
      top: -15px;
      width: 95%;
      margin: auto;
    }

    .booking-form>form {
      margin-left: 0px;
    }
  }
</style>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Check-In</title>
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
      <a href="dash2.php" class="logo d-flex align-items-center">
        <img src="../logomicth.png" alt="">
        <span class="d-none d-lg-block">MICTH System</span>
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
        <li class="nav-item">
          <a class="active" href="../eoustation3.0/check-in_staff.php">
            <i class="bi bi-calendar2-check-fill" style="font-size: 1em; background-color: transparent"></i>
            <span>Check-In</span>
          </a>
        </li>
        <?php if ($_SESSION['admin_outstation'] == "1") { ?>
				<li class="nav-item">
					<a class="nav-link collapsed" data-bs-target="#book-room-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
						<i class="bi bi-people" style="font-size: 1em"></i></i><span>Human Resources</span>
						<i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
					</a>
					<ul id="book-room-nav" class="nav-content collapse" data-bs-parent="#booking-system-nav">
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
  </aside>
  <!-- End Sidebar-->

  <style>
    /* Add your custom CSS styles here */
    .section.dashboard {
      padding: 20px;
    }

    .card {
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-body {
      padding: 20px;
    }

    .card-title {
      margin-bottom: 20px;
      font-size: 24px;
      text-align: center;
    }

    .widget-user-header {
      padding: 20px;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
      color: #fff;
    }

    .widget-user-desc {
      margin-bottom: 10px;
    }

    .widget-user-username {
      margin-bottom: 5px;
    }

    .widget-user-image img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
    }

    .widget-user-desc {
      font-size: 16px;
    }

    .card-footer {
      padding: 0;
      border-bottom-left-radius: 5px;
      border-bottom-right-radius: 5px;
    }

    /* .nav-item {
      padding: 10px 20px;
      border-bottom: 1px solid #ddd;
    } */

    .nav-item:last-child {
      border-bottom: none;
    }

    .nav-link {
      color: #333;
    }

    .badge {
      font-size: 14px;
    }

    .bg-info {
      background-color: #17a2b8 !important;
    }

    .bg-primary {
      background-color: #007bff !important;
    }

    .bg-success {
      background-color: #28a745 !important;
    }

    .bg-warning {
      background-color: #ffc107 !important;
    }

    .float-right {
      float: right;
    }
  </style>
  <?php
  $sql = "SELECT * FROM outstation WHERE name = '$fname' ORDER BY timeCu DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
      $id = $row['id'];
      $name = $row["name"];
      $location = $row['location'];
      $purpose = $row['purpose'];
      $dateOut = $row['dateOut'];
      $timeOut = $row['timeOut'];
      $dateIn = $row['dateIn'];
      $timeIn = $row['timeIn'];
      $timeCu = $row['timeCu'];

      // Check if there's data in check-in
      if ($timeIn === '00:00:00') {
        $checkInMessage = "<B> Not Check-in Yet!</b>";
        $checkInColor = "red";
      } else {
        $checkInMessage = "<B>You Have No Pending Activity</b>";
        $checkInColor = "white";
      }
    } else {
      // No data found
      // echo "No data found.";
    }
  } else {
    // Error executing query
    echo "Error executing query: " . mysqli_error($conn);
  }
  ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Check-In<strong>

        </strong></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../main_user.php">Home Page</a></li>
          <li class="breadcrumb-item active">Check-In</li>
        </ol>
      </nav>
    </div>
    <br>




    <body>
      <br>

      <br>

      <div class="container">
        <div class="row">

          <div class="booking-form">
            <div class="booking-bg">
              <div class="form-header">

                <h2>Check-In</h2>

              </div>
            </div>
            <form method="post" class="form">
              <div class="row">
                <div class="col-md-6">

                  <div class="form-group">
                    <span class="form-label">Date-In</span>
                    <input class="form-control" type="Date" id="dateIn" name="dateIn" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <span class="form-label">Time-In</span>
                    <input class="form-control" type="Time" id="timeIn" name="timeIn" required>
                  </div>
                </div>
              </div>


              <div class="form-btn">
                <button type="submit" id="submit" name="submit" class="submit-btn">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <br>
    </body>
  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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