<?php
/*
 * Register widgets
 * ----------------------------------------
 */
// add_action('widgets_init', 'tart_register_widget_areas');

function tart_register_widget_areas()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Footer widgets', 'tart'),
            'id'            => 'footer-widgets',
            'description'   => esc_html__('Add widgets here to appear in your footer.', 'tart'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
