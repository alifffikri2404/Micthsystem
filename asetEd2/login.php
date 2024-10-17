<?php
session_start();
include "db_conn.php";

if (isset($_POST['name']) && isset($_POST['pass'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $uname = mysqli_real_escape_string($conn, validate($_POST['name']));
  $pass = mysqli_real_escape_string($conn, validate($_POST['pass']));


  // hashing the password
  $pass = hash("MD5", $pass);

  $sql = "SELECT * FROM empmaininfo WHERE user_name='$uname' AND user_password='$pass'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if (
        $row['user_name'] === $uname &&
        $row['user_password'] === $pass &&
        $row['Active_Inactive'] === "Active" &&
        $row['func_admin'] === "0"
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
    // header("Location: login.php?error=Wrong Password!");
    $mesej = 'Username / Password is wrong';
    exit();
}
} else {
  $mesej = 'Username or password cannot be empty';
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MICTH Interal System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
	<a href="index.php"><img src="dist/img/logomicthnew-plain-01.png" alt="MICTH" height="80%" width="70%">
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input id="name" name="name" type="text" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="pass" name="pass" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
		<div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <p><?php if (isset($mesej)) echo "<p>$mesej</p>"; ?></p>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
</body>
</html>
