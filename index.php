<?php

/*
  Plugin Name: Oxilab Plugins Recommendation
  Plugin URI: https://www.oxilab.org/
  Description: Private Property of Oxilab Development
  Author: Biplob Adhikari
  Author URI: http://www.oxilab.org/
  Version: 1.0.1
 */
if (!defined('ABSPATH'))
    exit;

define('OXILAB_PLUGINS_FILE', __FILE__);
define('OXILAB_PLUGINS_BASENAME', plugin_basename(__FILE__));
define('OXILAB_PLUGINS_PATH', plugin_dir_path(__FILE__));
define('OXILAB_PLUGINS_URL', plugins_url('/', __FILE__));
define('OXILAB_PLUGINS_PLUGIN_VERSION', '3.5.1');
define('OXILAB_PLUGINS_TEXTDOMAIN', 'oxi-tabs-plugin');

/**
 * Including composer autoloader globally.
 *
 * @since 3.1.0
 */
require_once OXILAB_PLUGINS_PATH . 'autoloader.php';



/**
 * Run plugin after all others plugins
 *
 * @since 2.0.1
 */
add_action('plugins_loaded', function () {
    \OXILAB_PLUGINS_RECOMMENDATION\Base\Plugins::instance();
});
