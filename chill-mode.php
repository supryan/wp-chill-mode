<?php
/**
 * Plugin Name: Chill Mode
 * Description: A lightweight solution for manual maintenance. Simply activate the plugin and only administrators can see the website.
 * Edit the bottom function to display whatever you want in the default wp_die() function.
 * Version: 0.1
 */

/**
 * Avoid direct calls
*/
defined('ABSPATH') or die("No direct requests for security reasons.");

/**
 * Activation and deactivation with Cache Support
*/

function chillModeActivation()  {
  if ( ! current_user_can( 'activate_plugins' ) )
  return;
  $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
  check_admin_referer( "activate-plugin_{$plugin}" );

    // Clear Cachify Cache
    if ( has_action('cachify_flush_cache') ) {
    do_action('cachify_flush_cache');
    }

    // Clear Super Cache
    if ( function_exists( 'wp_cache_clear_cache' ) ) {
    ob_end_clean();
    wp_cache_clear_cache();
    }

    // Clear W3 Total Cache
    if ( function_exists( 'w3tc_pgcache_flush' ) ) {
    ob_end_clean();
    w3tc_pgcache_flush();
    }
}

function chillModeDeactivation() {
  if ( ! current_user_can( 'activate_plugins' ) )
  return;
  $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
  check_admin_referer( "deactivate-plugin_{$plugin}" );

    // Clear Cachify Cache
    if ( has_action('cachify_flush_cache') ) {
    do_action('cachify_flush_cache');
    }

    // Clear Super Cache
    if ( function_exists( 'wp_cache_clear_cache' ) ) {
    ob_end_clean();
    wp_cache_clear_cache();
    }

    // Clear W3 Total Cache
    if ( function_exists( 'w3tc_pgcache_flush' ) ) {
    ob_end_clean();
    w3tc_pgcache_flush();
  }
}

register_activation_hook(   __FILE__, 'chillModeActivation' );
register_deactivation_hook( __FILE__, 'chillModeDeactivation' );

/**
 * Alert message when active
*/
function chillModeAdminAlert() {
	echo '<div id="message" class="error fade"><p>' . __( '<strong>Maintenance mode</strong> is <strong>active</strong>!', 'maintenance-mode' ) . ' <a href="plugins.php#maintenance-mode">' . __( 'Deactivate it, when work is done.', 'maintenance-mode' ) . '</a></p></div>';
}
if ( is_multisite() && is_plugin_active_for_network( plugin_basename( __FILE__ ) ) )
add_action( 'network_admin_notices', 'chillModeAdminAlert' );
add_action( 'admin_notices', 'chillModeAdminAlert' );
add_filter( 'login_message',
	function() {
		return '<div id="login_error">' . __( '<strong>Maintenance mode</strong> is active!', 'maintenance-mode' ) . '</div>';
	} );

/**
 * Maintenance message when active
*/
function chillMode() {
  nocache_headers();
  if(!current_user_can('edit_themes') || !is_user_logged_in()) {

    $pluginPath = '<div id="plug" style="display: none;">'. plugin_dir_url( __FILE__ ) .'</div>';
    $templatePath = '<div id="temp" style="display: none;">'. get_bloginfo('template_directory') .'</div>';
    wp_die(''. $templatePath .''. $pluginPath .''. file_get_contents(''. plugin_dir_url( __FILE__ ) . 'template.php' .'') .'', 'We\'ll be right back.' , array('response' => 503));
  }
}
add_action('get_header', 'chillMode');

?>
