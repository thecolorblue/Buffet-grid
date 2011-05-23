<?php get_header(); ?>

<div id="content" class="section">
<?php bf_above_content() ?>


<?php wp_reset_query(); 
query_posts( 'cat=' . bf_get_option('news_cat') . '&paged=' . $paged );
if ( have_posts() ) : ?>

<div class="hfeed news-list clearfix">
<?php while (have_posts()) : the_post() ?>
	<div <?php bf_post_class(); ?>>
		<?php bf_postheaderh5(); ?>  
		<a href="<?php the_permalink(); ?>">
  		  <?php bf_frontbody(); ?>  
		</a>
		<br/>
         <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">More Info</a>
	</div>
<?php endwhile; ?>
</div><!-- .hfeed -->

<?php endif; ?>

<?php bf_below_index_news(); ?>

<?php bf_below_content() ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>