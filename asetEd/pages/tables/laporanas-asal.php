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
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<style type="text/css">

</style>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../homeaset.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>i</b>SM</span>
      <!-- logo for regular state and mobile devices -->
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
				  <!--- Manager
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
        <!--<li>
          <a href="../../homeic.php">
            <i class="fa fa-external-link"></i> <span>i-Cuti</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
		<li>
          <a href="pages/index.php">
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
            <li><a href="../forms/dafsuratkeluar.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Daftar Surat Keluar</a></li>
            <li><a href="laporanis.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Rekod Surat Keluar</a></li>
          </ul>
        </li>-->
		<?php
		if(($lvl == "1") || ($lvl == "5")) {
		?>
		<!--<li class="treeview">
          <a href="../../homekaki.php">
            <i class="fa fa-odnoklassniki"></i> <span>i-Kakitangan</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="infostaf.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Maklumat Kakitangan</a></li>
          </ul>
        </li>-->
		<?php }	?>
		<?php
		if($department == "6"){
		?>
		<!--<li>
          <a href="../../homeip.php">
            <i class="fa fa-credit-card"></i> <span>i-Pay</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="../forms/dafpaycert.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Payment Cert Generate</a></li>
            <li><a href="laporanip.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Laporan</a></li>
          </ul>
        </li>-->
		<?php }	?>
		<!--<li>
          <a href="../../homeadu.php">
            <i class="fa fa-commenting"></i> <span>i-Aduan</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="../forms/dafadu.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Borang Aduan</a></li>
            <li><a href="laporanadu.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Rekod Aduan</a></li>
          </ul>
        </li>-->	
		
		<li class="treeview active">
          <a href="../../homeaset.php">
            <i class="fa fa-briefcase"></i> <span>i-Aset</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu ">
            <li><a href="../forms/dafaset.php"><i class="fa fa-circle-o"></i> Daftar Aset</a></li>
            <li class="active"><a href="../tables/laporanas.php"><i class="fa fa-circle-o"></i> Rekod Aset</a></li>
			<li><a href="../../hometetapan.php"><i class="fa fa-circle-o"></i> Tetapan</a></li>
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
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
        <small>i-Aset</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../homeaset.php"><i class="fa fa-dashboard"></i> i-Aset</a></li>
        <li class="active">Rekod Aset</li>
      </ol>
    </section>

    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
		  <?php
		  //$sqlAP = mysql_query("SELECT * FROM tbl_daftar_aset INNER JOIN kategoritps ON tbl_daftar_aset.kategori_aset=kategoritps.id_kategori
						//ORDER BY id ASC");	
						
						
						
		//------------------------MASALAH DEKAT SINI-----------------------------------------//				
         // $sqlAP = mysql_query("SELECT * FROM tbl_daftar_aset DESC");//
			$sqlAP = mysql_query("SELECT * FROM tbl_daftar_aset 
			INNER JOIN kategoritps 
			ON tbl_daftar_aset.kategori_aset=kategoritps.id_kategori 
			ORDER BY tbl_daftar_aset.id DESC", $conn2);
		 
		 ?>

		  
		  
		  
		  
          <!--<div class="box box-success">
            <div class="box-header">
			<h3 class="box-title">Data <strong>Pengurusan Aset </strong>tahun <strong><?php echo date('Y');?></strong></h3>
            </div>-->
            
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Data <strong>Pengurusan Aset </strong>tahun <strong><?php echo date('Y');?></strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<form action="../../tcpdf/laporanPDF/laporanaspdf.php" name="form2" method="post" target="_blank">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Bil</th>
                  <th>Kategori Aset</th>
                  <th>Jenis Aset</th>
                  <th>No. Siri/ Plat</th>
				  <th>No. Aset</th>
                  <th>Nama Aset</th>
				
				  <th>Lokasi Penempatan</th>
				  <th>Cukai Jalan Tamat</th>
				  <th>Tindakan</th>

                </tr>
                </thead>
                <tbody>
				
				<?php				  
				  
					$off = 0;
					$i = 1 + $off;
					 while($rowAP = mysql_fetch_array($sqlAP)) {
					 echo '
							<tr role="row" class="odd">
							<td data-title="Bil" align="center">'.$i.'</td>
							<td data-title="Kategori">'.$rowAP['nama_kategori'].'</td>
							<td style="text-transform:uppercase" data-title="Jenis Servis">'.$rowAP['jenis_aset'].'</td>
							<td data-title="No. Siri/ Plat">'.$rowAP['no_siri'].'</td>
							<td data-title="No. Aset">'.$rowAP['no_aset'].'</td>	
							<td data-title="Nama Aset" >'.$rowAP['nama_aset'].'</td>
							<td data-title="Lokasi" >'.$rowAP['lokasi'].'</td>
							<td data-title="Cukai Jalan" >'.$rowAP['cukai_jalan'].'</td>

							<td align="center"><a href="kemaskiniaset.php?id='.$rowAP['id'].'"  title="Kemaskini" class="fa fa-pencil"></a>
                            &nbsp;&nbsp;
							<a href="details.php?id='.$rowAP['id'].'"  title="info lanjut" class="fa fa-info-circle"></a>
							&nbsp;&nbsp;
							<a href="log.php?no_siri='.$rowAP['no_siri'].'"  title="Log" class="fa fa-file-text-o"></a>
							&nbsp;&nbsp;
							<a href="padamaset.php?id='.$rowAP['id'].'"  title="Padam" class="fa fa-trash-o" onclick="return ConfirmDelete();"></a>

							</tr>
						';
						
						$i++;
					 }
				  ?>	

   <!--&nbsp;&nbsp;&nbsp;
						   <a href="log.php?id='.$rowAP['id'].'"  title="log" class="fa fa-file-text-o"></a>-->
                         
                </tbody>
              </table>
			  
			   <?php
			  }else{
				  echo '				  
					<span>Tiada Rekod Penyelenggaraan Permohonan Yang Sudah Ditutup.</span>				  
				  ';
			  }
		      ?>
			  
			  <button type="submit" class="btn bg-maroon btn-flat margin" >Cetak</button>
			  </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		
		<!--SCRIPT COMMAND FOR POP-UP CONFIRMATION DELETE BOX-->				
				<script>
		                 function ConfirmDelete() {
                              return confirm("Anda pasti ingin menghapuskan data tersebut?");
                                                   }
                </script>
		
		
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

</body>
</html>
