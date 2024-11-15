<?php
require('../../configAsetTPS.php');
require('../../../db_conn.php');

// require('../../config.php');
// session_start();
// $idp = $_SESSION['idP'];
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

if(isset($_POST['submitB']))
{
  $kategori_aset = $_POST['kategori'];
  $sqlOA = "SELECT * FROM kategoritps 
  WHERE id_kategori = '$kategori_aset'";
	$resultOA = mysqli_query($conn2, $sqlOA);
  if ($resultOA && mysqli_num_rows($resultOA) > 0) {
    $rowOA = mysqli_fetch_assoc($resultOA);
    $kategori_aset2 = $rowOA['nama_kategori'];
	}

  $jenis_aset = $_POST['jenis'];
  $nama_kakitangan = $_POST['nama_kakitangan'];
  
  $lokasi_jabatan = $_POST['lokasi_jabatan'];
  $sqlOP = "SELECT * FROM empdept
	WHERE name = '$lokasi_jabatan'";
	$resultOP = mysqli_query($conn, $sqlOP);

  if ($resultOP && mysqli_num_rows($resultOP) > 0) {
    $rowOP = mysqli_fetch_assoc($resultOP);
    $lokasi_jabatan2 = $rowOP['dept_id'];
	}

  $tarikh_request = $_POST['tarikh_request'];
  $reason_req = $_POST['reason_req'];
  $status_req = 'Processing';

  $sqlOO = "INSERT INTO req_aset (kategori_aset, jenis_aset, nama_kakitangan, lokasi_jabatan, tarikh_request, reason_request, status_req)
    VALUES ('$kategori_aset2', '$jenis_aset', '$nama_kakitangan', '$lokasi_jabatan', '$tarikh_request', '$reason_req', '$status_req')";
  $resultOO = mysqli_query($conn2, $sqlOO);

  if($resultOO){
?>
  <script type="text/javascript">
    alert('Your asset request has been submitted successfully!');
    window.location.href = '../tables/adminregaset.php';
  </script>
<?php
  } else {
?>
  <script type="text/javascript">
    alert('Failed to request new asset!');
  </script>
<?php
  }
}

if(isset($_POST['btn-cancel']))
{
  header("Location: adminreqaset.php");
}

	date_default_timezone_set("Asia/Bangkok");
	$cM = date("m");
	$cY = date("Y");
	$cDate = date("Y-m-d");
							
	
