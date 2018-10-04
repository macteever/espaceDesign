<div class="row align-items-center menu-section anim-300">
   <div class="col-xl-3 col-lg-3 col-3 anim-300 container-logo-menu pl-15">
      <!-- logo -->
      <div class="logo anim-300">
         <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="logo" class="anim-300 logo-img">
         </a>
      </div>
      <!-- /logo -->
   </div>
   <div class="col-xl-9 col-lg-9 col-9 anim-300 large-menu pr-15 text-right">
      <?php  espaceDesign_nav(); ?>

      <!-- <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
      <?php echo sprintf ( _n( '%d article', '%d articles', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
      </a>
      <a href="http://localhost/~nicolasmetivier/espaceDesign/panier/"><i class="text-darkgrey fs-22 fa fa-shopping-bag" aria-hidden="true"></i></a> -->

      <div id="menu-btn">
         <button>
            <span></span>
            <span></span>
            <span></span>
         </button>
         <span class="text-darkgrey ml-10">MENU</span>
      </div>
   <!-- /nav -->
   </div>
</div>
