<?php
/**
 * Template name: Contacta
 *
 * @package totretolacio
 */

get_header();
?>

<?php
//get_template_part( 'content-templates/content', 'map' );
?>

<section class="contacta">
  <div class="container">
    <div class="row">
      <?php
      $args = array(
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'post_parent' => 32,
        'post_type' => 'page',
        'post_status' => 'publish'
      );
      $contacta_child_page = new WP_Query( $args );

      if ( $contacta_child_page->have_posts() ) : while ( $contacta_child_page->have_posts() ) : $contacta_child_page->the_post();
      ?>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="contactaInfoContainer">
            <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => 'img-responsive img-contactaInfo' ) ); ?>
            <?php the_content(); ?>
          </div>
        </div>
      <?php
      endwhile; endif;
      ?>
    </div>
    <?php $page = get_page(icl_object_id(32, 'page', true)); ?>
    <?php echo apply_filters('the_content', $page->post_content); ?>
  </div>
</section>



<?php
get_footer();
?>
