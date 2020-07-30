<?php 
    global $post;
    $post_id = $post_id;
    $remove_path = get_field('remove_path', $post_id);
    $move_path = get_field('move_path', $post_id);
    $move_path_string = '';
    if ($move_path) {
        $move_path_string = 'style="margin-top:'.$move_path.'px"';
    }
?>
<?php if($remove_path != 1){ ?>
    <div class="decorations" <?= $move_path_string; ?>>
        <?php 
            echo '<img class="path" src="'.Theme::getImage('path3', 'png').'" />';
            echo '<style>.content-container{ padding-bottom: 0px !important }</style>'; 
        ?>
    </div>
<?php } ?>
