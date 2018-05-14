<?php
/**
 * The template for displaying easy digital downloads archive.
 *
 *
 * @package OceanWP WordPress theme
 */

get_header(); ?>

	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr">

			<?php do_action( 'ocean_before_content' ); ?>

			<div id="content" class="site-content clr">

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<?php
				if( have_posts() ) {

					if( is_post_type_archive( 'download' ) || is_tax( array( 'download_category', 'download_tag' ) ) ) {
						
						do_action( 'ocean_before_archive_download' );
						?>
						<div class="oceanwp-row <?php echo esc_attr( oceanwp_edd_loop_classes() ); ?>">
						
						<?php
						// Archive Post Count for clearing float
						$oceanwp_count = 0;

						while ( have_posts() ) : the_post();

							$oceanwp_count++;

							get_template_part( 'partials/edd/archive' );

							if ( oceanwp_edd_entry_columns() == $oceanwp_count ) {
								$oceanwp_count=0;
							}

						endwhile;
						?>
						</div>
						
						<?php
						do_action( 'ocean_after_archive_download' );

					} else {
						?>
						<div id="blog-entries" class="entries clr oceanwp-row blog-grid">
						<?php

						// Archive Post Count for clearing float
						$oceanwp_count = 0;

						while ( have_posts() ) : the_post();

							$oceanwp_count++;

							get_template_part( 'partials/entry/layout', get_post_type() );

							if ( oceanwp_blog_entry_columns() == $oceanwp_count ) {
								$oceanwp_count = 0;
							}

						endwhile;
						?>
						</div>
						<?php
					}
				}
				else {
					get_template_part( 'partials/none' );
				}
				?>
				<?php do_action( 'ocean_after_content_inner' ); ?>

			</div><!-- #content -->

			<?php do_action( 'ocean_after_content' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'ocean_after_primary' ); ?>

		<?php do_action( 'ocean_display_sidebar' ); ?>

	</div><!-- #content-wrap -->

	<?php do_action( 'ocean_after_content_wrap' ); ?>

<?php get_footer(); ?>