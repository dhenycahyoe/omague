<?php
/**
 * Theme options
 * 
 * @package OmaGue
 * @since OmaGue 0.3
 */

function optionsframework_option_name() {
   // This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 *  
 */

function optionsframework_options() {
	$options = array();		
	$options[] = array( 
		'name'	=> __('General', 'omague'),
		'type'	=> 'heading'
	);
	$options[] = array( 
		'name'	=> __('Custom Favicon', 'omague'),
		'desc'	=> __('Upload a favicon for your website, or specify the image address of your online favicon. (http://example.com/favicon.png)', 'omague'),
		'id'	=> 'omague_custom_favicon',
		'type'	=> 'upload'
	);


	/* ============================== End General Settings ================================= */					

	$options[] = array( 
		'name'	=> __('Social Network', 'omague'),
		'type'	=> 'heading'
	);
	
	$options[] = array( 
		'name'	=> __('Social settings', 'omague'),
		'desc'	=> __('<p>You can use the box below to change the default settings of social media, and adjust custom link your social media</p><p><i>example : http://link-social-media.tld/your_username</i></p>', 'omague'),
		'type'	=> 'info'
	);
	
	$options[] = array(
		'name' => __('First check for the activate and deactivate settings Social Media', 'omague'),
		'desc' => __('Click here to activate and deactivate settings of Social Media.', 'omague'),
		'id' => 'omague_showhidden_sosmed',
		'type' => 'checkbox');

	$options[] = array( 
		'name'	=> __('FeedBurner Username', 'omague'),
		'desc'	=> __('ex : http://feeds.feedburner.com/OmaGue', 'omague'),
		'id'	=> 'omague_feedburner_username',
		'type'	=> 'text'
	);
	
	$options[] = array( 
		'name'	=> __('Facebook Username', 'omague'),
		'desc'	=> __('ex : http://www.facebook.com/OmaGuecom', 'omague'),
		'id'	=> 'omague_fb_username',
		'type'	=> 'text'
	);
	
	$options[] = array( 
		'name'	=> __('Twitter Username', 'omague'),
		'desc'	=> __('ex : http://twitter.com/dhenycahyoe', 'omague'),
		'id'	=> 'omague_twitter_username',
		'type'	=> 'text'
	);
						
	$options[] = array( 
		'name'	=> __('Google Plus Username', 'omague'),
		'desc'	=> __('ex : http://gplus.to/dhenycahyoe', 'omague'),
		'id'	=> 'omague_gplus_username',
		'type'	=> 'text'
	);

	
	/* ============================== End Social Settings ================================= */
	
	$options[] = array( 
		'name'	=> __('SEO Optimation', 'omague'),
		'type'	=> 'heading'
	);
	$options[] = array( 
		'name'	=> __('Webmaster Tools Setting', 'omague'),
		'desc'	=> __('You can use the boxes below to verify with the different Webmaster Tools. Only enter the meta values/content. <br />ex: <i><meta name="google-site-verification" content="<b>k3o70s7u4ZamnjJLD001100110011</b>" /></i>', 'omague'),
		'type'	=> 'info'
	);
						
	$options[] = array( 
		'name'	=> __('Google Webmaster Tools', 'omague'),
		'desc'	=> __('<a href=\"http://www.google.com/webmasters\">Google webmaster tools &raquo;</a>', 'omague'),
		'id'	=> 'omague_meta_google',
		'std' => '',
		'type'	=> 'text'
	);
						
	$options[] = array( 
		'name'	=> __('Bing Webmaster', 'omague'),
		'desc'	=> __('<a href=\"http://www.bing.com/webmaster\">Bing webmaster &raquo;</a>', 'omague'),
		'id'	=> 'omague_meta_bing',
		'type'	=> 'text'
	);
						
	$options[] = array( 
		'name'	=> __('Alexa', 'omague'),
		'desc'	=> __('<a href=\"http://www.alexa.com\">Alexa &raquo;</a>', 'omague'),
		'id'	=> 'omague_meta_alexa',
		'std' => '',
		'type'	=> 'text'
	);

	$options[] = array( 
		'name' 	=> __('Analytic Code', 'omague'),
		'desc' 	=> __('Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag of your theme.', 'omague'),
		'id'	=> 'omague_analytic_code',
		'type'	=> 'textarea'
	);
						
	/* ============================== End Meta Verivication Settings ================================= */	
	
	$options[] = array( 
		'name' => __('About', 'omague'),
		'type' => 'heading'
	);
	
	$options[] = array( 
		'name' => __('About the OmaGue Themes','omague'),
		'desc' => __( '<p>OmaGue HTML 5 Minimalist and Responsive WordPress themes. is themes elegant, clean, simple and Responsive WordPress themes. It supports 9 widget areas, SEO meta settings, custom icon, support custom menus and multi level dropdown menus, Also translation ready.</p>
		<p>If you have any problem or questions, you can post on <a href=\"http://omague.com/contact\" target=\"_blank\"><b>OmaGue Themes Support</b></a> or contact me on Twitter <a href=\"http://twitter.com/dhenycahyoe\" target=\"_blank\"><b>@dhenycahyoe</b></a>.</p>', 'omague' ),
		'type' => 'info'
	);
	
	return $options;
}