<?php get_header(); ?>

<div id="content" class="section">
<?php bf_above_content() ?>

<?php if (have_posts()) : the_post(); ?>
	<?php bf_above_post() ?>
	<div <?php bf_post_class() ?>>
	
        <?php bf_postheader() ?>
		
        <div class="entry-content clearfix">
		<?php bf_postmeta() ?>
		<?php the_content( __('<p>Read the rest of this entry &raquo;</p>', 'buffet') ); ?>
		<?php wp_link_pages(array('before' => __('<p class="entry-nav"><strong>Pages:</strong> ', 'buffet'), 
			'after' => '</p>', 'next_or_number' => 'number')); ?>
        </div><!-- .entry-content -->
        
		<!-- <?php trackback_rdf() ?> -->

    </div>
<?php else: ?>

<?php bf_post_notfound() ?>

<?php endif; ?>

<?php bf_below_content() ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>