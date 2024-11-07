<?php 
$hostaset = "localhost";
$useraset = "root";
$pswdaset = "mysqlform1c7h";
$dbnameaset = "dbaset";

/*$hostaset = "localhost";
$useraset = "int";
$pswdaset = "passwordint!";
$dbnameaset = "aset";*/

//$conn=mysql_connect($host, $user, $pswd) or die ("Error connecting to mysql");
$conn2 = mysqli_connect($hostaset, $useraset, $pswdaset, $dbnameaset);

//mysql_select_db($dbname) or die ("Error connecting to database" .$dbname);






ob_start();
//if(!isset($_SESSION))session_start();
// mysqli_close($conn2); // update connection close
?>