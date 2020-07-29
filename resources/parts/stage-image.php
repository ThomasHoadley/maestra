<?php 
    global $post;
    $parent = $post->post_parent;
    $post_id = $post_id;
    $stage_image = get_field('stage_image', $post_id);
?>

<?php 
    if ( $parent ) {
        $permalink = get_permalink( $parent, $post_id );
        echo '<a href="' . $permalink . '" >';
    }; 
?>

    <div class="stage-image-container">
        <div class="stage-image">
            <?php if ( $parent ) { ?>
            <h4 class="back-button">return to the <?php echo get_the_title( $parent, $post_id ); ?></h4>
            <?php } ?>
                
            <img src="<?php echo $stage_image['url']; ?>" alt="<?php echo $stage_image['alt']; ?>" />          
        </div>
    </div>

<?php if ( $parent ) {
    echo '</a>';
}; ?>