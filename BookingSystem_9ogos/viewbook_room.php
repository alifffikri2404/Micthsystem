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
        <a class="nav-link collapsed; active" href="viewbook_room.php">
          <i class="bi bi-door-closed-fill"></i>
          <span>Room Details</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin.php">
          <i class="bi bi-reply-fill"></i>
          <span>Home Page</span>
        </a>
      </li>

    </ul>
    </li>
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
      <h1>Room Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home Page</a></li>
          <li class="breadcrumb-item"><a href="dash_room.php">Room Booking List</a></li>
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
      $sql = "SELECT * FROM management_room WHERE id = '$id'";
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

      $statuses = ['Pending', 'Approved', 'Key', 'Reserved'];

      foreach ($statuses as $status) {
        $selectQuery = "SELECT * FROM `management_room` WHERE `status` = '$status' AND `id` = '$id' ORDER BY `id` ASC";

        $sql = mysqli_query($db, $selectQuery);
        $count = mysqli_num_rows($sql);
        $i = 1;

        if ($count > 0) {
          while ($row = mysqli_fetch_array($sql)) {
            $userid = $row['user_id'];
            $start_date4 = $row['start_date'];
            $start_time4 = $row['start_time'];
            $end_time4 = $row['end_time'];
            $status4 = $row['status'];


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
                              <label for="staff_name" class="form-label">Name:</label>
                              <input type="text" id="staff_name" class="form-control" value="<?php echo $row2['First_Name']; ?>" disabled>
                            </div>
                            <?php
                            $selectQuery1 = "SELECT * FROM `hrm_room` WHERE id_room  = '" . $row['room_id'] . "'";
                            $sql = mysqli_query($db, $selectQuery1);
                            $row1 = mysqli_fetch_assoc($sql);

                            ?>
                            <div class="col-md-6">
                              <label for="Room" class="form-label">Room:</label>
                              <input required type="text" id="room" class="form-control" value="<?php echo $row1['room_name']; ?>" disabled>
                              <input required type="hidden" name="room" value="<?php echo $row1['room_name']; ?>">
                            </div>
                            <div class="col-md-6">
                              <label for="start_date" class="form-label">Start Time Booking:</label>
                              <input type="text" id="start_date" class="form-control" value="<?php echo $row['start_time']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label for="end_time" class="form-label">End Time Booking:</label>
                              <input required type="text" id="end_time" class="form-control" name="end_time" value="<?php echo $row['end_time']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label for="end_date" class="form-label">Booking Date:</label>
                              <input required type="text" id="duration_time" class="form-control" name="duration_time" value="<?php echo $row['start_date']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                              <label for="purpose" class="form-label">Purpose</label>
                              <input required type="text" id="purpose" class="form-control" name="purpose" value="<?php echo $row['purpose']; ?>" disabled>
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
                      <button class="btn btn-success" type="submit" name="takekey">Approve</button>
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
                            <label for="staff_name" class="form-label">Name:</label>
                            <input type="text" id="staff_name" class="form-control" value="<?php echo $row2['First_Name']; ?>" disabled>
                          </div>
                          <?php
                          $selectQuery1 = "SELECT * FROM `hrm_room` WHERE id_room  = '" . $row['room_id'] . "'";
                          $sql = mysqli_query($db, $selectQuery1);
                          $row1 = mysqli_fetch_assoc($sql);

                          ?>
                          <div class="col-md-6">
                            <label for="Room" class="form-label">Room:</label>
                            <input required type="text" id="room" class="form-control" value="<?php echo $row1['room_name']; ?>" disabled>
                            <input required type="hidden" name="room" value="<?php echo $row1['room_name']; ?>">
                          </div>
                          <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Time Booking:</label>
                            <input type="text" id="start_date" class="form-control" value="<?php echo $row['start_time']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label for="end_time" class="form-label">End Time Booking:</label>
                            <input required type="text" id="end_time" class="form-control" name="end_time" value="<?php echo $row['end_time']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label for="end_date" class="form-label">Booking Date:</label>
                            <input required type="text" id="duration_time" class="form-control" name="duration_time" value="<?php echo $row['start_date']; ?>" disabled>
                          </div>
                          <div class="col-md-6">
                            <label for="purpose" class="form-label">Purpose</label>
                            <input required type="text" id="purpose" class="form-control" name="purpose" value="<?php echo $row['purpose']; ?>" disabled>
                          </div>

                        </form>



                      </div>

                    </div>
                  </div>
                </div>
                <form method="post" action="">
                  <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                  <button class="btn btn-warning" type="submit" name="return">Release </button>
                </form>
                <div class="col">
                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" name="reject">Reject</button>
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

              case 'Reserved':

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
        <label for="staff_name" class="form-label">Name:</label>
        <input type="text" id="staff_name" class="form-control" value="<?php echo $row2['First_Name']; ?>" disabled>
    </div>
    <?php
    $selectQuery1 = "SELECT * FROM `hrm_room` WHERE id_room  = '" . $row['room_id'] . "'";
    $sql = mysqli_query($db, $selectQuery1);
    $row1 = mysqli_fetch_assoc($sql);
    ?>
    <div class="col-md-6">
        <label for="Room" class="form-label">Room:</label>
        <input required type="text" id="room" class="form-control" value="<?php echo $row1['room_name']; ?>" disabled>
        <input required type="hidden" name="room" value="<?php echo $row1['room_name']; ?>">
    </div>
    <div class="col-md-6">
        <label for="start_date" class="form-label">Start Time Booking:</label>
        <input type="text" id="start_date" class="form-control" value="<?php echo $row['start_time']; ?>" disabled>
    </div>
    <div class="col-md-6">
        <label for="end_time" class="form-label">End Time Booking:</label>
        <input required type="text" id="end_time" class="form-control" name="end_time" value="<?php echo $row['end_time']; ?>" disabled>
    </div>
    <div class="col-md-6">
        <label for="end_date" class="form-label">Booking Date:</label>
        <input required type="text" id="duration_time" class="form-control" name="duration_time" value="<?php echo $row['start_date']; ?>" disabled>
    </div>
    <div class="col-md-6">
        <label for="purpose" class="form-label">Purpose</label>
        <input required type="text" id="purpose" class="form-control" name="purpose" value="<?php echo $row['purpose']; ?>" disabled>
    </div>

    <div class="col-lg-7">
        <div class="row g-3">
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
        </div>

        <div class="row">
            <div class="col">
                <form method="post" action="">
                    <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                    <button class="btn btn-warning" type="submit" name="return">Release</button>
                </form>
           
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" name="reject">Reject</button>
            </div>
        </div>
    </div>
</form>





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

     


      if (isset($_POST['takekey'])) {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $current_time3 = date("H:i:s");
        $Approver=$_SESSION['First_Name'];

        // Update the status of the selected booking to "Reserved"
        $appUpdateQuery = "UPDATE management_room SET status = 'Reserved',Approver='" . $Approver . "' WHERE id = ?";
        $stmt1 = $db->prepare($appUpdateQuery);
        $stmt1->bind_param('s', $_POST['row_id']);
        $stmt1->execute();
    
        // Retrieve the details of the current booking
        $sql22 = "SELECT * FROM management_room WHERE id = ?";
        $stmt2 = $db->prepare($sql22);
        $stmt2->bind_param('s', $_POST['row_id']);
        $stmt2->execute();
        $result10 = $stmt2->get_result();
        $row10 = $result10->fetch_assoc();
    
        $start_datebook = $row10["start_date"];
        $room_id1 = $row10["room_id"];
        $start_time1 = $row10["start_time"];
        $end_time1 = $row10["end_time"];
        $status1 = $row10["status"];
    
        // Retrieve bookings that will be canceled
        $sqlPending = "SELECT * FROM management_room WHERE room_id = ? AND start_date = ? AND (
                    (start_time < ? AND end_time > ?) OR 
                    (start_time < ? AND end_time > ?) OR 
                    (start_time <= ? AND end_time >= ?)
                ) AND status = 'Pending'";
    
        $stmt3 = $db->prepare($sqlPending);
        $stmt3->bind_param('ssssssss', $room_id1, $start_datebook, $start_time1, $end_time1, $start_time1, $end_time1, $start_time1, $end_time1);
        $stmt3->execute();
        $resultPending = $stmt3->get_result();
    
        // Cancel the affected bookings
        $sqlUpdatePending = "UPDATE management_room SET status = 'Canceled' WHERE room_id = ? AND start_date = ? AND (
                    (start_time < ? AND end_time > ?) OR 
                    (start_time < ? AND end_time > ?) OR 
                    (start_time <= ? AND end_time >= ?)
                ) AND status = 'Pending'";
        $stmt4 = $db->prepare($sqlUpdatePending);
        $stmt4->bind_param('ssssssss', $room_id1, $start_datebook, $start_time1, $end_time1, $start_time1, $end_time1, $start_time1, $end_time1);
        $stmt4->execute();
    
        // Notify the users of the canceled bookings
        $token = "eQZ5@#XrFmQvui36qkmG";
        while ($rowPending = $resultPending->fetch_assoc()) {
            $userId = $rowPending['user_id'];
    
            $sqlUser = "SELECT * FROM empmaininfo WHERE Internal_Id = ?";
            $stmtUser = $db_login->prepare($sqlUser);
            $stmtUser->bind_param('s', $userId);
            $stmtUser->execute();
            $resultUser = $stmtUser->get_result();
            $rowUser = $resultUser->fetch_assoc();
    
            $fullname = $rowUser['First_Name'] . ' ' . $rowUser['Last_Name'];
            $tifon = $rowUser['Mobile_phone'];
            $message = "Hi {$fullname},
Your booking request for the meeting room has been updated. Here are the details:
Meeting Room: {$row1['room_name']}
Booking Date and Time: {$start_date4} at {$start_time4} until {$end_time4}  
Status: Rejected
            
Remarks:        
If you have any questions or need further information, please contact HRAD.
Thank you!
            ";
    
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
                            'target' => $tifon,
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
            if (curl_errno($curl)) {
                echo 'Error:' . curl_error($curl);
            }
            curl_close($curl);
        }
    
        // Notify the user who made the reservation
        $id = $userid;
        $sql21 = "SELECT * FROM empmaininfo WHERE Internal_Id = '$id'";
        $result19 = mysqli_query($db_login, $sql21);
    
        $row3 = mysqli_fetch_assoc($result19);
    
        $fullname = $row3['First_Name'] . ' ' . $row3['Last_Name'];
        $tifon = $row3['Mobile_phone'];
     
        $message = "Hi {$fullname},
Your booking request for the meeting room has been updated. Here are the details:
Meeting Room: {$row1['room_name']}
Booking Date and Time: {$start_date4} at {$start_time4} until {$end_time4}  
Status: Approved
        
Remarks:
       
If you have any questions or need further information, please contact HRAD.
Thank you!
        ";
        
    
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
                        'target' => $tifon,
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
            $msg = "<div class='alert alert-success'>Booking Successful</div>";
        }
    }
    




      if (isset($_POST['return'])) {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $current_time1 = date("Y-m-d H:i:s");
        $remark = $_POST["remark12"]; // Corrected to match the name attribute in the HTML form
        $appUpdateQuery = "UPDATE management_room SET status='Release' , remark='$remark' WHERE id='" . $_POST['row_id'] . "'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);
      }




      if (isset($_POST['reject'])) {
        if (isset($_POST['row_id'])) {
          $row_id = $_POST['row_id'];
          $appUpdateQuery = "UPDATE management_room SET status = 'Reject' WHERE id = '$row_id'";
          $appUpdateResult = mysqli_query($db, $appUpdateQuery);

          if (isset($_POST['rejection_reason'])) {
            $reason = mysqli_real_escape_string($db, $_POST['rejection_reason']);
            $sql1 = "UPDATE management_room SET sebab_reject = '$reason' WHERE id = '$row_id'";
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
            $token = "eQZ5@#XrFmQvui36qkmG";
            $sql22 = "SELECT * from management_room WHERE id = '$row_id'";
            $result19 = mysqli_query($db, $sql22);
            $row4 = mysqli_fetch_assoc($result19);
            $sebab = $row4['sebab_reject'];
            $target = "$tifon";
            $message = "Hi {$fullname},
Your booking request for the meeting room has been updated. Here are the details:
Meeting Room: {$row1['room_name']}
Booking Date and Time: {$start_date4} at {$start_time4} until {$end_time4}  
Status: Rejected
Reason:$sebab           
Remarks:        
If you have any questions or need further information, please contact HRAD.
Thank you!
            ";



            //$token = "S2RWsbyg2zqS-W3iqjQ2"; // bergantung
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



      if (isset($_POST['approve']) || isset($_POST['takekey']) || isset($_POST['return']) || isset($_POST['Reserved']) || isset($_POST['reject'])) {
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