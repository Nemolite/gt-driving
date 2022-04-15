<?php
/*
Template Name: Заезд на спорткаре
*/
?>
<div class="project-terms-caption grid-default-layout">
		<div class="project-terms-caption-header">
			<h2 class="project-terms-title"><?php echo the_title();?></h2>		
        </div>
        <div class="title-margin-bottom">   
        </div>		
</div>
<?php echo do_shortcode('[products category="sport" columns="3" paginate="true"]'); ?>

<?php echo the_content(); ?>