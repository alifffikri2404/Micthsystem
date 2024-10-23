<?php
include('functions.php');

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
    if (isset($_POST['cancel_return'])) {
      $row_id = $_POST['row_id'];
      $deleteQuery = "DELETE FROM `management` WHERE `id` = $row_id";
      $result = mysqli_query($db, $deleteQuery);

      if ($result) {
        echo "<script>
if(confirm('Are you sure you want to cancel?')) {
                  window.location.href = 'user.php'; // Redirect to room_user.php if cancellation is confirmed
              } else {
                  // Optionally handle cancellation cancelation
              }
</script>";
      } else {
        echo "Error deleting row: " . mysqli_error($db);
      }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Booking Details</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

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

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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

    .table-data {
      display: flex;
      flex-wrap: wrap;
      grid-gap: 24px;
      margin-top: 24px;
      width: 90%;
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
      <a href="../main_user.php" class="logo d-flex align-items-center">
        <img src="../logomicth.png" alt="">
        <span class="d-none d-lg-block">MICTH System</span>
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
      <a class="nav-link" data-bs-target="#booking-system-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-calendar-check-fill"></i>
        <span>Booking System</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="booking-system-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li class="nav-item">
          <a class="nav-link collapsed" href="../BookingSystem/user.php">
            <i class="bi bi-house-door-fill" style="font-size: 1em"></i>
            <span>Dashboard</span>
          </a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" data-bs-target="#book-vehicle-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
            <i class="bi bi-car-front-fill" style="font-size: 1em"></i></i><span>Book Vehicle</span>
            <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
          </a>
          <ul id="book-vehicle-nav" class="nav-content collapse show" data-bs-parent="#booking-system-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/user_booking_vehicle.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Book</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/user_record.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Usage Record</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="active" href="../BookingSystem/detailsdash.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill" style="background-color: transparent"></i></i>
                <span>Vehicle Details</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#book-room-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
            <i class="bi bi-door-closed-fill" style="font-size: 1em"></i></i><span>Book Room</span>
            <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
          </a>
          <ul id="book-room-nav" class="nav-content collapse" data-bs-parent="#booking-system-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/user_booking_Room.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Book</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/user_record_Room.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Usage Record</span>
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
        <li class="nav-item">
          <a class="nav-link collapsed" href="../SuratLatest/SuratRekodSuratKeluar.php">
            <i class="bi bi-file-earmark-text" style="font-size: 1em"></i>
            <span>Outgoing Letter Record</span>
          </a>
        </li>
        <?php if($_SESSION['admin_surat'] == "1") { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../SuratLatest/SuratDaftarSuratMasuk.php">
            <i class="bi bi-pencil-square" style="font-size: 1em"></i>
            <span>Register Incoming Letter</span>
          </a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="../SuratLatest/SuratRekodSuratMasuk.php">
            <i class="bi bi-file-earmark-text" style="font-size: 1em"></i>
            <span>Incoming Letter Record</span>
          </a>
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
        <li class="nav-item">
          <a class="nav-link collapsed" href="../eoustation3.0/dash2.php">
            <i class="bi bi-house-door-fill" style="font-size: 1em"></i>
            <span>Dashboard</span>
          </a>
        </li>
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
            <span>Request Asset</span>
          </a>
        </li>
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
      </ul>
    </li>

    </ul>
  </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Vehicle Details</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="user.php">Home Page</a></li>
                <li class="breadcrumb-item"><a href="user_vehicle.php">Vehicle Details</a></li>
                <li class="breadcrumb-item active">Booking Details</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">


            <?php


            if (!isset($_SESSION['updateid'])) {

                exit("Error: 'updateid' tidak ditemukan di sesi.");
            }

            $id = $_SESSION['updateid'];
            $sql = "SELECT * FROM management WHERE id = '$id'";
            $result = mysqli_query($db, $sql);


            if (!$result) {
                exit("Error: " . mysqli_error($db));
            }

            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);
            } else {

                exit("Error: Tidak ada data yang ditemukan untuk id '$id'.");
            }

            if (isset($_POST['updatekeys'])) {

                $fuel_card = isset($_POST['fuel_card']) ? 1 : 0;
                $tng_card = isset($_POST['tng_card']) ? 1 : 0;

                $sql = "UPDATE `management` SET
           
            `fuel_card`='$fuel_card',
            `tng_card`='$tng_card'
        WHERE `id`='$id'";

                if ($db->query($sql) === TRUE) {
                    echo "<script>window.location='viewbook.php';</script>";
                    exit();
                } else {
                    echo "<script>alert('Error: ' . $sql . '<br>' . $db->error . ');</script>";
                    exit();
                }
            }


            ?>


            <?php

            $statuses = ['Pending', 'Approved', 'Key', 'Return'];

            foreach ($statuses as $status) {
                $selectQuery = "SELECT * FROM `management` WHERE `status` = '$status' AND `id` = '$id' ORDER BY `id` ASC";

                $sql = mysqli_query($db, $selectQuery);
                $count = mysqli_num_rows($sql);
                $i = 1;

                if ($count > 0) {
                    while ($row = mysqli_fetch_array($sql)) {
                        $userid = $row['user_id'];
            ?>

                        <div class="table-data">
                            <div class="row">
                                <h5 class="card-title"><strong>STAFF DETAIL</strong><br><br>
                                    <div class="col-lg-7">
                                        <form class="row g-3" action="" method="">
                                            <div class="col-md-6">
                                                <br>
                                                <?php
                                                $sql21 = "SELECT *
                                   FROM empmaininfo
                                   
                                   WHERE Internal_Id  = '$userid'";
                                                $result19 = mysqli_query($db_login, $sql21);
                                                $row3 = mysqli_fetch_assoc($result19);

                                                $fullname = $row3['First_Name'] . ' ' . $row3['Last_Name'];
                                                $jabatan = $row3['Department'];
                                                $employeeid = $row3['Internal_Id'];
                                                ?>

                                                <b><label for="staff_name" class="form-label">Staff Name:</b><br><br><?php echo $fullname; ?></label></b>
                                                <input type="hidden" id="staff_name" class="form-control" value="<?php echo $fullname; ?>" disabled>
                                                <input required type="hidden" name="vehicleinp" value="<?php echo $fullname; ?>">
                                            </div>

                                            <div class="col-md-6">
                                                <br>
                                                <b><label for="no_id" class="form-label">Employee Id:</b><br><br> <?php echo $employeeid ?></label>
                                                <input required type="hidden" id="no_id" class="form-control" value="<?php echo $employeeid ?>" disabled>
                                                <input required type="hidden" name="vehicleinp" value="<?php echo $employeeid ?>">
                                            </div>

                                            <?php
                                            // SQL query to select all columns from empdept table where dept_id matches the $jabatan variable
                                            $sql21 = "SELECT * FROM empdept WHERE dept_id = '$jabatan'";

                                            // Execute the SQL query
                                            $result19 = mysqli_query($db_login, $sql21);

                                            // Check if the query was successful
                                            if ($result19) {
                                                // Fetch associative array from the result set
                                                $row4 = mysqli_fetch_assoc($result19);
                                            }
                                            ?>

                                            <div class="col-md-6">
                                                <b><label for="Jabatan" class="form-label">Department:</b><br><br><?php echo isset($row4['name']) ? $row4['name'] : 'N/A'; ?></label>
                                                <input required type="hidden" id="Jabatan" class="form-control" value="<?php echo isset($row4['name']) ? $row4['name'] : ''; ?>" disabled>
                                                <input required type="hidden" name="vehicleinp" value="<?php echo isset($row4['name']) ? $row4['name'] : ''; ?>">
                                            </div>
                                        </form>
                                    </div>

                                    <h5 class="card-title"><strong>BOOKING DETAIL</strong></h5>
                                    <div class="col-lg-7">
                                        <br>
                                        <br>
                                        <?php echo (isset($msg)) ? $msg : ""; ?>
                                        <form class="row g-3" action="" method="post">
                                            <div class="col-md-6">
                                                <label for="staff_name" class="form-label">Staff/Driver Name</label>
                                                <input type="text" id="staff_name" class="form-control" value="<?php echo $row['user_name']; ?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="vehicle" class="form-label">Vehicle</label>
                                                <input required type="text" id="vehicle" class="form-control" value="<?php echo $row['model_plat']; ?>" disabled>
                                                <input required type="hidden" name="vehicleinp" value="<?php echo $row['model_plat']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="start_date" class="form-label">Start Date Booking</label>
                                                <input type="text" id="start_date" class="form-control" value="<?php echo $row['start_date']; ?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="end_date" class="form-label">End Date Booking</label>
                                                <input required type="date" id="end_date" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="purpose" class="form-label">Purpose</label>
                                                <textarea required id="purpose" class="form-control" name="purpose" disabled><?php echo $row['purpose']; ?></textarea>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="destination" class="form-label">Destination</label>
                                                <textarea required id="destination" class="form-control" name="destination" disabled><?php echo $row['destination']; ?></textarea>
                                            </div>


                                            <div class="col-md-6">
                                                <label for="end_date" class="form-label">Duration time Booking:</label>
                                                <input required type="text" id="duration_time" class="form-control" name="duration_time" value="<?php echo $row['start_time']; ?>" disabled>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="end_date" class="form-label">Accessories:</label>
                                                <input class="form-control" type="text" value="<?php echo ($row['fuel_card'] == 1 ? 'Fuel Card' : '') . ($row['tng_card'] == 1 ? ', Touch \'n Go Card' : ''); ?>" disabled>
                                            </div>
                                        </form>

                                        <div class="col-lg-7">
                                            <form class="row g-3" action="" method="">
                                                <div class="col-md-6">
                                                    <br>
                                                    <label for="STATUS" class="form-label">Status:</label>
                                                    <input type="text" id="staff_name" class="form-control" value="<?php echo $row['status']; ?>" disabled>
                                                </div>
                                        </div>

                                     

                                        <br>
                                        
                                        </form>

                                        <?php if ($row['status'] == "Pending") { ?>
                                <form method="post" action="">
                                  <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                                  <button class="btn btn-danger" type="submit" name="cancel_return">Cancel</button>
                                </form>
                              <?php } ?>
                                    </div>
                            </div>
                        </div>
                        <br>

            <?php
                        $i++;
                    }
                } else {
                    // No records found
                }
            }
            ?>
<??>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>

</html>