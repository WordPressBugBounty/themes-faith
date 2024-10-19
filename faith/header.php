<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="//gmpg.org/xfn/11" />
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="container">

	<a class="skip-link screen-reader-text" href="#site-main"><?php esc_html_e( 'Skip to content', 'faith' ); ?></a>
	<header class="site-header" role="banner">
	
		<div class="wrapper wrapper-header">

			<div id="site-branding"><?php 
				if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
					faith_the_custom_logo();
				} else { ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
			</div><!-- #site-branding -->
			<?php if ( has_nav_menu( 'primary' ) ) { ?><div id="site-header-navigation">

				<?php
					if (has_nav_menu( 'primary' ) || has_nav_menu( 'mobile' )) {
						get_template_part( 'template-parts/mobile-menu-toggle' );
						get_template_part( 'template-parts/mobile-menu' );
					}
				?>
	
				<?php if ( is_active_sidebar( 'site-header' ) ) : ?>
					<div id="site-header-search">
						<?php dynamic_sidebar( 'site-header' ); ?>
					</div><!-- #site-header-search -->
				<?php endif; ?>

				<nav id="faith-site-menu-main">
					<?php
					wp_nav_menu( array(
						'container' => '', 
						'container_class' => '', 
						'menu_class' => 'navbar-nav dropdown sf-menu', 
						'menu_id' => 'menu-main-menu',
						'sort_column' => 'menu_order', 
						'theme_location' => 'primary', 
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
						) );
					?>
				</nav><!-- #menu-main -->
			
			</div><!-- #site-header-navigation -->
			<?php } ?>
			
		</div><!-- .wrapper .wrapper-header -->

	</header><!-- .site-header -->