<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header();
require 'language.php';
?>
<meta name='robots' content='noindex,nofollow' />
<!--<div class="entradaImatge"></div>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<section class="blogHome">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php
							$page=get_page(108);
							$src=wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full', false );
						?>

						<article id="post-<?php the_ID(); ?>">

							<h1 class="noMargin entradaTitul"><?php echo get_the_title(); ?></h1>
							<?php $srcImg= wp_get_attachment_image_src( get_post_thumbnail_id(icl_object_id(get_the_id(), 'page', true)), 'full');?>
							<img src="<?=$srcImg[0]?>" class="img-responsive" alt="<?php echo the_title();?>">

							<div class="entradaInformacioContainer">
								<i class="fa fa-user entradaInformacioIcones"></i>
								&nbsp;
								<font class="entradaInformacio">
									<?php echo ucfirst(get_the_author()); ?>
								</font>
								&nbsp; &nbsp;
								<i class="fa fa-calendar entradaInformacioIcones"></i>
								&nbsp;
								<font class="entradaInformacio">
									<?php echo ucfirst(get_the_date('l, j \d\e ', '', '', FALSE)) . ucfirst(get_the_date('F \d\e Y', '', '', FALSE)); ?>
								</font>
							</div>

							<div class="entradaSeparadorSuperior"></div>

							<?php echo the_content();?>

							<div class="entradaSeparadorInferior"></div>

							<div class="addthis_toolbox addthis_default_style addthis_32x32_style entradaBotonsCompartirContainer">
								<div class="entradaCompartir" ><?php echo $compartir;?></div>
								<a class="addthis_button_facebook"></a>
								<a class="addthis_button_twitter"></a>
								<a class="addthis_button_linkedin"></a>
								<a class="addthis_button_google_plusone_share"></a>
							</div>

							<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
							<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51a5fa9c59636a3d"></script>
						</article>
					</div>
				</div>
			</section>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				  <section class="separator-sidebar-blog-top"></section>
				</div>
				<?php include "sidebar-web.php"; ?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				  <section class="separator-sidebar-blog-bottom"></section>
				</div>
			</div>
		</div>
	</div>
</div>
-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
