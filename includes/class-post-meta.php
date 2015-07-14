<?php

/*
* @Author 		ParaTheme
* @Folder	 	wp-resume-builder/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_wp_rb_post_meta{
	
	public function __construct(){

		//meta box action for "resume"
		add_action('add_meta_boxes', array($this, 'meta_boxes_resume'));
		add_action('save_post', array($this, 'meta_boxes_resume_save'));

		}
		
	
	public function meta_boxes_resume($post_type) {
			$post_types = array('resume');
	 
			//limit meta box to certain post types
			if (in_array($post_type, $post_types)) {
				add_meta_box('resume_metabox',
				__('Resume Data','wp_rb'),
				array($this, 'resume_meta_box_function'),
				$post_type,
				'normal',
				'high');
			}
		}
	public function resume_meta_box_function($post) {
 
        // Add an nonce field so we can check for it later.
        wp_nonce_field('resume_nonce_check', 'resume_nonce_check_value');
 
        // Use get_post_meta to retrieve an existing value from the database.
        $resume_data = get_post_meta($post -> ID, 'resume_data', true);
        $resume_sections = get_post_meta($post -> ID, 'resume_sections', true);		
        $resume_section_data = get_post_meta($post -> ID, 'resume_section_data', true);
        $resume_section_display = get_post_meta($post -> ID, 'resume_section_display', true);		
        $section_entries_data = get_post_meta($post -> ID, 'section_entries_data', true);
		
        $wp_rb_themes = get_post_meta($post -> ID, 'wp_rb_themes', true);		
				
 
        // Display the form, using the current value.
		
		echo '<div class="para-settings">';
		
		echo '<div class="option-box">';
		echo '<p class="option-title">'.__('Shortcode','wp_rb').'</p>';
		echo '<p class="option-info">'.__("Copy this shortcode and paste on page or post where you want to display resume. <br />Use PHP code to your themes file to display resume.","wp_rb").'</p>';
		echo '<textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[wp_rb   id="'.$post->ID.'" ]</textarea>';
		echo '<textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >&lt;?php do_shortcode("[wp_rb id="'.$post->ID.'"  ]") ?></textarea>';
        
        
		echo '</div>';
		
echo '

        <ul class="tab-nav">
			<li nav="1" class="nav1 active">'.__('Content','wp_rb').'</li> 
            <li nav="2" class="nav2">'.__('Style','wp_rb').'</li>
            
                    
        </ul> <!-- tab-nav end -->
';


		echo '<ul class="box">';
		echo '<li style="display: block;" class="box1 tab-box active">';
		
		$class_wp_rb_input_admin = new class_wp_rb_input_admin();
		$resume_data_args = $class_wp_rb_input_admin->resume_data_args();
		
		foreach($resume_data_args as $args_key=>$args_value){
		
		echo '<div class="option-box">';
		echo '<p class="option-title">'.$args_value.'</p>';
		echo '<p class="option-info"></p>';
		echo '<input type="text" size="30" name="resume_data['.$args_key.']" value="';
		if(!empty($resume_data[$args_key])) 
		echo $resume_data[$args_key];
		echo '" />';
		echo '</div>';
		
		}
		
		
		
		
		echo '<div class="option-box">';
		echo '<p class="option-title">'.__('Resume Sections','wp_rb').'</p>';
		echo '<p class="option-info"></p>';
		
		$class_wp_rb_input_admin = new class_wp_rb_input_admin();
		echo $class_wp_rb_input_admin->section_input();
		echo '</div>';	
					
		echo '</li>';
		
		echo '<li style="display: none;" class="box2 tab-box">';
		
?>
				<div class="option-box">
                    <p class="option-title"><?php _e('Themes.','wp_rb'); ?></p>
                    <p class="option-info"><?php _e('Themes for Resume.','wp_rb'); ?></p>
                    <?php
					
					$class_wp_rb_functions = new class_wp_rb_functions();
					$wp_rb_themes_list = $class_wp_rb_functions->wp_rb_themes();

					?>
                    <select name="wp_rb_themes"  >
                    <?php
                    	
						foreach($wp_rb_themes_list as $key => $value)
							{
								?>
                                <option value="<?php echo $key; ?>" <?php if($wp_rb_themes== $key )echo "selected"; ?>><?php echo $value; ?></option>
                                
                                <?php
								
								
							}
					
					?>

                    </select>
				</div>
<?php
		
		echo '</li>';
	
		
		echo '</ui>';		
		

		echo '</div>'; // end of para-settings 



echo '

 <script>
 jQuery(document).ready(function($)
	{
		jQuery(function() {
		$( ".wp_rb_sections_list" ).sortable();
		$( ".entries" ).sortable();		
		
		//$( ".wp_rb_sections_list" ).disableSelection();
		});

})

</script> 

';





   		}
	
	
	public function meta_boxes_resume_save($post_id){
	 
			/*
			 * We need to verify this came from the our screen and with 
			 * proper authorization,
			 * because save_post can be triggered at other times.
			 */
	 
			// Check if our nonce is set.
			if (!isset($_POST['resume_nonce_check_value']))
				return $post_id;
	 
			$nonce = $_POST['resume_nonce_check_value'];
	 
			// Verify that the nonce is valid.
			if (!wp_verify_nonce($nonce, 'resume_nonce_check'))
				return $post_id;
	 
			// If this is an autosave, our form has not been submitted,
			//     so we don't want to do anything.
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
				return $post_id;
	 
			// Check the user's permissions.
			if ('page' == $_POST['post_type']) {
	 
				if (!current_user_can('edit_page', $post_id))
					return $post_id;
	 
			} else {
	 
				if (!current_user_can('edit_post', $post_id))
					return $post_id;
			}
	 
			/* OK, its safe for us to save the data now. */
	 
			// Sanitize the user input.
			$resume_data = stripslashes_deep($_POST['resume_data']);
			$resume_sections = stripslashes_deep($_POST['resume_sections']);			
			$resume_section_data = stripslashes_deep($_POST['resume_section_data']);
			$resume_section_display = stripslashes_deep($_POST['resume_section_display']);			
			$section_entries_data = stripslashes_deep($_POST['section_entries_data']);
			
			$wp_rb_themes = stripslashes_deep($_POST['wp_rb_themes']);			
					
			
			// Update the meta field.
			update_post_meta($post_id, 'resume_data', $resume_data);
			update_post_meta($post_id, 'resume_sections', $resume_sections);		
			update_post_meta($post_id, 'resume_section_data', $resume_section_data);
			update_post_meta($post_id, 'resume_section_display', $resume_section_display);			
			update_post_meta($post_id, 'section_entries_data', $section_entries_data);
			
			update_post_meta($post_id, 'wp_rb_themes', $wp_rb_themes);			
					
		}
	
	}


new class_wp_rb_post_meta();