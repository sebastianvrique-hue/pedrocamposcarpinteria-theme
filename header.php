<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Pedro Campos Carpintería y Obras Menores — Pisos, techos, ventanas, terrazas, quinchos y ampliaciones en la Región de La Araucanía. Cotiza por WhatsApp.">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <div class="container">
    <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img class="brand-logo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo.jpg' ); ?>" alt="Logo Pedro Campos Carpintería" width="46" height="46">
      <span class="brand-text">Pedro Campos <span>Carpintería y Obras Menores</span></span>
    </a>
    <button class="nav-toggle" aria-label="Abrir menú" aria-expanded="false" aria-controls="menu-principal">
      <span></span><span></span><span></span>
    </button>
    <nav class="main-nav" id="menu-principal">
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/#inicio' ) ); ?>">Inicio</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#servicios' ) ); ?>">Servicios</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#galeria' ) ); ?>">Galería</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#nosotros' ) ); ?>">Nosotros</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>">Contacto</a></li>
        <li>
          <a class="nav-cta" href="https://wa.me/56961043700?text=Hola%20Pedro%2C%20vi%20tu%20p%C3%A1gina%20web%20y%20quiero%20cotizar%20un%20trabajo" target="_blank" rel="noopener">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Zm5.2 14.2c-.2.6-1.2 1.1-1.7 1.2-.4.1-1 .1-1.6-.1-.4-.1-.9-.3-1.5-.5-2.6-1.1-4.3-3.7-4.4-3.9-.1-.2-1.1-1.4-1.1-2.7s.7-1.9.9-2.2c.2-.2.5-.3.7-.3h.5c.2 0 .4 0 .6.4.2.5.7 1.8.8 1.9.1.1.1.3 0 .5-.1.2-.1.3-.3.5l-.4.5c-.1.1-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.4 2.4 1.5.3.1.5.1.6-.1.2-.2.7-.8.9-1.1.2-.3.4-.2.6-.1.3.1 1.7.8 2 .9.3.2.5.2.6.4 0 .1 0 .7-.2 1.4Z"/></svg>
            WhatsApp
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>
