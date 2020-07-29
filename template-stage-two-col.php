<?php
/**
 * Template Name: Stage Template - Two Column
*/
get_header();
?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
    <?php 
        $left_column = get_field('left_column');
        $left_column_image = get_field('left_column_image');
        $right_column = get_field('right_column');
        $right_column_image = get_field('right_column_image');
    ?>
    
    <?php get_template_part('resources/parts/stage-header'); ?>

    <div class="content-container">
       <div class="content two-column">
            <div class="column">
                <?php if($left_column_image) : ?>
                    <div class="image" style="background-image:url(<?= $left_column_image['sizes']['large']; ?>);"></div>
                <?php endif; ?>
                <div class="content">
                    <?= $left_column; ?>
                </div>
            </div>
            <div class="column">
                <?php if($right_column_image) : ?>
                    <div class="image" style="background-image:url(<?= $right_column_image['sizes']['large']; ?>);"></div>
                <?php endif; ?>
                <div class="content">
                    <?= $right_column; ?>
                </div>
            </div>
       </div>
    </div>
    
    <?php get_template_part('resources/parts/decorations'); ?>
    
<?php }; 
    }; 
?>
<?php
get_footer();
