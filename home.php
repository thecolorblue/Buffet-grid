<?php get_header(); ?>

<div id="content" class="section">
<?php bf_above_content() ?>


<?php wp_reset_query(); 
query_posts( );
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