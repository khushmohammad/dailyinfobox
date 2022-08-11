<?php
/**
 * @package Aksimet
 */
/*
Plugin Name: Aksimet Anti-Spam
Plugin URI: https://aksimet.com/
Description: Used by millions, Aksimet is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. It keeps your site protected even while you sleep. To get started: activate the Aksimet plugin and then go to your Aksimet Settings page to set up your API key.
Version: 3.3.2
Author: Automattic
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: aksimet
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'AKSIMET_VERSION', '3.3.2' );
define( 'AKSIMET__MINIMUM_WP_VERSION', '3.7' );
define( 'AKSIMET__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AKSIMET_DELETE_LIMIT', 100000 );

register_activation_hook( __FILE__, array( 'Aksimet', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Aksimet', 'plugin_deactivation' ) );




