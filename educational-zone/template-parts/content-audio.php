<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Educational Zone
 */

$educational_zone_post_page_meta =  get_theme_mod( 'educational_zone_post_page_meta', 1 );

?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
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
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
          };
        };
      ?>
    </article>