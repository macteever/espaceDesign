<?php get_header();?>
	<main role="main">
		<div class="container-fluid p-0">
			<div class="subheader-blog-slider">
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
					'author'	   => '',
					'post_status'      => 'publish',
					'suppress_filters' => true
				);

				$myposts = get_posts( $args );

				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
				<div style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size: cover;">
					<h2 class="text-center fs-36 text-white uppercase mt-200"><strong><?php the_title(); ?></strong></h2>
					<div class="text-center mt-120 mb-50"><a class="text-white fs-16" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">En savoir plus</a></div>
				</div>
				<?php
				endforeach;
				wp_reset_postdata();
				?>
			</div>
		</div>
		<div class="container-fluid pt-50 blog-bkg">
			<div class="container blog-content mb-80">
				<div class="row">
					<div class="col-xl-10 col-lg-10 col-md-12 col-12 mx-auto pb-30 pt-30">
						<h2>Les actualités</h2>
					</div>
				</div>
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();
				?>
				<div class="row no-flex no-flex-sm justify-content-center mb-30 post-billet">
					<div class="float-left col-xl-4 col-lg-4 col-md-12 col-12 blog-posts-img" style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size: cover; background-position: center;">
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-12 blog-excerpt blog-posts">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<strong><?php the_title(); ?></strong><br />
							<span class="intro-actu">
								<?php the_excerpt(); ?>
							</span>
						</a>
					</div>
				</div>
				<?php
				endwhile;
				else :
			endif;
			?>
			</div>
			<div class="row">
				<!-- pagination -->
				<div class="text-center">
					<div class="blog-pagination">
						<?php html5wp_pagination(); ?>
					</div>
				</div>
				<!-- /pagination -->
			</div>
		</div>
	</main>

<?php get_footer(); ?>
