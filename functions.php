<?php

define('WPTB_DIR', dirname(__FILE__));
define('WPTB_INDEX', get_stylesheet_directory_uri());
define('WPTB_VERSION', wp_get_theme()->get('Version'));

require WPTB_DIR . '/vendor/autoload.php';
require WPTB_DIR . '/src/classes/load.php';

require WPTB_DIR . '/src/setup.php';
require WPTB_DIR . '/src/scripts.php';

require WPTB_DIR . '/src/gutenberg/blocks.php';
