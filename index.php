<?php
session_start();
include "db_conn.php";

if (isset($_POST['name']) && isset($_POST['pass'])) {
  global $conn, $errors;
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $uname = mysqli_real_escape_string($conn, validate($_POST['name']));
  $pass = mysqli_real_escape_string($conn, validate($_POST['pass']));

  // Hashing the password
  $pass = hash("MD5", $pass);

  $sql = "SELECT * FROM empmaininfo WHERE Email ='$uname' AND user_password='$pass'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    // Debugging: Print the fetched row

    if (
      isset($row['user_name'], $row['user_password'], $row['Active_Inactive']) &&
      $row['Email'] === $uname &&
      $row['user_password'] === $pass &&
      $row['Active_Inactive'] === "Active"
    ) {


      $_SESSION['id'] = $row['id'];
      $_SESSION['emp_number'] = $row['Internal_Id'];


      $_SESSION['user_name'] = $row['user_name'];

      $_SESSION['First_Name'] = $row['First_Name'];
      $_SESSION['Last_Name'] = $row['Last_Name'];
      $_SESSION['Email'] = $row['Email'];
      $_SESSION['Mobile_phone'] = $row['Mobile_phone'];
      $_SESSION['Job_Title'] = $row['Job_Title'];
      $_SESSION['Employment_Type'] = $row['Employment_Type'];
      $_SESSION['Manager'] = $row['Manager'];
      $_SESSION['Department'] = $row['Department'];

      $_SESSION['func_admin'] = $row['func_admin'];

      $_SESSION['admin_booking'] = $row['admin_booking'];
      $_SESSION['access_isurat'] = $row['access_isurat'];

      $_SESSION['access_imobile'] = $row['access_imobile'];
      $_SESSION['admin_outstation'] = $row['admin_outstation'];
      $_SESSION['admin_surat'] = $row['admin_surat'];
      $_SESSION['access_eoutstation'] = $row['access_eoutstation'];
      $_SESSION['access_aset'] = $row['access_aset'];
      $_SESSION['admin_asset'] = $row['admin_asset'];
      header("Location: main_user.php");
      exit();
    } else {
      $message = "Wrong Password or Inactive User!";
      header("Location: index.php?error=" . urlencode($message));
      exit();
    }
  } else {
    $message = "Wrong Password or Inactive User!";
    header("Location: index.php?error=" . urlencode($message));
  }
}
?>



<!DOCTYPE html>
<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets3/img/apple-icon.png">
  <link rel="icon" type="image/png" href="micthlogo.png">
  <title>
    MICTH Internal System</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets3/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets3/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets3/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets3/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
              MICTH Internal System</a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="https://www.micth.com/">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    micth
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                  <?php
                  if (isset($_GET['error'])) {
                    echo '<p style="color: red;">' . htmlspecialchars($_GET['error']) . '</p>';
                  }
                  ?>
                  <p class="mb-0">Enter your Email and Password to login</p>
                </div>
                <div class="card-body">
                  <form role="form" method="post">
                    <label for="yourUsername" class="form-label">Email</label>
                    <div class="mb-3">
                      <input class="form-control" type="text" name="name" id="name" placeholder="Enter Email">

                    </div>
                    <label for="yourPassword" class="form-label">Password</label>
                    <div class="mb-3">
                      <input type="password" name="pass" class="form-control" id="pass" name="pass" placeholder="Enter Password">

                    </div>

                    <div class="text-center">
                      <button type="submit" name="login_btn" class="btn bg-gradient-info w-100 mt-4 mb-0">Login</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('curved-6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="https://www.micth.com/" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Company
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            About Us
          </a>
          <a href="https://www.micth.com/team-management/" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Team
          </a>
         

        </div>

      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright &copy; <script>
              document.write(new Date().getFullYear())
            </script>
            <strong><span>MICTH SYSTEM</span></strong>. All Rights Reserved
            <br><a>MELAKA ICT HOLDINGS SDN. BHD.</a>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="assets3/js/core/popper.min.js"></script>
  <script src="assets3/js/core/bootstrap.min.js"></script>
  <script src="assets3/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets3/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets3/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>