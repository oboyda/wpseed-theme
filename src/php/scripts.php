<?php
/*
 * Register scripts
 * ----------------------------------------
 */
add_action('init', 'wptb_register_scripts');

function wptb_register_scripts()
{
    $admin_asset_file = WPTB_DIR . '/build/admin.asset.php';

    if(file_exists($admin_asset_file))
    {
        $admin_asset = include($admin_asset_file);

        wp_register_script(
            'wptb-admin',
            WPTB_INDEX . '/build/admin.js',
            array_merge(
                ['jquery'],
                $admin_asset['dependencies']
            ),
            $admin_asset['version']
        );
    }

    $front_asset_file = WPTB_DIR . '/build/front.asset.php';

    if(file_exists($front_asset_file))
    {
        $front_asset = include($front_asset_file);

        wp_register_script(
            'wptb-front',
            WPTB_INDEX . '/build/front.js',
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
add_action('init', 'wptb_register_styles');

function wptb_register_styles()
{
    wp_register_style(
        'bootstrap-grid',
        WPTB_INDEX . '/assets/bootstrap/css/bootstrap-grid.min.css',
        [],
        WPTB_VERSION
    );
    wp_register_style(
        'bootstrap',
        WPTB_INDEX . '/assets/bootstrap/css/bootstrap.min.css',
        [],
        WPTB_VERSION
    );

    $admin_asset_file = WPTB_DIR . '/build/admin.asset.php';

    if(file_exists($admin_asset_file))
    {
        $admin_asset = include($admin_asset_file);

        wp_register_style(
            'wptb-admin',
            WPTB_INDEX . '/build/admin.css',
            // $asset['dependencies'],
            [
                'bootstrap-grid', 
            ],
            $admin_asset['version']
        );
    }

    $front_asset_file = WPTB_DIR . '/build/front.asset.php';

    if(file_exists($front_asset_file))
    {
        $front_asset = include($front_asset_file);

        wp_register_style(
            'wptb-front',
            WPTB_INDEX . '/build/front.css',
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
//add_action('admin_enqueue_scripts', 'wptb_enqueue_scripts_admin');

function wptb_enqueue_scripts_admin()
{
    // wp_enqueue_script('wptb-admin');

    // wp_localize_script('wptb-admin', 'wptbAdminVars', apply_filters('wptb_admin_vars', []));
}

/*
 * Enqueue styles on ADMIN
 * ----------------------------------------
 */
add_action('admin_enqueue_scripts', 'wptb_enqueue_styles_admin');

function wptb_enqueue_styles_admin()
{
    wp_enqueue_style('wptb-admin');
}

/*
 * Enqueue scripts on FRONT
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'wptb_enqueue_scripts');

function wptb_enqueue_scripts()
{
    wp_enqueue_script('wptb-front');
    
    wp_localize_script('wptb-front', 'wptbIndexVars', apply_filters('wptb_js_index_vars', [
        'ajaxurl' => admin_url('admin-ajax.php')
    ]));
}

/*
 * Enqueue styles on FRONT
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'wptb_enqueue_styles');

function wptb_enqueue_styles()
{
    wp_enqueue_style('wptb-front');
}
