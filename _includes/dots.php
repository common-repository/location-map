<?php
include_once("../../../../wp-config.php");
include_once("locations.class.php");
$loc = new location();

$x = $_GET['xPos'];
$y = $_GET['yPos'];
$city = $_GET['city'];
$status = "add";
$sql = "SELECT * FROM wp_location_position WHERE `city`='$city'";


$checkCity = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($checkCity)> 0){
	$status = "update";
} 

if($status == "add"){
$sql = "INSERT INTO wp_location_position(`dotX`, `dotY`, `city`) VALUES('$x', '$y', '$city')";
} else{
$sql = "UPDATE wp_location_position SET `dotX`='$x', `dotY`='$y' WHERE `city`='$city'";
} 

$plot = mysql_query($sql) or die(mysql_error());



$newSQL = "SELECT * FROM wp_location_position";
	$result = mysql_query($newSQL) or die(mysql_error());
	if(mysql_num_rows($result) > 0){
		while($r = mysql_fetch_assoc($result)){
		$x = $r['dotX'];
		$y = $r['dotY'];
		$city = $r['city'];
		$output .= "<img src='".LOCATION_URL."/_images/x.png' height='12' width='11' alt='pin' class='dot' style='position:absolute; top:".$y."px;left:".$x."px;' id='$city'/>";
		}
		
		echo $output;
	}

?>