	<footer id="site-footer">
		<div class="top">
			<div class="container">
				<div class="row clearfix no-gutter">
					<div class="col-md-12">


						<div class="row">
						<div class="col-md-12">
								<a href="/" class="brand"></a>



								<div class="top">
									<?php
									wp_nav_menu(
										array(
								            'depth' => 1,
								            'menu' => 'Footer Menu',
								            'menu_class' => 'clearfix',
								            'container' => 'nav'
							        	)
							        );
							    	?>
								</div>
								<div class="bottom">
									<ul>

										<li>
											<p class="copyright"><span class="copy"><?php echo get_field('copyright_text', 'options'); ?></span></p>
										</li>
										<li class="social-links">
												<?php if (get_field('facebook', 'options')) : ?>
												<a href="<?php echo get_field('facebook', 'options'); ?>" target="_blank"><i class="icon-facebook"></i></a>
												<?php endif; ?>

												<?php if (get_field('twitter', 'options')) : ?>
												<a href="<?php echo get_field('twitter', 'options'); ?>" target="_blank"><i class="icon-twitter"></i></a>
												<?php endif; ?>
										</li>
										<li class="fixing1">
											<p class="privacy-terms">
												<a href="/privacy-policy" class="privacy">Privacy Policy</a>
												<a href="/terms-of-use" class="terms">Terms of Use</a>
											</p>
										</li>
									</ul>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</footer>

	</div>
	</div>


	<!-- Scripts & WP Footer -->
	<?php wp_footer(); ?>

	<!-- AddThis Button -->
	<script>var addthis_config = {"data_track_addressbar":false};</script>
	<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51c770552f90ce31"></script>

	<!-- Twitter JS -->
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

	<!-- Remarketing Pixels -->
	<?php if( get_option('remarketing_pixel')) echo get_option('ai_remarketing_code'); ?>

	</body>
</html>