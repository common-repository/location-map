<?php

function plot_locations(){ 
global $loc;
?>
<div id="location">
	<div id="map" onclick ="setDot(event);">  
    	<?php $loc->check_dots(); ?> 
    </div>
    <div id="content">
          <?php $loc->disp_cities();  ?>

    </div>
    <div id="mainArea">
  		<h2>Plot Locations</h2>
        <p>To plot your location, please select a city from the drop down menu in the upper right corner.  Once you select a city, click on the map to drop your dot into place.  When you click on the map it will automatically update the back and front end so you don't need to submit anything.</p>
    </div>
</div>
<?php
}
?>