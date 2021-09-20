<?php 

$real_fitness_color_scheme_one = get_theme_mod('real_fitness_color_scheme_one');

$real_fitness_color_scheme_css = "";

if($real_fitness_color_scheme_one != false){

  $real_fitness_color_scheme_css .='.product-cart span,
  .banner-btn a,
  .pagemore a,
  .serv-btn a, 
  .woocommerce ul.products li.product .button, 
  .woocommerce #respond input#submit.alt, 
  .woocommerce a.button.alt, 
  .woocommerce button.button.alt, 
  .woocommerce input.button.alt, 
  .woocommerce a.button, 
  .woocommerce button.button, 
  .woocommerce #respond input#submit, 
  #commentform input#submit,
  .sidenav,
  nav.woocommerce-MyAccount-navigation ul li:hover,
  .main-nav ul ul{';

  $real_fitness_color_scheme_css .='background: '.esc_attr($real_fitness_color_scheme_one).' !important;';

  $real_fitness_color_scheme_css .='}';

  $real_fitness_color_scheme_css .='.top_header i{';

  $real_fitness_color_scheme_css .='color: '.esc_attr($real_fitness_color_scheme_one).' !important;';

  $real_fitness_color_scheme_css .='}';

  $real_fitness_color_scheme_css .='.header{';

  $real_fitness_color_scheme_css .='background: rgba(0, 0, 0, 0) linear-gradient(130deg, #fff 35%, '.esc_attr($real_fitness_color_scheme_one).' 35% )repeat scroll 0 0 !important;';

  $real_fitness_color_scheme_css .='}';
}

$real_fitness_color_scheme_two = get_theme_mod('real_fitness_color_scheme_two');

if($real_fitness_color_scheme_two != false){

  $real_fitness_color_scheme_css .='.top_header,
  .copywrap,
  .pagemore a:hover, 
  .serv-btn a:hover, 
  .woocommerce ul.products li.product .button:hover, 
  .woocommerce #respond input#submit.alt:hover, 
  .woocommerce a.button.alt:hover, 
  .woocommerce button.button.alt:hover, 
  .woocommerce input.button.alt:hover, 
  .woocommerce a.button:hover, 
  .woocommerce button.button:hover,
  #commentform input#submit:hover,span.onsale,
  #sidebar input.search-submit,
  #footer input.search-submit, 
  form.woocommerce-product-search button,
  .slide-btn a,
  .bg-opacity,
  .catwrapslider .owl-prev:hover, 
  .catwrapslider .owl-next:hover{';

  $real_fitness_color_scheme_css .='background: '.esc_attr($real_fitness_color_scheme_two).' !important;';

  $real_fitness_color_scheme_css .='}';

  $real_fitness_color_scheme_css .='.listarticle, 
  aside.widget,
  #sidebar select,
  #sidebar input[type="text"], 
  #sidebar input[type="search"], 
  #footer input[type="search"],
  #sidebar .tagcloud a,
  nav.woocommerce-MyAccount-navigation ul li{';

  $real_fitness_color_scheme_css .='border-color: '.esc_attr($real_fitness_color_scheme_two).';';

  $real_fitness_color_scheme_css .='}';

  $real_fitness_color_scheme_css .='a,
  h1, h2, h3, h4, h5, h6,
  h1.site-title a, 
  span.site-description,
  .toggle-nav button,
  .listarticle h2 a,
  h3.widget-title{';

  $real_fitness_color_scheme_css .='color: '.esc_attr($real_fitness_color_scheme_two).';';

  $real_fitness_color_scheme_css .='}';
}