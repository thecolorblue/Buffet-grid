<?php get_header(); ?>

<div id="content" class="section">
<?php bf_above_content() ?>
<div class='about'>
<?php
$page = get_page_by_title( 'Front Page' );
print_r( $page->post_content);
?>
</div>
<?php wp_reset_query(); 
query_posts( array ( 'category_name' => 'Just off the Easel', 'posts_per_page' => -1 ) );
if ( have_posts() ) : ?>

<div class="hfeed news-list clearfix">
<?php while (have_posts()) : the_post() ?>
    <?php do_action('front_page_layout',get_the_ID()); ?>
<?php endwhile; ?>
</div><!-- .hfeed -->

<?php endif; ?>

<?php bf_below_index_news(); ?>

<?php bf_below_content() ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>