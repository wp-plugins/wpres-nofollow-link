<?php
 
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}
define('WPRES_NOFOLLOW_LINK_PATH', plugin_dir_path(WPRES_NOFOLLOW_LINK_FILE));
define('WPRES_NOFOLLOW_LINK_BASENAME', plugin_basename(WPRES_NOFOLLOW_LINK_FILE));
define('WPRES_NOFOLLOW_LINK_URL', plugin_dir_url(WPRES_NOFOLLOW_LINK_FILE));
class WPResNoFollowLink {
    public function __construct() {
        

        $this->addActions();
        

        if (is_admin()) {
            include_once (WPRES_NOFOLLOW_LINK_PATH . '/lib/wpres-nofollow-link-admin.class.php');
            $WPResNoFollowLinkAdmin = new WPResNoFollowLinkAdmin();
        }
        
    }
    public function addActions() {

        add_action( 'init', array(&$this, 'loadPluginTextdomain'));
    }
    
    public function loadPluginTextdomain() {
    $locale = apply_filters('plugin_locale', get_locale(), 'wpres-nofollow-link');
    load_textdomain('wpres-nofollow-link', WP_LANG_DIR . '/plugins/wpres-nofollow-link' . $locale . '.mo');
    load_plugin_textdomain('wpres-nofollow-link', FALSE, '/wpres-nofollow-link/languages/');        
    }
}
