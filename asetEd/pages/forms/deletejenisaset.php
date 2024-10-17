<?php
require('../../configAsetTPS.php');
session_start();
$idp = $_SESSION['idP'];
$lvl = $_SESSION['lvl'];

$firstname1 = $_SESSION['1stname'];
$lastname = $_SESSION['lastname'];
$empnumber = $_SESSION['empnumber'];
$department = $_SESSION['department'];
$namerole = $_SESSION['namerole'];


//Check role
if($lvl == "1")
{
	$firstname = "Admin";
}
if($lvl <> "1")
{
	$firstname = $firstname1;
}


$id_jenis=$_REQUEST["id"];
$qry="delete from jenis_aset where id='$id_jenis'";
$res=mysqli_query($conn2,$qry);

if(!$res)
{
	echo "Record cannot be deleted...!".mysqli_error($conn2);
}
     else
	 {
		 header("location:tetapanAset.php");
	 }

?>	 

