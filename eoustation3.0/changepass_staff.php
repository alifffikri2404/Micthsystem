<?php
session_start();
include "db_conn.php";




$First_Name = $_SESSION['First_Name'];
$fname = $_SESSION['user_name'];
$status = $_SESSION['status'];
$id = $_SESSION['id'];
$uid = $_SESSION['id'];

$Last_Name = $_SESSION['Last_Name'];
$Email = $_SESSION['Email'];
$Mobile_phone = $_SESSION['Mobile_phone'];
$Job_Title = $_SESSION['Job_Title'];
$Employment_Type = $_SESSION['Employment_Type'];
$Manager = $_SESSION['Manager'];
$Department = $_SESSION['Department'];
$emp_number = $_SESSION['emp_number'];

if (isset($_POST["update"])) {
    $_SESSION['updateid'] = $_POST['update'];
    header("Location: checkin.php");
    exit();
}

if (isset($_POST["delete"])) {
    $delete = $_POST['delete'];
    $sql = "DELETE FROM `outstation` WHERE id='$delete'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Delete success.')</script>";
    } else {
        echo "<script>alert('Delete failed.')</script>";
    }
}
if ($fname == 0) {
    header("Location: logout.php");
    exit(); 
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home Page - Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logomicth1.png" rel="icon">
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
    .container {
        width: 95%;
        max-width: 500px;
        border: 2px solid #ccc;
        padding: 30px;
        background: #fff;
        border-radius: 15px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        /* Adjusted margin for better spacing */
    }

    input {
        display: block;
        border: 2px solid #ccc;
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
    }

    label {
        color: #888;
        font-size: 18px;
        padding: 10px 0;
        /* Adjusted padding for better alignment */
        display: block;
        /* Added to ensure labels appear on top of inputs */
    }

    button {
        width: 100%;
        background: #555;
        padding: 10px 15px;
        color: #fff;
        border-radius: 5px;
        margin: 10px 0;
        border: none;
        cursor: pointer;
        /* Added cursor pointer for better UX */
    }

    button:hover {
        opacity: .7;
    }

    .error,
    .success {
        background: #F2DEDE;
        color: #A94442;
        /* Adjusted color for consistency */
        padding: 10px;
        border-radius: 5px;
        margin: 20px 0;
        /* Adjusted margin for better spacing */
    }

    .success {
        background: #D4EDDA;
        color: #155724;
        /* Adjusted color for consistency */
    }

    .ca {
        font-size: 14px;
        display: inline-block;
        padding: 10px;
        text-decoration: none;
        color: #444;
    }

    .ca:hover {
        text-decoration: underline;
    }

    .home-nav a {
        padding: 10px;
        color: #f7bd65;
        text-transform: uppercase;
        text-decoration: none;
    }

    /* Media query for smaller screens (mobile devices) */
</style>





<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="dash2.php" class="logo d-flex align-items-center">
                <img src="R.png" alt=""> <span class="d-none d-lg-block">eoustation</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">


                <li class="nav-item dropdown">





                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            Me </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>
                                <?php echo $fname ?>
                            </h6>
                            <span>Admin</span>
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

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">



    <li class="nav-item">
        <a class="nav-link collapsed" href="dash2.php">
            <i class="nav-icon fas fa-home"></i>
            <span>Home Page</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="dashStaff.php">
            <i class="nav-icon far fa-calendar"></i>
            <span>My Report</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="FormStaff.php">
            <i class="nav-icon fas fa-pen"></i>
            <span>Check-Out</span>
        </a>
    </li>
    <?php
            if ($Job_Title == "Manager" || $Job_Title == "Senior Manager") {
            ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="pending_staff_check.php">
                    <i class="fas fa-clock"></i>

                        <span>Pending Staff Check-In </span>
                    </a>
                </li>
            <?php
            }
            ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="feedback.php">
            <i class="nav-icon fas fa-pen"></i>
            <span>Feedback </span>
        </a>
    </li>

    
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
            <i class="nav-icon fas fa-users"></i></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="editprofile_staff.php">
                    <i class="bi bi-circle"></i><span>Edit Profile</span>
                </a>
            </li>
            <li>
                <a href="changepass_staff.php">
                    <i class="bi bi-circle"></i><span>change Password</span>
                </a>
            </li>

        </ul>
    </li>

    <!-- End Tables Nav -->

</ul>

</aside><!-- End Sidebar-->


    <!-- Content Wrapper -->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Change password <strong>
                </strong></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dash2.php">Home Page</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-20">
                    <div class="row">



                        <section class="content">
                            <div class="container">

                                <form action="change-p.php" method="post">
                                    <?php if (isset($_GET['error'])) { ?>
                                        <p class="error"><?php echo $_GET['error']; ?></p>
                                    <?php } ?>

                                    <?php if (isset($_GET['success'])) { ?>
                                        <p class="success"><?php echo $_GET['success']; ?></p>
                                    <?php } ?>

                                    <label for="op">Old Password</label>
                                    <input type="password" id="op" name="op" placeholder="Old Password">

                                    <label for="np">New Password</label>
                                    <input type="password" id="np" name="np" placeholder="New Password">

                                    <label for="c_np">Confirm New Password</label>
                                    <input type="password" id="c_np" name="c_np" placeholder="Confirm New Password">

                                    <button type="submit">CHANGE</button>
                                </form>
                            </div>
                        </section>

                    </div>
                </div>



            </div>
            </div><!-- End News & Updates -->

            </div><!-- End Right side columns -->

            </div>
        </section>
    </main><!-- End #main -->


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