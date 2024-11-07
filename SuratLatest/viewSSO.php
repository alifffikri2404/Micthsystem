<?php
include ('functions.php');
 if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}



if(isset($_GET['Internal_Id']))
{            
    $sql_query="SELECT `Internal_Id`,CONCAT(`First_Name`, ' ', `Last_Name`) AS `Full_Name`,
    `Email`,`Mobile_phone`,`Job_Title`,`Employment_Type`,`Manager`,`Department`,`Joining_Date`,
    `user_name`,`Active_Inactive`,`access_isurat`,`access_aset`,`access_imobile`,`access_eoutstation`,`access_tower` 
    FROM empmaininfo WHERE Internal_Id=".$_GET['Internal_Id'];
    
    
    $result_set=mysqli_query($db,$sql_query);
    $fetched_row=mysqli_fetch_array($result_set);
}
if(isset($_POST['btn-update']))
{
 // variables for input data
 $access_isurat = isset($_POST['access_isurat']) ? 1 : 0;
 $access_aset = isset($_POST['access_asset']) ? 1 : 0; 
 $access_imobile = isset($_POST['access_imobile']) ? 1 : 0; 
 $access_eoutstation = isset($_POST['access_eoutstation']) ? 1 : 0;
 $access_tower = isset($_POST['access_tower']) ? 1 : 0;

 // variables for input data

 // sql query for update data into database
 $sql_query = "UPDATE empmaininfo 
               SET access_isurat='$access_isurat', access_aset='$access_aset',
                   access_imobile='$access_imobile', access_eoutstation='$access_eoutstation',
                   access_tower='$access_tower' WHERE Internal_Id =".$_GET['Internal_Id'];
 
 // sql query for update data into database
	// sql query execution function
    
    if(mysqli_query($db,$sql_query))
    {
     ?>
     <script type="text/javascript">
     alert('Staff updated successfully!');
     window.location.href='accessSSO.php';
     </script>
     <?php
    }
    else
    {
     ?>
     <script type="text/javascript">
     alert('Oops! Unable to update. Please inform system admin.');
     </script>
     <?php
    }
    // sql query execution function
   }
   if(isset($_POST['btn-cancel']))
   {
    header("Location: accessSSO.php");
   }
	

?>
<!doctype html>
<html lang="en">
  <style>
 @media only screen and (max-width: 760px),
(min-device-width: 802px) and (max-device-width: 1020px) {

/* Force table to not be like tables anymore */
table, thead, tbody, th, td, tr {
    display: block;

}

.empty {
    display: none;
}

/* Hide table headers (but not display: none;, for accessibility) */
th {
    position: absolute;
    top: -9999px;
    left: -9999px;
}

tr {
    border: 1px solid #ccc;
}

td {
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50%;
}



/*
Label the data
*/
td:nth-of-type(1):before {
    content: "Sunday";
}
td:nth-of-type(2):before {
    content: "Monday";
}
td:nth-of-type(3):before {
    content: "Tuesday";
}
td:nth-of-type(4):before {
    content: "Wednesday";
}
td:nth-of-type(5):before {
    content: "Thursday";
}
td:nth-of-type(6):before {
    content: "Friday";
}
td:nth-of-type(7):before {
    content: "Saturday";
}


}

/* Smartphones (portrait and landscape) ----------- */

@media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
body {
    padding: 0;
    margin: 0;
}
}

/* iPads (portrait and landscape) ----------- */

@media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
body {
    width: 495px;
}
}

@media (min-width:641px) {
table {
    table-layout: fixed;
}
td {
    width: 33%;
}
}

.row{
margin-top: 20px;
}

.today{
background:yellow;
}

