<?php
/**
 * Register any post types necessary for the theme to function.
 *
 * @package Theme
 * @since   1.0.0
 */
use PostTypes\PostType;
use PostTypes\Taxonomy;

/**
 * Register the events post type and taxonomies
 *
 * Please note 'Events' have been changed to 'Summits'.
 *
 */
// $recipes = new PostType([
//     'name' => 'recipes',
//     'singular' => 'Recipe',
//     'plural' => 'Recipes',
//     'slug' => 'recipes',
// ], [
//     'supports' => ['title', 'excerpt', 'revisions', 'thumbnail'],
//     'has_archive' => true,
//     'menu_icon' => 'dashicons-carrot',
//     'public'             => true,
//     'publicly_queryable' => true,
//     'exclude_from_search' => false,
//     'capability_type' => 'post',
//     'query_var' => true,
//     'show_in_menu' => true,
//     'rewrite' => array('with_front' => false)
// ]);

// $recipes->register();
