<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Real Fitness
 */

get_header(); ?>

<div id="content">
  <?php
    $hidcatslide = get_theme_mod('real_fitness_hide_categorysec', '1');
    if( $hidcatslide == ''){
  ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('real_fitness_slidersection',false) ) { ?>
          <?php $queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('real_fitness_slidersection',true)));
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
              <div class="slidesection"> 
                <?php the_post_thumbnail( 'full' ); ?>
                <div class="bg-opacity"></div>
                <div class="slider-box">
                  <?php if ( get_theme_mod('real_fitness_heading') != "") { ?>
                    <h2><?php echo esc_html(get_theme_mod('real_fitness_heading')); ?></h2>
                  <?php }?>
                  <h3><?php the_title(); ?></h3>
                  <?php
                    $trimexcerpt = get_the_excerpt();
                    $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 15 );
                    echo '<p class="mt-4">' . esc_html( $shortexcerpt ) . '</p>'; 
                  ?>
                  <?php if ( get_theme_mod('real_fitness_button_text') != "") { ?>
                    <div class="slide-btn mt-5">
                      <i class="fas fa-users"></i><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('real_fitness_button_text',__('GET STARTED','real-fitness'))); ?></a>
                    </div>
                  <?php }?>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
      <div class="clear"></div>
    </section>
  <?php } ?>

  <?php
    $real_fitness_hidepageboxes = get_theme_mod('real_fitness_disabled_pgboxes', '1');
    if( $real_fitness_hidepageboxes == ''){
  ?>
  <section id="serives_box" class="py-4">
    <div class="container">      
      <?php if ( get_theme_mod('real_fitness_main_title') != "") { ?>
        <h3 class="text-center main_title"><?php echo esc_html(get_theme_mod('real_fitness_main_title','')); ?></h3>
      <?php }?>
      <?php if ( get_theme_mod('real_fitness_main_text') != "") { ?>
        <p class="main_text text-center mb-3 mx-0 mx-md-5 px-0 px-md-5 "><?php echo esc_html(get_theme_mod('real_fitness_main_text','')); ?></p>
      <?php }?>
      <div class="mt-5">
        <div class="row">
          <?php if( get_theme_mod('real_fitness_services_cat',false) ) { ?>
            <?php $queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('real_fitness_services_cat',true)));
              while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="services_inner_box text-center">
                    <?php the_post_thumbnail( 'full' ); ?>
                    <h4 class="p-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php
                      $trimexcerpt = get_the_excerpt();
                      $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 10 );
                      echo '<p class="mb-4 px-3">' . esc_html( $shortexcerpt ) . '</p>'; 
                    ?>
                  </div>
                </div>
              <?php endwhile; wp_reset_postdata(); ?>
            <?php } ?>
          <?php }?>
        </div>
      </div>
    </div>
  </section>

  <section class="pt-4">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  <section>
</div>

<?php get_footer(); ?>