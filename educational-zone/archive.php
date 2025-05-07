<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Educational Zone
 */

get_header();
?>

    <div id="skip-content" class="container">
        <div class="row">
            <div id="primary" class="content-area col-lg-9 col-lg-8">
                <main id="main" class="site-main module-border-wrap">
                    <div class="row">
                        <?php if (have_posts()) { ?>

                            <header class="page-header">
                                <?php
                                the_archive_title('<h2 class="page-title">', '</h2>');
                                the_archive_description('<div class="archive-description">', '</div>');
                                ?>
                            </header>

                            <?php /* Start the Loop */
                            while (have_posts()) :
                                the_post();
                                
                                get_template_part( 'template-parts/content',get_post_format());

                            endwhile; ?>
                                
                            <?php if( get_theme_mod('educational_zone_post_page_pagination',1) == 1){ 
                                the_posts_navigation();
                            }

                        }else {

                            get_template_part('template-parts/content', 'none');

                        } ?>
                    </div>
                </main>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php
get_sidebar();
get_footer();
