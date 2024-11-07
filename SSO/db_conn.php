<?php
$sname = "localhost";
//$sname = "210.1.225.80";
$uname = "root";
$password = "mysqlform1c7h";
//$password = "mysqlform1c7h";
//$db_name = "dbdrive";
//$db_name = "ems_leave";
$db_name = "sso";


$sname_login = "localhost";
$uname_login = "root";
$password_login = "mysqlform1c7h";
//$password_login = "mysqlform1c7h";
//$db_name_login = "dbdrive";
//$db_name_login = "ems_leave";
$db_name_login = "sso";

$db = mysqli_connect($sname, $uname, $password, $db_name);

if (!$db) {
    echo "Connection failed!";
}


$db_login = mysqli_connect($sname_login, $uname_login, $password_login, $db_name_login);
if (!$db_login) {
    echo "Connection failed!";
}
?>

