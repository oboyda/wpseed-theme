<?php

namespace WPTB\View;

class First_Block extends \WPSEED\View 
{
    public function __construct($args)
    {
        parent::__construct($args, [
            'default_arg1' => 'foo',
            'default_arg2' => 'bar'
        ]);
    }
    
    
}
