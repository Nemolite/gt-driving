<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bikes2ride
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php $utility = bikes2ride_utility()->utility; ?>

	<?php bikes2ride_ads_post_before_content() ?>

	<figure class="post-thumbnail">
		<?php $size = bikes2ride_post_thumbnail_size(); ?>

		<?php $utility->media->get_image( array(
			'size'        => $size['size'],
			'html'        => '<img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s">',
			'placeholder' => false,
			'echo'        => true,
			) );
		?>
	</figure><!-- .post-thumbnail -->

	<?php $date_visible = bikes2ride_is_meta_visible( 'single_post_publish_date', 'single' );

	$utility->meta_data->get_date( array(
		'visible' => $date_visible,
		'html'    => '<span class="post__date">%1$s<a href="%2$s" %3$s %4$s ><time datetime="%5$s">%6$s%7$s</time></a></span>',
		'class'   => 'post__date-link',
		'echo'    => true,
	) );
	?>

	<header class="entry-header">

		<?php $utility->attributes->get_title( array(
			'class' => 'entry-title',
			'html'  => '<h3 %1$s>%4$s</h3>',
			'echo'  => true,
		) );
		?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links__title">' . esc_html__( 'Pages:', 'bikes2ride' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span class="page-links__item">',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'bikes2ride' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php get_template_part( 'template-parts/content-entry-meta-single' ); ?>
		<?php bikes2ride_share_buttons( 'single' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
