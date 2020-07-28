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
        $stage_image = get_field('stage_image');
        $video_id = get_field('vimeo_video_id');
        $caption = get_field('caption_text');
        $sidebar_content = get_field('sidebar_content');
    ?>
    <h3 class="return"><a href="/main-field">Return to the main field</a></h3>

    <div class="content-container">

        <div class="header">
            <h1 class="title"><?php the_title(); ?></h1>
        </div>
        
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
