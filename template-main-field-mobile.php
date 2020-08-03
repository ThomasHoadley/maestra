<?php

/**
 * Template Name: Mobile Field Page
 */

get_header();
?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 

    ?>
        <?php if ( have_rows( 'stages', '5' ) ) : ?>
        <?php while ( have_rows( 'stages','5' ) ) : the_row(); ?>
        <?php
            $main_stage = get_sub_field( 'main_stage' )['url']; 
            $speakers_corner = get_sub_field( 'speakers_corner' )['url']; 
            $bar = get_sub_field( 'bar' )['url']; 
            $creative_corner = get_sub_field( 'creative_corner' )['url']; 
            $food_tent = get_sub_field( 'food_tent' )['url']; 
            $comedy_tent = get_sub_field( 'comedy_tent' )['url']; 
            $unfairground = get_sub_field( 'unfairground' )['url']; 
            $dance_stage = get_sub_field( 'dance_stage' )['url']; 
            $future_stage = get_sub_field( 'future_stage' )['url']; 
            $healing_fields = get_sub_field( 'healing_fields' )['url']; 
        ?>
        <?php endwhile; ?>
        <?php endif; ?>

    <div class="content-container">
        
       <div class="content">
            <div class="stage">
                <a href="<?= $main_stage; ?>">
                    <h2>Main Stage</h2>
                    <img src="<?= Theme::getImage('stages/main-stage', 'png'); ?>" alt="Main Stage">
                </a>
            </div>
            <div class="stage">
                
            </div>
            <div class="stage">
                
            </div>
            <div class="stage">
                
            </div>
       </div>
    </div>

    <?php get_template_part('resources/parts/decorations'); ?>
<?php }; 
    }; 
?>
<?php
get_footer();
