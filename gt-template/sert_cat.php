<?php
/*
Template Name: Подарочные сертификаты (категории)
*/
?>
<div class="project-terms-caption grid-default-layout">
		<div class="project-terms-caption-header">
			<h2 class="project-terms-title"><?php echo the_title();?></h2>		
        </div>
        <div class="title-margin-bottom">   
        </div>		
</div>
<?php echo the_field('doptxt');?>
<?php echo do_shortcode('[product_categories ids="25,26,27,28" orderby="id" hide_empty="0" columns="4" limit="4"]'); ?>
<?php echo the_content(); ?>