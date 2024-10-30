<?php
/*

**************************************************************************

Plugin Name:  Last Post Redirect
Plugin URI:   http://www.arefly.com/last-post-redirect/
Description:  Redirect you to the latest post of your blog by a direct link.
Version:      1.5.4
Author:       Arefly
Author URI:   http://www.arefly.com/
Text Domain:  last-post-redirect
Domain Path:  /lang/

**************************************************************************

	Copyright 2014  Arefly  (email : eflyjason@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

**************************************************************************/

define("LAST_POST_REDIRECT_PLUGIN_URL", plugin_dir_url( __FILE__ ));
define("LAST_POST_REDIRECT_FULL_DIR", plugin_dir_path( __FILE__ ));
define("LAST_POST_REDIRECT_TEXT_DOMAIN", "last-post-redirect");

/* Plugin Localize */
function last_post_redirect_load_plugin_textdomain() {
	load_plugin_textdomain(LAST_POST_REDIRECT_TEXT_DOMAIN, false, dirname(plugin_basename( __FILE__ )).'/lang/');
}
add_action('plugins_loaded', 'last_post_redirect_load_plugin_textdomain');

include_once LAST_POST_REDIRECT_FULL_DIR."options.php";

/* Add Links to Plugins Management Page */
function last_post_redirect_action_links($links){
	$links[] = '<a href="'.get_admin_url(null, 'options-general.php?page='.LAST_POST_REDIRECT_TEXT_DOMAIN.'-options').'">'.__("Settings", LAST_POST_REDIRECT_TEXT_DOMAIN).'</a>';
	return $links;
}
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'last_post_redirect_action_links');

function last_post_redirect() {
	global $wpdb, $post;
	if (get_option('last_post_redirect_way') == "mysql_command"){
		$last_post_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_password = '' AND post_status = 'publish' ORDER BY post_date DESC LIMIT $lastpost , 1");
	}else{
		$last_post_args = array(
			'numberposts' => 1,
			'category' => 0,
			'exclude' => '',
			'post_type' => get_option('last_post_redirect_post_type'),
			'post_status' => implode(", ", get_option('last_post_redirect_post_status')),
		);
		$last_post = wp_get_recent_posts($last_post_args);
		$last_post_id = $last_post['0']['ID'];
	}
	wp_redirect(get_permalink($last_post_id));
	exit;
}

$last_post_redirect_url = home_url().'/?'.get_option('last_post_redirect_get_name');

function get_last_post_redirect_url(){
	global $last_post_redirect_url;
	return $last_post_redirect_url;
}

$get_name = get_option('last_post_redirect_get_name');

if(isset($_GET[$get_name])){
	add_action('template_redirect', 'last_post_redirect');
}