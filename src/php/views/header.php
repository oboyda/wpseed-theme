<header class="<?php echo $view->getHtmlClass(); ?>">

    <?php if (has_custom_logo()): ?>
        <div class="site-logo"><?php the_custom_logo(); ?></div>
    <?php endif; ?>

    <nav class="nav-primary" role="navigation">
        <?php
        wp_nav_menu(
            [
                'theme_location'  => 'primary',
                'menu_class'      => 'nav-wrapper',
                'container_class' => 'primary-nav-container',
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                'fallback_cb'     => false
            ]
        );
        ?>
    </nav>

</header>
