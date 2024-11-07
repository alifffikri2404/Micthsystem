<?php
session_start();
include "db_conn.php";

$fname = $_SESSION['user_name'];

$uid = $_SESSION['id'];
$emp_number = $_SESSION['emp_number'];


$Last_Name = $_SESSION['Last_Name'];
$Email = $_SESSION['Email'];
$Mobile_phone = $_SESSION['Mobile_phone'];
$Job_Title = $_SESSION['Job_Title'];
$Employment_Type = $_SESSION['Employment_Type'];
$Manager = $_SESSION['Manager'];
$Department = $_SESSION['Department'];
$First_Name = $_SESSION['First_Name'];
$fname = $_SESSION['user_name'];
$id = $_SESSION['id'];
$uid = $_SESSION['id'];
$emp_number = $_SESSION['emp_number'];
if (isset($_POST["delete"])) {
  $delete = $_POST['delete'];
  $sql = "DELETE FROM `outstation` WHERE id='$delete'";
  $result = mysqli_query($conn, $sql);

  if ($conn->query($sql)) {
    echo "<script>alert('Delete success.')</script>";
  } else {
    echo "<script>alert('Delete failed. $conn -> $error')</script>";
  }
}
if (isset($_POST["update"])) {
  $_SESSION['updateid'] = $_POST['update'];

  header("Location: checkinstaff.php");
  exit();
}


if (empty($_SESSION['First_Name'])) {
  header("Location: logout.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pending Check-In</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../micthlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-door-open-fill"></i><span>Outstation System</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="dash2.php">
              <i class="bi bi-house-door-fill" style="font-size: 1em"></i><span>Home</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="dashStaff.php">
              <i class="bi bi-calendar-fill" style="font-size: 1em"></i><span>My Report</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="FormStaff.php">
              <i class="bi bi-pencil-fill" style="font-size: 1em"></i><span>Check-Out</span>
            </a>
          </li>
        </ul>
        <?php
        if ($Job_Title == "9" || $Job_Title == "14") {
        ?>
          <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <a href="pending_staff_check.php" class="active">
                <i class="bi bi-clock-fill" style="font-size: 1em; background-color: transparent"></i><span>Pending Staff Check-In</span>
              </a>
            </li>
          </ul>
        <?php
        }
        ?>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="feedback.php">
              <i class="bi bi-chat-left-text-fill" style="font-size: 1em"></i><span>Feedback</span>
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

      <!-- End Tables Nav -->

    </ul>

  </aside><!-- End Sidebar-->




  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pending Staff Check-In<strong>
        </strong></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dash2.php">Home Page</a></li>
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
                  <br>
                  <form method="post">
                    <div class="table-responsive">

                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px">Bil.</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Purpose</th>
                            <th>Location</th>

                            <th>Date-Out</th>
                            <th>Time-Out</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if ($Department == "8") {
                            $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00' AND status='8'";
                          } elseif ($Department == "6") {
                            $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00' AND status='6'";
                          } elseif ($Department == "3") {
                            $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00' AND status ='3'";
                          } elseif ($Department == "10") {
                            $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00' AND status='10'";
                          } elseif ($Department == "7") {
                            $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00' AND status='7'";
                          } elseif ($Department == "4") {
                            $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00' AND status='4'";
                          } elseif ($Department == "9") {
                            $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00' AND status='9'";
                          } elseif ($_SESSION['func_admin'] == "1") {
                            $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00' ";
                          } else {
                            $sql = "";
                          }

                          $result = mysqli_query($conn, $sql);



                          $result = mysqli_query($conn, $sql);
                          if (!$result) {
                            die("Error: " . mysqli_error($conn));
                          }

                          $index = 0;
                          while ($row = mysqli_fetch_assoc($result)) {

                            $uname = $row["name"];
                            $status = $row["status"];
                            $purpose = $row["purpose"];
                            $location = $row["location"];

                            $dateOut = $row["dateOut"];
                            $timeOut = $row["timeOut"];
                            $index++;
                            if (!empty($Department)) {
                              $sqlDE = "SELECT * FROM empdept WHERE dept_id = $status";
                              include "../db_conn.php";

                              $resultDE = mysqli_query($conn, $sqlDE);
                              if ($resultDE) {
                                $rowDE = mysqli_fetch_assoc($resultDE);
                                $Department2 = $rowDE['name'];
                              } else {
                                $Department2 = "None";
                              }
                            } else {
                              $Department2 = "None";
                            }
                            echo "
                            <tbody>
                            <tr>
                                <td>$index</td>
                                <td>$uname</td>
                                <td>$Department2</td>
                                <td>$purpose</td>
                                <td>$location</td>
                                <td>$dateOut</td>
                                <td>$timeOut</td>
                            </tr>";
                          }


                          ?>
                        </tbody>
                      </table>
                    </div>
                    <script>
                      function checkdelete() {

                        return confirm("Are you sure you want to delete this?");
                      }
                    </script>
                  </form>


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