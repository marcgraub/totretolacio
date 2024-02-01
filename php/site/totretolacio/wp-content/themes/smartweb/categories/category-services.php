<?php
$args = array(
  'order' => 'ASC',
  'orderby' => 'menu_order',
  'post_type' => 'serveis',
  'post_status' => 'publish',
  'cat' => get_cat_ID( single_cat_title( '', false ) ),
  'posts_per_page' => -1
);
$category_serveis = new WP_Query( $args );
$widthServicesNavLinkContainer = 100 / $category_serveis->post_count;
?>

<section class="servicesNavContainer">
  <?php
  if ( $category_serveis->have_posts() ) : while ( $category_serveis->have_posts() ) : $category_serveis->the_post();
  ?>
    <?php $anchorTitle = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove',str_replace(' ', '_', get_the_title())) ?>
    <a id="navigation-services" href="#<?php echo $anchorTitle; ?>">
      <div class="servicesNavLinkContainer" style="width: <?php echo $widthServicesNavLinkContainer; ?>%;">
        <span>
          <?php the_title(); ?>
        </span>
      </div>
    </a>
  <?php
  endwhile; endif;
  ?>

</section>

<section class="servicesPresentation">
  <div class="container">
    <?php
    $counter = 0;
    if ( $category_serveis->have_posts() ) : while ( $category_serveis->have_posts() ) : $category_serveis->the_post();
      $counter++;
    ?>
      <?php $anchorTitle = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove',str_replace(' ', '_', get_the_title())) ?>
      <div class="row servicesRow" id="<?php /*echo $anchorTitle;*/ ?>" name="<?php echo $anchorTitle; ?>">
        <?php
        $colClassContent = $counter % 2 == 0 ? "col-xs-12 col-sm-5 col-md-5 col-lg-6 col-sm-push-7 col-md-push-7 col-lg-push-6" : "col-xs-12 col-sm-5 col-md-5 col-lg-6";
        $colClassImg = $counter % 2 == 0 ? "col-xs-12 col-sm-7 col-md-7 col-lg-6 col-sm-pull-5 col-md-pull-5 col-lg-pull-6" : "col-xs-12 col-sm-7 col-md-7 col-lg-6";
        ?>
        <div class="<?php echo $colClassContent; ?>">
          <div class="servicesPresentationContainer">
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
          </div>
        </div>
        <div class="<?php echo $colClassImg; ?>">
          <?php

          $custom_post = pods('serveis', get_the_ID());
          $galeria = $custom_post->field('galeria');
          $galeriaCounter = 0;

          foreach ($galeria as $imatge){
          ?>
            <div class="servicesImgContainer <?php echo $counter % 2 == 0 ? "":"pull-right" ?>"  style="<?php echo $galeriaCounter != 0 ? "display:none;":"" ?>">
              <a rel="gallery-<?php the_ID(); ?>" href="<?php echo $imatge['guid']; ?>" class="swipebox" <?php //echo "title=\"" . $imatge['post_title'] . "\""; ?>>
                <?php echo wp_get_attachment_image($imatge['ID'], 'full', false, array( 'alt' => $imatge['post_title'], 'class' => 'img-responsive' )); ?>
              </a>
            </div>
          <?php
            $galeriaCounter++;
          }
          ?>
        </div>
      </div>
      <!--<div class="grid-item">
        <a class="homeGridItemContainer" href="<?php the_permalink() ?>">
          <?php // the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => 'img-responsive img-home' ) ); ?>
          <a class="homeButton" href="<?php //the_permalink() ?>"><?php //the_title(); ?></a>
        </a>
      </div>-->
    <?php
    endwhile; endif;
    ?>
  </div>
</section>
