<?php

/*
 * Load theme textdomain
 * ----------------------------------------
 */
add_action('after_setup_theme', 'tboot_load_textdomain');

function tboot_load_textdomain()
{
    //load_child_theme_textdomain('tboot', TBOOT_DIR . '/langs');
    load_theme_textdomain('tboot', TBOOT_DIR . '/langs');
}

/*
 * Theme support
 * ----------------------------------------
 */
add_action('after_setup_theme', 'tboot_add_theme_support');

function tboot_add_theme_support()
{
    //add_theme_support('automatic-feed-links');
    
    add_theme_support('title-tag');
    
    /*add_theme_support(
        'post-formats',
        array(
            'link',
            'aside',
            'gallery',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
        )
    );*/

    /*add_theme_support(
        'html5',
        array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
        )
    );*/
    
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(900, 600);

    add_theme_support(
        'custom-logo',
        array(
            'width'                => 300,
            'height'               => 100,
            'flex-width'           => true,
            'flex-height'          => true,
            'unlink-homepage-logo' => true
        )
    );

    add_theme_support('customize-selective-refresh-widgets');

    //add_theme_support('wp-block-styles');

    //add_theme_support('editor-styles');
    //add_editor_style($editor_stylesheet_path);
}

/*
 * Register menus
 * ----------------------------------------
 */
add_action('after_setup_theme', 'tboot_register_menus');

function tboot_register_menus()
{
    register_nav_menus(
        array(
            'top' => esc_html__('Top menu', 'tboot'),
            'primary' => esc_html__('Primary menu', 'tboot'),
            'footer'  => __('Footer menu', 'tboot')
        )
    );
}
