<?php /* Template Name: Contact */ get_header(); ?>
	<main role="main" class="main-content">
		<div class="container pt-150">
			<div class="contact-title row mb-50">
				<?php the_field('titre'); ?>
			</div>
			<div class="row justify-content-around">
				<div class="col-xl-5 col-lg-5 col-md-12 col-12">
					<?php echo do_shortcode('[contact-form-7 id="150" title="page-contact"]'); ?>
				</div>
				<div class="col-xl-5 col-lg-5 col-md-12 col-12 d-flex flex-column justify-content-around tmplt-contact-coord">
					<h3 class="fs-20 fw-300">Nous trouver</h3>
					<?php
					if( have_rows('coord_horaire') ):
					    while ( have_rows('coord_horaire') ) : the_row();
							?>
							<div class="contact-coord fs-18 lh-32 ls-1">
								<?php the_sub_field('coordonnees'); ?>
							</div>
							<?php
					    endwhile;
					else :
					endif;
					?>
					<div class="contact-horaire fs-18 lh-32 ls-1">
					<?php the_field('horaire'); ?>
					</div>
				</div>
			</div>
		</div>`
		<div class="container-fluid mt-80">
			<div class="row before-map">
			</div>
			<div class="row map">
				<div id="map"></div>
			</div>
			<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYM2FZ6PBFvla3XFMkE6xALHBw2KPY3LY&callback=initMap"></script>
		</div>
	</main>
<!-- /container-fluid -->
<?php get_footer(); ?>
