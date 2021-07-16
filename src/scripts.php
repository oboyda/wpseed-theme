<?php

/*
 * Register scripts
 * ----------------------------------------
 */
add_action('init', 'wptb_register_scripts');

function wptb_register_scripts()
{
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js', [], null);
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css', [], null);
    
    wp_register_script('vue', 'https://unpkg.com/vue@next', [], null);
    wp_register_script('axios', 'https://unpkg.com/axios/dist/axios.min.js', [], null);
    wp_register_script('qs', 'https://unpkg.com/qs/dist/qs.js', [], null);
    
    wp_register_style('wptb-view', WPTB_INDEX . '/css/view.css', [], WPTB_VER);
}

/*
 * Enqueue scripts on admin
 * ----------------------------------------
 */
add_action('admin_enqueue_scripts', 'wptb_enqueue_scripts_admin');

function wptb_enqueue_scripts_admin()
{
    //wp_enqueue_style('bootstrap');
}

/*
 * Enqueue scripts on front
 * ----------------------------------------
 */
add_action('wp_head', function(){
    ?>
    <script type="text/javascript">
        const ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <?php
});

add_action('wp_enqueue_scripts', 'wptb_enqueue_scripts');

function wptb_enqueue_scripts()
{
    wp_enqueue_script('bootstrap');
    wp_enqueue_style('bootstrap');
    
    wp_enqueue_script('jquery');
    
    wp_enqueue_script('vue');
    wp_enqueue_script('axios');
    //wp_enqueue_script('qs');
    
    wp_localize_script('vue', 'vueVars', apply_filters('vue_vars', []));
    
    wp_enqueue_style('wptb-view');
}
