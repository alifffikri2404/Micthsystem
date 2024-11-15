<?php 
$host = "localhost";
$user = "root";
$pswd = "";
$dbname = "dbaset";

/*$host = "localhost";
$user = "root";
$pswd = "";
$dbname = "leave";*/

$conn=mysqli_connect($host, $user, $pswd, $dbname) or die ("Error connecting to mysql");

function create_thumb($where, $what, $size=50){
	if(file_exists($where.$what)){
		$info = pathinfo($where.$what);
		$type_i = strtolower($info['extension']);
	   if($type_i=="png")
		   $im=imagecreatefrompng($where.$what); 
		else if($type_i=="jpeg"||$type_i=="jpg")
		   $im=imagecreatefromjpeg($where.$what); 
		else if($type_i=="gif")
		   $im=imagecreatefromgif($where.$what); 
		
	   	$width=imageSx($im);              // Original picture width is stored
	   	$height=imageSy($im);             // Original picture height is stored
	   	$n_height = $size;
		$n_width = $size;//floor( $width * ( $n_height / $height ) );
	   	$newimage=imagecreatetruecolor($n_width,$n_height); 
		 
	   	if($type_i=="gif"){
	   		$transparent = imagecolorallocatealpha($newimage, 0, 0, 0, 127);
			imagefill($newimage, 0, 0, $transparent);
			imagealphablending($newimage, true);
	   	}
		else if($type_i=="png"){
	   		imagealphablending($newimage, false);
			imagesavealpha($newimage, true);         
		}
	   imagecopyresized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
	   if(!file_exists($where."thumb/")) mkdir($where."thumb/", 0755);
	   
	   if($type_i=="png")
		   imagepng($newimage,$where."thumb/".$what);
		else if($type_i=="jpeg"||$type_i=="jpg")
		   imagejpeg($newimage,$where."thumb/".$what);
		else if($type_i=="gif")
		   imagegif($newimage,$where."thumb/".$what);
	}
}


ob_start();
//if(!isset($_SESSION))session_start();

// mysqli_close($conn); // update connection close
?>