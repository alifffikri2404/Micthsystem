<?php
require('../../configAsetTPS.php');
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


require('../../../db_conn.php');

if (isset($_POST['submit2'])) {
  $aset_id = $_GET['id'];
  $kategori_aset = $_POST['kategori'];
  $jenis_aset = $_POST['jenis'];
  $no_aset = $_POST['InputNoSiriAwal'];
  $nama_aset = $_POST['nama_aset'];
  $nama_kakitangan = $_POST['nama_kakitangan'];

  $lokasi_jabatan = $_POST['lokasi_jabatan'];
  $sqlOP = "SELECT * FROM empdept
	WHERE name = '$lokasi_jabatan'";
  $resultOP = mysqli_query($conn2, $sqlOP);

  if ($resultOP && mysqli_num_rows($resultOP) > 0) {
    $rowOP = mysqli_fetch_assoc($resultOP);
    $lokasi_jabatan2 = $rowOP['dept_id'];
  }

  $tarikh_lupus = $_POST['tarikh_lupus'];
  $nilai_lupus = $_POST['nilai_harga'];
  $pihak_lupus = $_POST['pihak_lupus'];
  $reason_lupus = $_POST['reason_lupus'];


  $sqlBA = "INSERT INTO disposal_aset (aset_id, kategori_aset, jenis_aset, no_aset, nama_aset, 
    nama_kakitangan, lokasi_jabatan, tarikh_lupus, reason, nilai_lupus, pihak_lupus)
    VALUES ('$aset_id', '$kategori_aset', '$jenis_aset', '$no_aset', '$nama_aset',
    '$nama_kakitangan', '$lokasi_jabatan2', '$tarikh_lupus', '$reason_lupus', '$nilai_lupus', '$pihak_lupus')";
  $resultBA = mysqli_query($conn2, $sqlBA);

  if ($resultBA) {
?>
    <script type="text/javascript">
      alert('Asset disposed data successfully updated!');
      window.location.href = '../tables/laporlupus.php';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('Failed to update disposal data!');
    </script>
<?php
  }
}

if (isset($_POST['btn-cancel'])) {
  header("Location: laporanas.php");
}

date_default_timezone_set("Asia/Bangkok");
$cM = date("m");
$cY = date("Y");
$cDate = date("Y-m-d");


// if(($idp<>'')&&($lvl<>'')){

require('../../functions.php');

if (isset($_POST['view'])) {
  $user_id = $_GET['Internal_Id'];
  $empnumber = $_SESSION['emp_number'];
  $username1 = $_SESSION['user_name'];
  $firstname1 = $_SESSION['First_Name'];
  $lastname = $_SESSION['Last_Name'];
  $department = $_SESSION['Department'];
}

