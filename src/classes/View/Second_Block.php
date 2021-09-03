<?php

namespace WPTBOOT\View;

class Second_Block extends \WPSEED\View 
{
    public function __construct($args)
    {
        parent::__construct($args, [
            'default_arg1' => 'foo',
            'default_arg2' => 'bar'
        ]);
    }
    
    
}