</style>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Feedback</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/igclogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">

    <a href="user.php" class="logo d-flex align-items-center"
        style="
          width: 100px;" >
        <img src="assets/img/micth.png" alt="">
       <!-- <span class="d-none d-lg-block">I-Mobile</span> -->
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>

    </div><!-- End Logo -->

    <div class="search-bar">
      <!--<form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>-->
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

       
     
        


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
        <a class="nav-link " href="accessSSO.php">
          <i class="bi bi-grid"></i>
          <span>Access View</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="userSSO.php">
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
      <h1>Staff Info</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="user.php">Home Page</a></li>
          <li class="breadcrumb-item active">Staff Info</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
            <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-body">
                          <?php
                         //$conn= mysqli_connect("localhost", "root", "", "idrive");
                         include('db_conn.php');
  
                        if (!$db) {
                        die("Connection failed: " . mysqli_connect_error());
                        }

                        $db->close();
                        ?> 
                        <br>   

               <?php echo(isset($msg))?$msg:""; ?>
               <!--<form class="row g-3" action="" method="post">-->
				<form class="row g-3" action="" method="post">
                  <div class="col-md-8">
                     <label for="" style= "font-size :20px" class="col-form-label-lg">Staff Name</label>
                       <input type="text" style= "font-size :20px" class="form-control form-control-lg" value="<?php echo $fetched_row['Full_Name']; ?>" readonly>
                   </div>

                   <span></span>

                   <div class="col-md-4">
                     <label for="" style= "font-size :20px" class="col-form-label-lg">Username</label>
                       <input type="text" style= "font-size :20px" class="form-control form-control-lg" value="<?php echo $fetched_row['user_name']; ?>" readonly>
                   </div>

                   <div class="col-md-4">
                     <label for="" style= "font-size :20px; margin-left: 20px;"class="col-form-label-lg">Email</label>
                       <input type="text" style= "font-size :20px; margin-left: 20px;" class="form-control form-control-lg" value="<?php echo $fetched_row['Email']; ?>" readonly>
                   </div>
        
                        <span></span>

                   <div class="col-md-4">
                     <label for="" style= "font-size :20px" class="col-form-label-lg">ID</label>
                       <input type="text" style= "font-size :20px" class="form-control form-control-lg" value="<?php echo $fetched_row['Internal_Id']; ?>" readonly>
                   </div>
                        
                   <div class="col-md-4">
                     <label for="" style= "font-size :20px; margin-left: 20px;" class="col-form-label-lg">Status</label>
                       <input type="text" style= "font-size :20px; margin-left: 20px;" class="form-control form-control-lg" value="<?php echo $fetched_row['Active_Inactive']; ?>" readonly>
                   </div>

                   <span></span>
                    
                   <div class="col-md-4">
                     <label for="" style= "font-size :20px" class="col-form-label-lg">Manager</label>
                       <input type="text" style= "font-size :20px" class="form-control form-control-lg" value="<?php echo $fetched_row['Manager']; ?>" readonly>
                   </div>

                   <div class="col-md-4">
                     <label for="" style= "font-size :20px; margin-left: 20px;" class="col-form-label-lg">Department</label>
                       <input type="text" style= "font-size :20px; margin-left: 20px;" class="form-control form-control-lg" value="<?php echo $fetched_row['Department']; ?>" readonly>
                   </div>

                   <span></span>
                  
                   <div class="col-md-4">
                     <label for="" style= "font-size :20px" class="col-form-label-lg">Position</label>
                       <input type="text" style= "font-size :20px" class="form-control form-control-lg" value="<?php echo $fetched_row['Job_Title']; ?>" readonly>
                   </div>

                   <div class="col-md-4">
                     <label for="" style= "font-size :20px; margin-left: 20px;" class="col-form-label-lg">Employment Type</label>
                       <input type="text" style= "font-size :20px; margin-left: 20px;" class="form-control form-control-lg" value="<?php echo $fetched_row['Employment_Type']; ?>" readonly>
                   </div>

                   <span></span>
                        
                   <div class="col-md-4">
                     <label for="" style= "font-size :20px" class="col-form-label-lg">Start Employment Date</label>
                       <input type="text" style= "font-size :20px" class="form-control form-control-lg" value="<?php echo $fetched_row['Joining_Date']; ?>" readonly>
                   </div>


                   <div class="col-md-4">
                     <label for="" style= "font-size :20px; margin-left: 20px;" class="col-form-label-lg">End Employment Date</label>
                       <?php
                        // Check if $fetched_row['Employment_End_Date'] exists and is not empty
                          if(isset($fetched_row['Employment_End_Date']) && !empty($fetched_row['Employment_End_Date'])) {
                        // If it exists and is not empty, echo its value
                          echo '<input type="text" style="font-size: 20px; margin-left: 20px;" class="form-control form-control-lg" value="' . $fetched_row['Employment_End_Date'] . '" readonly>';
                          } else {
                        // If it doesn't exist or is empty, display a hyphen "-"
                          echo '<input type="text" style="font-size: 20px; margin-left: 20px;" class="form-control form-control-lg" value="-" readonly>';
                          }
                        ?>
                   </div>


                  
                   <span></span>
                   <div class="col-md-8">
                   <label for="" style= "font-size :20px" class="col-form-label-lg">Access</label><br>
                   

                   <?php
                    // Define a function to set checkbox state
                    function setCheckboxState($checkboxId, $checkboxValue) {
                        if ($checkboxValue == "1") {
                     echo "<script>document.getElementById('$checkboxId').checked = true;</script>";
                         } else {
                     echo "<script>document.getElementById('$checkboxId').checked = false;</script>";
                         }
                     }
                    ?>

                <input type="checkbox" id="access_isurat" style="height: 15px; width: 20px;" name="access_isurat" value="">
                  <label for="vehicle1" style="font-size: 20px; margin-left: 5px;">I-Surat</label>
                    <?php setCheckboxState('access_isurat', $fetched_row['access_isurat']); ?>

                <input type="checkbox" id="access_asset" style="height: 15px; width: 20px; margin-left: 20px;" name="access_asset" value="">
                  <label for="vehicle2" style="font-size: 20px; margin-left: 5px;">I-Asset</label>
                    <?php setCheckboxState('access_asset', $fetched_row['access_aset']); ?>

                <input type="checkbox" id="access_imobile" style="height: 15px; width: 20px; margin-left: 20px;" name="access_imobile" value="">
                  <label for="vehicle3" style="font-size: 20px; margin-left: 5px;">I-Mobile</label>
                    <?php setCheckboxState('access_imobile', $fetched_row['access_imobile']); ?>

                <input type="checkbox" id="access_eoutstation" style="height: 15px; width: 20px;" name="access_eoutstation" value="">
                  <label for="vehicle3" style="font-size: 20px; margin-left: 5px;">E-Outstation</label>
                    <?php setCheckboxState('access_eoutstation', $fetched_row['access_eoutstation']); ?>

                <input type="checkbox" id="access_tower" style="height: 15px; width: 20px; margin-left: 20px;" name="access_tower" value="">
                  <label for="vehicle2" style="font-size: 20px; margin-left: 5px;">Towersystem</label>
                    <?php setCheckboxState('access_tower', $fetched_row['access_tower']); ?>


                   </div>

                    <div class="col-md-6">
                      <br/>
                    </div>

                    <div class="form-group">
						<br><br><br>
                        <button name="btn-update" type="submit" style= "font-size :20px" class="btn btn-primary">Update</button>
                        <button name="btn-cancel" type="submit" style= "font-size :20px; margin-left: 5px;" class="btn btn-danger">Cancel</button>
                    </div>
               </form>
           </div>
            
        </div>
    </div> 
  </div>
</div>
</div>
</div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>I-MOBILE</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
       <a href="https://www.micth.com//">MELAKA ICT SDN BHD</a>
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>

</html>