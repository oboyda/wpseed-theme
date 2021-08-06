<?php

namespace WPTB\Filter;

class View 
{
    public function __construct()
    {
        add_filter('wpseed_views_dir', __CLASS__ . '::filterViewsDir');
        add_filter('wpseed_views_namespace', __CLASS__ . '::filterViewsNamespace');
    }

    static function filterViewsDir()
    {
        return WPTB_DIR . '/src/views';
    }

    static function filterViewsNamespace()
    {
        return '\WPTB\View';
    }
}