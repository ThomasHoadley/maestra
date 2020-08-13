<?php

/**
 * Template Name: Stage Template
 */

get_header();
?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
        $video_id = get_field('vimeo_video_id');
        $caption = get_field('caption_text');
        $video_placeholder = get_field('video_placeholder')['sizes']['large'];
        $video_placeholder_string = '';
        if ($video_placeholder) {
            $video_placeholder_string = 'style="background-image:url('.$video_placeholder.');"';
        }
        $custom_embed = get_field( 'custom_embed' );
        $show_holding_content = get_field( 'show_holding_content' );
        $holding_content_text = get_field( 'holding_content_text' );
    ?>

    <?php get_template_part('resources/parts/stage-header'); ?>
    <?php get_template_part('resources/parts/stage-banner'); ?>

    <?php if( $show_holding_content == 1 ) : ?>
        <div class="content-container">
            <div class="stage-banner-container content-container">
                <div class="row">
                    <div class="block">
                        <p>
                            <span>
                                <?= $holding_content_text; ?>
                            </span>      
                        </p>
                    </div>
                </div>
            </div>        
        </div>       
    <?php else : ?>
        <div class="content-container">
            <div class="content">
                <?php if($video_id) { ?>
                    <div class="video-container" <?= $video_placeholder_string; ?>>
                        <?php echo "<iframe src='https://player.vimeo.com/video/$video_id?title=0&byline=0&portrait=0&sidedock=0&autoplay=1'  frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen ></iframe>"; ?>
                    </div>
                <?php }; ?>
                <?php if($custom_embed) { ?>
                    <div class="video-container">
                        <?= $custom_embed; ?>
                    </div>
                <?php } ?>
                
                <?php if ($caption) { ?>
                    <div class="caption">
                        <?= $caption; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php endif; ?>    
    <?php get_template_part('resources/parts/decorations'); ?>
<?php }; 
    }; 
?>
<?php
get_footer();
