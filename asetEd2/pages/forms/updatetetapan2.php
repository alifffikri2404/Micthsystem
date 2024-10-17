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
?>

 <!DOCTYPE html>
<html>
<head>
<title></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="maindiv">
<div class="divA">
<div class="title">
<h2>Update Data Using PHP</h2>
</div>
<div class="divB">
<div class="divD">
<p>Click On Menu</p>
<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("dbaset", $connection);
if (isset($_GET['submit'])) {
$id = $_GET['id_kategori'];
$name = $_GET['nama_kategori'];

$query = mysql_query("update kategoritps set
nama_kategori='$name' id_kategori='$id'", $connection);
}
$query = mysql_query("select * from kategoritps", $connection);
while ($row = mysql_fetch_array($query)) {
echo "<b><a href='updatetetapan2.php?updatetetapan2={$row['id_kategori']}'>{$row['nama_kategori']}</a></b>";
echo "<br />";
}
?>
</div><?php
if (isset($_GET['updatetetapan2'])) {
$update = $_GET['updatetetapan2'];
$query1 = mysql_query("select * from kategoritps where id_kategori=$update", $connection);
while ($row1 = mysql_fetch_array($query1)) {
echo "<form class='form' method='get'>";
echo "<h2>Update Form</h2>";
echo "<hr/>";
echo"<input class='input' type='hidden' name='did' value='{$row1['id_kategori']}' />";
echo "<br />";
echo "<label>" . "Name:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dname' value='{$row1['nama_kategori']}' />";
echo "<br />";

echo "<br />";
echo "<input class='submit' type='submit' name='submit' value='update' />";
echo "</form>";
}
}
if (isset($_GET['submit'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
}
?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div><?php
mysql_close($connection);
?>
</body>
</html>