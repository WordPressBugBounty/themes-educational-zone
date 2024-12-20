<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Educational Zone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <hr>
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php educational_zone_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

	<?php educational_zone_post_thumbnail(); ?>

	<div class="entry-summary">
		<p><?php echo wp_trim_words( get_the_content(), esc_attr(get_theme_mod('educational_zone_post_page_excerpt_length', 30)) ); ?><?php echo esc_html(get_theme_mod('educational_zone_post_page_excerpt_suffix','[...]')); ?></p>
	</div>

	<footer class="entry-footer">
		<?php educational_zone_entry_footer(); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
