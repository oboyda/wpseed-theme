<?php

define('WPTBOOT_DIR', dirname(__FILE__));
define('WPTBOOT_INDEX', get_stylesheet_directory_uri());
define('WPTBOOT_VERSION', wp_get_theme()->get('Version'));

require WPTBOOT_DIR . '/vendor/autoload.php';
require WPTBOOT_DIR . '/src/classes/load.php';

require WPTBOOT_DIR . '/src/setup.php';
require WPTBOOT_DIR . '/src/scripts.php';

//require WPTBOOT_DIR . '/src/gutenberg/blocks.php';
