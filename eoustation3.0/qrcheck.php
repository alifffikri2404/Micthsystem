<?php
session_start();
include "db_conn.php";

if (isset($_POST['submit'])) {
    $emp_no = $_POST['emp_no'];

    // Check if emp_no exists in the database
    $check_query = "SELECT * FROM empmaininfo WHERE Internal_Id = '$emp_no' AND Active_Inactive = 'Active'";
    include ('../db_conn.php');

    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $row = mysqli_fetch_assoc($check_result);
        $id = $row["Internal_Id"];

        $fname = $row["user_name"];
        $Job_Title = $row["Job_Title"];
        $Department = $row["Department"];
        $First_Name = $row["First_Name"];


        $sql = "SELECT * FROM outstation WHERE emp_no=' $id' AND timeIn = '00:00:00'";
        include ('db_conn.php');

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('You have not check in, please click check in')
            window.location='in.php';</script>";
        } else {
            function validate($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
             
                return $data;
            }

            $emp_number = validate($emp_no);
            $location = validate($_POST['location']);
            $purpose = validate($_POST['purpose']);
            $dateOut = validate($_POST['dateOut']);
            $timeOut = validate($_POST['timeOut']);

            $insert_query = "INSERT INTO outstation (name, location, purpose, dateOut, timeOut, emp_no, role_id, status)
                             VALUES ('$First_Name', '$location', '$purpose', '$dateOut', '$timeOut', '$emp_number', '$Job_Title', '$Department')";
                            include ('db_conn.php');

            if ($conn->query($insert_query) === TRUE) {
                // Success
                echo "<script>alert('New record successfully added.')
            window.location='../index.php';</script>";
                exit();
            } else {
                // Error
                header("Location: qrform.php?error=Error: " . $conn->error);
                exit();
            }
        }
    } else {
        // emp_no does not exist, show error message
        header("Location: qrform.php?error=Your Employee Number is invalid!.");
        exit();
    }
}

$conn->close();
?>
