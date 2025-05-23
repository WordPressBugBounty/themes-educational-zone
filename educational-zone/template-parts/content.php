<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Educational Zone
 */

$educational_zone_post_page_meta =  get_theme_mod( 'educational_zone_post_page_meta', 1 );
$educational_zone_post_page_content =  get_theme_mod( 'educational_zone_post_page_content', 1 );
?>
<div class="col-lg-6 col-md-6 col-sm-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>

        <header class="entry-header">
            <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');?>
            <hr>
            <?php if ($educational_zone_post_page_meta == 1 ) {?>
                <?php if ('post' === get_post_type()) : ?>
                    
                    <div class="entry-meta">
                        <?php
                        educational_zone_posted_on();
                        ?>
                    </div>
                    
                <?php endif; ?>
            <?php }?>
        </header>


        <?php educational_zone_post_thumbnail(); ?>

        <?php if ($educational_zone_post_page_content == 1 ) {?>
            <div class="entry-summary">
                <p><?php echo wp_trim_words( get_the_content(), esc_attr(get_theme_mod('educational_zone_post_page_excerpt_length', 30)) ); ?><?php echo esc_html(get_theme_mod('educational_zone_post_page_excerpt_suffix','[...]')); ?></p>
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'educational-zone'),
                    'after' => '</div>',
                ));
                ?>
            </div>
        <?php }?>

        <footer class="entry-footer">
            <?php educational_zone_entry_footer(); ?>
        </footer>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>