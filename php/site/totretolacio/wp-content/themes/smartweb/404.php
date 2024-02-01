<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package totretolacio
 */

get_header(); ?>

<section class="flex-container">
  <div class="flex-row">
		<?php $page = get_page(icl_object_id(137, 'page', true)); ?>
    <div class="flex-item">
			<h1><?php echo $page->post_title; ?></h1>
		</div>
		<div class="flex-item">
			<h2><?php echo $page->post_content; ?></h2>
			<!--<h2><?php echo apply_filters('the_content', $page->post_content); ?></h2>-->
		</div>
  </div>
</section>

<?php
get_footer();
?>
