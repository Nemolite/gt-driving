<?php
/**
 * Template part for displaying entry-meta.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bikes2ride
 */
?>
<?php $utility = bikes2ride_utility()->utility; ?>

<?php if ( 'post' === get_post_type() ) : ?>

	<div class="entry-meta">

		<?php $author_visible = bikes2ride_is_meta_visible( 'blog_post_author', 'loop' );

		$utility->meta_data->get_author( array(
			'visible' => $author_visible,
			'class'   => 'posted-by__author',
			'html'    => '<span class="posted-by"><a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>',
			'echo'    => true,
		) );
		?>

		<?php $comment_visible = bikes2ride_is_meta_visible( 'blog_post_comments', 'loop' );

		$utility->meta_data->get_comment_count( array(
			'visible' => $comment_visible,
			'html'    => '<span class="post__comments">%1$s<a href="%2$s" %3$s %4$s>%5$s%6$s</a></span>',
			'sufix'   => get_comments_number_text( esc_html__( 'No comment(s)', 'bikes2ride' ), esc_html__( '1 comment', 'bikes2ride' ), esc_html__( '% comments', 'bikes2ride' ) ),
			'class'   => 'post__comments-link',
			'echo'    => true,
		) );
		?>

		<?php $cats_visible = bikes2ride_is_meta_visible( 'blog_post_categories', 'loop' );

		$utility->meta_data->get_terms( array(
			'visible'   => $cats_visible,
			'type'      => 'category',
			'delimiter' => ', ',
			'before'    => '<span class="post__cats">',
			'after'     => '</span>',
			'echo'      => true,
		) );
		?>

		<?php $tags_visible = bikes2ride_is_meta_visible( 'blog_post_tags', 'loop' );

		$utility->meta_data->get_terms( array(
			'visible'   => $tags_visible,
			'type'      => 'post_tag',
			'delimiter' => ', ',
			'before'    => '<span class="post__tags">',
			'after'     => '</span>',
			'echo'      => true,
		) );
		?>
	</div><!-- .entry-meta -->

<?php endif; ?>
