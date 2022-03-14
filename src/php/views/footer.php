<footer class="<?php echo $view->getHtmlClass(); ?>">

    <?php if(is_active_sidebar('footer-widgets')): ?>
        <div class="widgets">
            <?php dynamic_sidebar('footer-widgets'); ?>
        </div>
    <?php endif; ?>

    <div class="site-info">
        <?php if (has_custom_logo()): ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
        <?php else: ?>
            <?php if (get_bloginfo('name') && get_theme_mod('display_title_and_tagline', true )): ?>
                <?php if (is_front_page() && !is_paged()) : ?>
                    <?php bloginfo('name'); ?>
                <?php else: ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</footer>