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
                'modules-massage' => 'We suggest you to use our <a href="https://wordpress.org/support/plugin/accordions-or-faqs">Accordions or FAQs Builders</a>, The most Easiest Accordions Builder with 30+ layouts. Create your wonderful accordions with most Flexible, Creative and Mordern Elements .',
                'modules-img' => OXILAB_PLUGINS_URL . 'image/accordions-or-faqs.jpg',
                'plugin-url' => 'https://oxilab.org/accordions',
                'dependency' => '',
            ],
//            7 => [
//                'modules-name' => 'Shortcode Addons',
//                'modules-path' => 'shortcode-addons/index.php',
//                'modules-desc' => 'Shortcode Addons is an amazing set of beautiful and useful elements. Over 120+ Elements with multiple Design',
//                'modules-img' => OXILAB_PLUGINS_URL . 'image/shortcode-addons.jpg',
//                'plugin-url' => 'https://oxilab.org/shortcode-addons/',
//                'dependency' => 'elementor/elementor.php',
//            ],
            7 => [
                'modules-name' => 'Shortcode Addons',
                'modules-path' => 'shortcode-addons/index.php',
                'modules-desc' => 'Shortcode Addons is an amazing set of beautiful and useful elements. Over 120+ Elements with multiple Design',
                'modules-massage' => 'We suggest you to use our <a href="https://wordpress.org/support/plugin/shortcode-addons">Shortcode Addons</a>, The most Easiest Shortcode Builder with 70+ Elements. Create your wonderful website with most Flexible, Creative and Mordern Elements .',
                'modules-img' => OXILAB_PLUGINS_URL . 'image/shortcode-addons.jpg',
                'plugin-url' => 'https://oxilab.org/shortcode-addons/',
                'dependency' => '',
            ],
            //Main Plugins
            8 => [
                'modules-name' => 'Responsive Tabs with WooCommerce Product Tab Extension',
                'modules-path' => 'vc-tabs/index.php',
                'modules-desc' => 'Tabs – Responsive Tabs with WooCommerce Product Tab Extension is essayist way to awesome WordPress Responsive Tabs Plugin with many features.',
                'modules-massage' => 'We suggest you to use our <a href="https://wordpress.org/support/plugin/vc-tabs">Responsive Tabs</a>, The most Easiest WP Tabs Builder with 30+ templates. Create your wonderful jquery tabs with most Flexible, Creative and Mordern Elements .',
                'modules-img' => OXILAB_PLUGINS_URL . 'image/vc-tabs.jpg',
                'plugin-url' => 'https://oxilab.org/responsive-tabs/',
                'dependency' => '',
            ],
            9 => [
                'modules-name' => 'Flip Boxes & Image Overlay',
                'modules-path' => 'image-hover-effects-ultimate-visual-composer/index.php',
                'modules-desc' => 'Easily Create Flipbox using an image & embed them in separate page post or widgets via Flipbox shortcode. Flipbox can helps to Create Mordern page.',
                'modules-massage' => 'We suggest you to use our <a href="https://wordpress.org/support/plugin/image-hover-effects-ultimate-visual-composer">Flip Boxes & Image Overlay</a>, The most Easiest Flipbox Builder with 25+ Effects. Create your wonderful flipbox with most Flexible, Creative and Mordern Elements .',
                'modules-img' => OXILAB_PLUGINS_URL . 'image/image-hover-effects-ultimate-visual-composer.jpg',
                'plugin-url' => 'https://oxilab.org/flip-box/',
                'dependency' => '',
            ],
            10 => [
                'modules-name' => 'Image Hover Effects Ultimate',
                'modules-path' => 'image-hover-effects-ultimate/index.php',
                'modules-desc' => 'Image hover effects using an image & embed them in separate page post or widgets via image hover Ultimate shortcode. 300+ Hover Effects will helps you to create awesome Design.',
                'modules-massage' => 'We suggest you to use our <a href="https://wordpress.org/support/plugin/image-hover-effects-ultimate">Image Hover Effects Ultimate</a>, The most Easiest Image Hover Builder with 200+ Effects and Extension. Create your wonderful image effects with most Flexible, Creative and Mordern Elements.',
                'modules-img' => OXILAB_PLUGINS_URL . 'image/image-hover-effects-ultimate.jpg',
                'plugin-url' => 'https://www.image-hover.oxilab.org/',
                'dependency' => '',
            ],
        ];

        return $plugins;
    }

}
