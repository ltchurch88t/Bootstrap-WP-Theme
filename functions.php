<?php

function bootstrapper_styles() {
	
	wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}

function bootstrapper_js() {

	global $wp_scripts;

	wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js');
	wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/assets/js/scripts.js');
}

function bootstrapper_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'color' , array(
    	'title'      => 'Colors' ,
    	'priority'   => 30,
	) );

	$wp_customize->add_setting( 'header_color', array(
		'default' => '',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
		'label'      => 'Header Color' ,
		'section'    => 'color',
		'setting'	 => 'header_color',
	) ) );

	$wp_customize->add_section( 'background_image', array(
		'title' => 'Background Image',
		'priority' => 80,
	) );

	$wp_customize->add_setting( 'card_one_image', array(
		'default' => '',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_setting( 'card_two_image', array(
		'default' => '',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_setting( 'card_three_image', array(
		'default' => '',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control(
	  new WP_Customize_Media_Control(
	    $wp_customize, // WP_Customize_Manager
	    'card_one_image', // Setting id
	    array( // Args, including any custom ones.
	      'label' => __( 'Card One Image' ),
	      'section' => 'background_image',
	      'setting' => 'card_one_image',
	    )
	  )
	);

	$wp_customize->add_control(
	  new WP_Customize_Media_Control(
	    $wp_customize, // WP_Customize_Manager
	    'card_two_image', // Setting id
	    array( // Args, including any custom ones.
	      'label' => __( 'Card Two Image' ),
	      'section' => 'background_image',
	      'setting' => 'card_two_image',
	    )
	  )
	);

	$wp_customize->add_control(
	  new WP_Customize_Media_Control(
	    $wp_customize, // WP_Customize_Manager
	    'card_three_image', // Setting id
	    array( // Args, including any custom ones.
	      'label' => __( 'Card Three Image' ),
	      'section' => 'background_image',
	      'setting' => 'card_three_image',
	    )
	  )
	);
}

function bootstrapper_customize_css() {
    ?>
         <style type="text/css">
             .jumbotron { background-color: <?php echo get_theme_mod( 'header_color' ); ?>; }
         </style>
    <?php
}

function bootstrapper_customizer_live_preview() {
	wp_enqueue_script( 
		  'bootstrapper-themecustomizer',			//Give the script an ID
		  get_template_directory_uri().'/assets/js/theme-customize.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional) 
		  true					//Put script in footer?
	);
}

add_action( 'customize_preview_init', 'bootstrapper_customizer_live_preview' );
add_action( 'wp_head', 'bootstrapper_customize_css');
add_action( 'customize_register' , 'bootstrapper_customize_register' );
add_action( 'wp_enqueue_scripts', 'bootstrapper_styles');
add_action( 'wp_enqueue_scripts', 'bootstrapper_js');

?>