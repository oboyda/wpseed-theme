<header class="<?php echo $view->getClasses(); ?>">

    <?php if (has_custom_logo()): ?>
        <div class="site-logo"><?php the_custom_logo(); ?></div>
    <?php endif; ?>

    <?php wpseed_print_view('nav-primary'); ?>

</header>
