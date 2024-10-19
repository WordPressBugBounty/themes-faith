<?php
/**
 * The template used for displaying featured pages on the Front Page.
 *
 * @package Faith
 */
?>

<?php
	$page_ids = array();
	if ( absint(get_theme_mod( 'faith_featured_page_1', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'faith_featured_page_1', false )); }
	if ( absint(get_theme_mod( 'faith_featured_page_2', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'faith_featured_page_2', false )); }
	if ( absint(get_theme_mod( 'faith_featured_page_3', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'faith_featured_page_3', false )); }
	if ( absint(get_theme_mod( 'faith_featured_page_4', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'faith_featured_page_4', false )); }
	if ( absint(get_theme_mod( 'faith_featured_page_5', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'faith_featured_page_5', false )); }
	$page_count = 0;
	$page_count = count($page_ids);
	
	if ( $page_count > 0 ) {
		$custom_loop = new WP_Query( array( 'post_type' => 'page', 'post__in' => $page_ids, 'orderby' => 'post__in' ) );

		$i = 0;
		if ( $custom_loop->have_posts() ) : ?>

		<div id="ilovewp-hero" class="ilovewp-hero-withimage flexslider ilovewp-hero-loading">
			<ul class="ilovewp-slides ilovewp-slideshow">
				<?php 
				while ( $custom_loop->have_posts() ) : $custom_loop->the_post();
				$atts = array();
				$i++;
				if ( has_post_thumbnail() ) {

					// CREATE A PROPER ALT ATTRIBUTE FOR THE THUMBNAIL
					$image_alt_attribute = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
					if ( empty($image_alt_attribute) ) {
						$image_alt_attribute = '';
					}
					$atts = array(
						'alt' => $image_alt_attribute,
						'class' => 'faith-large-thumbnail'
					);

					if ( $i == 1 ) {
						$atts['loading'] = 'eager';
					}

				}
				?>
				<li class="ilovewp-slide">
					<div class="faith-slide-thumbnail"><?php 
					the_post_thumbnail('faith-large-thumbnail', $atts);
					?></div><!-- .faith-slide-thumbnail -->
					<div class="ilovewp-hero-wrapper">
						<div class="wrapper">
							<div class="content-wrapper">
								<?php the_title( sprintf( '<h1 class="hero-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
								<p class="hero-description"><?php echo wp_kses_post(get_the_excerpt()); ?></p>
								<span class="hero-button-span"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="hero-button-anchor"><?php _e('Read More','faith'); ?></a></span>
							</div><!-- .content-wrapper -->
						</div><!-- .wrapper -->
					</div><!-- .ilovewp-hero-wrapper -->
				</li><!-- .ilovewp-slide -->
				<?php 
				if ( isset($large_image_url) ) { unset($large_image_url); }
				endwhile; 
				?>
			</ul><!-- .ilovewp-slideshow -->
		</div><!-- #ilovewp-hero -->

<?php else : ?>

	 <?php if ( current_user_can( 'publish_posts' ) && is_customize_preview() ) : ?>

		<div id="ilovewp-featured-content">

			<div class="ilovewp-page-intro ilovewp-nofeatured">
				<h1 class="title-page"><?php esc_html_e( 'No Featured Pages Found', 'faith' ); ?></h1>
				<div class="taxonomy-description">

					<p><?php printf( esc_html__( 'This section will display your featured pages. Configure (or disable) it via the Customizer.', 'faith' ) ); ?></p>
					<p><strong><?php printf( esc_html__( 'Important: This message is NOT visible to site visitors, only to admins and editors.', 'faith' ) ); ?></strong></p>

				</div><!-- .taxonomy-description -->
			</div><!-- .ilovewp-page-intro .ilovewp-nofeatured -->

		</div><!-- #ilovewp-featured-content -->

	<?php endif; ?>

<?php
		endif;
	}