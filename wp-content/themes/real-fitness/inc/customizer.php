<?php
/**
 * Real Fitness Theme Customizer
 *
 * @package Real Fitness
 */

get_template_part('/inc/select/category-dropdown-custom-control');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function real_fitness_customize_register( $wp_customize ) {

	function real_fitness_sanitize_phone_number( $phone ) {
		return preg_replace( '/[^\d+]/', '', $phone );
	}

	function real_fitness_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	//Theme Options
	$wp_customize->add_panel( 'real_fitness_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'real-fitness' ),
	) );
	
	// Header Section
	$wp_customize->add_section('real_fitness_header_section', array(
        'title' => __('Manage Header Section', 'real-fitness'),
        'priority' => null,
		'panel' => 'real_fitness_panel_area',
 	));

	$wp_customize->add_setting('real_fitness_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'real_fitness_sanitize_phone_number',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_phone_number', array(
	   'settings' => 'real_fitness_phone_number',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Add Phone Number', 'real-fitness'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('real_fitness_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_email_address', array(
	   'settings' => 'real_fitness_email_address',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Add Email Address', 'real-fitness'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('real_fitness_open_time',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_open_time', array(
	   'settings' => 'real_fitness_open_time',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Add Opening Time', 'real-fitness'),
	   'type'      => 'text'
	));

	// Home Category Dropdown Section
	$wp_customize->add_section('real_fitness_one_cols_section',array(
		'title'	=> __('Manage Slider','real-fitness'),
		'description'	=> __('Select Category from the Dropdowns for slider, Also use the given image dimension (1600 x 850).','real-fitness'),
		'priority'	=> null,
		'panel' => 'real_fitness_panel_area'
	));

	$wp_customize->add_setting('real_fitness_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_heading', array(
	   'settings' => 'real_fitness_heading',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Add Heading Text', 'real-fitness'),
	   'type'      => 'text'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'real_fitness_slidersection', array(
		'default'	=> '0',	
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Real_Fitness_Category_Dropdown_Custom_Control( $wp_customize, 'real_fitness_slidersection', array(
		'section' => 'real_fitness_one_cols_section',
		'settings'   => 'real_fitness_slidersection',
	) ) );

	$wp_customize->add_setting('real_fitness_button_text',array(
		'default' => 'Hire Me',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_button_text', array(
	   'settings' => 'real_fitness_button_text',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Add Button Text', 'real-fitness'),
	   'type'      => 'text'
	));
	
	//Hide Section
	$wp_customize->add_setting('real_fitness_hide_categorysec',array(
		'default' => true,
		'sanitize_callback' => 'real_fitness_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'real_fitness_hide_categorysec', array(
	   'settings' => 'real_fitness_hide_categorysec',
	   'section'   => 'real_fitness_one_cols_section',
	   'label'     => __('Uncheck To Enable This Section','real-fitness'),
	   'type'      => 'checkbox'
	));
	
	// Services Section 
	$wp_customize->add_section('real_fitness_below_slider_section', array(
		'title'	=> __('Manage Services Section','real-fitness'),
		'description'	=> __('Select Pages from the dropdown for Services.','real-fitness'),
		'priority'	=> null,
		'panel' => 'real_fitness_panel_area',
	));

	$wp_customize->add_setting('real_fitness_main_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_main_text', array(
	   'settings' => 'real_fitness_main_text',
	   'section'   => 'real_fitness_below_slider_section',
	   'label' => __('Add Main Text', 'real-fitness'),
	   'type'      => 'text'
	));
	
	$wp_customize->add_setting('real_fitness_main_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_main_title', array(
	   'settings' => 'real_fitness_main_title',
	   'section'   => 'real_fitness_below_slider_section',
	   'label' => __('Add Main Title', 'real-fitness'),
	   'type'      => 'text'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'real_fitness_services_cat', array(
		'default'	=> '0',	
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Real_Fitness_Category_Dropdown_Custom_Control( $wp_customize, 'real_fitness_services_cat', array(
		'section' => 'real_fitness_below_slider_section',
		'settings'   => 'real_fitness_services_cat',
	) ) );

	$wp_customize->add_setting('real_fitness_disabled_pgboxes',array(
		'default' => true,
		'sanitize_callback' => 'real_fitness_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control( 'real_fitness_disabled_pgboxes', array(
	   'settings' => 'real_fitness_disabled_pgboxes',
	   'section'   => 'real_fitness_below_slider_section',
	   'label'     => __('Uncheck To Enable This Section','real-fitness'),
	   'type'      => 'checkbox'
	));

	// Footer Section 
	$wp_customize->add_section('real_fitness_footer', array(
		'title'	=> __('Manage Footer Section','real-fitness'),
		'priority'	=> null,
		'panel' => 'real_fitness_panel_area',
	));

	$wp_customize->add_setting('real_fitness_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'real_fitness_copyright_line', array(
	   'section' 	=> 'real_fitness_footer',
	   'label'	 	=> __('Copyright Line','real-fitness'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));


	$wp_customize->add_setting('real_fitness_color_scheme_one',array(
		'default' => '#0fbbf3',
		'sanitize_callback' => 'sanitize_hex_color',
	));
    $wp_customize->add_control( 
	    new WP_Customize_Color_Control( 
	    $wp_customize, 
	    'real_fitness_color_scheme_one', 
	    array(
	        'label'      => __( 'Color Scheme 1', 'real-fitness' ),
	        'section'    => 'colors',
	        'settings'   => 'real_fitness_color_scheme_one',
	    ) ) 
	);

    //Color
	$wp_customize->add_setting('real_fitness_color_scheme_two',array(
		'default' => '#0b1f33',
		'sanitize_callback' => 'sanitize_hex_color',
	));
    $wp_customize->add_control( 
	    new WP_Customize_Color_Control( 
	    $wp_customize, 
	    'real_fitness_color_scheme_two', 
	    array(
	        'label'      => __( 'Color Scheme 2', 'real-fitness' ),
	        'section'    => 'colors',
	        'settings'   => 'real_fitness_color_scheme_two',
	    ) )
	);
}
add_action( 'customize_register', 'real_fitness_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function real_fitness_customize_preview_js() {
	wp_enqueue_script( 'real_fitness_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'real_fitness_customize_preview_js' );