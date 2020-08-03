<?php 
    // Template Name: Main Field
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
    body{margin:0px;padding:0px;position:relative; }
    /* Make screen full height */
    html { height: 100%;} 
    body { height: 100%;}    
    /* Center the thing */
    body {display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column;}
    body{background:#2ee3f1;}
    body .video-container{width:1600px;margin-left:auto;margin-right:auto;display:block;max-width:100%;box-sizing:border-box;text-align:center;}
    body .video-container{position:relative;height:auto;z-index:100;}
    body .video-container img{max-width:100%;width:auto;height:auto;position:relative;z-index:1;opacity:1;}
    body .video-container video{position:absolute;top:0;left:0;right:0;bottom: 0;height: auto;}
    body .field-image {opacity: 0 !important;}
    .bottom-right { position: absolute; bottom: 30px; right: 30px; z-index: 100;}
    .bottom-right #toggle-mute.icon {display:inline-block; margin-right: 10px; margin-top: -10px; width: 49px; height: 36px; background-size: 100% auto;background-image:url(<?= Theme::getImage('icon-mute', 'png'); ?>) }
    .bottom-right #toggle-mute.playing { background-image:url(<?= Theme::getImage('icon-unmute', 'png'); ?>)}
    /* .bottom-right .logo { display:inline-block; width: 200px;}
    .bottom-right .logo img{ max-width: 100%;} */
</style>
</head>

<body <?php body_class(); ?>>

    <?php 
    $looping_video = get_field( 'looping_video', 'option' ); 
    $looping_video_url = $looping_video['url']; 

    $looping_poster_image = get_field( 'looping_poster_image', 'option' ); 
    $looping_poster_image_url = get_field( 'looping_poster_image', 'option' )['url']; 

    ?>
    

    <?php 
        $music_array = [
            'demi.mp3',
            'head-heart.mp3',
            'lighter.mp3',
            'one-touch.mp3',
            'west-ten.mp3',
            'whoppa.mp3'
        ];
        $item = array_rand($music_array, 1);
    ?>
    <script>
        window.music = [
            'demi.mp3',
            'head-heart.mp3',
            'lighter.mp3',
            'one-touch.mp3',
            'west-ten.mp3',
            'whoppa.mp3'
        ] 
    </script>

    <audio autoplay id="audio">
        <source id="audiosource" src="<?= get_template_directory_uri(); ?>/public/music/<?= $music_array[$item];?>">
    </audio>
    
    <link rel="preload" as="video" href="<?= $looping_video_url; ?>"> 
    <link rel="preload" as="image" href="<?= $looping_poster_image_url; ?>"> 

    <div class="video-container">
        <img src="<?= $looping_poster_image_url; ?>" usemap="#fieldmap" class="field-image">
        <video id="video" width="100%" name="Main Field" autoplay loop muted poster="<?= $looping_poster_image_url; ?>">
        </video>
    </div>
    
    <div class="bottom-right">
        <div class="icon playing" id="toggle-mute"></div>
    </div>

    <?php if ( have_rows( 'stages', '5' ) ) : ?>
    <?php while ( have_rows( 'stages','5' ) ) : the_row(); ?>
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
        <area target="" alt="Speakers Corner" title="Speakers Corner" href="<?= $speakers_corner; ?>" coords="335,224,495,220,526,167,503,138,430,124,406,45,284,92,250,134,233,208,287,208" shape="poly">
        <area target="" alt="Bar" title="Bar" href="<?= $bar; ?>" coords="387,420,363,371,330,356,324,298,270,264,141,299,123,353,122,401,161,461,344,471" shape="poly">
        <area target="" alt="Kidz Zone" title="Kidz Zone" href="<?= $creative_corner; ?>" coords="180,522,271,487,451,512,470,573,521,586,529,609,332,624,231,654,138,621" shape="poly">
        <area target="" alt="The Snuts Tombola" title="The Snuts Tombola" href="<?= $unfairground; ?>" coords="591,764,570,640,589,541,653,514,696,516,742,554,756,648,914,660,937,730,912,748,712,783" shape="poly">
        <area target="" alt="Dance Stage" title="Dance Stage" href="<?= $dance_stage; ?>" coords="1009,816,998,769,1007,708,1031,646,1144,622,1217,656,1222,718,1274,759,1268,856,1115,861" shape="poly">
        <area target="" alt="The Future Stage" title="The Future Stage" href="<?= $future_stage; ?>" coords="1559,706,1607,636,1497,449,1432,498,1357,500,1324,436,1162,434,1174,536,1257,592,1270,654,1352,702,1475,706" shape="poly">
        <area target="" alt="Comedy Tent" title="Comedy Tent" href="<?= $comedy_tent; ?>" coords="1028,481,928,275,852,266,826,318,767,403,797,473,871,508,983,506" shape="poly">
        <area target="" alt="Food Tent" title="Food Tent" href="<?= $food_tent; ?>" coords="494,474,603,468,710,423,713,336,584,336,561,356,494,344,462,348,438,380,443,434" shape="poly">
        <area target="" alt="Main Stage" title="Main Stage" href="<?= $main_stage; ?>" coords="540,267,756,263,783,243,921,253,972,197,982,113,963,76,766,64,673,40,572,68,546,137" shape="poly">
        <area target="" alt="Healing Fields" title="Healing Fields" href="<?= $healing_fields; ?>" coords="1224,261,1282,132,1346,99,1376,100,1391,142,1416,151,1432,204,1479,213,1441,264,1397,310,1267,310,1239,298" shape="poly">
    </map>

    <script>
        // Handle the video
        
        var initialVideo = '<?= $looping_video_url; ?>';
        var video = document.getElementById('video');
        var source = document.createElement('source');
        
        source.setAttribute('src', initialVideo);
        video.appendChild(source);
        video.play();


        // Handle the audio

        var muteToggle = document.getElementById('toggle-mute');
        var audio = document.getElementById('audio');

        muteToggle.addEventListener('click', function(el){
            if (el.target.classList.contains('playing')) {
                audio.pause();
                el.target.classList.remove("playing");
            } else {
                audio.play();
                el.target.classList.add("playing");
            }
        });

        function handleEndedSong() {
            audio.pause();
            var audiosource = document.getElementById('audiosource');
            var musicArray = window.music;
            var randSong = musicArray[Math.floor(Math.random() * musicArray.length)];
            var newSong = '<?= get_template_directory_uri(); ?>/public/music/'+ randSong;
            console.log(newSong);
            audio.load();
            audio.play();
            audiosource.src = newSong; 
        }

        audio.onended = handleEndedSong;

    </script>

<?php
get_footer();
