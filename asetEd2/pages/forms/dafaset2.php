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

// untuk kategori

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "dbaset";

// connect ke db

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `kategori_aset`";

// untuk select option

$result2 = mysqli_query($connect, $query);

$kategori_aset = "";

while($row2 = mysqli_fetch_array($result2))
{
    $kategori_aset = $kategori_aset."<option>$row2[1]</option>";
}

?>

<?php

// untuk jenis

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "dbaset";

// connect ke db

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `jenis_aset`";

// for select option

$result2 = mysqli_query($connect, $query);

$jenis_aset = "";

while($row2 = mysqli_fetch_array($result2))
{
    $jenis_aset = $jenis_aset."<option>$row2[1]</option>";
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
    <a href="index.php" class="logo">
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
		  <?php require('../../homealert.php'); ?>
		  
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/photoSafwan.jpg" class="user-image" alt="User Image">
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
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

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
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/photoSafwan.jpg" class="img-circle" alt="User Image">
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
		<li class="treeview">
          <a href="../../homeis.php">
            <i class="fa fa-envelope-o"></i> <span>i-Surat</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="dafsuratkeluar.php"><i class="fa fa-circle-o"></i> Daftar Surat Keluar</a></li>
            <li><a href="../tables/laporanis.php"><i class="fa fa-circle-o"></i> Rekod Surat Keluar</a></li>
          </ul>
        </li>
		<?php
		if(($lvl == "1") || ($lvl == "5")) {
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
		<?php }	?>
		<?php
		if($department == "6"){
		?>
		<li class="treeview">
          <a href="../../homeip.php">
            <i class="fa fa-credit-card"></i> <span>i-Pay</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="dafpaycert.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i> Payment Cert Generate</a></li>
            <li><a href="../tables/laporanip.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i> Laporan</a></li>
          </ul>
        </li>
		<?php }	?>
		<li class="treeview">
          <a href="../../homeadu.php">
            <i class="fa fa-commenting"></i> <span>i-Aduan</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="dafadu.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i> Borang Aduan</a></li>
            <li><a href="../tables/laporanadu.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i> Rekod Aduan</a></li>
          </ul>
        </li>
		<!--<li>
          <a href="pages/index.php">
            <i class="fa fa-book"></i> <span>iDokumen</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>-->
		
		<li class="treeview active">
          <a href="homeadu.php">
            <i class="fa fa-briefcase"></i> <span>i-Aset</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			<li class="active"><a href="../forms/dafaset.php"><i class="fa fa-circle-o"></i> Daftar Aset</a></li>
			<li><a href="../tables/laporanas.php"><i class="fa fa-circle-o"></i> Rekod Aset</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Tetapan</a></li>
          </ul>
        </li>
		
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
        <li><a href="../../homeas.php"><i class="fa fa-dashboard"></i> i-Aset</a></li>
        <li class="active">Daftar Aset</li>
      </ol>
    </section>
					
    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-md-0">
		</div>
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Aset</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="dafasetcheck.php" method="post">
              <div class="box-body">
			  
			  	<!-- Tarikh -->
				<div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tarikh</label>
                  <input type="text" class="form-control" id="tarikh_daftar" name="tarikh_daftar" value="<?php echo date("Y-m-d");?>" readonly>
                </div>
                </div>
				
			    <!-- Kategori -->
				<div class="col-md-5">
                <div class="form-group">
                  <div class="form-group">
                  <label for="Kategori">Kategori</label>
                  <select class="form-control" id="kategori" name="kategori">
				  <?php
				  $sqlL = mysql_query("SELECT * FROM kategori_aset
						ORDER BY kategori_aset ASC");
				  				  
				  $countL = mysql_num_rows($sqlL);
				  if($countL > 0)
				  {
					$off = 0;
					$i = 1 + $off;
					 while($rowL = mysql_fetch_array($sqlL)) {
					 echo '
							<option>'.$rowL['kategori_aset'].'</option>							
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
                  <select class="form-control" id="jenis" name="jenis">
				  <?php
				  $sqlL = mysql_query("SELECT * FROM jenis_aset
						ORDER BY jenis_aset ASC");
				  				  
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
				
				<!-- No Siri -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">No. Siri/ No. Plat</label>
				  <!--<div class="col-md-2">-->
				  <input type="text" class="form-control" id="no_siri" name="no_siri" placeholder="No. Siri/ No. Plat Kenderaan" required>
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
				  <input type="text" class="form-control" id="tahun_beli" name="tahun_beli" placeholder="Tahun/ Tarikh Beli" required>

                </div>
				</div>
				
				<!-- Harga Pembelian -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Harga Pembelian</label>
                  <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="RM " required>
                </div>
				</div>
				
				<!-- Warna -->
				<div class="col-md-5">
				<div class="form-group">
                  <label for="exampleInputPassword1">Warna</label>
				  <!--<div class="col-md-2">-->
				  <input type="text" class="form-control" id="warna" name="warna" placeholder="Warna Aset" required>

                </div>
				</div>
				
				<div class="form-group">
                  <input type="hidden" class="form-control" id="id_aset" name="id">
                </div>
				</div>
				<!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Daftar</button>
              </div>
              
            </form>
          </div>
          <!-- /.box -->
        </div>
		<div class="col-md-2">
		</div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <!--<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>-->
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Ketetapan Admin</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa  fa-user-plus bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Pendaftaran Pengguna Sistem</h4>

                <p>Perlu daftar untuk login dan maklumat pengguna</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Senarai Maklumat Pengguna</h4>

                <p>Paparan / Kemaskini</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-cart-plus bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Pendaftaran Barangan Penyelenggaraan</h4>

                <p>Perkakasan/Perisian/Pengkalan Data / DLL</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-navicon bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Senarai Barangan Penyelenggaraan</h4>

                <p>Paparan / Kemaskini</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
	  
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
<?php
}else{
header('Location: ../../index.php'); 
}
?>