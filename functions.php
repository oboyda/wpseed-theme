<?php

define('WPTBOOT_DIR', dirname(__FILE__));
define('WPTBOOT_INDEX', get_stylesheet_directory_uri());
define('WPTBOOT_VERSION', wp_get_theme()->get('Version'));
define('WPTBOOT_NAME', wp_get_theme()->get('Theme Name'));

require WPTBOOT_DIR . '/vendor/autoload.php';
require WPTBOOT_DIR . '/src/php/setup.php';

add_action('after_setup_theme', function(){

    $deps = new \WPSEED\Deps([
        'advanced-custom-fields-pro/acf.php'
        // 'wp-plugin-bootstrap/plugin.php'
    ], [
        'plugin_name' => WPTBOOT_NAME
    ]);

    if($deps->check())
    {
        require WPTBOOT_DIR . '/src/php/utils.php';
        require WPTBOOT_DIR . '/src/php/class-load.php';
        require WPTBOOT_DIR . '/src/php/mods.php';
        require WPTBOOT_DIR . '/src/php/scripts.php';
        require WPTBOOT_DIR . '/src/php/acf-blocks.php';
        require WPTBOOT_DIR . '/src/php/acf-fields.php';
        // require WPTBOOT_DIR . '/src/php/debug.php';
    }
    
}, 5);
