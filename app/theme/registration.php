<?php

// Allow Registration Only from @warrenchandler.com email addresses

function is_valid_email_domain($login, $email, $errors ){
 $valid_email_domains = array(
    "parlophonemusic.com",
    "warnermusic.com",
    "wmg.com",
    "asylumrecords.co.uk",
    "atlanticrecords.co.uk",
    "ada-music.co.uk",
    "warnerchappellpm.com",
    "warnerchappell.com",
    "disturbinglondon.com",
    "maestra-group.com",
    "dlrecords.com",
    "disturbinglondon.com"
  );
  $valid = false;
  foreach( $valid_email_domains as $d ){
    $d_length = strlen( $d );
    $current_email_domain = strtolower( substr( $email, -($d_length), $d_length));

  if( $current_email_domain == strtolower($d) ){
    $valid = true;
    break;
  }
 }
  // Return error message for invalid domains
  if( $valid === false ){

    $errors->add('domain_whitelist_error',__( '<strong>ERROR</strong>: Registration is only allowed from selected approved domains. If you think you are seeing this in error, please contact the system administrator.' ));
  }
}
add_action('register_post', 'is_valid_email_domain',10,3 );


// // stop subscribers accessing wp-adming

function remove_read_wpse_93843(){  
    $role = get_role( 'subscriber' );
    $role->remove_cap( 'read' );    
}
add_action( 'admin_init', 'remove_read_wpse_93843' );


// Hide admin bar on the front-end

function hide_admin_bar_from_front_end(){
  if (is_blog_admin()) {
    return true;
  }
  return false;
}
add_filter( 'show_admin_bar', 'hide_admin_bar_from_front_end' );


// Remove username from the form
add_action('login_head', function(){
?>
    <style>
        #registerform > p:first-child{
            display:none;
        }
    </style>

    <script type="text/javascript" src="<?php echo site_url('/wp-includes/js/jquery/jquery.js'); ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('#registerform > p:first-child').css('display', 'none');
        });
    </script>
<?php
});

//Remove error for username, only show error for email only.
add_filter('registration_errors', function($wp_error, $sanitized_user_login, $user_email){
    if(isset($wp_error->errors['empty_username'])){
        unset($wp_error->errors['empty_username']);
    }

    if(isset($wp_error->errors['username_exists'])){
        unset($wp_error->errors['username_exists']);
    }
    return $wp_error;
}, 10, 3);

add_action('login_form_register', function(){
    if(isset($_POST['user_login']) && isset($_POST['user_email']) && !empty($_POST['user_email'])){
        $_POST['user_login'] = $_POST['user_email'];
    }
});

// Change wordpress email names

function wpb_sender_email( $original_email_address ) {
    return 'noreply@wmuksummertimefestival.com';
}
 
// Function to change sender name
function wpb_sender_name( $original_email_from ) {
    return 'Warner Music';
}
 
// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );