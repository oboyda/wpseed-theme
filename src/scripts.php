<?php

/*
 * Register scripts
 * ----------------------------------------
 */
add_action('init', 'wptb_register_scripts');

function wptb_register_scripts()
{
    //wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js', [], null);
    //wp_register_script('vue', 'https://unpkg.com/vue@next', [], null);
    //wp_register_script('axios', 'https://unpkg.com/axios/dist/axios.min.js', [], null);
    //wp_register_script('qs', 'https://unpkg.com/qs/dist/qs.js', [], null);
}

/*
 * Register styles
 * ----------------------------------------
 */
add_action('init', 'wptb_register_styles');

function wptb_register_styles()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css', [], null);
    wp_register_style('wptb-views', WPTB_INDEX . '/css/views.css', [], WPTB_VERSION);
    wp_register_style('child-style', 
        get_stylesheet_uri(), 
        [], # ['parent-style'],
        WPTB_VERSION // this only works if you have Version in the style header
    );
}

/*
 * Enqueue scripts on admin
 * ----------------------------------------
 */
//add_action('admin_enqueue_scripts', 'wptb_enqueue_scripts_admin');

function wptb_enqueue_scripts_admin()
{
    //...
}

/*
 * Enqueue styles on admin
 * ----------------------------------------
 */
//add_action('admin_enqueue_scripts', 'wptb_enqueue_styles_admin');

function wptb_enqueue_styles_admin()
{
    //...
}

/*
 * Print ajaxurl global on front
 * ----------------------------------------
 */
//add_action('wp_head', 'wptb_print_ajax_url_global');

function wptb_print_ajax_url_global()
{
    ?>
    <script type="text/javascript">
        const ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <?php
}

/*
 * Enqueue scripts on front
 * ----------------------------------------
 */

add_action('wp_enqueue_scripts', 'wptb_enqueue_scripts');

function wptb_enqueue_scripts()
{
    //wp_enqueue_script('bootstrap');
    //wp_enqueue_script('jquery');
    //wp_enqueue_script('vue');
    //wp_enqueue_script('axios');
    //wp_enqueue_script('qs');
    //wp_localize_script('vue', 'vueVars', apply_filters('vue_vars', []));
}

/*
 * Enqueue styles on front
 * ----------------------------------------
 */

add_action('wp_enqueue_scripts', 'wptb_enqueue_styles');

function wptb_enqueue_styles()
{
    //wp_enqueue_style('bootstrap');
    wp_enqueue_style('wptb-views');
    wp_enqueue_style('child-style');
}
