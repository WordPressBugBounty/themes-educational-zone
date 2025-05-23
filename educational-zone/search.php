<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Educational Zone
 */

get_header();
?>

    <section id="primary" class="content-area col-lg-8 col-md-8">
        <main id="main" class="site-main card module-border-wrap mb-4">
            <div class="card-body">

                <?php if (have_posts()) { ?>

                    <header class="page-header">
                        <h4 class="page-title">
                            <?php
                            /* translators: %s: search query. */
                            printf(esc_html__('Search Results for: %s', 'educational-zone'), '<span>' . get_search_query() . '</span>');
                            ?>
                        </h4>
                    </header><!-- .page-header -->

                    <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'template-parts/content',get_post_format());

                    endwhile;

                    if( get_theme_mod('educational_zone_post_page_pagination',1) == 1){ 
                        the_posts_navigation();
                    }

                }else {

                    get_template_part('template-parts/content', 'none');

                } ?>
            </div>
        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_sidebar();
get_footer();