if (empty($_SESSION['First_Name'])) {
  header("Location: ../../iout.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MICTH | IntSys</title> -->

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Disposal Details</title>
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
  .sb {
    box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
    height: 100%;
    width: 100%;
    background-color: white;
    border: 1px solid white;
    overflow: auto;
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
            <img src="../../assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo "Me"; ?></span>
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

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

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
        <a href="../../pages/tables/laporlupus.php" class="active">
          <i class="bi bi-file-earmark-x" style="font-size: 1em; background-color: transparent"></i><span>Disposal Report</span>
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
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="../../../main_user.php">
      <i class="bi bi-reply-fill"></i>
      <span>Home Page</span>
    </a>
  </li>
  
    </ul>
  </aside><!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>View Details</strong></h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
          <li class="breadcrumb-item"><a href="../../homeaset.php">Home Page</a></li>
          <li class="breadcrumb-item"><a href="../../pages/tables/laporlupus.php">Disposal Report</a></li>
          <li class="breadcrumb-item active">Disposal Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php
    if (isset($_GET['id'])) {

      $sqlA_query = "SELECT * FROM disposal_aset
  WHERE aset_id = " . $_GET['id'];

      $result_set = mysqli_query($conn2, $sqlA_query);
      $fetched_row = mysqli_fetch_array($result_set);
    ?>

      <section class="section dashboard">
        <div class="row">
          <!-- Left side columns -->
          <div class="col-lg-20">
            <div class="row">
              <!-- Recent Sales -->
            </div>
          </div>
          <form role="form" action="" method="post">
            <div class="col-12">
              <div class="card top-selling">
                <div class="sb">
                  <div class="card-body">
                    <h5 class="card-title"><strong>ASSET DETAILS</strong><br />

                      <!-- Register new asset disposal field form -->
                      <div class="row" style="margin-top: 10px">
                        <div class="col-md-12">
                          <div class="box-body">
                            <div class="row">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="kategori" style="font-weight: 400; 'Nunito', sans-serif;">Category:</label>
                                  <input type="text" style="text-transform:uppercase; font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="kategori" name="kategori" placeholder="CATEGORY" value="<?php echo $fetched_row['kategori_aset']; ?>" readonly>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;">Asset Type:</label>
                                  <input type="text" style="text-transform:uppercase; font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="jenis" name="jenis" placeholder="ASSET TYPE" value="<?php echo $fetched_row['jenis_aset']; ?>" readonly>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Asset Number:</label>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="InputNoSiriAwal" name="InputNoSiriAwal" placeholder="ASSET NUMBER" value="<?php echo $fetched_row['no_aset']; ?>" readonly>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Asset Name:</label>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="nama_aset" name="nama_aset" placeholder="ASSET NAME" value="<?php echo $fetched_row['nama_aset']; ?>" readonly>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="jenis" style="font-weight: 400; 'Nunito', sans-serif;">Staff Name:</label>
                                  <?php
                                  $nama_kakitangan = $fetched_row['nama_kakitangan'];
                                  if (!empty($nama_kakitangan)) {
                                    $nama_kakitangan2 = $nama_kakitangan;
                                  } else {
                                    $nama_kakitangan2 = "None";
                                  }
                                  ?>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.2; height: 34px" class="form-control" id="nama_kakitangan" name="nama_kakitangan" placeholder="STAFF NAME" value="<?php echo $nama_kakitangan2; ?>" readonly>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Department Location:</label>
                                  <?php
                                  $current_jab = $fetched_row['lokasi_jabatan'];
                                  if (!empty($current_jab)) {
                                    $sqlAB2 = "SELECT * FROM empdept WHERE dept_id = $current_jab";
                                    require('../../../db_conn.php');

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
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.2; height: 34px" class="form-control" id="lokasi_jabatan" name="lokasi_jabatan" placeholder="DEPARTMENT LOCATION" value="<?php echo $lokasi_jabatan2; ?>" readonly>
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

            <div class="col-12 mt-10">
              <div class="card top-selling">
                <div class="sb">
                  <div class="card-body">
                    <h5 class="card-title"><strong>DISPOSAL DETAILS</strong><br />

                      <!-- Register new disposal field form -->
                      <div class="row" style="margin-top: 10px">
                        <div class="col-md-12">
                          <!-- General form elements -->
                          <!-- /.box-header -->
                          <!-- Form start -->
                          <div class="box-body">
                            <div class="row">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400; 'Nunito', sans-serif;">Disposal Date:</label>
                                  <div class="input-group">
                                    <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="tarikh_lupus" name="tarikh_lupus" value="<?php echo $fetched_row['tarikh_lupus']; ?>" readonly>
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Disposal Value:</label>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="nilai_harga" name="nilai_harga" placeholder="VALUE" value="<?php echo 'RM ' . $fetched_row['nilai_lupus']; ?>" readonly>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Person-in-Charge:</label>
                                  <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="pihak_lupus" name="pihak_lupus" placeholder="PIC" value="<?php echo $fetched_row['pihak_lupus']; ?>" readonly>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif;">Reason for Dispose:</label>
                                  <?php
                                  $reason_lupus = $fetched_row['reason'];
                                  if (!empty($reason_lupus)) {
                                    $sqlA4 = "SELECT * FROM disposal_reason WHERE id_reason = $reason_lupus";
                                    $result4 = mysqli_query($conn2, $sqlA4);
                                    if ($result4) {
                                      $row = mysqli_fetch_assoc($result4);
                                      $reason_lupus2 = $row['reason'];
                                    } else {
                                      $reason_lupus2 = "None";
                                    }
                                  } else {
                                    $reason_lupus2 = "None";
                                  }
                                  ?>
                                  <textarea class="form-control" style="font-size: 1.4rem; line-height: 1.8" rows="3" cols="50" id="reason_lupus" name="reason_lupus" placeholder="REASON" readonly><?php echo $reason_lupus2; ?></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="col-md-2"> <!-- Adjust the width of the button column -->
                            <div class="form-group" style="margin-top: 10px">
                              <button type="submit" name="submit" id="submit" class="btn btn-info btn-lg" style="font-size: 15px" onclick="print()">Print</button>
                              <a href="../../tcpdf/laporanPDF/detailsLupuspdf.php?id=<?php echo $fetched_row['aset_id']; ?>" id="printLink" target="_blank" style="display: none;"></a>
                              <script>
                                function print() {
                                  document.getElementById('printLink').click();
                                }
                              </script>
                            </div>
                          </div>
                          <!-- /.box -->
                        </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>

    <?php
    }
    ?>

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


</body>

</html>
<?php
// }else{
// header('Location: index.php'); 
// }
?>