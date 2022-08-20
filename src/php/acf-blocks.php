<?php

/*
* Register Gutenberg blocks with ACF
* ----------------------------------------
*/

add_action('acf/init', 'wptboot_register_blocks');

function wptboot_register_blocks()
{
    if(function_exists('acf_register_block'))
    {
        /*
        * first-block
        * ------------------------------
        */
        acf_register_block([
            'name'				=> 'first-block',
            'title'				=> __('WPTBOOT First Block', 'wptboot'),
            //'description'		=> __('Block description.', 'wptboot'),
            'render_callback'	=> 'wptboot_render_block_view',
            'category'			=> 'wptboot-blocks',
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
function wptboot_render_block_view($block)
{
    $acf_prefix = 'acf/';
    $view = (strpos($block['name'], $acf_prefix) === 0) ? substr($block['name'], strlen($acf_prefix)) : $block['name'];
    $view_args = isset($block['view_args']) ? $block['view_args'] : [];
    $view_args['html_class'] = isset($block['className']) ? $block['className'] : '';

    echo wptboot_get_view($view, $view_args);
}
