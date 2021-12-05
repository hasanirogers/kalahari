<?php

  function afrotechwork_customize_register($wp_customize) {
    // site logo
    $wp_customize->add_setting('site-logo', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'theme_site_track', array(
      'label' => __('Site Logo'),
      'section' => 'title_tagline',
      'settings' => 'site-logo'
    )));

    // site masthead background
    $wp_customize->add_setting('site-masthead-background', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'theme_site_masthead-background', array(
      'label' => __('Site Masthead'),
      'section' => 'title_tagline',
      'settings' => 'site-masthead-background'
    )));
  }
  add_action('customize_register', 'afrotechwork_customize_register');
