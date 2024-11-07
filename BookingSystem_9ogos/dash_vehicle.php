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
  $_SESSION['updateid'] = $_POST['view'];
  header("Location: viewbook.php");
  exit();
}

if (empty($_SESSION['First_Name'])) {
  header("Location: iout.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vehicle Booking List</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta http-equiv="refresh" content="15">

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
      <h1>List of Vehicle Booking</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home Page</a></li>
          <li class="breadcrumb-item active">Vehicle Booking List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-20">
          <div class="row">

            <?php
            $sql0 = "SELECT * FROM management WHERE status ='Booking'";
            $result = mysqli_query($db, $sql0);
            $totalRows = mysqli_num_rows($result);
            ?>
            <div class="col-12">
              <div class="card recent-sales">

                <div class="card-body">
                  <h5 class="card-title"><strong>DASHBOARD</strong><br />
                    <span class="text-danger">*Every staff must return daily the car key before 5.30pm.</span>
                  </h5>


                  <div class="card">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                          <div id="calendar">
                            <?php
                            $dateComponents = getdate();
                            if (isset($_GET['month']) && isset($_GET['year'])) {
                              $month = $_GET['month'];
                              $year = $_GET['year'];
                            } else {
                              $month = $dateComponents['mon'];
                              $year = $dateComponents['year'];
                            }
                            if (isset($_GET['vehicle'])) {
                              $vehicle = $_GET['vehicle'];
                            } else {
                              $vehicle = 0;
                            }
                            echo build_calendar_adminview($month, $year, $vehicle);

                            ?>
                            <script>
                              function showPopup(day, user, startTime) {
                                alert("The day " + day + " has been booked by " + user + " starting at " + startTime + ".");
                              }
                            </script>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
                  <script>
                    $("#vehicle_select").change(function() {
                      $("#vehicle_select_form").submit();
                    });

                    $("#vehicle_select option[value='<?php echo $vehicle; ?>']").attr('selected', 'selected');
                  </script>
                  <ul class="box-info">
                    <li>
                      <div class='bx bxs-calendar-check'></div>
                      <div class="text">
                        <h3>
                          <?php echo $totalRows ?? 'No data'; ?>
                        </h3>
                        <p>Pending approve</p>
                      </div>
                    </li>
                    <li>
                      <?php
                      $sql1 = "SELECT * FROM management WHERE status ='Return'";
                      $result = mysqli_query($db, $sql1);
                      $totalRows = mysqli_num_rows($result);
                      ?>
                      <div class='bx bxs-key'></div>
                      <div class="text">
                        <h3>
                          <?php echo $totalRows ?? 'No data'; ?>
                        </h3>
                        <p>Pending Return key.</p>
                      </div>
                    </li>

                  </ul>
                  <div class="table-data">
                    <div class="order">
                      <div class="head">
                        <h3>Recently</h3>
                        <div class="col-md-7">
                          <form action="" method="GET">
                            <div class="row">
                              <div class="col-md-4">
                                <input type="date" name="start_date" value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : '' ?>" class="form-control">
                              </div>
                              <div class="col-md-2">
                                <input type="month" name="selected_month" value="<?= isset($_GET['selected_month']) ? $_GET['selected_month'] : '' ?>" class="form-control">
                              </div>
                              <div class="col-md-2">
                                <input type="week" name="selected_week" value="<?= isset($_GET['selected_week']) ? $_GET['selected_week'] : '' ?>" class="form-control">
                              </div>
                              <div class="col-md-4">
                                <select name="status" class="form-select">
                                  <option value="">Select Status</option>
                                  <option value="Booking" <?= isset($_GET['status']) && $_GET['status'] == 'Booking' ? 'selected' : '' ?>>Pending</option>
                                  <option value="Return" <?= isset($_GET['status']) && $_GET['status'] == 'Return' ? 'selected' : '' ?>>Returned Key</option>
                                  <option value="Approved" <?= isset($_GET['status']) && $_GET['status'] == 'Approved' ? 'selected' : '' ?>>Approved</option>
                                </select>
                              </div>


                            </div>

                            <div class="col-md-2">
                              <br>
                              <button type="submit" class="btn btn-primary">Filter</button>
                              <a href="dash_vehicle.php" class="btn btn-danger">Reset</a>
                            </div>
                          </form>
                        </div>
                      </div>
                      <table class="table" id="DataTable">
                        <thead class="thead-dark">
                          <tr>
                            <th>ID.</th>
                            <th>STAFF NAME</th>
                            <th>DATE USE</th>
                            <th>VEHICLE</th>
                            <th>ACCESSORIES</th>
                            <th>STATUS</th>
                          </tr>
                        </thead>
                        <?php
                        $selectQuery = "SELECT * FROM `management` WHERE 1=1";
                        if (isset($_GET['start_date']) && !empty($_GET['start_date'])) {
                          $selectQuery .= " AND start_date = '" . $_GET['start_date'] . "'";
                        }
                        if (isset($_GET['status']) && !empty($_GET['status'])) {
                          $selectQuery .= " AND status = '" . $_GET['status'] . "'";
                        }
                        if (isset($_GET['selected_month']) && !empty($_GET['selected_month'])) {
                          $selectedMonth = $_GET['selected_month'];
                          $startDate = date('Y-m-01', strtotime($selectedMonth));
                          $endDate = date('Y-m-t', strtotime($selectedMonth));
                          $selectQuery .= " AND start_date >= '$startDate' AND start_date <= '$endDate'";
                        }
                        if (isset($_GET['selected_week']) && !empty($_GET['selected_week'])) {
                          $selectedWeek = $_GET['selected_week'];
                          $weekNumber = substr($selectedWeek, -2);
                          $year = substr($selectedWeek, 0, 4);
                          $startDate = date("Y-m-d", strtotime("{$year}-W{$weekNumber}-1"));
                          $endDate = date("Y-m-d", strtotime("{$year}-W{$weekNumber}-7"));
                          $selectQuery .= " AND start_date >= '$startDate' AND start_date <= '$endDate'";
                        }
                        $selectQuery .= " AND status != 'Done' AND status != 'Reject'";
                        $selectQuery .= " ORDER BY id DESC"; // Sort by ID in descending order
                        $sql = mysqli_query($db, $selectQuery);
                        $counter = 1;
                        if (mysqli_num_rows($sql) > 0) {
                        ?>
                          <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                              <tr>
                                <td>
                                  <form method="post">
                                    <input type="hidden" name="view" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="viewsubmit" class="btn btn-primary">
                                      <?php echo $row['id']; ?>
                                    </button>
                                  </form>
                                </td>
                                <td>
                                  <?php echo $row['user_name']; ?>
                                </td>
                                <td>
                                  <?php echo $row['start_date']; ?>
                                </td>
                                <td>
                                  <?php echo $row['model_plat']; ?>
                                </td>
                                <td>
                                  <?php echo ($row['fuel_card'] == 1 ? 'Fuel Card' : '') . ($row['tng_card'] == 1 ? ', Touch \'n Go Card' : ''); ?>
                                </td>
                                <td>
                                  <?php echo $row['status']; ?>
                                </td>
                                <td></td>
                              </tr>
                            <?php
                              $counter++;
                            }
                            ?>
                          </tbody>
                        <?php
                        } else {
                        ?>
                          <tbody>
                            <tr>
                              <td colspan="7">No activity here</td>
                            </tr>
                          </tbody>
                        <?php
                        }
                        ?>

                      </table>
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Please provide the reason for the
                                rejection.</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form method="post" id="rejectForm">
                                <div class="mb-3">
                                  <label for="message-text" class="col-form-label">Reason:</label>
                                  <textarea class="form-control" id="message-text" name="rejection_reason"></textarea>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <input type="hidden" name="row_id" value="" id="rejectRowId">
                                  <button type="submit" name="reject" form="rejectForm" class="btn btn-info">Submit</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


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

    function showDetails(id) {
      var x = document.getElementById(id);
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
  </script>


</body>

</html>