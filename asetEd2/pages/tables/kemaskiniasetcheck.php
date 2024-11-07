
<html>
<body>
    <h2 align="center"><b>Edit Employee Data </b></h2>
    <form name="f1" method="post" action="laporanas.php">
    <center>
    <table border="1" cellspacing="20">
      <tr> <td> Employee Id : &nbsp;&nbsp;&nbsp;</td> 
          <td><input type="text" name="id1" size="30" value="<?php echo $_REQUEST["id"] ?>" readonly="true"> </td> 
       </tr>
  
   <?php
       $con=mysql_connect("localhost","root","");
       $res=mysql_select_db("dbaset",$con);
       $res=mysql_query("Select * from tbl_daftar_aset where id='".$_REQUEST["id"]."'");
       $r=mysql_fetch_row($res)
 ?>
 
	 <tr> <td> Kategori : &nbsp;&nbsp;&nbsp;</td> 
     <td><input type="text" name="kategori_aset1" size="30" value="<?php echo $r[1] ?>" readonly="true"></td> </tr>
					
     <tr> <td> Jenis : &nbsp;&nbsp;&nbsp;</td> 
     <td><input type="text" name="jenis_aset1" size="30" value="<?php echo $r[2] ?>" readonly="true"></td> </tr>
 
     <tr> <td> No. Siri/ No. Plat : &nbsp;&nbsp;&nbsp;</td> 
     <td><input type="text" name="no_siri1" size="30" value="<?php echo $r[3] ?>"></td> </tr>
 
     <tr> <td> Nama Aset : &nbsp;&nbsp;&nbsp;</td>
     <td><input type="text" name="nama_aset1" size="30" value="<?php echo $r[4] ?>"></td> </tr> 
 
     <tr> <td> Tahun Beli : &nbsp;&nbsp;&nbsp;</td> 
     <td><input type="text" name="tahun_beli1" size="30" value="<?php echo $r[5] ?>"></td> </tr>
	 
	 <tr> <td> Harga Pembelian : &nbsp;&nbsp;&nbsp;</td> 
     <td><input type="text" name="harga_beli1" size="30" value="<?php echo $r[6] ?>"></td> </tr>
	 
	 <tr> <td> Warna : &nbsp;&nbsp;&nbsp;</td> 
     <td><input type="text" name="warna1" size="30" value="<?php echo $r[7] ?>"></td> </tr>
	 
     <tr><td colspan="2" align="center"><input type="submit" value="Update" name="cuba"></td></tr>

 </table>
 </form>
 </body>
 </html>

<?php
if(isset($_REQUEST["cuba"]))
{
   $eid=$_REQUEST["id"];
   $kategori_aset=$_REQUEST["kategori_aset"];
   $jenis_aset=$_REQUEST["jenis_aset"];
   $no_siri=$_REQUEST["no_siri"];
   $nama_aset=$_REQUEST["nama_aset"];
   $tahun_beli=$_REQUEST["tahun_beli"];
   $harga_beli=$_REQUEST["harga_beli"];
   $warna=$_REQUEST["warna"];

   $con=mysql_connect("localhost","root","");
   if(!$con)
   {   
        echo "<br>Could Not Connect".mysql_error();
   }
   else
   {
      $result=mysql_select_db("dbaset",$con);
      if(!$result)
      {
          echo "<br>Could Not Select database ".mysql_error();
      }
      else
      {
         $qry="update tbl_daftar_aset set kategori_aset='".$kategori_aset."',jenis_aset='".$jenis."',no_siri='".$no_siri."', nama_aset='".$nama_aset."',tahun_beli='".$tahun_beli."',harga_beli='".$harga_beli."',warna='".$warna="' where id='".$eid."'" ;
         $res=mysql_query($qry);
         if(!$res)
         {
             echo "Updation Error ".mysql_error();
         }
         else
         {
             header("location:laporanas.php");  // This function will redirect page to the emp_update.php
          }
       }
   }
}
?>