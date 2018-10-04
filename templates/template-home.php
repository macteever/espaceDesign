<?php /* Template Name: Home */ get_header(); ?>
<main role="main" class="main-content">
	<div class="container-fluid pl-0 pr-0">
		<section class="main-slider" id="port">
			<?php
			// check if the flexible content field has rows of data
			if( have_rows('slider_home') ):
				// loop through the rows of data
				while ( have_rows('slider_home') ) : the_row();

				if( get_row_layout() == 'slide_image' ):?>
				<div class="item image">
					<img class="parallax-layer object-fit-cover w-100 h-100" src="<?php the_sub_field('image');?>" alt="Espace design bordeaux mobiliers sculptures et tableaux design"/>
					<div class="anim-500 slider-title-content d-flex align-items-center">
						<div class="anim-500 container d-flex flex-column">
							<div class="anim-500 slider-title ">
								<div class="">
									<div class="text-white poppins uppercase anim-300"><?php the_sub_field('titre');?></div>
									<div class="fs-28 text-white anim-500 poppins mb-30"><?php the_sub_field('description');?></div>
									<a href="<?php the_sub_field('lien_bouton');?>" class="orange-btn"><?php the_sub_field('texte_bouton');?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php elseif( get_row_layout() == 'slide_video' ):?>
					<div class="item video">
						<video class=" object-fit-cover w-100 h-100 slide-video slide-media" loop muted preload="metadata" poster="<?php the_sub_field('preview_img');?>">
							<source src="<?php the_sub_field('video');?>" type="video/mp4" />
						</video>
						<div class="anim-500 slider-title-content d-flex align-items-center">
							<div class="anim-500 container d-flex flex-column">
								<div style="margin-top: 100px;" class="anim-500 playfair m-l-10 slider-title ">
									<div class="anim-1000 text-center">
										<!-- <img class="text-left m-auto apparition anim-500" src="<?php the_sub_field('image_overlay');?>" alt=""/> -->
										<h1 class="uppercase"><?php the_sub_field('titre');?></h1>
										<h2 class=""><?php the_sub_field('description');?></2>
										<a href="<?php the_sub_field('lien_bouton');?>" class="slider-btn playfair fs-16 text-white apparition"><?php the_sub_field('texte_bouton');?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif;
				endwhile;
				else :
					// no layouts found
				endif;
				?>
			</section>
		</div>
	</div>

	<div class="container-fluid home-news">
		<div class="home-news-child">
			<div class="container">
				<div class="row mb-80 home-posts">
						<h2 class="fs-48 mt-50 mb-50">Nos dernières actualités</h2>
					<div class="col-12 home-posts-child">
							<?php $args = array(
								'posts_per_page'   => 3,
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
