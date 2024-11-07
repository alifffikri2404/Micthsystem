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

    if ($result) {
        echo "<script>alert('Delete success.')</script>";
    } else {
        echo "<script>alert('Delete failed.')</script>";
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

    <title>Register Staff</title>
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
                    <i class="bi bi-person-badge-fill"></i><span>Access User</span><i class="bi bi-chevron-down ms-auto"></i>
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
                        <a href="editStaff.php">
                            <i class="bi bi-person-lines-fill" style="font-size: 1em"></i><span>Current Staff</span>
                        </a>
                    </li>
                </ul>
                <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="register.php" class="active">
                            <i class="bi bi-person-plus-fill" style="font-size: 1em; background-color: transparent"></i><span>Register</span>
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
            <h1>Register New Staff</h1>
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

                                    <div class="card-body">
                                        <h2 class="title"></h2>
                                        <form action="signup-check.php" method="POST">
                                            <?php if (isset($_GET['error'])) { ?>
                                                <p class="error" style="color: red;"><?php echo $_GET['error']; ?></p>
                                            <?php } elseif (isset($_GET['success'])) { ?>
                                                <p class="success"><?php echo $_GET['success']; ?></p>
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="label">First Name</label>
                                                        <input class="form-control" type="text" name="first_name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="label">Last Name</label>
                                                        <input class="form-control" type="text" name="last_name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <br>

                                                <div class="col-md-6">
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="label">Username</label>
                                                        <input class="form-control" type="text" name="fname" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> <br>

                                                    <div class="form-group">
                                                        <label class="label">Employee Number</label>
                                                        <input class="form-control" type="text" name="emp_no" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="label">Email</label>
                                                        <input class="form-control" type="email" name="email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="label">Mobile Phone</label>
                                                        <input class="form-control" type="text" name="mobile_phone" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="label">Password</label>
                                                        <input class="form-control" type="password" name="password" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="label">Re-Password</label>
                                                        <input class="form-control" type="password" name="re_password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="label">Department</label>
                                                        <select class="form-control" name="status" id="status" onchange="updateManagerTextBox()" required>
                                                            <option disabled="disabled" selected="selected">Choose option</option>
                                                            <option value="Digital & Information Technology">Digital & Information Technology</option>
                                                            <option value="Account">Account</option>
                                                            <option value="Corporate">Corporate </option>
                                                            <option value="Legal & Integrity">Legal & Integrity</option>
                                                            <option value="Telecommunication Infrastructure">Telecommunication Infrastructure</option>
                                                            <option value="Commercial">Commercial</option>
                                                            <option value="Human Resources & Admin">Human Resources & Admin</option>
                                                            <option value="Internal Audit">Internal Audit</option>
                                                            <option value="CEO">CEO</option>
                                                        </select>
                                                        <script>
                                                            function updateManagerTextBox() {
                                                                var selectedDepartment = $("#status").val();
                                                                var managerTextBox = $("#Manager");

                                                                // Update the manager's text box based on the selected department
                                                                switch (selectedDepartment) {
                                                                    case "Digital & Information Technology":
                                                                        managerTextBox.val("Nur Amalina Binti Abd Rahman");
                                                                        break;
                                                                    case "Account":
                                                                        managerTextBox.val("Mohamad Hod Bin Rabu");
                                                                        break;
                                                                    case "Corporate":
                                                                        managerTextBox.val("");
                                                                        break;
                                                                    case "Internal Audit":
                                                                        managerTextBox.val("");
                                                                        break;
                                                                    case "Legal & Integrity":
                                                                        managerTextBox.val("Zulliana Binti Muhammad");
                                                                        break;
                                                                    case "Telecommunication Infrastructure":
                                                                        managerTextBox.val("Ahmad Safwan Bin Yusof");
                                                                        break;
                                                                    case "Commercial":
                                                                        managerTextBox.val("Norwajunizam Bin Abd Wahab");
                                                                        break;
                                                                    case "CEO":
                                                                        managerTextBox.val("Datuk Seri Utama Ab Rauf Bin Yusoh");
                                                                        break;
                                                                    case "Human Resources & Admin":
                                                                        managerTextBox.val("Muhammad Farid Bin Ariffin");
                                                                        break;

                                                                    default:
                                                                        managerTextBox.val("");
                                                                }
                                                            }

                                                            // Call the function initially to set the manager based on the default department
                                                            updateManagerTextBox();
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="label">Manager</label>
                                                        <input class="form-control" type="text" id="Manager" name="Manager" readonly>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="label">Job Title</label>
                                                        <select class="form-control" name="job_title" required>
                                                            <option disabled="disabled" selected="selected">Choose option</option>
                                                            <option value="Officer">Officer</option>
                                                            <option value="Driver">Driver</option>
                                                            <option value="Admin Assistant">Admin Assistant</option>
                                                            <option value="">Assistant Officer</option>
                                                            <option value="Technician">Technician</option>
                                                            <option value="Executive">Executive</option>
                                                            <option value="Senior Executive">Senior Executive</option>
                                                            <option value="PSH">PSH</option>
                                                            <option value="Pegawai Perhubungan">Pegawai Perhubungan</option>
                                                            <option value="Protege">Protege</option>
                                                            <option value="Assistant Manager">Assistant Manager</option>
                                                            <option value="Chief Executive Officer">Chief Executive Officer</option>
                                                            <option value="Chief Operating Officer">Chief Operating Officer</option>
                                                            <option value="Head">Head</option>
                                                            <option value="Manager">Manager</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="label">Employee Type</label>
                                                        <select class="form-control" name="employee_type" required>
                                                            <option disabled="disabled" selected="selected">Choose option</option>
                                                            <option value="Full Time">Full Time</option>
                                                            <option value="Part Time">Full Time</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <br>
                                                <button class="btn btn-primary btn-block" name="submit" type="submit">Submit</button>
                                            </div>
                                        </form>
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