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
    <h1>Muebles y trabajos en madera a medida</h1>
    <p>Transformamos madera en piezas únicas para tu hogar o negocio, con dedicación y oficio en cada detalle.</p>
    <a class="btn" href="#contacto">Solicita tu cotización</a>
  </div>
</section>

<section id="servicios">
  <div class="container">
    <h2>Nuestros Servicios</h2>
    <p class="section-lead">Trabajamos cada proyecto a medida, cuidando el detalle y la calidad de los materiales.</p>
    <div class="grid-3">
      <div class="card">
        <h3>Muebles a Medida</h3>
        <p>Diseño y fabricación de muebles personalizados para living, cocina, dormitorio y oficina.</p>
      </div>
      <div class="card">
        <h3>Closets y Placares</h3>
        <p>Soluciones de almacenamiento a medida, optimizando cada espacio de tu hogar.</p>
      </div>
      <div class="card">
        <h3>Restauración</h3>
        <p>Recuperamos y le damos nueva vida a muebles y piezas de madera antiguas.</p>
      </div>
      <div class="card">
        <h3>Puertas y Ventanas</h3>
        <p>Fabricación e instalación de puertas y ventanas de madera a medida.</p>
      </div>
      <div class="card">
        <h3>Decks y Pérgolas</h3>
        <p>Estructuras exteriores en madera, resistentes y con terminaciones de calidad.</p>
      </div>
      <div class="card">
        <h3>Proyectos Especiales</h3>
        <p>¿Tienes una idea particular? Conversemos y le damos forma en madera.</p>
      </div>
    </div>
  </div>
</section>

<section id="galeria" class="alt-bg">
  <div class="container">
    <h2>Galería de Trabajos</h2>
    <p class="section-lead">Algunos de nuestros proyectos recientes. (Fotos próximamente)</p>
    <div class="gallery-grid">
      <div class="gallery-item">Foto próximamente</div>
      <div class="gallery-item">Foto próximamente</div>
      <div class="gallery-item">Foto próximamente</div>
      <div class="gallery-item">Foto próximamente</div>
      <div class="gallery-item">Foto próximamente</div>
      <div class="gallery-item">Foto próximamente</div>
    </div>
  </div>
</section>

<section id="nosotros">
  <div class="container about-wrap">
    <div>
      <h2 style="text-align:left">Sobre Nosotros</h2>
      <p>Pedro Campos Carpintería es un taller dedicado a la fabricación de muebles y trabajos en madera a medida. Combinamos técnicas tradicionales de carpintería con un enfoque moderno en diseño, entregando piezas únicas, duraderas y de calidad.</p>
      <p>Cada proyecto es distinto, por eso trabajamos de la mano con cada cliente desde la idea inicial hasta la instalación final.</p>
    </div>
    <div class="card">
      <h3>¿Por qué elegirnos?</h3>
      <ul style="text-align:left">
        <li>Diseño 100% personalizado</li>
        <li>Materiales de calidad</li>
        <li>Terminaciones prolijas</li>
        <li>Cumplimiento de plazos</li>
      </ul>
    </div>
  </div>
</section>

<section id="contacto" class="alt-bg">
  <div class="container contact-wrap">
    <div>
      <h2 style="text-align:left">Contacto</h2>
      <p>¿Tienes un proyecto en mente? Escríbenos y te responderemos a la brevedad.</p>
      <ul class="contact-info">
        <li>📍 Chile</li>
        <li>📞 +56 9 XXXX XXXX</li>
        <li>✉️ contacto@pedrocamposcarpinteria.cl</li>
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
