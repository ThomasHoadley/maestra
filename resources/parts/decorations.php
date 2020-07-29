<?php 
    global $post;
    $post_id = $post_id;
    $path = get_field('path', $post_id);
?>

<div class="decorations">
    <?php 
        echo '<img class="path" src="'.Theme::getImage('path3', 'png').'" />';
        echo '<style>.content-container{ padding-bottom: 0px !important }</style>'; 
    ?>
</div>