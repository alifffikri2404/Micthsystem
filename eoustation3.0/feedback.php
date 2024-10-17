<?php
session_start();
include "db_conn.php";

$Last_Name = $_SESSION['Last_Name'];
$Email = $_SESSION['Email'];
$Mobile_phone = $_SESSION['Mobile_phone'];
$Job_Title = $_SESSION['Job_Title'];
$Employment_Type = $_SESSION['Employment_Type'];
$Manager = $_SESSION['Manager'];
$Department = $_SESSION['Department'];
$First_Name = $_SESSION['First_Name'];
$fname = $_SESSION['user_name'];

$emp_number = $_SESSION['emp_number'];

if ($fname == 0) {
  header("Location: logout.php");
  exit(); 
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

    <title>Feedback</title>
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
    .card {
      background-color: #fff;
      border-radius: 10px;
      padding: 20px;
      width: 400px;
      display: flex;
      flex-direction: column;
      margin-left: 270px;
      margin-bottom: 700px;

    }

    .title {
      font-size: 24px;
      font-weight: 600;
      text-align: center;
    }

    .form {
      margin-top: 20px;
      display: flex;
      flex-direction: column;
    }

    .group {
      position: relative;
    }

    .form .group label {
      font-size: 14px;
      color: rgb(99, 102, 102);
      position: absolute;
      top: -10px;
      left: 10px;
      background-color: #fff;
      transition: all .3s ease;
    }

    .form .group input,
    .form .group textarea {
      padding: 10px;
      border-radius: 5px;
      border: 1px solid rgba(0, 0, 0, 0.2);
      margin-bottom: 20px;
      outline: 0;
      width: 100%;
      background-color: transparent;
    }

    .form .group input:placeholder-shown+label,
    .form .group textarea:placeholder-shown+label {
      top: 10px;
      background-color: transparent;
    }

    .form .group input:focus,
    .form .group textarea:focus {
      border-color: #3366cc;
    }

    .form .group input:focus+label,
    .form .group textarea:focus+label {
      top: -10px;
      left: 10px;
      background-color: #fff;
      color: #3366cc;
      font-weight: 600;
      font-size: 14px;
    }

    .form .group textarea {
      resize: none;
      height: 100px;
    }

    .form button {
      background-color: #3366cc;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .form button:hover {
      background-color: #27408b;
    }

    .card {
      background-color: #fff;
      border-radius: 10px;
      padding: 20px;
      width: 80%;
      /* Adjust the width for smaller screens */
      margin: 0 auto;
      /* Center the card on smaller screens */
      margin-bottom: 20px;
      /* Adjust margin as needed */
    }

    /* Other styles remain the same */

    @media screen and (max-width: 600px) {
      .card {
        width: 90%;
        /* Adjust the width for even smaller screens if needed */
        margin-left: 0;
        /* Remove left margin on smaller screens */
        margin-bottom: 20px;
        /* Adjust margin as needed */
      }

      .title {
        font-size: 20px;
        /* Adjust the font size for smaller screens */
      }

      .form .group label {
        font-size: 12px;
        /* Adjust the font size for smaller screens */
      }

      .form .group input,
      .form .group textarea {
        padding: 8px;
        /* Adjust the padding for smaller screens */
      }

      .form button {
        padding: 8px;
        /* Adjust the padding for smaller screens */
        font-size: 14px;
        /* Adjust the font size for smaller screens */
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
    <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
    <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-door-open-fill"></i><span>Outstation System</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>

    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="dash2.php">
          <i class="bi bi-house-door-fill" style="font-size: 1em"></i><span>Home</span>
        </a>
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="dashStaff.php">
          <i class="bi bi-calendar-fill" style="font-size: 1em"></i><span>My Report</span>
        </a>
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="FormStaff.php">
          <i class="bi bi-pencil-fill" style="font-size: 1em"></i><span>Check-Out</span>
        </a>
      </li>
    </ul>
    <?php
    if ($Job_Title == "9" || $Job_Title == "14") {
    ?>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="pending_staff_check.php">
          <i class="bi bi-clock-fill" style="font-size: 1em"></i><span>Pending Staff Check-In</span>
        </a>
      </li>
    </ul>
    <?php
    }
    ?>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="feedback.php" class="active">
          <i class="bi bi-chat-left-text-fill" style="font-size: 1em; background-color: transparent"></i><span>Feedback</span>
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

    <!-- End Tables Nav -->

</ul>

</aside><!-- End Sidebar-->


    <main id="main" class="main">


      <section class="section dashboard">

        <div class="pagetitle">
          <h1>Feedback<strong>

            </strong></h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dash2.php">Home Page</a></li>
              <li class="breadcrumb-item active">Feedback</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <body>


          <?php $full_name = $First_Name . ' ' . $Last_Name; ?>

          <div class="content">

            <div class="container">

              <div class="card">
                <span class="title">Leave a feedback</span>
                <form method="post" class="form">
                  <div class="group">
                    <input placeholder="‎" type="text" id="fullname" name="fullname" value="<?php echo $full_name; ?>" readonly>

                    <label for="Full Name">Name</label>
                  </div>

                  <div class="group">
                    <input placeholder="‎" type="text" id="empno" name="empno" value="<?php echo $emp_number; ?>" readonly>
                    <label for="empno">Employee Number</label>
                  </div>

                  <div class="group">
                    <textarea placeholder="‎" id="comment" name="comment" rows="5" required=""></textarea>
                    <label for="Comment">Comment</label>
                  </div>
                  <button id="submit" name=" submit" type="submit">Submit</button>
                </form>
              </div>

            </div>
            <?php
            include "db_conn.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $current_date = date("Y-m-d");

              function validate($data)
              {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }

              $full_name = validate($_POST['fullname']);  // Assuming you have separate fields for first and last name

              $emp_number = validate($_POST['empno']);
              $Comment = validate($_POST['comment']);

              $full_name = $First_Name . ' ' . $Last_Name;

              $sql = "INSERT INTO feed_back (full_name, emp_num, feedback_date, comment_fb) 
        VALUES ('$full_name', '$emp_number', '$current_date', '$Comment')";

              if ($conn->query($sql) === TRUE) {
                echo "<script>
        window.location='feedback.php';</script>";
              } else {
                echo "<script>alert('Error: " . $conn->error . "');</script>";
              }

              $conn->close();
            }
            ?>
          </div>
        </body>
        <!-- /.card-body -->
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