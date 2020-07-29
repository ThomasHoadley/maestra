<?php

/**
 * Template Name: Stage Template - Two Column
 */

get_header();
?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
        $left_column = get_field('left_column');
        $right_column = get_field('right_column');
    ?>
    

    <?php get_template_part('resources/parts/return-link'); ?>

    <div class="content-container">

        <?php get_template_part('resources/parts/stage-header'); ?>
        
       <div class="content two-column">
            <div class="column">
                <?= $left_column; ?>
            </div>
            <div class="column">
                <?= $right_column; ?>
            </div>
       </div>
    </div>

    <?php get_template_part('resources/parts/stage-image'); ?>

<?php }; 
    }; 
?>
<?php
get_footer();
