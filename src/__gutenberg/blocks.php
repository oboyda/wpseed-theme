<?php

/*
 * Register block categories
 * ----------------------------------------
 */
add_filter('block_categories', 'wptboot_blocks_register_category');

function wptboot_blocks_register_category($categories)
{
	return array_merge(
		$categories,
        [
            [
				'slug' => 'wptboot-blocks',
				'title' => wp_get_theme()->get('Theme Name')
            ]
        ]
	);
}

/*
 * Register blocks
 * ----------------------------------------
 */
add_action('init', 'wptboot_blocks_register');

function wptboot_blocks_register()
{
    register_block_type('wptboot/user-login-form', [
        'api_version' => 2,
        'render_callback' => 'wptboot_blocks_callback',
        'attributes' => [
            'view' => ['default' => 'user-login-form', 'type' => 'string']
        ]
    ]);
    
    register_block_type('wptboot/user-register-form', [
        'api_version' => 2,
        'render_callback' => 'wptboot_blocks_callback',
        'attributes' => [
            'view' => ['default' => 'user-register-form', 'type' => 'string']
        ]
    ]);
}

function wptboot_blocks_callback($attributes, $content)
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
add_action('init', 'wptboot_blocks_register_scripts');

function wptboot_blocks_register_scripts()
{
    $asset_file = WPTBOOT_DIR . '/build/index.asset.php';
    
    if(!file_exists($asset_file)) return;
    
    $asset = require $asset_file;
    
    wp_register_script(
        'wptboot-index',
        WPTBOOT_INDEX . '/build/index.js',
        $asset['dependencies'],
        $asset['version']
    );

    wp_register_style(
        'wptboot-blocks-edit',
        WPTBOOT_INDEX . '/assets/css/blocks-edit.css',
        [],
        WPTBOOT_VERSION
    );

    wp_register_style(
        'wptboot-blocks-save',
        WPTBOOT_INDEX . '/assets/css/blocks-save.css',
        [],
        WPTBOOT_VERSION
    );
}

/*
 * Enqueue blocks scripts on the editor
 * ----------------------------------------
 */
add_action('enqueue_block_editor_assets', 'wptboot_blocks_enqueue_scripts_edit');

function wptboot_blocks_enqueue_scripts_edit()
{
    wp_enqueue_script('wptboot-index');
    wp_enqueue_style('wptboot-blocks-edit');
    wp_enqueue_style('wptboot-blocks-save');
}

/*
 * Enqueue blocks scripts on the front
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'wptboot_blocks_enqueue_scripts_save');

function wptboot_blocks_enqueue_scripts_save()
{
    wp_enqueue_script('wptboot-index');
    wp_enqueue_style('wptboot-blocks-save');
}

/*
 * Add global config JS var
 * ----------------------------------------
 */
add_action('init', 'wptboot_blocks_add_configs');

function wptboot_blocks_add_configs()
{
    wp_localize_script(
        'wptboot-index', 
        'wptbootIndexConfigs', [
            'common' => [
                'ajax_url' => admin_url('admin-ajax.php')
            ]
        ]
    );
}
