<?php
add_action( 'customize_register', 'themedemo_customize' );

//adding setting for copyright text
//add_action('customize_register', 'theme_copyright_customizer');

function theme_copyright_customizer($wp_customize) {
    //adding section in wordpress customizer
    $wp_customize->add_section('footer_settings', array(
        'title'          => 'Footer Settings'
    ));

    //adding setting for copyright text
    $wp_customize->add_setting('footer_adsense', array(
        'default'        => '',
    ));

    $wp_customize->add_control('footer_adsense', array(
        'label'       => 'Add Google Adsense Code Above Footer',
        'section' => 'footer_settings',
        'type'        => 'textarea',
    ));
}

function themedemo_customize($wp_customize) {

	// Footer Settings

    $wp_customize->add_section('mo3tasmtheme_new_section_general', array(
        'title'          => 'General Options'
    ));
    $wp_customize->add_section('mo3tasmtheme_new_section_social', array(
        'title'          => 'Social Options'
    ));
        $wp_customize->add_section('mo3tasmtheme_new_section_footer', array(
        'title'          => 'Footer Options'
    ));
    W_Customize_Control( $wp_customize, '', array(
		'label'    => 'Disable Preloader',
		'section'  => 'mo3tasmtheme_new_section_general',
		'settings' => 'penci_preloader',
		'type'     => 'checkbox',
		'priority' => 15
	) ) ;
   W_Customize_Control( $wp_customize, '', array(
		'label'    => 'Disable Post Box',
		'section'  => 'mo3tasmtheme_new_section_general',
		'settings' => 'penci_post_box',
		'type'     => 'checkbox',
		'priority' => 15
	) ) ;

	W_Customize_Control($wp_customize, '', array(
		'label'    => 'Homepage Layout',
		'section'  => 'mo3tasmtheme_new_section_general',
		'settings' => 'penci_home_layout',
		'type'     => 'radio',
		'priority' => 10,
		'choices'  => array(
			'Big'         => 'Big Posts',
			'grid'             => 'Grid Posts',
			'mixed'            => 'Mixed Posts',


		)
	) );

   W_Customize_Control( $wp_customize, 'footer_social', array(
		'label'    => 'Disable Footer Socials',
		'section'  => 'mo3tasmtheme_new_section_footer',
		'settings' => 'penci_footer_social',
		'type'     => 'checkbox',
		'priority' => 15
	) ) ;
    W_Customize_Control( $wp_customize, 'footer_social', array(
		'label'    => 'Disable Instgram Widget',
		'section'  => 'mo3tasmtheme_new_section_footer',
		'settings' => 'penci_instgram',
		'type'     => 'checkbox',
		'priority' => 15
	) ) ;
    W_Customize_Control( $wp_customize, '', array(
		'label'    => 'Instgram Username',
		'section'  => 'mo3tasmtheme_new_section_footer',
		'settings' => 'penci_instgram_username',
		'type'     => 'text',
		'priority' => 15
	) ) ;
   W_Customize_Control( $wp_customize, 'footer_adsense', array(
		'label'       => 'Add  Code Above Footer',
		'section'     => 'mo3tasmtheme_new_section_footer',
		'settings'    => 'penci_footer_adsense',
		'description' => '',
		'type'        => 'textarea',
		'priority'    => 1
	) ) ;
    // Social Media
	W_Customize_Control( $wp_customize, 'facebook', array(
		'label'    => 'Facebook',
		'section'  => 'mo3tasmtheme_new_section_social',
		'settings' => 'penci_facebook',
		'type'     => 'text',
		'priority' => 5
	) ) ;
	W_Customize_Control( $wp_customize, 'twitter', array(
		'label'    => 'Twitter',
		'section'  => 'mo3tasmtheme_new_section_social',
		'settings' => 'penci_twitter',
		'type'     => 'text',
		'priority' => 10
	) ) ;
	W_Customize_Control( $wp_customize, 'instagram', array(
		'label'    => 'Instagram',
		'section'  => 'mo3tasmtheme_new_section_social',
		'settings' => 'penci_instagram',
		'type'     => 'text',
		'priority' => 15
	) ) ;
	W_Customize_Control( $wp_customize, 'pinterest', array(
		'label'    => 'Pinterest',
		'section'  => 'mo3tasmtheme_new_section_social',
		'settings' => 'penci_pinterest',
		'type'     => 'text',
		'priority' => 20
	) ) ;
	W_Customize_Control( $wp_customize, 'google', array(
		'label'    => 'Google Plus',
		'section'  => 'mo3tasmtheme_new_section_social',
		'settings' => 'penci_google',
		'type'     => 'text',
		'priority' => 25
	) ) ;
	W_Customize_Control( $wp_customize, 'linkedin', array(
		'label'    => 'LinkedIn',
		'section'  => 'mo3tasmtheme_new_section_social',
		'settings' => 'penci_linkedin',
		'type'     => 'text',
		'priority' => 26
	) ) ;

	W_Customize_Control( $wp_customize, 'tumblr', array(
		'label'    => 'Tumblr',
		'section'  => 'mo3tasmtheme_new_section_social',
		'settings' => 'penci_tumblr',
		'type'     => 'text',
		'priority' => 30
	) ) ;
	W_Customize_Control( $wp_customize, 'youtube', array(
		'label'    => 'Youtube',
		'section'  => 'mo3tasmtheme_new_section_social',
		'settings' => 'penci_youtube',
		'type'     => 'text',
		'priority' => 35
	) ) ;

    $wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );

}

function W_Customize_Control($wp_customize,$g,$ar){


//adding setting for copyright text
    $wp_customize->add_setting($ar["settings"], array(
        'default'        =>  $ar["default"],
    ));

    $wp_customize->add_control($ar["settings"], array(
        'label'       =>  $ar["label"],
        'section' => $ar["section"],
        'type'        => $ar["type"],
        'choices'        => $ar["choices"],
    ));


}


?>