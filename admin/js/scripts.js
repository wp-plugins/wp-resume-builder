jQuery(document).ready(function($)
	{



		$(document).on('click', '.wp_rb_sections_list .section-remove', function()
			{
				
				if (confirm('Are you sure ?')) {
					
					$(this).parent().parent().remove();
				}
			})



		$(document).on('click', '.wp_rb_sections_list .entry-remove', function()
			{
				
				if (confirm('Are you sure ?')) {
					
					$(this).parent().remove();
				}
			})



		$(document).on('click', '.wp_rb_sections_list .add-entries', function()
			{
				var section_id = $(this).attr('section-id');
				var entry_id = $.now();				
				
				$(this).html('Wait...');
				
				//alert('Hello');
				
				$.ajax(
					{
				type: 'POST',
				context: this,
				url:wp_rb_ajax.wp_rb_ajaxurl,
				data: {"action": "wp_rb_add_entry_ajax", "section_id":section_id,"entry_id":entry_id,},
				success: function(data)
						{	
						
							$('.entries-'+section_id).append(data);
							$(this).html('Add New');
							
	
	
						
						}
					});				
			})











	});	







