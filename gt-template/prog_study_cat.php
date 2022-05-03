<?php
/*
Template Name: Программы обучения (категории)
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
<?php echo do_shortcode('[product_categories ids="17,20,18,21,22,19" orderby="id" hide_empty="0" columns="3" limit="6"]'); ?>
<?php echo the_content(); ?>