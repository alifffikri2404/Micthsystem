<?php
session_start();
include "db_conn.php";

if (isset($_SESSION['updateid'])) {
    $updateId = $_SESSION['updateid'];
    include ('../db_conn.php');

    $query = "SELECT * FROM empmaininfo WHERE Internal_Id='$updateId'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $row = mysqli_fetch_assoc($query_run);
    } else {

        echo "Error in query: " . mysqli_error($conn);
        exit;
    }
} else {

    header("Location: login.php");
    exit;
}
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

<body style="background-color: #BDE2E4;">
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <div class="booking-bg">
                            <div class="form-header">
                                <a href="login.php" class="button">
                                    <a href="#" class="button" onclick="goBack()">
                                        <b> <-Back </b>
                                    </a>

                                    <script>
                                        function goBack() {
                                            window.history.back();
                                        }
                                    </script>

                                    <div class="arrow-wrapper">
                                        <div class="arrow"></div>
                                    </div>
                                </a>
                                <h2>Check-Out</h2>
                            </div>
                        </div>

                        <form action="qrcheck.php" method="post" class="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Name</span>
                                        <input class="form-control" type="hidden" id="emp_no" value="<?php echo htmlspecialchars($row['Internal_Id']); ?>" name="emp_no" required>
                                        <input class="form-control" type="text" value="<?php echo ($row['First_Name']); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Employee Number</span>
                                        <input class="form-control"  type="text" value="<?php echo ($row['Internal_Id']); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Date-Out</span>
                                        <input class="form-control" type="date" id="dateOut" name="dateOut" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Time-Out</span>
                                        <input class="form-control" type="time" id="timestamp-input" name="timeOut" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="form-label">Purpose</span>
                                        <textarea class="form-control" id="purpose" name="purpose" required maxlength="360"></textarea>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="row">
                              
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="form-label">Location</span>
                                        <textarea class="form-control"  id="location" name="location" required maxlength="360"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
                                <button type="submit" id="submit" name="submit" class="submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add your scripts and other body elements here -->
</body>