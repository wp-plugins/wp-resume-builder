<?php

/*
* @Author 		ParaTheme
* @Folder	 	wp-resume-builder/themes/flat

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit; // if direct access 

	include wp_rb_plugin_dir.'/templates/variables.php';
	
	//var_dump($section_entries_data['skill']['entries']);
	$html.= '';
	$html.= '<div class="wp-rb-container">';
	$html.= '<div class="wp-rb '.$wp_rb_themes.'">';	
	
	$html.= '<div class="side-one">';
	
	$html.= '<div class="thumbnail"><img src="'.$thumb_url.'" /></div>';	 //.thumbnail
	$html.= '<div class="title">'.$resume_data['title'].'</div>';	 //.title
	$html.= '<div class="subtitle">'.$resume_data['subtitle'].'</div>';	 //.subtitle	
	$html.= '<div class="details">'.$resume_data['details'].'</div>';	 //.details
	
	$html.= '<div class="social">';
	$html.= '<div class="title">'.__('Social','wp_rb').'</div>';	 //.title
	
	if(!empty($section_entries_data['social']['entries'])){
		
		foreach($section_entries_data['social']['entries'] as $social_key=>$social_values){
			foreach($social_values as $social){
				$html.= '<div class="social-data">'.$social.'</div>';	 //.details
				}
			
			}
		
		}
	
	$html.= '</div>';	 //.social
	
	
	$html.= '<div class="skill">';
	$html.= '<div class="title">'.__('Skill','wp_rb').'</div>';	 //.title
	
	if(!empty($section_entries_data['skill']['entries'])){
		
		foreach($section_entries_data['skill']['entries'] as $skill_key=>$skill_values){
			$html.= '<div  class="skill-data"><div style="width:'.$skill_values['level'].'" class="skill-value">&nbsp;&nbsp;'.$skill_values['name'].'&nbsp;&nbsp;</div></div>';	 //.social-data
			
			}
		
		}
	
	$html.= '</div>';	 //.skill	
	
	
	
	$html.= '<div class="contact-info">';
	$html.= '<div class="title">'.__('Contact info','wp_rb').'</div>';	 //.title
	
	if(!empty($section_entries_data['contact_info']['entries'])){
		
		foreach($section_entries_data['contact_info']['entries'] as $contact_key=>$contact_values){
			foreach($contact_values as $contact){
				$html.= '<div class="contact-data">'.$contact.'</div>';	 //.details
				}
			
			}
		
		}
	
	$html.= '</div>';	 //.social	
	
	
			
	
	$html.= '</div>'; // .side-one
	
	$html.= '<div class="side-two">';
	
	$html.= '<div class="sections">';
	
	foreach($resume_sections as $section_key=>$section_name){
		
		$html.= '<div class="section">';
		if(!empty($resume_section_data[$section_key]['title'])){
			$html.= '<div class="title">'.$resume_section_data[$section_key]['title'].'</div>';
			}	
		
		if(!empty($resume_section_data[$section_key]['subtitle'])){
			$html.= '<div class="subtitle">'.$resume_section_data[$section_key]['subtitle'].'</div>';
			}
		
		if(!empty($resume_section_data[$section_key]['details'])){
			$html.= '<div class="details">'.$resume_section_data[$section_key]['details'].'</div>';
			}
		
		
		foreach($section_entries_data[$section_key]['entries'] as $entries_key=>$entries){
			$html.= '<div class="entry">';
			foreach($entries as $entry_key=>$entry_value){
				
				if(!empty($entry_value)){
					$html.= '<div class="data data-'.$entry_key.'">'.$entry_value.'</div>'; //.entry
					}
				
	
				}
			$html.= '</div>';	//.entry
			}
		
		
					
		$html.= '</div>';	//.section		
		
		}
	
	$html.= '</div>';	//.sections
	$html.= '</div>';	//.side-two	
	
	
	
	
	$html.= '</div>';	// .wp-rb	
	$html.= '</div>'; // .wp-rb-container
	
	
	
	
	
	
	