<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo.jpg' ); ?>" alt="Logo Pedro Campos Carpintería" width="62" height="62">
        <div>
          <strong>Pedro Campos</strong>
          <p>Carpintería y obras menores con oficio, en toda la Región de La Araucanía.</p>
        </div>
      </div>
      <div>
        <h4>Secciones</h4>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/#servicios' ) ); ?>">Servicios</a></li>
          <li><a href="<?php echo esc_url( home_url( '/#galeria' ) ); ?>">Galería</a></li>
          <li><a href="<?php echo esc_url( home_url( '/#nosotros' ) ); ?>">Nosotros</a></li>
          <li><a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>">Contacto</a></li>
        </ul>
      </div>
      <div>
        <h4>Contacto</h4>
        <ul>
          <li><a href="https://wa.me/56961043700?text=Hola%20Pedro%2C%20vi%20tu%20p%C3%A1gina%20web%20y%20quiero%20cotizar%20un%20trabajo" target="_blank" rel="noopener">WhatsApp: +56 9 6104 3700</a></li>
          <li><a href="https://instagram.com/carpinteria_pedrocampos" target="_blank" rel="noopener">Instagram: @carpinteria_pedrocampos</a></li>
          <li>Región de La Araucanía, Chile</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?php echo date( 'Y' ); ?> Pedro Campos Carpintería. Todos los derechos reservados. Hecho con oficio en La Araucanía.</p>
    </div>
  </div>
</footer>

<a class="wa-float" href="https://wa.me/56961043700?text=Hola%20Pedro%2C%20vi%20tu%20p%C3%A1gina%20web%20y%20quiero%20cotizar%20un%20trabajo" target="_blank" rel="noopener" aria-label="Escríbenos por WhatsApp">
  <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Zm5.2 14.2c-.2.6-1.2 1.1-1.7 1.2-.4.1-1 .1-1.6-.1-.4-.1-.9-.3-1.5-.5-2.6-1.1-4.3-3.7-4.4-3.9-.1-.2-1.1-1.4-1.1-2.7s.7-1.9.9-2.2c.2-.2.5-.3.7-.3h.5c.2 0 .4 0 .6.4.2.5.7 1.8.8 1.9.1.1.1.3 0 .5-.1.2-.1.3-.3.5l-.4.5c-.1.1-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.4 2.4 1.5.3.1.5.1.6-.1.2-.2.7-.8.9-1.1.2-.3.4-.2.6-.1.3.1 1.7.8 2 .9.3.2.5.2.6.4 0 .1 0 .7-.2 1.4Z"/></svg>
</a>

<?php wp_footer(); ?>
</body>
</html>
