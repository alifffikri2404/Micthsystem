<?php
include('functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}
//$mysqli = new mysqli('localhost', 'root', '', 'idrive');
include('db_conn_cal.php');

if (isset($_GET['date'])) {
    $inp1_date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from bookings where start_date = ?");
    $stmt->bind_param('s', $inp1_date);
    $bookings = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get checkbox values
    if (isset($_POST["withcard"])) {
        $checkbox_namearray = $_POST["withcard"];

        // Escape and insert values into the database
        foreach ($checkbox_namearray as $value) {
            $escaped_value = mysqli_real_escape_string($conn, $value);
            $sql = "INSERT INTO booking (fuel_card, tng_card) VALUES ('$escaped_value')";

            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "No checkbox values selected.";
    }
}*/





if (isset($_POST['submit'])) {

    $user_name = $_SESSION['user']['user_name'];
    $user_id = $_SESSION['user']['id'];
    $vehicle_id = $_POST['vehicleinp'];

    $dc = date("Y-m-d");
    $start_datebook = $_GET['date'];
    $end_datebook = $_POST['end_date'];
    $duration_time = $_POST['start_time'];
    $checkbox1_value = isset($_POST["checkbox1"]) ? mysqli_real_escape_string($mysqli, $_POST["checkbox1"]) : "";
    $checkbox2_value = isset($_POST["checkbox2"]) ? mysqli_real_escape_string($mysqli, $_POST["checkbox2"]) : "";
    $purpose = $_POST['purpose'];
    $destination = $_POST['destination'];
    $status = 'Booking';
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $current_time1 = date("H:i:s");
    try {

        $stmt = $mysqli->prepare("select * from management where start_date = ? AND vehicle_id = ?");
        $stmt->bind_param('ss', $start_datebook, $vehicle_id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($result->num_rows > 0 && ($row['status'] == 'Booking' || $row['status'] == 'Approved' || $row['status'] == 'Return') && ($row['start_time'] == '9am-5pm(Fullday)' || $row['start_time'] == '9am-1pm(Halfday Morning), 2pm-5pm(Halfday Evening)' || $row['start_time'] == '2pm-5pm(Halfday Evening), 9am-1pm(Halfday Morning)')) {
                $msg = "<div class='alert alert-danger'>Already Booked</div>";
            } else {

                //$conn= mysqli_connect("localhost", "root", "", "idrive");
                include('db_conn.php');

                if (!$db) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $p = "";
                $m = "";
                $sql = "SELECT * FROM `hrm_vehicle` WHERE `id` = '$vehicle_id' ORDER BY `id` ASC";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $p = $row['plat_number'];
                        $m = $row['model'];
                    }


                    $query2 = "INSERT INTO management (date,user_id, user_name, purpose, destination, vehicle_id, model_plat, 
			status,start_date, start_time, end_date, fuel_card, tng_card,currenttime) 
                        VALUES('$dc', '$user_id', '$user_name', '$purpose', '$destination', '$vehicle_id', '$p', 
						'$status','$start_datebook','$duration_time', '$end_datebook', '$checkbox1_value', '$checkbox2_value', '$current_time1')";

                    //mysqli_query($conn, $query2);

                    $ver = mysqli_query($db, $query2);
                    try {

                        $id = $user_id;
                        $sql21 = "SELECT
                                                                hrm_hr_employee.*,
                                                                hrm_subunit.*,   
                                                                hrm_user.*
                                                                FROM
                                                                hrm_hr_employee
                                                                INNER JOIN hrm_user ON hrm_user.emp_number = hrm_hr_employee.emp_number
                                                                INNER JOIN hrm_user_role ON hrm_user_role.id = hrm_user.user_role_id
                                                                INNER JOIN hrm_subunit ON hrm_subunit.id = hrm_hr_employee.work_station
                                                                WHERE hrm_user.id = '$id'";

                        $result19 = mysqli_query($db_login, $sql21);


                        $row2 = mysqli_fetch_assoc($result19);

                        $fullname = $row2['emp_firstname'] . ' ' . $row2['emp_lastname'];
                        $employeeid = $row2['employee_id'];
                        $jabatan = $row2['name'];

                        $tifon = $row2['emp_mobile'];
                        $token = "eQZ5@#XrFmQvui36qkmG"; //bergantung
                        $target = "$tifon";

                        $curl = curl_init();

                        curl_setopt_array(
                            $curl,
                            array(
                                CURLOPT_URL => 'https://api.fonnte.com/send',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => http_build_query(
                                    array(
                                        'target' => $target,
                                        'message' => 'From ' . $$fullname . ',Please approve the booking.'
                                    )
                                ),
                                CURLOPT_HTTPHEADER => array(
                                    "Authorization: $token"
                                ),
                            )
                        );

                        $response = curl_exec($curl);
                        if (curl_errno($curl)) {
                            $error_msg = curl_error($curl);
                        }
                        curl_close($curl);

                        if (isset($error_msg)) {
                            echo $error_msg;
                        }
                        echo $response;
                        $msg = "<div class='alert alert-success'>Booking Successful</div>";
                    } catch (Exception $e) {
                        $msg = "<div class='alert alert-danger'>Error: {$e->getMessage()}</div>";
                    }

                    /*try {
            $mail = new PHPMailer(true);


            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '';
            $mail->Password = 'xububqsknnqzqewa';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;


            $mail->setFrom('wedud123zz@gmail.com', 'wedud');
            $mail->addAddress('wedud123zz@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'New Booking Notification';
            $mail->Body = 'A new booking has been made.<br>' .
              'User: ' . $user_name . '<br>' .
              'Vehicle : ' . $m . '<br>' .
              'No.plat : ' .$p. '<br>' .
              'Start Date: ' . $start_datebook . '<br>' .
              'End Date: ' . $end_datebook . '<br>' .
              'Duration Time: ' . $duration_time . '<br>' .
              'Purpose: ' . $purpose . '<br>' .
              'Destination: ' . $destination . '<br>' .
              'please click  http://localhost/imobile/index.php'
              . '<br>' .
               '<br>' .
               '<br>' .
             ' DIGITAL AND INFORMATION TECHNOLOGY (DTM)'. '<br>' .
              'MELAKA ICT HOLDINGS SDN BHD'. '<br>' .
             ' Office: 06 - 232 1360 | FAX: 06 - 232 7958 | www.micth.com'. '<br>' .
             'Level 11, Menara MITC, Jalan Konvensyen MITC, 75450 Ayer Keroh, Melaka'. '<br>' .
              
              'MICTH STANDS WITH INTEGRITY'. '<br>' .
              
              '<small>'.  '<i>' . 'MICTH practices a zero-tolerance approach toward bribery and corruption and is committed to acting professionally and with highest integrity in all its business dealings and relationships. MICTH will not tolerate bribery or corruption directly or indirectly through third parties, whether explicitly prohibited by MICTH`s Policy, laws or otherwise. Bribery and corruption in all its for'.'</i>'.'<small>';
              // Send email
            $mail->send();
            $msg = "<div class='alert alert-success'>Booking Successful</div>";
          } catch (Exception $e) {
            $msg = "<div class='alert alert-danger'>Error: {$mail->ErrorInfo}</div>";
          }*/



                    if (!$ver) {
                        $msg = "<div class='alert alert-warning'>Booking Not Successfull</div>";
                        echo mysqli_error($db);
                        die();
                    } else {
                        $msg = "<div class='alert alert-success'>Booking Successfull</div>";
                    }

                    //$msg = "<div class='alert alert-success'>Booking Successfull</div>";
                    //$stmt->close();
                    //$mysqli->close();

                    //$conn->close();


                    //tambah cni
                } else {
                }
            }
        }
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}


