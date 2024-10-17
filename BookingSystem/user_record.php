<?php
include('functions.php');

if (empty($_SESSION['First_Name'])) {
  header("Location: iout.php");
  exit();
}

if (isset($_POST['submit3'])) {
  $id = $_POST['id'];
  header("Location: detailsuser.php?id=$id");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vehicle Record</title>
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
        <a class="nav-link" data-bs-target="#booking-system-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-calendar-check-fill"></i><span>Booking System</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="booking-system-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li class="nav-item">
            <a href="user.php">
              <i class="bi bi-house-door-fill" style="font-size: 1em"></i>
              <span>Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-target="#book-vehicle-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px" class="active">
              <i class="bi bi-car-front-fill" style="font-size: 1em"></i></i><span>Book Vehicle</span>
              <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
            </a>
            <ul id="book-vehicle-nav" class="nav-content collapse show" data-bs-parent="#booking-system-nav">
              <li class="nav-item">
                <a class="nav-link collapsed show" href="user_booking_vehicle.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Book</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="active" href="user_record.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill" style="background-color: transparent"></i></i>
                  <span>Usage Record</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#book-room-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
              <i class="bi bi-door-closed-fill" style="font-size: 1em"></i></i><span>Book Room</span>
              <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
            </a>
            <ul id="book-room-nav" class="nav-content collapse " data-bs-parent="#booking-system-nav">
              <li class="nav-item">
                <a class="nav-link collapsed" href="user_booking_Room.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Book</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="user_record_Room.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Usage Record</span>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="feedback.php">
              <i class="bi bi-chat-right-text-fill" style="font-size: 1em"></i></i>
              <span>Feedback</span>
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
      <h1>Vehicle Usage Record</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="user.php">Home Page</a></li>
          <li class="breadcrumb-item active">Vehicle Record</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-20">
          <div class="row">



            <!-- Recent Sales -->

            <div class="sb">
              <div class="card-body">
                <br>

                <h5 class="card-title"><strong>REPORT</strong></h5>

                <!-- Default Table -->

                <form method="post">
                  <table class="table" id="DataTable">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID.</th>
                        <th scope="col">STAFF/DRIVER NAME</th>
                        <th scope="col">DATE OF BOOKING/TIME</th>
                        <th scope="col">VEHICLE</th>

                        <th scope="col">DATE USE</th>
                        <th scope="col">STATUS</th>
                      </tr>
                    </thead>
                    <tbody>
  <?php
  include "db_conn.php"; // Include database connection file
  $id = $_SESSION['emp_number'] ?? ''; // Using null coalescing operator to handle unset session variable

  // Check if the session variable is set and not empty
  if (!empty($id)) {
    // Add ORDER BY clause to sort by id in descending order
    $sql = "SELECT * FROM management WHERE user_id = '$id' ORDER BY id DESC";
    $result = $db->query($sql);

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
  ?>
        <tr>
          <td>
            <!-- Form to submit the row ID -->
            <form method="post">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit" name="submit3" class="btn btn-primary" title="Details">
                <?php echo $row['id']; ?>
              </button>
            </form>
          </td>
          <td><?php echo $row["user_name"]; ?></td>
          <td><?php echo $row["date"] . " / " . $row["currenttime"]; ?></td>
          <?php
    $VEHICLE = $row["vehicle_id"];
    $sqlMN = "SELECT * FROM hrm_vehicle WHERE id = $VEHICLE";
    $resultMN = $db->query($sqlMN);

    if ($resultMN) {
      $rowMN = $resultMN->fetch_assoc();
      $plat_number = $rowMN['plat_number'];
      $model = $rowMN['model'];

    } else {
     
    }
    ?>
    <td><?php echo $model . ' ' . $plat_number; ?></td>
          <td><?php echo $row["start_date"]; ?></td>
          <td><?php echo $row["status"]; ?></td>
        </tr>
  <?php
      }
    } else {
      echo "<tr><td colspan='6'>NO RECORD</td></tr>"; // Adjust column span to 6 if necessary
    }
  } else {
    echo "<tr><td colspan='6'>Session variable 'emp_number' not set.</td></tr>"; // Adjust column span to 6 if necessary
  }
  ?>
</tbody>





                  </table>
                  <br>
                  <form action="tcpdf/laporanPDF/laporanis-inpdf_uservehicle.php" name="form2" method="post" target="_blank">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" class="btn btn-info">Print</button>
                  </form>
                  <br>
                  <br>
                </form>

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

</body>

</html>