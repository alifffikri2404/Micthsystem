<?php
include('functions.php');

//$mysqli = new mysqli('localhost', 'root', '', 'idrive');
include('db_conn_cal.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get checkbox values
    if (isset($_POST["withcard"])) {
        $checkbox_namearray = $_POST["withcard"];

        // Escape and insert values into the database
        foreach ($checkbox_namearray as $value) {
            $escaped_value = mysqli_real_escape_string($conn, $value);
            $sql = "INSERT INTO booking (fuel_card, tng_card) VALUES ('$escaped_value')";

            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "No checkbox values selected.";
    }
}*/





if (isset($_POST['submit'])) {

  $user_name = $_SESSION['user_name'];
  $user_id =  $_SESSION['emp_number'];
  $vehicle_id = $_POST['vehicleinp'];

  $dc = date("Y-m-d");
  $start_datebook = $_GET['date'];
  $end_datebook = $_POST['end_date'];
  $duration_time = $_POST['start_time'];
  $checkbox1_value = isset($_POST["checkbox1"]) ? mysqli_real_escape_string($mysqli, $_POST["checkbox1"]) : "";
  $checkbox2_value = isset($_POST["checkbox2"]) ? mysqli_real_escape_string($mysqli, $_POST["checkbox2"]) : "";
  $purpose = $_POST['purpose'];
  $destination = $_POST['destination'];
  $status = 'Pending';
  $user_name2 = $_POST['username'];

  date_default_timezone_set('Asia/Kuala_Lumpur');
  $current_time1 = date("H:i:s");
  try {

    $stmt = $mysqli->prepare("select * from management where start_date = ? AND vehicle_id = ?");
    $stmt->bind_param('ss', $start_datebook, $vehicle_id);

    if ($stmt->execute()) {
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
      if ($result->num_rows > 0 && ($row['status'] == 'Pending' || $row['status'] == 'Approved' || $row['status'] == 'Return') && ($row['start_time'] == '9am-5pm(Fullday)' || $row['start_time'] == '9am-1pm(Halfday Morning), 2pm-5pm(Halfday Evening)' || $row['start_time'] == '2pm-5pm(Halfday Evening), 9am-1pm(Halfday Morning)')) {
        $msg = "<div class='alert alert-danger'>Already Booked</div>";
      } else {

        //$conn= mysqli_connect("localhost", "root", "", "idrive");
        include('db_conn.php');

        if (!$db) {
          die("Connection failed: " . mysqli_connect_error());
        }

        $p = "";
        $m = "";
        $sql = "SELECT * FROM `hrm_vehicle` WHERE `id` = '$vehicle_id' ORDER BY `id` ASC";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $p = $row['plat_number'];
            $m = $row['model'];
          }




          $query2 = "INSERT INTO management (date,user_id, user_name, purpose, destination, vehicle_id, model_plat, 
			status,start_date, start_time, end_date, fuel_card, tng_card,currenttime) 
                        VALUES('$dc', '$user_id', '$user_name2', '$purpose', '$destination', '$vehicle_id', '$p', 
						'$status','$start_datebook','$duration_time', '$end_datebook', '$checkbox1_value', '$checkbox2_value', '$current_time1')";



          $ver = mysqli_query($db, $query2);

          $id = $user_id;
          $sql21 = "SELECT *
                      FROM empmaininfo
                      
                      WHERE Internal_Id  = '$id'";
          $result19 = mysqli_query($db_login, $sql21);
          $row3 = mysqli_fetch_assoc($result19);

          $fullname = $row3['First_Name'] . ' ' . $row3['Last_Name'];
          $Department = $row3['Department'];
          if (!empty($Department)) {
            $sqlDE = "SELECT * FROM empdept WHERE dept_id = $Department";
            $resultDE = mysqli_query($db_login, $sqlDE);
            if ($resultDE) {
              $rowDE = mysqli_fetch_assoc($resultDE);
              $Department2 = $rowDE['name'];
            } else {
              $Department2 = "None";
            }
          } else {
            $Department2 = "None";
          }
          try {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'systembooking048@gmail.com';
            $mail->Password = 'xbqseicesinyfvcl';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('admin@micth.com');
            $mail->addAddress('admin@micth.com');
            $mail->isHTML(true);



            $mail->Subject = 'Approval Request for Company Vehicle Usage';
            $mail->Body =
              'Dear Admin,<br><br>
            Please be informed that a booking request for the usage of a company vehicle has been submitted and is awaiting your approval. Below are the details of the request:<br><br>
            
            Employee Name: ' . $fullname . '<br>
            Department: ' . $Department2 . '<br>
            Vehicle Requested: ' . $m . '<br>
            Vehicle Registration No: ' . $p . '<br>
            Booking Date: ' . $start_datebook . ' Untill ' . $end_datebook . '<br>
            Purpose of Use: ' . $destination . '<br><br>
            Please review the details and provide your approval at your earliest convenience.
<br><br>
To approve or reject this request, please follow the link below:
https://i.micth.com/Micthsystem/
<br><br>
MICTH SYSTEM
<br><br>
Please note: This email is sent as a notification only. Please do not reply to this email.';


            // Send email
            $mail->send();

            $msg = "<div class='alert alert-success'>Booking Successful</div>";
          } catch (Exception $e) {
            $msg = "<div class='alert alert-danger'>Error: {$mail->ErrorInfo}</div>";
          }



          if (!$ver) {
            $msg = "<div class='alert alert-warning'>Booking Not Successful</div>";
            echo mysqli_error($db);
            die();
          } else {
            if (isset($msg)) {
              echo "Alert is being executed"; // Add this line for debugging
              echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                <script type='text/javascript'>
                    Swal.fire({
                        title: 'Success!',
                        text: 'Successfully booked!',
                        icon: 'success'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'user_record.php'; // Redirect after alert is closed
                        }
                    });
                </script>";
            }
          }


          //$msg = "<div class='alert alert-success'>Booking Successfull</div>";
          //$stmt->close();
          //$mysqli->close();

          //$conn->close();


          //tambah cni
        } else {
        }
      }
    }
  } catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
  }
}

