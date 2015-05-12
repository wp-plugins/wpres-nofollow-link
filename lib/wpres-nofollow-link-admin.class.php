<?php
 
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}
class WPResNoFollowLinkAdmin {
    public function __construct() {
        

        $this->addActions();
    }
    
    public function addActions() {
        add_action( 'admin_enqueue_scripts', array(&$this, 'changeWplink'), 99999 );
    }
    
    public function changeWplink() {
        wp_deregister_script('wplink');
        $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
        wp_register_script('wplink', WPRES_NOFOLLOW_LINK_URL . '/js/wplink' . $suffix . '.js', array('jquery'), false, 1);
        wp_localize_script('wplink', 'wpLinkL10n', array(
            'title' => __('Insert/edit link'),
            'update' => __('Update'),
            'save' => __('Add Link'),
            'noTitle' => __('(no title)'),
            'noMatchesFound' => __('No results found.'),
            'noFollow' => __('add <code>rel="nofollow"</code> to link', 'wpres-nofollow-link')
        ));
    }
}
