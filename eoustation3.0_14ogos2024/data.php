<?php
session_start();
include "db_conn.php";

$fname = $_SESSION['user_name'];

$uid = $_SESSION['id'];
$First_Name = $_SESSION['First_Name'];
$Job_Title = $_SESSION['Job_Title'];

if (isset($_POST["update"])) {
  $_SESSION['updateid'] = $_POST['update'];

  header("Location: checkin.php");
  exit();
}

if (isset($_POST["delete"])) {
  $delete = $_POST['delete'];
  $sql = "DELETE FROM `outstation` WHERE id='$delete'";
  $result = mysqli_query($conn, $sql);

  if ($conn->query($sql)) {
  } else {
    echo "<script>alert('Delete failed. $conn -> $error')</script>";
  }
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

  <title>Generate Report</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

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


        <li class="nav-item dropdown">





        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
              Me </span>
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
          <li class="nav-item">
            <a href="dash.php">
              <i class="bi bi-house-door-fill" style="font-size: 1em"></i><span>Home</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="tablefb.php">
              <i class="bi bi-chat-left-text" style="font-size: 1em"></i><span>View Feedback</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-target="#book-room-nav" data-bs-toggle="collapse"
              href="#" style="padding: 10px 15px 10px 40px" class="active">
                <i class="bi bi-people" style="font-size: 1em"></i></i><span>Human Resources</span>
                <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
            </a>
            <ul id="book-room-nav" class="nav-content collapse show" data-bs-parent="#booking-system-nav">
                <li class="nav-item">
                    <a class="nav-link collapsed show" href="myreport.php" style="padding-left: 60px">
                        <i class="bi bi-caret-right-fill"></i></i>
                        <span>View Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="active" href="data.php" style="padding-left: 60px">
                        <i class="bi bi-caret-right-fill" style="background-color: transparent"></i></i>
                        <span>Generate Report</span>
                    </a>
                </li>
                <?php
                    $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00'";
                    $result = mysqli_query($conn, $sql);
                    $totalRows = mysqli_num_rows($result);
                ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="SNC.php" style="padding-left: 60px">
                        <i class="bi bi-caret-right-fill"></i>
                        <p style="margin-bottom: 0px">Pending Staff Check-In<span class="float-right badge bg-danger">
                            <?php echo $totalRows ?? 'No data'; ?>
                        </span></p>
                    </a>
                </li>
            </ul>
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


  <!-- Content Wrapper -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Generate Report <strong>
        </strong></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dash.php">Home Page</a></li>
          <li class="breadcrumb-item active">Generate Report</li>
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
                  <div class="row">
                    <div class="col-md-4">
                      <br>
                      <form action="" method="get">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="name_filter">Filter by Name:</label>
                              <input type="text" id="name_filter" class="form-control" name="name_filter">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="start_date">Start Date:</label>
                              <input type="date" id="start_date" class="form-control" name="start_date">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="end_date">End Date:</label>
                              <input type="date" id="end_date" class="form-control" name="end_date">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <br>
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Filter</button>
                              <a href="data.php" class="btn btn-danger">Reset</a>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <?php
include 'db_conn.php';

// Initialize variables
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
$name_filter = isset($_GET['name_filter']) ? $_GET['name_filter'] : '';

// Construct the SQL query
$sql = "SELECT * FROM outstation WHERE 1=1";

if (!empty($start_date) && !empty($end_date)) {
    $sql .= " AND (dateOut BETWEEN '$start_date' AND '$end_date' OR dateIn BETWEEN '$start_date' AND '$end_date')";
}

if (!empty($name_filter)) {
    $sql .= " AND name LIKE '%$name_filter%'";
}

$result = mysqli_query($conn, $sql);

$index = 0;
?>
<form method="post">
<table id="datatable2" class="table table-bordered table-striped">
<thead>
            <tr>
                <th rowspan="2">Bil.</th>
                <th rowspan="2">Name</th>
                <th rowspan="2">Emp No.</th>
                <th rowspan="2">Department</th>
                <th rowspan="2">Location</th>
                <th rowspan="2">Purpose</th>
                <th colspan="2">Date/Time</th>
                <th rowspan="2">Action</th>
            </tr>
            <tr>
                <th>Check Out</th>
                <th>Check In</th>
            </tr>
        </thead>
        <tbody>
    <?php
    if ($result) {
        $index = 0; 
        while ($row = mysqli_fetch_array($result)) {
            $index++;
            $id = $row['id'];
            $name = $row["name"];
            $location = $row['location'];
            $purpose = $row['purpose'];
            $dateOut = $row['dateOut'];
            $timeOut = $row['timeOut'];
            $dateIn = $row['dateIn'];
            $timeIn = $row['timeIn'];
            $timeCu = $row['timeCu'];
            $emp_no = $row['emp_no'];
            $dept_id = $row['status']; 
            $timeCuIn = $row['timeCuIn'];

            if (!empty($dept_id)) {
                $sqlDE = "SELECT name FROM empdept WHERE dept_id = $dept_id";
                include "../db_conn.php"; 
                $resultDE = mysqli_query($conn, $sqlDE);
                if ($resultDE) {
                    $rowDE = mysqli_fetch_assoc($resultDE);
                    $Department = $rowDE['name'];
                } else {
                    $Department = "None";
                }
            } else {
                $Department = "None";
            }

            echo "
            <tr>
                <td>$index</td>
                <td>$name</td>
                <td>$emp_no</td>
                <td>$Department</td>
                <td>$location</td>
                <td>$purpose</td>
                <td>$dateOut/$timeOut <br>($timeCu)</td>
                <td>$dateIn/$timeIn <br>($timeCuIn)</td>
                <td><a class='btn btn-primary' href='detailsadmin.php?id=$id' title='Print'>Print</a></td>
            </tr>";
        }
    }
    ?>
</tbody>

    </table>
</form>

                  <form action="tcpdf/laporanPDF/laporanis-inpdf.php" name="form2" method="post" target="_blank">
                    <input type="hidden" id="emp_no" name="emp_no" value="<?php echo $emp_no; ?>">
                    <input type="hidden" id="start_date_hidden" name="start_date_hidden" value="<?php echo $start_date; ?>">
                    <input type="hidden" id="end_date_hidden" name="end_date_hidden" value="<?php echo $end_date; ?>">
                    <button type="submit" class="btn btn-info">Print</button>
                  </form>
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
  $(function() {
    $("#datatable2").DataTable({
      'responsive': true,
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': false
    });
    $("#datatable").DataTable({
      'responsive': true,
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': false
    });
  });

function myFunction() {
  window.print();
}
</script>

<!-- DataTable JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>



</body>

</html>