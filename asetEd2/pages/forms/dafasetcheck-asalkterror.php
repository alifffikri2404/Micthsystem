<?php
require('../../configAsetTPS.php');
require('../../config.php');
session_start();
$idp = $_SESSION['idP'];
$lvl = $_SESSION['lvl'];

$firstname1 = $_SESSION['1stname'];
$lastname = $_SESSION['lastname'];
$empnumber = $_SESSION['empnumber'];
$department = $_SESSION['department'];
$namerole = $_SESSION['namerole'];



date_default_timezone_set("Asia/Bangkok");
$cM = date("m");
$cY = date("Y");
$cDate = date("Y-m-d");


//Check role
if ($lvl == "1") {
  $firstname = "Admin";
}
if ($lvl <> "1") {
  $firstname = $firstname1;
}


//------------------------------------------------------------------------ UPDATE ASET----------------------------------------------------------------------------------------------// 
if (isset($_POST['btn-update'])) {
  // variables for input data
  $tarikh_daftar = $_POST['tarikh_daftar'];
  $tarikh_serahan = $_POST['tarikh_serahan'];
  $kategori_aset = $_POST['kategori_aset'];
  $jenis_aset = $_POST['jenis_aset'];
  $no_siri = $_POST['no_siri'];
  $nama_aset = $_POST['nama_aset'];
  $tahun_beli = $_POST['tahun_beli'];
  $harga_beli = $_POST['harga_beli'];
  $warna = $_POST['warna'];
  $lokasi = $_POST['lokasi'];
  $cukai_jalan = $_POST['cukai_jalan'];
  $nama_kakitangan = $_POST['nama_kakitangan'];
  $model = $_POST['model'];
  $warranty = $_POST['warranty'];
  $no_aset = $_POST['no_aset'];
  //$email_pembekal = $_POST['emel_pembekal'];


  //---------------------------------------------------------------------------------------------------------------------------//
  $nama_pembekal = $_POST['nama_pembekal'];
  $alamat_pembekal = $_POST['alamat_pembekal'];
  $notel_pembekal = $_POST['notel_pembekal'];

  // variables for input data

  // sql query for update data into database
  //$sql_query = "UPDATE tbl_daftar_aset SET tarikh_daftar='$tarikh_daftar',tarikh_serahan='$tarikh_serahan',kategori_aset='$kategori_aset',jenis_aset='$jenis_aset',no_siri='$no_siri',nama_aset='$nama_aset',tahun_beli='$tahun_beli',harga_beli='$harga_beli',warna='$warna',lokasi='$lokasi',cukai_jalan='$cukai_jalan',nama_kakitangan='$nama_kakitangan',warranty='$warranty', no_aset='$no_aset', model='$model' WHERE id=".$_GET['id'];
  // sql query for update data into database
  //$sql_query = "UPDATE tbl_pembekal SET emel_pembekal='$email_pembekal',nama_pembekal='$nama_pembekal',alamat_pembekal='$alamat_pembekal',notel_pembekal='$notel_pembekal' WHERE id=".$_GET['id'];

  $sql1_query = "UPDATE tbl_daftar_aset 
INNER JOIN tbl_pembekal 
ON tbl_daftar_aset.emel_pembekal = tbl_pembekal.emel_pembekal SET tbl_daftar_aset.tarikh_daftar='$tarikh_daftar',
tbl_daftar_aset.tarikh_serahan='$tarikh_serahan',tbl_daftar_aset.kategori_aset='$kategori_aset',
tbl_daftar_aset.jenis_aset='$jenis_aset',tbl_daftar_aset.no_siri='$no_siri',
tbl_daftar_aset.nama_aset='$nama_aset',tbl_daftar_aset.tahun_beli='$tahun_beli',
tbl_daftar_aset.harga_beli='$harga_beli',tbl_daftar_aset.warna='$warna',
tbl_daftar_aset.lokasi='$lokasi',tbl_daftar_aset.cukai_jalan='$cukai_jalan',
tbl_daftar_aset.nama_kakitangan='$nama_kakitangan',tbl_daftar_aset.warranty='$warranty', 
tbl_daftar_aset.no_aset='$no_aset', tbl_daftar_aset.model='$model',
tbl_pembekal.nama_pembekal='$nama_pembekal',
tbl_pembekal.alamat_pembekal='$alamat_pembekal',tbl_pembekal.notel_pembekal='$notel_pembekal' 
WHERE id=" . $_GET['id'];


  $result2 = mysqli_query($conn2, $sql1_query);
  //---------------------------------------------------------------------------------------------------------------------------------//

  // sql query execution function
  if (($result2)) {
?>
    <script type="text/javascript">
      alert('Data aset berjaya dikemaskini.');
      window.location.href = 'laporanas.php';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('Data tidak berjaya dikemaskini.');
    </script>
<?php
  }
  // sql query execution function
}


