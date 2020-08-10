<?php

//Here's my custom CSS that removes the back link in a function
function login_styles() { ?>
    <style type="text/css">
        body.login{background:rgba(41,223,239,1);}
        body.login div#login h1 a {
            background-image: url(<?= Theme::getImage('logo', 'png'); ?>);
            background-size: contain;
            width: 310px;
        }        
        .login #login_error, .login .message, .login .success {
          border-left: 0px !important;
        }
        .login form {
          border: 0px !important;
          border-radius: 255px 15px 225px 15px/15px 225px 15px 255px;
        }
        .message {
          border-radius: 255px 15px 225px 15px/15px 225px 15px 255px;
          /* font-weight: bold;
          text-align: center; */
        }
        #backtoblog {
          display: none; 
        }
        #wp-submit {
          width: 100%;
          background:rgba(41,223,239,1);
          border: none;
          color: #444;
          font-weight: bold;
        }
    </style>
<?php }

//This loads the function above on the login page
add_action( 'login_enqueue_scripts', 'login_styles' );


add_action( 'login_enqueue_scripts', 'enqueue_my_script' );

function enqueue_my_script( $page ) {
    
    Theme::enqueueScript('loginscript', 'loginscript', false, [], '', true);
}