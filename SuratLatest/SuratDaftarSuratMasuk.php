<?php
 include('functions.php'); 


if(isset($_POST['view'])){
  $user_id = $_GET['Internal_Id'];    

echo "ok boleh view";
}

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
  
?>

<!DOCTYPE html>
<html lang = "en">
<head>
  <!-- <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MICTH | IntSys</title> -->

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register Incoming Letter</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- <meta http-equiv="refresh" content="15"> -->

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Favicons -->
  <link href="assets/img/micthlogo.png" rel="icon">
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

</head>
<style>
.sb{
	box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
	height:100%;
	width:100%;
	background-color: white;
	border: 1px solid white;
	overflow:auto;
	white-space: nowrap;
}
</style>
<body>

  <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- Logo -->
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
            <span class="d-none d-md-block dropdown-toggle ps-2">
              Me</span>
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

  </header>
  <!-- End Header -->

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
      <a class="nav-link" data-bs-target="#letter-system-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-envelope-fill"></i>
        <span>Letter System</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="letter-system-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li class="nav-item">
          <a class="nav-link collapsed" href="../SuratLatest/SuratDaftarSuratKeluar.php">
            <i class="bi bi-pencil-square" style="font-size: 1em"></i>
            <span>Register Outgoing Letter</span>
          </a>
        </li>
        <?php if ($_SESSION['admin_surat'] == "1"){ ?>
        <li class="nav-item">
          <a class="active" href="../SuratLatest/SuratDaftarSuratMasuk.php">
            <i class="bi bi-pencil-square" style="font-size: 1em; background-color: transparent"></i>
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
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

  <div class="pagetitle">
    <h1>Register New Incoming Letter</strong></h1>
    <nav>
      <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
        <li class="breadcrumb-item"><a href="../main_user.php">Home Page</a></li>
        <li class="breadcrumb-item active">Register Incoming Letter</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

<?php

$user_id = $_SESSION['emp_number']; 

$query = "
    SELECT *
    FROM empmaininfo
    WHERE Internal_Id = ?
";

$stmt = $db_login->prepare($query);
$stmt->bind_param("i", $user_id); // Bind the user ID parameter
$stmt->execute();
$result = $stmt->get_result();
$user_info = $result->fetch_assoc();

$sql = "SELECT no_rujukan_micth FROM tbl_surat_in
        WHERE no_rujukan_micth LIKE 'MICTH/CEO%' 
        ORDER BY id DESC LIMIT 1";

$result = $db->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastReference = $row['no_rujukan_micth'];
} else {
    $lastReference = null; // No previous record found
}

if ($lastReference) {
  // Example: MICTH/CEO2024/NOV-01
  preg_match('/MICTH\/CEO\d{4}\/([A-Z]+)-(\d+)/', $lastReference, $matches);
  
  // Extract the month and number from the reference
  $lastMonth = isset($matches[1]) ? strtoupper($matches[1]) : '';
  $lastNumber = isset($matches[2]) ? (int)$matches[2] : 0;

  // Check if the month from the last reference matches the current month
  if ($lastMonth !== strtoupper(date('M'))) {
      $lastNumber = 0; // Reset if the months are different
  }
} else {
  $lastNumber = 0; // Start from 0 if no records
}

$currentYear = date('Y');
$currentMonth = strtoupper(date('M'));
$bilangan = str_pad($lastNumber + 1, 2, "0", STR_PAD_LEFT);
$newBilangan = str_pad($lastNumber + 1, 2, "0", STR_PAD_LEFT);

// Create the reference number
$InputNoRujukanSuratMICTH = "MICTH/CEO{$currentYear}/{$currentMonth}-{$newBilangan}";

