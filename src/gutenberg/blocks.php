<?php

/*
 * Register block categories
 * ----------------------------------------
 */
add_filter('block_categories', 'wptb_blocks_register_category');

function wptb_blocks_register_category($categories)
{
	return array_merge(
		$categories,
        [
            [
				'slug' => 'wptb-blocks',
				'title' => wp_get_theme()->get('Theme Name')
            ]
        ]
	);
}

/*
 * Register blocks
 * ----------------------------------------
 */
add_action('init', 'wptb_blocks_register');

function wptb_blocks_register()
{
    register_block_type('wptb/user-login-form', [
        'api_version' => 2,
        'render_callback' => 'wptb_blocks_callback',
        'attributes' => [
            'view' => ['default' => 'user-login-form', 'type' => 'string']
        ]
    ]);
    
    register_block_type('wptb/user-register-form', [
        'api_version' => 2,
        'render_callback' => 'wptb_blocks_callback',
        'attributes' => [
            'view' => ['default' => 'user-register-form', 'type' => 'string']
        ]
    ]);
}

function wptb_blocks_callback($attributes, $content)
{
    if(isset($attributes['view']))
    {
        $view = $attributes['view'];
        $args = $attributes;
        unset($args['view']);
        
        return wpseed_get_view($view, $args);
    }
}

/*
 * Register blocks scripts
 * ----------------------------------------
 */
add_action('init', 'wptb_blocks_register_scripts');

function wptb_blocks_register_scripts()
{
    $asset_file = WPTB_DIR . '/build/index.asset.php';
    
    if(!file_exists($asset_file)) return;
    
    $asset = require $asset_file;
    
    wp_register_script(
        'wptb-index',
        WPTB_INDEX . '/build/index.js',
        $asset['dependencies'],
        $asset['version']
    );

    wp_register_style(
        'wptb-blocks-edit',
        WPTB_INDEX . '/css/blocks-edit.css',
        [],
        WPTB_VERSION
    );

    wp_register_style(
        'wptb-blocks-save',
        WPTB_INDEX . '/css/blocks-save.css',
        [],
        WPTB_VERSION
    );
}

/*
 * Enqueue blocks scripts on the editor
 * ----------------------------------------
 */
add_action('enqueue_block_editor_assets', 'wptb_blocks_enqueue_scripts_edit');

function wptb_blocks_enqueue_scripts_edit()
{
    wp_enqueue_script('wptb-index');
    //wp_enqueue_style('wptb-blocks-edit');
    //wp_enqueue_style('wptb-blocks-save');
}

/*
 * Enqueue blocks scripts on the front
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'wptb_blocks_enqueue_scripts_save');

function wptb_blocks_enqueue_scripts_save()
{
    wp_enqueue_script('wptb-index');
    //wp_enqueue_style('wptb-blocks-save');
}

/*
 * Add global config JS var
 * ----------------------------------------
 */
//add_action('init', 'wptb_blocks_add_configs');

function wptb_blocks_add_configs()
{
    wp_localize_script(
        'wptb-index', 
        'wptbIndexConfigs', [
            'common' => [
                'ajax_url' => admin_url('admin-ajax.php')
            ]
        ]
    );
}
