<?php
 include('../../functions.php'); 
 if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: index.php');
}

if(isset($_POST['view'])){
  $user_id = $_GET['Internal_Id'];    

echo "ok boleh view";
}

    /*if (isset($_POST['approved']))
    {
        $appUpdateQuery = "UPDATE bookings SET status= 'APPROVED' WHERE id='".$_POST['row_id']."'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);

    }
        
    if (isset($_POST['rejected']))
    {
$s="CANCEL BY STAFF";

        $rejUpdateQuery = "INSERT INTO cancel (id, date, user_id, user_name, purpose, destination, driver_name, vehicle_id, model_plat)
      SELECT id, date, user_id, user_name, purpose, destination, driver_name, vehicle_id, model_plat FROM bookings WHERE id='".$_POST['row_id']."'";
        $rejUpdateResult = mysqli_query($db,$rejUpdateQuery);

              $rejUpdateQuery1 = "DELETE FROM bookings WHERE id='".$_POST['row_id']."'";
        $rejUpdateResult1 = mysqli_query($db,$rejUpdateQuery1);


    }
        if (isset($_POST['return']))
    {

        $appUpdateQuery = "UPDATE bookings SET status= 'RETURN VEHICLE' WHERE id='".$_POST['row_id']."'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);
                $appUpdateQuery1 = "UPDATE management SET status= 'RETURN VEHICLE' WHERE id='".$_POST['row_id']."'";
        $appUpdateResult1 = mysqli_query($db, $appUpdateQuery1);
    }*/

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

  <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- Logo -->
    <div class="d-flex align-items-center justify-content-between">
      <a href="../../SuratHome.php" class="logo d-flex align-items-center">
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
              <h6><?php echo $_SESSION['user']['First_Name']; ?></h6>
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
            <a href="../../SuratDaftarSuratKeluar.php" class="active">
              <i class="bi bi-pencil-square" style="font-size: 1em; background-color: transparent"></i><span>Register Out</span>
            </a>
          </li>
        </ul>
		    <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="../../SuratRekodSuratKeluar.php">
              <i class="bi bi-file-earmark-text" style="font-size: 1em"></i><span>Out Record</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="../../SuratDaftarSuratMasuk.php">
              <i class="bi bi-pencil-square" style="font-size: 1em"></i><span>Register In</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="../../SuratRekodSuratMasuk.php">
              <i class="bi bi-file-earmark-text" style="font-size: 1em"></i><span>In Record</span>
            </a>
          </li>
        </ul>
      </li>
  </aside><!-- End Sidebar-->


  <main id="main" class="main">

  <div class="pagetitle">
    <h1>Register Out Letter</strong></h1>
    <nav>
      <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
        <li class="breadcrumb-item"><a href="SuratHome.php">Home Page</a></li>
        <li class="breadcrumb-item active">Register Out</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

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
              <h5 class="card-title"><strong>OUT LETTER RECORD</strong><br/>
              <!-- List and select category from field form -->

            <div class="row">
              <div class="box-header with-border">
                <div class="col-md-12">
                  <!-- /.box-header -->
                  <div class="box-body" style="margin-top: 10px">
                      <?php
                      //$sqlAP = mysql_query("SELECT * FROM jenis_aset ORDER BY id ASC");

                      //$sqlAP = "SELECT * FROM surat_rekod 
                     // WHERE department_pemohon = '{$_SESSION['user']['Department']}' 
                     // OR nama_pemohon = '{$_SESSION['user']['Internal_Id']}}' 
                     // ORDER BY tarikh_surat ASC";
                      
                      $sqlAP = "SELECT * FROM surat_rekod  
                      ORDER BY tarikh_surat ASC";
                      
                      $resultAP = mysqli_query($db, $sqlAP);
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
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 150px;text-align:center">Remarks
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
                          echo '<span>No record found.</span>';
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
    

       <!-----------------------------------------------------------------------INSERT REKOD--------------------------------------------------------------------------------------------->
<?php

//Keluarkan notification untuk mesej berjaya
function paparMesejBerjayaAset($idasetFF){
	
	echo '<script type="text/javascript">alert("Supplier successfully added!");
				window.location="7rekodsuratkeluar.php";</script>';
}

//Keluarkan notification untuk mesej GAGAL
function paparMesejGagal(){
	
	echo "<script type='text/javascript'>\n";
       	echo "alert('Oops! Error occurred, failed to add new supplier!');\n";
       	echo "history.go(-1);\n";
       	echo "</script>";	
		exit();		               
}

//Keluarkan notification untuk mesej GAGAL
function paparMesejGagal1(){
	
	echo "<script type='text/javascript'>\n";
       	echo "alert('Sorry, your application failed to proceed.');\n";
       	echo "history.go(-1);\n";
       	echo "</script>";	
		exit();		               
}


//post setiap id didalam form

