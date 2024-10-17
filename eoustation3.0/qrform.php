<?php
session_start();
include "db_conn.php";


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> QRFORM</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- Google font -->
    <link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="masjid/colorlib-booking-17/css/bootstrap.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="masjid/colorlib-booking-17/css/style.css" />
    <title>Check out</title>
</head>


<style>
    .booking-form .booking-bg {
        background-image: url('tower.jpg');
    }

    .section {
        position: relative;
        height: 100vh;
    }

    .section .section-center {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    #booking {
        font-family: 'Alice', serif;
        /* Updated background color */
    }

    .booking-form {
        position: relative;
        max-width: 912px;
        width: 100%;
        margin: auto;
        background: #fff;
        border-radius: 6px;
        -webkit-box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
    }

    .booking-form .booking-bg {
        position: absolute;
        left: 25px;
        top: -25px;
        bottom: -25px;
        width: 400px;
        background-size: cover;
        background-position: center;
        padding: 25px;
        border-radius: 6px;
        -webkit-box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .booking-form .booking-bg::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        background: rgba(62, 136, 165, 0.33);
        /* Updated background color */
    }

    .booking-form>form {
        margin-left: 425px;
        padding: 30px;
    }

    .booking-form .form-header {
        margin-bottom: 30px;
        margin-top: 60px;
        position: relative;
        z-index: 20;
    }

    .booking-form .form-header h2 {
        font-family: 'Playfair Display', serif;
        margin-top: 0;
        margin-bottom: 15px;
        font-weight: 900;
        color: #fff;
        /* Updated font color */
        font-size: 42px;
        text-transform: capitalize;
    }

    .booking-form .form-header p {
        color: #fff;
        /* Updated font color */
        font-size: 18px;
    }

    .booking-form .form-group {
        position: relative;
        margin-bottom: 20px;
    }

    .booking-form .form-control {
        background-color: #fff;
        height: 45px;
        padding: 0px 15px;
        color: #151515;
        border: 1px solid #e5e5e5;
        font-size: 16px;
        font-weight: 700;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-radius: 40px;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .booking-form .form-control::-webkit-input-placeholder {
        color: #e5e5e5;
    }

    .booking-form .form-control:-ms-input-placeholder {
        color: #e5e5e5;
    }

    .booking-form .form-control::placeholder {
        color: #e5e5e5;
    }

    .booking-form .form-control:focus {
        background: #f8f8f8;
    }

    .booking-form input[type="date"].form-control:invalid {
        color: #e5e5e5;
    }

    .booking-form select.form-control {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .booking-form select.form-control:invalid {
        color: #e5e5e5;
    }

    .booking-form select.form-control option {
        color: #151515;
    }

    .booking-form select.form-control+.select-arrow {
        position: absolute;
        right: 3px;
        bottom: 5px;
        width: 32px;
        line-height: 32px;
        height: 32px;
        text-align: center;
        pointer-events: none;
        color: #e5e5e5;
        font-size: 14px;
    }

    .booking-form select.form-control+.select-arrow:after {
        content: '\279C';
        display: block;
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    .booking-form .form-label {
        color: #856849;
        text-transform: uppercase;
        line-height: 24px;
        height: 24px;
        font-size: 14px;
        font-weight: 400;
        margin-left: 20px;
        display: inline-block;
    }

    .booking-form .form-btn {
        margin-top: 10px;
    }

    .booking-form .submit-btn {
        display: block;
        width: 100%;
        color: #fff;
        background-color: #3E88A5;
        /* Updated button color */
        font-weight: 700;
        font-size: 18px;
        border: none;
        border-radius: 40px;
        height: 55px;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .booking-form .submit-btn:hover,
    .booking-form .submit-btn:focus {
        background-color: #93C4D1;
        /* Updated button hover color */
    }

    @media only screen and (max-width: 768px) {
        .booking-form .booking-bg {
            position: relative;
            left: 0;
            right: 0;
            bottom: 0;
            top: -15px;
            width: 95%;
            margin: auto;
        }

        .booking-form>form {
            margin-left: 0px;
        }
    }
</style>


<html lang="en">
<script>
    function goBack() {
        window.history.back();
    }
</script>

<body style="background-color: #BDE2E4;">
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <div class="booking-bg">
                            <div class="form-header">
                                <a href="../index.php" class="button">
                                    <b> <- Go to Login</b>
                                            <div class="arrow-wrapper">
                                                <div class="arrow"></div>
                                            </div>
                                </a>
                                <h2>Check-Out</h2>
                            </div>
                        </div>

                        <?php
                        if (isset($_GET['Internal_Id'])) {
                            $emp_no = mysqli_real_escape_string($conn, $_GET['Internal_Id']);
                            include('../db_conn.php');

                            $check_query = "SELECT * FROM empmaininfo WHERE Internal_Id = '$emp_no' AND Active_Inactive = 'Active'";
                            $check_result = mysqli_query($conn, $check_query);

                            if (mysqli_num_rows($check_result) > 0) {

                                $row = mysqli_fetch_assoc($check_result);
                                $id = $row["Internal_Id"];
                                $fname = $row["user_name"];
                                $Job_Title = $row["Job_Title"];
                                $Department = $row["Department"];
                                $First_Name = $row["First_Name"];

                              
                                $sql = "SELECT * FROM outstation WHERE emp_no=$id AND timeIn = '00:00:00'";
                                include('db_conn.php');
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $jamkeluar = $row["timeOut"];
                                    $tarikhkeluar = $row["dateOut"];
                                    $name = $row["name"];
                                    $location = $row["location"];

                                    $purpose = $row["purpose"];

                                    $_SESSION['name'] = $row["name"];
                                    
                                    function paparMesejBerjayaAset($id, $First_Name, $jamkeluar, $tarikhkeluar,$purpose,$location) {
                                        // Create the data preview string
                                        $dataPreview = '';
                                        $dataPreview .= 'Employee Number : ' . $id . '\\n';
                                        $dataPreview .= 'Name: ' . $First_Name . '\\n';
                                        $dataPreview .= 'Last Check-out: ' . $jamkeluar . ' on ' . $tarikhkeluar . '\\n';
                                        $dataPreview .= 'Purpose: ' .  $purpose . '\\n';
                                        $dataPreview .= 'Location: ' . $location . '\\n\\n';

                                        $dataPreview .= 'Please click the button below to check-in';
                                      
                                        echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                                        echo '<script type="text/javascript">
                                        swal({
                                            title: "warning!",
                                            text: "You haven\'t checked in yet\\n' . $dataPreview . '",
                                            icon: "error",
                                            button: "Okay",
                                        }).then(function() {
                                            window.location = "in.php";
                                        });
                                        </script>';
                                    }
                                    
                                   
                                    paparMesejBerjayaAset($id, $First_Name, $jamkeluar, $tarikhkeluar,$purpose,$location);
                                }
                                 else {

                                    $query = "SELECT * FROM empmaininfo WHERE Internal_Id='$emp_no'";
                                    include('../db_conn.php');

                                    $query_run = mysqli_query($conn, $query);

                                    if ($query_run) {
                                        if (mysqli_num_rows($query_run) > 0) {
                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                                $_SESSION['updateid'] = $_GET['Internal_Id'];
                                                $fname = $row["user_name"];
                                                echo "<script>window.location='qrform2.php';</script>";
                                            }
                                        } else {
                                            echo "<script>alert('No Data.')</script>";
                                        }
                                    } else {
                                        echo "Error in query: " . mysqli_error($conn);
                                    }
                                }
                            } else {
                                $message = "Employee not found or inactive!";
                            }
                        }
                        ?>
                        <form action="" method="GET">
                            <?php
                            if (isset($message)) {
                                echo '<span class="error-message">' . htmlspecialchars($message) . '</span>';
                            }
                            ?>
                            <div class="error">*Please double-check your employee number before submitting.</div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <span class="form-label">Employee Number:</span>
                                        <input type="text" name="Internal_Id" placeholder="Your Employee Number" updateid="<?php echo isset($_GET['Internal_Id']) ? htmlspecialchars($_GET['Internal_Id']) : ''; ?>" value="<?php echo isset($_GET['Internal_Id']) ? htmlspecialchars($_GET['Internal_Id']) : ''; ?>" class="form-control" REQUIRED>
                                    </div>

                                </div>
                            </div>
                            <div class="form-btn">
                                <button id="search" type="submit" class="submit-btn">Search</button>
                            </div>

                        </form>
                        <style>
                            .error-message {
                                color: red;
                            }

                            .error {
                                background: #F2DEDE;
                                color: #A94442;
                                padding: 10px;
                                width: 100%;
                                /* Make error and success messages take up 100% of the container */
                                border-radius: 5px;
                                margin: 20px auto;
                            }
                        </style>



                    </div>
                </div>
            </div>
        </div>
    </div>

</body>




<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

</body>

</html>