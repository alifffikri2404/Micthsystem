<?php
session_start();
include "db_conn.php";

$fname = $_SESSION['user_name'];

$uid = $_SESSION['id'];
$First_Name = $_SESSION['First_Name'];
$Job_Title = $_SESSION['Job_Title'];

if (isset($_POST["update"])) {
    $_SESSION['updateid'] = $_POST['update'];

    header("Location: checkin.php");
    exit();
}

if (isset($_POST["delete"])) {
    $delete = $_POST['delete'];
    $sql = "DELETE FROM `outstation` WHERE id='$delete'";
    $result = mysqli_query($conn, $sql);

    if ($conn->query($sql)) {
    } else {
        echo "<script>alert('Delete failed. $conn -> $error')</script>";
    }
}
if (empty($_SESSION['First_Name'])) {
    header("Location: logout.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>View Report</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
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
            <a class="nav-link" data-bs-target="#book-room-nav" data-bs-toggle="collapse"
              href="#" style="padding: 10px 15px 10px 40px" class="active">
                <i class="bi bi-people" style="font-size: 1em"></i></i><span>Human Resources</span>
                <i class="bi bi-chevron-down ms-auto" style="font-size: 1em"></i>
            </a>
            <ul id="book-room-nav" class="nav-content collapse show" data-bs-parent="#booking-system-nav">
                <li class="nav-item">
                    <a class="active" href="myreport.php" style="padding-left: 60px">
                        <i class="bi bi-caret-right-fill" style="background-color: transparent"></i></i>
                        <span>View Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed show" href="data.php" style="padding-left: 60px">
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
            <h1>View Report</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dash.php">Home Page</a></li>
                  <li class="breadcrumb-item active">View Report</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-20">
                    <div class="row">



                        <div class="col-12">
                            <div class="card recent-sales">

                                <div class="card-body">
                                    
                                    <br>
                                    <form method="post">
                                    <table id="datatable2" class="table table-bordered table-striped">
                                    <thead>
                                                <tr>
                                                    <th rowspan="2">Bil.</th>
                                                    <th rowspan="2">Name</th>
                                                   
                                                    <th rowspan="2">Location</th>
                                                    <th rowspan="2">Purpose</th>

                                                    <th colspan="2">Date/Time
                                                       
                                                </tr>
                                                </centre>

                                                <td>Check Out</td>
                                                <td>Check In </td>


                                            </thead>
                                            <script>

                                            </script>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM outstation ";

                                                $result = mysqli_query($conn, $sql);
                                                $index = 0;
                                                if ($result) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $id = $row['id'];
                                                        $name = $row["name"];
                                                        $location = $row['location'];
                                                        $purpose = $row['purpose'];
                                                        $dateOut = $row['dateOut'];
                                                        $timeOut = $row['timeOut'];
                                                        $dateIn = $row['dateIn'];
                                                        $timeIn = $row['timeIn'];
                                                        $timeCu = $row['timeCu'];
                                                        $Department = $row['status'];
                                                        $emp_no = $row['emp_no'];
                                                        $timeCuIn = $row['timeCuIn'];
                                                        $index++;
                                                        echo "
                                                        <tr>
                                                            <td>$index</td>
                                                            <td>$name</td>
                                                       
                                                            <td>$location</td>
                                                            <td>$purpose</td>
                                                            <td>$dateOut/$timeOut<br> ($timeCu)</td>
                                                            <td>$dateIn/$timeIn<br>($timeCuIn)<br></td>";
                                                    
                                                    
                                                    
                                                    echo "</tr>";
                                                    
                                                  }
                                                }

                                                ?>

                                            </tbody>
                                        </table>
                                    </form>

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
  $(function() {
    $("#datatable2").DataTable({
      'responsive': true,
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': false
    });
    $("#datatable").DataTable({
      'responsive': true,
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': false
    });
  });

function myFunction() {
  window.print();
}
</script>

<!-- DataTable JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>





</body>

</html>