<?php
require('../../config.php');
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

// untuk jenis

/*$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "leave";
*/
// connect ke db

//$connect = mysql_connect($hostname, $username, $password, $databaseName);

/*
// mysql select query
$query = "SELECT * FROM `jenis_aset`";

// for select option

$result2 = mysql_query($conn2, $query);

$jenis_aset = "";

while($row2 = mysql_fetch_array($result2))
{
    $jenis_aset = $jenis_aset."<option>$row2[1]</option>";
}
*/
?>

<?php
					  
	date_default_timezone_set("Asia/Bangkok");
	$cM = date("m");
	$cY = date("Y");
	$cDate = date("Y-m-d");
							
	
if(($idp<>'')&&($lvl<>'')){					  
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
		  <?php //require('../../homealert.php'); ?>
		  
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/User-512.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $namerole;
					if($namerole<>''){
						echo ":";
					}else{
						echo " ";
					}
					echo $firstname;?>
			  </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/User-512.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $namerole;
					if($namerole<>''){
						echo ":";
					}else{
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
          <p><?php echo $firstname;?></p>
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
		<?php //}	?>
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
		<?php// }	?>
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
			<li class="active"><a href="../forms/dafaset.php"><i class="fa fa-circle-o"></i> Daftar Aset</a></li>
			<li><a href="../tables/laporanas.php"><i class="fa fa-circle-o"></i> Rekod Aset</a></li>
			<li><a href="../../hometetapan.php"><i class="fa fa-circle-o"></i> Tetapan</a></li>
          </ul>
        </li>
		<?php //} ?>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Aset
        <small>i-Aset</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../homeaset.php"><i class="fa fa-dashboard"></i>i-Aset</a></li>
        <li class="active">Daftar Aset</li>
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
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Am Aset</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="dafasetcheck.php" method="post">
              <div class="box-body">
			  
			  	<!-- Tarikh -->
				<div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tarikh Daftar</label>
                  <input type="text" class="form-control" id="tarikh_daftar" name="tarikh_daftar" value="<?php echo date("Y-m-d");?>"
				  id="datepicker">
                </div>
                </div> 
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Pemilik Jabatan</label>
				  <select class="form-control" id="pemilik_jabatan" name="pemilik_jabatan">
				  <?php
				  $sqlL = mysql_query("SELECT * FROM hrm_subunit
						ORDER BY id ASC", $conn);
				  				  
				  $countL = mysql_num_rows($sqlL);
				  if($countL > 0)
				  {
					$off = 0;
					$i = 1 + $off;
					 while($rowL = mysql_fetch_array($sqlL)) {
					 echo ' 
							<option value='.$rowL['id'].'>'.$rowL['name'].'</option>
						';
					 $i++;
					 }
				  }
				  ?>
				  
                </select>
                </div>
				</div>
			   <!-- Kategori -->
				<div class="col-md-5">
                <div class="form-group">
                  <div class="form-group">
                  <label for="Kategori">Kategori</label>
                  <select class="form-control" id="kategori" name="kategori">
				  <?php
				  $sqlL = mysql_query("SELECT * FROM kategoritps
						ORDER BY id_kategori ASC", $conn2);
				  				  
				  $countL = mysql_num_rows($sqlL);
				  if($countL > 0)
				  {
					$off = 0;
					$i = 1 + $off;
					 while($rowL = mysql_fetch_array($sqlL)) {
					 echo ' 
							<option value='.$rowL['id_kategori'].'>'.$rowL['nama_kategori'].'</option>
						';
					 $i++;	
					 } 
				  }
				  ?>
				  
                </select>
                </div>
                </div>
				</div>

				<!-- Jenis -->
				<div class="col-md-5">
                <div class="form-group">
                  <div class="form-group">
                  <label for="jenis">Jenis</label>
                  <select class="form-control" style="text-transform:uppercase"  id="jenis" name="jenis">
				  <?php
				  $sqlL = mysql_query("SELECT * FROM jenis_aset
						ORDER BY jenis_aset ASC", $conn2);
				  				  
				  $countL = mysql_num_rows($sqlL);
				  if($countL > 0)
				  {
					$off = 0;
					$i = 1 + $off;
					 while($rowL = mysql_fetch_array($sqlL)) {
					 echo '
							<option>'.$rowL['jenis_aset'].'</option>							
						';					 
					 $i++;
					 }
				  }
				  ?>
                  </select>
                </div>
				</div>
				</div>
				
				<!-- No Siri dan Aset bertukar -->
				
				<!-- No Aset -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">No. Aset</label>
				  <!--<div class="col-md-2">-->
				  <input type="text" class="form-control" id="InputNoSiriAwal" name="InputNoSiriAwal" placeholder="No. Aset" required>
				  <!--</div>
				  <div class="col-md-2">
                  <input type="text" class="form-control" id="InputNoSiri" name="InputNoSiri" placeholder="No. Aset ... Selepas Daftar" readonly>
				  </div>-->
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
            <form role="form" action="dafasetcheck.php" method="post"> 
              <div class="box-body">
			  				
				<!-- No Siri -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">No. Siri/ Plat</label>
				  <!--<div class="col-md-2">-->
				  <input type="text" class="form-control" id="no_siri" name="no_siri" placeholder="No. Siri/ Plat">
                </div>
				</div>
				
				<!-- Nama Aset -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Nama Aset</label>
                  <input type="text" class="form-control"  id="nama_aset" name="nama_aset" placeholder="Nama Aset" required>
                </div>
				</div>
				
				<!-- Tahun Beli -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Tahun/ Tarikh Beli</label>
				  <!--<div class="col-md-2">-->
				  <input type="text" class="form-control" id="tahun_beli" name="tahun_beli" placeholder="Tahun/ Tarikh Beli">

                </div>
				</div>
				
				<!-- Harga Pembelian -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Harga Pembelian</label>
                  <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="RM ">
                </div>
				</div>
				
				<!-- Warna -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Tempoh Waranti</label>
				  <!--<div class="col-md-2">-->
				  <input type="text" class="form-control" id="warranty" name="warranty" placeholder="Waranti">

                </div>
				</div>
				
				<!-- Warna -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Warna</label>
				  <!--<div class="col-md-2">-->
				  <input type="text" class="form-control" id="warna" name="warna" placeholder="Warna Aset">

                </div>
				</div>
				
				<!-- Model -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Model</label>
				  <!--<div class="col-md-2">-->
				  <input type="text" class="form-control" id="model" name="model" placeholder="Model" required>

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
				  <input type="text" class="form-control" id="nama_kakitangan" name="nama_kakitangan" placeholder="Nama Kakitangan">
                </div>
				</div>

				<!-- No Tel -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">No. Telefon</label>
				  <!--<div class="col-md-2">-->
				  <input type="text" class="form-control" id="notel_kakitangan" name="notel_kaitangan" placeholder="No. Telefon Kakitangan" >
                </div>
				</div>
				
				<!-- Email -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
				  <!--<div class="col-md-2">-->
				  <input type="email" class="form-control" id="email_kakitangan" name="email_kakitangan" placeholder="Email Kakitangan">
                </div>
				</div>

				<!-- Alamat -->		
				<div class="col-md-5">
					<div class="form-group">
						<label for="exampleInputPassword1">Lokasi Jabatan</label>
						<select class="form-control" id="lokasi_jabtan" name="lokasi_jabatan">
				  <?php
				  $sqlL = mysql_query("SELECT * FROM hrm_subunit
						ORDER BY id ASC", $conn);
				  				  
				  $countL = mysql_num_rows($sqlL);
				  if($countL > 0)
				  {
					$off = 0;
					$i = 1 + $off;
					 while($rowL = mysql_fetch_array($sqlL)) {
					 echo ' 
					        
							<option value='.$rowL['id'].'>'.$rowL['name'].'</option>
	
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
				
				<!-- Nama Pembekal -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Nama Pembekal</label>
				  <!--<div class="col-md-2">-->
				  <input type="text" class="form-control" id="nama_pembekal" name="nama_pembekal" placeholder="Nama Pembekal">
                </div>
				</div>

				<!-- No Tel -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">No. Telefon</label>
				  <!--<div class="col-md-2">-->
				  <input type="text" class="form-control" id="notel_pembekal" name="notel_pembekal" placeholder="No. Telefon Pembekal" >
                </div>
				</div>
				
				<!-- Email -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
				  <!--<div class="col-md-2">-->
				  <input type="email" class="form-control" id="email_pembekal" name="email_pembekal" placeholder="Email Pembekal">
                </div>
				</div>

				<!-- Alamat -->		
				<div class="col-md-5">
					<div class="form-group">
						<label for="exampleInputPassword1">Alamat</label>
						<textarea class="form-control" rows="3" cols="50" id="alamat_pembekal" name="alamat_pembekal" placeholder="Alamat Pembekal" ></textarea>
					</div>
				</div>
				
				<div class="form-group">
                  <input type="hidden" class="form-control" id="id_pembekal" name="id_pembekal">
                </div>
				
				
				</div>
				<!-- /.box-body -->

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
  $(function () {
	//Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  })
</script>
</body>
</html>
<?php
}else{
header('Location: index.php'); 
}
?>