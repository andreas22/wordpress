<?php
/**
 * Plugin Name: diCoreSample
 * Plugin URI: 
 * Description: This is a demo on how you can use diCore, even extend it.
 * Version: Version 1.0
 * Author: Andreas Christodoulou
 * Author URI: 
 * License: GPL2
 * Comments: To see that the plugin is working during activation, deactivation, delete post form trash go to your wordpress root directory and see log.txt. 
 * 			 If no text is generating while you are taking actions then something is wrong. 
 */
//diCore: This line will include the diCore functionality into your plugin
require_once dirname(__FILE__) . "/../diCore/diCore_lib.php";

//My customizations
include "interfaces/IPost.php";
include "MyActivation.php";
include "MyPost.php";
include "myHooks.php";

//Custom Hooks
add_action( 'before_delete_post',  array( 'myHooks', 'before_delete_post' ) );
add_action( 'save_post',  array( 'myHooks', 'save_post' ) );

//diCore: This line will register diCore hooks
diHooks::register_hooks(__FILE__);
?>