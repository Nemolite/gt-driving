<?php
/*
Template Name: Дрифт (Drift)
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
<?php echo do_shortcode('[products category="drift" columns="3" paginate="true"]'); ?>

<?php echo the_content(); ?>