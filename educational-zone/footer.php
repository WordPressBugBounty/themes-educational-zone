<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Educational Zone
 */

?>
				</div>
			</div>
		</div>
		<footer id="colophon" class="site-footer border-top">
		    <div class="container">
		    	<div class="footer-column">
			    	<div class="row">
				        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
				          	<?php if (is_active_sidebar('educational-zone-footer1')) : ?>
		                        <?php dynamic_sidebar('educational-zone-footer1'); ?>
		                    <?php else : ?>
		                        <aside id="search" class="widget" role="complementary" aria-label="firstsidebar">
		                            <h5 class="widget-title"><?php esc_html_e( 'About Us', 'educational-zone' ); ?></h5>
		                            <div class="textwidget">
		                            	<p><?php esc_html_e( 'Nam malesuada nulla nisi, ut faucibus magna congue nec. Ut libero tortor, tempus at auctor in, molestie at nisi. In enim ligula, consequat eu feugiat a.', 'educational-zone' ); ?></p>
		                            </div>
		                        </aside>
		                    <?php endif; ?>
				        </div>
				        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
				            <?php if (is_active_sidebar('educational-zone-footer2')) : ?>
		                        <?php dynamic_sidebar('educational-zone-footer2'); ?>
		                    <?php else : ?>
		                        <aside id="pages" class="widget">
		                            <h5 class="widget-title"><?php esc_html_e( 'Useful Links', 'educational-zone' ); ?></h5>
		                            <ul class="mt-4">
		                            	<li><?php esc_html_e( 'Home', 'educational-zone' ); ?></li>
		                            	<li><?php esc_html_e( 'services', 'educational-zone' ); ?></li>
		                            	<li><?php esc_html_e( 'Reviews', 'educational-zone' ); ?></li>
		                            	<li><?php esc_html_e( 'About Us', 'educational-zone' ); ?></li>
		                            </ul>
		                        </aside>
		                    <?php endif; ?>
				        </div>
				        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
				            <?php if (is_active_sidebar('educational-zone-footer3')) : ?>
		                        <?php dynamic_sidebar('educational-zone-footer3'); ?>
		                    <?php else : ?>
		                        <aside id="pages" class="widget">
		                            <h5 class="widget-title"><?php esc_html_e( 'Information', 'educational-zone' ); ?></h5>
		                            <ul class="mt-4">
		                            	<li><?php esc_html_e( 'FAQ', 'educational-zone' ); ?></li>
		                            	<li><?php esc_html_e( 'Site Maps', 'educational-zone' ); ?></li>
		                            	<li><?php esc_html_e( 'Privacy Policy', 'educational-zone' ); ?></li>
		                            	<li><?php esc_html_e( 'Contact Us', 'educational-zone' ); ?></li>
		                            </ul>
		                        </aside>
		                    <?php endif; ?>
				        </div>
				        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
				            <?php if (is_active_sidebar('educational-zone-footer4')) : ?>
		                        <?php dynamic_sidebar('educational-zone-footer4'); ?>
		                    <?php else : ?>
		                        <aside id="pages" class="widget">
		                            <h5 class="widget-title"><?php esc_html_e( 'Get In Touch', 'educational-zone' ); ?></h5>
		                            <ul class="mt-4">
		                            	<li><?php esc_html_e( 'Via Carlo Montù 78', 'educational-zone' ); ?><br><?php esc_html_e( '22021 Bellagio CO, Italy', 'educational-zone' ); ?></li>
		                            	<li><?php esc_html_e( '+11 6254 7855', 'educational-zone' ); ?></li>
		                            	<li><?php esc_html_e( 'support@example.com', 'educational-zone' ); ?></li>
		                            </ul>
		                        </aside>
		                    <?php endif; ?>
				        </div>
			      	</div>
			    </div>
			</div>
		    <?php if (get_theme_mod('educational_zone_show_hide_copyright', true)) {?>
		    	<div class="footer_info">
					<div class="container">
				    	<div class="row">
				    		<div class="col-lg-5 col-md-5 col-12 align-self-lg-center">
								<?php if ( has_nav_menu( 'footer' ) ): ?>
						            <nav class="navbar footer-menu">
										<?php
											wp_nav_menu( array(
												'theme_location' => 'footer',
												'container'      => 'div',
												'container_id'   => 'main-nav',
												'menu_id'        => false,
												'depth'          => 1,
											) );
										?>
						            </nav>
								<?php endif ?>
							</div>
					        <div class="site-info col-lg-7 col-md-7 col-12 align-self-lg-center">
					            <div class="footer-menu-left">
					            	<?php if(! get_theme_mod('educational_zone_footer_text_setting') != ''){ ?>
									    <a href="<?php echo esc_url( 'https://wordpress.org/'); ?>">
											<?php
											/* translators: %s: CMS name, i.e. WordPress. */
											printf( esc_html__( 'Proudly powered by %s', 'educational-zone' ), 'WordPress' );
											?>
									    </a>
									    <span class="sep me-1"> | </span>
									    <span>
									    	<a target="_blank" href="<?php echo esc_url('https://www.themagnifico.net/products/free-education-wordpress-theme'); ?>">
									           	<?php
									            	/* translators: 1: Photography WordPress Theme,  */
									            	printf( esc_html__( ' %1$s', 'educational-zone' ),'Educational WordPress Theme' );
									            ?>
								        	</a>
									        <?php
									        	/* translators: 1: TheMagnifico. */
									        	printf( esc_html__( 'by %1$s.', 'educational-zone' ),'TheMagnifico'  );
									        ?>
									    </span>
									<?php }?>
									<?php echo esc_html(get_theme_mod('educational_zone_footer_text_setting','')); ?>
					            </div>
					        </div>
					    </div>
					</div>
				</div>
		    <?php } ?>
		  	<?php if(get_theme_mod('educational_zone_scroll_hide','')){ ?>
		       <a id="button"><?php esc_html_e('TOP','educational-zone'); ?></a>
		  	<?php } ?>
		</footer>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
