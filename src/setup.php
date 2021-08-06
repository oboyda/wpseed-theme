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

/*
 * Setup values for oboyda/wp-seed package
 * ----------------------------------------
 */
add_filter('wpseed_views_dir', 'wptb_filter_views_dir');

function wptb_filter_views_dir()
{
    return WPTB_DIR . '/src/views';
}

add_filter('wpseed_views_namespace', 'wptb_filter_views_namespace');

function wptb_filter_views_namespace()
{
    return '\WPTB\View';
}
