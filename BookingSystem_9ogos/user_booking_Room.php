<?php include('functions.php');

if (empty($_SESSION['First_Name'])) {
  header("Location: iout.php");
  exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
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

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Book Room</title>
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
                  <a class="nav-link collapsed" data-bs-target="#book-vehicle-nav" data-bs-toggle="collapse"
                    href="#" style="padding: 10px 15px 10px 40px" class="active">
                      <i class="bi bi-car-front-fill" style="font-size: 1em"></i></i><span>Book Vehicle</span>
                      <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
                  </a>
                  <ul id="book-vehicle-nav" class="nav-content collapse" data-bs-parent="#booking-system-nav">
                      <li class="nav-item">
                          <a class="nav-link collapsed show" href="user_booking_vehicle.php" style="padding-left: 60px">
                              <i class="bi bi-caret-right-fill"></i></i>
                              <span>Book</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link collapsed show" href="user_record.php" style="padding-left: 60px">
                              <i class="bi bi-caret-right-fill"></i></i>
                              <span>Usage Record</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-target="#book-room-nav" data-bs-toggle="collapse"
                    href="#" style="padding: 10px 15px 10px 40px">
                      <i class="bi bi-door-closed-fill" style="font-size: 1em"></i></i><span>Book Room</span>
                      <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
                  </a>
                  <ul id="book-room-nav" class="nav-content collapse show" data-bs-parent="#booking-system-nav">
                      <li class="nav-item">
                          <a class="active" href="user_booking_Room.php" style="padding-left: 60px">
                              <i class="bi bi-caret-right-fill" style="background-color: transparent"></i></i>
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
      <h1>Book Room</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="user.php">Home Page</a></li>
          <li class="breadcrumb-item active">Book Room</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div id="calendar">
                <?php
                $dateComponents = getdate();
                if (isset($_GET['month']) && isset($_GET['year'])) {
                  $month = $_GET['month'];
                  $year = $_GET['year'];
                } else {
                  $month = $dateComponents['mon'];
                  $year = $dateComponents['year'];
                }
                if (isset($_GET['room'])) {
                  $selectedRoom = $_GET['room'];
                } else {
                  $selectedRoom = 0;
                }


                echo build_calendar_room_user1($month, $year, $selectedRoom);
                ?>

                <script>
                  var toggleButtons = document.querySelectorAll('.toggle-button');

                  toggleButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                      var targetId = button.getAttribute('data-target');
                      var targetTable = document.getElementById(targetId);
                      if (targetTable.style.display === 'none') {
                        targetTable.style.display = 'table';
                      } else {
                        targetTable.style.display = 'none';
                      }
                    });
                  });
                </script>


              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script>
        $("#room_select").change(function() {
          $("#room_select_form").submit();
        });

        $("#room_select option[value='<?php echo $selectedRoom; ?>']").attr('selected', 'selected');
      </script>
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

  <!-- ======= Footer ======= -->

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