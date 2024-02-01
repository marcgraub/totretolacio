
<?php
$temp = $wp_query; $wp_query= null;
$contador = 0;
$wp_query = new WP_Query(); $wp_query->query('showposts=10' . '&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="blog">
      <div class="blogContainer">
        <?php $srcImg= wp_get_attachment_image_src( get_post_thumbnail_id(icl_object_id(get_the_id(), 'page', true)), 'full');?>
        <a href="<?php the_permalink(); ?>" rel="bookmark">
          <img src="http://recursos.globals.cat/sprites.png" class="img-blog img-responsive" alt="<?php echo the_title();?>" style="background-image: url('<?=$srcImg[0]?>');" >
        </a>

        <div class="blogContingut">
          <div>
            <i class="fa fa-user"></i>
            &nbsp;
            <font class="blogInformacio">
              <?php echo ucfirst(get_the_author()); ?>
            </font>
            &nbsp; &nbsp;

            <i class="fa fa-calendar"></i>
            &nbsp;
            <font class="blogInformacio">
              <?php echo ucfirst(get_the_date('l, j \d\e ', '', '', FALSE)) . ucfirst(get_the_date('F \d\e Y', '', '', FALSE)); ?>
            </font>
          </div>

          <h3 class="blogTitul noMargin">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
              <?php echo get_the_title(); ?>
            </a>
          </h3>

          <?php
            $coletilla = "&nbsp;<a class='blogLink' href='".get_permalink()."'>[...]</a>";
            $long_min="200";
            $content=get_page(icl_object_id(get_the_id(), 'page', true));
            $var = truncate(strip_tags($content->post_content), $long_min,  $coletilla);
          ?>
          <p>
            <?php echo $var; ?>
          </p>
          <a class="linkLlegirMes" href="<?php echo get_permalink(); ?>"><?php echo $llegirMes; ?></a>
        </div>

      </div>
    </div>
  </div>

<?php $contador++; ?>

<?php endwhile; ?>

<?php if($contador%2 == 0){ ?>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <a class="mesEntrades" href="<?php echo get_site_url() . '/blog'; ?>">
      <?php echo $veureTotesLesNotícies; ?>
    </a>
  </div>
<?php }else{ ?>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <a class="mesEntrades" href="<?php echo get_site_url() . '/blog'; ?>">
      <?php echo $veureTotesLesNotícies; ?>
    </a>
  </div>
<?php } ?>

<?php wp_reset_postdata(); ?>
