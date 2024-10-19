<?php

// Get Page Layout
if( ! function_exists( 'ilovewp_helper_get_page_layout' ) ) {
	function ilovewp_helper_get_page_layout() {

		$default_position = '';

		if ( !is_active_sidebar( 'sidebar-main' ) && 1 != get_theme_mod( 'faith_single_dynamic_menu', 1 ) ) {
			$default_position = 'page-no-sidebar';
		}

		if ( !is_page() && !is_active_sidebar( 'sidebar-main' ) ) {
			$default_position = 'page-no-sidebar';
		}

		if ( is_page() ) {
			if ( !is_active_sidebar( 'sidebar-main' ) && 1 == get_theme_mod( 'faith_single_dynamic_menu', 1 ) ) {
				
				global $post;
				wp_reset_postdata();
				$parent_id = $post->post_parent;

				if ($parent_id == 0) {
					$child_of = $post->ID;
				} // if no parent
				else {
					$child_of = $parent_id;
				}

				$children_pages = get_pages( array( 'parent' => absint($child_of), 'child_of' => absint($child_of), 'sort_column' => 'menu_order', 'sort_order' => 'ASC' ) );
				$children_pages_count = count($children_pages);

				if ($children_pages_count <= 1 && $parent_id != 0) {
					unset($children_pages);
					$child_of = wp_get_post_parent_id($parent_id);
					if ($child_of != 0) {
						$children_pages = get_pages( array( 'parent' => absint($child_of), 'child_of' => absint($child_of), 'sort_column' => 'menu_order', 'sort_order' => 'ASC' ) );
						$children_pages_count = count($children_pages);
					}
				} 

				if ( $children_pages_count <= 1 ) {
					$default_position = 'page-no-sidebar';
				}

			}
		}

		return $default_position;
	}
}

// Get Header Style
if( ! function_exists( 'ilovewp_helper_get_header_style' ) ) {
	function ilovewp_helper_get_header_style() {

		$themeoptions_header_style = esc_attr(get_theme_mod( 'theme-header-style', 'default' ));

		if ( $themeoptions_header_style == 'default' ) {
			$default_position = 'page-header-default';
		} elseif ( $themeoptions_header_style == 'centered' ) {
			$default_position = 'page-header-centered';
		}

		return $default_position;
	}
}

// Get Page Slideshow Status
if( ! function_exists( 'ilovewp_helper_get_slideshow_status' ) ) {
	function ilovewp_helper_get_slideshow_status() {

		if ( is_home() || is_front_page() ) {

			$page_ids = array();
			if ( absint(get_theme_mod( 'faith_featured_page_1', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'faith_featured_page_1', false )); }
			if ( absint(get_theme_mod( 'faith_featured_page_2', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'faith_featured_page_2', false )); }
			if ( absint(get_theme_mod( 'faith_featured_page_3', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'faith_featured_page_3', false )); }
			if ( absint(get_theme_mod( 'faith_featured_page_4', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'faith_featured_page_4', false )); }
			if ( absint(get_theme_mod( 'faith_featured_page_5', false )) != 0 ) { $page_ids[] = absint(get_theme_mod( 'faith_featured_page_5', false )); }
			$page_count = 0;
			$page_count = count($page_ids);

			if ( $page_count > 0 ) {
				return 'page-with-slideshow';
			} else {
				return 'page-without-slideshow';
			}

		}

	}
}

/**
 * Adds a Sub Nav Toggle to the Expanded Menu and Mobile Menu.
 *
 * @param stdClass $args  An object of wp_nav_menu() arguments.
 * @param WP_Post  $item  Menu item data object.
 * @param int      $depth Depth of menu item. Used for padding.
 * @return stdClass An object of wp_nav_menu() arguments.
 */
function faith_add_sub_toggles_to_main_menu( $args, $item, $depth ) {

	// Add sub menu toggles to the Expanded Menu with toggles.
	if ( isset( $args->show_toggles ) && $args->show_toggles ) {

		$args->after  = '';

		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

			$args->after .= '<button class="sub-menu-toggle toggle-anchor"><span class="screen-reader-text">' . __( 'Show sub menu', 'faith' ) . '</span><i class="icon-icomoon ilovewp-icon-chevron-down"></i></span></button>';

		}
	} 

	return $args;

}

add_filter( 'nav_menu_item_args', 'faith_add_sub_toggles_to_main_menu', 10, 3 );