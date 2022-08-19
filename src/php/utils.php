<?php 

function wptb_get_view($view_name, $args=[], $echo=false)
{
    return wpseed_get_view($view_name, $args, $echo, WPTB_DIR . '/src/php/views', '\WPTB\View');
}

function wptb_print_view($view_name, $args=[])
{
    wptb_get_view($view_name, $args, true);
}
