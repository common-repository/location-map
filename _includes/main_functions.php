<?php
function location_add_pages(){
 add_menu_page("Locations", "Locations", 10, __FILE__, 'display_page');
 add_submenu_page(__FILE__, "Plot", "Plot", 10, "plot_location", 'plot_locations'); 
}


include("locations.class.php");

$loc  = new location();


function location_frontPage(){
	global $loc;	
	  $output = $loc->frontPage();
	return $output;
}

function getHeaders(){
	$output .="\n<link rel='stylesheet' type='text/css' href='".LOCATION_URL ."/_css/location.css' />\n";
	$output .="<script type='text/javascript' src='".LOCATION_URL."/_js/location_functions.js'></script>\n";
	$output .="<script type='text/javascript'> var basePath='".get_option('siteurl')."';</script>";
	echo $output;
}
function display_page(){
global $loc;
?>

<div id="location">
	<div id="map">   
    	<?php $loc->check_dots();?> 
    </div>
    <div id="content">
    	
    </div>
    <div id="mainArea">
    <?php $loc->getLocs(); ?>
    </div>
</div>
<?php 

} // END Display Page Function

?>