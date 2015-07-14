<?php

/*
* @Author 		ParaTheme
* @Folder	 	wp-resume-builder/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_wp_rb_post_types{
	
	public function __construct(){
		
		add_action( 'init', array( $this, 'wp_rb_posttype_resume' ), 0 );
		
		}
	
	public function wp_rb_posttype_resume(){
		if ( post_type_exists( "resume" ) )
		return;

		$singular  = __( 'Resume', 'wp_rb' );
		$plural    = __( 'Resume', 'wp_rb' );
	 
	 
		register_post_type( "resume",
			apply_filters( "register_post_type_resume", array(
				'labels' => array(
					'name' 					=> $plural,
					'singular_name' 		=> $singular,
					'menu_name'             => __( $singular, 'wp_rb' ),
					'all_items'             => sprintf( __( 'All %s', 'wp_rb' ), $plural ),
					'add_new' 				=> __( 'Add New', 'wp_rb' ),
					'add_new_item' 			=> sprintf( __( 'Add %s', 'wp_rb' ), $singular ),
					'edit' 					=> __( 'Edit', 'wp_rb' ),
					'edit_item' 			=> sprintf( __( 'Edit %s', 'wp_rb' ), $singular ),
					'new_item' 				=> sprintf( __( 'New %s', 'wp_rb' ), $singular ),
					'view' 					=> sprintf( __( 'View %s', 'wp_rb' ), $singular ),
					'view_item' 			=> sprintf( __( 'View %s', 'wp_rb' ), $singular ),
					'search_items' 			=> sprintf( __( 'Search %s', 'wp_rb' ), $plural ),
					'not_found' 			=> sprintf( __( 'No %s found', 'wp_rb' ), $plural ),
					'not_found_in_trash' 	=> sprintf( __( 'No %s found in trash', 'wp_rb' ), $plural ),
					'parent' 				=> sprintf( __( 'Parent %s', 'wp_rb' ), $singular )
				),
				'description' => sprintf( __( 'This is where you can create and manage %s.', 'wp_rb' ), $plural ),
				'public' 				=> true,
				'show_ui' 				=> true,
				'capability_type' 		=> 'post',
				'map_meta_cap'          => true,
				'publicly_queryable' 	=> true,
				'exclude_from_search' 	=> false,
				'hierarchical' 			=> false,
				'rewrite' 				=> true,
				'query_var' 			=> true,
				'supports' 				=> array('title','thumbnail','custom-fields'),
				'show_in_nav_menus' 	=> false,
				'menu_icon' => 'dashicons-admin-users',
			) )
		); 
	 
	 
		}
	
	
	}
	
	new class_wp_rb_post_types();