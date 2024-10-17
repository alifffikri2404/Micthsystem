<?php
//require('configip.php');
// session_start();
// $idp = $_SESSION['name'];
// $lvl = $_SESSION['lvl'];

// $firstname1 = $_SESSION['1stname'];
// $lastname = $_SESSION['lastname'];
// $empnumber = $_SESSION['empnumber'];
// $department = $_SESSION['department'];
// $namerole = $_SESSION['namerole'];


// //Check role
// if($lvl == "1")
// {
// 	$firstname = "Admin";
// }
// if($lvl <> "1")
// {
// 	$firstname = $firstname1;
// }
					  
// 	date_default_timezone_set("Asia/Bangkok");
// 	$cM = date("m");
// 	$cY = date("Y");
// 	$cDate = date("Y-m-d");
							
	
// if(($idp<>'')&&($lvl<>'')){
  include('functions.php'); 

 if(isset($_POST['view'])){
  $user_id = $_GET['Internal_Id'];
  $empnumber = $_SESSION['emp_number'];
  $username1 = $_SESSION['user_name'];
  $firstname1 = $_SESSION['First_Name'];
  $lastname = $_SESSION['Last_Name'];
  $department = $_SESSION['Department'];
 } 

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

  <title>Asset System [Admin]</title>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo "Me";?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['First_Name'];?></h6>
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

    

      <!-- Asset System / iAset -->
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-briefcase-fill"></i><span>Asset System</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="homeaset.php" class="active">
              <i class="bi bi-house-door-fill" style="font-size: 1em; background-color: transparent"></i><span>Home</span>
            </a>
          </li>
        </ul>
		    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="pages/forms/dafaset.php">
              <i class="bi bi-pencil-square" style="font-size: 1em"></i><span>Asset Register</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="pages/tables/laporanas.php">
              <i class="bi bi-file-earmark-text" style="font-size: 1em"></i><span>Asset Report</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="pages/tables/laporlupus.php">
              <i class="bi bi-file-earmark-x" style="font-size: 1em"></i><span>Disposal Report</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="pages/tables/staffrequest.php">
              <i class="bi bi-card-checklist" style="font-size: 1em"></i><span>Staff Request</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="pages/forms/uploadcsv.php">
              <i class="bi bi-file-excel" style="font-size: 1em"></i><span>Import Excel</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="hometetapan.php">
              <i class="bi bi-gear-fill" style="font-size: 1em"></i><span>Settings</span>
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
    <h1>Home Page</h1>
  </div><!-- End Page Title -->

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
              <h5 class="card-title"><strong>DASHBOARD</strong><br/>
              <!-- daftar aset -->
              <div class="col-lg-3 col-xs-6" style="padding-left: 0px">
                <!-- small box -->
                <div class="small-box" style="margin-top: 20px; border-radius: 20px 20px;
                  background-color: #567189; color: #fff">
                  <div class="inner">
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 32px;">Asset Register</h3>
                  </div>
                  <div class="icon">
                    <i class="bi bi-pencil-square" style="font-size: 0.75em"></i>
                  </div>
                  <a href="pages/forms/dafaset.php" class="small-box-footer" style="background-color: transparent; padding: 10px">Register New Asset <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- laporan aset -->
              <div class="col-lg-3 col-xs-6" style="padding-left: 0px">
                <!-- small box -->
                <div class="small-box" style="margin-top: 20px; border-radius: 20px 20px; 
                  background-color: #8B7E74; color: #fff">
                  <div class="inner">
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 32px;">Asset Report</h3>
                  </div>
                  <div class="icon">
                    <i class="bi bi-file-earmark-text" style="font-size: 0.75em"></i>
                  </div>
                  <a href="pages/tables/laporanas.php" class="small-box-footer" style="background-color: transparent; padding: 10px">View Asset Record <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <!-- laporan lupus -->
              <div class="col-lg-3 col-xs-6" style="padding-left: 0px">
                <!-- small box -->
                <div class="small-box" style="margin-top: 20px; border-radius: 20px 20px;
                  background-color: #5B8A72; color: #fff">
                  <div class="inner">
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 32px;">Disposal Report</h3>
                  </div>
                  <div class="icon">
                    <i class="bi bi-file-earmark-x" style="font-size: 0.75em"></i>
                  </div>
                  <a href="pages/tables/laporlupus.php" class="small-box-footer" style="background-color: transparent; padding: 10px">View Disposal Record <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <!-- asset request from staff -->
              <div class="col-lg-3 col-xs-6" style="padding-left: 0px">
                <!-- small box -->
                <div class="small-box" style="margin-top: 20px; border-radius: 20px 20px;
                  background-color: #AE445A; color: #fff">
                  <div class="inner">
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 32px;">Staff Request</h3>
                  </div>
                  <div class="icon">
                    <i class="bi bi-card-checklist" style="font-size: 0.75em"></i>
                  </div>
                  <a href="pages/tables/staffrequest.php" class="small-box-footer" style="background-color: transparent; padding: 10px">View Staff Request <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-xs-6" style="padding-left: 0px">
                <!-- small box -->
                <div class="small-box" style="margin-top: 20px; border-radius: 20px 20px;
                  background-color: #D4BDAC; color: #fff">
                  <div class="inner">
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 32px;">Barcode Scanner</h3>
                  </div>
                  <div class="icon">
                    <i class="bi bi-upc-scan" style="font-size: 0.75em"></i>
                  </div>
                  <a href="barcode.php" class="small-box-footer" style="background-color: transparent; padding: 10px">Scan Barcode <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-xs-6" style="padding-left: 0px">
                <!-- small box -->
                <div class="small-box" style="margin-top: 20px; border-radius: 20px 20px;
                  background-color: #987D9A; color: #fff">
                  <div class="inner">
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 32px;">Import Excel</h3>
                  </div>
                  <div class="icon">
                    <i class="bi bi-file-excel" style="font-size: 0.75em"></i>
                  </div>
                  <a href="pages/forms/uploadcsv.php" class="small-box-footer" style="background-color: transparent; padding: 10px">Import CSV File <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- settings -->
              <div class="col-lg-3 col-xs-6" style="padding-left: 0px">
                <!-- small box -->
                <div class="small-box" style="margin-top: 20px; border-radius: 20px 20px;
                  background-color: #9E6F21; color: #fff">
                  <div class="inner">
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 32px;">Settings</h3>
                  </div>
                  <div class="icon">
                    <i class="bi bi-gear" style="font-size: 0.75em"></i>
                  </div>
                  <a href="hometetapan.php" class="small-box-footer" style="background-color: transparent; padding: 10px">Settings <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
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


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>


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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

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
<?php
// }else{
// header('Location: index.php'); 
// }
?>