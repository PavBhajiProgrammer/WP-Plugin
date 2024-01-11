<?php

/** 
*@package my-custom-plugin
*/


/*
Plugin Name: My-custom-plugin
Plugin URI: https://github.com/swapn7038/custom-plugin
Description: This is my first custom plugin made for personal use
Version: 1.0.0
Author: Swapnil Shelke
Author URI: https://instagram.com/therealswapnill
License: GPL v2 or later
Text Domain: my-custom-plugin 
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

Copyright 2005-2023 Automattic, Inc.
*/



// 2nd way
defined('ABSPATH') or die('Hey you cannot access this files, you silly human');

class myCustonPlugin
{
    function __construct(){
        add_action( 'init', array( $this, 'custom_post_type' ) );
    }

    function activate(){

        // generated a CPT
        $this->custom_post_type();
        
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function  deactivation(){

    }

    function uninstall(){

    }

    function custom_post_type(){
        register_post_type( 'book' , [ 'public' => true, 'label' => 'Books' ] );
    }
}

if ( class_exists( 'myCustonPlugin' ) )
{
    $myPlugin = new myCustonPlugin("my-custom-plugin Initializes");
}

// activate
register_activation_hook( __FILE__ , array( $myPlugin, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__ , array( $myPlugin, 'deactivation' ) );

// uninstall