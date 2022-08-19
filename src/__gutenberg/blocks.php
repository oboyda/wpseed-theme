<?php

/*
 * Register block categories
 * ----------------------------------------
 */
add_filter('block_categories', 'tart_blocks_register_category');

function tart_blocks_register_category($categories)
{
	return array_merge(
		$categories,
        [
            [
				'slug' => 'tart-blocks',
				'title' => wp_get_theme()->get('Theme Name')
            ]
        ]
	);
}

/*
 * Register blocks
 * ----------------------------------------
 */
add_action('init', 'tart_blocks_register');

function tart_blocks_register()
{
    register_block_type('tart/user-login-form', [
        'api_version' => 2,
        'render_callback' => 'tart_blocks_callback',
        'attributes' => [
            'view' => ['default' => 'user-login-form', 'type' => 'string']
        ]
    ]);
    
    register_block_type('tart/user-register-form', [
        'api_version' => 2,
        'render_callback' => 'tart_blocks_callback',
        'attributes' => [
            'view' => ['default' => 'user-register-form', 'type' => 'string']
        ]
    ]);
}

function tart_blocks_callback($attributes, $content)
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
add_action('init', 'tart_blocks_register_scripts');

function tart_blocks_register_scripts()
{
    $asset_file = TART_DIR . '/build/index.asset.php';
    
    if(!file_exists($asset_file)) return;
    
    $asset = require $asset_file;
    
    wp_register_script(
        'tart-index',
        TART_INDEX . '/build/index.js',
        $asset['dependencies'],
        $asset['version']
    );

    wp_register_style(
        'tart-blocks-edit',
        TART_INDEX . '/assets/css/blocks-edit.css',
        [],
        TART_VERSION
    );

    wp_register_style(
        'tart-blocks-save',
        TART_INDEX . '/assets/css/blocks-save.css',
        [],
        TART_VERSION
    );
}

/*
 * Enqueue blocks scripts on the editor
 * ----------------------------------------
 */
add_action('enqueue_block_editor_assets', 'tart_blocks_enqueue_scripts_edit');

function tart_blocks_enqueue_scripts_edit()
{
    wp_enqueue_script('tart-index');
    wp_enqueue_style('tart-blocks-edit');
    wp_enqueue_style('tart-blocks-save');
}

/*
 * Enqueue blocks scripts on the front
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'tart_blocks_enqueue_scripts_save');

function tart_blocks_enqueue_scripts_save()
{
    wp_enqueue_script('tart-index');
    wp_enqueue_style('tart-blocks-save');
}

/*
 * Add global config JS var
 * ----------------------------------------
 */
add_action('init', 'tart_blocks_add_configs');

function tart_blocks_add_configs()
{
    wp_localize_script(
        'tart-index', 
        'tartIndexConfigs', [
            'common' => [
                'ajax_url' => admin_url('admin-ajax.php')
            ]
        ]
    );
}
