<?php
session_start();
include "db_conn.php";

if (
    isset($_POST['fname']) && isset($_POST['password'])
    && isset($_POST['fname']) && isset($_POST['re_password'])
    && isset($_POST['emp_no']) && isset($_POST['emp_no'])

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
    $emp_no = validate($_POST['emp_no']);
    $user_data =  '&fname=' . $fname;



    if (empty($fname)) {
        header("Location: registerHr.php?error=User Name is required&$user_data");
        exit();
    } else if (empty($emp_no)) {
        header("Location: registerHr.php?error=Employee Number is required&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: registerHr.php?error=Password is required&$user_data");
        exit();
    } else if (empty($re_pass)) {
        header("Location: registerHr.php?error=Re Password is required&$user_data");
        exit();
    } else if ($pass !== $re_pass) {
        header("Location: registerHr.php?error=The confirmation password  does not match&$user_data");
        exit();
    } else {

        // hashing the password
        $pass = md5($pass);
        $sql_check = "SELECT * FROM hrm_user WHERE user_name='$fname' OR emp_number='$emp_no'";
        $result_check = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($result_check) > 0) {
            header("Location: registerHR.php?error=Username or Employee Number already exists&$user_data");
            exit();
        }

        $sql_insert = "INSERT INTO hrm_user(user_name, user_password, user_role_id, status, emp_number,role) VALUES('$fname', '$pass','4','HR','$emp_no','1')";
        $result_insert = mysqli_query($conn, $sql_insert);

        if ($result_insert) {
            echo "<script>alert('Your account has been created successfully.'); window.location='registerHR.php';</script>";
            exit();
        } else {
            header("Location: registerHR.php?error=Unknown error occurred&$user_data");
            exit();
        }
    }
} else {
    header("Location: registerHR.php");
    exit();
}
