<?php
session_start();
include "db_conn.php";

$Last_Name = $_SESSION['Last_Name'];
$Email = $_SESSION['Email'];
$Mobile_phone = $_SESSION['Mobile_phone'];
$Job_Title = $_SESSION['Job_Title'];
$Employment_Type = $_SESSION['Employment_Type'];
$Manager = $_SESSION['Manager'];
$Department = $_SESSION['Department'];
$First_Name = $_SESSION['First_Name'];
$fname = $_SESSION['user_name'];
$status = $_SESSION['status'];
$id = $_SESSION['id'];
$uid = $_SESSION['id'];
$emp_number = $_SESSION['emp_number'];


if ($emp_number == 0) {
  header("Location: logout.php");
  exit(); 
}

if (isset($_POST["delete"])) {
  $delete = $_POST['delete'];
  $sql = "DELETE FROM `auditorreport` WHERE id='$delete'";
  $result = mysqli_query($conn, $sql);

  if ($conn->query($sql)) {
    echo "<script>alert('Delete success.')</script>";
  } elseif (!isset($_POST["delete"])) {
    echo "<script>alert('Delete failed. $conn -> $error')</script>";
  }
}
if (isset($_POST["update"])) {
  $_SESSION['updateid'] = $_POST['update'];

  header("Location: checkinHR.php");
  exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
<script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }
    setTimeout(preventBack, 0);
    window.onunload = function () {
        null;
    };
</script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Outstation</title>
  <link href="logomicth.png" rel="icon">
  <link href="logomicth.png" rel="apple-touch-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="" class="nav-link">Human Resources Department Page</a>
        </li>
        <li>

        </li>
      </ul>



      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <form action="" method="POST">
            <button type="submit" href="myreport.php" class="btn btn-info">Main Page</button>
          </form>
        </li>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item">
          <form action="logout.php" method="POST">
            <button type="submit" name="logout_btn" onclick="return checkout()" class="btn btn-danger">Logout</button>
          </form>
          <script>
            function checkout() {

              return confirm("Are you sure you want to exit?");
            }
          </script>
        </li>

        <!-- Messages Dropdown Menu -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-Lightblue elevation-4">
      <!-- Brand Logo -->
      <a class="brand-link">
        <img src="logomicth.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"> OMS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="user.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a class="d-block"> <?php echo strtoupper($First_Name) ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="dash.php" class="nav-link">
                <i class="nav-icon far 	fa fa-home"></i>
                <p>
                  Dashboard
                  <i class="fas fa-angle "></i>
                </p>
              </a>

            </li>
            <li class="nav-item">
              <a href="reporthr.php" class="nav-link">
                <i class="nav-icon far fa fa-calendar"></i>
                <p>
                  <p>My Report</p>
                  <i class="fas fa-angle "></i>
                </p>
              </a>

            </li>
            <li class="nav-item">
              <a href="checkHR.php" class="nav-link">
                <i class="nav-icon far fas fa-pen"></i>
                <p>
                  <p>Check Out</p>
                  <i class="fas fa-angle "></i>
                </p>
              </a>

            </li>
            <li class="nav-item">
              <a href="feedback.php" class="nav-link">
                <i class="nav-icon far  fas fa-clipboard-list"></i>
                <p>
                  Feedback
                  <i class="fas fa-angle "></i>
                </p>
              </a>

            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Human Resources
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <?php
                $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00'";
                $result = mysqli_query($conn, $sql);
                $totalRows = mysqli_num_rows($result);
                ?>


                <li class="nav-item">
                  <a href="SNC.php" class="nav-link">
                    <i class=" nav-icon fas fa-bell"></i>
                    <p> Pending Check-In Staff <span class="float-right badge bg-danger"><?php echo $totalRows ?? 'No data'; ?></span></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Generate Report </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far  fa fa-group"></i>
                <p>
                  User System
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Update
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="editstaffhr.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>current Staff</p>
                      </a>
                    </li>

                  </ul>


                <li class="nav-item">
                  <a href="register.php" class="nav-link">
                    <i class="nav-icon far fas fa-user-plus"></i>
                    <p>Register Staff</p>
                  </a>
                </li>

            </li>

          </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fas fa-cog"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="editprofile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit profile </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="changepass.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change password</p>
                </a>
              </li>



            </ul>
          </li>
          </ul>

        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
      <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
        <div class="nav-item dropdown">
          <a class="nav-link bg-danger dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Close</a>
          <div class="dropdown-menu mt-0">
            <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all">Close All</a>
            <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all-other">Close Other</a>
          </div>
        </div>
        <a class="nav-link bg-light" href="#" data-widget="iframe-scrollleft"><i class="fas fa-angle-double-left"></i></a>
        <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
        <a class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i class="fas fa-angle-double-right"></i></a>
        <a class="nav-link bg-light" href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a>
      </div>
      <div class="tab-content">
        <div class="tab-empty">
          <h1>Welcome to E-Outstation</h1>
          <!-- /.card -->



          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- Control Sidebar -->

      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->

</body>

</html>