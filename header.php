<!DOCTYPE html>
<!--[if IE 9]><html <?php language_attributes(); ?> class="ie9"><![endif]-->
<!--[if !IE]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<?php 
  if ( !is_user_logged_in() ) {
      // auth_redirect();
      $url = site_url('/wp-login.php?action=register');
      wp_redirect( $url );
  } 
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Social Meta goes here -->
  <?php get_template_part('resources/parts/favicons'); ?>


  <?php wp_head(); ?>

  <script>
      window.App = <?= json_encode([
      'urls'      => [
        'site'  => home_url(),
        'theme' => get_template_directory_uri(),
        'ajax'  => admin_url('admin-ajax.php')
      ],
      'variables' => [
        'debug'    => (bool) WP_DEBUG,
        'loggedIn' => (bool) is_user_logged_in()
      ],
      'data'      => []
    ]); ?>;
  </script>

</head>

<body <?php body_class(); ?>>