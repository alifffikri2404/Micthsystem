<?php
include('functions.php');
$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['emp_number'];

//$db = mysqli_connect('localhost', 'root', '', 'idrive');
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
function fetch_data()
{
  $output = '';
  $conn = mysqli_connect("localhost", "root", "", "idrive");
  $sql = "SELECT * FROM `management`";
  $result = mysqli_query($conn, $sql);
  $i = 1;
  while ($row = mysqli_fetch_array($result)) {
    $output .= '
    <tr>  
<td><small>' . $i . '</small></td>
                          <td><small>' . $row["user_name"] . '</small></td>  
                          <td><small>' . $row["start_date"] . ' (' . $row["start_time"] . ') until <br/>' . $row["end_date"] . ' (' . $row["end_time"] . ')</small></td>  
                          <td><small>' . $row["purpose"] . '</small></td>  
                          <td><small>' . $row["destination"] . '</small></td>
                          <td><small>' . $row["model_plat"] . '</small></td>   
                     </tr>           
                          ';
    $i++;
  }

  return $output;
}

/*$sql="SELECT * FROM `bookings` WHERE `status` LIKE 'RETURN VEHICLE'";

if ($result=mysqli_query($db,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);

  // Free result set
  mysqli_free_result($result);
  }
  

  
$query="SELECT * FROM `bookings` WHERE `status` LIKE 'APPROVED'";

if ($total=mysqli_query($db,$query))
  {
  // Return the number of rows in result set
  $rowpend=mysqli_num_rows($total);

  // Free result set
  mysqli_free_result($total);
  }


  $queryP="SELECT * FROM `bookings` WHERE `status` LIKE 'Pend_BookApproval'";

if ($total=mysqli_query($db,$queryP))
  {
  // Return the number of rows in result set
  $rowpend1=mysqli_num_rows($total);

  // Free result set
  mysqli_free_result($total);
  }

/*if(isset($_POST['submit'])){
    $user_name = $_SESSION['user']['user_name'];
    $user_id = $_SESSION['user']['id'];
  //$statusReject = $_POST['reject'];
  
}*/



if (isset($_POST['viewsubmit'])) {
  $_SESSION['updateid'] = $_POST['view1'];
  header("Location: viewbook.php");
  exit();
}

