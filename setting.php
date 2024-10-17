<?php
include('db_conn.php');

session_start();

/*if (isset($_POST['approved']))
{
    $appUpdateQuery = "UPDATE bookings SET status= 'APPROVED' WHERE id='".$_POST['row_id']."'";
    $appUpdateResult = mysqli_query($db, $appUpdateQuery);

}
    
if (isset($_POST['rejected']))
{
$s="CANCEL BY STAFF";

    $rejUpdateQuery = "INSERT INTO cancel (id, date, user_id, user_name, purpose, destination, driver_name, vehicle_id, model_plat)
  SELECT id, date, user_id, user_name, purpose, destination, driver_name, vehicle_id, model_plat FROM bookings WHERE id='".$_POST['row_id']."'";
    $rejUpdateResult = mysqli_query($db,$rejUpdateQuery);

          $rejUpdateQuery1 = "DELETE FROM bookings WHERE id='".$_POST['row_id']."'";
    $rejUpdateResult1 = mysqli_query($db,$rejUpdateQuery1);


}
    if (isset($_POST['return']))
{

    $appUpdateQuery = "UPDATE bookings SET status= 'RETURN VEHICLE' WHERE id='".$_POST['row_id']."'";
    $appUpdateResult = mysqli_query($db, $appUpdateQuery);
            $appUpdateQuery1 = "UPDATE management SET status= 'RETURN VEHICLE' WHERE id='".$_POST['row_id']."'";
    $appUpdateResult1 = mysqli_query($db, $appUpdateQuery1);
}*/
if (isset($_POST['viewsubmit'])) {
  $_SESSION['updateid'] = $_POST['view'];
  header("Location: detailsdash.php");
  exit();
}

$Internal_ID = $_SESSION['emp_number'];
$First_Name = ['First_Name'];
$Last_Name = ['Last_Name'];
$Email = ['Email'];
$Mobile_Phone = ['Mobile_phone'];
// $Job_Title = $_SESSION['user']['Job_Title'];
$Employment_Type = ['Employment_Type'];
// $Manager = $_SESSION['user']['Manager'];
// $Department = $_SESSION['user']['Department'];
$Status = ['Active_Inactive'];
$Join_Date = ['Joining_Date'];
$End_Date = ['Employment_End_Date'];

$sqlAA = "SELECT * FROM empmaininfo
  WHERE Internal_Id = '$Internal_ID'";
$resultOP = mysqli_query($conn, $sqlAA);
$fetched_row = mysqli_fetch_array($resultOP);

// Tukar kepada retrieve from database
$Job_Title = $fetched_row['Job_Title'];
$Department = $fetched_row['Department'];
$Manager = $fetched_row['Manager'];
$fullname = $fetched_row['First_Name'] . ' ' . $fetched_row['Last_Name'];

if (!empty($Job_Title)) {
  $sqlJT = "SELECT * FROM empjobtitle WHERE job_id = $Job_Title";
  $resultJT = mysqli_query($conn, $sqlJT);
  if ($resultJT) {
    $rowJT = mysqli_fetch_assoc($resultJT);
    $Job_Title2 = $rowJT['job_title'];
  } else {
    $Job_Title2 = "None";
  }
} else {
  $Job_Title2 = "None";
}

if (!empty($Department)) {
  $sqlDE = "SELECT * FROM empdept WHERE dept_id = $Department";
  $resultDE = mysqli_query($conn, $sqlDE);
  if ($resultDE) {
    $rowDE = mysqli_fetch_assoc($resultDE);
    $Department2 = $rowDE['name'];
  } else {
    $Department2 = "None";
  }
} else {
  $Department2 = "None";
}

if (!empty($Manager)) {
  $sqlMN = "SELECT * FROM empmanager WHERE manager_id = $Manager";
  $resultMN = mysqli_query($conn, $sqlMN);
  if ($resultMN) {
    $rowMN = mysqli_fetch_assoc($resultMN);
    $Manager2 = $rowMN['name'];
  } else {
    $Manager2 = "None";
  }
} else {
  $Manager2 = "None";
}

