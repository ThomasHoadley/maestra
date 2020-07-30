<?php 
    global $post;
    $post_id = $post->id;
    $change_default_flag_image = get_field('change_default_flag_image', $post_id);
?>
<div class="return-container">
    <?php if ($change_default_flag_image) { ?>
            <img class="flag2 flag" src="<?= $change_default_flag_image['sizes']['large']; ?>" />
        <?php } else { ?>
            <img class="flag2 flag" src="<?= Theme::getImage('flags', 'png'); ?>" />
        <?php } ?>
    <h3 class="return"><a href="/main-field">Return to the main field</a></h3>
</div>