<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header();
require 'language.php';
?>

<div class="entradaImatge"></div>

<div id="primary" class="container">
	<div id="content" class="row">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

			<section class="blogHome">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h1 class="blogHomeTitleH1"><?php echo $noticies; ?></h1>
						<h2 class="yellow blogHomeTitle"><?php echo $ultimesNoticies; ?></h2>

						<div class="row">
							<?php if ( have_posts() ) : ?>
								<?php
									/* The loop */
									while ( have_posts() ) : the_post();
										get_template_part( 'content', get_post_format() );
									endwhile;
								?>

								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 veureMesContainer">
									<a class="veureMes" href="<?php echo get_site_url() . '/blog'; ?>">
							      <?php echo $veureMes; ?>
							    </a>
							  </div>

								<?php twentythirteen_paging_nav(); ?>

							<?php else : ?>
								<?php get_template_part( 'content', 'none' ); ?>
							<?php endif; ?>
							<?php //include "blog.php"; ?>
						</div>
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>
