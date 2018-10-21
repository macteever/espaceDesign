<?php get_header(); ?>
<main role="main">
	<section>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="container-fluid">
				<div class="row" style="background: background: -webkit-linear-gradient(rgba(0,0,0,0.33) 15%, rgba(0,0,0,0.33) 100%);
		    background: -o-linear-gradient(rgba(0,0,0,0.33) 15%, rgba(0,0,0,0.33) 100%);
		    background: linear-gradient(rgba(0,0,0,0.33) 15%, rgba(0,0,0,0.33) 100%),
				url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size: cover; height: 400px; background-position: center; background-attachment: fixed;">
				</div>
				<div class="container post-container p-30">
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-md-12 col-12 post-content">
							<!-- post title -->
							<h1 class="text-orange fs-66 fw-600 mb-20"><?php the_title(); ?></h1>
							<!-- /post title -->
							<div class="post-details mt-30 mb-20">
								<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author(); ?></span>
								<span class="date"> le <?php the_time('j F Y'); ?></span>
								<span class="float-right hidden-xs"><b><a href="/actualites"><i class="fa fa-angle-left fs-16 ml-15 mr-15" aria-hidden="true"></i>Retour page articles</a></b></span>
							</div>
							<div class="fs-18 lh-24 sourcepro">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-12 text-right post-related pt-80">
							<?php
							$category = get_the_category();
							$first_category = $category[0];
							?>
							<strong class="fs-16 fw-300">Catégorie : <?php echo sprintf( '<a class="fs-18 fw-400 text-orange ml-10" href="%s">%s</a>', get_category_link( $first_category ), $first_category->name ); ?></strong>
							<div>
								<?php
								// the query
								$wpb_all_query = new WP_Query(array(
									'post_type'=>'post',
									'post_status'=>'publish',
									'posts_per_page'=> 3
								));
								if ( $wpb_all_query->have_posts() ) :
									?>
									<ul class="mt-80">
										<!-- the loop -->
										<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
											<li>
												<a href="<?php the_permalink(); ?>">
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
														<div><a class="text-white fs-18 posts-btn ls-1" href="<?php the_permalink(); ?>">Lire l'article</a></div>
													</div>
													<div class="single-post-filter"><a href="<?php the_permalink(); ?>"></a></div>
												</a>
											</li>
										<?php endwhile; ?>
										<!-- end of the loop -->
									</ul>
									<?php wp_reset_postdata(); ?>
								<?php else : ?>
									<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="row justify-content-center posts-pagination mt-50	mb-30">
						 <?php posts_nav_link(' &#183; ', 'Prec', 'Suiv'); ?>
							<span class="nav-previous previus-post"><?php previous_post_link(); ?></span>
							<span class="ml-15 mr-15">|</span>
							<span class="nav-next next-post"><?php next_post_link(); ?></span>
					</div>
					<div class="row justify-content-center social-share mb-15">
						<p class="fs-16 text-center">PARTAGEZ</p>
					</div>
					<div class="row justify-content-center mb-50">
						<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share this post on Facebook!" onclick="window.open(this.href); return false;"><i class="fa fa-facebook-official fs-18 mr-30" aria-hidden="true"></i></a>
						<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus fs-18 ml-30" aria-hidden="true"></i></a>
					</div>
				</div>

			</div>
		</article>

	<?php endwhile; ?>

	<?php else: ?>

		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>

	<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
