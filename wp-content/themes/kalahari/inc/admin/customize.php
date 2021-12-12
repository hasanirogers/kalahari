<?php

  function kalahari_customize_register($wp_customize) {
    // sections
    $wp_customize->add_section('store-identity', array(
      'title' => __('Store Identity'),
      'description' => __('Information about the store.')
    ));

    $wp_customize->add_section('store-social-media', array(
      'title' => __('Social Media'),
      'description' => __('Information about your social media presence.')
    ));

    // site page width
    $wp_customize->add_setting('site-page-width', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_site_width', array(
      'label' => __('Max Page Width'),
      'section' => 'title_tagline',
      'settings' => 'site-page-width',
      'type' => 'text'
    )));

    // site logo
    $wp_customize->add_setting('site-logo', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'theme_site_logo', array(
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


    // store hours
    $wp_customize->add_setting('store-hours-monday', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_monday_hours', array(
      'label'     => __('Monday Hours'),
      'section'   => 'store-identity',
      'settings'  => 'store-hours-monday',
      'type'      =>  'text'
    )));

    $wp_customize->add_setting('store-hours-tuesday', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_tuesday_hours', array(
      'label'     => __('Tuesday Hours'),
      'section'   => 'store-identity',
      'settings'  => 'store-hours-tuesday',
      'type'      =>  'text'
    )));

    $wp_customize->add_setting('store-hours-wednesday', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_wednesday_hours', array(
      'label'     => __('Wednesday Hours'),
      'section'   => 'store-identity',
      'settings'  => 'store-hours-wednesday',
      'type'      =>  'text'
    )));

    $wp_customize->add_setting('store-hours-thursday', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_thursday_hours', array(
      'label'     => __('Thursday Hours'),
      'section'   => 'store-identity',
      'settings'  => 'store-hours-thursday',
      'type'      =>  'text'
    )));

    $wp_customize->add_setting('store-hours-friday', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_friday_hours', array(
      'label'     => __('Friday Hours'),
      'section'   => 'store-identity',
      'settings'  => 'store-hours-friday',
      'type'      =>  'text'
    )));

    $wp_customize->add_setting('store-hours-saturday', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_saturday_hours', array(
      'label'     => __('Saturday Hours'),
      'section'   => 'store-identity',
      'settings'  => 'store-hours-saturday',
      'type'      =>  'text'
    )));

    $wp_customize->add_setting('store-hours-sunday', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_sunday_hours', array(
      'label'     => __('Sunday Hours'),
      'section'   => 'store-identity',
      'settings'  => 'store-hours-sunday',
      'type'      =>  'text'
    )));

    // contact info
    $wp_customize->add_setting('store-address', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_address', array(
      'label'     => __('Store Address'),
      'section'   => 'store-identity',
      'settings'  => 'store-address',
      'type'      =>  'text'
    )));

    $wp_customize->add_setting('store-address-link', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_address_link', array(
      'label'     => __('Store Address Link'),
      'section'   => 'store-identity',
      'settings'  => 'store-address-link',
      'type'      =>  'text'
    )));

    $wp_customize->add_setting('store-email', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_email', array(
      'label'     => __('Email'),
      'section'   => 'store-identity',
      'settings'  => 'store-email',
      'type'      =>  'text'
    )));

    $wp_customize->add_setting('store-phone', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_phone', array(
      'label'     => __('Phone Number'),
      'section'   => 'store-identity',
      'settings'  => 'store-phone',
      'type'      =>  'text'
    )));


    // social media links
    $wp_customize->add_setting('store-facebook-link', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_facebook_link', array(
      'label'     => __('Facebook Link'),
      'section'   => 'store-social-media',
      'settings'  => 'store-facebook-link',
      'type'      =>  'text'
    )));

    $wp_customize->add_setting('store-twitter-link', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_twitter_link', array(
      'label'     => __('Twitter Link'),
      'section'   => 'store-social-media',
      'settings'  => 'store-twitter-link',
      'type'      =>  'text'
    )));

    $wp_customize->add_setting('store-instagram-link', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'theme_instagram_link', array(
      'label'     => __('Instagram Link'),
      'section'   => 'store-social-media',
      'settings'  => 'store-instagram-link',
      'type'      =>  'text'
    )));


    // site colors
    $wp_customize->add_setting('site-color-primary', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_color_primary', array(
      'label'     => __('Primary Color'),
      'section'   => 'title_tagline',
      'settings'  => 'site-color-primary',
    )));

    $wp_customize->add_setting('site-color-secondary', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_color_secondary', array(
      'label'     => __('Secondary Color'),
      'section'   => 'title_tagline',
      'settings'  => 'site-color-secondary',
    )));

    $wp_customize->add_setting('site-color-tertiary', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_color_tertiary', array(
      'label'     => __('Tertiary Color'),
      'section'   => 'title_tagline',
      'settings'  => 'site-color-tertiary',
    )));

    $wp_customize->add_setting('site-color-background', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_color_background', array(
      'label'     => __('Background Color'),
      'section'   => 'title_tagline',
      'settings'  => 'site-color-background',
    )));

    $wp_customize->add_setting('site-color-footer', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_color_footer', array(
      'label'     => __('Footer Color'),
      'section'   => 'title_tagline',
      'settings'  => 'site-color-footer',
    )));
  }
  add_action('customize_register', 'kalahari_customize_register');
