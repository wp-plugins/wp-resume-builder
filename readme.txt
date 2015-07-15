=== WP Resume Builder ===
	Contributors: paratheme
	Donate link: http://paratheme.com
	Tags:  Resumes Builder, Resumes, Resume, resume builder online
	Requires at least: 4.1
	Tested up to: 4.2.2
	Stable tag: 1.0.0
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html

	User & Developer friendly resume builder.

== Description ==


WP Resume Builder allows you to create your perfect Resume/CV/Biodata via WordPress, add your own fields to create resume via addon support.


### WP Resume Builder by http://paratheme.com

* [See the Live demo!&raquo;](http://paratheme.com/demo/wp-resume-builder/)



<strong>Plugin Features</strong>

* Filterable input fields.
* Resume thumbnail.
* Predefined fields for Education, Experiences, Contact Info, Award, Skill, Social, Interest, Language, Portfolio.
* Graphical(percentage bar) represantation for skill values.
* Ajax add more section entry.

<strong>Extensible support</strong>

you can extend resume input fields by filter hook,
we have following filter hook for resume admin input

* wp_rb_data_args
* wp_rb_filter_sections
* wp_rb_filter_sections_args
* wp_rb_section_properties

for eaxample you can extend resume section by filter hook wp_rb_filter_sections() as follows
in the same filter you can also remove any section by unset().
`
add_filter('wp_rb_filter_sections', 'wp_rb_sections_add');


function wp_rb_sections_add($sections)
	{
		$sections_new = array_merge($sections, array("tour"=>"Tour"));
		
		//unset($sections_new['social']); // remove sections ex: social
		
		return $sections_new;
	}
`

Please see the demo addon inside plugin folder "demo-addon" find the zip (wp-resume-builder-addon-filters.zip) file you can install as plugin and ready to customize.


== Installation ==

1. Install as regular WordPress plugin.<br />
2. Go your plugin setting via WordPress Dashboard and find "<strong>WP Resume Builder</strong>" activate it.<br />

After activate plugin you will see "Resume" menu at left side on WordPress dashboard click "add New" and use the options field "Resumes Data"<br />

<br />
<strong>How to use on page or post</strong><br />
When Resumes options setup done please publish Post Grid as like post or page<br />

and then copy shortcode from top of <strong>Resumes Options</strong> `[wp_rb  id="123456" ]`<br />

then paste this shortcode anywhere in your page to display grid<br />



== Screenshots ==

1. screenshot-1
2. screenshot-2
3. screenshot-3
4. screenshot-4
5. screenshot-5


== Changelog ==


	= 1.0.0 =
    * 12/07/2015 Initial release.