// Update Profile
if (isset($_POST['submit1'])) {
  // variables for input data
  $first_name2 = $_POST['FirstName'];
  $last_name2 = $_POST['LastName'];
  $mobile_phone2 = $_POST['MobilePhone'];
  $email2 = $_POST['Email'];

  $sql2 = "UPDATE empmaininfo
  SET First_Name = '$first_name2',
    Last_Name = '$last_name2',
    Mobile_phone = '$mobile_phone2', 
    Email = '$email2'
WHERE Internal_Id = '$Internal_ID'";
  $result2 = mysqli_query($conn, $sql2);

  if ($result2) {
?>
    <script type="text/javascript">
      alert('Your profile successfully updated!');
      window.location.href = 'main_user.php';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('Failed to update your profile!');
    </script>
<?php
  }
}
if (isset($_POST["update"])) {
  $_SESSION['updateid'] = $_POST['update'];

  header("Location: eoustation3.0/checkin.php");
  exit();
}
if (empty($_SESSION['First_Name'])) {
  header("Location: outlog.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Settings</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta http-equiv="refresh">

  <!-- Favicons -->
  <link href="micthlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
<style>
  .sb {
    box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
    height: 100%;
    width: 100%;
    background-color: white;
    border: 1px solid white;
    overflow: auto;
    white-space: nowrap;

  }
</style>
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
    width: 60%;
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
      <a href="main_user.php" class="logo d-flex align-items-center">
        <img src="logomicth.png" alt="">
        <span class="d-none d-lg-block">MICTH System
        </span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">


          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">

            <li>
              <hr class="dropdown-divider">
            </li>


          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">


          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">


          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
              Me
            </span>
          </a><!-- End Profile Image Icon -->


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
              <a class="dropdown-item d-flex align-items-center" href="outlog.php">
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
        <a class="nav-link collapsed; active" href="setting.php">
          <i class="bi bi-gear-fill"></i>
          <span>Settings</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="main_user.php">
          <i class="bi bi-reply-fill"></i>
          <span>Home Page</span>
        </a>
      </li>

    </ul>
    </li>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Settings</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
 
      <div class="row">
        <div class="col-xl-4">

     
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
              <h2><?php echo $fullname ?></h2>
              <h3>
                <?php echo $Job_Title2 . " (" . $_SESSION['emp_number'] . ")"; ?>
              </h3>
            </div>
          </div>
        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $fullname; ?></div>

                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job Title</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Job_Title2; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Department</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Department2; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Manager</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Manager2; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Mobile Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $fetched_row['Mobile_phone']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $fetched_row['Email']; ?></div>
                  </div>

                  <h5 class="card-title">Employment</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Type</div>
                    <div class="col-lg-9 col-md-8"><?php echo $fetched_row['Employment_Type']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status</div>
                    <div class="col-lg-9 col-md-8"><?php echo $fetched_row['Active_Inactive']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Join Date</div>
                    <div class="col-lg-9 col-md-8"><?php echo $fetched_row['Joining_Date']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">End Date</div>
                    <div class="col-lg-9 col-md-8"><?php echo $fetched_row['Employment_End_Date']; ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="" method="post">

                    <div class="row mb-3">
                      <label for="FirstName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="FirstName" type="text" class="form-control" id="FirstName" value="<?php echo $fetched_row['First_Name']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="LastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="LastName" type="text" class="form-control" id="LastName" value="<?php echo $fetched_row['Last_Name']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="MobilePhone" class="col-md-4 col-lg-3 col-form-label">Mobile Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="MobilePhone" type="text" class="form-control" id="MobilePhone" value="<?php echo $fetched_row['Mobile_phone']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="Email" type="text" class="form-control" id="Email" value="<?php echo $fetched_row['Email']; ?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button id="submit1" name="submit1" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="eoustation3.0/change-p.php" method="post">

                    <?php if (isset($_GET['error'])) { ?>
                      <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                      <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>

                    <div class="row mb-3">
                      <label for="op" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-5">
                        <input name="op" type="password" class="form-control" id="op">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="np" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-5">
                        <input name="np" type="password" class="form-control" id="np">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="c_np" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-5">
                        <input name="c_np" type="password" class="form-control" id="c_np">
                      </div>
                    </div>

                    <div class="text-center">
                      <button id="submit2" name="submit2" type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

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

</body>

</html>