//------------------------------------------------------------------UPDATE HISTORY------------------------------------------------------------------------------------------------//

if (isset($_POST['btn-update'])) {

  $id = isset($_POST['id']) ? $_POST['id'] : '';
  $tarikh_daftar = isset($_POST['tarikh_daftar']) ? $_POST['tarikh_daftar'] : '';
  $tarikh_serahan = isset($_POST['tarikh_serahan']) ? $_POST['tarikh_serahan'] : '';
  $no_aset = isset($_POST['no_siri']) ? $_POST['no_siri'] : '';
  $nama_aset = isset($_POST['nama_aset']) ? $_POST['nama_aset'] : '';
  $lokasi = isset($_POST['lokasi']) ? $_POST['lokasi'] : '';

  try {

    $sql = "SELECT * FROM history_aset ORDER BY id DESC";

    $result = mysqli_query($conn2, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);


      try {

        $sql1 = "INSERT INTO history_aset(tarikh_daftar, tarikh_serahan, no_aset, nama_aset, lokasi) 
				VALUES ('$tarikh_daftar', '$tarikh_serahan', '$no_aset', '$nama_aset', '$lokasi')";


        $sql11 = "SELECT * FROM history_aset WHERE lokasi = '$lokasi'";
        $result3 = mysqli_query($conn2, $sql11);
        if (mysqli_num_rows($result3) > 0) {
        } else {
        }
      } catch (Exception $e) {
      }
    } else {


      try {

        $sql1 = "INSERT INTO history_aset(tarikh_daftar, tarikh_serahan, no_aset, nama_aset, lokasi) 
				VALUES ('$tarikh_daftar', '$tarikh_serahan', '$no_aset', '$nama_aset', '$lokasi')";


        $sql11 = "SELECT * FROM history_aset WHERE lokasi = '$lokasi'";
        $result3 = mysqli_query($conn2, $sql11);
        if (mysqli_num_rows($result3) > 0) {
        } else {
        }
      } catch (Exception $e) {
      }
    }
  } catch (Exception $e) {
  }
} else {
  // mesej gagal dipaparkan /
  function died($error)
  {
  }
}

//--------------------------------------------------------------UPDATE PEMBEKAL----------------------------------------------------------------------------------------------------//

/*if(isset($_POST['btn-update']))
{
 // variables for input data
 
 $email_pembekal = $_POST['emel_pembekal'];
 $nama_pembekal = $_POST['nama_pembekal'];
 $alamat_pembekal = $_POST['alamat_pembekal'];
 $notel_pembekal = $_POST['notel_pembekal'];
 // variables for input data

 // sql query for update data into database
 $sql_query = "UPDATE tbl_pembekal SET emel_pembekal='$email_pembekal',nama_pembekal='$nama_pembekal',alamat_pembekal='$alamat_pembekal',notel_pembekal='$notel_pembekal' WHERE id=".$_GET['id'];
 // sql query for update data into database
 
 // sql query execution function
 if(mysql_query($sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('Data berjaya dikemaskini.');
  window.location.href='laporanas.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('Data tidak berjaya dikemaskini.');
  </script>
  <?php
 }
 // sql query execution function
}*/

