<?php
/**
 * The template for displaying author bio.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bikes2ride
 */
?>
<?php  if ( ! is_product() ) { ?>  
<div class="post-author-bio">
	<div class="post-author__holder clear">
		<div class="post-author__avatar"><?php
			echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'bikes2ride_author_bio_avatar_size', 109 ), '', esc_attr( get_the_author_meta( 'nickname' ) ) );
		?></div>
		<h5 class="post-author__title"><?php
			printf( esc_html__( 'About the %s', 'bikes2ride' ), bikes2ride_get_the_author_posts_link() );
		?></h5>
		<div class="post-author__content"><?php
			echo get_the_author_meta( 'description' );
		?></div>
	</div>
</div>
<?php } ?>