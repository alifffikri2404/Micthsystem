<?php
// require_once('connect_nikah.php');
ob_start();
session_start();
// mysql_query("delete from user_log WHERE log_user='".$_SESSION["userid"]."'") or die(mysql_error());
session_destroy();

	   	echo '<script type="text/javascript">';
        echo 'window.location="index.php"';	  
	   	echo '</script>';
		
ob_end_flush();
?>