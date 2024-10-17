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

    <title>Edit Profile - Admin</title>
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
    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8;
    }

    .profile-button {
        background: gray;
        box-shadow: none;
        border: none;
    }

    .profile-button:hover {
        background: #682773;
    }

    .profile-button:focus {
        background: whitesmoke;
        box-shadow: none;
    }

    .profile-button:active {
        background: whitesmoke;
        box-shadow: none;
    }

    .back:hover {
        color: whitesmoke;
        cursor: pointer;
    }

    #save {
        margin-top: 20px;
    }

    .card {
        margin-top: 990px;
    }
</style>



<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="dash.php" class="logo d-flex align-items-center">
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
                       Me
                        </span>
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
                <a class="nav-link " href="dash.php">
                    <i class="nav-icon fas fa-home"></i>
                    <span>Home Page</span>
                </a>
            </li><!-- End Dashboard Nav -->

          
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="tablefb.php">
                    <i class="nav-icon fas fa-pen"></i>
                    <span>View Feedback </span>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="nav-icon fas fa-edit"></i><span> Human Resources</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <!-- Added 'show' class here -->
                    <li>
                        <a href="myreport.php">
                            <i class="bi bi-circle"></i><span>View Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="data.php">
                            <i class="bi bi-circle"></i><span>Generate Report</span>
                        </a>
                    </li>
                    <?php
                    $sql = "SELECT * FROM outstation WHERE timeIn ='00:00:00'";
                    $result = mysqli_query($conn, $sql);
                    $totalRows = mysqli_num_rows($result);
                    ?>
                    <li>
                        <a href="SNC.php">
                            <i class="bi bi-circle"></i>
                            <p>Pending CheckIn Staff <span class="float-right badge bg-danger">
                                    <?php echo $totalRows ?? 'No data'; ?>
                                </span></p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
                    <i class="nav-icon fas fa-users"></i></i><span>User System</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <?php if ($Job_Title == "Manager") { ?>
                        <li>
                            <a href="editHR.php">
                                <i class="bi bi-circle"></i><span>Current HR</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="editStaff.php">
                            <i class="bi bi-circle"></i><span>Current Staff</span>
                        </a>
                    </li>
                    <li>
                        <a href="register.php">
                            <i class="bi bi-circle"></i><span>Register</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
                    <i class="nav-icon fas fa-users"></i></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="report-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="editprofile.php">
                            <i class="bi bi-circle"></i><span>Edit Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="changepass.php">
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
            <h1>Edit Profile <strong>
                </strong></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dash.php">Home Page</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->



        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-20">
                    <div class="row">



                        <div class="col-12">

                            <div class="card-body">
                                <br>

                                <div class="container bootstrap snippet">
                                    <div class="container rounded bg-white">

                                        <div class="row">

                                            <div class="col-md-4 border-right">
                                                <br>
                                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                                    <img class="rounded-circle mt-5" src="user.jpg" width="90">
                                                    <br><span class="font-weight-bold">
                                                        <?php echo $First_Name . ' ' . $Last_Name; ?>
                                                    </span>
                                                    <span class="text-black-50">
                                                        <?php echo $Email; ?>
                                                    </span><span>Malaysia</span>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="p-3 py-5">
                                                    <form class="form" action="#" method="post" id="registrationForm">
                                                        <div class="form-group">
                                                            <label for="first_name">
                                                                <h4>First name</h4>
                                                            </label>
                                                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo htmlspecialchars($First_Name); ?>" title="Enter your first name if any.">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="last_name">
                                                                <h4>Last name</h4>
                                                            </label>
                                                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo htmlspecialchars($Last_Name); ?>" title="Enter your last name if any.">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">
                                                                <h4>Phone Number</h4>
                                                            </label>
                                                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo htmlspecialchars($Mobile_phone); ?>" title="Enter your phone number if any.">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">
                                                                <h4>Email</h4>
                                                            </label>
                                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($Email); ?>" title="Enter your email.">
                                                        </div>
                                                        <br>
                                                        <button class="btn btn-primary profile-button" id="save" name="save" type="submit">Save Profile</button>
                                                    </form>

                                                    <?php
                                                    if (isset($_POST['save'])) {
                                                        $FirstName = $_POST['first_name'];
                                                        $LastName = $_POST['last_name'];
                                                        $Mobile_phone = $_POST['phone'];
                                                        $Email = $_POST['email'];

                                                        // Your database connection should be established here
                                                        include ('../db_conn.php');

                                                        $sql = "UPDATE `empmaininfo` SET `First_name`='$FirstName', `Last_Name`='$LastName', 
            `Mobile_phone`='$Mobile_phone', `Email`='$Email' WHERE `Internal_Id`='$emp_number'";
                                                        if ($conn->query($sql) === TRUE) {
                                                            echo "<script>alert('Successfully edited.');
            window.location.href = window.location.href; // Reload the current page
        </script>";
                                                            exit();
                                                        } else {
                                                            echo "<script>alert('Error: " . $conn->error . "')</script>";
                                                        }
                                                        // Close the database connection after performing operations
                                                        $conn->close();
                                                    }
                                                    ?>

                                                </div>
                                            </div>
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