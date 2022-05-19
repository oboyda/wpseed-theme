<?php
/*
 * Register scripts
 * ----------------------------------------
 */
add_action('init', 'wptboot_register_scripts');

function wptboot_register_scripts()
{
    $admin_asset_file = WPTBOOT_DIR . '/build/admin.asset.php';

    if(file_exists($admin_asset_file))
    {
        $admin_asset = include($admin_asset_file);

        wp_register_script(
            'wptboot-admin',
            WPTBOOT_INDEX . '/build/admin.js',
            array_merge(
                ['jquery'],
                $admin_asset['dependencies']
            ),
            $admin_asset['version']
        );
    }

    $front_asset_file = WPTBOOT_DIR . '/build/front.asset.php';

    if(file_exists($front_asset_file))
    {
        $front_asset = include($front_asset_file);

        wp_register_script(
            'wptboot-front',
            WPTBOOT_INDEX . '/build/front.js',
            array_merge(
                ['jquery'],
                $front_asset['dependencies']
            ),
            $front_asset['version']
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

    $admin_asset_file = WPTBOOT_DIR . '/build/admin.asset.php';

    if(file_exists($admin_asset_file))
    {
        $admin_asset = include($admin_asset_file);

        wp_register_style(
            'wptboot-admin',
            WPTBOOT_INDEX . '/build/admin.css',
            // $asset['dependencies'],
            [
                'bootstrap-grid', 
            ],
            $admin_asset['version']
        );
    }

    $front_asset_file = WPTBOOT_DIR . '/build/front.asset.php';

    if(file_exists($front_asset_file))
    {
        $front_asset = include($front_asset_file);

        wp_register_style(
            'wptboot-front',
            WPTBOOT_INDEX . '/build/front.css',
            // $asset['dependencies'],
            [
                'bootstrap', 
            ],
            $admin_asset['version']
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
add_action('admin_enqueue_scripts', 'wptboot_enqueue_styles_admin');

function wptboot_enqueue_styles_admin()
{
    wp_enqueue_style('wptboot-admin');
}

/*
 * Enqueue scripts on FRONT
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'wptboot_enqueue_scripts');

function wptboot_enqueue_scripts()
{
    wp_enqueue_script('wptboot-front');
    
    wp_localize_script('wptboot-front', 'wptbootIndexVars', apply_filters('wptboot_js_index_vars', [
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
    wp_enqueue_style('wptboot-front');
}