?>
<!doctype html>
<html lang="en">
<style>
    @media only screen and (max-width: 760px),
    (min-device-width: 802px) and (max-device-width: 1020px) {

        /* Force table to not be like tables anymore */
        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;

        }

        .empty {
            display: none;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        th {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            border: 1px solid #ccc;
        }

        td {
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
        }



        /*
Label the data
*/
        td:nth-of-type(1):before {
            content: "Sunday";
        }

        td:nth-of-type(2):before {
            content: "Monday";
        }

        td:nth-of-type(3):before {
            content: "Tuesday";
        }

        td:nth-of-type(4):before {
            content: "Wednesday";
        }

        td:nth-of-type(5):before {
            content: "Thursday";
        }

        td:nth-of-type(6):before {
            content: "Friday";
        }

        td:nth-of-type(7):before {
            content: "Saturday";
        }


    }

    /* Smartphones (portrait and landscape) ----------- */

    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
        body {
            padding: 0;
            margin: 0;
        }
    }

    /* iPads (portrait and landscape) ----------- */

    @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
        body {
            width: 495px;
        }
    }

    @media (min-width:641px) {
        table {
            table-layout: fixed;
        }

        td {
            width: 33%;
        }
    }

    .row {
        margin-top: 20px;
    }

    .today {
        background: yellow;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Book</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/igclogo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
            <a href="user.php" class="logo d-flex align-items-center">
                <img src="assets/img/igclogo.png" alt="">
                <span class="d-none d-lg-block">i-Mobile</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <!--<form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>-->
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">






                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?php echo $_SESSION['user']['user_name']; ?>
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>
                                <?php echo $_SESSION['user']['user_name']; ?>
                            </h6>
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
                <a class="nav-link collapsed" href="admin.php">
                    <i class="bi bi-grid"></i>
                    <span>Home Page</span>
                </a>
            </li><!-- End Dashboard Nav -->




            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-truck"></i><span>Vehicle</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="list_vehicle.php">
                            <i class="bi bi-circle"></i><span>List of Vehicle</span>
                        </a>
                    </li>
                    <li>
                        <a href="add_vehicle.php">
                            <i class="bi bi-circle"></i><span>Add Vehicle</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-folder-fill"></i><span>Usage Record</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="report-nav" class="nav-content show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="usage_record_monthly.php" class="active">
                            <i class="bi bi-circle"></i><span>Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="usage_record_monthly.php">
                            <i class="bi bi-circle"></i><span>Report</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="feedbackreport.php">
                    <i class="bi bi-file-text"></i>
                    <span>Feedback Report </span>
                </a>
            </li>
            <!-- End Tables Nav -->





        </ul>

    </aside><!-- End Sidebar-->


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Booking Form</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="user.php">Home Page</a></li>
                    <li class="breadcrumb-item">Apply</li>
                    <li class="breadcrumb-item active">Booking</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            include('db_conn.php');

                            if (!$db) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $i = $_REQUEST['vehicle'];
                            $datechoose1 = $_REQUEST['date'];
                            $finaldatechoose1 = date("d-m-Y", strtotime($datechoose1));
                            $p = "";
                            $m = "";

                            $i = $db->real_escape_string($i);

                            $sql = "SELECT * FROM `hrm_vehicle` WHERE `id` = '" . $i . "' ORDER BY `id` ASC";
                            $result = $db->query($sql);

                            if ($result) {
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $p = $row['plat_number'];
                                        $m = $row['model'];
                                        $vid = $row['id'];
                                    }
                                } else {
                                    $msg = "<div class='alert alert-danger'>No Vehicle Found!</div>";
                                }
                            } else {
                                $msg = "<div class='alert alert-danger'>Error in executing the query: " . $db->error . "</div>";
                            }

                            ?>
                            <br>
                            <?php echo (isset($msg)) ? $msg : ""; ?>

                            <form class="row g-3" action="" method="post">
                                <div class="col-md-6">
                                    <br>

                                    <label for="" class="form-label">Staff/Driver Name</label>
                                    <br>
                                    <input type="text" class="form-control" value="<?php echo $_SESSION['user']['user_name']; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <label for="" class="form-label">Vehicle</label>
                                    <br>
                                    <input required type="text" class="form-control" value="<?php echo $m; ?> - <?php echo $p; ?>" disabled>
                                    <input required type="hidden" class="form-control" name="vehicleinp" value="<?php echo $vid; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Start Date Booking</label>
                                    <input type="text" class="form-control" name="start_datebook" value="<?php echo $finaldatechoose1; ?>" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">End Date Booking</label>
                                    <input required type="date" class="form-control" name="end_date">
                                </div>

                                <?php
                                //$sql = "SELECT management.* FROM `management` WHERE `vehicle_id` = '" . $i . "' AND start_date ='$finaldatechoose1' AND status !='Done' ";
                                $sql = "SELECT * FROM `management` WHERE `vehicle_id` = '$i' AND start_date = '$datechoose1' AND status != 'Done'";

                                $result = $db->query($sql);

                                $isHalfdayMorning = false; // Initialize to false by default
                                $isHalfdayEvening = false;
                                if ($result && $result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $start_time = $row['start_time'];
                                    $isHalfdayEvening = ($start_time == "2pm-5pm(Halfday Evening)");
                                    $isHalfdayMorning = ($start_time == "9am-1pm(Halfday Morning)");
                                }
                                ?>

                                <div class="col-md-6">
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-6 pt-0">Duration time Booking:</legend>
                                        <div class="col-sm-15">
                                            <?php if ($isHalfdayMorning) : ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="start_time" id="st2_1" value="2pm-5pm(Halfday Evening)">
                                                    <label class="form-check-label" for="st2_1">
                                                        2pm - 5pm (Halfday Evening)
                                                    </label>
                                                </div>
                                            <?php elseif ($isHalfdayEvening) : ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="start_time" id="st1" value="9am-1pm(Halfday Morning)" checked>
                                                    <label class="form-check-label" for="st1">
                                                        9am - 1pm (Halfday Morning)
                                                    </label>
                                                </div>
                                            <?php else : ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="start_time" id="st1" value="9am-1pm(Halfday Morning)" checked>
                                                    <label class="form-check-label" for="st1">
                                                        9am - 1pm (Halfday Morning)
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="start_time" id="st2_2" value="2pm-5pm(Halfday Evening)">
                                                    <label class="form-check-label" for="st2_2">
                                                        2pm - 5pm (Halfday Evening)
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="start_time" id="st3" value="9am-5pm(Fullday)">
                                                    <label class="form-check-label" for="st3">
                                                        9am - 5pm (Fullday)
                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </fieldset>
                                </div>





                                <div class="col-md-6">
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-4 pt-0">With:</legend>
                                        <div class="col-sm-15">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="checkbox1" id="cbfuelcard" value="1">
                                                <label class="form-check-label" for="cbfuelcard">
                                                    Fuel Card
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="checkbox2" id="cbtngcard" value="1">
                                                <label class="form-check-label" for="cbtngcard">
                                                    Touch 'n Go Card
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">Purpose</label>
                                    <input required type="text" class="form-control" name="purpose">
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">Destination</label>
                                    <input required type="text" class="form-control" name="destination">
                                </div>


                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="agree_terms" id="agree_terms" required>
                                        <label class="form-check-label" for="agree_terms">
                                            I acknowledge and agree that by submitting this application, I understand
                                            and accept the
                                            terms and conditions associated with the application/booking of the company
                                            car. I am
                                            aware that any accidents, damages, or traffic summonses issued by the
                                            authorities during the usage
                                            of the company car will be my responsibility, and I commit to covering all
                                            associated costs
                                            incurred. I have read and agree to abide by the company's car usage terms
                                            and conditions
                                            outlined in the applicable policies.
                                        </label>

                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>I-MOBILE</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            <a href="https://www.micth.com//">MELAKA ICT SDN BHD</a>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>

</html>