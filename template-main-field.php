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
    body .video-container{position:relative;height:100%;z-index:100;}
    body .video-container img{max-width:100%;width:auto;height:100%;position:relative;z-index:1;opacity:0;}
    body .video-container video{position:absolute;top:0;left:0;right:0;bottom: 0;height: 100%;}
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
        <area alt="Speakers Corner" title="Speakers Corner" href="<?= $speakers_corner; ?>" coords="255,211,259,141,258,96,401,76,404,136,474,156,473,222,254,229" shape="poly">
        <area alt="Bar" title="Bar" href="<?= $bar; ?>" coords="339,424,377,390,330,254,177,259,158,416" shape="poly">
        <area alt="Kidz Corner" title="Kidz Corner" href="<?= $creative_corner; ?>" coords="201,457,429,457,440,506,474,516,480,557,172,584" shape="poly">
        <area alt="The Snuts Tombola" title="The Snuts Tombola" href="<?= $unfairground; ?>" coords="534,462,676,461,682,580,816,575,816,662,630,687,519,659" shape="poly">
        <area alt="Dance Stage" title="Dance Stage" href="<?= $dance_stage; ?>" coords="853,722,886,599,1028,539,1098,638,1093,752" shape="poly">
        <area alt="The Future Stage" title="The Future Stage" href="<?= $future_stage; ?>" coords="1010,484,1147,618,1345,616,1349,544,1288,392,1124,400,999,402,1004,447" shape="poly">
        <area alt="Comedy Tent" title="Comedy Tent" href="<?= $comedy_tent; ?>" coords="902,437,825,267,737,270,700,396,743,458" shape="poly">
        <area alt="Food Tent" title="Food Tent" href="<?= $food_tent; ?>" coords="433,318,640,318,631,394,535,431,409,426,416,356" shape="poly">
        <area alt="Main Stage" title="Main Stage" href="<?= $main_stage; ?>" coords="842,250,847,89,538,83,502,157,510,273" shape="poly">
        <area alt="Healing Fields" title="Healing Fields" href="<?= $healing_fields; ?>" coords="1058,221,1130,112,1204,117,1246,219,1266,301,1062,314" shape="poly">
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
