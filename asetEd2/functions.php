<?php 
session_start();

//$db = mysqli_connect('localhost', 'root', '', 'idrive'); 

include "db_conn.php";



function getUserById($id)
{
	global $conn;
	$query = "SELECT * FROM empmaininfo WHERE Internal_Id=" . $id;
	$result = mysqli_query($conn, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error" style="color:red">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['func_admin'] == '1' ) {
		return true;
	}else{
		return false;
	}
}
function isLoggedIn(){
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}