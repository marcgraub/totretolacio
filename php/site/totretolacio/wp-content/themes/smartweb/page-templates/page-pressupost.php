<?php
/**
 * Template name: Pressupost
 *
 * @package totretolacio
 */

get_header();
?>

<?php
//get_template_part( 'content-templates/content', 'map' );
?>

<section class="pressupost">
  <div class="container">
    <?php $page = get_page(icl_object_id(30, 'page', true)); ?>
    <?php echo apply_filters('the_content', $page->post_content); ?>
  </div>
</section>



<?php
get_footer();
?>
