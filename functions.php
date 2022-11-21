<?php

define('TBOOT_DIR', dirname(__FILE__));
define('TBOOT_INDEX', get_stylesheet_directory_uri());
define('TBOOT_VERSION', wp_get_theme()->get('Version'));
define('TBOOT_NAME', wp_get_theme()->get('Theme Name'));

add_action('after_setup_theme', function(){

    if(!class_exists('\WPSEED\Deps'))
    {
        return;
    }

    $deps = new \WPSEED\Deps([
        'oferanto-plugin/plugin.php'
    ], [
        'plugin_name' => TBOOT_NAME
    ]);

    // if($deps->check())
    // {
    // }
    
}, 5);