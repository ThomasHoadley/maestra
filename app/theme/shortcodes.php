<?php
/**
 * Output the current year in the WYSIWYG
 */
add_shortcode('year', function($attributes, $content = '') {
    return date('Y');
});
