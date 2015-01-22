<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function rootstrap_option_name() {

        // This gets the theme name from the stylesheet
        $themename = wp_get_theme();
        $themename = preg_replace("/\W/", "_", strtolower($themename) );

        $rootstrap_settings = get_option( 'rootstrap' );
        $rootstrap_settings['id'] = $themename;
        update_option( 'rootstrap', $rootstrap_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *  
 */

function rootstrap_options() {

		// Layout options
		$site_layout = array('pull-left' => __('Right Sidebar', 'rootstrap'),'pull-right' => __('Left Sidebar', 'rootstrap'));
	
       // Test data
        $test_array = array(
                'one' => __('One', 'rootstrap_framework_theme'),
                'two' => __('Two', 'rootstrap_framework_theme'),
                'three' => __('Three', 'rootstrap_framework_theme'),
                'four' => __('Four', 'rootstrap_framework_theme'),
                'five' => __('Five', 'rootstrap_framework_theme')
        );

        // Multicheck Array
        $multicheck_array = array(
                'one' => __('French Toast', 'rootstrap_framework_theme'),
                'two' => __('Pancake', 'rootstrap_framework_theme'),
                'three' => __('Omelette', 'rootstrap_framework_theme'),
                'four' => __('Crepe', 'rootstrap_framework_theme'),
                'five' => __('Waffle', 'rootstrap_framework_theme')
        );

        // Multicheck Defaults
        $multicheck_defaults = array(
                'one' => '1',
                'five' => '1'
        );

       
        // $radio = array('0' => __('No', 'rootstrap'),'1' => __('Yes', 'rootstrap'));

     // Pull all the categories into an array
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
                $options_categories[$category->cat_ID] = $category->cat_name;
        }

        // Pull all tags into an array
        $options_tags = array();
        $options_tags_obj = get_tags();
        foreach ( $options_tags_obj as $tag ) {
                $options_tags[$tag->term_id] = $tag->name;
        }


        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
                $options_pages[$page->ID] = $page->post_title;
        }

       	// Pull all the pages into an array
		// $options_slider = array();  
		// $options_slider_obj = get_posts('post_type=custom_slider');
		// $options_slider[''] = 'Select a slider:';
		// foreach ($options_slider_obj as $post) {
	    // 	$options_slider[$post->ID] = $post->post_title;
		// }

        // If using image radio buttons, define a directory path
        $imagepath =  get_template_directory_uri() . '/images/';


		// fixed or scroll position
		$fixed_scroll = array('scroll' => 'Scroll', 'fixed' => 'Fixed');
			
		$options = array();

		$options[] = array( 'name' => __('Main', 'rootstrap'),
							'type' => 'heading');
							
		$options[] = array( 'name' => __('Custom logo', 'rootstrap'),
							'desc' => __('Upload a 200px x 66px PNG/GIF/jpg logo image that will represent your websites logo', 'rootstrap'),
							'id' => 'logo_uploader',
							'std' => '',
							'type' => 'upload');
							
		$options[] = array( 'name' => __('Custom Favicon', 'rootstrap'),
							'desc' => __('Upload a 32px x 32px PNG/GIF image that will represent your websites favicon', 'rootstrap'),
							'id' => 'custom_favicon',
							'std' => '',
							'type' => 'upload');
		
		$options[] = array( 'name' => __('Do You want to display image slider on the Home Page?','rootstrap'),
							'desc' => __('Check if you want to enable slider', 'rootstrap'),
							'id' => 'rootstrap_slider_checkbox',
							'std' => 1,
							'type' => 'checkbox');

		$options[] = array( 'name' => __('Slider Category', 'rootstrap'),
							'desc' => __('Select a category for the featured post slider', 'rootstrap'),
							'id' => 'rootstrap_slide_categories',
							'type' => 'select',
							'class' => 'hidden',
							'options' => $options_categories);			
							
		$options[] = array( 'name' => __('Number of slide items', 'rootstrap'),
							'desc' => __('Enter the number of slide items', 'rootstrap'),
							'id' => 'rootstrap_slide_number',
							'std' => '3',
							'class' => 'hidden',
							'type' => 'text');

		$options[] = array( 'name' => __('Website Layout Options', 'rootstrap'),
							'desc' => __('Choose between Left and Right sidebar options to be used as default', 'rootstrap'),
							'id' => 'site_layout',
							'std' => 'pull-left',
							'type' => 'select',
							'class' => 'mini',
							'options' => $site_layout);

		$options[] = array( 'name' => __('Element color', 'rootstrap'),
							'desc' => __('Default used if no color is selected, select a  color for content icons and content link', 'rootstrap'),
							'id' => 'element_color',
							'std' => '',
							'type' => 'color');

		$options[] = array( 'name' => __('Element color on hover', 'rootstrap'),
							'desc' => __('Default used if no color is selected, select a hover color for content icons and content link', 'rootstrap'),
							'id' => 'element_color_hover',
							'std' => '',
							'type' => 'color');


		$options[] = array( 'name' => __('Action Button', 'rootstrap'),
							'type' => 'heading');

		$options[] = array( 'name' => __('Call For Action Text', 'rootstrap'),
							'desc' => __('Enter the text for call for action section', 'rootstrap'),
							'id' => 'w2f_cfa_text',
							'std' => '',
							'type' => 'textarea');	
							
		$options[] = array( 'name' => __('Call For Action Button Title', 'rootstrap'),
							'desc' => __('Enter the title for Call For Action button', 'rootstrap'),
							'id' => 'w2f_cfa_button',
							'std' => '',
							'type' => 'text');	
							
		$options[] = array( 'name' => __('CFA button link', 'rootstrap'),
							'desc' => __('Enter the link for Call For Action button', 'rootstrap'),
							'id' => 'w2f_cfa_link',
							'std' => '',
							'type' => 'text');
		
		$options[] = array( 'name' => __('Call For Action Text Color', 'rootstrap'),
							'desc' => __('Default used if no color is selected', 'rootstrap'),
							'id' => 'cfa_color',
							'std' => '',
							'type' => 'color');

		$options[] = array( 'name' => __('Call For Action Background Color', 'rootstrap'),
							'desc' => __('Default used if no color is selected', 'rootstrap'),
							'id' => 'cfa_bg_color',
							'std' => '',
							'type' => 'color');

		$options[] = array( 'name' => __('Call For Action Button Border Color', 'rootstrap'),
							'desc' => __('Default used if no color is selected', 'rootstrap'),
							'id' => 'cfa_btn_color',
							'std' => '',
							'type' => 'color');
		$options[] = array( 'name' => __('Call For Action Button Text Color', 'rootstrap'),
							'desc' => __('Default used if no color is selected', 'rootstrap'),
							'id' => 'cfa_btn_txt_color',
							'std' => '',
							'type' => 'color');	

		$options[] = array( 'name' => __('Font link color setting', 'rootstrap'),
							'type' => 'heading');
		$options[] = array( 'name' => __('Heading Color', 'rootstrap'),
							'desc' => __('Color for all headings (h1-h6)', 'rootstrap'),
							'id' => 'heading_color',
							'std' => '',
							'type' => 'color');
							
		$options[] = array( 'name' => __('Link Color', 'rootstrap'),
							'desc' => __('Default used if no color is selected, Select color for side bar alnd other links', 'rootstrap'),
							'id' => 'link_color',
							'std' => '',
							'type' => 'color');
						
		$options[] = array( 'name' => __('Link:hover Color', 'rootstrap'),
							'desc' => __('Default used if no color is selected, Select Hover color for side bar and other links.', 'rootstrap'),
							'id' => 'link_hover_color',
							'std' => '',
							'type' => 'color');
							
		$options[] = array( 'name' => __('Link:active Color', 'rootstrap'),
							'desc' => __('Default used if no color is selected, Select active color for side bar links', 'rootstrap'),
							'id' => 'link_active_color',
							'std' => '',
							'type' => 'color');
							
		$options[] = array( 'name' => __('Header', 'rootstrap'),
							'type' => 'heading');
							
		$options[] = array( 'name' => __('Top nav background color', 'rootstrap'),
							'desc' => __('Default used if no color is selected.', 'rootstrap'),
							'id' => 'top_nav_bg_color',
							'std' => '',
							'type' => 'color');
							
		$options[] = array( 'name' => __('Top nav item color', 'rootstrap'),
							'desc' => __('Link color', 'rootstrap'),
							'id' => 'top_nav_link_color',
							'std' => '',
							'type' => 'color');

		$options[] = array( 'name' => __('Top nav dropdown background color', 'rootstrap'),
							'desc' => __('Background of dropdown item hover color', 'rootstrap'),
							'id' => 'top_nav_dropdown_bg',
							'std' => '',
							'type' => 'color');
							
		$options[] = array( 'name' => __('Top nav dropdown item color', 'rootstrap'),
							'desc' => __('Dropdown item color', 'rootstrap'),
							'id' => 'top_nav_dropdown_item',
							'std' => '',
							'type' => 'color');

		$options[] = array( 'name' => __('Footer', 'rootstrap'),
							'type' => 'heading');
		
		$options[] = array( 'name' => __('Footer Widget Area Background Color', 'rootstrap'),
							'id' => 'footer_widget_bg_color',
							'std' => '',
							'type' => 'color');

		$options[] = array( 'name' => __('Footer Background Color', 'rootstrap'),
							'id' => 'footer_bg_color',
							'std' => '',
							'type' => 'color');
							
		$options[] = array( 'name' => __('Footer Text Color', 'rootstrap'),
							'id' => 'footer_text_color',
							'std' => '',
							'type' => 'color');

		$options[] = array( 'name' => __('Footer Link Color', 'rootstrap'),
							'id' => 'footer_link_color',
							'std' => '',
							'type' => 'color');	
								
		$options[] = array(	'name' => __('Footer information', 'rootstrap'),
                			'desc' => __('Copyright text in footer', 'rootstrap'),
                			'id' => 'custom_footer_text',
                			'std' => '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" >' . get_bloginfo( 'name', 'display' ) . '</a>  All rights reserved.',
                			'type' => 'textarea');

		$options[] = array( 'name' => __('Social', 'rootstrap'),
							'type' => 'heading');
		$options[] = array(	'name' => __('Add full URL for your social network profiles', 'rootstrap'),
                			'desc' => __('Facebook', 'rootstrap'),
                			'id' => 'social_facebook',
                			'std' => '',
                			'class' => 'mini',
                			'type' => 'text');

		$options[] = array(	'id' => 'social_twitter',
							'desc' => __('Twitter', 'rootstrap'),
                			'std' => '',
                			'class' => 'mini',
                			'type' => 'text');

		$options[] = array(	'id' => 'social_googleplus',
							'desc' => __('Google+', 'rootstrap'),
                			'std' => '',
                			'class' => 'mini',
                			'type' => 'text');

		$options[] = array(	'id' => 'social_youtube',
							'desc' => __('Youtube', 'rootstrap'),
                			'std' => '',
                			'class' => 'mini',
                			'type' => 'text');	                 				    

		$options[] = array(	'id' => 'social_linkedin',
							'desc' => __('LinkedIn', 'rootstrap'),
                			'std' => '',
                			'class' => 'mini',
                			'type' => 'text');	 

		$options[] = array(	'id' => 'social_pinterest',
							'desc' => __('Pinterest', 'rootstrap'),
                			'std' => '',
                			'class' => 'mini',
                			'type' => 'text');

		$options[] = array(	'id' => 'social_rss',
							'desc' => __('RSS Feed', 'rootstrap'),
                			'std' => '',
                			'class' => 'mini',
                			'type' => 'text');

		$options[] = array(	'id' => 'social_tumblr',
							'desc' => __('Tumblr', 'rootstrap'),
                			'std' => '',
                			'class' => 'mini',
                			'type' => 'text');	

        $options[] = array(	'id' => 'social_flickr',
							'desc' => __('Flickr', 'rootstrap'),
                			'std' => '',
                			'class' => 'mini',
                			'type' => 'text');	

        $options[] = array(	'id' => 'social_instagram',
							'desc' => __('Instagram', 'rootstrap'),
                			'std' => '',
                			'class' => 'mini',
                			'type' => 'text');	

        $options[] = array(	'id' => 'social_dribbble',
							'desc' => __('Dribbble', 'rootstrap'),
                			'std' => '',
                			'class' => 'mini',
                			'type' => 'text');	
		$options[] = array( 'name' => __('Social Icon Color', 'rootstrap'),
							'desc' => __('Default used if no color is selected', 'rootstrap'),
							'id' => 'social_color',
							'std' => '',
							'type' => 'color');
						
		$options[] = array( 'name' => __('Social Icon:hover Color', 'rootstrap'),
							'desc' => __('Default used if no color is selected', 'rootstrap'),
							'id' => 'social_hover_color',
							'std' => '',
							'type' => 'color');	 

		$options[] = array( 'name' => __('Other', 'rootstrap'),
							'type' => 'heading');
		
		$options[] = array( 'name' => __('Custom CSS', 'rootstrap'),
							'desc' => __('Additional CSS', 'rootstrap'),
							'id' => 'custom_css',
							'std' => '',
							'type' => 'textarea');
		return $options;
}