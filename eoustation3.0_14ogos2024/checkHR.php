<?php
session_start();
include "db_conn.php";
$fname = $_SESSION['user_name'];


$Last_Name = $_SESSION['Last_Name'];
$Email = $_SESSION['Email'];
$Mobile_phone = $_SESSION['Mobile_phone'];
$Job_Title = $_SESSION['Job_Title'];
$Employment_Type = $_SESSION['Employment_Type'];
$Manager = $_SESSION['Manager'];
$Department = $_SESSION['Department'];
$First_Name = $_SESSION['First_Name'];
$fname = $_SESSION['user_name'];
//$status = $_SESSION['status'];
$id = $_SESSION['id'];
$uid = $_SESSION['id'];
$emp_number = $_SESSION['emp_number'];

include "db_conn.php";

if (isset($_POST['submit'])) {
  $check_query = "SELECT * FROM outstation WHERE emp_no = '$emp_number' AND timeIn = '00:00:00'";
  $check_result = mysqli_query($conn, $check_query);

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);

    return $data;
  }
  $firstname = validate($_POST['firstname']);

  $fname = validate($_POST['nameList']);
  $location = validate($_POST['location']);
  $purpose = validate($_POST['purpose']);
  $dateOut = validate($_POST['dateOut']);
  $timeOut = validate($_POST['timeOut']);
  $emp_number = validate($_POST['emp_no']);
  $role_id = validate($_POST['role_id']);
  $status = validate($_POST['Department']);

  if (mysqli_num_rows($check_result) > 0) {
    // User has not checked out from the last check-in
    echo "<script>alert('You have not completed from your last check-in.');window.location='dash.php';</script>";
  } else {
    $sql = "INSERT INTO outstation(name, location, purpose, dateOut, timeOut, user_id, emp_no, role_id, status) 
                VALUES('$firstname', '$location', '$purpose', '$dateOut', '$timeOut', '$id', '$emp_number', '$role_id', '$status')";

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
      $message = "<p class='success'>Record added successfully!</p>";
      // Redirect to dash.php after successful insertion
      echo "<script>window.location='dash.php';</script>";
    } else {
      $message = "<p class='error'>Error: Unable to add the record.</p>";
    }

    $stmt->close();
  }

  $conn->close();
}
if (empty($_SESSION['First_Name'])) {
  header("Location: logout.php");
  exit();
}
?>
<style>
  .error {
    background: #F2DEDE;
    color: #A94442;
    padding: 10px;
    width: 100%;
    /* Make error and success messages take up 100% of the container */
    border-radius: 5px;
    margin: 20px auto;
  }

  .success {
    background: #D4EDDA;
    color: #40754C;
    padding: 10px;
    width: 100%;
    /* Make error and success messages take up 100% of the container */
    border-radius: 5px;
    margin: 20px auto;
  }

  .booking-form .booking-bg {
    background-image: url('tower.jpg');
  }

  .section {
    position: relative;
    height: 100vh;
  }

  .section .section-center {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
  }

  #booking {
    font-family: 'Alice', serif;
    /* Updated background color */
  }

  .booking-form {
    position: relative;
    max-width: 912px;
    width: 100%;
    margin: auto;
    background: #fff;
    border-radius: 6px;
    -webkit-box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
  }

  .booking-form .booking-bg {
    position: absolute;
    left: 25px;
    top: -25px;
    bottom: -25px;
    width: 400px;
    background-size: cover;
    background-position: center;
    padding: 25px;
    border-radius: 6px;
    -webkit-box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
    overflow: hidden;

  }

  .booking-form .booking-bg::before {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    background: rgba(62, 136, 165, 0.33);
    /* Updated background color */
  }

  .booking-form>form {
    margin-left: 425px;
    padding: 30px;
  }

  .booking-form .form-header {
    margin-bottom: 30px;
    margin-top: 60px;
    position: relative;
    z-index: 20;
  }

  .booking-form .form-header h2 {
    font-family: 'Playfair Display', serif;
    margin-top: 0;
    margin-bottom: 15px;
    font-weight: 900;
    color: #fff;
    /* Updated font color */
    font-size: 42px;
    text-transform: capitalize;
  }

  .booking-form .form-header p {
    color: #fff;
    /* Updated font color */
    font-size: 18px;
  }

  .booking-form .form-group {
    position: relative;
    margin-bottom: 20px;
  }

  .booking-form .form-control {
    background-color: #fff;
    height: 45px;
    padding: 0px 15px;
    color: #151515;
    border: 1px solid #e5e5e5;
    font-size: 16px;
    font-weight: 700;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-radius: 40px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
  }

  .booking-form .form-control::-webkit-input-placeholder {
    color: #e5e5e5;
  }

  .booking-form .form-control:-ms-input-placeholder {
    color: #e5e5e5;
  }

  .booking-form .form-control::placeholder {
    color: #e5e5e5;
  }

  .booking-form .form-control:focus {
    background: #f8f8f8;
  }

  .booking-form input[type="date"].form-control:invalid {
    color: #e5e5e5;
  }

  .booking-form select.form-control {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
  }

  .booking-form select.form-control:invalid {
    color: #e5e5e5;
  }

  .booking-form select.form-control option {
    color: #151515;
  }

  .booking-form select.form-control+.select-arrow {
    position: absolute;
    right: 3px;
    bottom: 5px;
    width: 32px;
    line-height: 32px;
    height: 32px;
    text-align: center;
    pointer-events: none;
    color: #e5e5e5;
    font-size: 14px;
  }

  .booking-form select.form-control+.select-arrow:after {
    content: '\279C';
    display: block;
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
  }

  .booking-form .form-label {
    color: #856849;
    text-transform: uppercase;
    line-height: 24px;
    height: 24px;
    font-size: 14px;
    font-weight: 400;
    margin-left: 20px;
  }

  .booking-form .form-btn {
    margin-top: 30px;
  }

  .booking-form .submit-btn {
    display: block;
    width: 100%;
    color: #fff;
    background-color: #3E88A5;
    /* Updated button color */
    font-weight: 700;
    font-size: 18px;
    border: none;
    border-radius: 40px;
    height: 55px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
  }

  .booking-form .submit-btn:hover,
  .booking-form .submit-btn:focus {
    background-color: #93C4D1;
    /* Updated button hover color */
  }

  @media only screen and (max-width: 768px) {
    .booking-form .booking-bg {
      position: relative;
      left: 0;
      right: 0;
      bottom: 0;
      top: -15px;
      width: 95%;
      margin: auto;
    }

    .booking-form>form {
      margin-left: 0px;
    }
  }
