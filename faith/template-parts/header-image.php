<?php 
global $ilovewp_has_image;

if ( is_singular() && ( has_post_thumbnail() && 1 == get_theme_mod( 'faith_single_featured_image', 1 ) ) ) {
	$atts = array();

	// CREATE A PROPER ALT ATTRIBUTE FOR THE THUMBNAIL
	$image_alt_attribute = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
	if ( empty($image_alt_attribute) ) {
		$image_alt_attribute = '';
	}
	$atts = array(
		'alt' 		=> $image_alt_attribute,
		'class' 	=> 'faith-large-thumbnail',
		'loading'	=> 'eager'
	);

	?>
	<div id="ilovewp-hero" class="ilovewp-hero-withimage">
		<div class="faith-slide-thumbnail"><?php 
			the_post_thumbnail('faith-large-thumbnail', $atts);
		?></div><!-- .faith-slide-thumbnail -->
	</div><!-- #ilovewp-hero -->
	<?php
	$ilovewp_has_image = TRUE;
}
elseif ( !isset( $ilovewp_has_image ) && get_header_image() ) { ?>
	<div id="ilovewp-hero" class="ilovewp-hero-withimage">
		<div class="faith-slide-thumbnail"><?php 
			echo get_header_image_tag(array('preloading' => 'eager', 'class' => 'faith-large-thumbnail faith-first-image skip-lazy wp-post-image'));
		?></div><!-- .faith-slide-thumbnail -->
	</div><!-- #ilovewp-hero -->
	<?php
	$ilovewp_has_image = TRUE;
} else { ?>
	<div id="ilovewp-hero" class="ilovewp-hero-blankfill">
	</div><!-- #ilovewp-hero -->
<?php }