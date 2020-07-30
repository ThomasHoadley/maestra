<?php 
    // Template Name: Home Page
?>
<!DOCTYPE html>
<!--[if IE 9]><html <?php language_attributes(); ?> class="ie9"><![endif]-->
<!--[if !IE]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Social Meta goes here -->
  <!-- Fav icon goes here -->

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

<style>
    html{height:100%;}
    body{margin:0px;padding:0px;position:relative;overflow:auto;}
    .page-template-template-main-field-entry{padding-top:2em;background:#2ee3f1;}
    .page-template-template-main-field-entry .video-container{width:1600px;margin-left:auto;margin-right:auto;display:block;max-width:100%;-webkit-box-sizing:border-box;box-sizing:border-box;position:relative;}
    .page-template-template-main-field-entry .video-container img{max-width:100%;width:100%;height:auto;position:relative;opacity:0.5;top:0;bottom:0;z-index:1;opacity:0;}
    .page-template-template-main-field-entry .video-container video{width:100%!important;height:auto!important;position:absolute;top:0;left:0;}
    .video-container{position:relative;padding-bottom:56.25%;height:0;z-index:100;}
    .page-template-template-main-field-entry .video-container .info-text { z-index: 100;position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); color: white; font-size: 40px; }
    #mapster_wrap_0 {opacity: 0;z-index: 1;}
</style>

</head>

<body <?php body_class(); ?>>

    <link rel="preload" as="video" href="<?= get_template_directory_uri() ?>/public/videos/field.mp4"> 
    <link rel="preload" as="image" href="<?= get_template_directory_uri() ?>/public/images/fieldPoster.jpg"> 

    <div class="video-container">
        <img src="<?= Theme::getImage('field', 'png'); ?>" usemap="#fieldmap" class="field-image">
        <video id="video" onloadeddata="swapPoster();" onended="swapVideo();" width="100%" name="Main Stage" autoplay muted poster="<?= get_template_directory_uri() ?>/public/images/entryPoster.jpg">
        </video>
    </div>

    <?php if ( have_rows( 'stages', 5 ) ) : ?>
    <?php while ( have_rows( 'stages', 5 ) ) : the_row(); ?>
        <?php
            $main_stage = get_sub_field( 'main_stage' )['url']; 
            $speakers_corner = get_sub_field( 'speakers_corner' )['url']; 
            $bar = get_sub_field( 'bar' )['url']; 
            $creative_corner = get_sub_field( 'creative_corner' )['url']; 
            $food_tent = get_sub_field( 'food_tent' )['url']; 
            $comedy_tent = get_sub_field( 'comedy_tent' )['url']; 
            $unfairground = get_sub_field( 'unfairground' )['url']; 
            $dance_stage = get_sub_field( 'dance_stage' )['url']; 
            $future_stage = get_sub_field( 'future_stage' )['url']; 
            $healing_fields = get_sub_field( 'healing_fields' )['url']; 
        ?>
	<?php endwhile; ?>
<?php endif; ?>

    <map name="fieldmap">
        <area alt="Speakers Corner" title="Speakers Corner" href="<?= $speakers_corner; ?>" coords="255,211,259,141,258,96,401,76,404,136,474,156,473,222,254,229" shape="poly">
        <area alt="Bar" title="Bar" href="<?= $bar; ?>" coords="339,424,377,390,330,254,177,259,158,416" shape="poly">
        <area alt="Creative Corner" title="Creative Corner" href="<?= $creative_corner; ?>" coords="201,457,429,457,440,506,474,516,480,557,172,584" shape="poly">
        <area alt="Unfairground" title="Unfairground" href="<?= $unfairground; ?>" coords="534,462,676,461,682,580,816,575,816,662,630,687,519,659" shape="poly">
        <area alt="Dance Stage" title="Dance Stage" href="<?= $dance_stage; ?>" coords="853,722,886,599,1028,539,1098,638,1093,752" shape="poly">
        <area alt="The Future Stage" title="The Future Stage" href="<?= $future_stage; ?>" coords="1010,484,1147,618,1345,616,1349,544,1288,392,1124,400,999,402,1004,447" shape="poly">
        <area alt="Comedy Tent" title="Comedy Tent" href="<?= $comedy_tent; ?>" coords="902,437,825,267,737,270,700,396,743,458" shape="poly">
        <area alt="Food Tent" title="Food Tent" href="<?= $food_tent; ?>" coords="433,318,640,318,631,394,535,431,409,426,416,356" shape="poly">
        <area alt="Main Stage" title="Main Stage" href="<?= $main_stage; ?>" coords="842,250,847,89,538,83,502,157,510,273" shape="poly">
        <area alt="Healing Fields" title="Healing Fields" href="<?= $healing_fields; ?>" coords="1058,221,1130,112,1204,117,1246,219,1266,301,1062,314" shape="poly">
    </map>

    <script>
        var initialVideo = window.App.urls.theme + '/public/videos/entry.mp4';
        var loopVideo = window.App.urls.theme + '/public/videos/field.mp4';
        var fieldPoster = window.App.urls.theme + '/public/images/fieldPoster.jpg';
        var video = document.getElementById('video');
        var source = document.createElement('source');
        var clickToStart = document.getElementById('clickToStart');
        
        source.setAttribute('src', initialVideo);
        video.appendChild(source);

        clickToStart.addEventListener('click', function(){
            video.play();
        })
        
        function swapPoster() {
            video.setAttribute('poster', fieldPoster);
        }

        function swapVideo() {
            video.pause();
            source.setAttribute('src', loopVideo);
            video.load();
            video.setAttribute('loop', "true")
            // video.play();
        }
    </script>

<?php
get_footer();
