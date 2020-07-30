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
        $video_placeholder = get_field('video_placeholder')['sizes']['large'];
        $video_placeholder_string = '';
        if ($video_placeholder) {
            $video_placeholder_string = 'style="background-image:url('.$video_placeholder.');"';
        }
    ?>

    <?php get_template_part('resources/parts/stage-header'); ?>
    <?php get_template_part('resources/parts/stage-banner'); ?>

    <div class="content-container">
        
       <div class="content has-sidebar">
            <div class="video">
                <?php if($video_id) { ?>
                <div class="video-container" <?= $video_placeholder_string; ?>>
                    <?php echo "<iframe src='https://player.vimeo.com/video/$video_id?title=0&byline=0&portrait=0&sidedock=0&autoplay=1' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen ></iframe>"; ?>
                </div>
            <?php }; ?>
            </div>
            <div class="side-bar panel">
                <div class="content">
                    <?= $sidebar_content; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="content-container footer-container">
        <?php if ($caption) { ?>
            <div class="caption">
                <?= $caption; ?>
            </div>
        <?php } ?>                        
    </div>    

    <?php get_template_part('resources/parts/decorations'); ?>

<?php }; 
    }; 
?>
<?php
get_footer();
