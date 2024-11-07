<?php
include ('functions.php');

//$mysqli = new mysqli('localhost', 'root', '', 'idrive');
include('db_conn_cal.php');


if(isset($_POST['submit'])){
    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['id'];    

	$feedback = $_POST['feedback'];
	$dc = date("Y-m-d");
	
	echo "ok boleh submit";
	
	if($feedback <> ""){
		
		//$conn= mysqli_connect("localhost", "root", "", "idrive");
		include('db_conn.php');
		$query2 = "INSERT INTO tbl_feedback (text_feedback, user_name, user_id, date_feedback) 
                        VALUES('$feedback', '$user_name', '$user_id', '$dc')";	

		$ver = mysqli_query($db, $query2);
			if(!$ver)
			{
				$msg = "<div class='alert alert-warning'>Feedback Not Successfull Submit. Please refer admin system.</div>";
				echo mysqli_error($db);
				die();
			}
			else
			{
				$msg = "<div class='alert alert-success'>Feedback Successfull Submit. Thank you.</div>";
			}
		
			
            $mysqli->close();

            $db->close();
	}
	
    /*$stmt = $mysqli->prepare("select * from bookings where start_date = ? AND vehicle_id = ?");
    $stmt->bind_param('ss', $start_date, $vehicle_id);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Already Booked</div>";
        }
		else
		{

            $conn= mysqli_connect("localhost", "root", "", "idrive");
			//include('conn.php');
			
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
  
    

            //insert guna kaedah param --- oleh danial
			$stmt = $mysqli->prepare("INSERT INTO bookings (start_date, user_id, user_name, purpose, destination, vehicle_id, model_plat, 
			status, start_time, end_date, end_time) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param('ssssssssssd',$start_datein, $user_id, $user_name, $purpose, $destination, $vehicle_id, $p, 
			$status, $start_time, $end_date, $end_time);
            $stmt->execute();
			
			/*$query1 = "INSERT INTO bookings (start_date, user_id, user_name, purpose, destination, vehicle_id, model_plat, 
			status, start_time, end_date, end_time) 
                        VALUES('$start_date', '$user_id', '$user_name', '$purpose', '$destination', '$vehicle_id', '$p', 
						'$status', '$start_time', '$end_date', '$end_time')";
            mysqli_query($conn, $query1);
			
			
            $query2 = "INSERT INTO management (start_date, user_id, user_name, purpose, destination, vehicle_id, model_plat, 
			status, start_time, end_date, end_time) 
                        VALUES('$start_datein', '$user_id', '$user_name', '$purpose', '$destination', '$vehicle_id', '$p', 
						'$status', '$start_time', '$end_date', '$end_time')";
            //mysqli_query($conn, $query2);

            $ver = mysqli_query($conn, $query2);
			if(!$ver)
			{
				$msg = "<div class='alert alert-warning'>Booking Not Successfull</div>";
				echo mysqli_error($conn);
				die();
			}
			else
			{
				$msg = "<div class='alert alert-success'>Booking Successfull</div>";
			}
			
			//$msg = "<div class='alert alert-success'>Booking Successfull</div>";
            $stmt->close();
            $mysqli->close();

            $conn->close();
        }
    }*/
}
if (empty($_SESSION['First_Name'])) {
  header("Location: iout.php");
  exit();
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
  <link href="../micthlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
      <a href="../main_user.php" class="logo d-flex align-items-center">
        <img src="../logomicth.png" alt="">
        <span class="d-none d-lg-block">MICTH System</span>
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
            <span class="d-none d-md-block dropdown-toggle ps-2">Me</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['First_Name']; ?></h6>
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
            <a class="nav-link" data-bs-target="#booking-system-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-calendar-check-fill"></i><span>Booking System</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="booking-system-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
              <li class="nav-item">
                <a href="user.php">
                    <i class="bi bi-house-door-fill" style="font-size: 1em"></i>
                    <span>Home</span>
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#book-vehicle-nav" data-bs-toggle="collapse"
                    href="#" style="padding: 10px 15px 10px 40px">
                      <i class="bi bi-car-front-fill" style="font-size: 1em"></i></i><span>Book Vehicle</span>
                      <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
                  </a>
                  <ul id="book-vehicle-nav" class="nav-content collapse" data-bs-parent="#booking-system-nav">
                      <li class="nav-item">
                          <a class="nav-link collapsed" href="user_booking_vehicle.php" style="padding-left: 60px">
                              <i class="bi bi-caret-right-fill"></i></i>
                              <span>Book</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link collapsed" href="user_record.php" style="padding-left: 60px">
                              <i class="bi bi-caret-right-fill"></i></i>
                              <span>Usage Record</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#book-room-nav" data-bs-toggle="collapse"
                    href="#" style="padding: 10px 15px 10px 40px">
                      <i class="bi bi-door-closed-fill" style="font-size: 1em"></i></i><span>Book Room</span>
                      <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
                  </a>
                  <ul id="book-room-nav" class="nav-content collapse" data-bs-parent="#booking-system-nav">
                      <li class="nav-item">
                          <a class="nav-link collapsed" href="user_booking_Room.php" style="padding-left: 60px">
                              <i class="bi bi-caret-right-fill"></i></i>
                              <span>Book</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link collapsed" href="user_record_Room.php" style="padding-left: 60px">
                              <i class="bi bi-caret-right-fill"></i></i>
                              <span>Usage Record</span>
                          </a>
                      </li>
                    
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link collapsed; active" href="feedback.php">
                    <i class="bi bi-chat-right-text-fill" style="font-size: 1em; background-color: transparent"></i>
                      <span>Feedback</span>
                  </a>
                </li>
            </ul>
        </li>
        
        <li class="nav-item">
          <a class="nav-link collapsed" href="../main_user.php">
            <i class="bi bi-reply-fill"></i>
            <span>Home Page</span>
          </a>
        </li>
      
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Feedback Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="user.php">Home Page</a></li>
          <li class="breadcrumb-item active">Feedback</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
            <div class="row">
        <div class="col-lg-7">
      <div class="card">
                 <div class="card-body">
                  <?php
  //$conn= mysqli_connect("localhost", "root", "", "idrive");
  include('db_conn.php');
  
  if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
/*$i = $_GET['vehicle'];
//$datecurrent = date('d/m/Y', strtotime($date));
$datechoose1 = $_GET['date'];
$finaldatechoose1 = date("d-m-Y", strtotime($datechoose1));
$p="";
$m="";
    $sql="SELECT * FROM `hrm_vehicle` WHERE `id` = $i ORDER BY `id` ASC";
    $result=$conn-> query($sql);
    
    if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
	$p = $row['plat_number'];
	$m = $row['model'];
	$vid = $row['id'];
      }
    }*/
  
    $db->close();
  ?> 
 <br>     
               <?php echo(isset($msg))?$msg:""; ?>
               <!--<form class="row g-3" action="" method="post">-->
				<form class="row g-3" action="" method="post">
                  <div class="col-md-6">
                     <label for="" class="form-label">Staff Name</label>
                       <input type="text" class="form-control" value="<?php echo $_SESSION['user_name']; ?>" disabled>
                   </div>

                    <div class="col-md-6">
                      <br/>
                    </div>

				    <div class="col-md-12">
                      <label for="" class="form-label">Feedback / Comments</label>
                       <!--<textarea required type="text" class="form-control" >-->
					   <textarea class="form-control" id="feedback" name="feedback" rows="5"></textarea>
                    </div>

                    <div class="form-group">
						<br><br><br>
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