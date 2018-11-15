<?php /* Template Name: Galerie*/ get_header(); ?>
  <main role="main" class="main-content">
    <div class="container-fluid pt-150">
      <div class="container">
        <div class="row justify-content-center text-center">
          <h1><?php the_title(); ?></h1>
        </div>

        <div class="row">
          <?php echo do_shortcode('[instagram-feed num=12 cols=4]'); ?>
        </diV>
      </div>
    </div>
  </main>
<?php get_footer(); ?>
