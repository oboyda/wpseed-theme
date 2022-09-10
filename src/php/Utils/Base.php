<?php

namespace WPTBOOT\Utils;

class Base extends \WPPBOOT\Utils\Base 
{
    static function parsePhoneTel($num_str)
    {
        $tel = '';
        if($num_str)
        {
            $tel = str_replace([' ', '-'], '', $num_str);
        }
        return $tel;
    }

    static function parsePostBlocks($post)
    {
        $content = '';

        $_post = is_int($post) ? get_post($post) : $post;
    
        if(is_a($_post, 'WP_Post') && $_post->post_content)
        {
            $blocks = parse_blocks($_post->post_content);
            foreach($blocks as $block)
            {
                $content .= render_block($block);
            }
        }

        return $content;
    }
}