if (empty($_SESSION['First_Name'])) {
  header("Location: iout.php");
  exit();
}
if (isset($_POST['viewsubmitroom'])) {
  $_SESSION['updateid'] = $_POST['view'];
  header("Location: viewbook_room.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Booking System [Admin]</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta http-equiv="refresh">

  <!-- Favicons -->
  <link href="../micthlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
    width: 20%;
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
    width: 20%;
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
    border-radius: 70%;
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
    width: 20%;
  }

  .table-data .todo .todo-list li {
    width: 20%;
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

  .bold {
    font-weight: bold;
  }

  .reservation-link {
    text-decoration: none;
    color: black;
  }

  .reservation-table {
    width: 100%;
    border-collapse: collapse;
  }

  .reservation-table th,
  .reservation-table td {
    border: 1px solid #ddd;
    padding: 8px;
  }

  .reservation-table th {
    background-color: #f2f2f2;
  }

  .reservation-table tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .reservation-table tr:hover {
    background-color: #ddd;
  }

  .bx {
    display: inline-block;
    width: 20px;
    height: 20px;
    background-color: #ccc;
    border-radius: 50%;
    margin-right: 10px;
  }

  .table-container {
    overflow-x: auto;
  }

  .reservation-table {
    width: 100%;
    border-collapse: collapse;
  }

  .reservation-table th,
  .reservation-table td {
    padding: 8px;
    border: 1px solid #dddddd;
    text-align: left;
  }

  /* Responsive styles */
  @media screen and (max-width: 600px) {
    .reservation-table {
      overflow-x: auto;
      display: block;
    }

    .reservation-table th,
    .reservation-table td {
      white-space: nowrap;
      min-width: 100px;
    }
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
            <a href="admin.php" class="active">
              <i class="bi bi-house-door-fill" style="font-size: 1em; background-color: transparent"></i>
              <span>Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#book-vehicle-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
              <i class="bi bi-car-front-fill" style="font-size: 1em"></i></i><span>Vehicle</span>
              <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
            </a>
            <ul id="book-vehicle-nav" class="nav-content collapse" data-bs-parent="#booking-system-nav">
              <li class="nav-item">
                <a class="nav-link collapsed" href="list_vehicle.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>List of Vehicle</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="add_vehicle.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Add Vehicle</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="usage_record_monthly.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Usage Record</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#book-room-nav" data-bs-toggle="collapse" href="#" style="padding: 10px 15px 10px 40px">
              <i class="bi bi-door-closed" style="font-size: 1em"></i></i><span>Room</span>
              <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
            </a>
            <ul id="book-room-nav" class="nav-content collapse" data-bs-parent="#booking-system-nav">
              <li class="nav-item">
                <a class="nav-link collapsed" href="list_room.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>List of Room</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="add_room.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Add Room</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="room_record_monthly.php" style="padding-left: 60px">
                  <i class="bi bi-caret-right-fill"></i></i>
                  <span>Usage Record</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="feedbackreport.php">
              <i class="bi bi-chat-right-text" style="font-size: 1em"></i></i>
              <span>Feedback Report</span>
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
      <h1>Home Page</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-20">
          <div class="row">

            <?php

            date_default_timezone_set('Asia/Kuala_Lumpur'); // Set timezone to Malaysia
            $current_date = date('Y-m-d');
            $current_time = date('H:i:s');

            $sql0 = "SELECT * FROM management_room 
           WHERE status = 'Pending' 
           AND start_date >= '$current_date' AND end_time >= '$current_time'";

            $result = mysqli_query($db, $sql0);
            $totalRows = mysqli_num_rows($result);

            ?>
            <div class="col-12">
              <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title"><strong>DASHBOARD</strong><br />
                  </h5>



                  <ul class="box-info" style=" width: 100%;">
                    <li>
                      <a href="dash_room.php">
                        <div class="text">
                          <h3>
                            <p>Room</p>
                          </h3>
                        </div>
                        <div class='bx bxs-calendar-check'></div>
                        <br>


                      </a>

                      <div class="text">
                        <h3>
                          <?php echo $totalRows ?? 'No data'; ?>
                        </h3>
                        <p>Pending approval</p>
                      </div>
                    </li>
                    <li>
                      <a href="dash_vehicle.php">
                        <?php
                        $sql1 = "SELECT * FROM management WHERE status ='Pending'";
                        $result = mysqli_query($db, $sql1);
                        $totalRows1 = mysqli_num_rows($result);
                        ?>
                        <div class="text">
                          <h3>

                            <p> Vehicle</p>
                          </h3>
                        </div>
                        <div class='bx bxs-car'></div>
                        <br>


                      </a>
                      <div class="text">
                        <h3>
                          <?php echo $totalRows1 ?? 'No data'; ?>
                        </h3>
                        <p>Pending approval</p>
                      </div>

                </div>
                </li>
                <div class="container-fluid py-4">
                  <div class="row">
                    <div class="col-12 col-xl-6">
                      <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                          <h6 class="mb-0">Room</h6>
                        </div>
                        <div class="card-body p-3">
                          <ul class="list-group">
                            <li class="list-group-item border-0 px-0">
                              <div class="form-check form-switch ps-0">
                                <table class="reservation-table">
                                  <div class="filter-container">
                                    <label for="filter-date-room">Filter by Date:</label>
                                    <input type="date" id="filter-date-room">
                                    <button class="btn btn-info" id="filter-btn-room">Filter</button>
                                  </div>
                                  <br>
                                  <thead>
                                    <tr>
                                      <th>USER</th>
                                      <th>ROOM</th>
                                      <th>USAGE TIME</th>
                                      <th>USAGE DATE</th>
                                      <th>STATUS</th>
                                    </tr>
                                  </thead>
                                  <tbody id="reservation-body-room">
                                    <!-- PHP-generated content -->
                                    <?php
                                    date_default_timezone_set('Asia/Kuala_Lumpur'); // Set timezone to Malaysia
                                    $current_date = date('Y-m-d');
                                    $current_time = date('H:i:s');

                                    $sql1 = "SELECT * FROM management_room 
WHERE status != 'Reject' 
  AND status != 'Canceled' 
  AND status != 'Release' 
  AND (start_date > '$current_date' 
       OR (start_date = '$current_date' AND end_time > '$current_time'))
ORDER BY 
  CASE 
    WHEN status = 'Pending' THEN 1 
    ELSE 2 
  END,
  start_date,
  end_time;";

                                    $result = mysqli_query($db, $sql1);
                                    if ($result) {
                                      while ($row = mysqli_fetch_assoc($result)) {
                                        $user = $row['user_name'];
                                        $start_date = $row['start_date'];
                                        $start_time = $row['start_time'];
                                        $end_time = $row['end_time'];
                                        $status = $row['status'];
                                        $id_user = $row['id'];
                                        $status_color = '';
                                        switch ($status) {
                                          case 'Pending':
                                            $status_class = 'bg-orange';
                                            break;
                                          case 'Approved':
                                            $status_class = 'bg-success';
                                            break;
                                          case 'Reserved':
                                            $status_class = 'bg-red';
                                            break;
                                          default:
                                            $status_class = '';
                                            break;
                                        }

                                        $selectQuery1 = "SELECT * FROM `hrm_room` WHERE id_room = '" . $row['room_id'] . "'";
                                        $sql = mysqli_query($db, $selectQuery1);
                                        $row1 = mysqli_fetch_assoc($sql);
                                        $room = $row1["room_name"];
                                    ?>
                                        <tr>
                                          <td><?php echo $user; ?></td>
                                          <td><?php echo $room; ?></td>
                                          <td><?php echo $start_time . ' until ' . $end_time; ?></td>
                                          <td><?php echo $start_date; ?></td>
                                          <td>
                                            <form method="post">
                                              <input type="hidden" name="view" value="<?php echo $id_user ?>">
                                              <button type="submit" name="viewsubmitroom" class="btn <?php echo $status_class; ?>">
                                                <span><?php echo $status; ?></span>
                                              </button>
                                            </form>
                                          </td>
                                        </tr>
                                    <?php
                                      }
                                      mysqli_free_result($result);
                                    } else {
                                      echo "Error: " . mysqli_error($db);
                                    }
                                    ?>
                                  </tbody>

                                </table>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-xl-6">
                      <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                          <h6 class="mb-0">Vehicle</h6>
                        </div>
                        <div class="card-body p-3">
                          <ul class="list-group">
                            <li class="list-group-item border-0 px-0">
                              <div class="form-check form-switch ps-0">
                                <div class="filter-container">
                                  <label for="filter-date-vehicle">Filter by Date:</label>
                                  <input type="date" id="filter-date-vehicle">
                                  <button class="btn btn-info" id="filter-btn-vehicle">Filter</button>
                                </div>
                                <br>
                                <table class="reservation-table">
                                  <thead>
                                    <tr>
                                      <th>USER</th>
                                      <th>VEHICLE</th>
                                      <th>USAGE TIME</th>
                                      <th>USAGE DATE</th>
                                      <th>STATUS</th>
                                    </tr>
                                  </thead>
                                  <tbody id="reservation-body-vehicle">
                                    <!-- PHP-generated content -->
                                    <?php
                                    echo '<style>
    .bg-orange { color: orange; font-weight: bold; }
    .bg-success { color: blue; font-weight: bold; }
    .bg-red { color: green; font-weight: bold; }
  </style>';

                                    $sql1 = "SELECT * 
FROM management 
WHERE status != 'Reject' 
  AND status != 'Done' 
  AND status != 'Canceled' 
ORDER BY 
  CASE 
    WHEN status = 'Pending' THEN 1 
    ELSE 2 
  END;
";
                                    $result = mysqli_query($db, $sql1);
                                    if ($result) {
                                      while ($row = mysqli_fetch_assoc($result)) {
                                        $user = $row['user_name'];
                                        $start_date = $row['start_date'];
                                        $start_time = $row['start_time'];
                                        $status1 = $row['status'];
                                        $vehicle_id = $row['vehicle_id'];
                                        $idvehicle = $row['id'];

                                        $status_class = '';
                                        switch ($status1) {
                                          case 'Pending':
                                            $status_class = 'bg-orange';
                                            break;
                                          case 'Approved':
                                            $status_class = 'bg-green';
                                            break;
                                          case 'Return':
                                            $status_class = 'bg-red';
                                            break;
                                          default:
                                            $status_class = '';
                                            break;
                                        }
                                        $selectQuery1 = "SELECT * FROM `hrm_vehicle` WHERE id = '" . $vehicle_id . "'";
                                        $sql = mysqli_query($db, $selectQuery1);
                                        $row1 = mysqli_fetch_assoc($sql);
                                        $model = $row1["model"];
                                    ?>
                                        <tr>
                                          <td><?php echo $user; ?></td>
                                          <td><?php echo $model; ?></td>
                                          <td><?php echo $start_time; ?></td>
                                          <td><?php echo $start_date; ?></td>
                                          <td>
                                            <form method="post">
                                              <input type="hidden" name="view1" value="<?php echo $idvehicle ?>">
                                              <button type="submit" name="viewsubmit" class="btn <?php echo $status_class; ?>">
                                                <span><?php echo $status1; ?></span>
                                              </button>
                                            </form>
                                          </td>
                                        </tr>
                                    <?php
                                      }
                                      mysqli_free_result($result);
                                    } else {
                                      echo "Error: " . mysqli_error($db);
                                    }
                                    ?>
                                  </tbody>

                                </table>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </div>

                <script>
                  document.addEventListener('DOMContentLoaded', function() {
                    // Room Table filter
                    const roomFilterBtn = document.getElementById('filter-btn-room');
                    roomFilterBtn.addEventListener('click', function() {
                      const filterDate = document.getElementById('filter-date-room').value;
                      const rows = document.querySelectorAll('#reservation-body-room tr');
                      rows.forEach(row => {
                        const dateCell = row.querySelector('td:nth-child(4)').textContent.trim();
                        if (dateCell !== filterDate) {
                          row.style.display = 'none';
                        } else {
                          row.style.display = '';
                        }
                      });
                    });

                    // Vehicle Table filter
                    const vehicleFilterBtn = document.getElementById('filter-btn-vehicle');
                    vehicleFilterBtn.addEventListener('click', function() {
                      const filterDate = document.getElementById('filter-date-vehicle').value;
                      const rows = document.querySelectorAll('#reservation-body-vehicle tr');
                      rows.forEach(row => {
                        const dateCell = row.querySelector('td:nth-child(4)').textContent.trim();
                        if (dateCell !== filterDate) {
                          row.style.display = 'none';
                        } else {
                          row.style.display = '';
                        }
                      });
                    });
                  });
                </script>

                </ul>

                <style>
                  .bg-orange {
                    background-color: orange;
                    color: white;
                  }

                  .bg-green {
                    background-color: green;
                    color: white;
                  }

                  .bg-red {
                    background-color: red;
                    color: white;
                  }
                </style>

                <br>
                <!--Start utk table approval lia 30/10/2023 -->

                <!--End utk table approval lia -->

              </div>

            </div>
          </div>



        </div>
      </div><!-- End News & Updates -->

      </div><!-- End Right side columns -->

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