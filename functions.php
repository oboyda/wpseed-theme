<?php

define('WPTBOOT_DIR', dirname(__FILE__));
define('WPTBOOT_INDEX', get_stylesheet_directory_uri());
define('WPTBOOT_VERSION', wp_get_theme()->get('Version'));

require WPTBOOT_DIR . '/vendor/autoload.php';

require WPTBOOT_DIR . '/src/utils.php';
require WPTBOOT_DIR . '/inc/inc.php';

wptboot_load_dir_classes(WPTBOOT_DIR . '/src/classes/Action', '\WPTBOOT\Action');
wptboot_load_dir_classes(WPTBOOT_DIR . '/src/classes/Filter', '\WPTBOOT\Filter');

require WPTBOOT_DIR . '/src/setup.php';
require WPTBOOT_DIR . '/src/scripts.php';

//require WPTBOOT_DIR . '/src/gutenberg/blocks.php';
