<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Real Fitness
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'real-fitness' ); ?></a>

<div class="top_header py-3">
  <div class="container">
    <div class="row m-0">
      <div class="col-lg-4 col-md-12 p-0 text-center text-lg-left center-align">
        <div class="logo mb-md-2">
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?>
            <span class="site-description"><?php echo esc_html( $description ); ?></span>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-8 col-md-12 center-align text-center text-lg-right">
        <?php if ( get_theme_mod('real_fitness_phone_number') != "") { ?>
          <i class="fas fa-phone mr-2"></i>
          <span class="mr-2"><?php echo esc_html(get_theme_mod ('real_fitness_phone_number','')); ?></span>
        <?php }?>
        <?php if ( get_theme_mod('real_fitness_email_address') != "") { ?>
          <i class="far fa-envelope mr-2"></i>
          <span class="mr-2"><?php echo esc_html(get_theme_mod ('real_fitness_email_address','')); ?></span>
        <?php }?>
        <?php if ( get_theme_mod('real_fitness_open_time') != "") { ?>
          <i class="far fa-clock mr-2"></i>
          <span><?php echo esc_html(get_theme_mod ('real_fitness_open_time','')); ?></span>
        <?php }?>
      </div>
    </div>
  </div>
</div>

<div class="header py-3 mt-0 mt-md-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-4 col-12 center-align">
       <div class="logo text-center text-lg-left pb-4 pb-md-0 pb-sm-0">
          <?php real_fitness_the_custom_logo(); ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
          <?php if ( ! empty( $blog_info ) ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-8 col-md-4 col-sm-4 col-6 center-align">
        <div class="toggle-nav text-center">
          <?php if(has_nav_menu('primary')){ ?>
            <button role="tab"><?php esc_html_e('MENU','real-fitness'); ?></button>
          <?php }?>
        </div>
        <div id="mySidenav" class="nav sidenav text-right">
          <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','real-fitness' ); ?>">
            <?php if(has_nav_menu('primary')){
              wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'main-menu clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
              ) );
            } ?>
            <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','real-fitness'); ?></a>
          </nav>
        </div>
      </div>
      <div class="col-lg-1 col-md-4 col-sm-4 col-6 center-align">
        <div class="product-cart text-center">
          <?php if(class_exists('woocommerce')){ ?>  
            <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','real-fitness' ); ?>"><i class="fas fa-shopping-cart"></i></a>
            <span class="item-count"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count()));?></span>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</div>