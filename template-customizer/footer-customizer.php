<?php
function footer_customize_register( $wp_customize ) 
{
	$wp_customize->add_section( 'footer', array(
 
		'title'=> __( 'Footer', 'TextDomain' ),
		'priority' => 201
	 ) );
  
	 $wp_customize->add_setting( 'address' );
	 $wp_customize->add_control( 'address', array(
		 'id'=> 'address',
		 'label' => __( 'Address:', 'TextDomain' ),
		 'section' => 'footer',
		'type' => 'textarea'
	 ) );

	 $wp_customize->add_setting( 'email' );
	 $wp_customize->add_control( 'email', array(
		 'id'=> 'email',
		 'label' => __( 'Email', 'TextDomain' ),
		 'section' => 'footer'
	 ) );
	 $wp_customize->add_setting( 'phone' );
	 $wp_customize->add_control( 'phone', array(
		 'id'=> 'phone',
		 'label' => __( 'Phone', 'TextDomain' ),
		 'section' => 'footer'
	 ) );

	 $wp_customize->add_setting( 'whatsapp' );
	 $wp_customize->add_control( 'whatsapp', array(
		 'id'=> 'whatsapp',
		 'label' => __( 'Whatsapp', 'TextDomain' ),
		 'section' => 'footer'
	 ) );

	 $wp_customize->add_setting( 'facebook' );
	 $wp_customize->add_control( 'facebook', array(
		 'id'=> 'facebook',
		 'label' => __( 'Facebook', 'TextDomain' ),
		 'section' => 'footer'
	 ) );

	 $wp_customize->add_setting( 'twitter' );
	 $wp_customize->add_control( 'twitter', array(
		 'id'=> 'twitter',
		 'label' => __( 'Twitter', 'TextDomain' ),
		 'section' => 'footer'
	 ) );

	 $wp_customize->add_setting( 'instagram' );
	 $wp_customize->add_control( 'instagram', array(
		 'id'=> 'instagram',
		 'label' => __( 'Instagram', 'TextDomain' ),
		 'section' => 'footer'
	 ) );

	 $wp_customize->add_setting( 'youtube' );
	 $wp_customize->add_control( 'youtube', array(
		 'id'=> 'youtube',
		 'label' => __( 'Youtube', 'TextDomain' ),
		 'section' => 'footer'
	 ) );

	 


}
add_action( 'customize_register', 'footer_customize_register');
?>
