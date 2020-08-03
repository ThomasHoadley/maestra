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
                $kidz_corner = get_sub_field( 'creative_corner' )['url']; 
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
        
       <div class="content mobile-stages">
            <div class="stage">
                <a href="<?= $main_stage; ?>">
                    <h3>Main Stage</h3>
                    <img src="<?= get_template_directory_uri(); ?>/public/images/stages/main-stage.png" alt="Main Stage">
                </a>
            </div>
            <div class="stage">
                <a href="<?= $dance_stage; ?>">
                    <h3>Dance Tent</h3>
                    <img src="<?= get_template_directory_uri(); ?>/public/images/stages/dance-tent.png" alt="The Snuts Tombola">
                </a>
            </div>
             <div class="stage">
                <a href="<?= $future_stage; ?>">
                    <h3>Future Stage</h3>
                    <img src="<?= get_template_directory_uri(); ?>/public/images/stages/future-stage.png" alt="Future Stage">
                </a>
            </div>
            <div class="stage">
                <a href="<?= $speakers_corner; ?>">
                    <h3>Speakers Corner</h3>
                    <img src="<?= get_template_directory_uri(); ?>/public/images/stages/speakers-corner.png" alt="Speakers Corner">
                </a>
            </div>
            <div class="stage">
                <a href="<?= $comedy_tent; ?>">
                    <h3>Poetry Stage</h3>
                    <img src="<?= get_template_directory_uri(); ?>/public/images/stages/comedy-tent.png" alt="Poetry Stage">
                </a>
            </div>
            <div class="stage">
                <a href="<?= $unfairground; ?>">
                    <h3>The Snuts Tombola</h3>
                    <img src="<?= get_template_directory_uri(); ?>/public/images/stages/snuts.png" alt="The Snuts Tombola">
                </a>
            </div>
            <div class="stage">
                <a href="<?= $kidz_corner; ?>">
                    <h3>Kidz Corner</h3>
                    <img src="<?= get_template_directory_uri(); ?>/public/images/stages/kidz-corner.png" alt="Kidz Corner">
                </a>
            </div>
             <div class="stage">
                <a href="<?= $food_tent; ?>">
                    <h3>Food Tent</h3>
                    <img src="<?= get_template_directory_uri(); ?>/public/images/stages/food-tent.png" alt="Food Tent">
                </a>
            </div>
            <div class="stage">
                <a href="<?= $bar; ?>">
                    <h3>Bar</h3>
                    <img src="<?= get_template_directory_uri(); ?>/public/images/stages/bar-tent.png" alt="Bar">
                </a>
            </div>
             <div class="stage">
                <a href="<?= $healing_fields; ?>">
                    <h3>Healing Fields</h3>
                    <img src="<?= get_template_directory_uri(); ?>/public/images/stages/healing-fields.png" alt="Healing Fields">
                </a>
            </div>
       </div>
    </div>

    <?php get_template_part('resources/parts/decorations'); ?>
<?php }; 
    }; 
?>
<?php
get_footer();
