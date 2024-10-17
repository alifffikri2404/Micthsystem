<?php
include ('functions.php');

//$mysqli = new mysqli('localhost', 'root', '', 'idrive');

include ('../db_conn.php');

if (isset($_GET['Internal_Id'])) {
  $sql_query = "SELECT `Internal_Id`, CONCAT(`First_Name`, ' ', `Last_Name`) AS `Full_Name`,
    `Email`, `Mobile_phone`, `Job_Title`, `Employment_Type`, `Manager`, `Department`, `Joining_Date`,
    `user_name`, `Active_Inactive`, `access_isurat`, `access_aset`, `access_imobile`, `access_eoutstation`, `access_tower`,
    `admin_surat`, `admin_asset`, `admin_booking`, `admin_outstation`
    FROM empmaininfo WHERE Internal_Id=" . $_GET['Internal_Id'];

  $result_set = mysqli_query($conn, $sql_query);
  $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
}
if (isset($_POST['btn-update'])) {
  // variables for input data
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
                   admin_outstation='$admin_outstation' WHERE Internal_Id=" . $_GET['Internal_Id'];

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

  <title>Update Staff</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../micthlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-badge-fill"></i><span>Access User</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>

      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="accessSSO.php" class="active">
            <i class="bi bi-grid-fill" style="font-size: 1em; background-color: transparent"></i><span>Access View</span>
          </a>
        </li>
      </ul>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="userSSO.php">
            <i class="bi bi-people-fill" style="font-size: 1em"></i><span>Staff List</span>
          </a>
        </li>
      </ul>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="../eoustation3.0/editHR.php">
            <i class="bi bi-file-person-fill" style="font-size: 1em"></i><span>Current HR</span>
          </a>
        </li>
      </ul>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="../eoustation3.0/editStaff.php">
            <i class="bi bi-person-lines-fill" style="font-size: 1em"></i><span>Current Staff</span>
          </a>
        </li>
      </ul>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="../eoustation3.0/register.php">
            <i class="bi bi-person-plus-fill" style="font-size: 1em"></i><span>Register</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="../main_user.php">
        <i class="bi bi-reply-fill"></i>
        <span>Home Page</span>
      </a>
    </li>
  </ul>

</aside><!-- End Sidebar-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Staff Info</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
          <li class="breadcrumb-item"><a href="accessSSO.php">Access View</a></li>
          <li class="breadcrumb-item active">Staff Info</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <?php
              //$conn= mysqli_connect("localhost", "root", "", "idrive");
              include ('db_conn.php');

              if (!$db) {
                die("Connection failed: " . mysqli_connect_error());
              }

              $db->close();
              ?>
              <br>

              <?php echo (isset($msg)) ? $msg : ""; ?>
              <!--<form class="row g-3" action="" method="post">-->
              <form class="row g-3" action="" method="post">
                <div class="col-md-8">
                  <label for="" style="font-size :20px" class="col-form-label-lg">Staff Name</label>
                  <input type="text" style="font-size :20px" class="form-control form-control-lg"
                    value="<?php echo $fetched_row['Full_Name']; ?>" readonly>
                </div>

                <span></span>

                <div class="col-md-4">
                  <label for="" style="font-size :20px" class="col-form-label-lg">Username</label>
                  <input type="text" style="font-size :20px" class="form-control form-control-lg"
                    value="<?php echo $fetched_row['user_name']; ?>" readonly>
                </div>

                <div class="col-md-4">
                  <label for="" style="font-size :20px; margin-left: 20px;" class="col-form-label-lg">Email</label>
                  <input type="text" style="font-size :20px; margin-left: 20px;" class="form-control form-control-lg"
                    value="<?php echo $fetched_row['Email']; ?>" readonly>
                </div>

                <span></span>

                <div class="col-md-4">
                  <label for="" style="font-size :20px" class="col-form-label-lg">ID</label>
                  <input type="text" style="font-size :20px" class="form-control form-control-lg"
                    value="<?php echo $fetched_row['Internal_Id']; ?>" readonly>
                </div>

                <div class="col-md-4">
                  <label for="" style="font-size :20px; margin-left: 20px;" class="col-form-label-lg">Status</label>
                  <input type="text" style="font-size :20px; margin-left: 20px;" class="form-control form-control-lg"
                    value="<?php echo $fetched_row['Active_Inactive']; ?>" readonly>
                </div>

          
                <span></span>
                <div class="col-md-4">
                  <?php
                  $sql = "SELECT * FROM empmanager WHERE manager_id = '" . $fetched_row['Manager'] . "'";
                  $result = mysqli_query($conn, $sql);

                  // Check if the query was successful
                  if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <label for="" style="font-size: 20px;" class="col-form-label-lg">Manager</label>
                    <input type="text" style="font-size: 20px;" class="form-control form-control-lg"
                      value="<?php echo $row['name']; ?>" readonly>
                  <?php
                  }
                  ?>
                </div>

                <div class="col-md-4">
                  <?php
                  $sql = "SELECT * FROM empdept WHERE dept_id = '" . $fetched_row['Department'] . "'";
                  $result = mysqli_query($conn, $sql);

                  // Check if the query was successful
                  if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <label for="" style="font-size: 20px; margin-left: 20px;" class="col-form-label-lg">Department</label>
                    <input type="text" style="font-size: 20px; margin-left: 20px;" class="form-control form-control-lg"
                      value="<?php echo $row['name']; ?>" readonly>
                  <?php
                  }
                  ?>
                </div>
                <span></span>
                <div class="col-md-4">
                  <?php
                  $sql = "SELECT * FROM empjobtitle WHERE job_id = '" . $fetched_row['Job_Title'] . "'";
                  $result = mysqli_query($conn, $sql);

                  // Check if the query was successful
                  if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <label for="" style="font-size: 20px;" class="col-form-label-lg">Position</label>
                    <input type="text" style="font-size: 20px;" class="form-control form-control-lg"
                      value="<?php echo $row['job_title']; ?>" readonly>
                  <?php
                  }
                  ?>
                </div>

                <div class="col-md-4">
                  <label for="" style="font-size :20px; margin-left: 20px;" class="col-form-label-lg">Employment
                    Type</label>
                  <input type="text" style="font-size :20px; margin-left: 20px;" class="form-control form-control-lg"
                    value="<?php echo $fetched_row['Employment_Type']; ?>" readonly>
                </div>

                <span></span>

                <div class="col-md-4">
                  <label for="" style="font-size :20px" class="col-form-label-lg">Start Employment Date</label>
                  <input type="text" style="font-size :20px" class="form-control form-control-lg"
                    value="<?php echo $fetched_row['Joining_Date']; ?>" readonly>
                </div>


                <div class="col-md-4">
                  <label for="" style="font-size :20px; margin-left: 20px;" class="col-form-label-lg">End Employment
                    Date</label>
                  <?php
                  // Check if $fetched_row['Employment_End_Date'] exists and is not empty
                  if (isset($fetched_row['Employment_End_Date']) && !empty($fetched_row['Employment_End_Date'])) {
                    // If it exists and is not empty, echo its value
                    echo '<input type="text" style="font-size: 20px; margin-left: 20px;" class="form-control form-control-lg" value="' . $fetched_row['Employment_End_Date'] . '" readonly>';
                  } else {
                    // If it doesn't exist or is empty, display a hyphen "-"
                    echo '<input type="text" style="font-size: 20px; margin-left: 20px;" class="form-control form-control-lg" value="-" readonly>';
                  }
                  ?>
                </div>



                <span></span>
                <?php
                // Utility function to check if a checkbox should be checked
                function isChecked($value)
                {
                  return isset($value) && $value == 1 ? 'checked' : '';
                }
                ?>
                <div class="col-md-8">
                  <label for="" style="font-size: 20px;" class="col-form-label-lg">Access</label><br>
                  <input type="checkbox" id="access_isurat" style="height: 15px; width: 20px;" name="access_isurat"
                    <?php echo isChecked($fetched_row['access_isurat']); ?>>
                  <label for="access_isurat" style="font-size: 20px; margin-left: 5px;">I-Surat</label>
                  <input type="checkbox" id="access_asset" style="height: 15px; width: 20px; margin-left: 20px;"
                    name="access_asset" <?php echo isChecked($fetched_row['access_aset']); ?>>
                  <label for="access_asset" style="font-size: 20px; margin-left: 5px;">I-Asset</label>
                  <input type="checkbox" id="access_imobile" style="height: 15px; width: 20px; margin-left: 20px;"
                    name="access_imobile" <?php echo isChecked($fetched_row['access_imobile']); ?>>
                  <label for="access_imobile" style="font-size: 20px; margin-left: 5px;">Booking System</label>
                  <input type="checkbox" id="access_eoutstation" style="height: 15px; width: 20px;"
                    name="access_eoutstation" <?php echo isChecked($fetched_row['access_eoutstation']); ?>>
                  <label for="access_eoutstation" style="font-size: 20px; margin-left: 5px;">E-Outstation</label>
                  <input type="checkbox" id="access_tower" style="height: 15px; width: 20px; margin-left: 20px;"
                    name="access_tower" <?php echo isChecked($fetched_row['access_tower']); ?>>
                  <label for="access_tower" style="font-size: 20px; margin-left: 5px;">Tower</label>
                </div>
                <div class="col-md-8">
                  <label for="" style="font-size: 20px;" class="col-form-label-lg">Admin Access</label><br>
                  <input type="checkbox" id="admin_surat" style="height: 15px; width: 20px;" name="admin_surat" <?php echo isChecked($fetched_row['admin_surat']); ?>>
                  <label for="admin_surat" style="font-size: 20px; margin-left: 5px;">I-Surat</label>
                  <input type="checkbox" id="admin_asset" style="height: 15px; width: 20px; margin-left: 20px;"
                    name="admin_asset" <?php echo isChecked($fetched_row['admin_asset']); ?>>
                  <label for="admin_asset" style="font-size: 20px; margin-left: 5px;">I-Asset</label>
                  <input type="checkbox" id="admin_booking" style="height: 15px; width: 20px; margin-left: 20px;"
                    name="admin_booking" <?php echo isChecked($fetched_row['admin_booking']); ?>>
                  <label for="admin_booking" style="font-size: 20px; margin-left: 5px;">Booking System</label>
                  <input type="checkbox" id="admin_outstation" style="height: 15px; width: 20px; margin-left: 20px;"
                    name="admin_outstation" <?php echo isChecked($fetched_row['admin_outstation']); ?>>
                  <label for="admin_outstation" style="font-size: 20px; margin-left: 5px;">E-Outstation</label>
                </div>


                <div class="col-md-6">
                  <br />
                </div>

                <div class="form-group">
                  <br><br><br>
                  <button name="btn-update" type="submit" style="font-size :20px"
                    class="btn btn-primary">Update</button>
                  <button name="btn-cancel" type="submit" style="font-size :20px; margin-left: 5px;"
                    class="btn btn-danger">Cancel</button>
                </div>
              </form>
            </div>

          </div>
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


</body>

</html>