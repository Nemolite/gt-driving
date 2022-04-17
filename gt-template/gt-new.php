<?php
/*
Template Name: Новости
*/
?>
<div class="container">
  <div class="row">
     
<?php
    $args = array(                
        'posts_per_page' => -1, 
        'post_type' => 'post',     
    );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    get_template_part( bikes2ride_get_post_template_part_slug(), get_post_format() );   
?>
    
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
    <?php get_template_part( 'template-parts/content', 'pagination' );?>
  </div><!-- class="row" -->
</div><!-- class="container" -->