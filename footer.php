<?php if(!is_front_page() && !is_page_template('template-main-field.php')) : ?>
  <div class="background-images">
    <img src="<?= Theme::getImage('/bg-bottom', 'png'); ?>" class="bottom">
    <img src="<?= Theme::getImage('/bg-center-1', 'png'); ?>" class="center-1">
    <img src="<?= Theme::getImage('/bg-center-2', 'png'); ?>" class="center-2">
    <img src="<?= Theme::getImage('/bg-left', 'png'); ?>" class="left">
    <img src="<?= Theme::getImage('/bg-top-right', 'png'); ?>" class="top-right">
  </div>
<?php endif; ?>
<?php wp_footer(); ?>

<?php /* ?>
<?php if(!isset($_COOKIE['disclaimer'])) { ?>
  <div id="cookie-bar" >
    <span class="left-side">We use cookies to give you the best experience possible on our website. Click <a href="/privacy-policy" target="_blank">here</a> for more info.</span>

    <span class="right-side">
      <div style="position: relative;height:100%;">
        <button id="cookie">Agree</button>
      </div>
    </span>
</div>
<?php } ?>
<?php */ ?>

</body>
</html>
