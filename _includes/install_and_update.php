<?php

function location_db(){
	$locTab = "wp_location";
	$locPos = "wp_location_position";
	
	
	$locationTable = checkDB_exists($locTab);
	$positionTable = checkDB_exists($locPos);
	
	if($locationTable || $positionTable){
	} else {
	createLocationDatabases();
	}	
}



function checkDB_exists($table){
	$sql = "SHOW TABLES";
	$tableExists = false;
	$checkDB = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($checkDB) > 0){
		while($row = mysql_fetch_row($checkDB)){
			if($row[0] == $table){
				$tableExists = true;
			}
		}
	}
	return $tableExists;
	} // End checkDB function
	
	
	function createLocationDatabases(){
	$createLocTableSQL = "CREATE TABLE wp_location(id int AUTO_INCREMENT, manager VARCHAR(50), position VARCHAR(50), branch_name VARCHAR(50), address VARCHAR(50), city VARCHAR(75), state VARCHAR(2), zip VARCHAR(10), email VARCHAR(50), phone VARCHAR(10), PRIMARY KEY(id))";
	$createPosTableSQL = "CREATE TABLE wp_location_position(id int AUTO_INCREMENT, dotX int, dotY int, city VARCHAR(100), PRIMARY KEY(id))";
	
	$createLocTable = mysql_query($createLocTableSQL) or die(mysql_error());
	if(!$createLocTable)
		echo "Your Location Database can not be created at this time";
	$createPosTable = mysql_query($createPosTableSQL) or die(mysql_error());
	if(!$createPosTable)
		echo "Your position database can not be created at this time";		
	}

?>