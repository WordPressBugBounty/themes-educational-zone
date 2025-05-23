<?php
/**
 * The blog posts index template file
 *
 * If the user has selected  your latest blog posts for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Educational Zone
 */

get_header();

$educational_zone_post_page_title =  get_theme_mod( 'educational_zone_post_page_title', 1 );
$educational_zone_post_page_meta =  get_theme_mod( 'educational_zone_post_page_meta', 1 );
$educational_zone_post_page_thumb = get_theme_mod( 'educational_zone_post_page_thumb', 1 );
$educational_zone_post_page_content =  get_theme_mod( 'educational_zone_post_page_content', 1 );
?>

    <div id="primary" class="content-area col-lg-9n col-md-8">
        <main id="main" class="site-main">
            <div class="card-columns row">
                <?php

                if (have_posts()) :

                while (have_posts()) :the_post(); ?>
                    <article class="col-lg-6" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="card module-border-wrap hvr-glow">
                            <?php if ($educational_zone_post_page_thumb == 1 ) {?>
                                <?php if(has_post_thumbnail()){
                                the_post_thumbnail();
                                } else{?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/slider.png" alt="" />
                              <?php } ?>
                            <?php }?>

                            

                            <div class="card-body">
                                <?php if ($educational_zone_post_page_title == 1 ) {?>
                                    <h3 class="entry-title card-title ">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_title() ?>
                                        </a>
                                    </h3><!-- .entry-tile -->
                                    <hr>
                                <?php }?>
                                
                                <?php if ($educational_zone_post_page_meta == 1 ) {?>
                                    <p class="entry-meta">
                                        <small><?php educational_zone_posted_on(); ?></small>
                                    </p><!-- .entry-meta -->
                                <?php }?>
                                <?php if ($educational_zone_post_page_content == 1 ) {?>
                                    <p class="entry-summary">
                                        <?php echo wp_trim_words( get_the_content(), esc_attr(get_theme_mod('educational_zone_post_page_excerpt_length', 30)) ); ?><?php echo esc_html(get_theme_mod('educational_zone_post_page_excerpt_suffix','[...]')); ?>
                                    </p><!-- .entry-summary -->
                                <?php }?>
                            </div>
                        </div>
                    </article>
                    <!-- #post -->
                <?php endwhile; // End of the loop.
                ?>
            </div>

            <div class="col-lg-12 my-5">
                <?php if( get_theme_mod('educational_zone_post_page_pagination',1) == 1){
                    the_posts_pagination(); 
                }?>

            </div>

            <?php endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
