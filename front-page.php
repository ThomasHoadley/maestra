<?php
// Template Name: Home Page
get_header();
?>

    <div class="video-container">
        <img src="<?= Theme::getImage('field', 'png'); ?>" usemap="#fieldmap" class="field-image">
        <video onloadeddata="this.play();" width="100%" name="Main Stage" autoplay muted poster="<?= get_template_directory_uri() ?>/public/images/poster.jpg">
            <source src="<?= get_template_directory_uri() ?>/public/videos/video-1.mp4" type="video/mp4" />
        </video>
    </div>

    <?php if ( have_rows( 'stages' ) ) : ?>
    <?php while ( have_rows( 'stages' ) ) : the_row(); ?>
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
        <area target="_blank" alt="Speakers Corner" title="Speakers Corner" href="<?= $speakers_corner; ?>" coords="255,211,259,141,258,96,401,76,404,136,474,156,473,222,254,229" shape="poly">
        <area target="_blank" alt="Bar" title="Bar" href="<?= $bar; ?>" coords="339,424,377,390,330,254,177,259,158,416" shape="poly">
        <area target="_blank" alt="Creative Corner" title="Creative Corner" href="<?= $creative_corner; ?>" coords="201,457,429,457,440,506,474,516,480,557,172,584" shape="poly">
        <area target="_blank" alt="Unfairground" title="Unfairground" href="<?= $unfairground; ?>" coords="534,462,676,461,682,580,816,575,816,662,630,687,519,659" shape="poly">
        <area target="_blank" alt="Dance Stage" title="Dance Stage" href="<?= $dance_stage; ?>" coords="853,722,886,599,1028,539,1098,638,1093,752" shape="poly">
        <area target="_blank" alt="The Future Stage" title="The Future Stage" href="<?= $future_stage; ?>" coords="1010,484,1147,618,1345,616,1349,544,1288,392,1124,400,999,402,1004,447" shape="poly">
        <area target="_blank" alt="Comedy Tent" title="Comedy Tent" href="<?= $comedy_tent; ?>" coords="902,437,825,267,737,270,700,396,743,458" shape="poly">
        <area target="_blank" alt="Food Tent" title="Food Tent" href="<?= $food_tent; ?>" coords="433,318,640,318,631,394,535,431,409,426,416,356" shape="poly">
        <area target="_blank" alt="Main Stage" title="Main Stage" href="<?= $main_stage; ?>" coords="842,250,847,89,538,83,502,157,510,273" shape="poly">
        <area target="_blank" alt="Healing Fields" title="Healing Fields" href="<?= $healing_fields; ?>" coords="1058,221,1130,112,1204,117,1246,219,1266,301,1062,314" shape="poly">
    </map>

<?php
get_sidebar();
get_footer();
