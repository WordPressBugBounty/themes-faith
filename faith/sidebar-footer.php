<?php
if ( is_active_sidebar( 'sidebar-footer-1' ) || is_active_sidebar( 'sidebar-footer-2' ) || is_active_sidebar( 'sidebar-footer-3' ) || is_active_sidebar( 'sidebar-footer-4' )  || is_active_sidebar( 'sidebar-footer-5' ) ) :
?>

<div class="wrapper wrapper-footer">
			
	<div id="site-tertiary" class="site-pre-footer" role="complementary">
	
		<?php
		$i = 0;
		$max = 5;
		while ($i < $max) { 
			$i++;
			if ( !is_active_sidebar('sidebar-footer-' . esc_attr($i) )) { continue; }
			?><div class="ilovewp-column ilovewp-column-<?php echo esc_attr($i); ?>">
			<div class="ilovewp-column-wrapper">
				<?php if (is_active_sidebar('sidebar-footer-' . esc_attr($i) )) { ?>
					<?php dynamic_sidebar( 'sidebar-footer-' . esc_attr($i) ); ?>
				<?php } ?>
			</div><!-- .ilovewp-column-wrapper -->
		</div><!-- .ilovewp-column .ilovewp-column-<?php echo esc_attr($i); ?> --><?php } ?>
	
	</div><!-- #site-tertiary .site-pre-footer -->

</div><!-- .wrapper .wrapper-footer -->

<?php endif; ?>