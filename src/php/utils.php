<?php 

function wptboot_get_view($view_name, $args=[], $echo=false)
{
    return wpseed_get_view($view_name, $args, $echo, WPTBOOT_DIR . '/src/php/View/html', '\WPTBOOT\View');
}

function wptboot_print_view($view_name, $args=[])
{
    wptboot_get_view($view_name, $args, true);
}

function wptboot_get_mod_view($mod, $view_name, $args=[], $echo=false)
{
    return wpseed_get_view($view_name, $args, $echo, WPTBOOT_DIR . '/mods/' . $mod . '/View/html', '\WPTBOOT\\' . $mod . '\View');
}

function wptboot_print_mod_view($mod, $view_name, $args=[])
{
    wptboot_get_mod_view($mod, $view_name, $args, true);
}
