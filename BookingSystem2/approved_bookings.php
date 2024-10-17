<?php 
include('functions.php');

if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: index.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: ../index.php");
}
    if (isset($_POST['approved']))
    {
        $appUpdateQuery = "UPDATE bookings SET status= 'APPROVED' WHERE id='".$_POST['row_id']."'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);

    }
        
    if (isset($_POST['rejected']))
    {
        $appUpdateQuery = "DELETE FROM  bookings  WHERE id='".$_POST['row_id']."'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vehicle Booking Approval</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/igclogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
.sb{
  box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
  height:100%;
  width:100%;
  background-color: white;
  border: 1px solid grey;
  overflow:auto;
  white-space: nowrap;
  
}
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="admin.php" class="logo d-flex align-items-center">
        <img src="assets/img/igclogo.png" alt="">
        <span class="d-none d-lg-block">I-Mobile</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">






        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['user']['user_name']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['user']['user_name']; ?></h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
              <a class="dropdown-item d-flex align-items-center" href="index.php?logout='1'">
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
        <a class="nav-link collapsed" href="admin.php">
          <i class="bi bi-grid"></i>
          <span>Home Page</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-check"></i><span>Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content show " data-bs-parent="#sidebar-nav">
         

                <li>
            <a href="approved_bookings.php" class="active">
              <i class="bi bi-circle"></i><span>Approved Bookings</span>
            </a>
          </li>
     <li>
            <a href="approve_return.php">
              <i class="bi bi-circle"></i><span>Vehicle Return</span>
            </a>
          </li>
                <li>
            <a href="approve_booking.php" >
              <i class="bi bi-circle"></i><span>Vehicle Bookings</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

    
          <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-truck"></i><span>Vehicle</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="list_vehicle.php">
              <i class="bi bi-circle"></i><span>List of Vehicle</span>
            </a>
          </li>
                <li>
            <a href="add_vehicle.php">
              <i class="bi bi-circle"></i><span>Add Vehicle</span>
            </a>
          </li>
        </ul>
      </li>
    
              <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-folder-fill"></i><span>Usage Record</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="usage_record_monthly.php">
              <i class="bi bi-circle"></i><span>Record</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Approved Bookings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home Page</a></li>
          <li class="breadcrumb-item">Management</li>
          <li class="breadcrumb-item active">Approved Bookings</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-20">
          <div class="row">



            <!-- Recent Sales -->

  <div class="sb">
            <div class="card-body">
              <h5 class="card-title"><strong>APPROVED BOOKINGS</strong></h5>

              <!-- Default Table -->
<table style="border: 2px solid black;" class="table table-bordered">
    <tr>
  <th>#</th>
        <th>STAFF NAME</th>
        <th>DATE</th>
        <th>PURPOSE</th>
    <th>DESTINATION</th>
    <th>DRIVER NAME</th>
    <th>VEHICLE</th>
    <th>ACTION</th>
    </tr>

<?php
    $selectQuery = "SELECT * FROM `bookings` WHERE `status` LIKE 'APPROVED'";
    $sql = mysqli_query($db, $selectQuery);
    $count = mysqli_num_rows($sql);
  $i=1;

    if ($count>0)
    {            
        while ($row = mysqli_fetch_array($sql))
        {
?>

            <tr>
        <td><?php echo $i; ?></td>
        <td> <?php echo $row['user_name']; $_SESSION['stuappid'] = $row['user_name']; ?></td>
        <td> <?php echo $row['date']; ?> </td>
        <td> <?php echo $row['purpose']; ?> </td>
        <td> <?php echo $row['destination']; ?> </td>
        <td> <?php echo $row['driver_name']; ?></td>
        <td> <?php echo $row['model_plat']; ?></td>
        

                <td>
                    <form method="post" action="">
                        <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                        <button class="btn btn-danger" type="submit" name="rejected" >DELETE</button>
                    </form>
                </td>
            </tr>
      <?php
      $i++;
      ?>

<?php
        }
    } else {
        echo "NO RECORD";
    }
?>

</table> 
              <!-- End Default Table Example -->
            </div>
          </div>


            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->


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

</body>

</html>