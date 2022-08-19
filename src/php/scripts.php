<?php
/*
 * Register scripts
 * ----------------------------------------
 */
add_action('init', 'tart_register_scripts');

function tart_register_scripts()
{
    $admin_asset_file = TART_DIR . '/build/admin.asset.php';

    if(file_exists($admin_asset_file))
    {
        $admin_asset = include($admin_asset_file);

        wp_register_script(
            'tart-admin',
            TART_INDEX . '/build/admin.js',
            array_merge(
                ['jquery'],
                $admin_asset['dependencies']
            ),
            $admin_asset['version']
        );
    }

    $front_asset_file = TART_DIR . '/build/front.asset.php';

    if(file_exists($front_asset_file))
    {
        $front_asset = include($front_asset_file);

        wp_register_script(
            'tart-front',
            TART_INDEX . '/build/front.js',
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
add_action('init', 'tart_register_styles');

function tart_register_styles()
{
    wp_register_style(
        'bootstrap-grid',
        TART_INDEX . '/assets/bootstrap/css/bootstrap-grid.min.css',
        [],
        TART_VERSION
    );
    wp_register_style(
        'bootstrap',
        TART_INDEX . '/assets/bootstrap/css/bootstrap.min.css',
        [],
        TART_VERSION
    );

    $admin_asset_file = TART_DIR . '/build/admin.asset.php';

    if(file_exists($admin_asset_file))
    {
        $admin_asset = include($admin_asset_file);

        wp_register_style(
            'tart-admin',
            TART_INDEX . '/build/admin.css',
            // $asset['dependencies'],
            [
                'bootstrap-grid', 
            ],
            $admin_asset['version']
        );
    }

    $front_asset_file = TART_DIR . '/build/front.asset.php';

    if(file_exists($front_asset_file))
    {
        $front_asset = include($front_asset_file);

        wp_register_style(
            'tart-front',
            TART_INDEX . '/build/front.css',
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
//add_action('admin_enqueue_scripts', 'tart_enqueue_scripts_admin');

function tart_enqueue_scripts_admin()
{
    // wp_enqueue_script('tart-admin');

    // wp_localize_script('tart-admin', 'tartAdminVars', apply_filters('tart_admin_vars', []));
}

/*
 * Enqueue styles on ADMIN
 * ----------------------------------------
 */
add_action('admin_enqueue_scripts', 'tart_enqueue_styles_admin');

function tart_enqueue_styles_admin()
{
    wp_enqueue_style('tart-admin');
}

/*
 * Enqueue scripts on FRONT
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'tart_enqueue_scripts');

function tart_enqueue_scripts()
{
    wp_enqueue_script('tart-front');
    
    wp_localize_script('tart-front', 'tartIndexVars', apply_filters('tart_js_index_vars', [
        'ajaxurl' => admin_url('admin-ajax.php')
    ]));
}

/*
 * Enqueue styles on FRONT
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'tart_enqueue_styles');

function tart_enqueue_styles()
{
    wp_enqueue_style('tart-front');
}
