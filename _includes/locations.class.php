<?php 

class location {

function frontPage(){
?>
	<div id="location">
    	<p>Please click any of the dots above to see our locations</p>
	<div id="map">   
    	<?php $this->check_dotsFront(); ?>
    </div>
    <div id="mapContent">
    	
    </div>
    <div id="mainArea">
 
    </div>
</div>
<?php
}
	
function getLocs(){
		
		$locationSQL = "SELECT * FROM wp_location";
		$locationResults = mysql_query($locationSQL) or die(mysql_error());
		$output .="\n<h2>Current Locations</h2>\n";
		if(mysql_num_rows($locationResults)>0){
			$output .="<p>Click on any of the locations listed below to get more edit the details of that particular location.  If you would like to add another location, please <a href=\"javascript:addLocForm('".get_option('siteurl')."');\">click here</a>.</p>";
			while($row = mysql_fetch_assoc($locationResults)){
				$id = $row['id'];
				$man = $row['manager'];
				$branch = $row['branch_name'];
				$city = $row['city'];
				$st = $row['state'];
				$zip = $row['zip'];
				
				$output .="<div class='locationListing'>";
				$output .="<a href=\"javascript:updLocForm('".get_option('siteurl')."', '$id')\">".$man ."</a><br/>";
				$output .=$branch ."<br/>";
				$output .=$city .", ". $st." ".$zip;
				$output .="</div>";
			}
		} else{
		$output .= "<p>There are currently no locations for your store.  If you would like to add new locations please <a href=\"javascript:addLocForm('".get_option('siteurl')."');\">click here</a>.</p>";
		}		
		echo $output;
	}
	
	
	
function getStateName($st){ 
		 switch($st){
			case "AL": $state = "Alabama"; break;
			case "AK": $state ="Alaska"; break;
			case "AZ": $state ="Arizona"; break;
			case "AR": $state ="Arkansas"; break;
			case "CA": $state ="California"; break;
			case "CO": $state ="Colorado"; break;
			case "CT": $state ="Connecticut"; break;
			case "DE": $state ="Delaware"; break;
			case "DC": $state ="Dist of Columbia"; break;
			case "FL": $state ="Florida"; break;
			case "GA": $state ="Georgia"; break;
			case "HI": $state ="Hawaii"; break;
			case "ID": $state ="Idaho"; break;
			case "IL": $state ="Illinois"; break;
			case "IN": $state ="Indiana"; break;
			case "IA": $state ="Iowa"; break;
			case "KS": $state ="Kansas"; break;
			case "KY": $state ="Kentucky"; break;
			case "LA": $state ="Louisiana"; break;
			case "ME": $state ="Maine"; break;
			case "MD": $state ="Maryland"; break;
			case "MA": $state ="Massachusetts"; break;
			case "MI": $state ="Michigan"; break;
			case "MN": $state ="Minnesota"; break;
			case "MS": $state ="Mississippi"; break;
			case "MO": $state ="Missouri"; break;
			case "MT": $state ="Montana"; break;
			case "NE": $state ="Nebraska"; break;
			case "NV": $state ="Nevada"; break;
			case "NH": $state ="New Hampshire"; break;
			case "NJ": $state ="New Jersey"; break;
			case "NM": $state ="New Mexico"; break;
			case "NY": $state ="New York"; break;
			case "NC": $state ="North Carolina"; break;
			case "ND": $state ="North Dakota"; break;
			case "OH": $state ="Ohio"; break;
			case "OK": $state ="Oklahoma"; break;
			case "OR": $state ="Oregon"; break;
			case "PA": $state ="Pennsylvania"; break;
			case "RI": $state ="Rhode Island"; break;
			case "SC": $state ="South Carolina"; break;
			case "SD": $state ="South Dakota"; break;
			case "TN": $state ="Tennessee"; break;
			case "TX": $state ="Texas"; break;
			case "UT": $state ="Utah"; break;
			case "VT": $state ="Vermont"; break;
			case "VA": $state ="Virginia"; break;
			case "WA": $state ="Washington"; break;
			case "WV": $state ="West Virginia"; break;
			case "WI": $state ="Wisconsin"; break;
			case "WY": $state ="Wyoming"; break;
		 }
		 
		 return $state;
 }

function disp_cities(){
	$sql = "SELECT DISTINCT `city` FROM wp_location";
	$result = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result)>0){
	$output .= "<h4>Select which city you would like to plot</h4>";
	$output .= "<select id='dotCity'>";
		while($r = mysql_fetch_assoc($result)){
		$output .="<option value='".$r['city']."'>".$r['city']."</option>";
		}
	$output .= "</select>";
	//$output .= '<input type="button" value="submit" onclick="submitDot();" />';
    //$output .=  '<input type="button" value="cancel" onclick="cancelDot();" />';
	echo $output;
	} else{
	echo "<p>There are currently no locations entered into the database.  You must enter a location in order to plot a city on the map.  Come on you are smarter than that!</p>";
	}
}


function check_dots(){
	$sql = "SELECT * FROM wp_location_position";
	$result = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result) > 0){
		while($r = mysql_fetch_assoc($result)){
		$x = $r['dotX'];
		$y = $r['dotY'];
		$city = $r['city'];
		$output .= "<img src='".LOCATION_URL."/_images/x.png' height='12' width='11' alt='pin' class='dot' style='position:absolute; top:".$y."px;left:".$x."px;' id='$city'/>";
		}
		
		echo $output;
	}
}

function check_dotsFront(){
	$sql = "SELECT * FROM wp_location_position";
	$result = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result) > 0){
		while($r = mysql_fetch_assoc($result)){
		$x = $r['dotX'];
		$y = $r['dotY'];
		$city = $r['city'];
		$output .= "<img src='".LOCATION_URL."/_images/x.png' height='12' width='11' alt='pin' class='dot' style='position:absolute; top:".$y."px;left:".$x."px;' onclick=\"disp_front_locations('$city');\"/>";
		}
		
		echo $output;
	}
}

}  // END CLASS



?>