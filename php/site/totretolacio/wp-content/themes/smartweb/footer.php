<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<?php require "language.php"; ?>
</div>
</main>
<footer>
	<div class="footerContent">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="footerFirstColumn">
						<!--<a class="logoFooterLink" href="<?php echo home_url(); ?>">
							<img class="img-responsive logoHeader" src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="Logo" />
						</a>-->
						<a class="footerFacebookLink" href="https://www.facebook.com/totretolacio" target="_blank">
							<i class="fa fa-facebook footerFacebookIcon"></i>
						</a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="footerSecondColumn">
						<!--<h4 class="footerTitle">TOTRETOLACIÓ</h4>-->
						<ul class="nav-footer">
							<?php
								switch(ICL_LANGUAGE_CODE){
									case "ca": echo getNavMenu('footerCat', false); break;
									case "es": echo getNavMenu('footerEs', false); break;
								}
							?>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="footerThirdColumn">
						<ul class="nav-footer">
							<li>
								<a class="footerTitle" href="<?php echo get_page_link(icl_object_id(32, 'page', true)); ?>">
									CONTACTA
								</a>
							</li>
						</ul>
						<!--<a href="<?php echo get_page_link(icl_object_id(32, 'page', true)); ?>">
							<h4 class="">CONTACTA</h4>
						</a>-->
						<p>
							686 01 98 64
						</p>
						<p>
							<a class="emailLink" href="mailto:info@totretolacio.com">info@totretolacio.com</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</div>
</body>
</html>
