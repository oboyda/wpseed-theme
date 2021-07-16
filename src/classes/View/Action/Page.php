<?php

namespace WPTB\View\Action;

class Page 
{
    public function __construct()
    {
        add_action('wp_footer', __CLASS__ . '::firstActionMethos');
    }
    
    /* 
     * Method description
     */
    public function firstActionMethos()
    {
        //Do something
    }
}