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

  <title>Vehicle Record Details [Admin]</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../micthlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        <span class="d-none d-lg-block">MICTH System</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo ---->


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
        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="../BookingSystem/user.php">
            <i class="bi bi-house-door-fill" style="font-size: 1em"></i>
            <span>Dashboard</span>
          </a>
        </li> -->
      
        <li class="nav-item">
          <a class="nav-link" data-bs-target="#book-vehicle-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
            <i class="bi bi-car-front-fill" style="font-size: 1em"></i></i><span>Vehicle</span>
            <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
          </a>
          <ul id="book-vehicle-nav" class="nav-content collapse show" data-bs-parent="#booking-system-nav">
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
              <a class="active" href="../BookingSystem/usage_record_monthly.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill" style="background-color: transparent"></i></i>
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
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Vehicle Record Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../main_user.php">Home Page</a></li>
          <li class="breadcrumb-item"><a href="usage_record_monthly.php">Vehicle Record</a></li>
          <li class="breadcrumb-item active">Record Details</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="card">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h5 class="card-title"><strong>USAGE RECORD</strong></h5>
              <?php
              if (isset($_GET['id'])) {

                $sqlA_query = "SELECT * 
        FROM management where id =" . $_GET['id'];

                $result_set = mysqli_query($db, $sqlA_query);
                $fetched_row = mysqli_fetch_array($result_set);
                //}
              ?>
                <div class="row">
                  <div class="col-xs-12">

                    <div class="col-md-0">
                    </div>
                    <!-- left column -->
                    <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="box box-danger">

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post">
                        <div class="box-body">
                            <br>
                            <div class="row">
                              <!-- Tarikh -->
                              <?php
                              $id = $fetched_row['user_id'];
                              $sql21 = "SELECT *
                                FROM empmaininfo
                                
                                WHERE Internal_Id  = '$id'";
                              $result19 = mysqli_query($db_login, $sql21);


                              $row3 = mysqli_fetch_assoc($result19);

                              $fullname = $row3['First_Name'] . ' ' . $row3['Last_Name'];
                              $employeeid = $row3['Internal_Id'];
                              $jabatan = $row3['Department'];
                              ?>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">NAME:</label>
                                  <input type="text" class="form-control" id="tarikh_daftar" name="tarikh_daftar" value="<?php echo $fullname ?>" readonly>
                                </div>
                              </div>

                              <!-- Nama Kakitangan -->
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">EMPLOYEE.NO:</label>
                                  <!--<div class="col-md-2">-->
                                  <input type="text" name="nama_kakitangan" placeholder="Nama Kakitangan" value="<?php echo $employeeid ?>" class="form-control" readonly />
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-5">
                                <div class="form-group">

                                  <div class="form-group">
                                    <label for="exampleInputEmail1">PURPOSE:</label>
                                    <input type="text" class="form-control" id="tarikh_daftar" name="tarikh_daftar" value="<?php echo $fetched_row['purpose']; ?>" readonly>
                                  </div>

                                </div>
                              </div>

                              <!-- Jenis -->
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="jenis_aset">DESTINATION:</label><br>
                                  <input type="text" name="jenis_aset" style="text-transform:uppercase" placeholder="Jenis" value="<?php echo $fetched_row['destination']; ?>" class="form-control" readonly />
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">VEHICLE:</label>
                                  <!--<div class="col-md-2">-->
                                  <?php
                                  $idv = $fetched_row['vehicle_id'];
                                  $sql21 = "SELECT * FROM hrm_vehicle WHERE id = '$idv'";


                                  $result19 = mysqli_query($db, $sql21);


                                  $row4 = mysqli_fetch_assoc($result19);

                                  $all = $row4['jenama'] . ' ' . $row4['model'];

                                  ?>
                                  <input type="text" name="no_siri" placeholder="No. Siri/ No. Plat" value="<?php echo $all ?>" class="form-control" readonly />
                                </div>
                              </div>

                              <!-- No Aset -->
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">PLAT.NO:</label>
                                  <!--<div class="col-md-2">-->
                                  <input type="text" name="no_aset" placeholder="tiada" value="<?php echo $fetched_row['model_plat']; ?>" class="form-control" readonly />
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">

                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">START USED:</label>
                                  <input type="date" name="tarikh_serahan" placeholder="START USED" value="<?php echo $fetched_row['start_date']; ?>" class="form-control" readonly />
                                </div>
                              </div>

                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">FINISH USED:</label>
                                  <input type="text" name="nama_aset" placeholder="FINISH USED" value="<?php echo $fetched_row['end_date']; ?>" class="form-control" readonly />
                                </div>
                              </div>


                            </div>
                            <br>
                            <div class="row">

                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">USED TIME:</label>
                                  <input type="text" name="nama_aset" placeholder=">USED TIME" value="<?php echo $fetched_row['start_time']; ?>" class="form-control" readonly />
                                </div>
                              </div>

                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">TIME BOOKED</label>
                                  <!--<div class="col-md-2">-->
                                  <input type="text" name="harga_beli" placeholder="TIME BOOKED" value="<?php echo $fetched_row['currenttime']; ?>" class="form-control" readonly />
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">TIME KEY COLLECTED
                                  </label>
                                  <!--<div class="col-md-2">-->
                                  <input type="text" name="harga_beli" placeholder="TIME KEY COLLECTED" value="<?php echo $fetched_row['cu_key']; ?>" class="form-control" readonly />
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">TIME KEY RETURNED
                                  </label>
                                  <!--<div class="col-md-2">-->
                                  <input type="text" name="harga_beli" placeholder="TIME KEY RETURNED" value="<?php echo $fetched_row['cu_keyreturn']; ?>" class="form-control" readonly />
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <br>

                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">ACCESSORIES:</label>
                                  <!--<div class="col-md-2">-->
                                  <input type="text" name="tahun_beli" placeholder="ACCESSORIES" value="<?php echo ($fetched_row['fuel_card'] == 1 ? 'Fuel Card' : '') . ($fetched_row['tng_card'] == 1 ? ', Touch \'n Go Card' : ''); ?>" class="form-control" readonly />
                                </div>
                              </div>

                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">APPROVER:</label>
                                  <!--<div class="col-md-2">-->
                                  <input type="text" name="tahun_beli" placeholder="APPROVER" value="<?php echo $fetched_row['Approver']; ?>" class="form-control" readonly />
                                </div>
                                <br>
                              </div>
                            </div>
                            <div class="row">
                              <br>

                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">RECEIVED BY:</label>
                                  <input type="text" name="tahun_beli" placeholder="RECEIVED" value="<?php echo $fetched_row['Receiver']; ?>" class="form-control" readonly />
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">REJECTED BY:</label>
                                  <!--<div class="col-md-2">-->
                                  <input type="text" name="tahun_beli" placeholder="REJECTED" value="<?php echo $fetched_row['rejected']; ?>" class="form-control" readonly />
                                </div>
                                <br>

                              </div>
                              <br>
                            </div>
                              <div class="row">

                                <div class="col-md-5">
                                  <label for="tarikh_serahan">REASON REJECT:</label>
                                  <div class="form-group">
                                    <input type="text" name="warranty" placeholder="REASON" value="<?php echo $fetched_row['sebab']; ?>" class="form-control" readonly />
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <label for="tarikh_serahan">REMARK:</label>
                                  <div class="form-group">
                                    <input type="text" name="warranty" placeholder="REMARK" value="<?php echo $fetched_row['remark1']; ?>" class="form-control" readonly />
                                  </div>
                                </div>
                              </div>

                              <br>
                              <!-- Warna -->




                           
                            </div>
                            <br>
                            <a href="tcpdf/laporanPDF/laporanasdetailpdf.php?id=<?php echo $fetched_row['id']; ?>" target='_blank' class="btn btn-primary">Print</a>


                            <br>
                          </div>
                      <!-- /.box-body -->

                      <br>
                    </div>

                  </div>
                  <!-- /.box -->

                </div>

            </div>
            <!-- /.box-body -->


          </div>

        </div>
        <!-- /.box -->

      </div>
      <!--/.col (left) -->
      <div class="col-md-2">
      </div>
      <!-- right column -->
      <!--/.col (right) -->

      </div>
    <?php
              }
    ?>


    </div><!-- End Right side columns -->


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

</body>

</html>