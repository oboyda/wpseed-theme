<?php

/*
* Register Gutenberg blocks with ACF
* ----------------------------------------
*/

add_action('acf/init', 'tboot_register_blocks');

function tboot_register_blocks()
{
    if(function_exists('acf_register_block'))
    {
        /*
        * first-block
        * ------------------------------
        */
        acf_register_block([
            'name'				=> 'first-block',
            'title'				=> __('TBOOT First Block', 'tboot'),
            //'description'		=> __('Block description.', 'tboot'),
            'render_callback'	=> 'tboot_render_block_view',
            'category'			=> 'tboot-blocks',
            //'icon'				=> 'admin-comments'
            //'keywords'			=> [''],
            'view_args' => [],
            'mode' => 'auto'
        ]);
    }
}

/*
* Register callback wrapper function
* ----------------------------------------
*/
function tboot_render_block_view($block)
{
    $acf_prefix = 'acf/';
    $view = (strpos($block['name'], $acf_prefix) === 0) ? substr($block['name'], strlen($acf_prefix)) : $block['name'];
    $view_args = isset($block['view_args']) ? $block['view_args'] : [];
    $view_args['html_class'] = isset($block['className']) ? $block['className'] : '';

    echo tboot_get_view($view, $view_args);
}
