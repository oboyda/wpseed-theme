<?php 
/*
 * Template Name: Main page template
 */

get_header();
?>

<div class="main">
    
    <?php wpseed_get_view('first-block', ['title' => __('First block', 'wptboot')]); ?>
    
    <?php wpseed_get_view('second-block', ['title' => __('Second block', 'wptboot')]); ?>
    
</div>

<?php 
get_footer();