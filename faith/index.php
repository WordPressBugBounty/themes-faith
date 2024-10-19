<?php
get_header();

if ( 1 == get_theme_mod( 'faith_front_featured_pages', 1 ) ) {
	get_template_part( 'template-parts/content', 'home-featured' );
}

if ( is_front_page() && !is_paged() ) {

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

				<?php if ( have_posts() ) { $i = 0; ?>
				
				<?php if ( is_home() && ! is_front_page() ) { ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php } ?>

				<?php if ( is_home() ) { ?><p class="widget-title"><?php esc_html_e('Recent Posts','faith'); ?></p><?php } ?>
				
				<ul id="recent-posts" class="ilovewp-posts ilovewp-posts-archive">
					
					<?php while (have_posts()) : the_post(); ?>
					
					<?php get_template_part( 'template-parts/content'); ?>
					
					<?php endwhile; ?>
					
				</ul><!-- .ilovewp-posts .ilovewp-posts-archive -->

				<?php
				the_posts_pagination( array( 'mid_size' => 4 ) );
		
				} else { ?>
		
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
		
				<?php } ?>

			</div><!-- .site-content-wrapper -->
		
		</main><!-- #site-content -->
		
		<?php get_sidebar(); ?>
	
	</div><!-- .wrapper .wrapper-main -->

</div><!-- #site-main -->

<?php get_footer(); ?>