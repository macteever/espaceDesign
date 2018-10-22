<?php /* Template Name: Magasin */ get_header(); ?>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center pt-200 mag-intro">
        <div class="col-xl-7 col-lg-8 col-md-12 text-center mb-250">
        <?php
        if( have_rows('introduction') ):
            while ( have_rows('introduction') ) : the_row();
            ?>
          <div><?php the_sub_field('titre'); ?></div>
          <div class="fs-20 lh-28 fw-600">
            <?php the_sub_field('texte_intro'); ?>
          </div>
          <?php
          endwhile;
        else :
        endif;
        ?>
        </div>
      </div>
      <?php
      if( have_rows('part_presentation') ):
        while ( have_rows('part_presentation') ) : the_row();
      ?>
      <div class="row justify-content-center part-presentation1" style="background-image: url(<?php the_sub_field('bkg'); ?>);
       background-size: cover;
       background-repeat: no-repeat;
       background-position: bottom;">
        <div class="col-xl-8 col-lg-8 col-md-12 col-12 mb-100 text-center">
          <h2 class="text-white fw-600 fs-32 mt-300 mb-200"><?php the_sub_field('subtitle'); ?></h2>
        </div>
      </div>
      <div class="row justify-content-center part-presentation2">
        <div class="col-xl-8 col-lg-8 col-md-12 col-12 text-center mb-150">
          <div class="text-white fs-20 lh-28 mb-30">
            <?php the_sub_field('texte'); ?>
          </div>
          <div>
            <a class="fs-18 text-white posts-btn" href="<?php the_sub_field('lien_contact'); ?>">Nous trouver</a>
          </div>
        </div>
      </div>
      <?php
      endwhile;
      else :
      endif;
      ?>
      <div class="container">
        <div class="row justify-content-between pt-150 pb-150">
          <?php
          if( have_rows('part_details') ):
            while ( have_rows('part_details') ) : the_row();
            ?>
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
              <p class="fs-18 mb-30"><?php the_sub_field('texte'); ?></p>
              <a class="orange-btn" href="<?php the_sub_field(''); ?>">Nous contacter</a>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-12 col-12 d-flex flex-column justify-content-around pl-30 featured-infos">
              <?php
              if( have_rows('featured_infos') ):
                while ( have_rows('featured_infos') ) : the_row();
                ?>
                <h3 class="fs-36"><?php the_sub_field('infos'); ?></h3>
                <?php
              endwhile;
              else :
              endif;
              ?>
            </div>
            <?php
          endwhile;
          else :
          endif;
          ?>
        </div>
      </div>
      <div class="mag-slider row">
        <?php
				if( have_rows('slider_photos') ):
			    while ( have_rows('slider_photos') ) : the_row();
						$image = get_sub_field('img');
						if( !empty($image) ): ?>
            <div class="mag-slide">
              <a href="<?php echo $image['url']; ?>" data-fancybox>
  							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              </a>
            </div>
            <?php endif; ?>
					<?php
					endwhile;
				else :
				endif;
				?>
      </div>
      <div class="container">
        <div class="row pt-120 pb-100 align-items-center justify-content-around">
          <?php
          if( have_rows('bas_de_page') ):
            while ( have_rows('bas_de_page') ) : the_row();
            ?>
          <div class="col-xl-6 col-lg-6 col-md-12 col-12 fs-18 lh-24">
            <?php the_sub_field('texte'); ?>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-12 col-12">

            <?php $image = get_sub_field('img');
						if( !empty($image) ): ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            <?php endif; ?>
          </div>
          <?php
          endwhile;
        else :
        endif;
        ?>
        </div>
      </div>
    </div>
  </main>
<?php get_footer(); ?>
