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
		<li>
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
		<li>
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
		<li>
          <a href="../../homeadu.php">
            <i class="fa fa-commenting"></i> <span>i-Aduan</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="../dafadu.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i> Borang Aduan</a></li>
            <li><a href="../tables/laporanadu.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-circle-o"></i> Rekod Aduan</a></li>
          </ul>
        </li>
		<li  class="treeview active">
          <a href="homeaset.php">
            <i class="fa fa-briefcase"></i><span>i-Aset</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="dafaset.php"><i class="fa fa-circle-o"></i> Daftar Aset</a></li>
            <li><a href="../tables/laporanas.php"><i class="fa fa-circle-o"></i> Rekod Aset</a></li>
			 <li class="active"><a href="../../hometetapan.php"><i class="fa fa-circle-o"></i> Tetapan</a></li>
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
        Daftar Jenis Aset 
        <small>i-Aset</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../hometetapan.php"><i class="fa fa-dashboard"></i> i-Aset</a></li>
        <li class="active">Aset</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-md-6">
		</div>
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Jenis Aset Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
			
			 <!-- Kategori-->
				<div class="col-md-5">
                <div class="form-group">
                  <div class="form-group">
                  <label for="Kategori">Kategori</label>
                  <select class="form-control" id="kategori" name="kategori">
				  <?php
				  $sqlL = mysql_query("SELECT * FROM kategoritps ORDER BY id_kategori ASC");
				  				  
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
			
			<!--$namerole = $_SESSION['namerole'];-->
			<!--<option>'.$rowL['nama_kategori'].'</option>-->	
			
               <!-- Nama Aset -->
				<div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Aset: </label>
                  <input type="text" style="text-transform:uppercase" class="form-control" id="jenis_aset" name="jenis_aset">
				 
				<!--1</br>
				<label for="InputJenisKategori">Jenis Servis: </label>
				</br>
               <select name = "dropdown" id="InputJenisKategori" >
                             <option value="Perlu Servis">Perlu Servis</option>
                                 <option value="Tidak Perlu Servis">Tidak Perlu Servis</option>
                                      
                  
				 </select-->
				 
                </div>
				</div>
				
              <!-- /.box-body -->
</br>
</br>
</br>
</br>
              <div class="box-footer">
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Daftar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

         

        </div>
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
	
<!-----------------------------------------------------------------------INSERT REKOD--------------------------------------------------------------------------------------------->
<?php

//Keluarkan notification untuk mesej berjaya
function paparMesejBerjayaAset($idasetFF){
	
	echo '<script type="text/javascript">alert("Kategori berjaya ditambah.");
				window.location="jenisAset.php";</script>';
}

//Keluarkan notification untuk mesej GAGAL
function paparMesejGagal(){
	
	echo "<script type='text/javascript'>\n";
       	echo "alert('Maaf. Tambah Kategori gagal. RALAT');\n";
       	echo "history.go(-1);\n";
       	echo "</script>";	
		exit();		               
}

//Keluarkan notification untuk mesej GAGAL
function paparMesejGagal1(){
	
	  echo "<script type='text/javascript'>\n";
       	echo "alert('Maaf. Permohonan anda gagal untuk ditambah.');\n";
       	  echo "history.go(-1);\n";
       	    echo "</script>";	
		      exit();		               
}


//post setiap id didalam form

//insert into database penumpang	
if(isset($_POST['submit']))
{		

	
	
	$InputKategori = isset ($_POST['kategori']) ? $_POST['kategori'] : '';
	//$dropdown = isset($_POST['dropdown']) ? $_POST['dropdown'] : '';
	$InputJenis = isset($_POST['jenis_aset']) ? $_POST['jenis_aset'] : '';
	
//$IDKategori = $_SESSION['namerole'];

	try
	{
							
		$sql = mysql_query("SELECT * FROM jenis_aset WHERE upper(jenis_aset) LIKE '%$InputJenis%' ");
		
		
		if(mysql_numrows($sql) > 0)
		{
		
			
//echo $idasetFF =" Kategori sudah ada...!" ;
	            echo "<script type='text/javascript'>\n";
		          echo "alert('Kategori dah wujud..!');\n";
	                echo "history.go(-1);\n";
       	              echo "</script>";	
		                exit();		    
		
		
		}else{
	
			
			try
			{
		       //4 $id_kategori=mysql_query("SELECT id_kategori FROM kategoritps INNER JOIN jenis_aset ON kategoritps.id_kategori=jenis_aset.id_kategori");
				$sql1 = "INSERT INTO jenis_aset ( id_kategori,jenis_aset) 
				VALUES ('$InputKategori','$InputJenis')";				
				$query1 = mysql_query($sql1) or die("Error: " . mysql_error());	

				$sql11 = mysql_query("SELECT * FROM jenis_aset WHERE jenis_aset = '$InputJenis'");
		
				if(mysql_numrows($sql11) > 0)
				{
					paparMesejBerjayaAset("Tambah Kategori Berjaya...!");
				}
				else
				{
					paparMesejGagal1();
				}
		
			}
			catch(Exception $e){
				echo 'Caught exception check condition applied: ',  $e->getMessage(), "\n";
			}
		
		}
		
		

	}
	catch(Exception $e){
		echo 'Caught exception insert: ',  $e->getMessage(), "\n";
	}
}
else{		 	
	// mesej gagal dipaparkan /
	 function died($error) 
	 {
		paparMesejGagal();
	 }
}
?>
<!------------------------------------------------------------------DELETE RECORD--------------------------------------------------------------------------------->



