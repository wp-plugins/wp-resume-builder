<?php

/*
* @Author 		ParaTheme
* @Folder	 	wp-resume-builder/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_wp_rb_input_admin{
	
	
	
	
	public function resume_data_args($args = array()){
		
			 $args = array(	'title'=>'Resume Title',
							'subtitle'=>'Resume Subtitle',
							'details'=>'Resume Details',
							);
								
			foreach(apply_filters( 'wp_rb_data_args', $args ) as $args_key=> $args_name){
				
					$data_args_list[$args_key] = $args_name;
				}	
					
			return $data_args_list;		

		}
	
	
	
	public function sections($sections = array()){
		
			 $sections = array(
								'education'=> 'Education',
								'experiences'=> 'Experiences',									
								'contact_info'=> 'Contact Info',
								'award'=> 'Award',	
								'skill'=> 'Skill',																		
								'social'=> 'Social',	
								'interest'=> 'Interest',
								'language'=> 'Language',
								'portfolio'=> 'Portfolio',								
								);
								
			foreach(apply_filters( 'wp_rb_filter_sections', $sections ) as $section_key=> $section_name){
				
					$section_list[$section_key] = $section_name;
				}	
					
			return $section_list;		

		}	
	
		
	public function section_properties($properties = array()){
		
			 $properties = array(	'title'=>'Title',
			 						'subtitle'=>'Subtitle',
									'details'=>'Details',
									);
								
			foreach(apply_filters( 'wp_rb_section_properties', $properties ) as $properties_key=> $properties_name){
				
					$properties_list[$properties_key] = $properties_name;
				}	
					
			return $properties_list;		

		}
		
		
		
	public function section_entries_args($entries_args = array()){
		
		 $entries_args = array(
						'education'=> array('title','subtitle','year','details',),
						'experiences'=> array('title','subtitle','year','details',),									
						'contact_info'=> array('email','url','location','phone'),
						'award'=> array('title','subtitle','year','details',),	
						'skill'=> array('name','level','details'),																		
						'social'=> array('facebook','twitter','linkedin'),	
						'interest'=> array('name','level','details'),
						'language'=> array('name','level','details'),
						'language'=> array('name','level','details'),									
						'portfolio'=> array('name','url','source','details',), //source can be image url or youtube video										
						);	
								
			foreach(apply_filters( 'wp_rb_filter_sections_args', $entries_args ) as $args_key=> $args_name){
				
					$entries_args_list[$args_key] = $args_name;
				}	
					
			return $entries_args_list;

		}		
		
		
		
	public function section_input(){
		
		global $post;
		
		$html = '';
		
		$sections = get_post_meta($post->ID, 'resume_sections');
		$resume_section_data = get_post_meta($post->ID, 'resume_section_data');
		$resume_section_display = get_post_meta($post->ID, 'resume_section_display');			
		//var_dump($resume_section_data);
		
		if(!empty($resume_section_data)){
			$resume_section_data = $resume_section_data[0];
			}
		else{
			$resume_section_data = array();
			}
		
		
		if(empty($sections)){
			$sections = $this->sections();
			}
		else{
			$sections = array_merge($sections[0],$this->sections() );
			}

		$section_properties = $this->section_properties();	
	
		
		
			
			
		
		$html.= '<div class="wp_rb_sections_list expandable">';
		
		
		
		foreach($sections as $section_key=>$section_name){
				
				//var_dump($resume_section_display[$section_key]);
				
			$html.= '<div class="items">';
			$html.= '<div class="header">'.$section_name.'<div class="section-remove">X</div>';
			
			$html.= '<input class="section-display" name="resume_section_display['.$section_key.']" type="checkbox" value="yes" ';
			if(!empty($resume_section_display[0][$section_key]) && $resume_section_display[0][$section_key]=='yes'){
				
				$html.= 'checked';
				}
			
			$html.= ' /></div>'; // .header
			$html.= '<input type="hidden" name="resume_sections['.$section_key.']" value="'.htmlentities($section_name).'" />';						
			$html.= '<div class="options">';	
			
			//var_dump($section_properties);
			
			foreach($section_properties as $properties_key=>$properties_name){
				
				if(empty($resume_section_data[$section_key][$properties_key])){
					$resume_section_data[$section_key][$properties_key] = '';
					}
				
				$html.= 'Section '.$properties_key.'<br/>';
				$html.= '<input type="text" placeholder="'.$properties_key.'" name="resume_section_data['.$section_key.']['.$properties_key.']" value="'.htmlentities($resume_section_data[$section_key][$properties_key]).'" /><br/>';				
				
				
				
				}
			$html.= $this->section_entries($section_key,$section_name);
			$html.= '</div>'; // .options
			$html.= '</div>'; // .items
			}
			
			
		$html.= '</div>';
		
		return $html;
		}		
		
		
		
	public function section_entries($section_key, $section_name){
			
			global $post;
			$section_entries_args = $this->section_entries_args();
			$section_entries_data = get_post_meta($post->ID, 'section_entries_data');				

			
			//var_dump($section_entries_data[0][$section_key]['entries']);
			
			
			$html = '';			
			$html.= '<div class="entries entries-'.$section_key.'">';
						
			
			if(!empty($section_entries_data[0][$section_key]['entries']))
				{
					$section_entries_data =  $section_entries_data[0][$section_key]['entries'];
				}
			else
				{
					$section_entries_data =  array('0'=>'');
				}
	
			//var_dump($section_entries_args[$section_key]);
			//var_dump($section_entries_data);			

			foreach($section_entries_data as $entry_key=>$entry_value){
				$html.= '<div class="entry">';
				$html.= '<div class="entry-remove">X</div>';
				
			//var_dump($section_entries_args);				
				
				foreach($section_entries_args[$section_key] as $args_key ){
					
					if(empty($section_entries_data[$entry_key][$args_key])){
					
						$section_entries_data[$entry_key][$args_key] = '';
						}
					
					$html.= '<input placeholder="'.$args_key.'" type="text" name="section_entries_data['.$section_key.'][entries]['.$entry_key.']['.$args_key.']" value="'.htmlentities($section_entries_data[$entry_key][$args_key]).'" /><br>';
					
					}
				
				
				$html.= '</div>'; // .entry
				
				}


				
			$html.= '</div>'; // .entries
			
			$html.= '<div class="add-entries button" section-id="'.$section_key.'" >'.__('Add','wp_rb').' '.$section_name.'</div>';			
			
			
			return $html;
		}
		
		
		
	
	}