<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); 
?>

<?php if ( have_posts() ) : ?>
    <div class="container">
        <section class="portafoli">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="blog">
                        <div class="blogContainer">
                            <?php $srcImg= wp_get_attachment_image_src( get_post_thumbnail_id(icl_object_id(get_the_id(), 'page', true)), 'full');?>
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <img src="http://recursos.globals.cat/sprites.png" class="img-blog img-responsive" alt="<?php echo the_title();?>" style="background-image: url('<?=$srcImg[0]?>');" >
                            </a>

                            <div class="portafoli-contingut">
                                
                                <div class="portafoli-grid">
                                <?php
                                $custom_post = pods('tests', get_the_ID());
                                $galeria = $custom_post->field('galeria');

                                foreach ($galeria as $imatge){
                                ?>
                                    <div class="the-grid">
                                        <div class="portafoli-grid-img-container">
                                            <a rel="gallery-<?php the_ID(); ?>" href="<?php echo $imatge['guid']; ?>" class="swipebox" <?php //echo "title=\"" . $imatge['post_title'] . "\""; ?>>
                                                <img src="<?php echo $imatge['guid']; ?>" alt="<?php echo $imatge['post_title']; ?>">
                                                <!--<img class="img-responsive" src="<?php echo $imatge['guid']; ?>" alt="<?php echo $imatge['post_title']; ?>">-->
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                </div>

                                <h4 class="portafoli-titul">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                        <?php echo get_the_title(); ?>
                                    </a>
                                </h4>

                                <?php
                                $coletilla = "&nbsp;<a class='blogLink' href='".get_permalink()."'>[...]</a>";
                                $long_min="200";
                                $content=get_page(icl_object_id(get_the_id(), 'page', true));
                                $var = truncate(strip_tags($content->post_content), $long_min,  $coletilla);
                                ?>
                                <p class="portafoli-text-resum">
                                    <?php echo $var; ?>
                                </p>
                                <a class="linkLlegirMes" href="<?php echo get_permalink(); ?>"><?php echo $llegirMes; ?></a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php 
                pagination($additional_loop->max_num_pages);
                //twentythirteen_paging_nav(); 
                ?>
            </div>
            
        </section>
    </div>
<?php endif; ?>

<?php 
get_sidebar();
get_footer(); 
?>