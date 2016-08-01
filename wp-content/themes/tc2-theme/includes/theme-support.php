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
    
    
    /*
    // Member of the Month section -----------------------------------------------
    $wp_customize->add_section( 'quesks_member_month_section' , array(
        'title'      => 'Member of the Month',
        'priority'   => 110,
    ) );
    
        // Name
        $wp_customize->add_setting('quesks_member_month_options[name]', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',

        ));
        $wp_customize->add_control('quesks_member_month_options_name', array(
            'label'      => 'Name',
            'section'    => 'quesks_member_month_section',
            'settings'   => 'quesks_member_month_options[name]',
        ));
    
        // Picture
        $wp_customize->add_setting('quesks_member_month_options[photo]', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',

        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'photo', array(
            'label'      => 'Photo',
            'section'    => 'quesks_member_month_section',
            'settings'   => 'quesks_member_month_options[photo]',
        )));
    
        // Description
        $wp_customize->add_setting('quesks_member_month_options[description]', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',

        ));
        $wp_customize->add_control('quesks_member_month_options_description', array(
            'label'      => 'Description',
            'section'    => 'quesks_member_month_section',
            'settings'   => 'quesks_member_month_options[description]',
            'type'       => 'textarea',
        ));
    
        // Button Label
        $wp_customize->add_setting('quesks_member_month_options[button_label]', array(
            'default'        => 'Meet the community',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',

        ));
        $wp_customize->add_control('quesks_member_month_options_button_label', array(
            'label'      => 'Button Label',
            'section'    => 'quesks_member_month_section',
            'settings'   => 'quesks_member_month_options[button_label]',
        ));
    
        // Button URL
        $wp_customize->add_setting('quesks_member_month_options[button_url]', array(
            'default'        => '#',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',

        ));
        $wp_customize->add_control('quesks_member_month_options_button_url', array(
            'label'      => 'Button URL',
            'section'    => 'quesks_member_month_section',
            'settings'   => 'quesks_member_month_options[button_url]',
        ));
        
    */
}
add_action( 'customize_register', 'quesks_customize_register' );



// remove admin bar
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');