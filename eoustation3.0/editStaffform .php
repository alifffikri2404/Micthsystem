<?php
session_start();
include "db_conn.php";
include "../db_conn.php";
$id = $_SESSION['updateid'];
$fname = $_SESSION['user_name'];

$sql = "SELECT * FROM empmaininfo WHERE First_Name ='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$uname = $row['First_Name'];
$Department = $row['Department'];
$Last_Name = $row['Last_Name'];
$Email = $row['Email'];
$Mobile_phone = $row['Mobile_phone'];
$Job_Title = $row['Job_Title'];
$Employment_Type = $row['Employment_Type'];
$Manager = $row['Manager'];
$user_name = $row['user_name'];


if (isset($_POST['submit'])) {

    $Department = $_POST['Department'];
    $Last_Name = $_POST['Last_Name'];
    $Email = $_POST['Email'];
    $Mobile_phone = $_POST['Mobile_phone'];
    $Manager = $_POST['Manager'];
    $user_name = $_POST['user_name'];
    $Employment_Type = $_POST['Employment_Type'];
    $Job_Title = $_POST['Job_Title'];

    // Error handling for empty fields
    if (empty($Department) || empty($Last_Name) || empty($Email) || empty($Mobile_phone)  || empty($user_name) || empty($Employment_Type) || empty($Job_Title)) {
        echo "<script>alert('Please fill in all required fields.')
        window.location='editStaffform .php';</script>";
        exit();
    }

    $sql = "UPDATE `empmaininfo` SET
        `Department`='$Department',
        `Last_Name`='$Last_Name',
        `Email`='$Email',
        `Mobile_phone`='$Mobile_phone',
        `Manager`='$Manager',
        `user_name`='$user_name',
        `Employment_Type`='$Employment_Type',
        `Job_Title`='$Job_Title'
    WHERE `First_Name`='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            window.location='editStaff.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error: ' . $sql . '<br>' . $conn->error . ')</script>";
        exit();
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

    <title>Update Staff</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../micthlogo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
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
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            Me
                        </span>
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

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-badge-fill"></i><span>Access User</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="../SSO/accessSSO.php">
                            <i class="bi bi-grid-fill" style="font-size: 1em"></i><span>Access View</span>
                        </a>
                    </li>
                </ul>
                <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="../SSO/userSSO.php">
                            <i class="bi bi-people-fill" style="font-size: 1em"></i><span>Staff List</span>
                        </a>
                    </li>
                </ul>
                <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="editHR.php">
                            <i class="bi bi-file-person-fill" style="font-size: 1em"></i><span>Current HR</span>
                        </a>
                    </li>
                </ul>
                <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="editStaff.php" class="active">
                            <i class="bi bi-person-lines-fill"
                                style="font-size: 1em; background-color: transparent"></i><span>Current Staff</span>
                        </a>
                    </li>
                </ul>
                <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="register.php">
                            <i class="bi bi-person-plus-fill" style="font-size: 1em"></i><span>Register</span>
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



    <!-- Content Wrapper -->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Update Staff<strong>

                </strong></h1>
            <nav>
                <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
                    <li class="breadcrumb-item"><a href="editStaff.php">Current Staff</a></li>
                    <li class="breadcrumb-item active">Update Staff</li>
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

                                    <div class="row align-items-stretch no-gutters contact-wrap">
                                        <div class="col-md-12">
                                            <div class="form h-100">
                                                <br>
                                                <br>
                                                <form class="mb-5" method="post" id="contactForm" name="contactForm">
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="" class="col-form-label">First Name *</label>
                                                            <input type="text" class="form-control" id="First_Name"
                                                                name="First_Name" value="<?php echo $uname ?>" readonly>
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="" class="col-form-label">Last Name *</label>
                                                            <input type="text" class="form-control" id="Last_Name"
                                                                name="Last_Name" value="<?php echo $Last_Name ?>">
                                                        </div>


                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="" class="col-form-label">Username *</label>
                                                            <input type="text" class="form-control" id="user_name"
                                                                name="user_name" value="<?php echo $user_name ?>">
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="" class="col-form-label">Email</label>
                                                            <input type="text" class="form-control" id="Email"
                                                                name="Email" value="<?php echo $Email ?>">
                                                        </div>


                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="" class="col-form-label"> Mobile Phone </label>
                                                            <input type="text" class="form-control" id="Mobile_phone"
                                                                name="Mobile_phone" value="<?php echo $Mobile_phone ?>">
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="Employment_Type"
                                                                class="col-form-label">Employment Type</label>
                                                            <select class="form-control" id="Employment_Type"
                                                                name="Employment_Type">
                                                                <option value="Full Time" <?php echo ($Employment_Type == 'Full Time') ? 'selected' : ''; ?>>Full Time</option>
                                                                <option value="Part Time" <?php echo ($Employment_Type == 'Part Time') ? 'selected' : ''; ?>>Part Time</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="Department" class="col-form-label">Department
                                                                *</label>
                                                            <select class="form-control" id="Department"
                                                                name="Department" onchange="updateManagerTextBox()">
                                                                <?php
                                                                $sql = "SELECT * FROM empdept";
                                                                $result = $conn->query($sql);
                                                                if ($result->num_rows > 0) {
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        $selected = ($row['dept_id'] == $Department) ? 'selected' : '';
                                                                        echo '<option value="' . $row['dept_id'] . '" ' . $selected . '>' . $row['name'] . '</option>';
                                                                    }
                                                                } else {
                                                                    echo '<option value="">No Department available</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <script
                                                            src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                                        <script>
                                                            function updateManagerTextBox() {
                                                                var selectedDepartment = $("#Department").val();
                                                                var managerTextBox = $("#Manager");

                                                                // Update the manager's text box based on the selected department
                                                                switch (selectedDepartment) {
                                                                    case "8":
                                                                        managerTextBox.val("8");
                                                                        break;
                                                                    case "3":
                                                                        managerTextBox.val("4");
                                                                        break;
                                                                    case "9":
                                                                        managerTextBox.val("6");
                                                                        break;
                                                                    case "10":
                                                                        managerTextBox.val("2");
                                                                        break;
                                                                    case "7":
                                                                        managerTextBox.val("8");
                                                                        break;
                                                                    case "4":
                                                                        managerTextBox.val("3");
                                                                        break;
                                                                    case "1":
                                                                        managerTextBox.val("1");
                                                                        break;
                                                                    case "5":
                                                                        managerTextBox.val("5");
                                                                        break;
                                                                    default:
                                                                        managerTextBox.val("");
                                                                }
                                                            }

                                                            // Call the function initially to set the manager based on the default department
                                                            $(document).ready(function () {
                                                                updateManagerTextBox();
                                                            });
                                                        </script>


                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="Job_Title" class="col-form-label">Job
                                                                Title*</label>
                                                            <select class="form-control" id="Job_Title"
                                                                name="Job_Title">
                                                                <?php
                                                                $sql = "SELECT job_id, job_title FROM empjobtitle";
                                                                $result = $conn->query($sql);
                                                                if ($result->num_rows > 0) {
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        $selected = ($row['job_id'] == $Job_Title) ? 'selected' : '';
                                                                        echo '<option value="' . $row['job_id'] . '" ' . $selected . '>' . $row['job_title'] . '</option>';
                                                                    }
                                                                } else {
                                                                    echo '<option value="">No job titles available</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>




                                                    <div class="row">
                                                        <div class="col-md-12 form-group">
                                                            
                                                            <input type="submit" id="submit" name="submit"
                                                                value="Submit"
                                                                class="btn btn-primary rounded-0 py-2 px-4">
                                                            <span class="submitting"></span>
                                                        </div>
                                                    </div>
                                                </form>




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
            Copyright &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>
            <strong><span>MICTH SYSTEM</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <a href="https://www.micth.com//">MELAKA ICT HOLDINGS SDN. BHD.</a>
        </div>
    </footer><!-- End Footer -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet"
        type="text/css">
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
        $(document).ready(function () {
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