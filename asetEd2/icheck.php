
<?php
require('config.php');

session_start();

if (isset($_POST['name']) && isset($_POST['pass'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    $pass = hash("MD5", $password);

    $sql = "SELECT * FROM empmaininfo WHERE user_name='$uname' AND user_password='$pass'";

    $result = mysqli_query($conn, $sql);

    if ($result == false) {
        die('Query error: ' . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
  
      if (
          $row['user_name'] == $uname &&
          $row['user_password'] == $pass &&
          $row['Active_Inactive'] == "Active" &&
          $row['func_admin'] == "0"
        ) {
          $_SESSION['id'] = $row['id'];
          $_SESSION['emp_number'] = $row['Internal_Id'];
          $_SESSION['First_Name'] = $row['First_Name'];
          $_SESSION['Last_Name'] = $row['Last_Name'];
          $_SESSION['Email'] = $row['Email'];
          $_SESSION['Mobile_phone'] = $row['Mobile_phone'];
          $_SESSION['Job_Title'] = $row['Job_Title'];
          $_SESSION['Employment_Type'] = $row['Employment_Type'];
          $_SESSION['Manager'] = $row['Manager'];
          $_SESSION['Department'] = $row['Department'];
  
          header("Location: homeasetstaff.php");
          exit();
      } else {
          $_SESSION['id'] = $row['id'];
          $_SESSION['emp_number'] = $row['Internal_Id'];
          $_SESSION['First_Name'] = $row['First_Name'];
          $_SESSION['Last_Name'] = $row['Last_Name'];
          $_SESSION['Email'] = $row['Email'];
          $_SESSION['Mobile_phone'] = $row['Mobile_phone'];
          $_SESSION['Job_Title'] = $row['Job_Title'];
          $_SESSION['Employment_Type'] = $row['Employment_Type'];
          $_SESSION['Manager'] = $row['Manager'];
          $_SESSION['Department'] = $row['Department'];
          
          header("Location: homeaset.php");
          exit();
      }
    } else {
        $mesej = 'Username / Password is wrong';
    }
} else {
    $mesej = 'Username or password cannot be empty';
}
?>

