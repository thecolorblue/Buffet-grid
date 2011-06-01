<?php
function native_grid(){
?>	
	<div <?php bf_post_class(); ?>>
		<?php bf_postheaderh5(); ?>  
		<a href="<?php the_permalink(); ?>">
  		  <?php bf_frontbody(); ?>  
		</a>
		<br/>
         <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">More Info</a>
	</div>
<?php
}

?>