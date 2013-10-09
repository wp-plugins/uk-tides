<?php 
/*
Plugin Name: UK tides - heights and times
Plugin URI: http://www.oik-plugins.com/uk-tides
Description: shortcode for UK tide times and heights [bw_tides]
Version: 1.1
Author: bobbingwide
Author URI: http://www.bobbingwide.com
License: GPL2

    Copyright 2011-2013 Bobbing Wide (email : herb@bobbingwide.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html

*/
add_action( "oik_loaded", "uk_tides_init" );

/**
 * Implement "oik_loaded" action for UK tides 
 */
function uk_tides_init() {
  bw_add_shortcode( 'bw_tides', 'bw_tides', oik_path( "shortcodes/uk-tides.php", "uk-tides"), false );
}

add_action( "admin_notices", "uk_tides_activation" );
/**
*/ 
function uk_tides_activation() {
  static $plugin_basename = null;
  if ( !$plugin_basename ) {
    $plugin_basename = plugin_basename(__FILE__);
    add_action( "after_plugin_row_" . $plugin_basename, __FUNCTION__ );   
    require_once( "admin/oik-activation.php" );
  }  
  $depends = "oik:1.17";
  oik_plugin_lazy_activation( __FILE__, $depends, "oik_plugin_plugin_inactive" );
}







