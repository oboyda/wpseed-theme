<header class="<?php echo $view->getHtmlClass(); ?>" data-view="<?php echo $view->getName(); ?>">
    <div class="header-inner">
        <div class="container">
            <div class="h-1 d-none d-lg-block">
                <nav class="nav-top d-none d-lg-block" role="navigation">
                    <?php
                    wp_nav_menu(
                        [
                            'theme_location'  => 'top',
                            'container_class' => 'menu-cont',
                            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                            'fallback_cb'     => false,
                            'depth' => 1
                        ]
                    );
                    ?>
                </nav>
            </div>
            <div class="h-2">
                <div class="row">
                    <div class="col-6 col-lg-4">
                        <?php if($view->has_logo_html()): ?>
                        <div class="site-logo">
                            <?php if(!is_front_page()): ?><a href="<?php echo home_url(); ?>"><?php endif; ?>
                            <?php echo $view->get_logo_html(); ?>
                            <?php if(!is_front_page()): ?></a><?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-6 col-lg-8">
                        <nav class="nav-primary d-none d-lg-block" role="navigation">
                            <?php
                            wp_nav_menu(
                                [
                                    'theme_location'  => 'primary',
                                    'container_class' => 'menu-cont',
                                    'link_before' => '<span class="item-name">',
                                    'link_after' => '<span class="item-border"></span></span>',
                                    // 'after' => '<span class="item-bg"></span>',
                                    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                    'fallback_cb'     => false,
                                    'depth' => 1
                                ]
                            );
                            ?>
                        </nav>
                        <div class="nav-toggle-cont d-lg-none text-end">
                            <button type="button" class="nav-toggle-btn"></button>
                        </div>
                        <div class="navs-mob-cont d-lg-none">
                            <div class="navs-cont">
                                <nav class="nav-top-mob" role="navigation">
                                    <?php
                                    wp_nav_menu(
                                        [
                                            'theme_location'  => 'top',
                                            'container_class' => 'menu-cont',
                                            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                            'fallback_cb'     => false,
                                            'depth' => 1
                                        ]
                                    );
                                    ?>
                                </nav>
                                <nav class="nav-primary-mob" role="navigation">
                                    <?php
                                    wp_nav_menu(
                                        [
                                            'theme_location'  => 'primary',
                                            'container_class' => 'menu-cont',
                                            'link_before' => '<span class="item-name">',
                                            'link_after' => '<span class="item-border"></span></span>',
                                            // 'after' => '<span class="item-bg"></span>',
                                            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                            'fallback_cb'     => false,
                                            'depth' => 1
                                        ]
                                    );
                                    ?>
                                </nav>
                            </div>
                            <div class="nav-close-area d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
