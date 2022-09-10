<?php

/*
 * Register scripts
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'wptboot_register_scripts');
add_action('admin_enqueue_scripts', 'wptboot_register_styles');

function wptboot_register_scripts()
{
    $asset_file = WPTBOOT_DIR . '/build/front.asset.php';
    if(file_exists($asset_file))
    {
        $asset = include($asset_file);

        wp_register_script(
            'wptboot-front',
            WPTBOOT_INDEX . '/build/front.js',
            $asset['dependencies'],
            $asset['version'],
            true
        );
    }

    $asset_file = WPTBOOT_DIR . '/build/admin.asset.php';
    if(file_exists($asset_file))
    {
        $asset = include($asset_file);

        wp_register_script(
            'wptboot-admin',
            WPTBOOT_INDEX . '/build/admin.js',
            $asset['dependencies'],
            $asset['version'],
            true
        );
    }
}

/*
 * Register styles
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'wptboot_register_styles');
add_action('admin_enqueue_scripts', 'wptboot_register_styles');

function wptboot_register_styles()
{
    wp_register_style(
        'bootstrap-grid',
        WPTBOOT_INDEX . '/assets/bootstrap/css/bootstrap-grid.min.css',
        [],
        WPTBOOT_VERSION
    );
    wp_register_style(
        'bootstrap',
        WPTBOOT_INDEX . '/assets/bootstrap/css/bootstrap.min.css',
        [],
        WPTBOOT_VERSION
    );
    wp_register_style(
        'wptboot-fonts',
        WPTBOOT_INDEX . '/assets/fonts/fonts.css',
        [],
        WPTBOOT_VERSION
    );

    $asset_file = WPTBOOT_DIR . '/build/front.asset.php';
    if(file_exists($asset_file))
    {
        $asset = include($asset_file);

        wp_register_style(
            'wptboot-front',
            WPTBOOT_INDEX . '/build/front.css',
            // $asset['dependencies'],
            [
                'bootstrap-grid'
            ],
            $asset['version']
        );
    }

    $asset_file = WPTBOOT_DIR . '/build/admin.asset.php';
    if(file_exists($asset_file))
    {
        $asset = include($asset_file);

        wp_register_style(
            'wptboot-admin',
            WPTBOOT_INDEX . '/build/admin.css',
            // $asset['dependencies'],
            [
                'bootstrap', 
                'dashicons'
            ],
            $asset['version']
        );
    }
}

/*
 * Enqueue scripts on FRONT
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'wptboot_enqueue_scripts_front');

function wptboot_enqueue_scripts_front()
{
    wp_enqueue_script('wptboot-front');
    wp_localize_script('wptboot-front', 'wptbootFrontVars', apply_filters('wptboot_js_front_vars', [
        'ajaxurl' => admin_url('admin-ajax.php')
    ]));
}

/*
 * Enqueue scripts on ADMIN
 * ----------------------------------------
 */
add_action('admin_enqueue_scripts', 'wptboot_enqueue_scripts_admin');

function wptboot_enqueue_scripts_admin()
{
    wp_enqueue_script('wptboot-admin');
    wp_localize_script('wptboot-admin', 'wptbootAdminVars', apply_filters('wptboot_js_admin_vars', []));
}

/*
 * Enqueue styles on FRONT
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'wptboot_enqueue_styles_front');

function wptboot_enqueue_styles_front()
{
    wp_enqueue_style('wptboot-fonts');
    wp_enqueue_style('wptboot-front');
}

/*
 * Enqueue styles on ADMIN
 * ----------------------------------------
 */
add_action('admin_enqueue_scripts', 'wptboot_enqueue_styles_admin');

function wptboot_enqueue_styles_admin()
{
    wp_enqueue_style('wptboot-admin');
}
