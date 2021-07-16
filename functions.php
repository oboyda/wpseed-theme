<?php

define('WPTB_DIR', dirname(__FILE__));
define('WPTB_INDEX', get_stylesheet_directory_uri());
define('WPTB_VER', wp_get_theme()->get('Version'));

include WPTB_DIR . '/vendor/autoload.php';
include WPTB_DIR . '/src/classes/load.php';

include WPTB_DIR . '/src/setup.php';
include WPTB_DIR . '/src/scripts.php';

include WPTB_DIR . '/src/gutenberg/blocks.php';
