<?php
/**
 * Отзывы клиентов
 */
?>
<?php
function gt_otziv(){
?>
<div class="otziv">
    <div class="otziv-inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="otziv-icon">

                    <svg width="114" height="97" viewBox="0 0 114 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.2">
                    <path d="M9 0C4.02944 0 0 4.02944 0 9V44.1704C0 49.1409 4.02944 53.1704 9 53.1704H12.7508C19.6241 53.1704 23.9607 60.5636 20.6062 66.5627L14.6683 77.1822C12.2193 81.5621 13.8253 87.0989 18.2379 89.4886L24.2693 92.7549C28.6106 95.1059 34.0355 93.5208 36.4279 89.2021L52.8727 59.5164C53.6121 58.1817 54 56.681 54 55.1552V9.00001C54 4.02944 49.9706 0 45 0H9Z" fill="white"/>
                    <path d="M69 0C64.0294 0 60 4.02944 60 9V44.1704C60 49.1409 64.0294 53.1704 69 53.1704H72.7508C79.6241 53.1704 83.9607 60.5636 80.6062 66.5627L74.6683 77.1822C72.2193 81.5621 73.8253 87.0989 78.2379 89.4886L84.2693 92.7549C88.6106 95.1059 94.0355 93.5208 96.4279 89.2021L112.873 59.5164C113.612 58.1817 114 56.681 114 55.1552V9.00001C114 4.02944 109.971 0 105 0H69Z" fill="white"/>
                    </g>
                    </svg>

                    <div class="otziv-icon-title">
                        <h2><span>Отзывы</span> клиентов</h2>
                    </div><!-- class="otziv-icon-title" -->
                </div><!-- class="otziv-icon" -->
                   
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="otziv-slider">
                        <div class="otziv-slider-class">
                            <?php 
                             $args_otziv = array(                
                                'posts_per_page' => -1, 
                                'post_type' => 'gt_otziv',     
                            );
                            $otz = new WP_Query( $args_otziv );
                            while ( $otz->have_posts() ) : $otz->the_post();
                            ?>
                                <div> 
                                    <div class="otziv-slider-class-item">
                                        <p class="otziv-slider-class-item-person-text">
                                        <?php echo get_the_content();?>
                                        </p>
                                        <p class="otziv-slider-class-item-person">   
                                        <?php the_title();?>
                                        </p>    
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_query(); ?>                            
                        </div>
                    </div><!-- class="otziv-slider" -->
                    <div class="slider-arows">
                        <div class="slider-arows-left">

                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" fill="#C53537"/>
                            <path d="M24 12L16 20L24 28" stroke="white" stroke-linecap="square"/>
                            </svg>

                        </div>
                        <div class="slider-arows-right">

                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" fill="#C53537"/>
                            <path d="M16 28L24 20L16 12" stroke="white" stroke-linecap="square"/>
                            </svg>

                        </div>
                    </div>
                </div>
                
            </div>
    </div>
    </div><!-- class="otziv-inner" -->
</div><!-- class="otziv" -->
<?php
}
?>