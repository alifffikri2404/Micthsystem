<?php
 include('functions.php'); 
 if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: index.php');
}

if(isset($_POST['view'])){
  $user_id = $_GET['Internal_Id'];    

echo "ok boleh view";
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

  <title>Home Page</title>
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
        <span class="d-none d-lg-block">Letter System</span>
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
            <span class="d-none d-md-block dropdown-toggle ps-2">Me</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php 
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

    <ul class="sidebar-nav active" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-briefcase-fill"></i><span>Letter System</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="7daftarsuratkeluar.php" class="active">
              <i class="bi bi-pencil-square" style="font-size: 1em; background-color: transparent"></i><span>Register Out</span>
            </a>
          </li>
        </ul>
		    <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="7rekodsuratkeluar.php">
              <i class="bi bi-file-earmark-text" style="font-size: 1em"></i><span>Out Record</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="7daftarsuratmasuk.php">
              <i class="bi bi-pencil-square" style="font-size: 1em"></i><span>Register In</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="7rekodsuratmasuk.php">
              <i class="bi bi-file-earmark-text" style="font-size: 1em"></i><span>In Record</span>
            </a>
          </li>
        </ul>
      </li>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

  <div class="pagetitle">
    <h1>Out Letter Record</strong></h1>
    <nav>
      <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
        <li class="breadcrumb-item"><a href="../../homeaset.php">Home Page</a></li>
        <li class="breadcrumb-item active">Out Letter Record</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

<!-----------------------------------------------------------------------INSERT REKOD--------------------------------------------------------------------------------------------->
<style>
  /* CSS for adjusting table layout and text wrapping */
  #example1 {
    table-layout: fixed; /* Force the table to have fixed layout */
    width: 100%; /* Set the table width to 100% of its container */
  }

  #example1 th,
  #example1 td {
    white-space: normal; /* Allow text to wrap into multiple lines */
    word-wrap: break-word; /* Break long words to prevent overflow */
    padding: 8px; /* Adjust the cell padding */
    font-size: 14px; /* Adjust the font size */
  }
</style>
    <section>
      <div class="col-12 mt-10">
        <div class="card top-selling">
          <div class="sb">
          <div class="card-body">
            <h5 class="card-title"><strong>OUT LETTER RECORD</strong><br/>

            <!-- View register asset type record field form -->
            <div class="row">
              <div class="box-header with-border">
                <div class="col-md-12">
                  <!-- /.box-header -->
                  <div class="box-body" style="margin-top: 10px">
                      <?php
                      //$sqlAP = mysql_query("SELECT * FROM jenis_aset ORDER BY id ASC");
                      if ($lvl == "1") {
                        $sqlAP = "SELECT * FROM dbsurat.tbl_surat_out_all ORDER BY tarikh_surat ASC";
                      } else {
                      $sqlAP = "SELECT * FROM dbsurat.tbl_surat_out_all  
                                WHERE department_pemohon = '$department' OR nama_pemohon = '$firstname1'
                                ORDER BY tarikh_surat ASC";
                      }
                      $resultAP = mysqli_query($conn2, $sqlAP);
                      $rowYear = mysqli_fetch_array($resultAP);
                      $tarikhsurat = $rowYear['tarikh_surat'];
                      $tarikhsuratY = date("Y", strtotime($tarikhsurat));
                      if ($resultAP !== false && mysqli_num_rows($resultAP) > 0) {
                      ?>
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Bil: activate to sort column ascending" style="width: 150px;text-align:center">No.
                                <i class="fa fa-sort-amount-desc"></i>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 150px;text-align:center">Date
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center">Letter Ref No.
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 150px;text-align:center">Sender
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 150px;text-align:center">Recipent
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center">Title
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 150px;text-align:center">Delivery Method
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center">Remarks
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th style="width:150px;text-align:center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $off = 0;
                              $i = 1 + $off;
                              while($rowAP = mysqli_fetch_array($resultAP)) {
                              echo '
                                <tr>
                                  <td data-title="Bil" style="text-align:center">'.$i.'</td>
                                  <td data-title="Date" >'.$rowAP['tarikh_surat'].'</td>
                                  <td data-title="Date" >'.$rowAP['no_ruj_surat'].'</td>
                                  <td data-title="Date" >'.$rowAP['nama_pemohon'].'</td>
                                  <td data-title="Date" >'.$rowAP['nama_penerima'].'</td>
                                  <td data-title="Date" >'.$rowAP['tajuk_surat'].'</td>
                                  <td data-title="Date" >'.$rowAP['kaedah_penghantaran'].'</td>
                                  <td data-title="Date" >'.$rowAP['remarks'].'</td>
                                  <td data-title="Kemaskini" style="text-align:center"><a href="7actionrekodkeluar.php?id='.$rowAP['id'].'"><i class="fa fa-pencil"></i></a></td> 
                                </tr>';
                              $i++;
                              }
                              ?>
                          </tbody>
                        </table>
                      <?php
                        }else{
                          echo '<span>No record found for the requested asset number.</span>';
                        }
                      ?>
                      <td width="25%"><input class="btn btn-success btn-lg" type="submit" value="Print" style="font-size: 15px"></td>
                    </form>
                  </div>
                </div>
              </div>
              <script>
                function ConfirmDelete() {
                  return confirm("Are you sure you want to delete this asset type?");
                }
              </script>
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
      &copy; Copyright <strong><span>SURAT SYSTEM</span></strong>. All Rights Reserved
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
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  
  function myFunction() {
    window.print();
}

</script>
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
