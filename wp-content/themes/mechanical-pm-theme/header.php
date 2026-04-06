<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="mp-wrap">

  <nav class="mp-nav">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mp-logo">
      <?php bloginfo( 'name' ); ?>
    </a>

    <?php
    wp_nav_menu( array(
      'theme_location'  => 'primary',
      'menu_class'      => 'mp-nav-links',
      'container'       => false,
      'walker'          => new Mechanical_PM_Walker_Nav_Menu(),
      'fallback_cb'     => false,
    ) );
    ?>
  </nav>
