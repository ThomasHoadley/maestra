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

    Theme::enqueueStyle('app', 'app');
    Theme::enqueueScript('app', 'app');
});

/**
 * These are for conditionally loaded scripts.
 */
add_action('wp_enqueue_scripts', function () {

    // Animations script
    if (is_front_page()) {
          Theme::enqueueScript('rwd', 'rwd', false, ['jquery'], '', true);
    };
});

/**
 * Register any specific theme functionality
 */
add_action('after_setup_theme', function () {
    add_theme_support('html5');
    add_theme_support('post-thumbnails');

    // add_image_size('teamMemberPhoto', 200, 200, true);
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