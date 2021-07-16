<?php

/*
 * Load theme textdomain
 * ----------------------------------------
 */
add_action('after_setup_theme', 'wptb_load_textdomain');

function wptb_load_textdomain()
{
    load_child_theme_textdomain('wptb', WPTB_DIR . '/langs');
}
