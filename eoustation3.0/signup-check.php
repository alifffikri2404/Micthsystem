<?php
session_start();
include ('../db_conn.php');

if (
    isset($_POST['fname']) && isset($_POST['password'])
    && isset($_POST['re_password']) && isset($_POST['status'])
    && isset($_POST['emp_no']) && isset($_POST['employee_type'])
    && isset($_POST['email']) && isset($_POST['mobile_phone'])
    && isset($_POST['Manager']) && isset($_POST['job_title'])
    && isset($_POST['first_name']) && isset($_POST['last_name'])
) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fname = validate($_POST['fname']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $status = validate($_POST['status']);
    $employee_type = validate($_POST['employee_type']);
    $email = validate($_POST['email']);
    $mobile_phone = validate($_POST['mobile_phone']);
    $job_title = validate($_POST['job_title']);
    $last_name = validate($_POST['last_name']);
    $first_name = validate($_POST['first_name']);
    $Manager = validate($_POST['Manager']);
    $emp_no = validate($_POST['emp_no']);

    $user_data = '&fname=' . $fname;

    if (empty($fname) || empty($emp_no) || empty($pass) || empty($re_pass)) {
        header("Location: register.php?error=All fields are required&$user_data");
        exit();
    } else if ($pass !== $re_pass) {
        header("Location: register.php?error=The confirmation password does not match&$user_data");
        exit();
    } else {

        // Hashing the password
        $pass = md5($pass);

        // Check if username or employee number already exists
        $sql_check = "SELECT * FROM empmaininfo WHERE user_name='$fname' OR Internal_Id='$emp_no'";
        $result_check = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($result_check) > 0) {
            header("Location: register.php?error=Username or Employee Number already exists&$user_data");
            exit();
        }

        $sql_insert = "INSERT INTO empmaininfo(Internal_Id,First_Name,Last_Name,Email,Mobile_phone,Job_Title,Employment_Type,Manager,Department,Active_Inactive,user_password,user_name,func_admin) 
        VALUES('$emp_no','$first_name', '$last_name', '$email', '$mobile_phone','$job_title', '$employee_type','$Manager', '$status', 'Active','$pass', '$fname','0')";

        $result_insert = mysqli_query($conn, $sql_insert);

        if ($result_insert) {
            echo "<script>alert('Your account has been created successfully.'); window.location='register.php';</script>";
            exit();
        } else {
            header("Location: register.php?error=Unknown error occurred&$user_data");
            exit();
        }
    }
} else {
    header("Location: register.php");
    exit();
}
?>