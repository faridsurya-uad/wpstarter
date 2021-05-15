<?php 
/* Template Name: Page Contact Template */
get_header();
global $post;
$title = $post->post_title;
$excerpt = $post->post_excerpt;
$content = $post->post_content;
$date = date('d, M Y', strtotime($post->post_date));
$author = get_the_author_meta('display_name', $post->post_author);
$thumbnail = get_the_post_thumbnail_url($post->ID);
$post_url = get_the_permalink($post->ID);
$comment_count = $post->comment_count;
$tags = get_the_tags();
$categories = get_the_category();
?>

<div class="container">
<div class="py-5">
    <h1 class="h1 my-0 py-0"><?php echo $title;?></h1>
    <div>
        <p class="my-0 py-0">By <?php echo $author;?></p>
        <p class="text-muted my-0 py-0"><?php echo $date;?></p>
    </div>
    <p class="lead">
    <?php echo $excerpt;?>
    </p>
</div>
<div>
<?php echo $content;?>
</div>

<div class="py-3">

<?php if($categories!= false): foreach($categories as $row) { ?>
<a href="<?php echo get_category_link($row->term_id);?>"><span class="badge bg-secondary"><?php echo strtoupper($row->name);?></span></a>
<?php } endif;?>

<?php if($tags!= false): foreach($tags as $row) { ?>
<a href="<?php echo get_tag_link($row->term_id);?>"><span class="badge bg-secondary"><?php echo strtoupper($row->name);?></span></a>
<?php } endif;?>

</div>

<?php dynamic_sidebar('page-contact');?>

<div class="py-5">
<?php

if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;

?>
</div>
</div>

<?php
get_footer();
?>