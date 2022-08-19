<?php

define('WPTB_DIR', dirname(__FILE__));
define('WPTB_INDEX', get_stylesheet_directory_uri());
define('WPTB_VERSION', wp_get_theme()->get('Version'));
define('WPTB_NAME', wp_get_theme()->get('Theme Name'));

require WPTB_DIR . '/vendor/autoload.php';
require WPTB_DIR . '/src/php/setup.php';

add_action('after_setup_theme', function(){

    $deps = new \WPTB\Deps([
        'advanced-custom-fields-pro/acf.php'
        // 'wp-plugin-bootstrap/plugin.php'
    ]);
    
    if($deps->check())
    {
        require WPTB_DIR . '/src/php/classes/load.php';
        require WPTB_DIR . '/src/php/utils.php';
        require WPTB_DIR . '/src/php/scripts.php';
        require WPTB_DIR . '/src/php/widgets.php';
        require WPTB_DIR . '/src/php/acf-blocks.php';
        require WPTB_DIR . '/src/php/acf-fields.php';
    }
    
}, 5);
