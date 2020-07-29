<?php global $post; ?>
<?php $sub_title = get_field( 'sub_title', $post->id ); ?>

<div class="header">

    
        <h2 class="title"><?= get_the_title($post->id); ?></h2>

    <?php if($sub_title) { ?>
        <div class="sub-title">
            <p><?= $sub_title; ?></p>
        </div>
    <?php }; ?>
</div>
