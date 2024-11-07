<?php
$sname = "localhost";
$uname = "root";
//$password = "";
$password = "mysqlform1c7h";
$db_name = "sso";

$mysqli = new mysqli($sname, $uname, $password, $db_name);
//$db = mysqli_connect($sname, $uname, $password, $db_name);

if (!$mysqli) {
    echo "Connection failed!";
}

?>

