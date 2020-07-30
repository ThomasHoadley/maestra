<?php global $post; ?>
<?php 
    $post_id = $post->id;
    $background_colour = get_field( 'background_colour', $post_id);
    $font_colour = get_field( 'font_colour', $post_id);
    $link_hover_colour = get_field( 'link_hover_colour', $post_id);
    $custom_title = get_field( 'custom_title', $post_id);
    $before_title = get_field( 'before_title', $post_id);
    $sub_title = get_field( 'sub_title', $post_id);
    $max_content_width = get_field( 'max_content_width', $post_id);
?>

<?php 
    if($background_colour) {
        echo '<style>
            body{background-color:'.$background_colour.'!important}
            .button-shortcode {
                background: '.$background_colour.'!important;
            }            
        </style>';
    }
    if($font_colour) {
        echo '<style>
            .stage-header .title,
            .stage-header .before-title,
            .stage-header .sub-title,
            .left .return a,
            .content *,
            .right h4
            {color:'.$font_colour.'!important}
        </style>';
    }
    if($link_hover_colour) {
        echo '<style>
            .stage-header a:hover {color:'.$link_hover_colour.'!important}
        </style>';
    }
    if($max_content_width) {
        echo '<style>
            .content-container {width:'.$max_content_width.'px !important}
        </style>';
    }
    

?>

<div class="stage-header">

    <div class="left col">
        <?php get_template_part('resources/parts/return-link'); ?>
    </div>

    <div class="middle col">
        <?php if($before_title) { ?>
            <div class="before-title">
                <p><?= $before_title; ?></p>
            </div>
        <?php }; ?>        
        <h2 class="title">
            <?php if($custom_title) {
                echo $custom_title;
            } else {
                echo get_the_title($post_id);
            }?>
        </h2>

        <?php if($sub_title) { ?>
            <div class="sub-title">
                <p><?= $sub_title; ?></p>
            </div>
        <?php }; ?>
    </div>

<div class="right col">
        <?php get_template_part('resources/parts/stage-image'); ?>
    </div>
</div>
