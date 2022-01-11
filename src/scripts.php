<?php

/*
 * Register scripts
 * ----------------------------------------
 */
add_action('init', 'wptboot_register_scripts');

function wptboot_register_scripts()
{
    //wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js', [], null);
    //wp_register_script('vue', 'https://unpkg.com/vue@next', [], null);
    //wp_register_script('axios', 'https://unpkg.com/axios/dist/axios.min.js', [], null);
    //wp_register_script('qs', 'https://unpkg.com/qs/dist/qs.js', [], null);
    
    wp_register_script('wptboot-views', WPTBOOT_INDEX . '/assets/js/views.js', [], WPTBOOT_VERSION);
    wp_register_script('wptboot-admin', WPTBOOT_INDEX . '/assets/js/admin.js', [], WPTBOOT_VERSION);
    wp_register_script('wptboot-front', WPTBOOT_INDEX . '/assets/js/front.js', [], WPTBOOT_VERSION);
}

/*
 * Register styles
 * ----------------------------------------
 */
add_action('init', 'wptboot_register_styles');

function wptboot_register_styles()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css', [], null);
    wp_register_style('wptboot-views', WPTBOOT_INDEX . '/assets/css/views.css', [], WPTBOOT_VERSION);
    wp_register_style('wptboot-admin', WPTBOOT_INDEX . '/assets/css/admin.css', [], WPTBOOT_VERSION);
    wp_register_style('wptboot-front', WPTBOOT_INDEX . '/assets/css/front.css', [], WPTBOOT_VERSION);
    wp_register_style('wptboot-style', WPTBOOT_INDEX . '/style.css', [], WPTBOOT_VERSION);
    
    /*wp_register_style('child-style', 
        get_stylesheet_uri(), 
        [], # ['parent-style'],
        WPTBOOT_VERSION // this only works if you have Version in the style header
    );*/
}

/*
 * Enqueue scripts on ADMIN
 * ----------------------------------------
 */
//add_action('admin_enqueue_scripts', 'wptboot_enqueue_scripts_admin');

function wptboot_enqueue_scripts_admin()
{
    //wp_enqueue_script('wptboot-admin');
    
    wp_localize_script('wptboot-admin', 'wptbootAdminVars', apply_filters('wptboot_admin_vars', []));
}

/*
 * Enqueue styles on ADMIN
 * ----------------------------------------
 */
add_action('admin_enqueue_scripts', 'wptboot_enqueue_styles_admin');

function wptboot_enqueue_styles_admin()
{
    //wp_enqueue_style('wptboot-admin');
}

/*
 * Enqueue scripts on FRONT
 * ----------------------------------------
 */

add_action('wp_enqueue_scripts', 'wptboot_enqueue_scripts');

function wptboot_enqueue_scripts()
{
    //wp_enqueue_script('bootstrap');
    //wp_enqueue_script('jquery');
    //wp_enqueue_script('vue');
    //wp_enqueue_script('axios');
    //wp_enqueue_script('qs');
    //wp_enqueue_script('wptboot-front');
    
    wp_localize_script('wptboot-front', 'wptbootFrontVars', apply_filters('wptboot_front_vars', [
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
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('wptboot-style');
    //wp_enqueue_style('wptboot-front');
    wp_enqueue_style('wptboot-views');
    //wp_enqueue_style('child-style');
}
