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
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- <meta http-equiv="refresh" content="5"> -->

  <!-- Favicons -->
  <link href="assets/img/igclogo.png" rel="icon">
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
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
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
</style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center">
      <a href="user.php" class="logo d-flex align-items-center"
        style="
          width: 100px;" >
        <img src="assets/img/micth.png" alt="">
       <!-- <span class="d-none d-lg-block">I-Mobile</span> -->
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
            <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['user']['First_Name']; ?></span>
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
              <a class="dropdown-item d-flex align-items-center" href="iout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link " href="accessSSOdefault.php">
          <i class="bi bi-grid"></i>
          <span>Access View</span>
        </a>
      </li><!-- End Dashboard Nav -->

	  <li class="nav-item">
        <a class="nav-link collapsed" href="userSSOdefault.php">
          <i class="bi bi-pencil-square"></i>
          <span>Staff List</span>
        </a>
      </li>

      <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>System</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
        <?php
            $user_name = $_SESSION['user']['user_name'];
            $sql = "SELECT access_isurat, access_aset, access_imobile, access_eoutstation, access_tower FROM empmaininfo WHERE user_name = '$user_name'";
            $result = mysqli_query($db, $sql);
            
            // Check if the query was successful
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                ?>      
                        <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                            <?php
                            // Conditionally display navigation items based on the retrieved access levels
                            if ($row['access_isurat'] == 1) {
                                echo '<li><a href="#"><i class="bi bi-circle"></i><span class="text-success">I-surat</span></a></li>';
                            }
                            if ($row['access_aset'] == 1) {
                                echo '<li><a href="#"><i class="bi bi-circle"></i><span class="text-success">Asset</span></a></li>';
                            }
                            if ($row['access_imobile'] == 1) {
                                echo '<li><a href="#"><i class="bi bi-circle"></i><span class="text-success">Booking</span></a></li>';
                            }
                            if ($row['access_eoutstation'] == 1) {
                                echo '<li><a href="#"><i class="bi bi-circle"></i><span class="text-success">E-Outstation</span></a></li>';
                            }
                            if ($row['access_tower'] == 1) {
                                echo '<li><a href="#"><i class="bi bi-circle"></i><span class="text-success">Tower Management System</span></a></li>';
                            }
                            ?>
                        </ul>
                <?php
            } else {
                // Handle database query error
                echo "Error: " . mysqli_error($connection);
            }
            ?>
        </ul>
      </li>
    </ul>

  </aside><!-- End Sidebar-->
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Welcome, <strong><?php echo $_SESSION['user']['First_Name']; ?></strong></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="user.php">Staff List</a></li>
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
            <div class="sb">
            <div class="card-body">

              <h5 class="card-title"><strong>Staff List</strong><br/>
				<!--   <span class="text-danger">*Every staff must return daily the car key before 5.30pm.</span> -->
			        </h5>
			  
              <!-- Default Table -->
              <div class="row">

<?php
  $sqlAP = "SELECT `Internal_Id`,CONCAT(`First_Name`, ' ', `Last_Name`) AS `Full_Name`,`Email`,`Mobile_phone`,`Department`,`user_name`,`Active_Inactive` 
            FROM `empmaininfo` 
            ORDER BY `Department` ASC, `Internal_Id` ASC ";					
?>
<div class="box-header with-border">
  <div class="col-md-12">
    <!-- /.box-header -->
    <div class="box-body" style="margin-top: 10px">
      <form action="../../tcpdf/laporanPDF/LaporanSenaraiJenis.php" name="form2" method="post" target="_blank">
        <?php
        
        //$sqlAP = mysql_query("SELECT * FROM jenis_aset ORDER BY id ASC");
        $sqlAP = "SELECT `Internal_Id`,CONCAT(`First_Name`, ' ', `Last_Name`) AS `Full_Name`,`Email`,`Mobile_phone`,`Department`,`user_name`,`Active_Inactive` 
        FROM `empmaininfo`
        WHERE Department = '{$_SESSION['user']['Department']}'
        ORDER BY `Department` ASC, `Internal_Id` ASC ";	

        $resultAP = mysqli_query($db, $sqlAP);
        if ($resultAP !== false && mysqli_num_rows($resultAP) > 0) {
        ?>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Bil: activate to sort column ascending" style="width: 150px;text-align:center">#
                  <i class="fa fa-sort-amount-desc"></i>
                </th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 300px;text-align:center">ID
                  <i class="fa fa-sort-alpha-desc"></i>
                </th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="First_Name + Last_Name: activate to sort column ascending" style="width: 300px;text-align:center">NAME
                  <i class="fa fa-sort-alpha-desc"></i>
                </th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Status : activate to sort column ascending" style="width: 300px;text-align:center">STATUS
                  <i class="fa fa-sort-alpha-desc"></i>
                </th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 300px;text-align:center">DEPARTMENT
                  <i class="fa fa-sort-alpha-desc"></i>
                </th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 300px;text-align:center">EMAIL
                  <i class="fa fa-sort-alpha-desc"></i>
                </th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No telefon: activate to sort column ascending" style="width: 300px;text-align:center">MOBILE PHONE
                  <i class="fa fa-sort-alpha-desc"></i>
                </th>
                
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
                    <td data-title="ID" >'.$rowAP['Internal_Id'].'</td>
                    <td data-title="Full Name" >'.$rowAP['Full_Name'].'</td>
                    <td data-title="Status" >'.$rowAP['Active_Inactive'].'</td>
                    <td data-title="Department" >'.$rowAP['Department'].'</td>
                    <td data-title="Email" >'.$rowAP['Email'].'</td>
                    <td data-title="Mobile Phone" >'.$rowAP['Mobile_phone'].'</td>

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
</section>
              <!-- End Default Table Example -->
            </div>
          </div>
              </div>
            </div>

</div>

    </section>

  </main><!-- End #main -->

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ASSET SYSTEM</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
       <a href="https://www.micth.com//">MELAKA ICT HOLDINGS SDN. BHD.</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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