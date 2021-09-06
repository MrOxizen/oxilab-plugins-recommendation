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

        $this->build_api();
    }

    public function build_api() {
        add_action('rest_api_init', function () {
            register_rest_route(untrailingslashit('oxilabplugins/v2/'), '/(?P<action>\w+)/', array(
                'methods' => array('GET', 'POST'),
                'callback' => [$this, 'api_action'],
                'permission_callback' => '__return_true'
            ));
        });
    }

    public function api_action($request) {
        $this->request = $request;
        $this->rawdata = addslashes($request['rawdata']);

        $action_class = strtolower($request->get_method()) . '_' . sanitize_key($request['action']);
        if (method_exists($this, $action_class)) {
            return $this->{$action_class}();
        }
    }

    public function get_all_plugins() {

        $plugins = [
            0 => [
                'modules-name' => 'Accordions - Multiple Accordions or FAQs Builders',
                'modules-path' => 'accordions-or-faqs/index.php',
                'modules-desc' => 'Accordions, Most easiest accordions or faqs builder Plugin. Create multiple accordion or  collapse faqs with this.',
                'modules-img' => OXILAB_PLUGINS_URL . 'image/accordions-or-faqs.jpg',
                'dependency' => '',
            ],
//            1 => [
//                'modules-name' => 'Image Hover Effects Ultimate - Elementor Addons.',
//                'modules-path' => 'sa-addons-for-elementor/index.php',
//                'modules-desc' => 'Add creative image hover effects to Elementor page builder. Easily customize title and content and effects with intuitive interface.',
//                'modules-img' => OXILAB_PLUGINS_URL . 'image/sa-addons-for-elementor.jpg',
//                'dependency' => '',
//            ],
//            3 => [
//                'modules-name' => 'Elementor Addons - Premium Elementor Addons with Templates & Blocks.',
//                'modules-path' => 'sa-addons-for-elementor/index.php',
//                'modules-desc' => 'Ultimate elements library for Elementor WordPress Page Builder. Premium elements with endless customization options.',
//                'modules-img' => OXILAB_PLUGINS_URL . 'image/sa-addons-for-elementor.jpg',
//                'dependency' => '',
//            ],
            
            
            7 => [
                'modules-name' => 'Shortcode Addons',
                'modules-path' => 'shortcode-addons/index.php',
                'modules-desc' => 'Shortcode Addons is an amazing set of beautiful and useful elements. Over 80+ Elements with multiple Design',
                'modules-img' => OXILAB_PLUGINS_URL . 'image/shortcode-addons.jpg',
                'dependency' => '',
            ],
            
            //Main Plugins
            8 => [
                'modules-name' => 'Tabs – Responsive Tabs with WooCommerce Product Tab Extension',
                'modules-path' => 'vc-tabs/index.php',
                'modules-desc' => 'Tabs – Responsive Tabs with WooCommerce Product Tab Extension is essayist way to awesome WordPress Responsive Tabs Plugin with many features.',
                'modules-img' => OXILAB_PLUGINS_URL . 'image/vc-tabs.jpg',
                'dependency' => '',
            ],
            9 => [
                'modules-name' => 'Flip Boxes & Image Overlay',
                'modules-path' => 'image-hover-effects-ultimate-visual-composer/index.php',
                'modules-desc' => 'Easily Create Flipbox using an image & embed them in separate page post or widgets via Flipbox shortcode. Flipbox can helps to Create Mordern page.',
                'modules-img' => OXILAB_PLUGINS_URL . 'image/image-hover-effects-ultimate-visual-composer.jpg',
                'dependency' => '',
            ],
            10 => [
                'modules-name' => 'Image Hover Effects Ultimate',
                'modules-path' => 'image-hover-effects-ultimate/index.php',
                'modules-desc' => 'Image hover effects using an image & embed them in separate page post or widgets via image hover Ultimate shortcode. 300+ Hover Effects will helps you to create awesome Design.',
                'modules-img' => OXILAB_PLUGINS_URL . 'image/image-hover-effects-ultimate.jpg',
                'dependency' => '',
            ],
        ];

        return $plugins;
    }

}
