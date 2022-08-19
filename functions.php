<?php

define('TART_DIR', dirname(__FILE__));
define('TART_INDEX', get_stylesheet_directory_uri());
define('TART_VERSION', wp_get_theme()->get('Version'));
define('TART_NAME', wp_get_theme()->get('Theme Name'));

require TART_DIR . '/vendor/autoload.php';
require TART_DIR . '/src/php/setup.php';

add_action('after_setup_theme', function(){

    $deps = new \TART\Deps([
        'advanced-custom-fields-pro/acf.php'
        // 'wp-plugin-bootstrap/plugin.php'
    ]);
    
    if($deps->check())
    {
        require TART_DIR . '/src/php/classes/load.php';
        require TART_DIR . '/src/php/utils.php';
        require TART_DIR . '/src/php/scripts.php';
        require TART_DIR . '/src/php/widgets.php';
        require TART_DIR . '/src/php/acf-blocks.php';
        require TART_DIR . '/src/php/acf-fields.php';
    }
    
}, 5);
