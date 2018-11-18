<?php /* Template Name: Home */ get_header(); ?>
<main role="main" class="main-content">
	<div class="container-fluid pl-0 pr-0">
		<section class="main-slider" id="home">
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
								<div class="h-100 d-flex flex-column justify-content-center">
									<div class="text-white poppins uppercase anim-300"><?php the_sub_field('titre');?></div>
									<div class="fs-28 slider-title-excerpt text-white anim-500 poppins mb-30"><?php the_sub_field('description');?></div>
									<div>
										<a href="<?php the_sub_field('lien_bouton');?>" class="orange-btn"><?php the_sub_field('texte_bouton');?></a>
									</div>
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
								<div class="anim-500 slider-title ">
									<div class="h-100 d-flex flex-column justify-content-center">
										<div class="text-white poppins uppercase anim-300"><?php the_sub_field('titre');?></div>
										<div class="fs-28 slider-title-excerpt text-white anim-500 poppins mb-30"><?php the_sub_field('description');?></div>
										<div>
											<a href="<?php the_sub_field('lien_bouton');?>" class="orange-btn"><?php the_sub_field('texte_bouton');?></a>
										</div>
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
		<section>
			<div class="container">
				<div class="row justify-content-center intro-category-before">
					<img src="<?=get_template_directory_uri().'/assets/img/arrow-home.svg'?>" alt="espace design bordeaux créations mobiliers tableaux sculptures">
				</div>
				<div class="row flex-column pt-80 pb-80 justify-content-center align-items-center text-center intro-category p-relative">
					<?php
					if( have_rows('intro_category') ):
						 while ( have_rows('intro_category') ) : the_row();
						 ?>
						 <div class="col-xl-6 col-lg-6 col-md-12 col-12">
							 <h3 class="fs-36 uppercase"><?php the_sub_field('titre'); ?></h3>
							 <div class="fs-18 sourcepro text-center mt-30">
								 <?php the_sub_field('content'); ?>
							 </div>
						 </div>
						 <?php
	 				    endwhile;
	 				else :
	 				endif;
	 				?>
				</div>
				<div class="row anim-300">
					<?php
					$compt = 0;
					if( have_rows('home_category') ):
					    while ( have_rows('home_category') ) : the_row();
						 ?>
						 <?php if (($compt < 3)) { ?>
						 <div class="anim-500 col-xl-4 col-lg-4 col-md-6 col-12 p-relative col-category mb-30">
							 <?php
							 $terms = get_sub_field('lien');
							 if( $terms ): ?>
							 <?php foreach( $terms as $term ): ?>
							 <a class="d-block" href="<?php echo get_term_link( $term ); ?>">
							 <?php
								$image = get_sub_field('img');
								if( !empty($image) ): ?>
									<img class="" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>"/>
								<?php endif;
								?>
								<div class="p-absolute col-category-content">
									<h2 class="fs-36 fw-500 text-white mb-10"><?php the_sub_field('nom_cat'); ?></h2>
									<div class="o-hidden anim-500">
										<div class="anim-500 fs-15 mb-20	home-cat-excerpt text-white">
											<?php the_sub_field('description'); ?>
										</div>
									</div>
									<a class="orange-brd-btn-shadow sourcepro" href="<?php echo get_term_link( $term ); ?>">Voir nos créations</a>
								</div>
						 	 </a>
							 <?php endforeach; ?>
						 <?php endif; ?>
						 </div>
						 <?php } elseif (($compt > 2 && $compt < 5)) { ?>
							 <div class="anim-500 col-xl-6 col-lg-6 col-md-6 col-12 p-relative col-category mb-30">
								 <?php
								 $terms = get_sub_field('lien');
								 if( $terms ): ?>
								 <?php foreach( $terms as $term ): ?>
								 <a class="d-block" href="<?php echo get_term_link( $term ); ?>">
								 <?php
									$image = get_sub_field('img');
									if( !empty($image) ): ?>
										<img class="" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>"/>
									<?php endif;
									?>
									<div class="p-absolute col-category-content">
										<h2 class="fs-36 fw-500 text-white mb-10"><?php the_sub_field('nom_cat'); ?></h2>
										<div class="o-hidden anim-500">
											<div class="anim-500 fs-15 mb-20	home-cat-excerpt text-white">
												<?php the_sub_field('description'); ?>
											</div>
										</div>
										<a class="orange-brd-btn-shadow sourcepro" href="<?php echo get_term_link( $term ); ?>">Voir nos créations</a>
									</div>
							 	 </a>
								 <?php endforeach; ?>
							 <?php endif; ?>
							 </div>
						 <?php } ?>
						 <?php $compt++; ?>
						 <?php
					    endwhile;
					else :
					endif;
					?>
				</div>
				<div class="row mt-100 mb-100 align-items-center">
					<?php
					if( have_rows('home_partner') ):
					    while ( have_rows('home_partner') ) : the_row();
						 ?>
						 <div class="col-xl-6 col-lg-6 col-md-12 col-12 home-partner-img">
						 <?php
							$img = get_sub_field('image');
							if( !empty($img) ): ?>
								<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" title="<?php echo $img['title']; ?>"/>
							<?php endif;
							?>
						 </div>
						 <div class="col-xl-5 col-lg-5 col-md-12 col-12">
							 <div class="mb-30"><?php the_sub_field('titre'); ?></div>
							 <div class="mb-30 fs-18"><?php the_sub_field('texte'); ?></div>
							 <div ><a class="orange-btn" href="<?php the_sub_field('lien'); ?>">En savoir plus</a></div>
						 </div>
						 <?php
	 				    endwhile;
	 				else :
	 				endif;
	 				?>
				</div>
			</div>
		</section>
	</div>
	<div class="container-fluid home-news" style="
		background: -webkit-linear-gradient(rgba(0,0,0,0.72) 15%, rgba(0,0,0,0.72) 100%);
		background: -o-linear-gradient(rgba(0,0,0,0.72) 15%, rgba(0,0,0,0.72) 100%);
		background: linear-gradient(rgba(0,0,0,0.72) 15%, rgba(0,0,0,0.72) 100%),
		url('<?php the_field('home_blog_bkg') ?>'); background-size: cover; background-position: center;">
		<div class="container home-news-container pt-80 pb-80">
			<div class="row mb-50">
				<h3 class="text-white fs-36 ls-1 uppercase mx-auto">Les dernières <span class="text-orange">actualités</span></h3>
			</div>
			<div class="col-xl-10 col-lg-10 col-md-12 col-12 mx-auto">
				<div class="home-blog-slider border-x">
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
					<div class="col-xl-6 col-lg-6 col-md-12 col-12">
						<a class="text-white" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<h3 class="fw-300 pl-0 text-white fs-28"><?php the_title(); ;?></h3>
							<p class="sourcepro fs-18 text-white mt-30 mb-30">
								<?php the_excerpt(); ?>
							</p>
							<div class="p-10 pl-0">
								<a class="orange-btn" href="<?php the_permalink(); ?>">Lire l'actu</a>
							</div>
						</a>
					</div>
					<?php
				endforeach;
				wp_reset_postdata();
				?>
				</div>
			</div>
		</div>
	</div>
	<!-- /container-fluid -->
</main>
<?php get_footer(); ?>
