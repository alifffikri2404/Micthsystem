<?php
$sname = "localhost";
$uname = "root";
$password = "mysqlform1c7h";
$db_name = "dbaset";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
}

$sname_login = "localhost";
$uname_login = "root";
$password_login = "";
$db_name_login = "dbaset";

$conn_login = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn_login) {
    echo "Connection failed!";
}
?>