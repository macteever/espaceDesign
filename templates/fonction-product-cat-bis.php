<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<?php
$args = array(
    'number'     => $number,
    'orderby'    => 'title',
    'order'      => 'ASC',
    'hide_empty' => $hide_empty,
    'include'    => $ids
);
$product_categories = get_terms( 'product_cat', $args );
$count = count($product_categories);
if ( $count > 0 ){
    foreach ( $product_categories as $product_category ) {
    	?>
        <h3><a class="snell fs-30 text-fushia" href="<?php echo get_term_link( $product_category ); ?>"><?php echo  $product_category->name; ?></a></h3>
        <?php
        $args = array(
            'posts_per_page' => -1,
            'tax_query' => array(
            'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $product_category->slug
                )
            ),
            'post_type' => 'product',
            'orderby' => 'title,'
        );
        $products = new WP_Query( $args );

        while ( $products->have_posts() ) {
            $products->the_post();
            ?>
                <div class="p-r-15">
				<!-- LIEN PRODUIT CLIQUABLE -->
					<div class="relax-post-product m-b-20 open fs-15 fw-400">
						<div>
							<h3 class="open fs-16 fw-700 m-t-auto m-t-0"><?php the_title(); ?><span class="m-l-5 lighter"><?php the_field('duree_unique'); ?></span></h3>
						</div>
						<div class="flex">
							<div class="fw-300 text-justify product-excerpt">
								<?php the_excerpt(); ?>
							</div>
							<div class="flex m-l-auto prices-formule">
								<?php
								if( have_rows('prix_formule') ):
								 	// loop through the rows of data
								    while ( have_rows('prix_formule') ) : the_row();
								?>
									<p class="m-b-0 inline open fs-18 fw-600"><?php the_sub_field('solo'); ?> €</p>
									<p class="m-b-0 inline open fs-18 fw-600 m-l-30"><?php the_sub_field('duo'); ?> €</p>
								<?php
							    endwhile;
								else :
								endif;
								?>
								<a class="m-l-20 p-b-5" href="<?php echo get_permalink();?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/gift-relaxation-institut-beaute-poitiers.svg" alt="Chèques cadeaux esthétique l'instant pour soi Poitiers Institut beauté">
								</a>
							</div>
						</div>
					</div>
				<!-- FIN LIEN PRODUIT CLIQUABLE -->
				</div>
            <?php
        }
    }
}
?>
</div>