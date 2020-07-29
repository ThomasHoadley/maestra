<?php

/**
 * Template Name: Stage Template - Multiple Videos
 */

get_header();
?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
        the_post(); 
    ?>

    <?php get_template_part('resources/parts/stage-header'); ?>

    <div class="content-container">

        <div class="content">

            <?php if ( have_rows( 'videos' ) ) : ?>
                <?php 
                    $videos = get_field('videos'); 
                    $video_count = count($videos);
                ?>
                <div class="videos-container video-count-<?= $video_count; ?>">
                    <?php while ( have_rows( 'videos' ) ) : the_row(); ?>            
                        <div class="video-container">
                            <?php 
                                $video_thumbnail = get_sub_field( 'video_thumbnail' );
                                $video_link = get_sub_field( 'video_link' );
                                $video_description = get_sub_field( 'video_description' );
                            ?>

                            <?php if ( $video_link ) { ?>
                                <a href="<?php echo $video_link['url']; ?>" target="<?php echo $video_link['target']; ?>">
                            <?php } ?>    

                                <?php if ( $video_thumbnail ) { ?>
                                    <div class="video-thumbnail" style="background-image: url(<?php echo $video_thumbnail['sizes']['video_thumbnail']; ?>);"></div>
                                <?php } ?>

                            <?php if ( $video_link ) { ?>
                                </a>
                            <?php } ?>                
                            
                            <?php if($video_description) { ?>
                                <div class="video-description">
                                    <?= $video_description; ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>       

        </div> 

    </div>
    <?php get_template_part('resources/parts/decorations'); ?>

<?php }; 
    }; 
?>
<?php
get_footer();