// if(($idp<>'')&&($lvl<>'')){

  require('../../functions.php'); 

 
 if(isset($_POST['view'])){
  $user_id = $_GET['Internal_Id'];
  $empnumber = $_SESSION['emp_number'];
  $username1 = $_SESSION['user_name'];
  $firstname1 = $_SESSION['First_Name'];
  $lastname = $_SESSION['Last_Name'];
  $department = $_SESSION['Department'];
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

  <title>Request New Asset</title>
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

    <div class="d-flex align-items-center justify-content-between">
      <a href="../../../main_user.php" class="logo d-flex align-items-center">
        <img src="../../../logomicth.png" alt="">
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
          <button class="btn btn-primary rounded-pill" onclick="window.location.href='../../../main_user.php'">Master Page</button>
            
            &nbsp;&nbsp;&nbsp;
            <img src="../../assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo "Me";?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['user_name'];?></h6>
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



  <!-- Asset System / iAset -->
  <li class="nav-item">
    <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-briefcase-fill"></i><span>Asset System</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>

    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../homeaset.php" >
          <i class="bi bi-house-door-fill" style="font-size: 1em; background-color: transparent"></i><span>Home</span>
        </a>
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../pages/forms/dafaset.php" >
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
        <a href="../../pages/tables/laporlupus.php">
          <i class="bi bi-file-earmark-x" style="font-size: 1em"></i><span>Disposal Report</span>
        </a>
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../pages/tables/staffrequest.php">
          <i class="bi bi-card-checklist" style="font-size: 1em"></i><span>Staff Request</span>
        </a>
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../hometetapan.php">
          <i class="bi bi-gear-fill" style="font-size: 1em"></i><span>Settings</span>
        </a>
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../pages/tables/adminregaset.php">
          <i class="bi bi-archive-fill" style="font-size: 1em"></i><span>Registered Asset</span>
        </a>
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="../../pages/forms/adminreqaset.php">
          <i class="bi bi-clipboard2-check-fill" style="font-size: 1em"></i><span>Request Asset</span>
        </a>
      </li>
    </ul>
    
  </li>

  


</ul>
</aside><!-- End Sidebar-->

  <main id="main" class="main">

  <div class="pagetitle">
    <h1>Request New Asset</strong></h1>
    <nav>
      <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
        <li class="breadcrumb-item"><a href="../../homeaset.php">Home Page</a></li>
        <li class="breadcrumb-item active">Request Asset</li>
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
      <form id="form1" role="form" action="" method="post">

        <div class="col-12 mt-10">
          <div class="card top-selling">
            <div class="sb">
              <div class="card-body">
                <h5 class="card-title"><strong>STAFF DETAILS</strong><br/>

                <!-- View staff details field form -->
                <div class="row"  style="margin-top: 10px">
                  <div class="col-md-12">
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;">Staff Name:</label>
                              <?php
                                $firstname = $_SESSION['First_Name'];
                                $lastname = $_SESSION['Last_Name'];
                                $fullname = $firstname . " " . $lastname;
                              ?>
                              <input type="text" style="font-size: 1.4rem; line-height: 1.2; height: 34px"
                                class="form-control" id="nama_kakitangan" name="nama_kakitangan" placeholder="STAFF NAME"
                                value="<?php echo $fullname; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Department Location:</label>
                              <?php
                                $staffID = $_SESSION['emp_number'];
                                
                                $sqlB = "SELECT * FROM `empmaininfo` WHERE Internal_Id = $staffID";
                                require('../../../db_conn.php');

                                $resultB = mysqli_query($conn, $sqlB);
                                $fetched_row = mysqli_fetch_array($resultB);

                                $current_jab = $fetched_row['Department'];
                                if (!empty($current_jab)) {
                                  $sqlAB2 = "SELECT * FROM empdept WHERE dept_id = $current_jab";
                                  
                                  $result19 = mysqli_query($conn, $sqlAB2);
                                  if ($result19) {
                                      $row = mysqli_fetch_assoc($result19);
                                      $lokasi_jabatan2 = $row['name'];
                                  } else {
                                    $lokasi_jabatan2 = "None";
                                  }
                                } else {
                                  $lokasi_jabatan2 = "None";
                                }
                                ?>
                              <input type="text" style="font-size: 1.4rem; line-height: 1.2; height: 34px"
                                  class="form-control" id="lokasi_jabatan" name="lokasi_jabatan" placeholder="DEPARTMENT LOCATION"
                                  value="<?php echo $lokasi_jabatan2; ?>" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card top-selling">
            <div class="sb">
              <div class="card-body">
                <h5 class="card-title"><strong>REQUEST DETAILS</strong><br/>

                <!-- Register new asset request field form -->
                <div class="row"  style="margin-top: 10px">
                  <div class="col-md-12">
                  
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-5">
                          <form id="form2" role="form" action="" method="post">
                            <div class="form-group">
                              <label for="Kategori" style="font-weight: 400; 'Nunito', sans-serif;">Category:</label>
                              <div class="d-flex align-items-center">
                                <select class="form-select flex-grow-1 me-3" id="kategori" name="kategori" 
                                  style="font-size: 1.4rem; line-height: 1.0; height: 34px" placeholder="CATEGORY NAME"
                                  <?php echo isset($_POST['submitA']) ? 'disabled' : ''; ?>>
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
                                <button type="submit" name="submitA" id="submitA" class="btn btn-info btn-lg" style="font-size: 15px">Select</button>
                              </div>
                            </div>
                          </form>
                        </div>

                        <?php
// ---------------------------------- IF ELSE STATEMENT TO SUBMIT THE CHOSEN CATEGORY --------------------------
                        if (isset($_POST['submitA'])) {
                          // Handle the submitted category ID
                          $kategori_id = $_POST['kategori'];
                          echo '<script>document.getElementById("kategori").setAttribute("readonly", "readonly");</script>';
                        ?>
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;">Asset Type:</label>
                                <select type="text" style="text-transform:uppercase; font-size: 1.4rem; line-height: 1.0; height: 34px"
                                  class="form-select" id="jenis" name="jenis" placeholder="ASSET TYPE" required>
                                  <option value='-'>PLEASE SELECT ASSET TYPE</option>
                                    <?php
                                      $sqlL = "SELECT * FROM jenis_aset
                                      WHERE id_kategori = $kategori_id
                                      ORDER BY jenis_aset ASC";
                                      $result2 = mysqli_query($conn2, $sqlL);
                                      $countL = mysqli_num_rows($result2);
                                      if ($countL > 0) {
                                        $off = 0;
                                        $i = 1 + $off;
                                        while ($rowL = mysqli_fetch_array($result2)) {
                                          echo '
                                          <option>' . $rowL['jenis_aset'] . '</option>							
                                          ';
                                          $i++;
                                        }
                                      }
                                    ?>
                                </select>
                                
                            </div>
                          </div>


                        <!-- <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Justification:</label>
                              <textarea class="form-control" style="font-size: 1.4rem; line-height: 1.8"
                                rows="3" cols="50" id="reason_req" name="reason_req" placeholder="PURPOSE OF REQUESTING NEW ASSET" required></textarea>
                            </div>
                        </div> -->
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Justification:</label>
                              <br>
                                <input class="form-check-input" id="reason_req" name="reason_req" value="1" type="radio"> 
                                <label class="form-check-label" for="reason_req" style="font-weight: 500; font-size: 1.6rem">Asset Replacement</label>
                              <br>
                                <input class="form-check-input" id="reason_req" name="reason_req" value="2" type="radio"> 
                                <label class="form-check-label" for="reason_req" style="font-weight: 500; font-size: 1.6rem">Event Requirement</label>
                              <br>
                                <input class="form-check-input" id="reason_req" name="reason_req" value="3" type="radio">
                                <label class="form-check-label" for="reason_req" style="font-weight: 500; font-size: 1.6rem">Departmental Use</label>
                            </div>
                        </div>

                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputEmail1" style="font-weight: 400; 'Nunito', sans-serif;">Request Date:</label>
                            <div class="input-group">
                              <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                class="form-control" id="tarikh_request" name="tarikh_request" value="<?php echo date("Y-m-d"); ?>" readonly>
                              <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                            </div>
                          </div>
                        </div>
                        
                        <!-- hidden kategori field for posting to database -->
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;"> </label>
                              <input type="hidden" style="font-size: 1.4rem; line-height: 1.2; height: 34px"
                                class="form-control" id="kategori" name="kategori" value="<?php echo $kategori_id ?>" readonly/>
                          </div>
                        </div>



                      </div>
                    </div>
                  </div>
                </div>

                <!-- /.box-body -->
                <div class="col-md-2" style="margin-bottom: 20px">
                  <div class="form-group">
                    <button type="submit" name="submitB" id="submitB" class="btn btn-success btn-lg" style="font-size: 15px">Request</button>
                    <button type="submit" name="reset" id="reset" class="btn btn-danger btn-lg" style="font-size: 15px">Reset</button>
                  </div>
                </div>
                
                <?php
                        }
                        ?>

              </div>
            </div>
          </div>
        </div>
        
      </form>
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
<!-- jQuery UI Datepicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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

  <script>
    $(function() {
      $("#tarikh_request").datepicker({
        dateFormat: 'yy-mm-dd',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        autoclose: true
      });
    });
  </script>

</body>
</html>
<?php
// }else{
// header('Location: index.php'); 
// }
?>