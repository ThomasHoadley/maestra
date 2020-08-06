<?php

/**
 * Any action/filter hooks should be added here
 *
 * @package Theme
 * @since   1.0.0
 */

/**
 * Hide the admin bar on the front-end
 */
// add_action('show_admin_bar', '__return_false');

/**
 * Load the theme assets
 */
add_action('init', function () {
    if (is_admin() || in_array($GLOBALS['pagenow'], ['wp-register.php', 'wp-login.php'])) {
        return;
    }

    Theme::enqueueScript(
        'jquery',
        'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js',
        true,
        [],
        '2.2.4',
        false
    );

});

/**
 * These are for conditionally loaded scripts.
 */
add_action('wp_enqueue_scripts', function () {

    // Animations script
    Theme::enqueueScript('imagemapster', 'imagemapster');
    Theme::enqueueScript('app', 'app');

    if (!is_front_page() && !is_page_template('template-main-field-entry.php') && !is_page_template('template-main-field.php')) {
        Theme::enqueueStyle('app', 'app');
        // Theme::enqueueScript('app', 'app');
    };
});

/**
 * Register any specific theme functionality
 */
add_action('after_setup_theme', function () {
    add_theme_support('html5');
    add_theme_support('post-thumbnails');

    add_image_size('video_thumbnail', 800, 449, true);
});

/**
 * Hook into all queries and modify them where necessary
 */
add_action('pre_get_posts', function ($query) {
    if (!is_admin() && $query->is_main_query()) {
        /**
         * Modify the events archive to be ordered by event date instead
         * of the default post date
         */

        /**
         * Modify the archive to show all  on one page
         */
        if ($query->is_post_type_archive && $query->query_vars['post_type'] == 'service') {
            // $query->set('posts_per_page', -1);
        }
        // if ($query->is_search) {
        //    $query->set('post_type', array( 'post', 'recipes', 'page', 'recipe'));
        // }
    };
});

/**
 * Change the default "post" post type name to "News"
 */
add_action('admin_menu', function () {
    global $menu, $submenu;

    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
});

add_action('init', function () {
    global $wp_post_types;

    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
});

/**
 * Remove unnecessary items from the admin menu
 */
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

/**
 * Change excerpt ...
 */
function new_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Change excerpt length
 */
function excerpt_length($length)
{
    return 22;
}
add_filter('excerpt_length', 'excerpt_length');

/**
 * Allow for SVG import
 */
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/*
  Search form
 */
add_theme_support('html5', array('search-form'));

/*
  Yoast meta box priority
 */

add_filter('wpseo_metabox_prio', 'jw_filter_yoast_seo_metabox');
function jw_filter_yoast_seo_metabox()
{
    return 'low';
}

/**
 * Theme support - title tag
 */
add_theme_support('title-tag');

/**
 * Change login logo
 */
/*
 function my_login_logo() { ?>
     <style type="text/css">
         .login {
           background: #FAFAF8;
         }
         #login h1 a, .login h1 a {
             background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/public/images/logo.png);
             background-size: 100% auto;
             width: 140px;
         }
     </style>
 <?php }
 add_action( 'login_enqueue_scripts', 'my_login_logo' );
 

add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return get_site_url();
}
*/

// Unhook scripts


// Jquery
function unhooks() {
    // General unhooks
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
    remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
    remove_action( 'admin_print_styles', 'print_emoji_styles' );

    // Remove jQuery
    if (!is_admin()) {
        
    }
    
    // Remove bits from homepage
    if(is_front_page() || is_page_template('template-main-field.php')) {
        wp_dequeue_style('style.css');
        wp_dequeue_style('style.min.css');
        wp_deregister_script('wp-embed');
        wp_dequeue_style( 'wp-block-library' );
        // wp_deregister_script('jquery');
        // wp_register_script('jquery', false);
    }
}
add_action('wp_enqueue_scripts', 'unhooks');


function klf_acf_input_admin_footer() { ?>

<script type="text/javascript">
(function($) {

acf.add_filter('color_picker_args', function( args, $field ){

// add the hexadecimal codes here for the colors you want to appear as swatches
args.palettes = ['#272b2c', '#a6a7ac', '#eceee1', '#f5b995', '#d2d2ff','#82c8b8','#b3ff45','#ffff74','#ff8152','#ff8cf5','#46bde6','#6deb82','#ffff00','#ff5420','#ae00c6','#005473','#376319','#ff2828','#4142ae' ];


// return colors
return args;

});

})(jQuery);
</script>

<?php }

add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');


// ACF PAGe

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Field Assets',
		'menu_title'	=> 'Field Assets',
		'menu_slug' 	=> 'field-assets',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

