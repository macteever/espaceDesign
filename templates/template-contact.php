<?php /* Template Name: Contact */ get_header(); ?>

	<main role="main" class="main-content">
		<div class="container-fluid pl-0 pr-0">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="row no-flex ml-0 mr-0">
						<div class="text-container-left float-left mt-150 mb-80">
							<h1 class="fs-48 mt-30 mb-15 contact-title-after"><?php the_title(); ?></h1>
							<div class="fs-18 fw-300 lh-18 mb-30"><?php the_field('contact_descr'); ?></div>
							<?php the_content(); ?>
						</div>
						<div class="contact-map float-left col-xl-6 col-lg-6 col-md-6 col-12 pr-0">
							<div id="map"></div>
						</div>
					</div>

				</article>
				<!-- /article -->
			<?php endwhile; ?>

			<?php else: ?>
				<!-- article -->
				<article>
					<h2><?php _e( 'Sorry, nothing to display.', 'espaceDesign' ); ?></h2>
				</article>
				<!-- /article -->
			<?php endif; ?>
		    <script async defer
		      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYM2FZ6PBFvla3XFMkE6xALHBw2KPY3LY&callback=initMap">
		    </script>
		</div>
	</main>
<!-- /container-fluid -->
<?php get_footer(); ?>
