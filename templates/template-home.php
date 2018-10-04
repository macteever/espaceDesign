<?php /* Template Name: Home */ get_header(); ?>
<main role="main" class="main-content">
	<div class="container-fluid home-bkg mt-80">
		<div class="container">
			<div class="row home-site-title">
				<h1 class="fs-80 text-darkgrey lh-22 mt-140 mb-120"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>

	<div class="container-fluid home-news">
		<div class="home-news-child">
			<div class="container">
				<div class="row mb-80 home-posts">
						<h2 class="fs-48 mt-50 mb-50">Nos dernières actualités</h2>
					<div class="col-12 home-posts-child">
							<?php $args = array(
								'posts_per_page'   => 2,
								'offset'           => 0,
								'category'         => '',
								'category_name'    => '',
								'orderby'          => 'date',
								'order'            => 'DESC',
								'include'          => '', 	'exclude'          => '',
								'meta_key'         => '',
								'meta_value'       => '',
								'post_type'        => 'post', 	'post_mime_type'   => '',
								'post_parent'      => '',
								'author'	   	   => '',
								'post_status'      => 'publish',
								'suppress_filters' => true
							);

							$myposts = get_posts( $args );

							foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
						<!-- 	<div>  -->
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<div class="col-xl-6 col-lg-6 col-md-6 col-12 float-left home-post" style="height: 300px;
								background: -webkit-linear-gradient(rgba(238,238,238,0.00) 15%, #2D2D2D 100%);
								background: -o-linear-gradient(rgba(238,238,238,0.00) 15%, #2D2D2D 100%);
								background: linear-gradient(rgba(238,238,238,0.00) 15%, #2D2D2D 100%),
								url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size: cover;">
										<h3 class="fw-300 roboto text-white fs-32"><?php the_title(); ;?></h3>
								</div>
							</a>
						<!-- 	</div> -->
							<?php
							endforeach;
							wp_reset_postdata();
							?>
					</div>
				</div>
		</div>
	</div>
</main>
<!-- /container-fluid -->
<?php get_footer(); ?>
