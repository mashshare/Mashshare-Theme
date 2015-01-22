<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package rootstrap
 */
?>
<?php do_action( 'rootstrap_sidebar_start' ); ?>
	<div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary">
		<?php do_action( 'rootstrap_sidebar_before' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Archives', 'rootstrap' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h1 class="widget-title"><?php _e( 'Meta', 'rootstrap' ); ?></h1>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
		<?php do_action( 'rootstrap_sidebar_after' ); ?>
	</div><!-- #secondary -->
	<?php do_action( 'rootstrap_sidebar_end' ); ?>