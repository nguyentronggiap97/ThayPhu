<?php
/**
 * VW Lawyer Attorney Theme Customizer
 *
 * @package VW Lawyer Attorney
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_lawyer_attorney_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_lawyer_attorney_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-lawyer-attorney' ),
	    'description' => __( 'Description of what this panel does.', 'vw-lawyer-attorney' ),
	) );

	$wp_customize->add_section( 'vw_lawyer_attorney_left_right', array(
    	'title'      => __( 'General Settings', 'vw-lawyer-attorney' ),
		'priority'   => 30,
		'panel' => 'vw_lawyer_attorney_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_lawyer_attorney_theme_options',array(
	        'default' =>  __( 'Right Sidebar', 'vw-lawyer-attorney' ),
	        'sanitize_callback' => 'vw_lawyer_attorney_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_lawyer_attorney_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'vw-lawyer-attorney' ),
	        'section' => 'vw_lawyer_attorney_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','vw-lawyer-attorney'),
	            'Right Sidebar' => __('Right Sidebar','vw-lawyer-attorney'),
	            'One Column' => __('One Column','vw-lawyer-attorney'),
	            'Three Columns' => __('Three Columns','vw-lawyer-attorney'),
	            'Four Columns' => __('Four Columns','vw-lawyer-attorney'),
	            'Grid Layout' => __('Grid Layout','vw-lawyer-attorney')
	        ),
	) );
	
	//Top Bar(topbar)
	$wp_customize->add_section('vw_lawyer_attorney_contact',array(
		'title'	=> __('Contact Us','vw-lawyer-attorney'),
		'description'	=> __('Add contact us here','vw-lawyer-attorney'),
		'priority'	=> null,
		'panel' => 'vw_lawyer_attorney_panel_id',
	));

	$wp_customize->add_setting('vw_lawyer_attorney_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_lawyer_attorney_call',array(
		'label'	=> __('Phone Number','vw-lawyer-attorney'),
		'section'	=> 'vw_lawyer_attorney_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_lawyer_attorney_call1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_lawyer_attorney_call1',array(
		'label'	=> __('Email Address','vw-lawyer-attorney'),
		'section'	=> 'vw_lawyer_attorney_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_lawyer_attorney_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_lawyer_attorney_location',array(
		'label'	=> __('Address 1','vw-lawyer-attorney'),
		'section'	=> 'vw_lawyer_attorney_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_lawyer_attorney_location1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_lawyer_attorney_location1',array(
		'label'	=> __('Address 2','vw-lawyer-attorney'),
		'section'	=> 'vw_lawyer_attorney_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_lawyer_attorney_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_lawyer_attorney_time',array(
		'label'	=> __('Opening time.','vw-lawyer-attorney'),
		'section'	=> 'vw_lawyer_attorney_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_lawyer_attorney_time1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_lawyer_attorney_time1',array(
		'label'	=> __('Closing Time','vw-lawyer-attorney'),
		'section'	=> 'vw_lawyer_attorney_contact',
		'type'		=> 'text'
	));
	
	//home page slider
    $wp_customize->add_section( 'vw_lawyer_attorney_slidersettings' , array(
      'title'      => __( 'Slider Settings', 'vw-lawyer-attorney' ),
      'priority'   => null,
      'panel' => 'vw_lawyer_attorney_panel_id'
    ) );

	$wp_customize->add_setting('vw_lawyer_attorney_slider_hide_show',array(
        'default' => 'false',
        'sanitize_callback'  => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_lawyer_attorney_slider_hide_show',array(
	    'type' => 'checkbox',
	    'label' => __('Show / Hide slider','vw-lawyer-attorney'),
	    'section' => 'vw_lawyer_attorney_slidersettings',
	));

    for ( $count = 1; $count <= 4; $count++ ) {

    // Add color scheme setting and control.
    $wp_customize->add_setting( 'vw_lawyer_attorney_slider_page' . $count, array(
      'default'           => '',
      'sanitize_callback' => 'vw_lawyer_attorney_sanitize_dropdown_pages'
    ) );
    $wp_customize->add_control( 'vw_lawyer_attorney_slider_page' . $count, array(
      'label'    => __( 'Select Slide Image Page', 'vw-lawyer-attorney' ),
      'section'  => 'vw_lawyer_attorney_slidersettings',
      'type'     => 'dropdown-pages'
    ) );
    
    }
    
	//About
	$wp_customize->add_section('vw_lawyer_attorney_about1',array(
		'title'	=> __('About Section','vw-lawyer-attorney'),
		'description'	=> __('Add About sections below.','vw-lawyer-attorney'),
		'panel' => 'vw_lawyer_attorney_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	$posts[]='Select';	
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}
	
	$wp_customize->add_setting('vw_lawyer_attorney_about_setting',array(
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_lawyer_attorney_about_setting',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','vw-lawyer-attorney'),
		'section' => 'vw_lawyer_attorney_about1',
	));

	$wp_customize->add_setting('vw_lawyer_attorney_about_name',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	

	$wp_customize->add_control('vw_lawyer_attorney_about_name',array(
		'label'	=> __('Discover More text','vw-lawyer-attorney'),
		'section'	=> 'vw_lawyer_attorney_about1',
		'setting'	=> 'vw_lawyer_attorney_about_name',
		'type'		=> 'text'
	));


	//Why Choose us
	$wp_customize->add_section('vw_lawyer_attorney_amenities_section',array(
		'title'	=> __('Why Choose Us','vw-lawyer-attorney'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'vw_lawyer_attorney_panel_id',
	));
	
	$wp_customize->add_setting('vw_lawyer_attorney_main_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_lawyer_attorney_main_title',array(
		'label'	=> __('Title','vw-lawyer-attorney'),
		'section'	=> 'vw_lawyer_attorney_amenities_section',
		'type'	=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cats[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_lawyer_attorney_blogcategory_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_lawyer_attorney_sanitize_choices',
	));

	$wp_customize->add_control('vw_lawyer_attorney_blogcategory_setting',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Latest Post','vw-lawyer-attorney'),
		'section' => 'vw_lawyer_attorney_amenities_section',
	));

	//Content Craetion
	$wp_customize->add_section( 'vw_lawyer_attorney_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-lawyer-attorney' ),
		'priority' => null,
		'panel' => 'vw_lawyer_attorney_panel_id'
	) );

	$wp_customize->add_setting('vw_lawyer_attorney_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Lawyer_Attorney_Content_Creation( $wp_customize, 'vw_lawyer_attorney_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-lawyer-attorney' ),
		),
		'section' => 'vw_lawyer_attorney_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-lawyer-attorney' ),
	) ) );

	//footer
	$wp_customize->add_section('vw_lawyer_attorney_footer_section',array(
		'title'	=> __('Footer Text','vw-lawyer-attorney'),
		'description'	=> __('Add some text for footer like copyright etc.','vw-lawyer-attorney'),
		'priority'	=> null,
		'panel' => 'vw_lawyer_attorney_panel_id',
	));
	
	$wp_customize->add_setting('vw_lawyer_attorney_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('vw_lawyer_attorney_footer_copy',array(
		'label'	=> __('Copyright Text','vw-lawyer-attorney'),
		'section'	=> 'vw_lawyer_attorney_footer_section',
		'type'		=> 'text'
	));
	/** home page setions end here**/	
}
add_action( 'customize_register', 'vw_lawyer_attorney_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Lawyer_Attorney_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Lawyer_Attorney_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Lawyer_Attorney_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 1,
					'title'    => esc_html__( 'VW Lawyer Pro', 'vw-lawyer-attorney' ),
					'pro_text' => esc_html__( 'Upgarde Pro','vw-lawyer-attorney' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/premium-lawyer-wordpress-theme/')
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new VW_Lawyer_Attorney_Customize_Section_Pro(
				$manager,
				'example_2',
				array(
					'priority'   => 1,
					'title'    => esc_html__( 'Documentation', 'vw-lawyer-attorney' ),
					'pro_text' => esc_html__( 'Docs', 'vw-lawyer-attorney' ),
					'pro_url'  => admin_url( 'themes.php?page=vw_lawyer_attorney_guide' )
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-lawyer-attorney-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-lawyer-attorney-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_lawyer_Attorney_Customize::get_instance();