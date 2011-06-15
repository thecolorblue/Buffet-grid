	<?php bf_above_footer() ?>
	</div><!-- #main -->

    <div id="footer">
    <?php wp_nav_menu( array('theme_location' => 'footer_menu' )); ?>
		<div class="footer-message">
			<?php echo stripslashes(bf_get_option('footer_message')); ?>
		</div>
    </div><!-- #footer -->
    
    <?php wp_footer() ?>
	<?php bf_footer() ?>

</div><!-- #wrapper -->
</body>
</html>
   