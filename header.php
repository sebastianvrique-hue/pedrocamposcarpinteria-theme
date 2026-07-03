<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Pedro Campos Carpintería y Obras Menores — Pisos, techos, ventanas, terrazas, quinchos y ampliaciones en la Región de La Araucanía.">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <div class="container">
    <a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">Pedro Campos <span>Carpintería</span></a>
    <nav class="main-nav">
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/#inicio' ) ); ?>">Inicio</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#servicios' ) ); ?>">Servicios</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#galeria' ) ); ?>">Galería</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#nosotros' ) ); ?>">Sobre Nosotros</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>">Contacto</a></li>
      </ul>
    </nav>
  </div>
</header>
