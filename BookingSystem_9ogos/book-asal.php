<?php
include ('functions.php');
 if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}
$mysqli = new mysqli('localhost', 'root', '', 'imobiledb');
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from bookings where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
    }
}

if(isset($_POST['submit'])){
    $user_name = $_SESSION['user']['user_name'];
    $user_id = $_SESSION['user']['id'];
    $start_time = $_POST['start_time'];
    $end_date = $_POST['end_date'];
    $end_time = $_POST['end_time'];
    /*$start_time = $_POST['start_time'];
    
    */

 $purpose = $_POST['purpose'];
  $destination = $_POST['destination'];
   $vehicle_id = $_GET['vehicle'];
   $status='In Use';
    $stmt = $mysqli->prepare("select * from bookings where date = ? AND vehicle_id = ?");
    $stmt->bind_param('ss', $date, $first_vehicle);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Already Booked</div>";
        }else{

            $conn= mysqli_connect("localhost", "root", "", "imobiledb");
  if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$p="";
$m="";
    $sql="SELECT * FROM `hrm_vehicle` WHERE `id` = $vehicle_id ORDER BY `id` ASC";
    $result=$conn-> query($sql);
    
    if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
$p = $row['plat_number'];
$m = $row['model'];
      }
    }
  
    

            $stmt = $mysqli->prepare("INSERT INTO bookings (date, user_id, user_name, purpose, destination, vehicle_id, model_plat, status, start_time, end_date, end_time) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param('sssssssssss',  $date, $user_id, $user_name, $purpose, $destination, $vehicle_id, $p, $status, $start_time, $end_date, $end_time);
            $stmt->execute();
            $query = "INSERT INTO management (date, user_id, user_name, purpose, destination, vehicle_id, model_plat, status, start_time, end_date, end_time) 
                        VALUES('$date', '$user_id', '$user_name', '$purpose', '$destination', '$vehicle_id', '$p', '$status', '$start_time', '$end_date', '$end_time')";
            mysqli_query($conn, $query);

            $msg = "<div class='alert alert-success'>Booking Successfull</div>";
            $stmt->close();
            $mysqli->close();

            $conn->close();
        }
    }
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

  <title>Book</title>
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
      <a href="user.php" class="logo d-flex align-items-center">
        <img src="assets/img/igclogo.png" alt="">
        <span class="d-none d-lg-block">I-Mobile</span>
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
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['user']['user_name']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['user']['user_name']; ?></h6>
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
              <a class="dropdown-item d-flex align-items-center" href="index.php?logout='1'">
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
        <a class="nav-link collapsed" href="user.php">
          <i class="bi bi-grid"></i>
          <span>Home Page</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Apply Vehicle</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

                <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="user_booking_vehicle.php"  class="active">
              <i class="bi bi-circle"></i><span>Book</span>
            </a>
          </li>
        </ul>
                <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

        </ul>
        </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Usage Record</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="user_record.php">
              <i class="bi bi-circle"></i><span>Record</span>
            </a>
          </li>
        </ul>
      </li>

        </li>
        <!-- End Forms Nav -->

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Book Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="user.php">Home Page</a></li>
          <li class="breadcrumb-item">Apply</li>
          <li class="breadcrumb-item active">Book</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
            <div class="row">
        <div class="col-lg-7">
      <div class="card">
                 <div class="card-body">
                  <?php
  $conn= mysqli_connect("localhost", "root", "", "idrive");
  if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$i = $_GET['vehicle'];
$p="";
$m="";
    $sql="SELECT * FROM `hrm_vehicle` WHERE `id` = $i ORDER BY `id` ASC";
    $result=$conn-> query($sql);
    
    if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
$p = $row['plat_number'];
$m = $row['model'];
      }
    }
  
    $conn->close();
  ?> 
 <br>     
               <?php echo(isset($msg))?$msg:""; ?>
               <form class="row g-3" action="" method="post">
<form class="row g-3" action="" method="post">
                  <div class="col-md-6">
                     <label for="" class="form-label">Staff/Driver Name</label>
                       <input type="text" class="form-control" value="<?php echo $_SESSION['user']['user_name']; ?>" disabled>
                   </div>
                <div class="col-md-6">
                     <label for="" class="form-label">Vehicle</label>
                       <input required type="text" class="form-control" value="<?php echo $m;?> - <?php echo $p;?>" disabled>
                   </div>
                          <div class="col-md-6">
                     <label for="" class="form-label">Start Date</label>
                       <input type="text" class="form-control" value="<?php echo date('d/m/Y', strtotime($date)); ?>" disabled>
                   </div>

                 <div class="col-md-6">
                     <label for="" class="form-label">End Date</label>
                       <input required type="date" class="form-control" name="end_date">
                   </div>

                                       <div class="col-md-6">
                       <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-4 pt-0">Start time:</legend>
                  <div class="col-sm-15">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="start_time" id="st1" value="9am-1pm">
                      <label class="form-check-label" for="9am-1pm">
                        9am - 1pm
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="start_time" id="st2" value="2pm-5pm">
                      <label class="form-check-label" for="2pm-5pm">
                        2pm - 5pm
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="start_time" id="st3" value="9am-5pm">
                      <label class="form-check-label" for="9am-5pm">
                        9am - 5pm
                      </label>
                    </div>
                  </div>
                </fieldset>
                   </div>

                                       <div class="col-md-6">
                       <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-4 pt-0">End time:</legend>
                  <div class="col-sm-15">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="end_time" id="st1" value="9am-1pm">
                      <label class="form-check-label" for="9am-1pm">
                        9am - 1pm
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="end_time" id="st2" value="2pm-5pm">
                      <label class="form-check-label" for="2pm-5pm">
                        2pm - 5pm
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="end_time" id="st3" value="9am-5pm">
                      <label class="form-check-label" for="9am-5pm">
                        9am - 5pm
                      </label>
                    </div>
                  </div>
                </fieldset>
                   </div>


                   <div class="col-md-6">
                     <label for="" class="form-label">Purpose</label>
                       <input required type="text" class="form-control" name="purpose">
                   </div>

				                      <div class="col-md-6">
                      <label for="" class="form-label">Destination</label>
                       <input required type="text" class="form-control" name="destination">
                   </div><br>

                   <div class="form-group">
                       <button name="submit" type="submit" class="btn btn-primary">Submit</button>
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