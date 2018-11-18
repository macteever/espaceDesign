<?php get_header();?>
	<main role="main" class="main-actus">
		<div class="container-fluid p-0" style="
		background: -webkit-linear-gradient(-179deg, rgba(255,255,255,0.00) 0%, #FFFFFF 70%, #FFFFFF 98%);
		background: -o-linear-gradient(-179deg, rgba(255,255,255,0.00) 0%, #FFFFFF 70%, #FFFFFF 98%);
		background: linear-gradient(-179deg, rgba(255,255,255,0.00) 0%, #FFFFFF 70%, #FFFFFF 98%),
		url('<?php the_field('actus_bkg', 'option') ?>');
		background-repeat: no-repeat;
		background-size: cover;
		background-position: top;">
			<div class="container">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-12 col-12 pt-150">
						<h1 class="uppercase fs-42 w-100">Notre
						<span class="text-orange fs-60 fw-700">actualité</span>
						</h1>
						<div class="d-flex flex-column justify-content-center">
							<h2 class="text-center fs-22 mt-50 mb-30">Filtrer par catégorie</h2>
							<img class="mb-30" src="<?=get_template_directory_uri().'/assets/img/actus-chevron.svg'?>" alt="espace design bordeaux mobilier design tableaux créateurs">
						</div>
						<?php

							?>
						<div class="index-category d-flex flex-column text-center fs-18">
							<?php
					    $terms = get_categories();
					    foreach ($terms as $term){
					        $term_link = get_term_link($term);
								?>
					      <div class="mb-10">
									<a href="<?php echo $term_link ?>" data-id="<?php; echo $term->term_id; ?>" data-slug="<?php echo $term->slug; ?>">
										<h4 class='fs-18 py-15 px-30'><?php echo $term->name; ?></h4>
									</a>
								</div>
					    <?php }
					    ?>
							<a href="/espacedesign/actualites"><h4 class="fs-18 py-15 fw-700 px-30">Voir tout</h4></a>
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-12 col-12 mt-150 pb-200 posts-container">
						<?php
						if ( have_posts() ) :
						while ( have_posts() ) : the_post();
						?>
						<div class="col-xl-6 col-lg-6 col-md-12 col-12 posts-billet pb-80">
							<a class="d-block posts-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" alt="espace design bordeaux mobilier tableaux créateurs design">
								<div class="post-related-infos text-left">
									<h3 class="fs-32 uppercase text-white"><?php the_title(); ?></h3>
									<p class="text-white mb-30">
										<?php $category_detail=get_the_category();//$post->ID
											 foreach($category_detail as $cd){
											 echo $cd->cat_name;
											 }
										?>
									</p>
									<div><a class="text-white fs-16 posts-btn ls-1" href="<?php the_permalink(); ?>">Lire l'article</a></div>
								</div>
								<div class="single-post-filter"><a href="<?php the_permalink(); ?>"></a></div>
							</a>
						</div>
						<?php
					endwhile;
					else :
					endif;
					?>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); ?>