// Format the new reference number
$newReference = "MICTH/CEO{$currentYear}/{$currentMonth}-{$bilangan}";
?>
   <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-20">
        <div class="row">
          <!-- Recent Sales -->
        </div>
      </div>
      <div class="col-12">
        <div class="card top-selling">
          <div class="sb">
            <div class="card-body">
              <h5 class="card-title"><strong>INCOMING LETTER INFORMATION</strong><br/>
              <!-- List and select category from field form -->

              <div class="row"  style="margin-top: 10px">
                <div class="col-md-12">
                  <!-- General form elements -->
                    <!-- /.box-header -->
                    <!-- Form start -->
                    <form role="form" action="" method="post">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400">Registration Date: <span style="color: red; ">  *</span></label>
                                    <div class="input-group">
                                      <input type="date" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                        class="form-control" id="InputDate" name="InputDate" value="<?php echo date("Y-m-d"); ?>" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400">Receive Date: <span style="color: red; ">  *</span></label>
                                    <div class="input-group">
                                      <input type="date" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                        class="form-control" id="InputReceiveDate" name="InputReceiveDate" value="<?php echo date("Y-m-d"); ?>" required>
                                    </div>
                                  </div>
                                </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400">Letter Reference No: <span style="color: red; ">  *</span></label>
                                    <div class="input-group">
                                      <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                        class="form-control" id="InputNoRujukanSuratPengirim" name="InputNoRujukanSuratPengirim" value="<?php echo isset($_POST['InputNoRujukanSuratPengirim']) ? $_POST['InputNoRujukanSuratPengirim'] : ''; ?>" required><br>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                <label for="exampleInputEmail1" style="font-weight: 400">MICTH Reference No: </label>
                                  <div class="input-group">
                                    <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                      class="form-control" id="InputNoRujukanSuratMICTH" name="InputNoRujukanSuratMICTH" value="<?php echo $InputNoRujukanSuratMICTH; ?>"readonly><br>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400">Sender: <span style="color: red; ">  *</span></label>
                                    <div class="input-group">
                                      <textarea class="form-control" style="font-size: 1.4rem; line-height: 1.8"
                                        rows="3" cols="50" id="InputPengirimSurat" name="InputPengirimSurat" value="<?php echo isset($_POST['InputPengirimSurat']) ? $_POST['InputPengirimSurat'] : ''; ?>" required></textarea><br>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400">Subject / Title of Letter: <span style="color: red; ">  *</span></label>
                                    <div class="input-group" style="flex-grow: 1;">
                                    <textarea class="form-control" style="font-size: 1.4rem; line-height: 1.8" 
                                    rows="3" cols="50" id="InputTajukSurat" name="InputTajukSurat" required><?php echo isset($_POST['InputTajukSurat']) ? htmlspecialchars($_POST['InputTajukSurat'], ENT_QUOTES) : ''; ?></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="action_by" style="font-weight: 400">
                                    Action By: <span style="color: red;">*</span>
                                  </label>
                                  <div class="input-group">
                                    <select
                                      style="
                                        font-size: 1.4rem;
                                        line-height: 1.0;
                                        height: 34px;
                                        -webkit-appearance: menulist-button;
                                        -moz-appearance: menulist-button;
                                        appearance: menulist-button;
                                      "
                                      class="form-control"
                                      id="InputTindakanOlehSurat"
                                      name="InputTindakanOlehSurat"
                                      onchange="filterStaffByDepartment()"
                                      required
                                    >
                                      <option value="" disabled selected>-- Department Involved --</option>
                                      <?php
                                        $sqlLT = "SELECT name FROM empdept ORDER BY name ASC";
                                        $result = mysqli_query($db_login, $sqlLT);
                                        while ($rowLT = mysqli_fetch_array($result)) {
                                          if ($rowLT['name'] !== 'Super Admin') {
                                            echo '<option value="' . $rowLT['name'] . '">' . $rowLT['name'] . '</option>';
                                          }
                                        }
                                      ?>
                                    </select>
                                  </div>
                                  <br />
                                  <div class="input-group" style="position: relative;">
                                    <input
                                      type="text"
                                      style="
                                        font-size: 1.4rem;
                                        line-height: 1.0;
                                        height: 34px;
                                        width: 100%;
                                        -webkit-appearance: menulist-button;
                                        -moz-appearance: menulist-button;
                                        appearance: menulist-button;
                                      "
                                      class="form-control"
                                      placeholder="Person-in-Charge"
                                      id="InputTindakanIndividu"
                                      name="InputTindakanIndividu"
                                      oninput="filterStaff()"
                                      autocomplete="off"
                                    />
                                    <input type="hidden" id="staffid" name="staffid" />
                                    <div
                                      id="suggestions"
                                      class="suggestions"
                                      style="
                                        display: none;
                                        position: absolute;
                                        top: 38px;
                                        width: 100%;
                                        background-color: #fff;
                                        border: 1px solid #ccc;
                                        z-index: 1000;
                                        border-radius: 4px;
                                        max-height: 200px;
                                        overflow-y: auto;
                                      "
                                    ></div>
                                  </div>
                                </div>
                              </div>

                              <script>
                                let filteredStaffData = []; // Holds the staff filtered by department
                                const staffData = [
                                  <?php
                                    $sqlAS = "SELECT empmaininfo.First_Name, empmaininfo.Last_Name, empmaininfo.Internal_Id, empdept.name as Department
                                              FROM empmaininfo
                                              INNER JOIN empdept ON empmaininfo.Department = empdept.dept_id
                                              ORDER BY CAST(empdept.dept_id AS UNSIGNED) ASC";
                                    require('../db_conn.php');

                                    $resultA = mysqli_query($conn, $sqlAS);
                                    $staffNames = [];

                                    while ($rowL = mysqli_fetch_array($resultA)) {
                                      $firstname = $rowL['First_Name'];
                                      $staffID = $rowL['Internal_Id'];
                                      $department = $rowL['Department'];
                                      $staffNames[] = json_encode(['name' => $firstname, 'id' => $staffID, 'department' => $department]);
                                    }
                                    echo implode(',', $staffNames);
                                  ?>
                                ];

                                function filterStaffByDepartment() {
                                  const selectedDepartment = document.getElementById("InputTindakanOlehSurat").value;
                                  filteredStaffData = staffData.filter((staff) => staff.department === selectedDepartment);
                                  document.getElementById("InputTindakanIndividu").value = ""; // Clear person input
                                  document.getElementById("staffid").value = ""; // Clear hidden input
                                }

                                function filterStaff() {
                                  const input = document.getElementById("InputTindakanIndividu");
                                  const filter = input.value.toLowerCase();
                                  const suggestions = document.getElementById("suggestions");
                                  suggestions.innerHTML = ""; // Clear previous suggestions

                                  if (filter && filteredStaffData.length > 0) {
                                    const filtered = filteredStaffData.filter((staff) =>
                                      staff.name.toLowerCase().includes(filter)
                                    );

                                    if (filtered.length > 0) {
                                      suggestions.style.display = "block"; // Show suggestions
                                      filtered.forEach((staff) => {
                                        const div = document.createElement("div");
                                        div.innerText = staff.name;
                                        div.style.padding = "10px";
                                        div.style.cursor = "pointer";
                                        div.style.borderBottom = "1px solid #ddd";

                                        // Match styles with InputTindakanOlehSurat
                                        div.style.fontSize = "1.4rem";
                                        div.style.lineHeight = "1.0";
                                        div.style.backgroundColor = "#fff";
                                        div.style.color = "#333";
                                        div.style.fontFamily = "Arial, sans-serif";

                                        // Highlight hovered items
                                        div.onmouseover = () => {
                                          div.style.backgroundColor = "#007bff";  // Blue background on hover
                                          div.style.color = "#fff";  // White text color on hover
                                        };

                                        div.onmouseout = () => {
                                          div.style.backgroundColor = "#fff";  // Default white background
                                          div.style.color = "#333";  // Default text color
                                        };

                                        div.onclick = () => selectStaff(staff); // Set the input value
                                        suggestions.appendChild(div);
                                      });
                                    } else {
                                      suggestions.style.display = "none"; // Hide if no match
                                    }
                                  } else {
                                    suggestions.style.display = "none"; // Hide if input is empty or no department selected
                                  }
                                }

                                function selectStaff(staff) {
                                  document.getElementById("InputTindakanIndividu").value = staff.name;
                                  document.getElementById("staffid").value = staff.id; // Set the Internal_Id in the hidden input
                                  document.getElementById("suggestions").style.display = "none"; // Hide suggestions
                                }
                              </script>

                              <div class="col-md-5">
                                <div class="form-group">
                                <label for="exampleInputEmail1" style="font-weight: 400">Status: <span style="color: red; ">  *</span></label>
                                  <div class="input-group">
                                    <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                      class="form-control" id="InputStatusSurat" name="InputStatusSurat" value="<?php echo isset($_POST['InputStatusSurat']) ? $_POST['InputStatusSurat'] : ''; ?>" required> <br>
                                  </div>
                                </div>
                              </div>

                            </div>
                              <style>
                                .suggestions {
                                  border: 1px solid #ccc;
                                  max-height: 150px;
                                  overflow-y: auto;
                                  background-color: white;
                                  position: absolute;
                                  z-index: 1000;
                                }

                                .suggestions div {
                                  padding: 8px;
                                  cursor: pointer;
                                }

                                .suggestions div:hover {
                                  background-color: #f0f0f0;
                                }
                              </style>


                            </div>
                          </div>

                                
                      <!-- /.box-body -->
                      <div class="col-md-2">
                        <div class="form-group">
                          <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg" style="font-size: 15px">Submit</button>
                          <button type="submit" name="reset" id="reset" class="btn btn-danger btn-lg" style="font-size: 15px">Reset</button>
                        </div><br>
                      </div>
                    </form>
                  <!-- /.box -->
                </div>





      </div>


    </div>

