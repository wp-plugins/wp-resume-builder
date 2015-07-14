<?php
/*
Plugin Name: WP Resume Builder
Plugin URI: http://paratheme.com
Description: Awesome Resume Builder.
Version: 1.0.0
Author: paratheme
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class WPResumeBuilder{
	
	public function __construct(){
	
	define('wp_rb_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('wp_rb_plugin_dir', plugin_dir_path( __FILE__ ) );
	define('wp_rb_wp_url', 'https://wordpress.org/plugins/wp-resume-builder/' );
	define('wp_rb_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/wp-resume-builder' );
	define('wp_rb_pro_url','http://paratheme.com/' );
	define('wp_rb_demo_url', 'http://paratheme.com/demo/wp-resume-builder/' );
	define('wp_rb_conatct_url', 'http://paratheme.com/contact/' );
	define('wp_rb_qa_url', 'http://paratheme.com/qa/' );
	define('wp_rb_plugin_name', 'WP Resume Builder' );
	define('wp_rb_plugin_version', '1.0.0' );
	define('wp_rb_customer_type', 'free' );	 // pro & free	
	define('wp_rb_share_url', 'https://wordpress.org/plugins/wp-resume-builder/' );
	define('wp_rb_tutorial_video_url', '//www.youtube.com/embed/YXwUFSU23iU?rel=0' );
	
	
	//require_once( plugin_dir_path( __FILE__ ) . 'includes/meta.php');
	require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php');
	//require_once( plugin_dir_path( __FILE__ ) . 'includes/ResumesBuilderClass.php');
	
	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-types.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-meta.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-input-admin.php');
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-shortcodes.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-functions.php');
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-settings.php');		
	
	
	add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
	add_action( 'wp_enqueue_scripts', array( $this, 'wp_rb_front_scripts' ) );
	add_action( 'admin_enqueue_scripts', array( $this, 'wp_rb_admin_scripts' ) );
	
	}
	
	public function wp_rb_install(){
		
		do_action( 'wp_rb_action_install' );
		
		}		
		
	public function wp_rb_uninstall(){
		
		do_action( 'wp_rb_action_uninstall' );
		}		
		
	public function wp_rb_deactivation(){
		
		do_action( 'wp_rb_action_deactivation' );
		}
		
	public function wp_rb_front_scripts(){
		wp_enqueue_script('jquery');

		wp_enqueue_style('wp_rb_style', wp_rb_plugin_url.'css/style.css');
		wp_enqueue_script('masonry.pkgd.min', plugins_url( '/js/masonry.pkgd.min.js' , __FILE__ ) , array( 'jquery' ));
		
		wp_enqueue_style('font-awesome', wp_rb_plugin_url.'css/font-awesome.css');
		
		//ParaAdmin
		wp_enqueue_style('ParaAdmin', wp_rb_plugin_url.'ParaAdmin/css/ParaAdmin.css');
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));		
		
		}

	public function wp_rb_admin_scripts(){
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');

						
		wp_enqueue_script('wp_rb_admin_js', plugins_url( '/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'wp_rb_admin_js', 'wp_rb_ajax', array( 'wp_rb_ajaxurl' => admin_url( 'admin-ajax.php')));
		
		
		wp_enqueue_style('wp_rb_admin_style', wp_rb_plugin_url.'admin/css/style.css');

		//ParaAdmin
		wp_enqueue_style('ParaAdmin', wp_rb_plugin_url.'ParaAdmin/css/ParaAdmin.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));
		}
	
	
	
	
	}

new WPResumeBuilder();