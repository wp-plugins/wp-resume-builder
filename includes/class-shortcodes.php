<?php

/*
* @Author 		ParaTheme
* @Folder	 	wp-resume-builder/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_wp_rb_shortcodes{
	
    public function __construct(){
		
		add_shortcode( 'wp_rb', array( $this, 'wp_rb_display' ) );

   		}
		
		

	public function wp_rb_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(
					'id' => '',
					), $atts);
	
			$html = '';
			$post_id = $atts['id'];

			$wp_rb_themes = get_post_meta( $post_id, 'wp_rb_themes', true );
			$wp_rb_license_key = get_option('wp_rb_license_key');
			
/*
			if(empty($wp_rb_license_key))
				{
					return '<b>"'.wp_rb_plugin_name.'" Error:</b> Please activate your license.';
				}

*/
			
			$class_wp_rb_functions = new class_wp_rb_functions();
			$wp_rb_themes_dir = $class_wp_rb_functions->wp_rb_themes_dir();
			$wp_rb_themes_url = $class_wp_rb_functions->wp_rb_themes_url();

			
			
			echo '<link  type="text/css" media="all" rel="stylesheet"  href="'.$wp_rb_themes_url[$wp_rb_themes].'/style.css" >';				

			include $wp_rb_themes_dir[$wp_rb_themes].'/index.php';				

			return $html;
	
	
	}
		
	
	}
	
	new class_wp_rb_shortcodes();