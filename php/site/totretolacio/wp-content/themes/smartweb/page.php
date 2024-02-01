<?php
/**
* The template for displaying all pages
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages and that other
* 'pages' on your WordPress site will use a different template.
*
* @package WordPress
* @subpackage Twenty_Thirteen
* @since Twenty Thirteen 1.0
*/

get_header(); ?>
<?php require "language.php"; ?>
<!-- SOBRE NOSALTRES -->
<?php if(get_the_ID()== icl_object_id(22, 'page', true)){?>
<?php $page = get_page(icl_object_id(22, 'page', true)); ?>
<?php $src=wp_get_attachment_image_src( get_post_thumbnail_id(icl_object_id($page->ID, 'page', true)), 'full', false );?>
<!--<section class="aboutUsTopImg" style="background-image: url('<?php echo $src[0];?>');"></section>-->

<?php $page = get_page(icl_object_id(22, 'page', true)); ?>
<article class="aboutUs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="aboutUsContainer">
					<h1><?php echo $page->post_title; ?></h1>
	    		<?php echo apply_filters('the_content', $page->post_content); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="grid">
					<?php
					$custom_post = pods('page', icl_object_id(22, 'page', true));

					$galeria = $custom_post->field('galeria');
					$galeriaCounter = 0;

					foreach ($galeria as $imatge){
					?>

			      <div class="grid-item">
							<div class="img-home" >
								<div class="aboutUsImgContainer">
									<a rel="gallery-<?php the_ID(); ?>" href="<?php echo $imatge['guid']; ?>" class="swipebox">
										<?php echo wp_get_attachment_image($imatge['ID'], 'full', false, array( 'alt' => $imatge['post_title'], 'class' => 'img-responsive' )); ?>
									</a>
								</div>
							</div>
			      </div>

					<?php
						$galeriaCounter++;
					}
					?>
				</div>
			</div>
		</div>
	</div>
</article>

<!-- PORTAFOLI -->
<?php  }else if(get_the_ID()== icl_object_id(28, 'page', true)){?>
<?php $page = get_page(icl_object_id(22, 'page', true)); ?>
<?php $src=wp_get_attachment_image_src( get_post_thumbnail_id(icl_object_id($page->ID, 'page', true)), 'full', false );?>
<section class="aboutUsTopImg" style="background-image: url('<?php echo $src[0];?>');"></section>

<?php $page = get_page(icl_object_id(28, 'page', true)); ?>
<article>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1><?php echo $page->post_title; ?></h1>
			</div>
		</div>
	</div>
</article>

<!-- PÀGINA 404 -->
<?php }else{?>
	<meta name='robots' content='noindex,nofollow' />
<!--<section>
	ERROR 404
</section>-->
<?php }?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
