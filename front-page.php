<?php
$pc_form_sent = false;
$pc_form_error = '';
if ( isset( $_POST['pc_contact_submit'] ) ) {
    if ( ! isset( $_POST['pc_contact_nonce'] ) || ! wp_verify_nonce( $_POST['pc_contact_nonce'], 'pc_contact_form' ) ) {
        $pc_form_error = 'No se pudo verificar el formulario, intenta de nuevo.';
    } else {
        $nombre  = sanitize_text_field( wp_unslash( $_POST['nombre'] ?? '' ) );
        $email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
        $mensaje = sanitize_textarea_field( wp_unslash( $_POST['mensaje'] ?? '' ) );

        if ( $nombre && is_email( $email ) && $mensaje ) {
            $to      = get_option( 'admin_email' );
            $subject = 'Nuevo mensaje de contacto - ' . get_bloginfo( 'name' );
            $body    = "Nombre: $nombre\nCorreo: $email\n\nMensaje:\n$mensaje";
            $headers = array( 'Reply-To: ' . $email );
            $pc_form_sent = wp_mail( $to, $subject, $body, $headers );
            if ( ! $pc_form_sent ) {
                $pc_form_error = 'No se pudo enviar el mensaje, intenta más tarde.';
            }
        } else {
            $pc_form_error = 'Por favor completa todos los campos correctamente.';
        }
    }
}
get_header();
?>

<section id="inicio" class="hero">
  <div class="container">
    <h1>Carpintería y Obras Menores</h1>
    <p>Maestro de la madera en obras menores. Desde pequeños detalles hasta grandes transformaciones, cada proyecto es una historia que contar.</p>
    <a class="btn" href="https://wa.me/56961043700" target="_blank" rel="noopener">Cotiza por WhatsApp</a>
  </div>
</section>

<section id="servicios">
  <div class="container">
    <h2>Todo lo que necesitas, en un solo lugar</h2>
    <p class="section-lead">Trabajo responsable, detalles que marcan la diferencia.</p>
    <div class="grid-3">
      <div class="card">
        <h3>Pisos</h3>
        <p>Instalación y reparación de pisos de madera y flotantes.</p>
      </div>
      <div class="card">
        <h3>Techos</h3>
        <p>Construcción, reparación y mantención de techos y estructuras.</p>
      </div>
      <div class="card">
        <h3>Ventanas</h3>
        <p>Instalación, reparación y cambio de ventanas de madera.</p>
      </div>
      <div class="card">
        <h3>Terrazas</h3>
        <p>Diseño y construcción de terrazas de madera.</p>
      </div>
      <div class="card">
        <h3>Quinchos</h3>
        <p>Construcción de quinchos a medida para disfrutar en familia.</p>
      </div>
      <div class="card">
        <h3>Ampliaciones</h3>
        <p>Ampliaciones y remodelaciones para mejorar tus espacios.</p>
      </div>
    </div>
  </div>
</section>

<section id="galeria" class="alt-bg">
  <div class="container">
    <h2>Galería de Trabajos</h2>
    <p class="section-lead">Estamos preparando esta sección con fotos de nuestros proyectos. Mientras tanto, míralos en nuestro Instagram.</p>
    <div class="gallery-grid">
      <div class="gallery-item">Foto próximamente</div>
      <div class="gallery-item">Foto próximamente</div>
      <div class="gallery-item">Foto próximamente</div>
      <div class="gallery-item">Foto próximamente</div>
      <div class="gallery-item">Foto próximamente</div>
      <div class="gallery-item">Foto próximamente</div>
    </div>
    <p style="text-align:center;margin-top:30px;">
      <a class="btn" href="https://instagram.com/carpinteria_pedrocampos" target="_blank" rel="noopener">Ver más en Instagram</a>
    </p>
  </div>
</section>

<section id="nosotros">
  <div class="container about-wrap">
    <div>
      <h2 style="text-align:left">Sobre Nosotros</h2>
      <p>En Pedro Campos realizamos trabajos de carpintería y obras menores con atención personalizada y compromiso en cada detalle. Atendemos toda la Región de La Araucanía, construyendo espacios para disfrutar.</p>
      <p>Calidad, compromiso y confianza en cada proyecto, sin importar su tamaño.</p>
    </div>
    <div class="card">
      <h3>¿Por qué elegirnos?</h3>
      <ul style="text-align:left">
        <li>Experiencia</li>
        <li>Responsabilidad</li>
        <li>Puntualidad</li>
        <li>Respuesta rápida y directa</li>
      </ul>
    </div>
  </div>
</section>

<section id="contacto" class="alt-bg">
  <div class="container contact-wrap">
    <div>
      <h2 style="text-align:left">Contacto</h2>
      <p>¿Tienes un proyecto pendiente en tu hogar? Cotiza y consulta por WhatsApp, respuesta rápida y directa.</p>
      <ul class="contact-info">
        <li>📍 Región de La Araucanía</li>
        <li>📱 <a href="https://wa.me/56961043700" target="_blank" rel="noopener">WhatsApp: +56 9 6104 3700</a></li>
        <li>📷 <a href="https://instagram.com/carpinteria_pedrocampos" target="_blank" rel="noopener">@carpinteria_pedrocampos</a></li>
      </ul>
    </div>
    <?php if ( $pc_form_sent ) : ?>
      <p style="color:#2e6b3e;font-weight:600;">¡Gracias! Tu mensaje fue enviado correctamente.</p>
    <?php else : ?>
      <?php if ( $pc_form_error ) : ?>
        <p style="color:#a33;font-weight:600;"><?php echo esc_html( $pc_form_error ); ?></p>
      <?php endif; ?>
      <form class="contact-form" method="post" action="#contacto">
        <?php wp_nonce_field( 'pc_contact_form', 'pc_contact_nonce' ); ?>
        <input type="text" name="nombre" placeholder="Tu nombre" value="<?php echo esc_attr( $_POST['nombre'] ?? '' ); ?>" required>
        <input type="email" name="email" placeholder="Tu correo" value="<?php echo esc_attr( $_POST['email'] ?? '' ); ?>" required>
        <textarea name="mensaje" rows="5" placeholder="Cuéntanos sobre tu proyecto" required><?php echo esc_textarea( $_POST['mensaje'] ?? '' ); ?></textarea>
        <button type="submit" name="pc_contact_submit" value="1">Enviar mensaje</button>
      </form>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
