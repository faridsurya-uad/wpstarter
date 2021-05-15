<?php
get_header();
dynamic_sidebar('home-before-posts');
$title = get_theme_mod('homepost-title');
$subtitle = get_theme_mod('homepost-description');
$show_header = get_theme_mod('homepost-show-header');;
$category_id = get_theme_mod('homepost-category');
$category_page_url = get_category_link($category_id);
$numberposts = get_theme_mod('homepost-number-of-posts');
$cols =  get_theme_mod('homepost-number-of-cols');
$more_text = get_theme_mod('homepost-more-text');
?>

<?php
//$args = array("posts_per_page"=>$numberposts);
//$the_query = new WP_Query( $args );
//echo json_encode($the_query);
$post_list = get_posts( array(
    'posts_per_page'=>3
) );
?>

<?php if ( count($post_list) > 0 ) { ?>

<div class="container">
    <?php get_template_part('template-components/block','header',array('title'=>$title, 'subtitle'=>$subtitle));?>
    <div class="row">
        <?php foreach($post_list as $post) { ?>

        <!--Looping start-->
        <div class="col-md-4">
            <?php get_template_part('template-components/card', 'post', $post); ?>
        </div>
        <!-- Looping end -->

        <?php } ?>
    </div>

    <div class="text-center py-5">
        <a class="btn btn-primary text-light" href="<?php echo $category_page_url;?>" role="button"><?php echo $more_text;?></a>
    </div>

</div>

<?php } ?>

<?php wp_reset_postdata(); ?>

<?php
dynamic_sidebar('home-after-posts');
get_footer();
?>
