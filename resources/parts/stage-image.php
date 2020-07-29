<?php 
    global $post;
    $parent = $post->post_parent;
    $post_id = $post_id;
    $stage_image = get_field('stage_image', $post_id);
?>
<?php if ( $parent ) : ?>
    <a href="<?php echo get_permalink( $parent, $post_id ); ?>" >
<?php endif; ?>        

    <div class="stage-image-container">

        <div class="stage-image">
            <img src="<?php echo $stage_image['url']; ?>" alt="<?php echo $stage_image['alt']; ?>" />

            <?php if ( $parent ) { ?>
                <a href="<?php echo get_permalink( $parent, $post_id ); ?>" >
            <?php }; ?>                
                <h4 class="back-button">back to the <?php echo get_the_title( $parent, $post_id ); ?></h4>
            <?php if ( $parent ) { ?>
                </a>
            <?php }; ?>            
        </div>

    </div>

<?php if ( $parent ) : ?>
    </a>
<?php endif; ?>