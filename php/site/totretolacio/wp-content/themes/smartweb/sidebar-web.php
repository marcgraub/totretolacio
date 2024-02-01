<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <h3 class="sidebarTitle">Notícies</h3>
</div>

<?php
$temp = $wp_query; $wp_query= null;
$wp_query = new WP_Query(); $wp_query->query('showposts=10' . '&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="sidebarBlog">
      <div class="<?php echo $wp_query->current_post == $wp_query->post_count-1 ? 'sidebarBlogContainerUltim':'sidebarBlogContainer'; ?> sidebarBlogContainerNoBorderLeft">
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
          <?php $srcImg= wp_get_attachment_image_src( get_post_thumbnail_id(icl_object_id(get_the_id(), 'page', true)), 'full');?>
          <a href="<?php the_permalink(); ?>" rel="bookmark">
            <img src="http://recursos.globals.cat/sprites.png" class="img-sidebar-blog img-responsive" alt="<?php echo the_title();?>" style="background-image: url('<?=$srcImg[0]?>');" >
          </a>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 sidebarNoPaddingLeft">
          <div class="sidebarBlogContingut">
            <section class="sidebarBlogInformacioContainer">
              <font class="sidebarBlogInformacioIcones">
                <i class="fa fa-calendar"></i>&nbsp;
              </font>

              <font class="sidebarBlogInformacio">
                <?php echo ucfirst(get_the_date('l, j \d\e ', '', '', FALSE)) . ucfirst(get_the_date('F \d\e Y', '', '', FALSE)); ?>
              </font>
            </section>

            <h3 class="sidebarBlogTitul noMargin">
              <a href="<?php the_permalink(); ?>" rel="bookmark">
                <?php
                  $coletilla = "";
                  $long_min="45";
                  $content=get_page(icl_object_id(get_the_id(), 'page', true));
                  $var = truncate(get_the_title(), $long_min,  $coletilla);
                ?>
                <?php echo $var; ?>
                &nbsp;<a href='<?php echo get_permalink(); ?>'>[...]</a>
              </a>
            </h3>
          </div>
        </div>
        </div>
      </div>
    </div>
    </div>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <a class="sidebarMesEntrades" href="<?php echo get_site_url() . '/blog'; ?>">
    <?php echo $veureTotesLesNotícies; ?>
  </a>
</div>
