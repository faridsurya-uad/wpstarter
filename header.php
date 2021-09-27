<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
$sitename = get_bloginfo("name");
$site_desc = get_bloginfo("description");
$og_url = get_permalink(get_the_ID());
$og_title = get_the_title();
$og_desc = strlen(get_the_excerpt()) > 100  ? substr(get_the_excerpt(), 0, 100).'..' : get_the_excerpt();


if(is_home())
{
  $og_thumb = $custom_logo_url;
  $og_type = 'website';
  $og_title = $sitename;
  $og_desc = $site_desc;
  $og_url = get_home_url();
}else{
  $og_thumb = get_the_post_thumbnail_url();
  $og_type = 'article';
}

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:url" content="<?php echo $og_url;?>" />
	<meta property="og:type" content="<?php echo $og_type;?>" />
	<meta property="og:title" content="<?php echo $og_title;?>" />
	<meta property="og:description" content="<?php echo $og_desc;?>" />
	<meta property="og:image" content="<?php echo $og_thumb;?>" />
 	<link rel="icon" href="<?php echo $custom_logo_url;?>" type="image/gif" sizes="16x16">
	<link href="<?php echo get_template_directory_uri().'/vendors/bootstrap/css/bootstrap.css'; ?>" rel="stylesheet">   
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="navbar navbar-light bg-light navbar-expand-lg border-bottom" id="mynav">
	<div class="container">
		<a class="navbar-brand" href="<?php echo get_home_url();?>">
		<img src="<?php echo $custom_logo_url;?>" style="width: 50px;">
		</a>

		<button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-bars" style="color: white;"></i>
		</button>
      
    <?php
  wp_nav_menu( array(
      'theme_location'    => 'navbar',
      'depth'             => 2,
      'container'         => 'div',
      'container_class'   => 'collapse navbar-collapse',
      'container_id'      => 'navbarNav',
      'menu_class'        => 'navbar-nav ms-auto',
      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
      'walker'            => new WP_Bootstrap_Navwalker(),
  ) );
  ?>

  </div>
</nav>
