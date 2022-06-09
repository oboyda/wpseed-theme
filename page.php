<?php 
/*
* Template Name: Main page template
*/

global $post;

get_header();
?>

<div class="page-content">
    
    <?php echo apply_filters('the_content', $post->post_content); ?>
    
</div>

<?php 
get_footer();