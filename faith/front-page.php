<?php
if ( 'posts' == get_option( 'show_on_front' ) ) :

	get_template_part( 'index' );

else :

?>
	<?php get_header();

	if ( is_front_page() && !is_paged() ) {

		if ( 1 == get_theme_mod( 'faith_front_featured_pages', 1 ) ) {
			get_template_part( 'template-parts/content', 'home-featured' );
		}

		get_template_part( 'template-parts/content', 'home-widgets' );

		if ( 1 == get_theme_mod( 'faith_front_featured_pages_columns', 1 ) ) {
			get_template_part( 'template-parts/content', 'home-pages' );
		}

	}
	?>
	<div id="site-main" class="content-home">

		<div class="wrapper wrapper-main">
			
			<main id="site-content" class="site-main" role="main">
			
				<div class="site-content-wrapper">

					<?php while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( 'template-parts/content', 'home' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) {
							comments_template();
						}
					?>
					
					<?php endwhile; // End of the loop. ?>

				</div><!-- .site-content-wrapper -->
			
			</main><!-- #site-content -->
			
			<?php get_sidebar(); ?>
		
		</div><!-- .wrapper .wrapper-main -->

	</div><!-- #site-main -->

	<?php get_footer(); ?>

<?php endif; ?>