<?php 
/*$host = "localhost";
$user = "root";
$pswd = "";
$dbname = "leave";*/

$host2 = "localhost";
$user2 = "root";
$pswd2 = "";
$dbname2 = "dbsurat";

//$conn=mysql_connect($host, $user, $pswd) or die ("Error connecting to mysql");
$conn2 = mysql_connect($host2, $user2, $pswd2);

//mysql_select_db($dbname) or die ("Error connecting to database" .$dbname);

mysql_select_db($dbname2) or die ("Error connecting to database2" .$dbname2);




ob_start();
//if(!isset($_SESSION))session_start();
?>