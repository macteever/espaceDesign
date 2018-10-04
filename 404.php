<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<div class="container-fluid" id="page-404" style="background: 
		-webkit-linear-gradient( 90deg, rgb(234,234,234) 0%, rgba(234,234,234,0.96) 12%, rgba(234,234,234,0.9) 32%, rgba(234,234,234,0.74902) 83%, rgba(234,234,234,0.74902) 100%),
		url('<?=get_template_directory_uri().'/assets/img/sportiforme-coach-sportif-domicile.jpg'?>'); background-size: cover;">
			<section class=" text-center">

				<h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>
				<h2>
					<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
				</h2>
			</section>
		</div>
	</main>


<?php get_footer(); ?>
