<?php 
    /*
    Plugin Name: Shifa News and Events
    Plugin URI: http://www.orangecreative.net
    Description: Plugin to display  News on shifa page
    Author: Shahid Javed
    Version: 1.0
    Author URI: www.shifa.com.pk
    */
	
function oscimp_admin() {
 include('oscommerce_import_admin.php');
}
 
function oscimp_admin_actions() {
    add_options_page("OSCommerce Product Display", "OSCommerce Product Display", 1, "OSCommerce Product Display", "oscimp_admin");
}
 
add_action('admin_menu', 'oscimp_admin_actions');
	





?>