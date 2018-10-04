			<!-- footer -->
			<footer class="footer text-white pl-30 pr-30" role="contentinfo">
				<div class="container-fluid" id="contact">
					<div class="row align-items-center justify-content-between">
						<img class="" src="<?=get_template_directory_uri().'/assets/img/logo-complet.svg'?>" alt="espace design bordeaux mobilier tableaux sculpture design bordeaux"/>
						<p class="text-white fs-15 align-self-end mb-0 fw-300">
							&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>
							<a href="/mentions-legales" class="text-white">- Mentions légales</a>
						</p>
						<div class="align-self-end">
							<a href="#" target="blank"><i class="ml-20 fa fa-facebook-official text-white fs-22" aria-hidden="true"></i></a>
							<a href="#" target="blank"><i class="ml-20 fa fa-instagram text-white fs-22" aria-hidden="true"></i></a>
							<a href="#"><i class="ml-20 fa fa-google-plus text-white fs-20" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-109419102-1', 'auto');
		  ga('send', 'pageview');

		</script>

	</body>
</html>
