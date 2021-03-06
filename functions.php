<?php

  // header options
  $custom_header = array(
    'width' => 100,
    'default-image' => get_template_directory_uri() . '/tux.png',
    'uploads' => true,
  );
  add_theme_support('custom-header', $custom_header);
  
  // background
  $custom_background = array(
    'default-color' => '888888'
  );
  add_theme_support('custom-background', $custom_background);
  
  // custom editor
  function custom_editor_styles() {
    add_editor_style('editor-style.css');
  }
  add_action('after_setup_theme', 'custom_editor_styles');

  // remove unnecessary meta tags in the head
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'rsd_link');

  // only keep 7 post revisions in the database
  define('WP_POST_REVISIONS', 7);

  // remove unnecesarry feeds from the head
  remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'feed_links_extra', 3);

  // stop giving such helpful login errors
  function login_error() {
    return 'ERROR';
  }
  add_filter('login_errors', 'login_error');

  // stop guessing urls
  function stop_guessing($url) {
    if (is_404()) {
      return false;
    }
    return $url;
  }
  add_filter('redirect_canonical', 'stop_guessing');

  // don't allow file editing in the browser
  define('DISALLOW_FILE_EDIT', true);

  // stay logged in for a longer period of time than two
  // weeks, the default time period
  function remember_me($expire) {
    return 2678400;
  }
  add_filter('auth_cookie_expiration', 'remember_me');

  // read more (used on the home page)
  function excerpt_text($more) {
    return '<a class="read-more" href="'.get_permalink(get_the_ID()).'">'.__('...', 'your-text-domain').'</a>';
  }
  add_filter('excerpt_more', 'excerpt_text');
?>