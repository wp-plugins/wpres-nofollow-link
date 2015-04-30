<?php 
/* 
* Plugin Name: WPRes - nofollow link - en 
* Plugin URI: https://wordpress.org/plugins/wpres-nofollow-link-en/
* Description: Adds a checkbox in the insert link popup box for including rel="nofollow" in links
* Version: 0.9.0
* Requires at least: 4.2 
* Tested up to: 4.2.1 
* Author: WPRes.net
* Author URI: https://profiles.wordpress.org/wpresnet/ 
* Text Domain: wpres-nofollow-link 
* Domain Path: /languages 
* License: GPLv2 or later
*/ 
?>

<?php
 
if (!defined('ABSPATH')) {
    exit;
}
$rootPath = plugin_dir_path(__FILE__);
$rootUrL = plugin_dir_url(__FILE__);
require_once ($rootPath . '/lib/wpres-nofollow-link.class.php');
$noFollow = new WPResNoFollowLink($rootPath, $rootUrL);
