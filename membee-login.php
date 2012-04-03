<?php
/*
Plugin Name: Membee Login
Plugin URI: 
Description: Plugin to add authentication via Membee Single Sign-On service.
Version: 1.0.0
Author: achilles_sm
Author URI: https://www.odesk.com/users/~~ea464c4f281cbab8
License: GPL
*/

$orig_error_display = ini_get('display_errors');                // hiding errors for security
ini_set('display_errors', 0);
$orig_error_reporting = error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);  
$root_path = dirname(__FILE__);

global $membee_error_message, $membee_options; 
 
$membee_error_message = '';
if (function_exists('json_encode')) {
  require_once($root_path . '/mvc/m.php');                        //including MVC-files
  require_once($root_path . '/mvc/c.php');
  require_once($root_path . '/mvc/v.php');  
                
  add_action('admin_menu', 'display_membee_login_menu');          //WP admin options menu and page 
  add_action('admin_print_styles', 'admin_header_stylesheet');
  
  add_filter('allowed_redirect_hosts','allow_redirects');         // allow redirects to membee server
  
  function membee_init() {
    global $membee_options; 
    $membee_options = process_membee_options();                   //get membee options
                  
    if ($membee_options['secret']) {
      if (($_REQUEST['token'])&&(strlen($_REQUEST['token'])==36)&&(strip_tags($_REQUEST['token'])==$_REQUEST['token'])) {    //if logged in at membee, let's request user details and log in to WP                  
        process_login('https://memberservices.membee.com/feeds/profile/ExchangeTokenForID/', array('APIKEY='.$membee_options['secret'], 'ClientID='.$membee_options['client_id'], 'AppID='.$membee_options['app_id'], 'Token='.$_REQUEST['token']));          
      }
      if ((!is_user_logged_in())&&($_SERVER['PHP_SELF'] != '/wp-login.php')) {         
        if (!$_COOKIE['membee-checked']) {                        //check if logged in at membee server  
          setcookie('membee-checked', 1, time()+5*60);                   //perform checks not more often than once in 5 min
          wp_safe_redirect('https://memberservices.membee.com/feeds/login/LoginCheck.aspx?clientid='.$membee_options['client_id'].'&appid='.$membee_options['app_id'].'&destURL='.urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));
          exit;
        }                                       
      }      
      wp_register_sidebar_widget('membee_login_widget', 'Membee iFrame Login Widget', 'membee_widget');            
      wp_register_sidebar_widget('membee_login_flyout_widget', 'Membee Login Flyout Widget', 'membee_flyout_widget');
      wp_register_sidebar_widget('membee_reset_widget', 'Membee Reset Widget', 'membee_reset_widget');            
      add_shortcode( 'membee_login', 'membee_login_shortcode' );  
      add_shortcode( 'membee_reset', 'membee_reset_shortcode' );        
    }            
  }
  add_action('init', 'membee_init');
  
  add_filter('logout_url', 'change_logout_url');                  //change logout url in admin bar
  add_action('wp_enqueue_scripts', 'prepare_flyout');             //enqueue required scripts    
} else {
  $membee_error_message = 'JSON support is required for that plugin!';
} 

if ($membee_error_message) {
  error_log ( $membee_error_message );    //sending error messages to your server error log. 
}
ini_set('display_errors', $orig_error_display);                 // error reporting back to original
error_reporting($orig_error_reporting); 

?>