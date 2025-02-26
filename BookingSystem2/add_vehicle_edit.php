<?php 
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: index.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Vehicle</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/igclogo.png" rel="icon">
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style>
.sb{
	box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
	height:100%;
	width:100%;
	background-color: white;
	border: 1px solid grey;
	overflow:auto;
	white-space: nowrap;
	
}
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="admin.php" class="logo d-flex align-items-center">
        <img src="assets/img/igclogo.png" alt="">
        <span class="d-none d-lg-block">I-Mobile</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown">



          

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['user']['user_name']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['user']['user_name']; ?></h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           

            <li>
              <a class="dropdown-item d-flex align-items-center" href="index.php?logout='1'">
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
        <a class="nav-link collapsed" href="admin.php">
          <i class="bi bi-grid"></i>
          <span>Home Page</span>
        </a>
      </li><!-- End Dashboard Nav -->


    

	  
	        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-truck"></i><span>Vehicle</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="list_vehicle.php">
              <i class="bi bi-circle"></i><span>List of Vehicle</span>
            </a>
          </li>
		            <li>
            <a href="add_vehicle.php" class="active">
              <i class="bi bi-circle"></i><span>Add Vehicle</span>
            </a>
          </li>
        </ul>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-folder-fill"></i><span>Usage Record</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
		<ul id="report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="usage_record_calendar.php">
              <i class="bi bi-circle"></i><span>Calendar</span>
            </a>
          </li>
        </ul>
        <ul id="report-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="usage_record_monthly.php">
              <i class="bi bi-circle"></i><span>Record</span>
            </a>
          </li>
        </ul>
      </li>
	  <li class="nav-item">
        <a class="nav-link collapsed" href="feedbackreport.php">
          <i class="bi bi-file-text"></i>
          <span>Feedback Report </span>
        </a>
      </li>
	  <!-- End Tables Nav -->



     

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Vehicle</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home Page</a></li>
          <li class="breadcrumb-item">Vehicle</li>
          <li class="breadcrumb-item active">Add Vehicle</li>
        </ol>
      </nav>
    </div<!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-20">
          <div class="row">



            <!-- Recent Sales -->

  <div class="sb">
            <div class="card-body">
              <h5 class="card-title"><strong>ADD VEHICLE</strong></h5>

<form method="post" action="list_vehicle.php">
			  <?php echo display_error(); ?>
			                  <div class="row mb-3">

                  <div class="col-sm-10">

                  </div>
                </div>
				
						                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">BRAND</label>
                  <div class="col-sm-10">
                    <input name="jenama" type="text" class="form-control" required>
                  </div>
                </div>
				
										                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">MODEL</label>
                  <div class="col-sm-10">
                    <input name="model" type="text" class="form-control" required>
                  </div>
                </div>
				
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">TYPE</label>
                  <div class="col-sm-10">
                    <select name="jenis_kenderaan" class="form-select" aria-label="Default select example" required>
                      <option value="">CHOOSE TYPE</option>
                      <option value="sedan">SEDAN</option>
					  <option value="4x4">4x4</option>
                      <option value="van">VAN</option>
					  <option value="motorcycle">MOTORCYCLE</option>
                    </select>
                  </div>
                </div>
				
														                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">PLAT NUMBER</label>
                  <div class="col-sm-10">
                    <input name="plat_number" type="text" class="form-control" required>
                  </div>
                </div>
				
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">ADD </label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="add_vehicle_btn">ADD</button>
                  </div>
                </div>

              

              </form>
			  
            </div>
          </div>


            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->


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