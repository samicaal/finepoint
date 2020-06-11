<?php

  // Setup login page
  function icaal_login_page( $login_url, $redirect ) {
    return home_url( '/login/' );
  }
  add_filter( 'login_url', 'icaal_login_page', 10, 2 );

  // Redirect wp-login.php to new login page
  function icaal_redirect_login_page() {
    $login_page  = home_url( '/login/' );
    $page_viewed = basename($_SERVER['REQUEST_URI']);

    if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
      wp_safe_redirect($login_page);
      exit;
    }
  }
  add_action('init', 'icaal_redirect_login_page');

  // Add failed notice
  function icaal_login_failed() {
    $login_page  = home_url( '/login/' );
    wp_redirect( $login_page . '?login=failed' );
    exit;
  }
  add_action( 'wp_login_failed', 'icaal_login_failed' );

  // Add empty user/pass notice
  function icaal_verify_username_password( $user, $username, $password ) {
    $login_page  = home_url( '/login/' );
    if( $username == "" || $password == "" ) {
      wp_redirect( $login_page . "?login=empty" );
      exit;
    }
  }
  add_filter( 'authenticate', 'icaal_verify_username_password', 1, 3);

  // Add logout notice
  function icaal_logout_page() {
    $login_page  = home_url( '/login/' );
    wp_redirect( $login_page . "?login=false" );
    exit;
  }
  add_action('wp_logout', 'icaal_logout_page');

  // Redirect on successful login
  function icaal_login_redirect( $redirect_to, $request, $user ) {
    // is there a user to check?
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
      //check for admins
      if ( in_array( 'subscriber', $user->roles ) ) {
        // Redirect to the media centre page
        return get_post_type_archive_link('media');
      } elseif( $redirect_to ) {
        return $redirect_to;
      } else {
        return admin_url();
      }
    } else {
      return home_url();
    }
  }
  add_filter( 'login_redirect', 'icaal_login_redirect', 10, 3 );

?> 