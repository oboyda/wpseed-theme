<?php 

function wptboot_get_view($view_name, $args=[], $echo=false)
{
    return wpseed_get_view($view_name, $args, $echo, WPTBOOT_DIR . '/src/php/views', '\WPTBOOT\View');
}

function wptboot_print_view($view_name, $args=[])
{
    wptboot_get_view($view_name, $args, true);
}
