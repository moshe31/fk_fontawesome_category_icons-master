<?php 
/*
Plugin Name: FontAwesome Category Icons
Plugin URI: https://www.github.com/farhankk360/osclass-fontawesome-category-icons-plugin/
Description: Assign fontawesome icons to categories
Version: 1.0.0
Author: Farhan Ullah
Author URI: https://www.github.com/farhankk360
Short Name: fk_category_icons
Plugin update URI: https://www.github.com/farhankk360/osclass-fontawesome-category-icons-plugin/
*/

//class
require_once dirname( __FILE__ ) . '/fa_category_icons.php';

//install plugin
function fa_call_after_install(){
    FaIcons::newInstance()->import('fk_fontawesome_category_icons/struct.sql');
}

//uninstall plugin
function fa_call_after_uninstall(){
    FaIcons::newInstance()->drop_db_table();
}


//admin configuration page
function fa_config() {
    osc_admin_render_plugin( osc_plugin_path( dirname(__FILE__) ) . '/admin/config.php' );
}


// This is needed in order to be able to activate the plugin
osc_register_plugin( osc_plugin_path( __FILE__ ), 'fa_call_after_install' );
// This is a hack to show a Configure link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook( osc_plugin_path( __FILE__ ) . '_configure', 'fa_config' );
// This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook( osc_plugin_path( __FILE__ ) . '_uninstall', 'fa_call_after_uninstall' );?>

