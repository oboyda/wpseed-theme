<?php

/*
 * Register block categories
 * ----------------------------------------
 */
add_filter('block_categories', 'tboot_blocks_register_category');

function tboot_blocks_register_category($categories)
{
	return array_merge(
		$categories,
        [
            [
				'slug' => 'tboot-blocks',
				'title' => wp_get_theme()->get('Theme Name')
            ]
        ]
	);
}

/*
 * Register blocks
 * ----------------------------------------
 */
add_action('init', 'tboot_blocks_register');

function tboot_blocks_register()
{
    register_block_type('tboot/user-login-form', [
        'api_version' => 2,
        'render_callback' => 'tboot_blocks_callback',
        'attributes' => [
            'view' => ['default' => 'user-login-form', 'type' => 'string']
        ]
    ]);
    
    register_block_type('tboot/user-register-form', [
        'api_version' => 2,
        'render_callback' => 'tboot_blocks_callback',
        'attributes' => [
            'view' => ['default' => 'user-register-form', 'type' => 'string']
        ]
    ]);
}

function tboot_blocks_callback($attributes, $content)
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
add_action('init', 'tboot_blocks_register_scripts');

function tboot_blocks_register_scripts()
{
    $asset_file = TBOOT_DIR . '/build/index.asset.php';
    
    if(!file_exists($asset_file)) return;
    
    $asset = require $asset_file;
    
    wp_register_script(
        'tboot-index',
        TBOOT_INDEX . '/build/index.js',
        $asset['dependencies'],
        $asset['version']
    );

    wp_register_style(
        'tboot-blocks-edit',
        TBOOT_INDEX . '/assets/css/blocks-edit.css',
        [],
        TBOOT_VERSION
    );

    wp_register_style(
        'tboot-blocks-save',
        TBOOT_INDEX . '/assets/css/blocks-save.css',
        [],
        TBOOT_VERSION
    );
}

/*
 * Enqueue blocks scripts on the editor
 * ----------------------------------------
 */
add_action('enqueue_block_editor_assets', 'tboot_blocks_enqueue_scripts_edit');

function tboot_blocks_enqueue_scripts_edit()
{
    wp_enqueue_script('tboot-index');
    wp_enqueue_style('tboot-blocks-edit');
    wp_enqueue_style('tboot-blocks-save');
}

/*
 * Enqueue blocks scripts on the front
 * ----------------------------------------
 */
add_action('wp_enqueue_scripts', 'tboot_blocks_enqueue_scripts_save');

function tboot_blocks_enqueue_scripts_save()
{
    wp_enqueue_script('tboot-index');
    wp_enqueue_style('tboot-blocks-save');
}

/*
 * Add global config JS var
 * ----------------------------------------
 */
add_action('init', 'tboot_blocks_add_configs');

function tboot_blocks_add_configs()
{
    wp_localize_script(
        'tboot-index', 
        'tbootIndexConfigs', [
            'common' => [
                'ajax_url' => admin_url('admin-ajax.php')
            ]
        ]
    );
}
