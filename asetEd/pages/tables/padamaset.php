<?php
require('../../configAsetTPS.php');
session_start();

$idp = $_SESSION['idP'];
$lvl = $_SESSION['lvl'];
$viewname = $_SESSION['1stname'];
$empno = $_SESSION['empnumber'];
$department = $_SESSION['department'];
$namerole = $_SESSION['namerole'];

//Check role
if($lvl == "1")
{
	$viewnamef = "Admin";
}
if($lvl <> "1")
{
	$viewnamef = $viewname;
}

  $eid=$_REQUEST["id"];
 /* $qry="DELETE 
tbl_daftar_aset.tarikh_daftar,
tbl_daftar_aset.tarikh_serahan,
tbl_daftar_aset.kategori_aset,
tbl_daftar_aset.jenis_aset,
tbl_daftar_aset.no_siri,
tbl_daftar_aset.nama_aset,
tbl_daftar_aset.tahun_beli,
tbl_daftar_aset.harga_beli,
tbl_daftar_aset.warna,
tbl_daftar_aset.lokasi,
tbl_daftar_aset.cukai_jalan,
tbl_daftar_aset.nama_kakitangan,
tbl_daftar_aset.warranty, 
tbl_daftar_aset.no_aset,
tbl_daftar_aset.model,
tbl_pembekal.nama_pembekal,
tbl_pembekal.alamat_pembekal,
tbl_pembekal.notel_pembekal 
FROM tbl_daftar_aset INNER JOIN tbl_pembekal on tbl_daftar_aset.emel_pembekal=tbl_pembekal.emel_pembekal where id='$eid'";*/

// $qry="DELETE tbl_daftar_aset,tbl_pembekal 
// FROM tbl_daftar_aset 
// INNER JOIN tbl_pembekal ON 
// tbl_daftar_aset.emel_pembekal=tbl_pembekal.emel_pembekal 
// WHERE id='$eid'";

$qry="DELETE FROM tbl_daftar_aset
WHERE id='$eid'";
  
  $res=mysqli_query($conn2, $qry);
   if(!$res)
   {
      echo "Deletion Error " ;
        
   }
   else
   {
        header("location:laporanas.php");
   }

     $eno_siri=$_REQUEST["no_siri"];
  //$qry1="delete from tbl_daftar_aset where no_siri='$eno_siri'"; 
  $qry="delete from history_aset where no_aset='$eno_siri'";

  $res=mysqli_query($conn2, $qry);
   if(!$res)
   {
         echo "Deletion Error ";
   }
   else
   {
        header("location:laporanas.php");
   }
?>