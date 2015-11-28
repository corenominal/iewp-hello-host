<?php
/**
 * Plugin Name: IEWP Hello Host
 * Plugin URI: https://github.com/corenominal/iewp-hello-host
 * Description: This is a hack of Matt Mullenweg's famous <a href="https://wordpress.org/plugins/hello-dolly/">Hello Dolly plugin</a>. Instead of a lyric from Louis Armstrong's "Hello, Dolly", when activated you will see your server's hostname in the upper right of your admin screen on every page. It is intended to be a handy plugin for developers who work with 'development' and 'production' servers.
 * Author: Philip Newborough
 * Version: 0.0.1
 * Author URI: https://corenominal.org
 */

/**
 * This just echoes the sever hostname, we'll position it later
 */
function iewp_hello_host()
{
	echo '<p id="host">Server hostname: ' . gethostname() . '</p>';
}

/**
 * Now we set that function up to execute when the admin_notices action is called
 */
add_action( 'admin_notices', 'iewp_hello_host' );

/**
 * We need some CSS to position the paragraph
 */ 
function iewp_host_css()
{
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#host {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'iewp_host_css' );

?>
