<?php
/*
* @Author 		ParaTheme
* @Folder	 	wp-resume-builder/templates

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit; // if direct access 


	$resume_data = get_post_meta( $post_id, 'resume_data', true );
	$resume_sections = get_post_meta( $post_id, 'resume_sections', true );
	$resume_section_data = get_post_meta( $post_id, 'resume_section_data', true );
	$resume_section_display = get_post_meta( $post_id, 'resume_section_display', true );	
	$section_entries_data = get_post_meta( $post_id, 'section_entries_data', true );

	$wp_rb_themes = get_post_meta( $post_id, 'wp_rb_themes', true );

	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id),'full' );
	$thumb_url = $thumb['0'];





