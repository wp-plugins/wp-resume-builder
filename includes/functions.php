<?php
/*
* @Author 		ParaTheme
* @Folder	 	wp-resume-builder/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
	
	function wp_rb_add_entry_ajax()
		{
			
		$section_key = $_POST['section_id'];
		$entry_id = $_POST['entry_id'];		
		
		$class_wp_rb_input_admin = new class_wp_rb_input_admin();
		$section_entries_args = $class_wp_rb_input_admin->section_entries_args();
		
		
		$html = '';
		$html.= '<div class="entry">';
		$html.= '<div class="entry-remove">X</div>';
		foreach($section_entries_args[$section_key] as $args_key ){
			
			$html.= '<input placeholder="'.$args_key.'" type="text" name="section_entries_data['.$section_key.'][entries]['.$entry_id.']['.$args_key.']" value="" /><br>';
			
			}
		
		
		$html.= '</div>'; // .entry
			
		echo $html;
		
		die();
		
		}
	

add_action('wp_ajax_wp_rb_add_entry_ajax', 'wp_rb_add_entry_ajax');
add_action('wp_ajax_nopriv_wp_rb_add_entry_ajax', 'wp_rb_add_entry_ajax');
	
	
	
