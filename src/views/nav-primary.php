<nav class="<?php echo $view->getClasses(); ?>" role="navigation">
    <?php
    wp_nav_menu(
        array(
            'theme_location'  => 'primary',
            'menu_class'      => 'nav-wrapper',
            'container_class' => 'primary-nav-container',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'fallback_cb'     => false
        )
    );
    ?>
</nav>
