<?php

namespace OXILAB_PLUGINS_RECOMMENDATION\Base;

/**
 * Description of Plugins
 *
 * @author biplo
 */
class Plugins {

    // instance container
    private static $instance = null;

    public static function instance() {
        if (self::$instance == null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __construct() {

//        do_action('oxi-accordions-plugin/before_init');
//        // Load translation
//        add_action('init', array($this, 'i18n'));
//        new \OXI_ACCORDIONS_PLUGINS\Classes\API();
//        $this->load_shortcode();
//
//        $this->public_filter();
//        if (is_admin()) {
//            $this->User_Admin();
//            if (isset($_GET['page']) && 'oxi-accordions-style-view' === $_GET['page']) {
//                new \OXI_ACCORDIONS_PLUGINS\Includes\Frontend();
//            }
//        }
    }

}
