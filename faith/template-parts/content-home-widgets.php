<?php
if ( is_active_sidebar( 'home-col-1' ) || is_active_sidebar( 'home-col-2' ) ) : ?>

<div id="ilovewp-home-welcome">

	<div class="wrapper">

		<div class="ilovewp-columns ilovewp-columns-2">

			<div class="ilovewp-column ilovewp-column-1">

				<div class="ilovewp-column-wrapper">

					<?php if ( is_active_sidebar( 'home-col-1' ) ) {
						dynamic_sidebar( 'home-col-1' );
					} else { _e('&nbsp;','faith'); } ?>

				</div><!-- .ilovewp-column-wrapper -->

			</div><!-- .ilovewp-column .ilovewp-column-1 -->
			<?php if ( is_active_sidebar( 'home-col-2' ) ) { ?>
			<div class="ilovewp-column ilovewp-column-2">

				<div class="ilovewp-column-wrapper">

					<?php dynamic_sidebar( 'home-col-2' ); ?>

				</div><!-- .ilovewp-column-wrapper -->

			</div><!-- .ilovewp-column .ilovewp-column-2 -->
			<?php } ?>

		</div><!-- .ilovewp-columns .ilovewp-columns-2 -->

	</div><!-- .wrapper -->

</div><!-- #ilovewp-home-welcome -->

<?php endif; ?>