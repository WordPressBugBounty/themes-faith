<?php
get_header(); ?>

	<?php get_template_part( 'template-parts/header-image', '' ); ?>

	<div id="site-main" class="page-has-frame<?php if ( isset($ilovewp_has_image) && $ilovewp_has_image === TRUE) { echo ' page-has-image'; } ?>">

		<div class="wrapper wrapper-main">
			
			<main id="site-content" class="site-main" role="main">
			
				<div class="site-content-wrapper">

					<div class="ilovewp-page-intro ilovewp-archive-intro">
						<h1 class="title-page"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'faith' ); ?></h1>
						<div class="taxonomy-description"><p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'faith' ); ?></p></div>
					</div><!-- .ilovewp-page-intro -->

					<div class="post-single">

						<?php get_search_form(); ?>

						<h3><?php esc_html_e( 'Browse Categories', 'faith' ); ?></h3>
						<ul>
							<?php wp_list_categories('title_li=&hierarchical=0&show_count=1'); ?>	
						</ul>

						<hr>

						<h3><?php esc_html_e( 'Monthly Archives', 'faith' ); ?></h3>
						<ul>
							<?php wp_get_archives('type=monthly&show_post_count=1'); ?>	
						</ul>

					</div><!-- .post-single -->
					
				</div><!-- .site-content-wrapper -->
				
			</main><!-- #site-content -->
			
			<?php get_sidebar(); ?>
		
		</div><!-- .wrapper .wrapper-main -->

	</div><!-- #site-main -->

<?php get_footer(); ?>