<?php
if (isset($_POST['submit'])) {
    $InputDate = isset($_POST['InputDate']) ? $_POST['InputDate'] : '';
    $InputReceiveDate = isset($_POST['InputReceiveDate']) ? $_POST['InputReceiveDate'] : '';
    $InputPengirimSurat = isset($_POST['InputPengirimSurat']) ? $_POST['InputPengirimSurat'] : '';
    $InputNoRujukanSuratPengirim = isset($_POST['InputNoRujukanSuratPengirim']) ? $_POST['InputNoRujukanSuratPengirim'] : '';
    $InputNoRujukanSuratMICTH = isset($_POST['InputNoRujukanSuratMICTH']) ? $_POST['InputNoRujukanSuratMICTH'] : '';
    $InputTajukSurat = isset($_POST['InputTajukSurat']) ? $_POST['InputTajukSurat'] : '';
    $InputTindakanOlehSurat = isset($_POST['InputTindakanOlehSurat']) ? $_POST['InputTindakanOlehSurat'] : '';
    $InputTindakanIndividu = isset($_POST['InputTindakanIndividu']) ? $_POST['InputTindakanIndividu'] : '';
    $InputStatusSurat = isset($_POST['InputStatusSurat']) ? $_POST['InputStatusSurat'] : '';
    $name = isset($_SESSION['First_Name']) ? $_SESSION['First_Name'] : '';

    $InputDateCvt = date("Y-m-d", strtotime($InputDate));
    $CurrentDate = date("Y-m-d");

    // Combine tindakan fields
    $finalInputTindakan = trim($InputTindakanOlehSurat . "/" . $InputTindakanIndividu, "/");

    // Generate No Rujukan Surat MICTH
    $currentYear = date('Y');
    $currentMonth = strtoupper(date('M'));
    $sql = "SELECT no_rujukan_micth FROM tbl_surat_in WHERE no_rujukan_micth LIKE 'MICTH/CEO$currentYear/$currentMonth%' ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($db, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        preg_match('/-(\d+)$/', $row['no_rujukan_micth'], $matches);
        $lastNumber = isset($matches[1]) ? (int)$matches[1] : 0;
    } else {
        $lastNumber = 0;
    }

    try {
        // Check if No Rujukan Surat MICTH already exists
        $sqlCheck = "SELECT id FROM tbl_surat_in WHERE no_rujukan_micth = '$InputNoRujukanSuratMICTH'";
        $resultCheck = mysqli_query($db, $sqlCheck);

        if (mysqli_num_rows($resultCheck) > 0) {
            // Record already exists
            paparMesejGagalSimpanalready();
        } else {
            // Insert the new record
            $sqlInsert = "INSERT INTO tbl_surat_in(date, from_dpd, title, no_surat_pengirim, no_rujukan_micth, tindakan, status, direkodkan_oleh, tarikh_direkod, tarikh_terima) 
                          VALUES ('$InputDateCvt', '$InputPengirimSurat', '$InputTajukSurat', '$InputNoRujukanSuratPengirim', '$InputNoRujukanSuratMICTH', '$finalInputTindakan', '$InputStatusSurat', '$name', '$CurrentDate', '$InputReceiveDate')";

            $queryInsert = mysqli_query($db, $sqlInsert);

            if ($queryInsert) {
                paparMesejBerjayaSimpan($InputNoRujukanSuratMICTH);
                unset($_SESSION['submit']);
            } else {
                paparMesejGagalSimpan();
            }
        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
} else {
    // Function to display failure message
    function died($error) {
        paparMesejGagal();
    }
}

function paparMesejBerjayaSimpan($InputNoRujukanSuratMICTH) {
  $dataPreview = 'MICTH Reference No: ' . $InputNoRujukanSuratMICTH;

  echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
  echo '<script type="text/javascript">
  swal({
      title: "Data has been inserted",
      icon: "success",
      buttons: false, // Disable built-in buttons to use custom HTML
      content: (function() {
          // Create container for custom content
          const container = document.createElement("div");
          container.style.textAlign = "center";

          // Add reference text
          const textContent = document.createElement("p");
          textContent.textContent = "' . $dataPreview . '";
          textContent.style.marginBottom = "20px";
          textContent.style.fontSize = "16px";

          // Add "Copy to clipboard" button
          const copyButton = document.createElement("button");
          copyButton.textContent = "Copy to clipboard";
          copyButton.style.backgroundColor = "#30a2db";
          copyButton.style.color = "white";
          copyButton.style.border = "none";
          copyButton.style.padding = "10px 20px";
          copyButton.style.fontSize = "14px";
          copyButton.style.cursor = "pointer";
          copyButton.style.marginRight = "10px";
          copyButton.addEventListener("click", function() {
              // Copy to clipboard
              navigator.clipboard.writeText("' . $InputNoRujukanSuratMICTH . '").then(() => {
                  copyButton.textContent = "Copied!";
                  copyButton.style.backgroundColor = "#28a745"; // Change to green on success
              }).catch(err => {
                  copyButton.textContent = "Failed to copy";
                  copyButton.style.backgroundColor = "#dc3545"; // Change to red on error
              });
          });

          // Add "Okay" button
          const okayButton = document.createElement("button");
          okayButton.textContent = "Okay";
          okayButton.style.backgroundColor = "#6c757d";
          okayButton.style.color = "white";
          okayButton.style.border = "none";
          okayButton.style.padding = "10px 20px";
          okayButton.style.fontSize = "14px";
          okayButton.style.cursor = "pointer";
          okayButton.addEventListener("click", function() {
              // Close SweetAlert and redirect
              swal.close();
              window.location = "SuratRekodSuratMasuk.php";
          });

          // Append buttons to container
          container.appendChild(textContent);
          container.appendChild(copyButton);
          container.appendChild(okayButton);

          return container;
      })()
  });
  </script>';
}

function paparMesejGagalSimpan() {
    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    echo '<script type="text/javascript">
    swal({
        title: "Error!",
        text: "Oops! An error occurred, failed to add new record!",
        icon: "error",
        button: "OK"
    })
    </script>';
    exit();
}

function paparMesejGagalSimpanalready() {
    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    echo '<script type="text/javascript">
    swal({
        title: "Error!",
        text: "Oops! The record has already been inserted.",
        icon: "error",
        button: "OK"
    })
    </script>';
    exit();
}
    
    ?>
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


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- Clipboard.js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


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
