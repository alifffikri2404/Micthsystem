<?php
session_start();
include "db_conn.php";

$fname = $_SESSION['user_name'];

$uid = $_SESSION['id'];
$First_Name = $_SESSION['First_Name'];

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

    <title>Report Details</title>
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
            <a href="dash.php" class="logo d-flex align-items-center">
                <img src="../logomicth.png" alt=""> <span class="d-none d-lg-block">MICTH System</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
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

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Report Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dash.php">Home Page</a></li>
                    <li class="breadcrumb-item"><a href="data.php">Generate Report</a></li>
                    <li class="breadcrumb-item active">Report Details</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="card">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if (isset($_GET['id'])) {

                                $sqlA_query = "SELECT * 
        FROM outstation where id =" . $_GET['id'];

                                $result_set = mysqli_query($conn, $sqlA_query);
                                $fetched_row = mysqli_fetch_array($result_set);

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

                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">NAME:</label>
                                                                    <input type="text" class="form-control" id="tarikh_daftar" name="tarikh_daftar" value="<?php echo $fetched_row['name']; ?>" readonly>
                                                                </div>
                                                            </div>

                                                            <!-- Nama Kakitangan -->
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">EMPLOYEE.NO:</label>
                                                                    <!--<div class="col-md-2">-->
                                                                    <input type="text" name="nama_kakitangan" placeholder="Nama Kakitangan" value="<?php echo $fetched_row['emp_no']; ?>" class="form-control" readonly />
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
                                                                    <input type="text" name="jenis_aset" style="text-transform:uppercase" placeholder="Jenis" value="<?php echo $fetched_row['location']; ?>" class="form-control" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <br>
                                                        <!-- Warna -->




                                                        <a href="tcpdf/laporanPDF/laporanasdetailpdf.php?id=<?php echo $fetched_row['id']; ?>" target='_blank' class="btn btn-primary">Print</a>

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






            <!-- /.row -->
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
</body>

</html>