//insert into database penumpang	
if (isset($_POST['submit'])) {

	$InputDate = isset($_POST['InputDate']) ? $_POST['InputDate'] : '';
	$InputNoRujukanSuratAwal = isset($_POST['InputNoRujukanSuratAwal']) ? $_POST['InputNoRujukanSuratAwal'] : '';
	$InputNoRujukanSuratTgh = isset($_POST['InputNoRujukanSuratTgh']) ? $_POST['InputNoRujukanSuratTgh'] : '';
	$InputNoRujukanSuratAkhir = isset($_POST['InputNoRujukanSuratAkhir']) ? $_POST['InputNoRujukanSuratAkhir'] : '';


	$InputNamaPemohon = isset($_POST['InputNamaPemohon']) ? $_POST['InputNamaPemohon'] : '';
	$InputNamaPenerima = isset($_POST['InputNamaPenerima']) ? $_POST['InputNamaPenerima'] : '';

	$text = implode(',', $_POST['optionsRadios1']);

	$InputTajukSurat = isset($_POST['InputTajukSurat']) ? $_POST['InputTajukSurat'] : '';


	$InputDateCvt = date("Y-m-d", strtotime($InputDate));



	try {
		//INI BILA KIRA ROW TABLE					
		//$sql = mysql_query("SELECT count(id) as ids FROM tbl_surat_out_all WHERE YEAR( tarikh_surat ) = YEAR( CURDATE( ) ) ORDER BY id DESC");

		//INI BILA KIRA NO ID TABLE
		$sql = "SELECT id as ids FROM tbl_surat_out_all WHERE YEAR( tarikh_surat ) = YEAR( CURDATE( ) ) ORDER BY id DESC";

		$result = mysqli_query($conn2, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$idnorujsurat = $row['ids'];

			$idnorujsuratF = $idnorujsurat + 1;
			$idnorujsuratFF = $InputNoRujukanSuratAwal . $InputNoRujukanSuratTgh . $InputNoRujukanSuratAkhir . " ( " . $idnorujsuratF . " )";

			try {

				$sql1 = "INSERT INTO tbl_surat_out_all(tarikh_surat, no_ruj_surat, nama_pemohon, nama_penerima, tajuk_surat, 
            kaedah_penghantaran, department_pemohon) 
            VALUES ('$InputDateCvt','$idnorujsuratFF','$InputNamaPemohon','$InputNamaPenerima', '$InputTajukSurat', 
            '$text', '$department')";
				$query1 = mysqli_query($conn2, $sql1) or die("Error: " . mysqli_error($conn2));

				$sql11 = "SELECT * FROM tbl_surat_out_all WHERE no_ruj_surat = '$idnorujsuratFF' AND tarikh_surat = '$InputDateCvt'";
				$result11 = mysqli_query($conn2, $sql11);

				if (mysqli_num_rows($result11) > 0) {
					paparMesejBerjaya($idnorujsuratFF);
				} else {
					paparMesejGagal1();
				}
			} catch (Exception $e) {
				echo 'Caught exception check condition applied: ',  $e->getMessage(), "\n";
			}
		} else {

			$idnorujsuratFst = $InputNoRujukanSuratAwal . " ( 1 )";

			try {

				$sql1 = "INSERT INTO tbl_surat_out_all(tarikh_surat, no_ruj_surat, nama_pemohon, nama_penerima, tajuk_surat, 
				kaedah_penghantaran, department_pemohon) 
				VALUES ('$InputDateCvt','$idnorujsuratFst','$InputNamaPemohon','$InputNamaPenerima', '$InputTajukSurat', 
				'$text', '$department')";
				$query1 = mysqli_query($conn2,$sql1) or die("Error: " . mysqli_error($conn2));

				$sql11 = "SELECT * FROM tbl_surat_out_all WHERE no_ruj_surat = '$idnorujsuratFst' AND tarikh_surat = '$InputDateCvt'";
				$result11 = mysqli_query($conn2, $sql11);
				if (mysqli_num_rows($result11) > 0) {
					paparMesejBerjaya($idnorujsuratFF);
				} else {
					paparMesejGagal1();
				}
			} catch (Exception $e) {
				echo 'Caught exception check condition applied: ',  $e->getMessage(), "\n";
			}
		}
	} catch (Exception $e) {
		echo 'Caught exception insert: ',  $e->getMessage(), "\n";
	}
} else {
	// mesej gagal dipaparkan /
	function died($error)
	{
		paparMesejGagal();
	}
}
?>


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
    function checkInput() {
    const middleInput = document.getElementById('InputNoRujukanSuratTgh').value;
    const endInput = document.getElementById('InputNoRujukanSuratAkhir');

    if (middleInput) {
        endInput.value = `/${new Date().toLocaleString('default', { month: 'short' }).toUpperCase()}${new Date().getFullYear()}`;
    } else {
        endInput.value = `${new Date().toLocaleString('default', { month: 'short' }).toUpperCase()}${new Date().getFullYear()}`;
    }
  }

// Initialize the default state
checkInput();
</script>

  

</body>
</html>
