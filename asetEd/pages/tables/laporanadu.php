<?php
require('../../configadu.php');
session_start();
$idp = $_SESSION['idP'];
$lvl = $_SESSION['lvl'];

$firstname1 = $_SESSION['1stname'];
$lastname = $_SESSION['lastname'];
$empnumber = $_SESSION['empnumber'];
$department = $_SESSION['department'];
$namerole = $_SESSION['namerole'];

//check user;
/*$sqlu = mysql_query("SELECT
			tbl_employee.emp_nama as empnama,
			tbl_employee.emp_no as empno,
			tbl_employee.emp_department as department,
			tbl_employee.emp_jawatan as emp_jawatan,
			tbl_login.id as iduser,
			tbl_role.role as namerole
			FROM 
			tbl_employee
			INNER JOIN tbl_login 
			ON tbl_login.emp_no = tbl_employee.emp_no
			INNER JOIN tbl_role
			ON tbl_role.id = tbl_login.id_role
			WHERE tbl_login.id = '$idp'");

	if(mysql_numrows($sqlu) > 0)
    {
	
		$row = mysql_fetch_array($sqlu);
		$nama = $row['empnama']; 
		$empno = $row['empno']; 
		$department = $row['department']; 
		$jawatan = $row['emp_jawatan'];
		$iduser = $row['iduser'];
		$namerole = $row['namerole'];
		
		$_SESSION['name'] = $nama;
		$_SESSION['empno'] = $empno; 
		$_SESSION['department'] = $department;
		$_SESSION['namerole'] = $namerole;
		
	
	}*/

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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../home.php" class="logo">
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
          <img src="../../dist/img/photoSafwan.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $viewname;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Atas Talian</a>
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
		<li>
          <a href="../../homeis.php">
            <i class="fa fa-envelope-o"></i> <span>i-Surat</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="../forms/dafsuratkeluar.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Daftar Surat Keluar</a></li>
            <li><a href="laporanis.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Rekod Surat Keluar</a></li>
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
            <li><a href="infostaf.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Maklumat Kakitangan</a></li>
          </ul>
        </li>-->
		<?php }	?>
		<?php
		if($department == "6"){
		?>
		<li>
          <a href="../../homeip.php">
            <i class="fa fa-credit-card"></i> <span>i-Pay</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="../forms/dafpaycert.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Payment Cert Generate</a></li>
            <li><a href="laporanip.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Laporan</a></li>
          </ul>
        </li>
		<?php }	?>
		<li class="treeview active">
          <a href="../../homeadu.php">
            <i class="fa fa-commenting"></i> <span>i-Aduan</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="../forms/dafadu.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Borang Aduan</a></li>
            <li class="active"><a href="laporanadu.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i>Rekod Aduan</a></li>
          </ul>
        </li>
		
		<?php
		if($department == "1"){
		?>
		<li>
          <a href="../../homeaset.php">
            <i class="fa fa-briefcase"></i> <span>i-Aset</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
           <li><a href="pages/forms/dafaset.php"><i class="fa fa-circle-o"></i> Daftar Aset</a></li>
            <li><a href="pages/tables/laporanas.php"><i class="fa fa-circle-o"></i> Rekod Aset</a></li>
			 <li><a href="hometetapan.php"><i class="fa fa-circle-o"></i> Tetapan</a></li>
          </ul>
        </li>
			<?php }	?>
			
			
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
        <small>i-Aduan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> i-Aduan</a></li>
        <li class="active">Laporan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		  <?php
		  $sqlAP = mysql_query("SELECT * FROM tbl_mohon_aduan
						ORDER BY tarikh_aduan ASC");					
		  $rowYear = mysql_fetch_array($sqlAP);
		  $tarikhaduan = $rowYear['tarikh_aduan'];
		  $tarikhaduanY = date("Y", strtotime($tarikhaduan));
		  ?>
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Data <strong>Penyelenggaraan Permohonan</strong> dari tahun <strong><?php echo $tarikhaduanY; ?></strong> hingga tahun <strong><?php echo date('Y');?></strong></h3>
			  <button type="button" class="btn bg-maroon btn-flat margin" onclick="myFunction()">Cetak</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<?php
			$sqlAP = mysql_query("SELECT * FROM tbl_mohon_aduan
						WHERE status = 'close'
						ORDER BY tarikh_aduan DESC");
						
			$countAP = mysql_num_rows($sqlAP);
			if($countAP > 0)
			{
			?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Id Permohonan</th>
                  <th>Tarikh Permohonan</th>
                  <th>Tarikh Selesai</th>
                  <th>Aktiviti</th>
                  <th>Status</th>
                  <th>Pegawai Bertanggungjawab</th>
                </tr>
                </thead>
                <tbody>
				<?php				  
				  
					$off = 0;
					$i = 1 + $off;
					 while($rowAP = mysql_fetch_array($sqlAP)) {
					 echo '
							<tr>
							<td data-title="Permohonan Id">'.$rowAP['id_permohonan'].'</td>													
							<td data-title="Tarikh Permohonan">'.$rowAP['tarikh_aduan'].'</td>
							<td data-title="Tarikh Selesai">'.$rowAP['tarikh_tutup'].'</td>
							<td class="numeric" data-title="Perkara">'.$rowAP['kenyataan_aduan'].'</td>
							<td class="numeric" data-title="Status">'.$rowAP['status'].'</td>
							<td class="numeric" data-title="Kategori">'.$rowAP['kategori_aduan'].'</td>
							</tr>
						';
					 
					 $i++;
					 }
				  ?>				
                
                </tbody>
                <!--<tfoot>
                <tr>
				  <th>Id Permohonan</th>
                  <th>Tarikh Permohonan</th>
                  <th>Tarikh Selesai</th>
                  <th>Aktiviti</th>
                  <th>Status</th>
                  <th>Pegawai Bertanggungjawab</th>
                </tr>
                </tfoot>-->
              </table>
			  <?php
			  }else{
				  echo '				  
					<span>Tiada Rekod Penyelenggaraan Permohonan Yang Sudah Ditutup.</span>				  
				  ';
			  }
		      ?>
            </div>
            <!-- /.box-body -->
          </div>
		  
          <!-- /.box -->
		  
		  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2016-2018 <a href="https://micth.com">MICTH</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
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
<?php
}else{
header('Location: ../../index.php'); 
}
?>