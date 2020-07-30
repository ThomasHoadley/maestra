<?php
/**
 * Output the current year in the WYSIWYG
 */
add_shortcode('year', function($attributes, $content = '') {
    return date('Y');
});

function clicky_button($atts) {
    extract(shortcode_atts(array('link' => '#', 'target' => '', 'text' => '' ), $atts));
    return '<a class="button-shortcode" href="'.$link.'" target="'.$target.'">' . $text . '</a>';
}
add_shortcode('button', 'clicky_button');