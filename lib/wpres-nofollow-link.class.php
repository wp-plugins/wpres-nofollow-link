<?php
 
if (!defined('ABSPATH')) {
    exit;
}
class WPResNoFollowLink {
    private $rootUrl;
    private $rootPath;
    public function __construct($rootPath, $rootUrL) {

        $this->rootPath = $rootPath;
        $this->rootUrl = $rootUrL;
        

        $this->addActions();

        if (is_admin()) {
            $this->addActionsAdmin();
        }
    }
    public function addActions() {

        add_action( 'init', array(&$this, 'loadPluginTextdomain'));
    }
    public function addActionsAdmin() {
        add_action( 'admin_enqueue_scripts', array(&$this, 'changeWplink'), 99999 );
    }
    
    public function loadPluginTextdomain() {
    $locale = apply_filters('plugin_locale', get_locale(), 'wpres-nofollow-link');
    load_textdomain('wpres-nofollow-link', WP_LANG_DIR . '/plugins/wpres-nofollow-link' . $locale . '.mo');
    load_plugin_textdomain('wpres-nofollow-link', FALSE, '/wpres-nofollow-link/languages/');        
    }
    public function changeWplink() {
        wp_deregister_script('wplink');
        $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
        wp_register_script('wplink', $this->rootUrl . '/js/wplink' . $suffix . '.js', array('jquery'), false, 1);
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
