<?php

/*
 * Load theme textdomain
 * ----------------------------------------
 */
add_action('after_setup_theme', 'wptboot_load_textdomain');

function wptboot_load_textdomain()
{
    //load_child_theme_textdomain('wptboot', WPTBOOT_DIR . '/langs');
    load_theme_textdomain('wptboot', WPTBOOT_DIR . '/langs');
}

/*
 * Theme support
 * ----------------------------------------
 */
add_action('after_setup_theme', 'wptboot_add_theme_support');

function wptboot_add_theme_support()
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
add_action('after_setup_theme', 'wptboot_register_menus');

function wptboot_register_menus()
{
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary menu', 'wptboot'),
            'footer'  => __('Footer menu', 'wptboot')
        )
    );
}

/*
 * Register widgets
 * ----------------------------------------
 */
add_action('widgets_init', 'wptboot_register_widget_areas');

function wptboot_register_widget_areas()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Footer widgets', 'wptboot'),
            'id'            => 'footer-widgets',
            'description'   => esc_html__('Add widgets here to appear in your footer.', 'wptboot'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
