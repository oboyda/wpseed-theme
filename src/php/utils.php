<?php 

function tart_get_view($view_name, $args=[], $echo=false)
{
    return wpseed_get_view($view_name, $args, $echo, TART_DIR . '/src/php/views', '\TART\View');
}

function tart_print_view($view_name, $args=[])
{
    tart_get_view($view_name, $args, true);
}
