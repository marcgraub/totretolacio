<?php
/**
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package smartweb
 */

get_header(); ?>

<?php
$args = array(
  'order' => 'ASC',
  'orderby' => 'menu_order',
  'post_type' => 'serveis',
  'post_status' => 'publish',
  'posts_per_page' => -1
);
$home_serveis = new WP_Query( $args );
?>

<section class="homeGrid">
  <div class="grid">
    <?php
    if( $home_serveis->have_posts() ) : while ( $home_serveis->have_posts() ) : $home_serveis->the_post();
     $category = get_the_category()[0]->slug;
     //$url = get_post_type_archive_link( 'category' ) . $category;
     //global $post;
     //$post_slug=$post->post_name;
     $anchorTitle = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove',str_replace(' ', '_', get_the_title()));
     $url = get_category_link( get_cat_ID( $category ) ) . '#' . $anchorTitle;
    ?>
      <div class="grid-item">
        <a class="homeGridItemContainer" href="<?php echo $url; ?>">
          <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => 'img-responsive img-home' ) ); ?>
          <!--<a class="homeButton" href="<?php the_permalink() ?>"><?php the_title(); ?></a>-->
          <a class="homeButton" href="<?php echo $url; ?>"><?php the_title(); ?></a>
        </a>
      </div>
    <?php
    endwhile; endif;
    ?>
  </div>
</section>

<?php
// getCarousel('home');
?>
<?php
/*
$args = array(
  'order' => 'ASC',
  'orderby' => 'menu_order',
  'post_parent' => get_option('page_on_front'),
  'post_type' => 'page',
  'post_status' => 'publish'
);
$home_child_page = new WP_Query( $args );

if ( $home_child_page->have_posts() ) : while ( $home_child_page->have_posts() ) : $home_child_page->the_post();
  $templateName = get_post_meta( get_the_ID(), '_wp_page_template', true );
  get_template_part( 'page-templates/page', str_replace(array( 'page-templates/page-', '.php' ),'',$templateName) );
endwhile; endif;*/
?>

<?php
//get_template_part( 'page-templates/page', 'patrocinadors' );
?>

<?php
get_footer();
?>
