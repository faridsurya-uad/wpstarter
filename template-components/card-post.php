<?php
//echo json_encode($args);
$title = $args->post_title;
$excerpt = $args->post_excerpt == '' ? substr($args->post_content, 0, 100) : $args->post_excerpt;
$date = date('d, M Y', strtotime($args->post_date));
$author = get_the_author_meta('display_name', $args->post_author);
$thumbnail = get_the_post_thumbnail_url($args->ID);
$post_url = get_the_permalink($args->ID);
$comment_count = $args->comment_count;
?>

<div class="card">
    <img src="<?php echo $thumbnail;?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?php echo $title;?></h5>
        <p class="card-text text-muted">Post at <?php echo $date;?> by <?php echo $author;?></p>
        <p class="card-text"><?php echo $excerpt;?></p>
        <a href="<?php echo $post_url;?>" class="btn btn-primary">Read</a>
    </div>
</div>