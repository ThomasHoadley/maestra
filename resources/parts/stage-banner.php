<?php 
    global $post;
    $post_id = $post_id;

    $banner_header = get_field('banner_header', $post_id);
    $banner_text = get_field('banner_text', $post_id);
    $dark_banner = get_field('dark_banner', $post_id);

    

    $banner_link = get_field('banner_link', $post_id);
    $banner_link_title = $banner_link['title'];
    $banner_link_url = $banner_link['url'];
    $banner_link_target = $banner_link['target'];

?>

<?php if($banner_header || $banner_text || $banner_link) { ?>
<?php 
    if ($dark_banner == 1) {
        echo '<div class="dark-banner">';
    };    
?>    
<div class="stage-banner-container content-container">
    <div class="row">
        <div class="block">
            <p>
                <span>
                    <?php if($banner_header) { ?>
                        <?= $banner_header; ?> <br>
                    <?php }; ?>
                    <?php if($banner_text) { ?>
                    <?= $banner_text; ?>
                    <?php }; ?>            
                    <?php if($banner_link) { ?>
                        <a href="<?= $banner_link_url; ?>" target="_blank" class="button"><?= $banner_link_title; ?></a>
                    <?php }; ?>
                </span>      
            </p>
        </div>
    </div>
</div>
<?php 
    if ($dark_banner == 1) {
        echo '</div>';
    };    
?>  
<?php }; ?>