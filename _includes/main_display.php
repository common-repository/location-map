<?php
include_once("../../../../wp-config.php");
if(isset($_GET['city'])){
$city = $_GET['city'];

$sql = "SELECT * FROM wp_location WHERE `city` = '$city'";
$result = mysql_query($sql) or die(mysql_error());
	$output .="<h2>".$city."</h2>";
	while($l = mysql_fetch_assoc($result)){
	$output .="<div class='locationListing'>";
	$output .="<p><a href='mailto:".$l['email']."'>".$l['manager']."</a><br>";
	$output .= $l['position']."<br/>";
	$output .= $l['branch_name']."<br/>";
	$output .= $l['address']."<br/>";
	$output .= $city.", ".$l['state']." ".$l['zip']."<br/>";
	$output .= $l['phone']."</p>";
	$output .= "</div>";
	}
	
	echo $output;
}
?>