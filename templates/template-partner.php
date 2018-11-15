<?php /* Template Name: Partenariat */ get_header(); ?>
  <main role="main" class="main-content">
  <?php
  if( have_rows('haut_de_page') ):
      while ( have_rows('haut_de_page') ) : the_row();
      ?>
    <div class="container-fluid partner-top-page pt-200" style="background-image: linear-gradient(-180deg, rgba(255,255,255,0.46) 0%, #FFFFFF 59%, #FFFFFF 100%),url(<?php the_sub_field('bkg'); ?>);">
      <div class="container">
        <div class="row flex-column">
          <div class="partner-title poppins uppercase fs-24">
            <?php the_sub_field('titre'); ?>
          </div>
          <div class="poppins fs-16 lh-28 col-xl-8 col-lg-8 col-12 pl-0">
            <?php the_sub_field('introduction'); ?>
          </div>
        </div>
        <div class="row justify-content-center text-center sourcepro fs-24 fw-500 mt-300 pb-200">
          <div class="border-x-orange w-100">
            <?php the_sub_field('accroche'); ?>
          </div>
        </div>
      </div>
    </div>
    <?php
    endwhile;
    else :
    endif;
    ?>
    <div class="container mt-150">
      <?php
      if( have_rows('commerce_event') ):
        while ( have_rows('commerce_event') ) : the_row();
        ?>
        <div class="row commerce-event-row mb-150 align-items-end justify-content-around">
          <div class="col-xl-6 col-lg-6 col-12">
            <div class="commerce-event-title poppins fs-28 fw-600">
              <?php the_sub_field('titre'); ?>
            </div>
            <div class="fs-18 sourcepro mt-30">
              <?php the_sub_field('contenu'); ?>
            </div>
            <div class="mt-50">
              <a class="orange-btn" href="<?php the_sub_field('lien'); ?>">Voir nos créations</a>
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-12">
            <?php $image = get_sub_field('img'); ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          </div>
        </div>
        <?php
        endwhile;
        else :
      endif;
      ?>
      <div class="row justify-content-center mt-200 mb-200">
        <div class="col-xl-8 col-lg-8 col-12 text-center fs-20 fw-600 sourcepro">
          <?php the_field('details_creations'); ?>
        </div>
      </div>
      <?php
      if( have_rows('entreprises') ):
        while ( have_rows('entreprises') ) : the_row();
        ?>
        <div class="row justify-content-center text-center">
          <div class="col-xl-8 col-lg-8 col-12">
            <div class="fs-28 fw-700">
              <?php the_sub_field('titre'); ?>
            </div>
            <div class="mt-30 fs-18 sourcepro text-center">
              <?php the_sub_field('contenu'); ?>
            </div>
            <div class="mt-50 mb-150">
              <a class="orange-btn" href="<?php the_sub_field('lien'); ?>">Nous contacter</a>
            </div>
          </div>
        </div>
        <?php
        endwhile;
        else :
      endif;
      ?>
    </div>
    <div class="container-fluid partner-list-partners">
      <div class="container pb-100">
        <?php
        if( have_rows('partenaires') ):
          while ( have_rows('partenaires') ) : the_row();
          ?>
          <div class="row justify-content-center text-center flex-column">
            <div class="fs-28 fw-700 text-white text-center list-partner-title">
              <?php the_sub_field('titre'); ?>
            </div>
            <div class="text-white fs-18 sourcepro text-center mt-50">
              <?php the_sub_field('partner_list'); ?>
            </div>
          </div>
          <?php
          endwhile;
          else :
        endif;
        ?>
      </div>
    </div>

  </main>
<?php get_footer(); ?>