if (empty($_SESSION['First_Name'])) {
  header("Location: iout.php");
  exit();
}

?>
<!doctype html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Book Vehicle Form</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../micthlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
              <a class="active" href="../BookingSystem/user_booking_vehicle.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill" style="background-color: transparent"></i></i>
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
                <span>Usage Record</span>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/user_record.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Staff Usage</span>
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
                <span>Usage Record</span>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="../BookingSystem/user_record_Room.php" style="padding-left: 60px">
                <i class="bi bi-caret-right-fill"></i></i>
                <span>Staff Usage</span>
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
      <h1>Booking Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../main_user.php">Home Page</a></li>
          <li class="breadcrumb-item"><a href="user_booking_vehicle.php">Book Vehicle</a></li>
          <li class="breadcrumb-item active">Booking Form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="card">
        <div class="container">
          <div class="row">
            <div class="col-md-12">


              <?php
              include('db_conn.php');

              if (!$db) {
                die("Connection failed: " . mysqli_connect_error());
              }

              $i = $_REQUEST['vehicle'];
              $datechoose1 = $_REQUEST['date'];
              $finaldatechoose1 = date("d-m-Y", strtotime($datechoose1));
              $p = "";
              $m = "";

              $i = $db->real_escape_string($i);

              $sql = "SELECT * FROM `hrm_vehicle` WHERE `id` = '" . $i . "' ORDER BY `id` ASC";
              $result = $db->query($sql);

              if ($result) {
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $p = $row['plat_number'];
                    $m = $row['model'];
                    $vid = $row['id'];
                  }
                } else {
                  echo "<script type='text/javascript'>
        
        window.location.href = 'user_booking_vehicle.php';
      </script>";
                }
              } else {
                $msg = "<div class='alert alert-danger'>Error in executing the query: " . $db->error . "</div>";
              }

              ?>
              <br>
              <?php echo (isset($msg)) ? $msg : ""; ?>

              <form class="row g-3" action="" method="post">
                <div class="col-md-6">
                  <br>

                  <label for="" class="form-label">Staff/Driver Name</label>
                  <br>
                  <?php
                  include('../db_conn.php');

                  // Correctly form the SQL query by breaking out of the string to use the session variable
                  $sql21 = "SELECT * FROM empmaininfo WHERE Internal_Id = '" .  $_SESSION['emp_number'] . "'";

                  $result19 = mysqli_query($conn, $sql21);

                  if ($result19) {
                    $row2 = mysqli_fetch_assoc($result19);
                    if ($row2) {
                      $fullname = $row2['First_Name'] . ' ' . $row2['Last_Name'];
                      $employeeid = $row2['Internal_Id'];
                  ?>
                      <input type="text" class="form-control" value="<?php echo htmlspecialchars($fullname); ?>" disabled>
                      <input type="hidden" name="username" class="form-control" value="<?php echo htmlspecialchars($row2['First_Name']); ?>">
                </div>
            <?php
                    } else {
                      echo "No data found.";
                    }
                  } else {
                    echo "Query failed: " . mysqli_error($db_login);
                  }
            ?>


            <div class="col-md-6">
              <br>
              <label for="" class="form-label">Vehicle</label>
              <br>
              <input required type="text" class="form-control" value="<?php echo $m; ?> - <?php echo $p; ?>" disabled>
              <input required type="hidden" class="form-control" name="vehicleinp" value="<?php echo $vid; ?>">
            </div>
            <div class="col-md-6">
              <label for="" class="form-label">Start Date Booking</label>
              <input type="text" class="form-control" name="start_datebook" value="<?php echo $finaldatechoose1; ?>" disabled>
              <input  type="hidden" class="form-control" name="end_date" value="<?php echo $finaldatechoose1; ?>">

            </div>

            <div class="col-md-6">
           
            </div>

            <?php
            //$sql = "SELECT management.* FROM `management` WHERE `vehicle_id` = '" . $i . "' AND start_date ='$finaldatechoose1' AND status !='Done' ";
            $sql = "SELECT * FROM `management` WHERE `vehicle_id` = '$i' AND `start_date` = '$datechoose1' AND `status` NOT IN ('Done', 'Reject')";

            $result = $db->query($sql);

            $isHalfdayMorning = false; // Initialize to false by default
            $isHalfdayEvening = false;
            if ($result && $result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $start_time = $row['start_time'];
              $isHalfdayEvening = ($start_time == "2pm-5pm(Halfday Evening)");
              $isHalfdayMorning = ($start_time == "9am-1pm(Halfday Morning)");
            }
            ?>

            <div class="col-md-6">
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-6 pt-0">Duration time Booking:</legend>
                <div class="col-sm-15">
                  <?php if ($isHalfdayMorning) : ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="start_time" id="st2_1" value="2pm-5pm(Halfday Evening)">
                      <label class="form-check-label" for="st2_1">
                        2pm - 5pm (Halfday Evening)
                      </label>
                    </div>
                  <?php elseif ($isHalfdayEvening) : ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="start_time" id="st1" value="9am-1pm(Halfday Morning)" checked>
                      <label class="form-check-label" for="st1">
                        9am - 1pm (Halfday Morning)
                      </label>
                    </div>
                  <?php else : ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="start_time" id="st1" value="9am-1pm(Halfday Morning)" checked>
                      <label class="form-check-label" for="st1">
                        9am - 1pm (Halfday Morning)
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="start_time" id="st2_2" value="2pm-5pm(Halfday Evening)">
                      <label class="form-check-label" for="st2_2">
                        2pm - 5pm (Halfday Evening)
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="start_time" id="st3" value="9am-5pm(Fullday)">
                      <label class="form-check-label" for="st3">
                        9am - 5pm (Fullday)
                      </label>
                    </div>
                  <?php endif; ?>
                </div>
              </fieldset>
            </div>

            <div class="col-md-6">
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-4 pt-0">With:</legend>
                <div class="col-sm-15">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="checkbox1" id="cbfuelcard" value="1">
                    <label class="form-check-label" for="cbfuelcard">
                      Fuel Card
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="checkbox2" id="cbtngcard" value="1">
                    <label class="form-check-label" for="cbtngcard">
                      Touch 'n Go Card
                    </label>
                  </div>
                </div>
              </fieldset>
            </div>

            <div class="col-md-6">
              <label for="" class="form-label">Purpose</label>
              <input required type="text" class="form-control" name="purpose">
            </div>

            <div class="col-md-6">
              <label for="" class="form-label">Destination</label>
              <input required type="text" class="form-control" name="destination">
            </div>


            <style>
              .form-check-label {
                text-align: justify;
              }
            </style>

            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="agree_terms" id="agree_terms" required>
                <label class="form-check-label" for="agree_terms">
                  I acknowledge and agree that by submitting this application, I understand and accept the
                  terms and conditions associated with the application/booking of the company car. I am
                  aware that any accidents, damages, or traffic summonses issued by the authorities during the
                  usage of the company car will be my responsibility, and I commit to covering all associated costs
                  incurred. I have read and agree to abide by the company's car usage terms and conditions
                  outlined in the applicable policies.
                </label>
              </div>
            </div>




            <div class="col-md-12">
              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
            <br>
            <br>
              </form>
              <br>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>



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