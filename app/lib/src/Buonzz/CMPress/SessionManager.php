<?php namespace Buonzz\CMPress;

class PodioBrowserSession{

  /**
   * Get oauth object from session, if present. We ignore $auth_type since
   * it doesn't work with server-side authentication.
   */
  public function get($auth_type = null) {

    // Check if we have a stored session
    if (\Session::has('podio-php-session')) {

      // We have a session, create new PodioOauth object and return it
      return new \PodioOAuth(
       \Session::get('podio-php-session.access_token'),
       \Session::get('podio-php-session.refresh_token'),
       \Session::get('podio-php-session.expires_in'),
       \Session::get('podio-php-session.ref')
      );
    }

    // Else return an empty object
    return new \PodioOAuth();
  }

  /**
   * Store the oauth object in the session. We ignore $auth_type since
   * it doesn't work with server-side authentication.
   */
  public function set($oauth, $auth_type = null) {

     \Session::get('podio-php-session.access_token');
     \Session::get('podio-php-session.refresh_token');
     \Session::get('podio-php-session.expires_in');
     \Session::get('podio-php-session.ref');

  }
}