</style>









<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Check-Out [Admin]</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../micthlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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

<style>
  /* Define CSS variables */
  :root {
    --light: #f5f5f5;
    --light-blue: #e3f2fd;
    --blue: #1976d2;
    --light-yellow: #fff9c4;
    --yellow: #fbc02d;
    --light-orange: #ffe0b2;
    --orange: #fb8c00;
    --dark: #333;
  }

  /* Your CSS styles */
  .box-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    grid-gap: 24px;
    margin-top: 36px;
  }

  .box-info li {
    padding: 24px;
    background: var(--light);
    border-radius: 20px;
    display: flex;
    align-items: center;
    gap: 24px;
  }

  .box-info li .bx {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    font-size: 36px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .box-info li:nth-child(1) .bx {
    background: var(--light-blue);
    color: var(--blue);
  }

  .box-info li:nth-child(2) .bx {
    background: var(--light-yellow);
    color: var(--yellow);
  }

  .box-info li:nth-child(3) .bx {
    background: var(--light-orange);
    color: var(--orange);
  }

  .box-info li .text h3 {
    font-size: 24px;
    font-weight: 600;
    color: var(--dark);
  }

  .box-info li .text p {
    color: var(--dark);
  }

  .table-data {
    display: flex;
    flex-wrap: wrap;
    grid-gap: 24px;
    margin-top: 24px;
    width: 100%;
    color: var(--dark);
  }

  .table-data>div {
    border-radius: 20px;
    background: var(--light);
    padding: 24px;
    overflow-x: auto;
  }

  .table-data .head {
    display: flex;
    align-items: center;
    grid-gap: 16px;
    margin-bottom: 24px;
  }

  .table-data .head h3 {
    margin-right: auto;
    font-size: 24px;
    font-weight: 600;
  }

  .table-data .head .bx {
    cursor: pointer;
  }

  .table-data .order {
    flex-grow: 1;
    flex-basis: 500px;
  }

  .table-data .order table {
    width: 100%;
    border-collapse: collapse;
  }

  .table-data .order table th {
    padding-bottom: 12px;
    font-size: 13px;
    text-align: left;
    border-bottom: 1px solid var(--grey);
  }

  .table-data .order table td {
    padding: 16px 0;
  }

  .table-data .order table tr td:first-child {
    display: flex;
    align-items: center;
    grid-gap: 12px;
    padding-left: 6px;
  }

  .table-data .order table td img {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
  }

  .table-data .order table tbody tr:hover {
    background: var(--grey);
  }

  .table-data .order table tr td .status {
    font-size: 10px;
    padding: 6px 16px;
    color: var(--light);
    border-radius: 20px;
    font-weight: 700;
  }

  .table-data .order table tr td .status.completed {
    background: var(--blue);
  }

  .table-data .order table tr td .status.process {
    background: var(--yellow);
  }

  x.table-data .order table tr td .status.pending {
    background: var(--orange);
  }


  .table-data .todo {
    flex-grow: 1;
    flex-basis: 300px;
  }

  .table-data .todo .todo-list {
    width: 100%;
  }

  .table-data .todo .todo-list li {
    width: 100%;
    margin-bottom: 16px;
    background: var(--grey);
    border-radius: 10px;
    padding: 14px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .table-data .todo .todo-list li .bx {
    cursor: pointer;
  }

  .table-data .todo .todo-list li.completed {
    border-left: 10px solid var(--blue);
  }

  .table-data .todo .todo-list li.not-completed {
    border-left: 10px solid var(--orange);
  }

  .table-data .todo .todo-list li:last-child {
    margin-bottom: 0;
  }
</style>


<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
            <a href="../main_user.php" class="logo d-flex align-items-center">
                <img src="../logomicth.png" alt="">
                <span class="d-none d-lg-block">MICTH System
                </span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown">





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
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->


  <aside id="sidebar" class="sidebar">  
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-door-open-fill"></i><span>Outstation System</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li class="nav-item">
            <a href="dash.php">
              <i class="bi bi-house-door-fill" style="font-size: 1em"></i><span>Home</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="tablefb.php">
              <i class="bi bi-chat-left-text" style="font-size: 1em"></i><span>View Feedback</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#book-room-nav" data-bs-toggle="collapse"
              href="#" style="padding: 10px 15px 10px 40px">
                <i class="bi bi-people" style="font-size: 1em"></i></i><span>Human Resources</span>
                <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
            </a>
            <ul id="book-room-nav" class="nav-content collapse" data-bs-parent="#booking-system-nav">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="myreport.php" style="padding-left: 60px">
                        <i class="bi bi-caret-right-fill"></i></i>
                        <span>View Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="data.php" style="padding-left: 60px">
                        <i class="bi bi-caret-right-fill"></i></i>
                        <span>Generate Report</span>
                    </a>
                </li>
                <?php
                    $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00'";
                    $result = mysqli_query($conn, $sql);
                    $totalRows = mysqli_num_rows($result);
                ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="SNC.php" style="padding-left: 60px">
                        <i class="bi bi-caret-right-fill"></i>
                        <p style="margin-bottom: 0px">Pending Staff Check-In<span class="float-right badge bg-danger">
                            <?php echo $totalRows ?? 'No data'; ?>
                        </span></p>
                    </a>
                </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="../main_user.php">
          <i class="bi bi-reply-fill"></i>
          <span>Home Page</span>
        </a>
      </li>
      

        <!-- End Tables Nav -->

    </ul>
  </aside><!-- End Sidebar-->


  <!-- Content Wrapper -->

  <main id="main" class="main">
  <div class="pagetitle">
        <h1>Check-Out<strong>

          </strong></h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dash.php">Home Page</a></li>
            <li class="breadcrumb-item active">Check-Out</li>
          </ol>
        </nav>
      </div>
      <br>
  <body>
  <br>
<div class="section-center">
  <div class="container">
    <div class="row">
      <div class="booking-form">
        <div class="booking-bg">
          <div class="form-header">

            <h2>Check-Out</h2>
            <p id="nameList" name="nameList">Name:
              <?php echo strtoupper($First_Name); ?>
            </p>
            <p id="emp_no" name="emp_no">Emp No.:
              <?php echo $emp_number ?>
            </p>
            <p id="Department" name="Department">Department:
              <?php echo " $Department"; ?>
            </p>

          </div>
        </div>
        <form method="post" action="checkHR.php" class="form">
          <div class="row">
            <?php
            if (isset($message)) {
              echo $message;
            }
            ?>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <span class="form-label">Date-Out</span>
                <input class="form-control" type="Date" id="dateOut" name="dateOut" required>
                <input type="hidden" id="Department" name="Department" value="<?php echo $Department ?>">
                <input type="hidden" id="role_id" name="role_id" value="<?php echo $role_id ?>">
                <input type="hidden" id="emp_no" name="emp_no" value="<?php echo $emp_number ?>">
                <input type="hidden" id="nameList" name="nameList" value="<?php echo $fname ?>">
                <input type="hidden" id="firstname" name="firstname" value="<?php echo $First_Name ?>">

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <span class="form-label">Time-Out</span>
                <input class="form-control" type="Time" id="timestamp-input" name="timeOut" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <span class="form-label">Purpose</span>
                <textarea class="form-control" type="Textarea" id="purpose" name="purpose" required maxlength="350" Required></textarea>

              </div>
            </div>
          
          </div>
          <div class="row">
          
            <div class="col-md-12">
              <div class="form-group">
                <span class="form-label">Location</span>
                <textarea class="form-control" type="Textarea" id="location" name="location" required maxlength="350" Required></textarea>

              </div>
            </div>
          </div>
          <div class="form-btn">
            <button type="submit" id="submit" name="submit" class="submit-btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</body>
  
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
  <!-- data table for file exports -->
  <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


  <script>
    $(document).ready(function() {
      $('#DataTable').DataTable({
        searching: true,
        info: true,
        paging: false,
        dom: 'Bfrtip',
        buttons: [

        ]
      });
    });
  </script>


</body>

</html>