<?php
include_once("../../../../wp-config.php");

if(isset($_GET['id'])){
	$id 		= $_GET['id'];
}

if(isset($_GET['updateLoc']) || isset($_GET['addLoc'])){
	$name		= $_GET['name'];
	$position 	= $_GET['position'];
	$email		= $_GET['email'];
	$branch		= $_GET['branch'];
	$address	= $_GET['address'];
	$city		= $_GET['city'];
	$state		= $_GET['state'];
	$zip		= $_GET['zip'];
	$phone      = $_GET['phone'];
}

if(isset($_GET['deleteLocation'])){
 	$sql = "DELETE FROM wp_location WHERE `id` = '$id'";
	$result = mysql_query($sql) or die(mysql_error());
	if($result){
	echo "sent";
	}
} else {
	$check = checkValues($_GET);

	if($check =="ok"){
	
		if(isset($_GET['addLoc'])){
		$sql = "INSERT INTO wp_location(`manager`, `position`, `branch_name`, `address`, `city`, `state`, `zip`, `email`, `phone`) VALUES('$name', '$position', '$branch', '$address', '$city', '$state', '$zip', '$email', '$phone')";
		unset($_GET['addLoc']);
		}
		elseif(isset($_GET['updateLoc'])){
		$sql = "UPDATE wp_location SET `manager`='$name', `position`='$position', `branch_name`='$branch', `address`='$address', `city`='$city', `state`='$state', `zip`='$zip', `email`='$email', `phone`='$phone' WHERE `id` = '$id'";
		unset($_GET['updateLoc']);
		}    
		$result = mysql_query($sql) or die(mysql_error());
		if($result){
			echo "sent";
		}
	} else{
		echo $check;
		}

}

function checkValues($x){
$errorMsg = '';
$error = false;
	if($x['email'] == ''){
		$error = true;
		$errorMsg .= "Please Enter a Valid Email Address\n";
	}
	if($x['address'] == ''){
		$error = true;
		$errorMsg .= "Please Enter a Valid Address\n";
	}
	if($x['city'] == ''){
		$error = true;
		$errorMsg .= "Please Enter a Valid City\n";
	}
	if($x['zip'] == ''){
		$error = true;
		$errorMsg .= "Please Enter a Valid Zip\n";
	}
	if($x['phone'] == ''){
		$error = true;
		$errorMsg .= "Please Enter a Valid Phone Number\n";
	}
	
	if($error){
		return $errorMsg;
	} else {
		$ok = 'ok';
		return $ok;
		}
}
?>