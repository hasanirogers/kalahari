<?php
  $siteLogoID = get_theme_mod('site-logo');
  $siteLogoURL = wp_get_attachment_url($siteLogoID);
  $siteMastheadBackgroundID = get_theme_mod('site-masthead-background');
  $siteMastheadBackgroundURL = wp_get_attachment_url($siteMastheadBackgroundID);

  $headerMenuArgs = array(
    'container' => 'nav',
    'container_class' => 'masthead__nav',
    'menu_class' => 'masthead__list',
  );
?>

<header class="masthead" style="background-image:url(<?php echo $siteMastheadBackgroundURL; ?>)">
  <kac-hamburger></kac-hamburger>
  <img class="masthead__img" src="<?php echo $siteLogoURL; ?>" />
  <?php wp_nav_menu($headerMenuArgs); ?>
</header>
