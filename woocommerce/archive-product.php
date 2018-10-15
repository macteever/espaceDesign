<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>
	<div class="container-fluid pl-0 pr-0">
		<?php
		/**
		 * Hook: woocommerce_before_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		//do_action( 'woocommerce_before_main_content' );
		?>
		<?php
		// verify that this is a product category page
		if ( is_product_category() ){
		    global $wp_query;
		    // get the query object
		    $cat = $wp_query->get_queried_object();
		    // get the thumbnail id using the queried category term_id
		    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
		    // get the image URL
		    $image = wp_get_attachment_url( $thumbnail_id );
		    // print the IMG HTML
		    //echo "<img src='{$image}' alt='' width='762' height='365' />";
				?>
				<div class="w-100 archive-produits-bkg" style="
					background: -webkit-linear-gradient(rgba(0,0,0,0.72) 15%, rgba(0,0,0,0.72) 100%);
					background: -o-linear-gradient(rgba(0,0,0,0.72) 15%, rgba(0,0,0,0.72) 100%);
					background: linear-gradient(rgba(0,0,0,0.72) 15%, rgba(0,0,0,0.72) 100%),
					url('<?php echo $image ?>')">
					<div class="container archive-produits-content">
						<div class="col-xl-8 col-lg-10 col-12">
							<div class="archive-global-title uppercase">
								<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
									<h1 class="woocommerce-products-header__title page-title fs-80 uppercase text-white"><?php woocommerce_page_title(); ?></h1>
								<?php endif; ?>
							</div>
							<div class="archive-global-excerpt sourcepro fs-20 text-white">
								<?php
								/**
								* Hook: woocommerce_archive_description.
								*
								* @hooked woocommerce_taxonomy_archive_description - 10
								* @hooked woocommerce_product_archive_description - 10
								*/
								do_action( 'woocommerce_archive_description' );
								?>
							</div>
						</div>
					</div>
				</div>
		<?php
		}
		// display title and custom img for GLOBAL archive product
		else {
			?>
			<?php
			if( have_rows('archive_produits', 'option') ):
			 while( have_rows('archive_produits', 'option') ) : the_row();
			 ?>
			<div class="w-100 archive-produits-bkg" style="
				background: -webkit-linear-gradient(rgba(0,0,0,0.72) 15%, rgba(0,0,0,0.72) 100%);
				background: -o-linear-gradient(rgba(0,0,0,0.72) 15%, rgba(0,0,0,0.72) 100%);
				background: linear-gradient(rgba(0,0,0,0.72) 15%, rgba(0,0,0,0.72) 100%),
				url(<?php the_sub_field('image'); ?>)">
				<div class="container archive-produits-content">
					<div class="col-xl-8 col-lg-10 col-12">
						<div class="archive-global-title uppercase">
							<?php the_sub_field('titre'); ?>
						</div>
						<div class="archive-global-excerpt sourcepro fs-20 text-white">
							<?php the_sub_field('description'); ?>
						</div>
					</div>
				</div>
			</div>
			<?php
			endwhile;
			else :
			endif;
			}
		?>
		<div class="container archive-product-container mt-130">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-12 archive-filter">
					<!-- Tri catégorie -->
					<h3 class="fs-16 poppins fw-300 d-flex justify-content-between">Filtrer par catégorie<i class="fa fs-16 fa-chevron-down"></i></h3>
					<div class="archive-filter-cat mb-30">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Widget Area 1', 'html5blank') )?>
					</div>
					<h3 class="fs-16 poppins fw-300 d-flex justify-content-between">Classer par<i class="fa fs-16 fa-chevron-down"></i></h3>
					<div class="archive-filter-rank">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Widget Area 2', 'html5blank') )?>
					</div>
				</div>
				<div class="col-xl-8 col-lg-8 col-md-12 col-12">
					<!-- Produit mis en avant -->
					<?php
					if ( is_product_category() ){
						?>
						<ul class="forward-product">
						<?php
						$current_cat = $wp_query->get_queried_object()->name;

						$args = array(
							'post_type' => 'product',
							'posts_per_page' => 1,
							'product_cat' => $current_cat,
							'tax_query' => array(
								array(
									'taxonomy' => 'product_visibility',
									'field'    => 'name',
									'terms'    => 'featured',
								),
							),
						);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) : $loop->the_post();
							wc_get_template_part( 'content', 'product' );
						endwhile;
					} else {
						echo __( 'No products found' );
					}
					wp_reset_postdata();
					?>
					</ul>
					<?php
					}else{
						?>
						<ul class="forward-product">
						<?php
						$args = array(
							'post_type' => 'product',
							'posts_per_page' => 1,
							'tax_query' => array(
								array(
									'taxonomy' => 'product_visibility',
									'field'    => 'name',
									'terms'    => 'featured',
								),
							),
						);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) : $loop->the_post();
							wc_get_template_part( 'content', 'product' );
						endwhile;
					} else {
						echo __( 'No products found' );
					}
					wp_reset_postdata();
					?>
					</ul>
					<?php
					}
					?>
				</div>
			</div>
			<?php
			if ( woocommerce_product_loop() ) {

				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );

				woocommerce_product_loop_start();
				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();
						/**
						 * Hook: woocommerce_shop_loop.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part( 'content', 'product' );
					}
				}
				woocommerce_product_loop_end();
				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}
			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
			/**
			 * Hook: woocommerce_sidebar.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			?>
		</div>
</div>

<?php get_footer(''); ?>
