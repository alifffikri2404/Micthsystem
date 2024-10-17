<?php
include('functions.php');

if (empty($_SESSION['First_Name'])) {
  header("Location: iout.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Booking Details [Admin]</title>
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
    border: 1px solid grey;
    overflow: auto;
    white-space: nowrap;

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
        <a class="nav-link collapsed; active" href="viewbook.php">
          <i class="bi bi-car-front-fill"></i>
          <span>Vehicle Details</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin.php">
          <i class="bi bi-reply-fill"></i>
          <span>Home Page</span>
        </a>
      </li>

    </ul>
  </aside><!-- End Sidebar-->


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



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Vehicle Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home Page</a></li>
          <li class="breadcrumb-item"><a href="dash_vehicle.php">Vehicle Booking List</a></li>
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
            $start_date6 = $row['start_date'];

            $start_time6 = $row['start_time'];
            $end_date6 = $row['end_date'];
            $model_plat6 = $row['model_plat'];



            switch ($status) {
              case 'Pending':

      ?>

                <div class="table-data">

                  <div class="row">

                    <h5 class="card-title"><strong>STAFF DETAIL</strong>
                      <br>
                      <br>

                      <div class="col-lg-7">
                        <form class="row g-3" action="" method="">
                          <div class="col-md-6">
                            <br>
                            <?php

                            $sql21 = "SELECT *
                                                        FROM empmaininfo
                                                        
                                                        WHERE Internal_Id  = '$userid'";
                            $result19 = mysqli_query($db_login, $sql21);


                            $row2 = mysqli_fetch_assoc($result19);

                            $fullname = $row2['First_Name'] . ' ' . $row2['Last_Name'];
                            $employeeid = $row2['Internal_Id'];
                            $jabatan = $row2['Department'];
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

                      <h5 class="card-title"><strong>BOOKING DETAIL</strong>


                        <div class="col-lg-7">
                          <br>


                          <br>
                          <?php echo (isset($msg)) ? $msg : ""; ?>
                          <!--<form class="row g-3" action="" method="post">-->
                          <form class="row g-3" action="" method="post">
                            <div class="col-md-6">
                              <label for="staff_name" class="form-label">Staff/Driver Name</label>
                              <input type="text" id="staff_name" class="form-control" value="<?php echo $row2['First_Name']; ?>" disabled>
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
                              <label for="end_date" class="form-label">Duration time Booking:</label>
                              <input required type="text" id="duration_time" class="form-control" name="duration_time" value="<?php echo $row['start_time']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label for="purpose" class="form-label">Purpose</label>
                              <input required type="text" id="purpose" class="form-control" name="purpose" value="<?php echo $row['purpose']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label for="destination" class="form-label">Destination</label>
                              <input required type="text" id="destination" class="form-control" name="destination" value="<?php echo $row['destination']; ?>" disabled>
                            </div>




                            <div class="col-md-6">
                              <label for="end_date" class="form-label">With:</label>
                              <input class="form-control" type="text" value="<?php echo ($row['fuel_card'] == 1 ? 'Fuel Card' : '') . ($row['tng_card'] == 1 ? ', Touch \'n Go Card' : ''); ?>" disabled>
                            </div>
                          </form>

                          <div class="col-lg-7">
                            <form class="row g-3" action="" method="">

                              <div class="col-md-6">
                                <br>
                                <label for="STATUS" class="form-label">Status:</label>
                                <input type="text" id="staff_name" class="form-control" value="Pending" disabled>
                              </div>
                          </div>

                          </form>


                        </div>
                  </div>


                </div>
                <br>
                <div class="row">
                  <div class="col">
                    <form method="post" action="">
                      <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                      <button class="btn btn-success" type="submit" name="approve">Approve</button>
                    </form>
                  </div>
                  <div class="col">
                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" name="reject">Reject</button>
                  </div>
                </div>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Please provide the reason for
                          the
                          rejection.</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="post" id="rejectForm">
                          <div class="mb-3">
                            <label for="message-text" class="col-form-label">Reason:</label>
                            <textarea class="form-control" id="message-text" name="rejection_reason"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                            <button type="submit" name="reject" form="rejectForm" class="btn btn-info">Submit</button>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>

                <script>
                  document.querySelectorAll('.modal .btn-close').forEach(function(btn) {
                    btn.addEventListener("click", function() {
                      document.querySelector('.bg-modal').style.display = "none";
                    });
                  });
                </script>

              <?php
                break;

              case 'Approved':

              ?>




                <div class="table-data">

                  <div class="row">

                    <h5 class="card-title"><strong>STAFF DETAIL</strong>
                      <br>
                      <br>

                      <div class="col-lg-7">
                        <form class="row g-3" action="" method="">
                          <div class="col-md-6">
                            <br>
                            <?php
                            $sql21 = "SELECT *
                                                       FROM empmaininfo
                                                       
                                                       WHERE Internal_Id  = '$userid'";
                            $result19 = mysqli_query($db_login, $sql21);


                            $row2 = mysqli_fetch_assoc($result19);

                            $fullname = $row2['First_Name'] . ' ' . $row2['Last_Name'];
                            $employeeid = $row2['Internal_Id'];
                            $jabatan = $row2['Department'];
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

                      <h5 class="card-title"><strong>BOOKING DETAIL</strong>


                        <div class="col-lg-7">
                          <br>


                          <br>
                          <?php echo (isset($msg)) ? $msg : ""; ?>
                          <!--<form class="row g-3" action="" method="post">-->
                          <form class="row g-3" action="" method="post">
                            <div class="col-md-6">
                              <label for="staff_name" class="form-label">Staff/Driver Name</label>
                              <input type="text" id="staff_name" class="form-control" value="<?php echo $row2['First_Name']; ?>" disabled>
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
                              <label for="end_date" class="form-label">Duration time Booking:</label>
                              <input required type="text" id="duration_time" class="form-control" name="duration_time" value="<?php echo $row['start_time']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label for="purpose" class="form-label">Purpose</label>
                              <input required type="text" id="purpose" class="form-control" name="purpose" value="<?php echo $row['purpose']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label for="destination" class="form-label">Destination</label>
                              <input required type="text" id="destination" class="form-control" name="destination" value="<?php echo $row['destination']; ?>" disabled>
                            </div>




                            <div class="col-md-6">
                              <label for="end_date" class="form-label">With:</label>
                              <?php
                              $fuel_checked = ($row['fuel_card'] == 1) ? 'checked' : '';
                              $tng_checked = ($row['tng_card'] == 1) ? 'checked' : '';
                              ?>
                              <input class="form-check-input" name="fuel_card" type="checkbox" <?php echo $fuel_checked; ?>> Fuel Card
                              <input class="form-check-input" name="tng_card" type="checkbox" <?php echo $tng_checked; ?>> Touch 'n Go Card
                            </div>
                            <div class="col-12">
                              <button class="btn btn-info" type="submit" name="updatekeys">update</button>
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

                       
                          </form>


                        </div>
                  </div>


                </div>
                <br>


                <!-- First Button: Collect Key -->

                <div class="row">
                  <div class="col">
                    <form method="post" action="">
                      <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                      <button class="btn btn-info float-start" type="submit" name="takekey">Key collected</button>
                    </form>
                  </div>
                  <div class="col">
                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" name="reject">Reject</button>
                  </div>
                </div>
                <!-- Second Button: Reject with Modal -->


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Please provide the reason for the rejection.</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="post" id="rejectForm">
                          <div class="mb-3">
                            <label for="message-text" class="col-form-label">Reason:</label>
                            <textarea class="form-control" id="message-text" name="rejection_reason"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                            <button type="submit" name="reject" form="rejectForm" class="btn btn-info">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              <?php
                break;

              case 'Key':

              ?>
                <div class="row">
                  <div class="col-lg-7">
                    <div class="card">
                      <div class="card-body">

                        <br>
                        <?php echo (isset($msg)) ? $msg : ""; ?>
                        <!--<form class="row g-3" action="" method="post">-->
                        <form class="row g-3" action="" method="post">
                          <div class="col-md-6">
                            <label for="staff_name" class="form-label">Staff/Driver Name</label>
                            <input type="text" id="staff_name" class="form-control" value="<?php echo $row2['First_Name']; ?>" disabled>
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
                            <input required type="text" id="purpose" class="form-control" name="purpose" value="<?php echo $row['purpose']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label for="destination" class="form-label">Destination</label>
                            <input required type="text" id="destination" class="form-control" name="destination" value="<?php echo $row['destination']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <fieldset class="row mb-3">
                              <legend class="col-form-label col-sm-6 pt-0">Duration time Booking:</legend>
                              <input required type="text" class="form-control" name="duration_time" value="<?php echo $row['start_time']; ?>" disabled>
                            </fieldset>
                          </div>
                          <div class="col-md-6">
                            <fieldset class="row mb-3">
                              <legend class="col-form-label col-sm-4 pt-0">With:</legend>
                              <input class="form-control" type="text" value="<?php echo ($row['fuel_card'] == 1 ? 'Fuel Card' : '') . ($row['tng_card'] == 1 ? ', Touch \'n Go Card' : ''); ?>" disabled>
                            </fieldset>
                          </div>
                          <!-- Submit button -->

                        </form>



                      </div>

                    </div>
                  </div>
                </div>
                <form method="post" action="">
                  <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                  <button class="btn btn-warning" type="submit" name="return">key returned </button>
                </form>

              <?php
                break;

              case 'Return':

              ?>
                <div class="table-data">

                  <div class="row">

                    <h5 class="card-title"><strong>STAFF DETAIL</strong>
                      <br>
                      <br>

                      <div class="col-lg-7">
                        <form class="row g-3" action="" method="">
                          <div class="col-md-6">
                            <br>
                            <?php
                            $sql21 = "SELECT *
                                                     FROM empmaininfo
                                                     
                                                     WHERE Internal_Id  = '$userid'";
                            $result19 = mysqli_query($db_login, $sql21);


                            $row2 = mysqli_fetch_assoc($result19);

                            $fullname = $row2['First_Name'] . ' ' . $row2['Last_Name'];
                            $employeeid = $row2['Internal_Id'];
                            $jabatan = $row2['Department'];
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

                      <h5 class="card-title"><strong>BOOKING DETAIL</strong>


                        <div class="col-lg-7">
                          <br>


                          <br>
                          <?php echo (isset($msg)) ? $msg : ""; ?>
                          <!--<form class="row g-3" action="" method="post">-->
                          <form class="row g-3" action="" method="post">
                            <div class="col-md-6">
                              <label for="staff_name" class="form-label">Staff/Driver Name</label>
                              <input type="text" id="staff_name" class="form-control" value="<?php echo $row2['First_Name']; ?>" disabled>
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
                              <label for="end_date" class="form-label">Duration time Booking:</label>
                              <input required type="text" id="duration_time" class="form-control" name="duration_time" value="<?php echo $row['start_time']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label for="purpose" class="form-label">Purpose</label>
                              <input required type="text" id="purpose" class="form-control" name="purpose" value="<?php echo $row['purpose']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label for="destination" class="form-label">Destination</label>
                              <input required type="text" id="destination" class="form-control" name="destination" value="<?php echo $row['destination']; ?>" disabled>
                            </div>

                            <div class="col-md-6">
                              <label for="end_date" class="form-label">Duration time Booking:</label>
                              <input required type="text" id="duration_time" class="form-control" name="duration_time" value="<?php echo $row['start_time']; ?>" disabled>
                            </div>


                            <div class="col-md-6">
                              <label for="end_date" class="form-label">With:</label>
                              <input class="form-control" type="text" value="<?php echo ($row['fuel_card'] == 1 ? 'Fuel Card' : '') . ($row['tng_card'] == 1 ? ', Touch \'n Go Card' : ''); ?>" disabled>
                            </div>
                          </form>

                          <div class="col-lg-7">
                            <form class="row g-3" action="" method="post">

                              <div class="col-md-6">
                                <br>
                                <label for="STATUS" class="form-label">Status:</label>
                                <input type="text" id="staff_name" class="form-control" value="<?php echo $row['status']; ?>" disabled>
                              </div>

                              <div class="col-md-6">
                                <br>
                                <label for="vehicle" class="form-label">Remarks</label>
                                <textarea id="vehicle" name="remark12" class="form-control" style="height: 150px; width: 800px;"></textarea>

                              </div>

                              <div class="col-md-12">
                                <br>
                                <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                                <button class="btn btn-warning" type="submit" name="return">Key returned</button>
                              </div>

                            </form>

                          </div>



                        </div>
                  </div>


                </div>
                <br>


          <?php
                break;



              default:

                break;
            }
            $i++;
          }
        } else {

          ?>

      <?php
        }
      }

      if (isset($_POST['approve'])) {
        if (isset($_POST['approve'])) {
          date_default_timezone_set('Asia/Kuala_Lumpur');
          $current_time2 = date("Y-m-d H:i:s");
          $Approver=$_SESSION['First_Name'];

          if (!empty($room_id)) {
            $sqlMN = "SELECT * FROM hrm_room WHERE id_room = ?";
            $stmt = $db->prepare($sqlMN);
            $stmt->bind_param('i', $room_id);
            $stmt->execute();
            $resultMN = $stmt->get_result();
            if ($resultMN) {
                $rowMN = $resultMN->fetch_assoc();
                $namaroom = $rowMN['room_name'];
            } else {
                $namaroom = "None";
            }
        } else {
            $namaroom = "None";
        }

          $appUpdateQuery = "UPDATE management SET status= 'Approved' , cu_approve='$current_time2',Approver='" . $Approver . "' WHERE id='" . $_POST['row_id'] . "'";
          $appUpdateResult = mysqli_query($db, $appUpdateQuery);

          $id = $userid;
          $sql21 = "SELECT *
                    FROM empmaininfo
                    
                    WHERE Internal_Id  = '$id'";
          $result19 = mysqli_query($db_login, $sql21);


          $row3 = mysqli_fetch_assoc($result19);

          $fullname = $row3['First_Name'] . ' ' . $row2['Last_Name'];
          $employeeid = $row3['Internal_Id'];
          $jabatan = $row3['Department'];

          $tifon = $row3['Mobile_phone'];
          $sql22 = "SELECT * from management WHERE id = '$row_id'";
          $result19 = mysqli_query($db, $sql22);
          $row4 = mysqli_fetch_assoc($result19);
          $model_plat = $row4['model_plat'];
          $target = "$tifon";
          $message = "Hi {$fullname},

Your booking request for a company vehicle has been updated. Here are the details:
          
- Vehicle: {$model_plat6 }
- Booking Date and Time: {$start_date6} at {$start_time6}
- Status: Approved
- Remarks:
          
If you have any questions or need further information, please contact HRAD.
          
Please do not reply to this message; it is for notification purposes only.
          
Thank you!";
          
          
        



          $token = "eQZ5@#XrFmQvui36qkmG"; // bergantung
          $curl = curl_init();
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
                  'countryCode' => '60', //optional
                )
              ),
              CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
              ),
            )
          );

          $response = curl_exec($curl);
          $error_msg = '';
          if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
          }
          curl_close($curl);


          if (!empty($error_msg)) {
            echo $error_msg;
          } else {
            echo $response;
            $msg = "<div class='alert alert-success'>Booking Successful</div>";
          }
        }
      }


      if (isset($_POST['takekey'])) {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        
        $current_time3 = date("Y-m-d H:i:s");

        $appUpdateQuery = "UPDATE management SET status='Return', cu_key='$current_time3' WHERE id='" . $_POST['row_id'] . "'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);
      }

      if (isset($_POST['return'])) {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $current_time1 = date("Y-m-d H:i:s");
        $remark = $_POST["remark12"]; // Corrected to match the name attribute in the HTML form
        $appUpdateQuery = "UPDATE management SET status='Done', cu_keyreturn='$current_time1', remark1='$remark' WHERE id='" . $_POST['row_id'] . "'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);
      }




      if (isset($_POST['reject'])) {
        if (isset($_POST['row_id'])) {
          $row_id = $_POST['row_id'];
          $appUpdateQuery = "UPDATE management SET status = 'Reject' WHERE id = '$row_id'";
          $appUpdateResult = mysqli_query($db, $appUpdateQuery);

          if (isset($_POST['rejection_reason'])) {
            $reason = mysqli_real_escape_string($db, $_POST['rejection_reason']);
            $sql1 = "UPDATE management SET sebab = '$reason' WHERE id = '$row_id'";
            $result = mysqli_query($db, $sql1);
            $id = $userid;
            $sql21 = "SELECT *
                        FROM empmaininfo
                        
                        WHERE Internal_Id  = '$id'";
            $result19 = mysqli_query($db_login, $sql21);


            $row3 = mysqli_fetch_assoc($result19);

            $fullname = $row3['First_Name'] . ' ' . $row2['Last_Name'];
            $employeeid = $row3['Internal_Id'];
            $jabatan = $row3['Department'];

            $tifon = $row3['Mobile_phone'];

            $sql22 = "SELECT * from management WHERE id = '$row_id'";
            $result19 = mysqli_query($db, $sql22);
            $row4 = mysqli_fetch_assoc($result19);
            $sebab = $row4['sebab'];
            $target = "$tifon";
            $message = "Hi {$fullname},
Your booking request for a company vehicle has been updated. Here are the details:

            
- Vehicle: {$model_plat6 }
- Booking Date and Time: {$start_date6} at {$start_time6}
- Status: Rejected
-Reason:$sebab
- Remarks:
            
If you have any questions or need further information, please contact HRAD.
            
Please do not reply to this message; it is for notification purposes only.
            
Thank you!";



            $token = "eQZ5@#XrFmQvui36qkmG"; // bergantung
            $curl = curl_init();
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
            $error_msg = '';
            if (curl_errno($curl)) {
              $error_msg = curl_error($curl);
            }
            curl_close($curl);


            if (!empty($error_msg)) {
              echo $error_msg;
            } else {
              echo $response;
              $msg = "<div class='alert alert-success'>rejected Successfully</div>";
            }
            if (!$result) {
              echo "Error: " . mysqli_error($db);
            }
          } else {
            echo "Rejection reason is not set.";
          }
        } else {
          echo "Row ID is not set.";
        }
      }



      if (isset($_POST['approve']) || isset($_POST['takekey']) || isset($_POST['return']) || isset($_POST['reject'])) {
        echo "<script>window.location='admin.php';</script>";
        exit();
      }

      ?>

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