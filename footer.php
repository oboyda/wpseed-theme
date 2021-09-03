			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<footer class="site-footer" role="contentinfo">
        
        <?php if(is_active_sidebar('footer-widgets')): ?>
            <div class="widgets">
                <?php dynamic_sidebar('footer-widgets'); ?>
            </div>
        <?php endif; ?>

		<?php if(has_nav_menu('footer')): ?>
			<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
						)
					);
					?>
				</ul>
			</nav>
		<?php endif; ?>
        
		<div class="site-info">
			<div class="site-name">
				<?php if (has_custom_logo()): ?>
					<div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php else : ?>
					<?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
						<?php if ( is_front_page() && ! is_paged() ) : ?>
							<?php bloginfo('name'); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
            
		</div><!-- .site-info -->
	</footer>

    <?php wp_footer(); ?>

</body>
</html>
