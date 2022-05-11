<?php

/*
 * Register scripts
 * ----------------------------------------
 */
add_action('init', 'wptboot_register_scripts');

function wptboot_register_scripts()
{
    $asset_file = WPTBOOT_DIR . '/build/index.asset.php';

    if(file_exists($asset_file))
    {
        $asset = include($asset_file);

        wp_register_script(
            'wptboot-index',
            WPTBOOT_INDEX . '/build/index.js',
            array_merge(
                ['jquery'], 
                $asset['dependencies']
            ),
            $asset['version']
        );
    }
}

/*
 * Register styles
 * ----------------------------------------
 */
add_action('init', 'wptboot_register_styles');

function wptboot_register_styles()
{
    $asset_file = WPTBOOT_DIR . '/build/index.asset.php';

    if(file_exists($asset_file))
    {
        $asset = include($asset_file);

        wp_register_style(
            'wptboot-style',
            WPTBOOT_INDEX . '/build/index.css',
            // $asset['dependencies'],
            [],
            $asset['version']
        );
    }
}

/*
 * Enqueue scripts on ADMIN
 * ----------------------------------------
 */
//add_action('admin_enqueue_scripts', 'wptboot_enqueue_scripts_admin');

function wptboot_enqueue_scripts_admin()
{
    // wp_enqueue_script('wptboot-admin');

    // wp_localize_script('wptboot-admin', 'wptbootAdminVars', apply_filters('wptboot_admin_vars', []));
}

/*
 * Enqueue styles on ADMIN
 * ----------------------------------------
 */
// add_action('admin_enqueue_scripts', 'wptboot_enqueue_styles_admin');

function wptboot_enqueue_styles_admin()
{
    // wp_enqueue_style('wptboot-admin');
}

/*
 * Enqueue scripts on FRONT
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'wptboot_enqueue_scripts');

function wptboot_enqueue_scripts()
{
    wp_enqueue_script('wptboot-index');
    
    wp_localize_script('wptboot-index', 'wptbootIndexVars', apply_filters('wptboot_js_index_vars', [
        'ajaxurl' => admin_url('admin-ajax.php')
    ]));
}

/*
 * Enqueue styles on FRONT
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'wptboot_enqueue_styles');

function wptboot_enqueue_styles()
{
    wp_enqueue_style('wptboot-style');
}