//--------------------------------------------------IF UPDATE CANCEL------------------------------------------------------------------------------------------------//

if (isset($_POST['btn-cancel'])) {
  header("Location: laporanas.php");
}


//-------------------------------NAK PAPARKAN SEMULA DALAM BOX BEFORE KEMASKINI----------------------------------------------------------------------------------------------------//
?>

<?php

date_default_timezone_set("Asia/Bangkok");
$cM = date("m");
$cY = date("Y");
$cDate = date("Y-m-d");


if (($idp <> '') && ($lvl <> '')) {
?>


  <!DOCTYPE html>
  <html>

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MICTH | IntSys</title>
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
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../homeaset.php" class="logo">
          <span class="logo-mini"><b>i</b>SM</span>
          <span class="logo-lg"><img src="../../dist/img/logomicthnew-plain-01.png" alt="MICTH" height="80%" width="70%"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Notifications: style can be found in dropdown.less -->
              <?php //require('../../homealert.php'); 
              ?>

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../../dist/img/User-512.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $namerole;
                                          if ($namerole <> '') {
                                            echo ":";
                                          } else {
                                            echo " ";
                                          }
                                          echo $firstname; ?>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../../dist/img/User-512.png" class="img-circle" alt="User Image">

                    <p>
                      <?php echo $namerole;
                      if ($namerole <> '') {
                        echo ":";
                      } else {
                        echo " ";
                      }
                      echo $firstname;
                      ?>
                      <!-- Manager
                  <small>Member since Nov. 2012</small>-->
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="../../iout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--</div>-->
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../dist/img/User-512.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $firstname; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <!--<li class="treeview">
          <a href="../../homeic.php">
            <i class="fa fa-external-link"></i> <span>i-Cuti</span>
            <span class="pull-right-container">
			  <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="../dashboardLeave.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <li><a href="leavesapply.php"><i class="fa fa-circle-o"></i> Apply Leave</a></li>
            <li><a href="../tables/LeaveCurrentY.php"><i class="fa fa-circle-o"></i> Current Leave</a></li>
            <li><a href="../tables/LeaveHistory.php"><i class="fa fa-circle-o"></i> History Leave</a></li>
          </ul>
        </li>
		<li>
          <a href="index.php">
            <i class="fa fa-dot-circle-o"></i> <span>i-Tempah</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>-->
            <!--<li>
          <a href="../../homeis.php">
            <i class="fa fa-envelope-o"></i> <span>i-Surat</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="dafsuratkeluar.php"><i class="fa fa-circle-o"></i> Daftar Surat Keluar</a></li>
            <li><a href="../tables/laporanis.php"><i class="fa fa-circle-o"></i> Rekod Surat Keluar</a></li>
          </ul>
        </li>-->
            <?php
            //if(($lvl == "1") || ($lvl == "5")) {
            ?>
            <!--<li class="treeview">
          <a href="../../homekaki.php">
            <i class="fa fa-odnoklassniki"></i> <span>i-Kakitangan</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="../tables/infostaf.php"><i class="fa fa-circle-o"></i> Maklumat Kakitangan</a></li>
          </ul>
        </li>-->
            <?php //}	
            ?>
            <?php
            //if($department == "6"){
            ?>
            <!--<li>
          <a href="../../homeip.php">
            <i class="fa fa-credit-card"></i> <span>i-Pay</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="dafpaycert.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i> Payment Cert Generate</a></li>
            <li><a href="../tables/laporanip.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i> Laporan</a></li>
          </ul>
        </li>-->

            <!--<li>
          <a href="../../homeadu.php">
            <i class="fa fa-commenting"></i> <span>i-Aduan</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="dafadu.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i> Borang Aduan</a></li>
            <li><a href="../tables/laporanadu.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i> Rekod Aduan</a></li>
          </ul>
        </li>-->
            <!--<li>
          <a href="pages/index.php">
            <i class="fa fa-book"></i> <span>iDokumen</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>-->
            <?php
            //if($department == "1"){
            ?>
            <li class="treeview active">
              <a href="../../homeaset.php">
                <i class="fa fa-briefcase"></i><span>i-Aset</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li><a href="../tables/laporanas.php"><i class="fa fa-circle-o"></i> Rekod Aset</a></li>
                <li><a href="../../hometetapan.php"><i class="fa fa-circle-o"></i> Tetapan</a></li>
              </ul>
            </li>
            <?php //} 
            ?>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kemaskini Maklumat Aset
            <small>i-Aset</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../homeaset.php"><i class="fa fa-dashboard"></i> i-Aset</a></li>
            <li><a href="../tables/laporanas.php"><i class="fa fa-dashboard"></i> Rekod Aset</a></li>
            <li class="active">Maklumat Aset (Kemaskini)</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!------------------- Daftar ID Aset ----------------------->
          <div class="row">
            <!--<div class="col-md-0">
		</div>-->
            <!-- left column -->
            <div class="col-md-12">

              <?php
              $sqlAP = "SELECT * FROM tbl_daftar_aset
						ORDER BY id ASC";

              if (isset($_GET['id'])) {
                $sqlA_query = "SELECT * 
				FROM tbl_daftar_aset 
				INNER JOIN kategoritps 
				ON tbl_daftar_aset.kategori_aset=kategoritps.id_kategori
				WHERE tbl_daftar_aset.id=" . $_GET['id'];
                /*$sql_query="SELECT * FROM kategoritps 
				INNER JOIN tbl_daftar_aset
				ON kategoritps.id_kategori=tbl_daftar_aset.kategori_aset 
				INNER JOIN tbl_pembekal 
				ON tbl_daftar_aset.emel_pembekal=tbl_pembekal.emel_pembekal
				WHERE tbl_daftar_aset.id=".$_GET['id'];*/


                $result_set = mysqli_query($conn2, $sqlA_query);
                $fetched_row = mysqli_fetch_array($result_set);


                //}

                //echo "dh masuk";

              ?>

                <!-- general form elements -->
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title">Maklumat Am Aset</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" action="kemaskiniupdatecheck3.php" method="post">
                    <div class="box-body">

                      <!-- Tarikh -->
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tarikh Daftar</label>
                          <input type="text" class="form-control" id="tarikh_daftar" name="tarikh_daftar" value="<?php echo $fetched_row['tarikh_daftar']; ?>">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Pemilik Jabatan</label>
                          <?php
                          $pemilik_jabatan2 = $fetched_row['pemilik_jabatan'];


                          $sql211 = "SELECT * FROM hrm_subunit WHERE id = $pemilik_jabatan2";
                          $result19 = mysqli_query($conn, $sql211);
                          $row = mysqli_fetch_assoc($result19);
                          $pemilik_jabatan23 = $row['name'];

                          ?>
                          <input type="text" class="form-control" id="pemilik_jabatan" name="pemilik_jabatan" value="<?php echo $pemilik_jabatan23 ?>">
                        </div>
                      </div>
                      <!-- Kategori -->
                      <div class="col-md-5">
    <div class="form-group">
        <label for="Kategori">Kategori</label>
        <input type="text" class="form-control" id="kategori_aset" name="kategori_aset" value="<?php echo $fetched_row['kategori_aset']; ?>">
    </div>
</div>

<!-- Jenis -->
<div class="col-md-5">
    <div class="form-group">
        <label for="jenis">Jenis</label>
        <input type="text" class="form-control" id="jenis_aset" name="jenis_aset" value="<?php echo $fetched_row['jenis_aset']; ?>">
    </div>
</div>

                      <!-- No Siri dan Aset bertukar -->

                      <!-- No Aset -->
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="exampleInputPassword1">No. Aset *</label>
                          <!--<div class="col-md-2">-->
                          <input type="text" class="form-control" id="no_aset" name="no_aset" value="<?php echo $fetched_row['tarikh_daftar']; ?>">

                        </div>
                      </div>
                    </div>


                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
            <!--<div class="col-md-2">
		</div>-->
            <!-- right column -->
            <!--/.col (right) -->
          </div>
          <!-- /.row -->

          <!-------------------- Aset -------------------------------->
          <div class="row">
            <!--<div class="col-md-0">
		</div>-->
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Maklumat Aset</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start-->

                <div class="box-body">

                  <!-- No Siri -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="exampleInputPassword1">No. Siri/ Plat</label>
                      <!--<div class="col-md-2">-->
                      <input type="text" class="form-control" id="no_siri" name="no_siri" value="<?php echo $fetched_row['no_siri']; ?>" placeholder="No. Siri/ Plat">

                    </div>
                  </div>

                  <!-- Nama Aset -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Aset *</label>
                      <input type="text" class="form-control" id="nama_aset" name="nama_aset" value="<?php echo $fetched_row['nama_aset']; ?>" placeholder="Nama Aset" required>
                    </div>
                  </div>

                  <!-- Tahun Beli -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tahun/ Tarikh Beli</label>
                      <!--<div class="col-md-2">-->
                      <input type="text" class="form-control" id="tahun_beli" name="tahun_beli" value="<?php echo $fetched_row['tahun_beli']; ?>" placeholder="Tahun/ Tarikh Beli">

                    </div>
                  </div>

                  <!-- Harga Pembelian -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Harga Pembelian</label>
                      <input type="text" class="form-control" id="harga_beli" value="<?php echo $fetched_row['harga_beli']; ?>" name="harga_beli" placeholder="RM ">
                    </div>
                  </div>

                  <!-- Warna -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tempoh Waranti</label>
                      <!--<div class="col-md-2">-->
                      <input type="text" class="form-control" id="warranty" value="<?php echo $fetched_row['warranty']; ?>" name="warranty" placeholder="Waranti">

                    </div>
                  </div>

                  <!-- Warna -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Warna</label>
                      <!--<div class="col-md-2">-->
                      <input type="text" class="form-control" id="warna" name="warna" value="<?php echo $fetched_row['warna']; ?>" placeholder="Warna Aset">

                    </div>
                  </div>

                  <!-- Model -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Model *</label>
                      <!--<div class="col-md-2">-->
                      <input type="text" class="form-control" id="model" name="model" value="<?php echo $fetched_row['model']; ?>" placeholder="Model" required>

                    </div>
                  </div>

                  <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id">
                  </div>
                </div>
                <!-- /.box-body -->

                <div align="right">
                  <!--<button type="submit" name="submit" id="submit" class="btn btn-primary">Daftar</button>-->
                </div>

              </div>
              <!-- /.box -->

            </div>
            <!--/.col (left) -->
            <!--<div class="col-md-2">
		</div>-->
            <!-- right column -->
            <!--/.col (right) -->
          </div>
          <!-- /.row -->

          <!-- ---------------------------------------- PENGGUNA ------------------------------------------ -->
          <div class="row">
            <!--<div class="col-md-0">
		</div>-->
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Maklumat Pengguna</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">

                  <!-- Nama Pembekal -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Kakitangan</label>
                      <!--<div class="col-md-2">-->
                      <input type="text" class="form-control" id="nama_kakitangan" value="<?php echo $fetched_row['nama_kakitangan']; ?>" name="nama_kakitangan" placeholder="Nama Kakitangan">
                    </div>
                  </div>



                  <!-- Alamat -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <?php
                      $current_jab = $fetched_row['lokasi_jabatan'];


                      $sql21 = "SELECT * FROM hrm_subunit WHERE id = $current_jab";
                      $result19 = mysqli_query($conn, $sql21);
                      $row = mysqli_fetch_assoc($result19);
                      $lokasi_jabatan = $row['name'];

                      ?>

                      <label for="exampleInputPassword1">Lokasi Jabatan semasa = <?php echo $lokasi_jabatan; ?></label>





                      <select class="form-control" id="lokasi_jabtan" name="lokasi_jabatan">
                        <?php
                        $sqlL = "SELECT * FROM hrm_subunit
						ORDER BY id ASC";
                        $result = mysqli_query($conn, $sqlL);
                        $countL = mysqli_num_rows($result);
                        if ($countL > 0) {
                          $off = 0;
                          $i = 1 + $off;
                          while ($rowL = mysqli_fetch_array($result)) {
                            echo ' 
					        
							<option value=' . $rowL['id'] . '>' . $rowL['name'] . '</option>
	
						';

                            $i++;
                          }
                        }

                        ?>

                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="hidden" class="form-control" id="id_kakitangan" name="id_kakitangan">
                  </div>


                </div>

              </div>
              <!-- /.box -->

            </div>
            <!--/.col (left) -->
            <!--<div class="col-md-2">
		</div>-->
            <!-- right column -->
            <!--/.col (right) -->
          </div>

          <!-- ---------------------------------------- PEMBEKAL ------------------------------------------ -->
          <div class="row">
            <!--<div class="col-md-0">
		</div>-->
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Maklumat Pembekal</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">


                  <!-- Nama Pembekal 
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Nama Pembekal</label>
				  <!--<div class="col-md-2">
				  <input type="text" class="form-control" id="nama_pembekal" name="nama_pembekal" placeholder="Nama Pembekal">
                </div>
				</div>-->

                  <!-- Alamat -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <?php



                      ?>
                      <label for="exampleInputPassword1">Nama Pembekal semasa = </label>


                      <select class="form-control" id="nama_pembekal" name="nama_pembekal">
                        <option value='-'>Sila Pilih Nama Pembekal</option>
                        <?php
                        $sqlP = "SELECT * FROM tbl_pembekal
         ORDER BY nama_pembekal ASC";
                        $result5 = mysqli_query($conn2, $sqlP);
                        $countP = mysqli_num_rows($result5);

                        if ($countP > 0) {
                          $off = 0;
                          $i = 1 + $off;

                          while ($rowP = mysqli_fetch_array($result5)) {
                            echo ' 
					        
							<option value=' . $rowP['id_pembekal'] . '>' . $rowP['nama_pembekal'] . '</option>
	
						';

                            $i++;
                          }
                        }

                        ?>

                      </select>
                    </div>
                  </div>


                  <!-- Nama Pembekal
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Nama Pembekal</label>
				  <!--<div class="col-md-2">
				  <input type="text" class="form-control" id="nama_pembekal" name="nama_pembekal" placeholder="Nama Pembekal">
                </div>
				</div>

				<!-- No Tel 
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">No. Telefon</label>
				  <!--<div class="col-md-2">
				  <input type="text" class="form-control" id="notel_pembekal" name="notel_pembekal" placeholder="No. Telefon Pembekal" >
                </div>
				</div>
				
				<!-- Email 
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
				  <!--<div class="col-md-2">
				  <input type="email" class="form-control" id="email_pembekal" name="email_pembekal" placeholder="Email Pembekal">
                </div>
				</div>

				 <!--Alamat	
				<div class="col-md-5">
					<div class="form-group">
						<label for="exampleInputPassword1">Alamat</label>
						<textarea class="form-control" rows="3" cols="50" id="alamat_pembekal" name="alamat_pembekal" placeholder="Alamat Pembekal" ></textarea>
					</div>
				</div>
				
				<div class="form-group">
                  <input type="hidden" class="form-control" id="id_pembekal" name="id_pembekal">
                </div>
				
				
				</div>-->
                  <!-- /.box-body -->

                <?php
                //}
              }
                ?>

                <div class="box-footer" align="right">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">Daftar</button>
                </div>

                </form>
                </div>
                <!-- /.box -->

              </div>
              <!--/.col (left) -->
              <!--<div class="col-md-2">
		</div>-->
              <!-- right column -->
              <!--/.col (right) -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2020 <a href="https://micth.com">MICTH</a>.</strong> All rights
        reserved.
      </footer>


      <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- bootstrap datepicker -->
    <script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Page script -->
    <script>
      $(function() {
        //Date picker
        $('#datepicker').datepicker({
          autoclose: true
        })
      })
    </script>
  </body>

  </html>
<?php
} else {
  header('Location: index.php');
}
?>