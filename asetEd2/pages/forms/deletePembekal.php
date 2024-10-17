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


$id_pembekal=$_REQUEST["id_pembekal"];
$qry="delete from tbl_pembekal where id_pembekal='$id_pembekal'";
$res=mysqli_query($conn2,$qry);
if (!$res) {
    echo "Supplier record cannot be deleted...!" . mysqli_error($conn2);
} else {
    header("location:dafPembekal.php");
}

?>	 

