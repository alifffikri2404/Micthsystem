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


// //Check role
// if($lvl == "1")
// {
// 	$firstname = "Admin";
// }
// if($lvl <> "1")
// {
// 	$firstname = $firstname1;
// }

	date_default_timezone_set("Asia/Bangkok");
	$cM = date("m");
	$cY = date("Y");
	$cDate = date("Y-m-d");
							
	
// if(($idp<>'')&&($lvl<>'')){

  require('../../functions.php'); 

 
 if(isset($_POST['view'])){
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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Asset Category & Type</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 5.3.3 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-5.3.3-dist/css/bootstrap.min.css">

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

  <!-- Favicons -->
  <link href="../../assets/img/micthlogo.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="../../https://fonts.gstatic.com" rel="preconnect">
  <link href="../../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
.dataTables_wrapper .dataTables_paginate .paginate_button {
  border: 1px solid #ccc;
  background-color: #f2f2f2;
}

.pagination>li>a{
  background: transparent;
}

.form-inline .form-control {
  display: inline-block;
  width: auto;
  vertical-align: middle;
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
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo "Me";?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo $_SESSION['First_Name'];?></h6>
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
        <a href="../../hometetapan.php" class="active">
          <i class="bi bi-gear-fill" style="font-size: 1em; background-color: transparent"></i><span>Settings</span>
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
    <h1>Category & Type</strong></h1>
    <nav>
      <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
        <li class="breadcrumb-item"><a href="../../homeaset.php">Home Page</a></li>
        <li class="breadcrumb-item"><a href="../../hometetapan.php">Settings</a></li>
        <li class="breadcrumb-item active">Category & Type</li>
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
      <div class="col-lg-3">
        <div class="card top-selling">
          <div class="sb">
            <div class="card-body" style="padding: 0px 20px 0px 20px">
              <h5 class="card-title"><strong>NEW CATEGORY & TYPE</strong><br/>

              <div class="col-lg-11 col-xs-6" style="padding-left: 0px">
                <!-- small box for category -->
                <div class="small-box" style="margin-top: 20px; border-radius: 20px 20px;
                  background-color: #83B582; color: #fff">
                  <div class="inner">
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 32px;">Category</h3>
                  </div>
                  <div class="icon">
                    <i class="bi bi-archive-fill" style="font-size: 0.75em"></i>
                  </div>
                  <a href="#modalCategory" data-bs-toggle="modal" data-bs-target="#modalCategory" class="small-box-footer" style="background-color: transparent; padding: 10px">Register New Category <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-11 col-xs-6" style="padding-left: 0px">
              <!-- small box for asset type -->
                <div class="small-box" style="margin-top: 20px; border-radius: 20px 20px;
                  background-color: #7077A1; color: #fff">
                  <div class="inner">
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 32px;">Asset Type</h3>
                  </div>
                  <div class="icon">
                    <i class="bi bi-tools" style="font-size: 0.75em"></i>
                  </div>
                  <a href="#modalType" data-bs-toggle="modal" data-bs-target="#modalType" class="small-box-footer" style="background-color: transparent; padding: 10px">Register New Type <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              
              <!-- modal for register new category -->
              <div class="modal fade" id="modalCategory" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Insert New Category</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form role="form" action="" method="post">
                      <div class="modal-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="InputNamaKategori" style="font-weight: 400; 'Nunito', sans-serif; margin-bottom: 10px">Category Name:</label>
                                <input type="text" style="text-transform:uppercase; font-size: 1.0rem; line-height: 1.0; height: 34px" 
                                  class="form-control" id="InputNamaKategori" name="InputNamaKategori" placeholder="CATEGORY NAME" required>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="InputKodKategori" style="font-weight: 400; 'Nunito', sans-serif; margin-bottom: 10px">Category Code:</label>
                                <input type="text" style="font-size: 1.0rem; line-height: 1.0; height: 34px" 
                                  class="form-control" id="InputKodKategori" name="InputKodKategori" placeholder="CODE" required>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit1" id="submit1" class="btn btn-primary">Register</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- End modal-->

              <!-- modal for register new asset type -->
              <div class="modal fade" id="modalType" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Insert New Asset Type</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form role="form" action="" method="post">
                      <div class="modal-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="Kategori" style="font-weight: 400; 'Nunito', sans-serif; margin-bottom: 10px">Category:</label>
                                  <select class="form-select" id="kategori" name="kategori" 
                                    style="font-size: 1.0rem; line-height: 1.0; height: 34px" placeholder="CATEGORY NAME" required>
                                    <?php
                                      $sqlL = "SELECT * FROM kategoritps ORDER BY id_kategori ASC";
                                      $result = mysqli_query($conn2,$sqlL);
                                      $countL = mysqli_num_rows($result);
                                      if($countL > 0)
                                      {
                                      
                                      $off = 0;
                                      $i = 1 + $off;
                                      while($rowL = mysqli_fetch_array($result)) {
                                      echo '<option value='.$rowL['id_kategori'].'>'.$rowL['nama_kategori'].'</option>';				 
                                      $i++;
                                      }
                                      }
                                    ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif; margin-bottom: 10px">Asset Name:</label>
                                <input type="text" style="text-transform:uppercase; font-size: 1.0rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="jenis_aset" name="jenis_aset" placeholder="ASSET NAME" required>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit2" id="submit2" class="btn btn-primary">Register</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- End modal-->

            </div>
          </div>
        </div>
      </div>

      <!-- Notification dan insert ke dalam category table -->
      <?php
        //Keluarkan notification untuk mesej berjaya
        function paparMesejBerjayaAsetA($idasetFF)
        {

          echo '<script type="text/javascript">alert("Category successfully added!");
        window.location="tetapanAset.php";</script>';
        }

        //Keluarkan notification untuk mesej GAGAL
        function paparMesejGagalA()
        {

          echo "<script type='text/javascript'>\n";
          echo "alert('Oops! Error occurred, failed to add new category!');\n";
          echo "history.go(-1);\n";
          echo "</script>";
          exit();
        }

        //Keluarkan notification untuk mesej GAGAL
        function paparMesejGagal1A()
        {

          echo "<script type='text/javascript'>\n";
          echo "alert('Sorry, your application failed to proceed.');\n";
          echo "history.go(-1);\n";
          echo "</script>";
          exit();
        }

        if (isset($_POST['submit1'])) {
        $InputNamaKategori = isset($_POST['InputNamaKategori']) ? mysqli_real_escape_string($conn2, $_POST['InputNamaKategori']) : '';
        $InputKodKategori = isset($_POST['InputKodKategori']) ? mysqli_real_escape_string($conn2, $_POST['InputKodKategori']) : '';

        try {
        $sqlA = "SELECT * FROM kategoritps WHERE nama_kategori = '$InputNamaKategori'";
        $resultA = mysqli_query($conn2, $sqlA);

        if (!$resultA) {
            die("Error: " . mysqli_error($conn2));
        }

        if (mysqli_num_rows($resultA) > 0) {
            echo "<script type='text/javascript'>\n";
            echo "alert('Category name or code already exists. Please register with a different category name or code!');\n";
            echo "</script>";
        } else {
            try {
                $sql1 = "INSERT INTO kategoritps (nama_kategori, kod) VALUES ('$InputNamaKategori', '$InputKodKategori')";
                $query1 = mysqli_query($conn2, $sql1);

                if (!$query1) {
                    die("Error: " . mysqli_error($conn2));
                }

                $sql11 = "SELECT * FROM kategoritps WHERE nama_kategori = '$InputNamaKategori' AND kod = '$InputKodKategori'";
                $result2 = mysqli_query($conn2, $sql11);

                if (!$result2) {
                    die("Error: " . mysqli_error($conn2));
                }

                if (mysqli_num_rows($result2) > 0) {
                    paparMesejBerjayaAsetA("Category successfully added!");
                } else {
                    paparMesejGagal1A();
                }
            } catch (Exception $e) {
                echo 'Caught exception check condition applied: ', $e->getMessage(), "\n";
            }
          }
        } catch (Exception $e) {
        echo 'Caught exception insert: ', $e->getMessage(), "\n";
        }
      } else {
      // mesej gagal dipaparkan /
        function died($error)
        {
          paparMesejGagalA();
        }
      }
      ?>
      

      <!-- Notification dan insert ke dalam asset type table -->
      <?php
      //Keluarkan notification untuk mesej berjaya
      function paparMesejBerjayaAsetB($idasetFF){
        
        echo '<script type="text/javascript">alert("Asset successfully added!");
              window.location="tetapanAset.php";</script>';
      }

      //Keluarkan notification untuk mesej GAGAL
      function paparMesejGagal1B(){
        
          echo "<script type='text/javascript'>\n";
              echo "alert('Sorry, your application failed to proceed.');\n";
                echo "history.go(-1);\n";
                  echo "</script>";	
                exit();		               
      }


      //post setiap id didalam form

      //insert into database penumpang	
      if(isset($_POST['submit2']))
      {		
        $InputKategori = isset ($_POST['kategori']) ? $_POST['kategori'] : '';
        //$dropdown = isset($_POST['dropdown']) ? $_POST['dropdown'] : '';
        $InputJenis = isset($_POST['jenis_aset']) ? $_POST['jenis_aset'] : '';
        
      //$IDKategori = $_SESSION['namerole'];

        try
        {				
          $sqlB = "SELECT * FROM jenis_aset WHERE upper(jenis_aset) LIKE '%$InputJenis%' ";
          
          $result1B = mysqli_query($conn2, $sqlB);
          if(mysqli_num_rows($result1B) > 0)
          {
            //echo $idasetFF =" Kategori sudah ada...!" ;
            echo "<script type='text/javascript'>\n";
            echo "alert('Asset already exist! Please insert other new asset name.');\n";
            echo "history.go(-1);\n";
            echo "</script>";	
            exit();		    
          }else{
          try
            {
              $sql1B = "INSERT INTO jenis_aset (id_kategori,jenis_aset) 
              VALUES ('$InputKategori','$InputJenis')";				
              
              $query1B = mysqli_query($conn2, $sql1B) or die("Error: " . mysqli_error($conn2));
              $sql11B = "SELECT * FROM jenis_aset WHERE jenis_aset = '$InputJenis'";
              $result3B = mysqli_query($conn2, $sql11B);
              if(mysqli_num_rows($result3B) > 0)
              {
                paparMesejBerjayaAsetB("Asset successfully added!");
              }
              else
              {
                paparMesejGagal1B();
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
      ?>

      <!-- table for category record -->
      <div class="col-lg-9">
        <div class="card top-selling">
          <div class="sb">
            <div class="card-body">
              <h5 class="card-title"><strong>CATEGORY RECORD</strong><br/>

              <!-- View register category record field form -->
              <div class="row">

              <?php
                $sqlAP = "SELECT * FROM kategoritps ORDER BY id_kategori ASC";
                $result2 = mysqli_query($conn2, $sqlAP);
              ?>
              <div class="box-header with-border">
                <div class="col-md-12">
                  <div class="box-body" style="margin-top: 10px">
                    <form action="../../tcpdf/laporanPDF/LaporanSenaraiKategori.php" name="form2" method="post" target="_blank">
                      <?php
                      $sqlAP = "SELECT * FROM kategoritps ORDER BY nama_kategori ASC";
                      $resultAP = mysqli_query($conn2, $sqlAP);
                      if ($resultAP !== false && mysqli_num_rows($resultAP) > 0) {
                      ?>
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Bil: activate to sort column ascending" style="width: 150px;text-align:center">No.
                                <i class="fa fa-sort-amount-desc"></i>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center">Category Name
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center">Category Code
                                <i class="fa fa-sort-amount-desc"></i>
                              </th>
                              <th style="width:300px; text-align:center">Update</th>
                              <th style="width:300px; text-align:center">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $off = 0;
                            $i = 1 + $off;
                            while ($rowAP = mysqli_fetch_array($resultAP)) {
                              echo '
                                <tr>
                                  <td data-title="Bil" style="text-align:center">' . $i . '</td>													
                                  <td data-title="Nama Jenis Kategori" style="text-transform:uppercase">' . $rowAP['nama_kategori'] . '</td>
                                  <td data-title="Kod Kategori" style="text-transform:uppercase; text-align:center;">' . $rowAP['kod'] . '</td>
                                  <td data-title="Kemaskini" style="text-align:center"><a href="updatetetapan.php?id_kategori=' . $rowAP['id_kategori'] . '"><i class="fa fa-pencil"></i></a></td> 
                                  <td style="text-align:center"><a href="delete.php?id_kategori=' . $rowAP['id_kategori'] . '" title="Padam" class="fa fa-trash" Onclick="return ConfirmDelete()"></a></td>
                                </tr>';
                              $i++;
                            }
                            ?>
                          </tbody>
                        </table>
                      <?php
                      } else {
                        echo '<span>No Record of Registered Assets.</span>';
                      }
                      ?>
                      <td width="25%"><input class="btn btn-success btn-lg" type="submit" value="Print" style="font-size: 15px"></td>
                    </form>
                  </div>
                </div>
              </div>
              <!--SCRIPT COMMAND FOR POP-UP CONFIRMATION DELETE BOX-->
              <script>
                function ConfirmDelete() {
                  return confirm("Are you sure you want to delete this data?");
                }
              </script>
              </div>

            </div>
          </div>
        </div>

    

        <!-- table for asset type record -->
        <div class="card top-selling">
          <div class="sb">
            <div class="card-body">
              <h5 class="card-title"><strong>ASSET TYPE RECORD</strong><br/>

              <!-- View register asset type record field form -->
              <div class="row">

              <?php
                $sqlAP = "SELECT * FROM jenis_aset
                ORDER BY jenis_aset ASC";					
              ?>
              <div class="box-header with-border">
                <div class="col-md-12">
                  <!-- /.box-header -->
                  <div class="box-body" style="margin-top: 10px">
                    <form action="../../tcpdf/laporanPDF/LaporanSenaraiJenis.php" name="form2" method="post" target="_blank">
                      <?php
                      //$sqlAP = mysql_query("SELECT * FROM jenis_aset ORDER BY id ASC");
                      $sqlAB = "SELECT * FROM jenis_aset 
                      INNER JOIN kategoritps 
                      ON jenis_aset.id_kategori = kategoritps.id_kategori";
                      $resultAB = mysqli_query($conn2, $sqlAB);
                      if ($resultAB !== false && mysqli_num_rows($resultAB) > 0) {
                      ?>
                        <table id="example2" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Bil: activate to sort column ascending" style="width: 150px;text-align:center">No.
                                <i class="fa fa-sort-amount-desc"></i>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center">Category
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Jenis Kategori: activate to sort column ascending" style="width: 300px;text-align:center">Type
                                <i class="fa fa-sort-alpha-desc"></i>
                              </th>
                              </th>
                              <th style="width:200px;text-align:center">Update</th>
                              <th style="width:200px;text-align:center">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $off = 0;
                              $i = 1 + $off;
                              while($rowAB = mysqli_fetch_array($resultAB)) {
                              echo '
                                <tr>
                                  <td data-title="Bil" style="text-align:center">'.$i.'</td>
                                  <td data-title="Kategori Aset" >'.$rowAB['nama_kategori'].'</td>
                                  <td data-title="Jenis Aset" style="text-transform:uppercase">'.$rowAB['jenis_aset'].'</td>
                                  <td data-title="Kemaskini" style="text-align:center"><a href="updatejenisaset.php?id=' . $rowAB['id'] . '"><i class="fa fa-pencil"></i></a></td> 
                                  <td style="text-align:center"><a href="deletejenisaset.php?id='.$rowAB['id'].'" title="Padam" class="fa fa-trash" Onclick="return ConfirmDelete()"></a>
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

              <!-- modal for update category -->
              <div class="modal fade" id="modalCategoryUpdate" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Category</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form role="form" action="" method="post">
                      <div class="modal-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif; margin-bottom: 10px">Category Name:</label>
                                <input type="text" style="text-transform:uppercase; font-size: 1.0rem; line-height: 1.0; height: 34px" 
                                  class="form-control" id="nama_kategori" name="nama_kategori" placeholder="CATEGORY NAME"
                                  placeholder="CATEGORY NAME" value="<?php echo $fetched_row['nama_kategori']; ?>" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif; margin-bottom: 10px">Category Code:</label>
                                <input type="text" style="font-size: 1.0rem; line-height: 1.0; height: 34px" 
                                  class="form-control" id="kod_kategori" name="kod_kategori" placeholder="CODE"
                                  placeholder="CATEGORY CODE" value="<?php echo $fetched_row['kod']; ?>" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- End modal-->

              <!-- modal for update asset type -->
              <div class="modal fade" id="modalTypeUpdate" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Asset Type</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form role="form" action="" method="post">
                      <div class="modal-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                              <label for="InputJenisKategori" style="font-weight: 400; 'Nunito', sans-serif; margin-bottom: 10px">Category Name:</label>
                              <input type="text" style="text-transform:uppercase; font-size: 1.0rem; line-height: 1.0; height: 34px"
                                class="form-control" name="nama_kategori" 
                                placeholder="CATEGORY NAME" value="<?php echo $fetched_row2['nama_kategori']; ?>" readonly />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputPassword1" style="font-weight: 400; 'Nunito', sans-serif; margin-bottom: 10px">Asset Name:</label>
                                <input type="text" style="text-transform:uppercase; font-size: 1.0rem; line-height: 1.0; height: 34px"
                                  class="form-control" id="jenis_aset" name="jenis_aset" placeholder="ASSET NAME">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Register</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- End modal-->

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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- jQuery 3 -->
  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 5.3.3 -->
  <script src="../../bower_components/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
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
    $(function() {
      $('#example1').DataTable()
      $('#example2').DataTable()
      $('#example3').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })
    })

  function myFunction() {
    window.print();
  }
  </script>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>
<?php
// }else{
// header('Location: index.php'); 
// }
?>