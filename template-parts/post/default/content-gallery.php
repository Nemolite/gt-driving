<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bikes2ride
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>

	<?php $utility       = bikes2ride_utility()->utility;
	$blog_featured_image = get_theme_mod( 'blog_featured_image', bikes2ride_theme()->customizer->get_default( 'blog_featured_image' ) );
	?>

	<?php if ( 'small' === $blog_featured_image ) : ?>
		<figure class="post-thumbnail">
			<?php bikes2ride_post_formats_gallery(); ?>
		</figure><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="post-list__item-content">
		<?php if ( 'small' === $blog_featured_image ) :
			get_template_part( 'template-parts/content-entry-meta-loop' );
		endif; ?>

		<?php if ( 'small' !== $blog_featured_image ) : ?>
			<figure class="post-thumbnail">
				<?php bikes2ride_post_formats_gallery(); ?>
			</figure><!-- .post-thumbnail -->
		<?php endif; ?>

		<header class="entry-header">
			<?php bikes2ride_sticky_label(); ?>

			<?php $title_html = ( is_single() ) ? '<h3 %1$s>%4$s</h3>' : '<h4 %1$s><a href="%2$s" rel="bookmark">%4$s</a></h4>';

			$utility->attributes->get_title( array(
				'class' => 'entry-title',
				'html'  => $title_html,
				'echo'  => true,
			) );
			?>
		</header><!-- .entry-header -->

		<?php $date_visible = bikes2ride_is_meta_visible( 'blog_post_publish_date', 'loop' );

		$utility->meta_data->get_date( array(
			'visible' => $date_visible,
			'html'    => '<span class="post__date">%1$s<a href="%2$s" %3$s %4$s ><time datetime="%5$s">%6$s%7$s</time></a></span>',
			'class'   => 'post__date-link',
			'echo'    => true,
		) );
		?>

		<div class="entry-content">
			<?php $blog_content = get_theme_mod( 'blog_posts_content', bikes2ride_theme()->customizer->get_default( 'blog_posts_content' ) );
			$length             = ( 'full' === $blog_content ) ? -1 : 55;
			$content_visible    = ( 'none' !== $blog_content ) ? true : false;
			$content_type       = ( 'full' !== $blog_content ) ? 'post_excerpt' : 'post_content';

			$utility->attributes->get_content( array(
				'visible'      => $content_visible,
				'length'       => $length,
				'content_type' => $content_type,
				'echo'         => true,
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php if ( 'small' !== $blog_featured_image ) :
				get_template_part( 'template-parts/content-entry-meta-loop' );
			endif; ?>

			<?php bikes2ride_share_buttons( 'loop' ); ?>

			<?php $btn_text = get_theme_mod( 'blog_read_more_text', bikes2ride_theme()->customizer->get_default( 'blog_read_more_text' ) );
			$btn_visible    = $btn_text ? true : false;

			$utility->attributes->get_button( array(
				'visible' => $btn_visible,
				'class'   => 'link',
				'text'    => $btn_text,
				'icon'    => '<i class="linearicon linearicon-arrow-right"></i>',
				'html'    => '<a href="%1$s" %3$s><span class="link__text">%4$s</span>%5$s</a>',
				'echo'    => true,
			) );
			?>
		</footer><!-- .entry-footer -->
	</div><!-- .post-list__item-content -->

</article><!-- #post-## -->
