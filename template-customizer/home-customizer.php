<?php
function homepage_post_customize_register( $wp_customize ) 
{
	$wp_customize->add_section( 'homepage_posts', array(
 
		'title'=> __( 'Homepage Posts', 'TextDomain' ),
		'priority' => 20
	 ) );
  
	 $wp_customize->add_setting( 'homepost-title',array('default'=>'Latest News'));
	 $wp_customize->add_control( 'homepost-title', array(
		 'id'=> 'homepost-title',
		 'label' => __( 'Title for Homepage Posts Section:', 'TextDomain' ),
		 'section' => 'homepage_posts',
		 'type' => 'text'
     ) );
     $wp_customize->add_setting( 'homepost-description' );
	 $wp_customize->add_control( 'homepost-description', array(
		 'id'=> 'homepost-description',
		 'label' => __( 'Title for Homepage Posts Description:', 'TextDomain' ),
		 'section' => 'homepage_posts',
		 'type' => 'textarea'
     ) );

     $wp_customize->add_setting( 'homepost-show-header', array('default'=>true));
	 $wp_customize->add_control( 'homepost-show-header', array(
		 'id'=> 'homepost-show-header',
		 'label' => __( 'Show Header Title & Description:', 'TextDomain' ),
		 'section' => 'homepage_posts',
		 'type' => 'checkbox'
     ) );

    //get categories
     $categories = get_categories();
     $cats = array();
     foreach($categories as $row)
     {
        $cats[$row->cat_ID] = $row->cat_name;
     }
     $wp_customize->add_setting( 'homepost-category' );
	 $wp_customize->add_control( 'homepost-category', array(
		 'id'=> 'homepost-category',
		 'label' => __( 'Post Category:', 'TextDomain' ),
		 'section' => 'homepage_posts',
         'type' => 'select',
         'choices'=>$cats
     ) );

     $wp_customize->add_setting( 'homepost-number-of-posts' );
	 $wp_customize->add_control( 'homepost-number-of-posts', array(
		 'id'=> 'homepost-number-of-posts',
		 'label' => __( 'Max Posts:', 'TextDomain' ),
		 'section' => 'homepage_posts',
         'type' => 'number'         
	 ) );
	 
	 $wp_customize->add_setting( 'homepost-number-of-cols', array('default'=>3) );
	 $wp_customize->add_control( 'homepost-number-of-cols', array(
		 'id'=> 'homepost-number-of-cols',
		 'label' => __( 'Number of Columns:', 'TextDomain' ),
		 'section' => 'homepage_posts',
         'type' => 'number'         
     ) );

     $wp_customize->add_setting( 'homepost-more-text',array('default'=>'More Posts'));
	 $wp_customize->add_control( 'homepost-more-text', array(
		 'id'=> 'homepost-title',
		 'label' => __( 'More Posts Button Text:', 'TextDomain' ),
		 'section' => 'homepage_posts',
		 'type' => 'text'
     ) );
     

}
add_action( 'customize_register', 'homepage_post_customize_register');
?>
