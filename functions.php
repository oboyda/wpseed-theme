<?php

define('TBOOT_DIR', dirname(__FILE__));
define('TBOOT_INDEX', get_stylesheet_directory_uri());
define('TBOOT_VERSION', wp_get_theme()->get('Version'));
define('TBOOT_NAME', wp_get_theme()->get('Theme Name'));

require TBOOT_DIR . '/vendor/autoload.php';
require TBOOT_DIR . '/src/php/setup.php';
require TBOOT_DIR . '/src/php/utils.php';

add_action('after_setup_theme', function(){

    $deps = new \WPSEED\Deps([
        'advanced-custom-fields-pro/acf.php',
        'wp-plugin-bootstrap/plugin.php'
    ], [
        'plugin_name' => TBOOT_NAME
    ]);

    if($deps->check())
    {
        require TBOOT_DIR . '/src/php/class-load.php';
        require TBOOT_DIR . '/src/php/mods.php';
        require TBOOT_DIR . '/src/php/scripts.php';
        require TBOOT_DIR . '/src/php/acf-fields.php';
        require TBOOT_DIR . '/src/php/acf-blocks.php';
        // require TBOOT_DIR . '/src/php/debug.php';
    }
    
}, 5);
