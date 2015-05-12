<?php
/* 
 * Plugin Name: WPRes - nofollow link
 * Plugin URI: https://wordpress.org/plugins/wpres-nofollow-link/
 * Description: Adds a checkbox in the insert link popup box for including rel="nofollow" in links
 * Version: 1.0.0
 * Requires at least: 4.2 
 * Tested up to: 4.2.2 
 * Author: WPRes.net
 * Author URI: https://profiles.wordpress.org/wpresnet/ 
 * Text Domain: wpres-nofollow-link 
 * Domain Path: /languages 
 * License: GPLv2 or later
 */ 

/*
 * WPRes - nofollow link
 * Copyright (C) 2015, WPRes.net - support@wpres.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

if (!defined('WPRES_NOFOLLOW_LINK_FILE')) {
    define('WPRES_NOFOLLOW_LINK_FILE', __FILE__);
}


/*
 * Die Klasse, die alle Methoden beinhaltet, einbinden (unbedingt mit require_once,
 * da Wordpress bei der Aktivierung diese Datei erneut läd!)
 */
require_once (plugin_dir_path(__FILE__) . '/lib/wpres-nofollow-link.class.php');

$noFollow = new WPResNoFollowLink();

/* Das Aktivieren des Plugins handeln */
//register_activation_hook(__FILE__, array(&$noFollow, 'activatePlugin'));
