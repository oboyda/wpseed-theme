<footer id="footer" class="<?php echo $view->getHtmlClass(); ?>">

    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-6">
                            <?php 
                            if(is_active_sidebar('footer-widgets-1')):
                                dynamic_sidebar('footer-widgets-1');
                            endif;
                            ?>
                        </div>
                        <div class="col-6">
                            <?php 
                            if(is_active_sidebar('footer-widgets-2')):
                                dynamic_sidebar('footer-widgets-2');
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-6">
                            <?php 
                            if(is_active_sidebar('footer-widgets-3')):
                                dynamic_sidebar('footer-widgets-3');
                            endif;
                            ?>
                        </div>
                        <div class="col-12 col-lg-6">
                            <?php 
                            if(is_active_sidebar('footer-widgets-4')):
                                dynamic_sidebar('footer-widgets-4');
                            endif;
                            ?>

                            <?php if($view->has_logo_html()): ?>
                            <div class="site-logo">
                                <?php if(!is_front_page()): ?><a href="<?php echo home_url(); ?>"><?php endif; ?>
                                <?php echo $view->get_logo_html(); ?>
                                <?php if(!is_front_page()): ?></a><?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-info">
        <?php echo $view->getImplodedFooterInfo(); ?>
    </div>


</footer>