<!-----------------------------------------------------------------------UPDATE RECORD------------------------------------------------------------------------------->	




<!----------------------------------------------------------------------VIEW REKOD------------------------------------------------------------------------------------------------->
	 <!-- Content Wrapper. Contains page content -->
 <!-- <div class="content-wrapper">-->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rekod Jenis Aset
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
		
        <!-- left column -->
        <div class="col-md-0">
		  <?php
		  $sqlAP = mysql_query("SELECT * FROM jenis_aset
						ORDER BY id ASC");					
		 /* $rowYear = mysql_fetch_array($sqlAP);
		  $tarikhsurat = $rowYear['tarikh_surat'];
		  $tarikhsuratY = date("Y", strtotime($tarikhsurat)); */
		  ?>
          <div class="box box-success">
            <div class="box-header with-border">
			
			  <div class="col-md-12">
        <div class="form-group">
        
			
			
              <h3 class="box-title"><strong>Senarai </strong><strong>Jenis</strong><strong> Aset </strong><strong> berdaftar </strong><strong> dalam sistem </strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			
			
			

			<form action="../../tcpdf/laporanPDF/LaporanSenaraiJenis.php" name="form2" method="post" target="_blank">
		
			<?php
			$sqlAP = mysql_query("SELECT * FROM jenis_aset ORDER BY id ASC");
			$sqlAP = mysql_query("SELECT * FROM jenis_aset INNER JOIN kategoritps ON jenis_aset.id_kategori=kategoritps.id_kategori");			
			$countAP = mysql_num_rows($sqlAP);
			if($countAP > 0)
			{
			?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				 <!-- <th>Bil</th> -->
				  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Bil: activate to sort column ascending" style="width: 150px;text-align:center">Bil   <i class="fa fa-sort-amount-desc"></i></th>
                <!--  <th>Id Kategori</th>-->
				 <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Id Kategori: activate to sort column ascending" style="width: 210px;">Id Kategori    <i class="fa fa-sort-amount-desc"></i></th></th>-->
                		  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center"> Kategori    <i class="fa fa-sort-alpha-desc"></i></th></th>
                 <!-- <th>Jenis </th> -->
				  <!--  <th>Id Kategori</th>-->
				 <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Id Kategori: activate to sort column ascending" style="width: 210px;">Id Kategori    <i class="fa fa-sort-amount-desc"></i></th></th>-->
                		  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center"> Jenis <i class="fa fa-sort-alpha-desc"></i></th></th>
                  <th style="width:300px;text-align:center">Kemaskini</th>
				  <th style="width:300px;text-align:center">Padam</th>
                
				
				
				
				
				
				
                </tr>
                </thead>
                <tbody>
				<?php				  
				  
					$off = 0;
					$i = 1 + $off;
					 while($rowAP = mysql_fetch_array($sqlAP)) {
					 echo '
							<tr>
							<td data-title="Bil" style="text-align:center">'.$i.'</td>													
							
							
							<td data-title="Kategori Aset" >'.$rowAP['nama_kategori'].'</td>
							
							<td data-title="Jenis Aset" style="text-transform:uppercase">'.$rowAP['jenis_aset'].'</td>
						 
							<td data-title="Kemaskini" style="text-align:center"><a href="updatejenisaset.php?id='.$rowAP['id'].'"><i class="fa fa-pencil"></i></a></td> 
							
							
						<td style="text-align:center"><a href="deletejenisaset.php?id='.$rowAP['id'].'" title="Padam" class="fa fa-trash" Onclick="return ConfirmDelete()"></a>

							</tr>
						';
					 
					 $i++;
					 }
					 /*<td style="text-align:center"><a href="deletejenisaset.php?id='.$rowAP['id'].'" title="Padam" class="fa fa-trash" onclick="return Confirmation();"></a>*/
					 
					/* <li><a href="pages/forms/dafadu.php"><i class="fa fa-pencil"></i> Daftar Aset</a></li>
							 <li><a href="pages/forms/dafadu.php"><i class="fa fa-trash"></i> Daftar Aset</a></li> 
					 <td data-title="Id Kategori">'.$rowAP['id_kategori'].'</td>*/
					 
					 
					 
				  ?>
                </tbody>
                <!--<tfoot>
                <tr>
                  <th>Bil</th>
                  <th>Tarikh</th>
                  <th>No. Rujukan Surat</th>
                  <th>Pengirim</th>
                  <th>Penerima</th>
				  <th>Perkara / Tajuk Surat</th>
				  <th>Kaedah Penghantaran</th>
				  <th>Remarks</th>
                </tr>
                </tfoot>-->
              </table>
			  <?php
			  }else{
				  echo '				  
					<span>Tiada Rekod No Surat Keluar Yang Dimohon.</span>				  
				  ';
			  }
		      ?>
			
			   <!-- <button type="button" class="btn bg-maroon btn-flat margin" type="submit">Cetak</button-->
				<td width="25%"><input class="btn btn-success" type="submit" value="Cetak"></td>
			  </form>
            </div>
            <!-- /.box-body -->
			</div>
          </div>
		  </div>
          <!-- /.box -->
		  
		  
		  <!--Data Penyelenggaraan Berjadual -->
		  <!--<div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Data <strong>Surat Masuk</strong> Dari Tahun <strong>?</strong> Hingga <strong>?</strong></h3>
            </div>
            <!-- /.box-header 
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Bil</th>
                  <th>Tarikh</th>
                  <th>Agensi/Jabatan</th>
                  <th>Perkara</th>
                  <th>No. Rujukan</th>
				  <th>No. Rujukan MICTH</th>
				  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                  <td>C</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5
                  </td>
                  <td>Win 95+</td>
                  <td>5.5</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 6
                  </td>
                  <td>Win 98+</td>
                  <td>6</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet Explorer 7</td>
                  <td>Win XP SP2+</td>
                  <td>7</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>AOL browser (AOL desktop)</td>
                  <td>Win XP</td>
                  <td>6</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 1.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.7</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 1.5</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 2.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 3.0</td>
                  <td>Win 2k+ / OSX.3+</td>
                  <td>1.9</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Camino 1.0</td>
                  <td>OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Camino 1.5</td>
                  <td>OSX.3+</td>
                  <td>1.8</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape 7.2</td>
                  <td>Win 95+ / Mac OS 8.6-9.2</td>
                  <td>1.7</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape Browser 8</td>
                  <td>Win 98SE+</td>
                  <td>1.7</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape Navigator 9</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.0</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.1</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.1</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.2</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.2</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.3</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.3</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.4</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.4</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.5</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.5</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Presto</td>
                  <td>Nokia N800</td>
                  <td>N800</td>
                  <td>-</td>
                  <td>A</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                <tr>
                  <td>Presto</td>
                  <td>Nintendo DS browser</td>
                  <td>Nintendo DS</td>
                  <td>8.5</td>
                  <td>C/A<sup>1</sup></td>
				  <td>X</td>
				  <td>X</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Bil</th>
                  <th>Tarikh</th>
                  <th>Daripada</th>
                  <th>Perkara</th>
                  <th>No. Surat</th>
				  <th>No. Rujukan MICTH</th>
				  <th>Tindakan</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body 
          </div>-->
          <!-- /.box -->
		  
		  
        </div>
        <!-- /.col -->
			<!--<script>

				 function Confirmation() {
					if (!confirm("Anda pasti ingin padam jenis aset?"'.$rowAP['id'].')) {
						return false;
					}
				}

			</script>-->
		
<script>
		function ConfirmDelete() {
        return confirm("Anda pasti ingin padam?");
      }
</script>
		
		
		
      </div>
      <!-- /.row -->
    
    <!-- /.content -->
	</div>
	
</section>
	
	</div>
	
  <!--</div>-->
  <!-- /.content-wrapper -->
 

	
  
  <!----------------------------------------------------------------------FOOTER-------------------------------------------------------------------------------->
  

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