<?php
$sname = "localhost";
$uname = "root";
$password = "mysqlform1c7h";
$db_name = "db_out";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
}

?>

