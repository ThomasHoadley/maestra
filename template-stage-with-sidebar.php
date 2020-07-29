<?php

/**
 * Template Name: Stage Template - With sidebar
 */

get_header();
?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
        $video_id = get_field('vimeo_video_id');
        $caption = get_field('caption_text');
        $sidebar_content = get_field('sidebar_content');
    ?>

    <?php get_template_part('resources/parts/return-link'); ?>

    <div class="content-container">

        <?php get_template_part('resources/parts/stage-header'); ?>
        
       <div class="content has-sidebar">
            <div class="video">
                <?php if($video_id) { ?>
                <div class="video-container">
                    <?php echo "<iframe src='https://player.vimeo.com/video/$video_id?title=0&byline=0&portrait=0&sidedock=0&autoplay=1' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen ></iframe>"; ?>
                </div>
            <?php }; ?>

            <?php if ($caption) { ?>
                <div class="caption">
                    <?= $caption; ?>
                </div>
            <?php } ?>
            </div>
            <div class="side-bar">
                <?= $sidebar_content; ?>
            </div>
       </div>
    </div>

    <?php get_template_part('resources/parts/stage-image'); ?>

<?php }; 
    }; 
?>
<?php
get_footer();
