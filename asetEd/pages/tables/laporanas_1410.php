<?php
require('../../configAsetTPS.php');
// session_start();
// $idp = $_SESSION['idP'];
// $lvl = $_SESSION['lvl'];

// $firstname1 = $_SESSION['1stname'];
// $lastname = $_SESSION['lastname'];
// $empnumber = $_SESSION['empnumber'];
// $department = $_SESSION['department'];
// $namerole = $_SESSION['namerole'];


//Check role
// if($lvl == "1")
// {
// 	$firstname = "Admin";
// }
// if($lvl <> "1")
// {
// 	$firstname = $firstname1;
// }


?>
<?php

date_default_timezone_set("Asia/Bangkok");
$cM = date("m");
$cY = date("Y");
$cDate = date("Y-m-d");

require('../../functions.php');

require('../../../db_conn.php');

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
// if(($idp<>'')&&($lvl<>'')){					  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MICTH | IntSys</title> -->

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
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

  <title>Asset Report</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- <meta http-equiv="refresh" content="15"> -->

  <!-- DataTable CSS  -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.css"> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">


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

  .card-title span {
    color: black;
  }
</style>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- Logo -->
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
            <a href="../../pages/tables/laporanas.php" class="active">
              <i class="bi bi-file-earmark-text" style="font-size: 1em; background-color: transparent"></i><span>Asset Report</span>
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
            <a href="../../pages/forms/uploadcsv.php">
              <i class="bi bi-file-excel" style="font-size: 1em"></i><span>Import Excel</span>
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
      <h1>View Asset Record</strong></h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
          <li class="breadcrumb-item"><a href="../../homeaset.php">Home Page</a></li>
          <li class="breadcrumb-item active">Asset Report</li>
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
            <!-- <div class="sb"> -->
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#asset-list">Asset List</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reg-asset">Registered Asset</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <!-- table for list of asset -->
                <div class="tab-pane fade show active asset-list" id="asset-list">
                  <h5 class="card-title">List of Imported Asset</h5>
                  <div class="row" style="margin-top: 10px">
                    <div class="col-md-12">
                      <div class="box-body">
                        <div class="row">
                          <form action="../../tcpdf/laporanPDF/laporanaspdf.php" name="form2" method="post" target="_blank">

                            <table id="datatable1" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Category</th>
                                  <th>Sub-Category</th>
                                  <th>Model</th>
                                  <th>Asset Number</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                $sqlPP = "SELECT * FROM asset_management_vba";
                                $resultPP = mysqli_query($conn2, $sqlPP);
                                $off = 0;
                                $i = 1 + $off;
                                
                                while ($rowPP = mysqli_fetch_array($resultPP)) {
                                  echo '
                                  <tr role="row" class="odd">
                                    <td data-title="No." align="center">' . strtoupper($i) . '</td>
                                    <td data-title="Category">' . strtoupper($rowPP['Category']) . '</td>
                                    <td data-title="Sub-Category">' . strtoupper($rowPP['Sub_Category']) . '</td>
                                    <td data-title="Model">' . strtoupper($rowPP['Model']) . '</td>	
                                    <td data-title="Asset Number">' . strtoupper($rowPP['Full_ID (Concatenated ID)']) . '</td>
                                    <td align="center" style="white-space: nowrap">
                                      <a href="" title="Update" class="fa fa-pencil"></a>
                                      &nbsp;
                                      <a href="get_asset_data.php?id=' . $rowPP['Full_ID (Concatenated ID)'] . '" title="Info Detail" class="fa fa-info-circle"></a>
                                      &nbsp;
                                      <a href="" title="Disposal" class="fa fa-recycle"></a>
                                    </td>
                                  </tr>';
                                  $i++;
                                }
                              ?>
                              </tbody>
                            </table>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
                <!-- table for registered asset -->
                <div class="tab-pane fade reg-asset" id="reg-asset">
                  <h5 class="card-title">List of Registered Asset</h5>
                  <div class="row" style="margin-top: 10px">
                    <div class="col-md-12">
                      <div class="box-body">
                        <div class="row">
                          <form action="../../tcpdf/laporanPDF/laporanaspdf.php" name="form2" method="post" target="_blank">

                            <table id="datatable2" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Category</th>
                                  <th>Type</th>
                                  <th>Asset Number</th>
                                  <th>Asset Name</th>
                                  <th>Owner</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>

                                <?php
                                $sqlAB = "SELECT * FROM tbl_daftar_aset 
                                  ORDER BY tbl_daftar_aset.id DESC";
                                $resultAB = mysqli_query($conn2, $sqlAB);

                                $off = 0;
                                $i = 1 + $off;
                                while ($rowAB = mysqli_fetch_array($resultAB)) {
                                  $lokasi_jabatan = $rowAB['lokasi_jabatan'];
                                  if (!empty($lokasi_jabatan)) {
                                    $sqlAB2 = "SELECT * FROM empdept WHERE dept_id = $lokasi_jabatan";
                                    require('../../../db_conn.php');

                                    $resultAB2 = mysqli_query($conn, $sqlAB2);

                                    if ($resultAB2) {
                                      $rowAB2 = mysqli_fetch_assoc($resultAB2);
                                      if ($rowAB2) {
                                        $lokasi_jabatan2 = $rowAB2['name'];
                                      } else {
                                        $lokasi_jabatan2 = "None";
                                      }
                                    } else {
                                      $lokasi_jabatan2 = "None";
                                    }
                                  } else {
                                    $lokasi_jabatan2 = "None";
                                  }

                                  $status_aset = $rowAB['status_aset'];

                                  $statusStyle = 'color: green; font-weight: bold;';
                                  $disabled = '';

                                  if ($status_aset == 'Inactive') {
                                    $statusStyle = 'color: red; font-weight: bold;';
                                    $disabled = 'pointer-events: none; opacity: 0.35; ';
                                  }

                                  echo '
                                    <tr role="row" class="odd">
                                    <td data-title="No." align="center">' . strtoupper($i) . '</td>
                                    <td data-title="Type">' . strtoupper($rowAB['kategori_aset']) . '</td>
                                    <td data-title="Type">' . strtoupper($rowAB['jenis_aset']) . '</td>
                                    <td data-title="Asset Number">' . strtoupper($rowAB['no_aset']) . '</td>
                                    <td data-title="Asset Name">' . strtoupper($rowAB['nama_aset']) . '</td>	
                                    <td data-title="Owner" >' . strtoupper($rowAB['nama_kakitangan']) . '</td>
                                    <td data-title="Status" style="' . $statusStyle . '">' . strtoupper($status_aset) . '</td>

                                    <td align="center" style="white-space: nowrap">
                                    <a href="../forms/dafasetKemaskini.php?id=' . $rowAB['id'] . '"  title="Update" class="fa fa-pencil" style="' . $disabled . '"></a>
                                    &nbsp;
                                    <a href="details.php?id=' . $rowAB['id'] . '"  title="Info Detail" class="fa fa-info-circle"></a>
                                    &nbsp;
                                    <a href="log.php?id=' . $rowAB['id'] . '"  title="History Log" class="fa fa-file-text-o"></a>
                                    &nbsp;
                                    <a href="daflupusSemasa.php?id=' . $rowAB['id'] . '"  title="Disposal" class="fa fa-recycle" style="' . $disabled . '"></a>
                                    &nbsp;
                                    <a href="padamaset.php?id=' . $rowAB['id'] . '"  title="Delete" class="fa fa-trash-o" onclick="return ConfirmDelete();" style="' . $disabled . '"></a>
                                    </td>
                                    </tr>
                                    ';

                                  $i++;
                                }

                                ?>

                              </tbody>
                            </table>

                          </form>
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
  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <!-- <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
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

  <!-- DataTable JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script> -->

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

  <!-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script> -->

  <!-- <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script> -->

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <!-- <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script> -->
  <script src="../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

  <!-- page script -->
  <!-- <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script> -->

  <script>
    $(document).ready(function() {
      $('#datatable1').DataTable({
        'responsive': true,
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        layout: {
          topStart: {
            buttons: ['print']
          }
        }
      });
      $('#datatable2').DataTable({
        'responsive': true,
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        layout: {
          topStart: {
            buttons: ['print']
          }
        }
        });
    });
  </script>
  

</body>

</html>
