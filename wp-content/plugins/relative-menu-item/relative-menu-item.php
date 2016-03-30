<?php
/*
Plugin Name: Relative Menu Item
Description: Create custom menu items relative to the root url of the current wordpress installation
Plugin URI: http://bitbucket.org/perchten/wordpress-relative-menu-item-plugin
Version: 0.1
License: GPL
Author: Perch Ten Design
Author URI: perchten.co.uk
*/

global $MYTEST;
$MYTEST[] = "HEELO";
add_filter('wp_nav_menu_items','apply_relative_menu_item', 10, 2);
function apply_relative_menu_item($items, $args){
    global $MYTEST;
    $items = preg_replace("#http://%ROOT%#", get_bloginfo("url"), $items);
    $MYTEST[] = $items;
    return $items;
}

?>