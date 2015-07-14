<?php	


if ( ! defined('ABSPATH')) exit; // if direct access 



if(empty($_POST['resumes_builder_hidden']))
	{
		$resumes_builder_sections = get_option( 'resumes_builder_sections' );
		$resumes_builder_section_args = get_option( 'resumes_builder_section_args' );	
		$resumes_builder_section_icons = get_option( 'resumes_builder_section_icons' );

	}
else
	{	
		if($_POST['resumes_builder_hidden'] == 'Y') {
			//Form data sent
			$resumes_builder_sections = stripslashes_deep($_POST['resumes_builder_sections']);
			update_option('resumes_builder_sections', $resumes_builder_sections);
			
			$resumes_builder_section_args = stripslashes_deep($_POST['resumes_builder_section_args']);
			update_option('resumes_builder_section_args', $resumes_builder_section_args);			

			$resumes_builder_section_icons = stripslashes_deep($_POST['resumes_builder_section_icons']);
			update_option('resumes_builder_section_icons', $resumes_builder_section_icons);			

			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.', 'resumes_builder' ); ?></strong></p></div>
	
			<?php
			} 
	}
	
	
	
    $resumes_builder_customer_type = get_option('resumes_builder_customer_type');
    $resumes_builder_version = get_option('resumes_builder_version');
	
	
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__(resumes_builder_plugin_name.' Settings', 'resumes_builder')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="resumes_builder_hidden" value="Y">
        <?php settings_fields( 'resumes_builder_plugin_options' );
				do_settings_sections( 'resumes_builder_plugin_options' );
			
		?>

    <div class="para-settings resumes-builder-settings">
    
        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active">Options</li>       
            <li nav="2" class="nav2">Help & Upgrade</li>    
        </ul> <!-- tab-nav end --> 
		<ul class="box">
       		<li style="display: block;" class="box1 tab-box active">
            
			<div class="option-box">
				<p class="option-title"><?php _e('Resumes Builder Sections.','resumes_builder'); ?></p>
 				<p class="option-info">You can customize section name and properties here and add your own sections.</p>
				<div class="sections-adder">
            <?php 
				$ResumesBuilderClass = new ResumesBuilderClass();
				
				if(empty($resumes_builder_sections))
					{
						$resumes_builder_sections = $ResumesBuilderClass->sections;
					}

				if(empty($resumes_builder_section_args))
					{
						$resumes_builder_section_args = $ResumesBuilderClass->sections_entries_args;
					}

					echo '<div class="section-list">';
				foreach($resumes_builder_sections as $section_key=>$section_name)
					{
						echo '<div class="section section-'.$section_key.'">';
						
						echo '<div class="header">'.$section_name.'<span class="remove">X</span></div>';
						echo '<div class="args">
						<b>Section Name:</b><br/>
						<input type="text" name="resumes_builder_sections['.$section_key.']" value="'.$section_name.'" />';
						
						echo '<br/><br/><b>Section Fields:</b><br/>';
						echo '<table>';
						
						if(empty($resumes_builder_section_args[$section_key]))
							{
								$resumes_builder_section_args[$section_key] = array('title','subtitle','details');
							}
						
						foreach($resumes_builder_section_args[$section_key] as $arg)
							{
								echo '<tr>';
								echo '<td>';
								
								
								echo '<input type="text" name="resumes_builder_section_args['.$section_key.']['.$arg.']" value="'.$arg.'" />';
								echo '</td>';
								echo '<td>';
								
									
								
								
								
								
								echo '<span class="remove">X</span>
								</td>';

								
								echo '</tr>';
							}
							echo '</table>';
						echo '<div class="button add-new-args" section-key="'.$section_key.'">Add New</div>';
							
							
						echo '</div>';						
						
						
						
						
						echo '</div>';
						
					}
				echo '</div>';
				echo '<div class="button add-new-section">Add New</div>';


            
            ?>
               
                
                </div>
              


                    
        
        

        
        

                </div>

            
            </li>
                        
            <li style="display: none;" class="box2 tab-box">
				<div class="option-box">
                    <p class="option-title">Need Help ?</p>
                    <p class="option-info">Feel free to contact with any issue for this plugin, Ask any question via forum <a href="<?php echo resumes_builder_qa_url; ?>"><?php echo resumes_builder_qa_url; ?></a> <strong style="color:#139b50;">(free)</strong><br />

					<?php
                
                    if($resumes_builder_customer_type=="free")
                        {
                    
                            echo 'You are using <strong> '.$resumes_builder_customer_type.' version  '.$resumes_builder_version.'</strong> of <strong>'.resumes_builder_plugin_name.'</strong>, To get more feature you could try our premium version. ';
                            echo '<br /><a href="'.resumes_builder_pro_url.'">'.resumes_builder_pro_url.'</a>';
                            
                        }
                    else
                        {
                    
                            echo 'Thanks for using <strong> premium version  '.$resumes_builder_version.'</strong> of <strong>'.resumes_builder_plugin_name.'</strong> ';	
                            
                            
                        }
                    
                     ?>       

                    
                    </p>

                </div>
                
				<div class="option-box">
                    <p class="option-title">Submit Reviews...</p>
                    <p class="option-info">We are working hard to build some awesome plugins for you and spend thousand hour for plugins. we wish your three(3) minute by submitting five star reviews at wordpress.org. if you have any issue please submit at forum.</p>
                	<img class="resumes_builder-pro-pricing" src="<?php echo resumes_builder_plugin_url."css/five-star.png";?>" /><br />
                    <a target="_blank" href="<?php echo resumes_builder_wp_reviews; ?>">
                		<?php echo resumes_builder_wp_reviews; ?>
               		</a>
                    
                    
                    
                </div>
				<div class="option-box">
                    <p class="option-title">Please Share</p>
                    <p class="option-info">If you like this plugin please share with your social share network.</p>
                    <?php
                    
						echo resumes_builder_share_plugin();
					?>
                </div>
                
 
				<div class="option-box">
                    <p class="option-title">Video Tutorial</p>
                    <p class="option-info">Please watch this video tutorial.</p>
                	<iframe width="640" height="480" src="<?php echo resumes_builder_tutorial_video_url; ?>" frameborder="0" allowfullscreen></iframe>
                </div>



                
                
                
                
            </li>            
        </ul>
    
    
		

        
    </div>






<p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes','resumes_builder' ); ?>" />
                </p>
		</form>


</div>
