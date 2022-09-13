<?php

/*
 * Register scripts
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'tboot_register_scripts');
add_action('admin_enqueue_scripts', 'tboot_register_styles');

function tboot_register_scripts()
{
    $asset_file = TBOOT_DIR . '/build/front.asset.php';
    if(file_exists($asset_file))
    {
        $asset = include($asset_file);

        wp_register_script(
            'tboot-front',
            TBOOT_INDEX . '/build/front.js',
            $asset['dependencies'],
            $asset['version'],
            true
        );
    }

    $asset_file = TBOOT_DIR . '/build/admin.asset.php';
    if(file_exists($asset_file))
    {
        $asset = include($asset_file);

        wp_register_script(
            'tboot-admin',
            TBOOT_INDEX . '/build/admin.js',
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
add_action('wp_enqueue_scripts', 'tboot_register_styles');
add_action('admin_enqueue_scripts', 'tboot_register_styles');

function tboot_register_styles()
{
    wp_register_style(
        'bootstrap-grid',
        TBOOT_INDEX . '/assets/bootstrap/css/bootstrap-grid.min.css',
        [],
        TBOOT_VERSION
    );
    wp_register_style(
        'bootstrap',
        TBOOT_INDEX . '/assets/bootstrap/css/bootstrap.min.css',
        [],
        TBOOT_VERSION
    );
    wp_register_style(
        'tboot-fonts',
        TBOOT_INDEX . '/assets/fonts/fonts.css',
        [],
        TBOOT_VERSION
    );

    $asset_file = TBOOT_DIR . '/build/front.asset.php';
    if(file_exists($asset_file))
    {
        $asset = include($asset_file);

        wp_register_style(
            'tboot-front',
            TBOOT_INDEX . '/build/front.css',
            // $asset['dependencies'],
            [
                'bootstrap-grid'
            ],
            $asset['version']
        );
    }

    $asset_file = TBOOT_DIR . '/build/admin.asset.php';
    if(file_exists($asset_file))
    {
        $asset = include($asset_file);

        wp_register_style(
            'tboot-admin',
            TBOOT_INDEX . '/build/admin.css',
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
add_action('wp_enqueue_scripts', 'tboot_enqueue_scripts_front');

function tboot_enqueue_scripts_front()
{
    wp_enqueue_script('tboot-front');
    wp_localize_script('tboot-front', 'tbootFrontVars', apply_filters('tboot_js_front_vars', [
        'ajaxurl' => admin_url('admin-ajax.php')
    ]));
}

/*
 * Enqueue scripts on ADMIN
 * ----------------------------------------
 */
add_action('admin_enqueue_scripts', 'tboot_enqueue_scripts_admin');

function tboot_enqueue_scripts_admin()
{
    wp_enqueue_script('tboot-admin');
    wp_localize_script('tboot-admin', 'tbootAdminVars', apply_filters('tboot_js_admin_vars', []));
}

/*
 * Enqueue styles on FRONT
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'tboot_enqueue_styles_front');

function tboot_enqueue_styles_front()
{
    wp_enqueue_style('tboot-fonts');
    wp_enqueue_style('tboot-front');
}

/*
 * Enqueue styles on ADMIN
 * ----------------------------------------
 */
add_action('admin_enqueue_scripts', 'tboot_enqueue_styles_admin');

function tboot_enqueue_styles_admin()
{
    wp_enqueue_style('tboot-admin');
}
