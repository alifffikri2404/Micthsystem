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


$id_kategori=$_REQUEST["id_kategori"];
$qry="delete from kategoritps where id_kategori='$id_kategori'";
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

