<?php
// Theme Support
function theme_prefix_setup() {
	// add menu support
	add_theme_support( 'menus' );
	
	// add featured thumbnail support
	add_theme_support( 'post-thumbnails' ); 

	// add custom logo
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );


// Custom theme customization
function quesks_customize_register( $wp_customize ) {
    
    /*
    // Header Link section -----------------------------------------------
    $wp_customize->add_section( 'quesks_header_link_section' , array(
        'title'      => 'Header Link',
        'priority'   => 30,
    ) );
    
       $arrFields = array(
            array( 'key'   => 'login_label',       'label' => 'Login Label',        'default' => 'LOG IN' ),
            array( 'key'   => 'login_url',         'label' => 'Login URL',          'default' => '' ),
            array( 'key'   => 'get_started_label', 'label' => 'Get Started Label',  'default' => 'Get Started' ),
            array( 'key'   => 'get_started_url',   'label' => 'Get Started URL',    'default' => '' )
        );

        foreach($arrFields as $k=>$v ) {
            $wp_customize->add_setting('quesks_header_link_options['.$v['key'].']', array(
                'default'        => $v['default'],
                'capability'     => 'edit_theme_options',
                'type'           => 'option',

            ));
            $wp_customize->add_control('quesks_header_link_options_'.$v['key'], array(
                'label'      => $v['label'],
                'section'    => 'quesks_header_link_section',
                'settings'   => 'quesks_header_link_options['.$v['key'].']',
            ));
        }
    
    
    // Social Media section -----------------------------------------------
    $wp_customize->add_section( 'quesks_social_media_section' , array(
        'title'      => 'Social Media',
        'priority'   => 110,
    ) );
    
        $arrFields = array(
            array( 'key'   => 'blog',       'label' => 'Blog' ),
            array( 'key'   => 'instagram',  'label' => 'Instagram' ),
            array( 'key'   => 'facebook',   'label' => 'Facebook' ),
            array( 'key'   => 'twitter',    'label' => 'Twitter' ),
            array( 'key'   => 'google_plus','label' => 'Google Plus' ),
            array( 'key'   => 'linkedin',   'label' => 'LinkedIn' )
        );

        foreach($arrFields as $k=>$v ) {
            $wp_customize->add_setting('quesks_social_media_options['.$v['key'].']', array(
                'default'        => '',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',

            ));
            $wp_customize->add_control('quesks_social_media_options_'.$v['key'], array(
                'label'      => $v['label'],
                'section'    => 'quesks_social_media_section',
                'settings'   => 'quesks_social_media_options['.$v['key'].']',
            ));
        }
    */
    
    
    // Exit Intent section ----------------------------
    $label = 'Exit Intent';
    $field = strtolower(str_replace(' ', '_', $label));
    $wp_customize->add_section( 'quesks_'.$field.'_section' , array(
        'title'      => $label,
        'priority'   => 160,
    ) );
    
        $key_label = "Enabled";
        $key_field = strtolower(str_replace(' ', '_', $key_label));
        $wp_customize->add_setting('quesks_'.$field.'_options['.$key_field.']', array(
            'default'       => '',
            'capability'    => 'edit_theme_options',
            'type'          => 'option'
        ));
        
        $wp_customize->add_control('quesks_'.$field.'_options_'.$key_field, array(
            'label'         => $key_label,
            'section'       => 'quesks_'.$field.'_section',
            'settings'      => 'quesks_'.$field.'_options['.$key_field.']',
            'type'          => 'checkbox'
        ));
        
        $key_label = "Title";
        $key_field = strtolower(str_replace(' ', '_', $key_label));
        $wp_customize->add_setting('quesks_'.$field.'_options['.$key_field.']', array(
            'default'       => '',
            'capability'    => 'edit_theme_options',
            'type'          => 'option'
        ));
        
        $wp_customize->add_control('quesks_'.$field.'_options_'.$key_field, array(
            'label'         => $key_label,
            'section'       => 'quesks_'.$field.'_section',
            'settings'      => 'quesks_'.$field.'_options['.$key_field.']',
        ));
        
        $key_label = "Description";
        $key_field = strtolower(str_replace(' ', '_', $key_label));
        $wp_customize->add_setting('quesks_'.$field.'_options['.$key_field.']', array(
            'default'       => '',
            'capability'    => 'edit_theme_options',
            'type'          => 'option'
        ));
        
        $wp_customize->add_control('quesks_'.$field.'_options_'.$key_field, array(
            'label'         => $key_label,
            'section'       => 'quesks_'.$field.'_section',
            'settings'      => 'quesks_'.$field.'_options['.$key_field.']',
            'type'          => 'textarea'
        ));
        
        $key_label = "Button Label";
        $key_field = strtolower(str_replace(' ', '_', $key_label));
        $wp_customize->add_setting('quesks_'.$field.'_options['.$key_field.']', array(
            'default'       => '',
            'capability'    => 'edit_theme_options',
            'type'          => 'option'
        ));
        
        $wp_customize->add_control('quesks_'.$field.'_options_'.$key_field, array(
            'label'         => $key_label,
            'section'       => 'quesks_'.$field.'_section',
            'settings'      => 'quesks_'.$field.'_options['.$key_field.']',
        ));
        
        $key_label = "Button URL";
        $key_field = strtolower(str_replace(' ', '_', $key_label));
        $wp_customize->add_setting('quesks_'.$field.'_options['.$key_field.']', array(
            'default'       => '',
            'capability'    => 'edit_theme_options',
            'type'          => 'option'
        ));
        
        $wp_customize->add_control('quesks_'.$field.'_options_'.$key_field, array(
            'label'         => $key_label,
            'section'       => 'quesks_'.$field.'_section',
            'settings'      => 'quesks_'.$field.'_options['.$key_field.']',
        ));
}
add_action( 'customize_register', 'quesks_customize_register' );



// remove admin bar
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');



function tc2_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Post Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tc2_widgets_init' );