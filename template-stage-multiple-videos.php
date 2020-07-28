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
        
        $stage_image = get_field('stage_image');
        $sub_title = get_field( 'sub_title' );
    ?>

    <h3 class="return"><a href="/main-field">Return to the main field</a></h3>

    <div class="content-container">

        <div class="header">
            <h1 class="title"><?php the_title(); ?></h1>
            <?php if($sub_title) { ?>
                <div class="sub-title">
                    <p><?= $sub_title; ?></p>
                </div>
            <?php } ?>
        </div>

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
                                    <p><?= $video_description; ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>       

        </div> 

    </div>

    <?php global $post; if ( $post->post_parent ) { ?>
        <a href="<?php echo get_permalink( $post->post_parent ); ?>" >
    <?php }; ?>        
    <div class="stage-image">
        <img src="<?php echo $stage_image['url']; ?>" alt="<?php echo $stage_image['alt']; ?>" />
    </div>
    <?php if ( $post->post_parent ) { ?>
        </a>
    <?php }; ?>

<?php }; 
    }; 
?>
<?php
get_footer();
