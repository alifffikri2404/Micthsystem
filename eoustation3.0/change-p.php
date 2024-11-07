<?php
session_start();

include ('../db_conn.php');

$fname = $_SESSION['user_name'];
$Last_Name = $_SESSION['Last_Name'];
$Email = $_SESSION['Email'];
$Mobile_phone = $_SESSION['Mobile_phone'];
$Job_Title = $_SESSION['Job_Title'];
$Employment_Type = $_SESSION['Employment_Type'];
$Manager = $_SESSION['Manager'];
$Department = $_SESSION['Department'];
$First_Name = $_SESSION['First_Name'];
$emp_number = $_SESSION['emp_number'];
$status = $_SESSION['status'];

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $op = validate($_POST['op']);
    $np = validate($_POST['np']);
    $c_np = validate($_POST['c_np']);

    if (empty($op)) {
        header("Location: ../main_user.php?error=Old Password is required");
        exit();
    } else if (empty($np)) {
        header("Location: ../main_user.php?error=New Password is required");
        exit();
    } else if ($np !== $c_np) {
        header("Location: ../main_user.php?error=The confirmation password does not match");
        exit();
    } else {
        // Hashing the password
        $op = md5($op);
        $np = md5($np);

        $sql = "SELECT user_password FROM empmaininfo WHERE Internal_Id='$emp_number' AND user_password='$op'";

        // Check if query execution was successful
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . mysqli_error($conn);
            exit;
        }

        $result = mysqli_query($conn, $sql);

        // Use mysqli_affected_rows instead of mysqli_num_rows
        $sql_2 = "UPDATE empmaininfo SET user_password='$np' WHERE Internal_Id='$emp_number'";
        mysqli_query($conn, $sql_2);

        if (mysqli_affected_rows($conn) === 1) {
            // Password updated successfully
            header("Location: ../main_user.php?success=Your password has been changed successfully");
            
            exit();
        } else {
            // Update failed
            header("Location: ../main_user.php.php?error=Error updating password");
            exit();
        }
    }
}

?>