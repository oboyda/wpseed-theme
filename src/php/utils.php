<?php 

function tboot_get_view($view_name, $args=[], $echo=false)
{
    return wpseed_get_view($view_name, $args, $echo, TBOOT_DIR . '/src/php/View/html', '\TBOOT\View');
}

function tboot_print_view($view_name, $args=[])
{
    tboot_get_view($view_name, $args, true);
}

function tboot_get_mod_view($mod, $view_name, $args=[], $echo=false)
{
    return wpseed_get_view($view_name, $args, $echo, TBOOT_DIR . '/mods/' . $mod . '/View/html', '\TBOOT\\' . $mod . '\View');
}

function tboot_print_mod_view($mod, $view_name, $args=[])
{
    tboot_get_mod_view($mod, $view_name, $args, true);
}
