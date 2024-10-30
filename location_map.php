<?php 
/*
Plugin Name: Location Map
Plugin URL: http://www.zelencomm.com
Version:1.1
Author: <a href="http://www.zelencomm.com">Daniel Beacham</a>
Description:  Location Management Tool for stores with brick and mortar locations.  Fully customizable integrated map allows for multiple locations per city as well as multiple management listings.  

*/
//Define the path to the plugin folder
define('LOCATION_FILE_PATH', dirname(__FILE__));
define('LOCATION_DIR_NAME', basename(LOCATION_FILE_PATH));

$siteurl = get_option('siteurl');

//Define the URL to the plugin folder
define('LOCATION_FOLDER', dirname(plugin_basename(__FILE__)));
define('LOCATION_URL', get_option('siteurl').'/wp-content/plugins/' . LOCATION_FOLDER);

include_once("_includes/install_and_update.php");
register_activation_hook(__FILE__, 'location_db');

//File builds the admin back panel/and all databases
include_once("_includes/main_functions.php");
include("_includes/plot_location.php");
add_action('admin_menu', 'location_add_pages');
add_action('admin_head', 'getHeaders');
add_action('wp_head', 'getHeaders');
add_shortcode('locationMap', 'location_frontPage');

?>
