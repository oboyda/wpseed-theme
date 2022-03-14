<?php

define('WPTBOOT_DIR', dirname(__FILE__));
define('WPTBOOT_INDEX', get_stylesheet_directory_uri());
define('WPTBOOT_VERSION', wp_get_theme()->get('Version'));

require WPTBOOT_DIR . '/vendor/autoload.php';

require WPTBOOT_DIR . '/src/php/utils.php';
require WPTBOOT_DIR . '/src/php/classes/load.php';
require WPTBOOT_DIR . '/src/php/setup.php';
require WPTBOOT_DIR . '/src/php/scripts.php';
require WPTBOOT_DIR . '/src/php/inc/inc.php';
