<?php
require('../../configAsetTPS.php');
session_start();
$idp = $_SESSION['idP'];
$lvl = $_SESSION['lvl'];

$firstname1 = $_SESSION['1stname'];
$lastname = $_SESSION['lastname'];
$empnumber = $_SESSION['empnumber'];
$department = $_SESSION['department'];
$namerole = $_SESSION['namerole'];


//Check role
if($lvl == "1")
{
	$firstname = "Admin";
}
if($lvl <> "1")
{
	$firstname = $firstname1;
}

?>
<?php
					  
	date_default_timezone_set("Asia/Bangkok");
	$cM = date("m");
	$cY = date("Y");
	$cDate = date("Y-m-d");
							
	
if(($idp<>'')&&($lvl<>'')){					  
?>
<!DOCTYPE html>
<html lang = "en">
<head>
  <!-- <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MICTH | IntSys</title> -->

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Disposal Register</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- <meta http-equiv="refresh" content="15"> -->

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Favicons -->
  <link href="../../assets/img/micthlogo.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
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
      <a href="../../homeaset.php" class="logo d-flex align-items-center">
        <img src="../../dist/img/logomicthnew-plain-01.png" alt="MICTH">
        <span class="d-none d-lg-block">Aset</span>
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
            <img src="../../assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $namerole;
					if($namerole<>''){
						echo ": ";
					}else{
						echo " ";
					}
					echo $firstname;?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $namerole;
					if($namerole<>''){
						echo ": ";
					}else{
						echo " ";
					}
					echo $firstname;?></h6>
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
              <a class="dropdown-item d-flex align-items-center" href="../../iout.php">
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

      <!-- Letter System / iSurat -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms2-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-envelope-fill"></i><span>Letter System</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms2-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="homeaset.php">
              <i class="bi bi-house-door-fill" style="font-size: 1em; background-color: transparent"></i><span>Home</span>
            </a>
          </li>
        </ul>
		    <ul id="forms2-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-envelope" style="font-size: 1em"></i><span>Outgoing Letter</span>
            </a>
          </li>
        </ul>
        <ul id="forms2-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-inbox-fill" style="font-size: 1em"></i><span>Incoming Letter (Admin)</span>
            </a>
          </li>
        </ul>
        <ul id="forms2-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-journal-check" style="font-size: 1em"></i><span>Outgoing Letter Record</span>
            </a>
          </li>
        </ul>
        <ul id="forms2-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-journal-plus" style="font-size: 1em"></i><span>Incoming Letter Record</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Asset System / iAset -->
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-briefcase-fill"></i><span>Asset System</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="../../homeaset.php">
              <i class="bi bi-house-door-fill" style="font-size: 1em"></i><span>Home</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="../../pages/forms/dafaset.php">
              <i class="bi bi-pencil-square" style="font-size: 1em"></i><span>Asset Register</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="../../pages/tables/laporanas.php">
              <i class="bi bi-file-earmark-text" style="font-size: 1em"></i><span>Asset Report</span>
            </a>
          </li>
        </ul>
		    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="../../pages/forms/daflupus.php" class="active">
              <i class="bi bi-trash" style="font-size: 1em; background-color: transparent"></i><span>Disposal Register</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="../../pages/tables/laporlupus.php">
              <i class="bi bi-file-earmark-x" style="font-size: 1em"></i><span>Disposal Report</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="../../hometetapan.php">
              <i class="bi bi-gear-fill" style="font-size: 1em; background-color: transparent"></i><span>Settings</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Booking System / iMobile -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms3-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-calendar-check-fill"></i><span>Booking System</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms3-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="homeaset.php">
              <i class="bi bi-house-door-fill" style="font-size: 1em; background-color: transparent"></i><span>Home</span>
            </a>
          </li>
        </ul>
		    <ul id="forms3-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-pencil-square" style="font-size: 1em"></i><span>Book Vehicle (Admin HR)</span>
            </a>
          </li>
        </ul>
        <ul id="forms3-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-car-front-fill" style="font-size: 1em"></i><span>Vehicle</span>
            </a>
          </li>
        </ul>
        <ul id="forms3-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-journal-text" style="font-size: 1em"></i><span>Usage Record</span>
            </a>
          </li>
        </ul>
        <ul id="forms3-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-chat-right-text" style="font-size: 1em"></i><span>Feedback Report</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Outstation System / E-Outstation -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms4-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-door-open-fill"></i><span>E-Outstation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms4-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="homeaset.php">
              <i class="bi bi-house-door-fill" style="font-size: 1em; background-color: transparent"></i><span>Home</span>
            </a>
          </li>
        </ul>
		    <ul id="forms4-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-file-text" style="font-size: 1em"></i><span>My Report</span>
            </a>
          </li>
        </ul>
        <ul id="forms4-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-box-arrow-right" style="font-size: 1em"></i><span>Check-Out</span>
            </a>
          </li>
        </ul>
        <ul id="forms4-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-chat-left-text" style="font-size: 1em"></i><span>View Feedback</span>
            </a>
          </li>
        </ul>
        <ul id="forms4-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-people-fill" style="font-size: 1em"></i><span>Human Resources (HR)</span>
            </a>
          </li>
        </ul>
        <ul id="forms4-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-person-fill" style="font-size: 1em"></i><span>User System (HR)</span>
            </a>
          </li>
        </ul>
        <ul id="forms4-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-gear-fill" style="font-size: 1em"></i><span>Settings</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

  <div class="pagetitle">
    <h1>Register Disposal Record</strong></h1>
    <nav>
      <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
        <li class="breadcrumb-item"><a href="../../homeaset.php">Home Page</a></li>
        <li class="breadcrumb-item active">Disposal Register</li>
      </ol>
    </nav>
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
              <h5 class="card-title"><strong>CHOOSE CATEGORY</strong><br/>

              <!-- category field form -->
              <div class="row"  style="margin-top: 10px">
                <div class="col-md-12">
                  <!-- General form elements -->
                    <!-- /.box-header -->
                    <!-- Form start -->
                    <form role="form" action="" method="post">
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="Kategori" style="font-weight: 400; 'Nunito', sans-serif;">Select Category:</label>
                                <select class="form-select" id="kategori" name="kategori" 
                                  style="font-size: 1.4rem; line-height: 1.0; height: 34px" 
                                  placeholder="CATEGORY NAME">
                                  <?php
                                    $sqlL = "SELECT * FROM kategoritps ORDER BY id_kategori ASC";
                                    $result = mysqli_query($conn2,$sqlL);
                                    $countL = mysqli_num_rows($result);
                                    if($countL > 0)
                                    {
                                      $off = 0;
                                      $i = 1 + $off;
                                      while($rowL = mysqli_fetch_array($result)) {
                                        $selected = isset($_POST['kategori']) && $_POST['kategori'] == $rowL['id_kategori'] ? 'selected' : '';
                                        echo '<option value="' . $rowL['id_kategori'] . '" ' . $selected . '>' . $rowL['nama_kategori'] . '</option>';
                                        $i++;
                                      }
                                    }
                                  ?>
                                </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="col-md-2">
                        <div class="form-group">
                          <button type="submit" name="submit1" id="submit1" class="btn btn-success btn-lg" style="font-size: 15px">Search</button>
                          <button type="submit" name="reset" id="reset" class="btn btn-danger btn-lg" style="font-size: 15px">Reset</button>
                        </div>
                      </div>
                    </form>
                  <!-- /.box -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
// ---------------------------------- IF ELSE STATEMENT TO SUBMIT THE CHOSEN CATEGORY --------------------------
      if (isset($_POST['submit1'])) {
        // Handle the submitted category ID
        $kategori_id = $_POST['kategori'];
      ?>

      <div class="col-12 mt-10">
        <div class="card top-selling">
          <div class="sb">
            <div class="card-body">
              <h5 class="card-title"><strong>CHOOSE ASSET FOR DISPOSAL</strong><br/>

              <!-- asset field form -->
              <div class="row"  style="margin-top: 10px">
                <div class="col-md-12">
                  <!-- General form elements -->
                    <!-- /.box-header -->
                    <!-- Form start -->
                    <form role="form" action="" method="post">
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;">Select Category:</label>
                                <select class="form-select" id="jenis" name="jenis" 
                                  style="text-transform:uppercase; font-size: 1.4rem; line-height: 1.0; height: 34px" 
                                  placeholder="ASSET TYPE NAME">
                                  <?php
                                    $sqlL = "SELECT * FROM jenis_aset
                                      WHERE id_kategori = $kategori_id
                                      ORDER BY jenis_aset ASC";
                                    $result = mysqli_query($conn2,$sqlL);
                                    $countL = mysqli_num_rows($result);
                                    if($countL > 0)
                                    {
                                      $off = 0;
                                      $i = 1 + $off;
                                      while($rowL = mysqli_fetch_array($result)) {
                                        $selected = isset($_POST['jenis_aset']) && $_POST['jenis_aset'] == $rowL['jenis_aset'] ? 'selected' : '';
                                        echo '<option value="' . $rowL['id'] . '" ' . $selected . '>' . $rowL['jenis_aset'] . '</option>';
                                        $i++;
                                      }
                                    }
                                  ?>
                                </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="col-md-2">
                        <div class="form-group">
                          <button type="submit" name="submit1" id="submit1" class="btn btn-success btn-lg" style="font-size: 15px">Search</button>
                          <button type="submit" name="reset" id="reset" class="btn btn-danger btn-lg" style="font-size: 15px">Reset</button>
                        </div>
                      </div>
                    </form>
                  <!-- /.box -->
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      ?>

    </div>
  </section>

  </main><!-- End #main -->

  
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ASSET SYSTEM</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
       <a href="https://www.micth.com//">MELAKA ICT HOLDINGS SDN. BHD.</a>
    </div>
  </footer><!-- End Footer -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>


<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../bower_components/raphael/raphael.min.js"></script>
<script src="../../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>
</html>
<?php
}else{
header('Location: index.php'); 
}
?>